<?php
$title = "User - RAFI CMS Admin";
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
                    <div class="page-header" style="display: flex; align-items:end; justify-content: space-between;">
                        <h1>
                            Welcome to User
                            <small>Subheading</small>
                        </h1>
                        <a href="user.php?source=add_user" class="btn btn-success" style="font-weight: 700;">Add Users</a>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>First_Name</th>
                                <th>Last_Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Promote</th>
                                <th>Demote</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allUsers as $user) : ?>
                                <tr>
                                    <td><?= $user['user_id'] ?></td>
                                    <td>
                                        <?php if ($user['user_img']) : ?>
                                            <img class="img-responsive" src="./assets/img/user/<?= $user['user_img'] ?>" alt="<?= $user['user_img'] ?>" style="width:80px; height: 80px; border-radius: 100%;">
                                        <?php else : ?>
                                            Image not set
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['first_name'] ?></td>
                                    <td><?= $user['last_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['role'] ?></td>
                                    <td>
                                        <a href="?promote=<?= $user['user_id'] ?>">Promote</a>
                                    </td>
                                    <td>
                                        <a href="?demote=<?= $user['user_id'] ?>">Demote</a>
                                    </td>
                                    <td>
                                        <a href="?del_user=<?= $user['user_id'] ?>" class="btn btn-danger">Delete</a>
                                        <a href="?source=edit_user&user_id=<?= $user['user_id'] ?>" class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./assets/components/partials/footer.php"; ?>