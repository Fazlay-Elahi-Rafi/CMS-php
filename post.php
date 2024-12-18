<?php

require "./assets/db/db.php";

// ============== GET all Category
$query = "select * from categories";
$category = mysqli_query($connect, $query);


// ============== GET Post By ID
if (isset($_GET['post_id'])) {
    $postId = (int)$_GET['post_id'];

    if ($postId) {
        $query = "SELECT * FROM posts WHERE post_id = $postId";
        $postById = mysqli_query($connect, $query);
        $getPost = mysqli_fetch_assoc($postById);
    }
}

// ============== GET Post By Category
if (isset($_GET['category_id'])) {
    $categoryId = (int)$_GET['category_id'];

    if ($categoryId) {
        $query = "SELECT * FROM posts WHERE post_category_id = $categoryId";
        $postById = mysqli_query($connect, $query);

        $relatedPosts = mysqli_fetch_all($postById, MYSQLI_ASSOC);

        if (empty($relatedPosts)) {
            $errors['category'] = 'post not found';
        }
    }
}

// ============== ADD Comment to Post
if (isset($_POST['submit_comnt'])) {
    $errors = [];

    $postId = (int)$_GET['post_id'];

    $comnt_content = $_POST['comnt_content'];
    $comnt_email   = $_POST['comnt_email'];
    $comnt_author  = $_POST['comnt_author'];

    if (empty($comnt_content) || strlen($comnt_content) <= 1) {
        $errors['content_error'] = 'Comment field cannot be empty';
    } else if (empty($comnt_email)) {
        $errors['email_error'] = 'Enter your email';
    } else {
        $query = "INSERT INTO `comments` (`comnt_post_id`, `comnt_content`, `comnt_email`, `comnt_author`, `comnt_status`, `comnt_date`) 
                  VALUES ('$postId', '$comnt_content', '$comnt_email', '$comnt_author', 'unapproved', now())";

        $send_query = mysqli_query($connect, $query);

        if (!$send_query) {
            die('Query Failed: ' . mysqli_error($connect));
        } else {
            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $postId";
            $update_query = mysqli_query($connect, $query);

            // Refresh the page with the desired URL structure
            header("Location: post.php?source=get_post&post_title=" . urlencode($_GET['post_title']) . "&post_id=$postId");
            exit;
        }
    }
}

// ============== GET Comment of Post
if (isset($_GET['post_id'])) {
    $getPostComnt = [];
    $postId = (int)$_GET['post_id'];

    if ($postId) {
        $query = "SELECT * FROM comments WHERE comnt_post_id = $postId AND comnt_status = 'approved' ORDER BY comnt_id DESC";
        $comntById = mysqli_query($connect, $query);
        $getPostComnt = mysqli_fetch_all($comntById, MYSQLI_ASSOC);
    } else {
        $getPostComnt = []; // Initialize as empty if no valid postId
        die('Query Failed: ' . mysqli_error($connect));
    }
}


// ============== Post Route
if (isset($_GET['source'])) {
    $source = $_GET['source'];

    if ($source === 'get_post') {
        require "./assets/components/view/getPost.view.php";
    } elseif ($source === 'post_by_category') {
        require "./assets/components/view/getPost.view.php";
    } else {
        require "./assets/components/view/getPost.view.php";
    }
}
