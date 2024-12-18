<?php

require "./assets/db/db.php";

// ============== GET Published Post
$getPost = [];
$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";
$postById = mysqli_query($connect, $query);
$getPost = mysqli_fetch_all($postById, MYSQLI_ASSOC);

require "./assets/components/view/index.view.php";
