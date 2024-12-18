<?php

require "./assets/db/db.php";

// ============== GET User
$query = "select * from users";
$allUsers = mysqli_query($connect, $query);

// ============== Create User
if (isset($_POST['create_user'])) {
    $user_username     = $_POST['username'];
    $first_name        = $_POST['first_name'];
    $last_name         = $_POST['last_name'];
    $password          = $_POST['password'];
    $email             = $_POST['email'];
    $role              = $_POST['role'];

    $user_img        = $_FILES['image']['name'];
    $user_img_temp   = $_FILES['image']['tmp_name'];

    move_uploaded_file($user_img_temp, "./assets/img/user/$user_img");

    if (empty($user_username) || strlen($user_username) <= 1) {
        $errors['username_error'] = 'Enter a valid name';
    } else if (empty($email)) {
        $errors['email_error'] = 'Enter a email';
    } else {
        $query = "INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`, `email`, `role`, `user_img`) VALUES ('$user_username', '$first_name', '$last_name', '$password', '$email', '$role', '$user_img')";

        $send_query = mysqli_query($connect, $query);

        if (!$send_query) {
            die('Query Failed .' . mysqli_error($connect));
        } else {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

// ============== GET User By ID
if (isset($_GET['user_id'])) {
    $userId = (int)$_GET['user_id'];

    if ($userId) {
        $query = "select * from users WHERE user_id = '$userId' ";
        $userById = mysqli_query($connect, $query);
        $getUser = mysqli_fetch_assoc($userById);
    } else {
        header("Location: /cms/admin/user.php");
        exit;
    }
}

// ============== Promote User
if (isset($_GET['promote'])) {
    $get_user_id = (int)$_GET['promote'];

    if ($get_user_id) {
        $query = "UPDATE users SET role = 'admin' WHERE user_id =  $get_user_id";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// ============== Demote User
if (isset($_GET['demote'])) {
    $get_user_id = (int)$_GET['demote'];

    if ($get_user_id) {
        $query = "UPDATE users SET role = 'user' WHERE user_id =  $get_user_id";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// ============== Edit Post
if (isset($_POST['edit_user'])) {
    $errors = [];
    $getEditUserId = (int)$_GET['user_id'];

    if ($getEditUserId) {
        $user_username     = $_POST['username'];
        $first_name        = $_POST['first_name'];
        $last_name         = $_POST['last_name'];
        $password          = $_POST['password'];
        $email             = $_POST['email'];
        $role              = $_POST['role'];

        $user_img          = $_FILES['image']['name'];
        $user_img_temp     = $_FILES['image']['tmp_name'];

        // Fetch existing image
        $query = "SELECT user_img FROM users WHERE user_id = $getEditUserId";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        $existing_image = $row['user_img'];

        if (!empty($user_img)) {
            // Delete old image if it exists
            $old_image_path = "./assets/img/user/$existing_image";
            if (file_exists($old_image_path) && !empty($existing_image)) {
                unlink($old_image_path);
            }

            // Move the new image to the folder
            move_uploaded_file($user_img_temp, "./assets/img/user/$user_img");
        } else {
            // Retain the existing image
            $user_img = $existing_image;
        }

        // Validate input fields
        if (empty($user_username) || strlen($user_username) <= 1) {
            $errors['username_error'] = 'Enter a valid username';
        } else if (empty($email)) {
            $errors['email_error'] = 'Enter a valid email';
        }

        if (empty($errors)) {
            // Update query
            $query = "UPDATE `users` 
                  SET 
                      `username` = '$user_username', 
                      `first_name` = '$first_name', 
                      `last_name` = '$last_name', 
                      `user_img` = '$user_img', 
                      `password` = '$password', 
                      `email` = '$email', 
                      `role` = '$role'
                  WHERE `user_id` = $getEditUserId";

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

// ============== Delete User
if (isset($_GET['del_user'])) {
    $deleteId = (int)$_GET['del_user'];

    if ($deleteId) {
        // Fetch the user's image name from the database
        $query = "SELECT user_img FROM users WHERE user_id = $deleteId";
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userImg = $row['user_img'];

            $filePath = "./assets/img/user/$userImg";
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Proceed to delete the user from the database
        $query = "DELETE FROM users WHERE user_id = $deleteId";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}



// ============== User Route
if (isset($_GET['source'])) {
    $source = $_GET['source'];

    if ($source === 'add_user') {
        require "./assets/components/view/user/add-user.view.php";
    } elseif ($source === 'edit_user') {
        if ($userId) {
            require "./assets/components/view/user/edit-user.view.php";
        } else {
            header("Location: /cms/admin/user.php");
            exit;
        }
    }
} else {
    require "./assets/components/view/user.view.php";
}
