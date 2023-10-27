<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$P=$_GET['property_id'] ;

//properties
$sql_1="SELECT * FROM properties p WHERE p.p_id=$P";
$result_1=mysqli_query($conn,$sql_1);
if(!$result_1){
    echo "Error : ".mysqli_query_error();
    return;
}
$Property=mysqli_fetch_assoc($result_1);

//Cities
$sql_2="SELECT city_name FROM properties p INNER JOIN cities c on p.city_id=c.c_id where p_id=$P";
$result_2=mysqli_query($conn,$sql_2);
if(!$result_2){
    echo "Error : ".mysqli_query_error();
    return;
}
$P_city=mysqli_fetch_assoc($result_2);

//Testimonials
$sql_3="SELECT * FROM properties p INNER JOIN testimonials t on p.p_id=t.property_id where p_id=$P";
$result_3=mysqli_query($conn,$sql_3);
if(!$result_3){
    echo "Error : ".mysqli_query_error();
    return;
}
//Amenitites_type : Building
$sql_4="SELECT * FROM properties p INNER JOIN properties_amenities pa on p.p_id=pa.property_id  INNER JOIN amenities o on pa.amenity_id = o.a_id  WHERE p_id=$P and type = 'Building' ";
$result_4=mysqli_query($conn,$sql_4);
if(!$result_4){
    echo "Error : ".mysqli_query_error();
    return;
}

//Amenitites_type : Common Area
$sql_5="SELECT * FROM properties p INNER JOIN properties_amenities pa on p.p_id=pa.property_id  INNER JOIN amenities o on pa.amenity_id = o.a_id  WHERE p_id=$P and type = 'Common Area' ";
$result_5=mysqli_query($conn,$sql_5);
if(!$result_5){
    echo "Error : ".mysqli_query_error();
    return;
}

//Amenitites_type : Bedroom
$sql_6="SELECT * FROM properties p INNER JOIN properties_amenities pa on p.p_id=pa.property_id  INNER JOIN amenities o on pa.amenity_id = o.a_id  WHERE p_id=$P and type = 'Bedroom' ";
$result_6=mysqli_query($conn,$sql_6);
if(!$result_6){
    echo "Error : ".mysqli_query_error();
    return;
}

//Amenitites_type : Washroom
$sql_7="SELECT * FROM properties p INNER JOIN properties_amenities pa on p.p_id=pa.property_id  INNER JOIN amenities o on pa.amenity_id = o.a_id  WHERE p_id=$P and type = 'Washroom' ";
$result_7=mysqli_query($conn,$sql_7);
if(!$result_7){
    echo "Error : ".mysqli_query_error();
    return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $Property['p_name'] ?> | PG Life</title>

    <?php
    include "includes/head_links.php";
    ?>
    <link href="css/property_detail.css" rel="stylesheet" />
</head>

<body>  


        <?php
            include "includes/header.php";
           
        ?>

    <div id="loading">
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="signup.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="property_list.php?city=<?= $P_city['city_name'] ?>"> <?= $P_city['city_name'] ?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <?= $Property['p_name'] ?>
            </li>
        </ol>
    </nav>

    <div id="property-images" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#property-images" data-slide-to="0" class="active"></li>
            <li data-target="#property-images" data-slide-to="1" class=""></li>
            <li data-target="#property-images" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/properties/1/1d4f0757fdb86d5f.jpg" alt="slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/properties/1/46ebbb537aa9fb0a.jpg" alt="slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/properties/1/eace7b9114fd6046.jpg" alt="slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#property-images" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#property-images" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="property-summary page-container">
        <div class="row no-gutters justify-content-between">
            <div class="star-container" title="4.8">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="interested-container">
                <i class="is-interested-image far fa-heart"></i>
                <div class="interested-text">
                    <span class="interested-user-count">6</span> interested
                </div>
            </div>
        </div>
        <div class="detail-container">
            <div class="property-name"><?= $Property['p_name'] ?></div>
            <div class="property-address"><?= $Property['address'] ?></div>
            <div class="property-gender">
                <img src="img/unisex.png" />
            </div>
        </div>
        <div class="row no-gutters">
            <div class="rent-container col-6">
                <div class="rent"><?= $Property['rent'] ?></div>
                <div class="rent-unit">per month</div>
            </div>
            <div class="button-container col-6">
                <a href="Book.php" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>

    <div class="property-amenities">
        <div class="page-container">
            <h1>Amenities</h1>
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <h5>Building</h5>
                    <?php 
                        while($P_amen_building=mysqli_fetch_assoc($result_4))
                        {
                            ?>
                            <div class="amenity-container">
                                <img src="img/amenities/<?= $P_amen_building['icon'] ?>.svg">
                                <span><?= $P_amen_building['name'] ?></span>
                            </div>
                        <?php
                        }
                    ?>
                </div>

                <div class="col-md-auto">
                    <h5>Common Area</h5>
                    <?php 
                        while($P_amen_common_area=mysqli_fetch_assoc($result_5))
                        {
                            ?>
                            <div class="amenity-container">
                                <img src="img/amenities/<?= $P_amen_common_area['icon'] ?>.svg">
                                <span><?= $P_amen_common_area['name'] ?></span>
                            </div>
                        <?php
                        }
                    ?>
                </div>

                <div class="col-md-auto">
                    <h5>Bedroom</h5>
                    <?php 
                        while($P_amen_bedroom=mysqli_fetch_assoc($result_6))
                        {
                            ?>
                            <div class="amenity-container">
                                <img src="img/amenities/<?= $P_amen_bedroom['icon'] ?>.svg">
                                <span><?= $P_amen_bedroom['name'] ?></span>
                            </div>
                        <?php
                        }
                    ?>
                </div>

                <div class="col-md-auto">
                    <h5>Washroom</h5>
                    <?php 
                        while($P_amen_washroom=mysqli_fetch_assoc($result_7))
                        {
                            ?>
                            <div class="amenity-container">
                                <img src="img/amenities/<?= $P_amen_washroom['icon'] ?>.svg">
                                <span><?= $P_amen_washroom['name'] ?></span>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="property-about page-container">
        <h1>About the Property</h1>
        <p><?= $Property['description'] ?></p>
    </div>

    <div class="property-rating">
        <div class="page-container">
            <h1>Property Rating</h1>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fas fa-broom"></i>
                            <span class="rating-criteria-text">Cleanliness</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="4.3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fas fa-utensils"></i>
                            <span class="rating-criteria-text">Food Quality</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="3.4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>

                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fa fa-lock"></i>
                            <span class="rating-criteria-text">Safety</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="4.8">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <?php
                        $total_rating = ($Property['rating_clean'] + $Property['rating_food'] + $Property['rating_safety']) / 3;
                        $total_rating = round($total_rating, 1);
                        ?>
                <div class="col-md-4">
                    <div class="rating-circle">
                        <div class="total-rating"><?= $total_rating ?></div>
                        <div class="rating-circle-star-container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="property-testimonials page-container">
        <h1>What people say</h1>
        <?php  
            
            while($P_testimonials=mysqli_fetch_assoc($result_3)){
                 
                 ?>
                <div class="testimonial-block">
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                    <div class="testimonial-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p><?=  $P_testimonials['content'] ?></p>
                    </div>
                    <div class="testimonial-name">-<?=  $P_testimonials['user_name'] ?></div>
                </div>
                 <?php
            }
        ?>

     

    <?php

       include "includes/footer.php";
    ?>
    
    
    
</body>

</html>
