<?php

require "./assets/db/db.php";

$getCat = null;
$errors = [];
$query = "select * from categories";
$category = mysqli_query($connect, $query);

// ============== ADD Category
if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    if (empty($cat_title) || strlen($cat_title) <= 1) {
        $errors['title_error'] = 'Enter a valid category';
    } else {
        $query = "INSERT INTO categories(cat_title) VALUE('$cat_title')";
        $send_query = mysqli_query($connect, $query);

        if (!$send_query) {
            die('Query Fail');
        } else {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

// ============== GET Category By ID
if (isset($_GET['single_cat'])) {
    $catId = (int)$_GET['single_cat'];

    if ($catId) {
        $query = "select * from categories WHERE cat_id = '$catId' ";
        $catById = mysqli_query($connect, $query);
        $getCat = mysqli_fetch_assoc($catById);
    }
}

// ============== Update Category
if (isset($_POST['update'])) {
    $editId = (int)$_GET['single_cat'];
    $cat_title = $_POST['cat_title'];

    if (empty($cat_title) || strlen($cat_title) <= 1) {
        $errors['update_error'] = 'Enter a valid category for Update';
    } else {
        $query = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id = $editId";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// ============== Delete Category
if (isset($_GET['del_cat'])) {
    $deleteId = (int)$_GET['del_cat'];

    if ($deleteId) {
        $query = "DELETE FROM categories WHERE cat_id = $deleteId";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

require "./assets/components/view/category.view.php";
