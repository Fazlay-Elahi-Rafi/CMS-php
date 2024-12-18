<?php

require "./assets/db/db.php";

// ============== GET Post
$query = "select * from posts";
$allPosts = mysqli_query($connect, $query);

// ============== GET Category
$query = "select * from categories";
$category = mysqli_query($connect, $query);


// ============== Create Post
if (isset($_POST['create_post'])) {
    $post_title        = $_POST['post_title'];
    $post_author       = $_POST['post_author'];
    $post_category_id  = $_POST['post_category_id'];
    $post_status       = $_POST['post_status'];

    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];

    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    $post_date         = date('d-m-y');

    move_uploaded_file($post_image_temp, "./assets/img/$post_image");

    if (empty($post_title) || strlen($post_title) <= 1) {
        $errors['title_error'] = 'Enter a valid title for post';
    } else if (empty($post_category_id)) {
        $errors['category_error'] = 'Please select a category for the post';
    } else {
        $query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) 
          VALUES ('$post_category_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', 0, '$post_status')";


        $send_query = mysqli_query($connect, $query);

        if (!$send_query) {
            die('Query Failed .' . mysqli_error($connect));
        } else {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

// ============== GET Post By ID
if (isset($_GET['post_id'])) {
    $postId = (int)$_GET['post_id'];

    if ($postId) {
        $query = "select * from posts WHERE post_id = '$postId' ";
        $postById = mysqli_query($connect, $query);
        $getPost = mysqli_fetch_assoc($postById);
    } else {
        header("Location: /cms/admin/post.php");
        exit;
    }
}

// ============== Edit Post
if (isset($_POST['edit_post'])) {
    $errors = [];
    $getPostEdit = (int)$_GET['post_id'];

    if ($getPostEdit) {
        $post_title        = $_POST['post_title'];
        $post_author       = $_POST['post_author'];
        $post_category_id  = $_POST['post_category_id'];
        $post_status       = $_POST['post_status'];

        $post_image        = $_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];

        $post_tags         = $_POST['post_tags'];
        $post_content      = $_POST['post_content'];
        $post_date         = date('d-m-y');


        // Fetch existing image
        $query = "SELECT post_image FROM posts WHERE post_id = $getPostEdit";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        $existing_image = $row['post_image'];

        if (!empty($post_image)) {
            // Delete old image if it exists
            $old_image_path = "./assets/img/$existing_image";
            if (file_exists($old_image_path) && !empty($existing_image)) {
                unlink($old_image_path);
            }

            // Move the new image to the folder
            move_uploaded_file($post_image_temp, "./assets/img/$post_image");
        } else {
            // Retain the existing image
            $post_image = $existing_image;
        }

        if (empty($post_title) || strlen($post_title) <= 1) {
            $errors['title_error'] = 'Enter a valid title for post';
        }

        if (empty($errors)) {
            // Update query
            $query = "UPDATE `posts` 
                  SET 
                      `post_category_id` = '$post_category_id', 
                      `post_title` = '$post_title', 
                      `post_author` = '$post_author', 
                      `post_image` = '$post_image', 
                      `post_content` = '$post_content', 
                      `post_tags` = '$post_tags', 
                      `post_status` = '$post_status', 
                      `post_date` = now() 
                  WHERE `post_id` = $getPostEdit";

            $send_query = mysqli_query($connect, $query);

            if (!$send_query) {
                die('Query Failed: ' . mysqli_error($connect));
            } else {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    }
}

// ============== Published Post
if (isset($_GET['published'])) {
    $getPost = (int)$_GET['published'];

    if ($getPost) {
        $query = "UPDATE posts SET post_status = 'published' WHERE post_id =  $getPost";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
// ============== Draft Post
if (isset($_GET['draft'])) {
    $getPost = (int)$_GET['draft'];

    if ($getPost) {
        $query = "UPDATE posts SET post_status = 'draft' WHERE post_id =  $getPost";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}


// ============== Delete Post
if (isset($_GET['del_post'])) {
    $deleteId = (int)$_GET['del_post'];

    if ($deleteId) {
        $query = "DELETE FROM posts WHERE post_id = $deleteId";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}


// ============== Post Route
if (isset($_GET['source'])) {
    $source = $_GET['source'];

    if ($source === 'add_post') {
        require "./assets/components/view/post/add-post.view.php";
    } elseif ($source === 'edit_post') {
        if ($postId) {
            require "./assets/components/view/post/edit-post.view.php";
        } else {
            header("Location: /cms/admin/post.php");
            exit;
        }
    }
} else {
    require "./assets/components/view/post.view.php";
}
