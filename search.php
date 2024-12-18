<?php

require "./assets/db/db.php";


if (isset($_POST['search'])) {
    $errors = [];
    $search = $_POST['search'];

    $query = "select * from posts where post_tags LIKE '%$search%'";
    $search_query = mysqli_query($connect, $query);
    $getSearch = mysqli_fetch_assoc($search_query);

    if (empty($getSearch)) {
        $errors['search'] = 'not match';
    } 
}

require "./assets/components/view/search.view.php";