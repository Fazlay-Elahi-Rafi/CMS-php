<?php

require "./assets/db/db.php";

if (isset($_POST['signin'])) {
    $errors = [];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $errors["is_empty"] = 'Please fill in all fields.';
    }

    $user_email = mysqli_real_escape_string($connect, $email);
    $user_pass = mysqli_real_escape_string($connect, $password);

    $query = "SELECT * FROM users WHERE email = '{$user_email}'";
    $sendQuery = mysqli_query($connect, $query);

    if (!$sendQuery) {
        die('Query Failed: ' . mysqli_error($connect));
    }

    // Check if the user exists
    if (mysqli_num_rows($sendQuery) === 0) {
        $errors["not_found"] = 'User does not exist.';
    } else {
        while ($row = mysqli_fetch_array($sendQuery, MYSQLI_ASSOC)) {
            $_SESSION['user_id']       = $row['user_id'];
            $_SESSION['username']      = $row['username'];
            $_SESSION['first_name']    = $row['first_name'];
            $_SESSION['last_name']     = $row['last_name'];
            $_SESSION['email']         = $row['email'];
            $_SESSION['role']          = $row['role'];
        }
    }
}


require "./assets/components/view/login.view.php";
