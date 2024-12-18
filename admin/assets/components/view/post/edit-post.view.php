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
                    <h1 class="page-header">
                        Edit Post
                    </h1>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="post_title" value="<?= isset($getPost['post_title']) ? htmlspecialchars($getPost['post_title']) : 'empty' ?>">
                        </div>

                        <div class="form-group">
                            <label for="category">Post Category ID</label>

                            <select class="form-control" name="post_category_id">
                                <?php foreach ($category as $cate) : ?>
                                    <option value="<?= $cate['cat_id'] ?> "><?= $cate['cat_title'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="users">Users</label>
                            <input type="text" class="form-control" name="post_author" value="<?= isset($getPost['post_author']) ? htmlspecialchars($getPost['post_author']) : 'empty' ?>">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="post_status">
                                <option value="draft">Post Status</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <?php if($getPost['post_image'] !== 'undefined') : ?>
                            <img class="img-responsive" width="400" src="./assets/img/<?= $getPost['post_image'] ?>" alt="<?= $getPost['post_image'] ?>">
                            <input type="file" name="image">
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags" value="<?= isset($getPost['post_tags']) ? htmlspecialchars($getPost['post_tags']) : 'empty' ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-control" name="post_content" cols="30" rows="10"><?= isset($getPost['post_content']) ? htmlspecialchars($getPost['post_content']) : 'empty' ?></textarea>

                        </div>



                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_post" value="Save Change">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./assets/components/partials/footer.php"; ?>