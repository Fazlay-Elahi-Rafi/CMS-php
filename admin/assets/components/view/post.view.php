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
                            Welcome to Post
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-4" style="display: flex; align-items:end; justify-content: space-between;">
                            <div class="col-xs-9" id="bulkOptionContainer" style="display: flex; gap: 10px; align-items:end; justify-content: space-between;">
                                <select class="form-control" name="" id="">
                                    <option value="">Select Option</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                </select>
                                <input type="submit" name="submit" class="btn btn-info" value="Apply">
                            </div>
                            <a href="?source=add_post" class="btn btn-success" style="font-weight: 700;">Add Posts</a>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Draft</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allPosts as $post) : ?>
                                <tr>
                                    <td><?= $post['post_id'] ?></td>
                                    <td><?= $post['post_author'] ?></td>
                                    <td><?= $post['post_title'] ?></td>
                                    <td>
                                        <?php foreach ($category as $cate) : ?>
                                            <?= $post['post_category_id'] === $cate['cat_id'] ? $cate['cat_title'] : "" ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <img class="img-responsive" width="130" src="./assets/img/<?= $post['post_image'] ?>" alt="<?= $post['post_image'] ?>">
                                    </td>
                                    <td><?= $post['post_tags'] ?></td>
                                    <td><?= $post['post_comment_count'] ?></td>
                                    <td><?= $post['post_date'] ?></td>
                                    <td><?= $post['post_status'] ?></td>
                                    <td>
                                        <a href="?published=<?= $post['post_id'] ?>">Published</a>
                                    </td>
                                    <td>
                                        <a href="?draft=<?= $post['post_id'] ?>">Draft</a>
                                    </td>
                                    <td>
                                        <a href="?del_post=<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                                        <a href="?source=edit_post&post_id=<?= $post['post_id'] ?>" class="btn btn-info">Edit</a>
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