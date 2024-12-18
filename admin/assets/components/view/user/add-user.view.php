<?php
$title = "Create User - RAFI CMS Admin";
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
                        Create User
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="enter firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="enter lastname">
                        </div>

                        <div class="form-group">
                            <label for="category">Role</label>
                            <select class="form-control" name="role">
                                <option value="select role">Select Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_img">User Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="username">User name</label>
                            <input type="text" class="form-control" name="username" placeholder="enter username">

                            <?php if (isset($errors['username_error'])) : ?>
                                <p class="text-danger"><?= $errors['username_error'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="enter email">

                            <?php if (isset($errors['email_error'])) : ?>
                                <p class="text-danger"><?= $errors['email_error'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="enter password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="create_user" value="Create">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./assets/components/partials/footer.php"; ?>