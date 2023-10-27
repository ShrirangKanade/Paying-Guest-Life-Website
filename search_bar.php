<?php
require("includes/database_connect.php");
$search=array("City"=>$_POST['PGs']);
?>
<a href="property_list.php?city=<?= $search['City'] ?>">PG in Delhi</a>
