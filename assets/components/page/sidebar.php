<?php

require "./assets/db/db.php";

$query = "select * from categories";
$category = mysqli_query($connect, $query);


require "./assets/components/view/sidebar.view.php";
