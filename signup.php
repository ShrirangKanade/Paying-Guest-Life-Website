<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | PG Life</title>
        <?php
            include "includes/head_links.php";
           
        ?>
        <link rel="stylesheet" href="css/home.css">
        
        
    </head>
    <body>
        <?php
            include "includes/header.php";
           
        ?>

 
        <!-- Search bar and background -->
        <div class="search">
            
            <img id="Img" src="img/bg.png">
           
            <h4 class="Quote">Happiness per Square Foot</h4>

            <form method="post" action="search_bar.php" >
                <textarea class="Texts" name="PGs" rows="6" >Enter your search for PG's
                    
                </textarea>
                <button class="btn btn-dark" id="srb" type="submit">
                    <img src="img/searchicon.png" id="TS">
                </button>
            </form>

        </div>

        <!-- Cities Icons -->
        <div class="MajorCities">
            <h4 class="Quote1">Major Cities</h4>
            <div class="circles">
                <button type="button" class="btn btn-light" id="bt1">
                    <a href="property_list.php?city=Delhi"><img id="MJ1" src="img/delhi.png"></a>
                </button>
                <button type="button" class="btn btn-light" id="bt1" >
                    <a href="property_list.php?city=Mumbai"><img id="MJ1" src="img/mumbai.png"></a>
                </button>
                <button type="button" class="btn btn-light" id="bt1"></a>
                    <a href="property_list.php?city=Bangalore"><img id="MJ1" src="img/bangalore.png">
                </button>
                <button type="button" class="btn btn-light" id="bt1">
                    <a href="property_list.php?city=Hyderabad"><img id="MJ1" src="img/hyderabad.png"></a>
                </button>
            </div>
            
        </div>
         
        <!-- Footer -->
        <?php
            
            include "includes/footer.php";
        ?>

        </div>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>    
    </body>

</html>