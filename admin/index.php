<?php

require "./assets/db/db.php";


// ============== GET Total Post_Number
$query = "SELECT COUNT(*) AS total_posts FROM posts";
$getAllPosts = mysqli_query($connect, $query);

if ($getAllPosts) {
    $row = mysqli_fetch_assoc($getAllPosts);

    $totalPosts  = $row['total_posts'];
}

// ------------ GET Total Draft_Post_Number
$query2 = "SELECT COUNT(*) AS total_draft_posts FROM posts WHERE post_status = 'draft'";
$getTotalDraftPosts = mysqli_query($connect, $query2);

if ($getTotalDraftPosts) {
    $row = mysqli_fetch_assoc($getTotalDraftPosts);
    $totalDraftPosts = $row['total_draft_posts'];
}
// ============== END POST

// ============== GET Total Comment_Number
$query = "SELECT COUNT(*) AS total_comnts FROM comments";
$getAllComnts = mysqli_query($connect, $query);

if ($getAllComnts) {
    $row = mysqli_fetch_assoc($getAllComnts);

    $totalComnts  = $row['total_comnts'];
}

// ------------ GET Total Pending_Comments_Number
$query2 = "SELECT COUNT(*) AS total_draft_comnts FROM comments WHERE comnt_status = 'unapproved'";
$getTotal_Pending_Comnt = mysqli_query($connect, $query2);

if ($getTotal_Pending_Comnt) {
    $row = mysqli_fetch_assoc($getTotal_Pending_Comnt);
    $total_Pending_Comnts = $row['total_draft_comnts'];
}
// ============== END Comments

// ============== GET Total User_Number
$query = "SELECT COUNT(*) AS total_users FROM users";
$getAllUsers = mysqli_query($connect, $query);

if ($getAllUsers) {
    $row = mysqli_fetch_assoc($getAllUsers);

    $totalUsers  = $row['total_users'];
}
// ------------ GET Total Admin_Number
$query2 = "SELECT COUNT(*) AS total_admin FROM users WHERE role = 'admin'";
$getTotal_Admin = mysqli_query($connect, $query2);

if ($getTotal_Admin) {
    $row = mysqli_fetch_assoc($getTotal_Admin);
    $total_Admin = $row['total_admin'];
}
// ============== END Users

// ============== GET Total Category_Number
$query = "SELECT COUNT(*) AS total_cate FROM categories";
$getAllCategory = mysqli_query($connect, $query);

if ($getAllCategory) {
    $row = mysqli_fetch_assoc($getAllCategory);

    $totalCategory  = $row['total_cate'];
}

require "./assets/components/view/index.view.php";
