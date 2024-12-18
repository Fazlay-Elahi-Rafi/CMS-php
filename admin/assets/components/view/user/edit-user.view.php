<?php
$title = "Edit User - RAFI CMS Admin";
require "./assets/components/partials/head.php";
?>

<div id="wrapper">

    <!-- Navigation -->
    <?php require "./assets/components/partials/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit User
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="first_name" value="<?= isset($getUser['first_name']) ? htmlspecialchars($getUser['first_name']) : 'empty' ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" name="last_name" value="<?= isset($getUser['last_name']) ? htmlspecialchars($getUser['last_name']) : 'empty' ?>">
                        </div>

                        <div class="form-group">
                            <label for="category">Role</label>
                            <select class="form-control" name="role">
                                <option value="<?= $getUser['role'] ?>"><?= $getUser['role'] ?></option>

                                <option value="<?= $getUser['role'] === 'admin' ? "user" : "admin" ?>"><?= $getUser['role'] === 'admin' ? "user" : "admin" ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php if ($getUser['user_img'] !== 'undefined') : ?>
                                <img class="img-responsive" width="200" src="./assets/img/user/<?= $getUser['user_img'] ?>" alt="<?= $getUser['user_img'] ?>">
                                <input type="file" name="image">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="username">User name</label>
                            <input type="text" class="form-control" name="username" value="<?= isset($getUser['username']) ? htmlspecialchars($getUser['username']) : 'empty' ?>">

                            <?php if (isset($errors['username_error'])) : ?>
                                <p class="text-danger"><?= $errors['username_error'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= isset($getUser['email']) ? htmlspecialchars($getUser['email']) : 'empty' ?>">

                            <?php if (isset($errors['email_error'])) : ?>
                                <p class="text-danger"><?= $errors['email_error'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="<?= isset($getUser['password']) ? htmlspecialchars($getUser['password']) : 'empty' ?>">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./assets/components/partials/footer.php"; ?>