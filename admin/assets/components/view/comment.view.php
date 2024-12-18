<?php
$title = "Post - RAFI CMS Admin";
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
                            Welcome to Comments
                            <small>Subheading</small>
                        </h1>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Post ID</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allComment as $comnt) : ?>
                                <tr>
                                    <td><?= $comnt['comnt_id'] ?></td>
                                    <td><?= $comnt['comnt_author'] ?></td>
                                    <td style="min-width: 80px;"><?= $comnt['comnt_post_id'] ?></td>
                                    <td><?= $comnt['comnt_email'] ?></td>
                                    <td><?= $comnt['comnt_content'] ?></td>
                                    <td style="min-width: 100px;">
                                        <span class="<?= $comnt['comnt_status'] === 'approved' ? "text-success" : "text-danger" ?>">
                                            <?= $comnt['comnt_status'] ?>
                                        </span>
                                    </td>
                                    <td style="min-width: 100px;"><?= $comnt['comnt_date'] ?></td>
                                    <td>
                                        <a href="?approve=<?= $comnt['comnt_id'] ?>">Approve</a>
                                    </td>
                                    <td>
                                        <a href="?unapprove=<?= $comnt['comnt_id'] ?>">Unapprove</a>
                                    </td>
                                    <td style="min-width: 150px;">
                                        <a href="?del_comnt=<?= $comnt['comnt_id'] ?>" class="btn btn-danger">Delete</a>

                                        <a href="../post.php?source=get_post&post_id=<?= $comnt['comnt_post_id'] ?>" class="btn btn-success">View</a>
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