<?php

require "./assets/db/db.php";

// ============== GET Comments
$query = "select * from comments";
$allComment = mysqli_query($connect, $query);


// ============== Unapprove Comment
if (isset($_GET['unapprove'])) {
    $getComnt = (int)$_GET['unapprove'];

    if ($getComnt) {
        $query = "UPDATE comments SET comnt_status = 'unapproved' WHERE comnt_id =  $getComnt";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
// ============== Approve Comment
if (isset($_GET['approve'])) {
    $getComnt = (int)$_GET['approve'];

    if ($getComnt) {
        $query = "UPDATE comments SET comnt_status = 'approved' WHERE comnt_id =  $getComnt";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// ============== Delete Comment
if (isset($_GET['del_comnt'])) {
    $deleteId = (int)$_GET['del_comnt'];

    if ($deleteId) {
        $query = "DELETE FROM comments WHERE comnt_id = $deleteId";
        $sendQuery = mysqli_query($connect, $query);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

require "./assets/components/view/comment.view.php";
