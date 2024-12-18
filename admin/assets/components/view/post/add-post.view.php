<?php
$title = "Create Post - RAFI CMS Admin";
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
                        Create Post
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="post_title" placeholder="add post title">
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="post_category_id">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $cate) : ?>
                                    <option value="<?= $cate['cat_id'] ?> "><?= $cate['cat_title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['category_error'])) : ?>
                                <p class="text-danger"><?= $errors['category_error'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="users">Users</label>
                            <input type="text" class="form-control" name="post_author" placeholder="post author">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="post_status">
                                <option value="status">Post Status</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-control" name="post_content" cols="30" rows="10"></textarea>
                        </div>



                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./assets/components/partials/footer.php"; ?>