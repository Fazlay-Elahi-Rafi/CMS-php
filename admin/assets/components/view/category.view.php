<?php
$title = "Category - RAFI CMS Admin";
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
                        Welcome to Category
                        <small>Subheading</small>
                    </h1>

                    <div class="col-xs-6">
                        <!-- ====================== 
                          ADD Category 
                        ====================== -->
                        <form method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" placeholder="add category title">
                            </div>
                            <?php if (isset($errors['title_error'])) : ?>
                                <p class="text-danger"><?= $errors['title_error'] ?></p>
                            <?php endif; ?>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- ====================== 
                          Update Category 
                        ====================== -->
                        <?php if ($getCat): ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Update Category</label>
                                    <input class="form-control" type="text" name="cat_title" value="<?= isset($getCat['cat_title']) ? htmlspecialchars($getCat['cat_title']) : '' ?>">
                                </div>
                                <?php if (isset($errors['update_error'])) : ?>
                                    <p class="text-danger"><?= $errors['update_error'] ?></p>
                                <?php endif; ?>
                                <div class="form-group">
                                    <input class="btn btn-secondary" type="submit" name="update" value="Update">
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>

                    <!-- ====================== 
                        GET Category 
                    ====================== -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($category as $cate) : ?>
                                    <tr>
                                        <td><?= $cate['cat_id'] ?></td>
                                        <td><?= $cate['cat_title'] ?></td>
                                        <td>
                                            <a href="?del_cat=<?= $cate['cat_id'] ?>" class="btn btn-danger">Delete</a>
                                            <a href="?single_cat=<?= $cate['cat_id'] ?>" class="btn btn-success">Edit</a>
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
</div>


<?php require "./assets/components/partials/footer.php"; ?>