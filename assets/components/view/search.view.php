<?php
$title = isset($getSearch['post_title']) ? $getSearch['post_title'] : "CMS - PHP Template";
require "./assets/components/partials/head.php";
require "./assets/components/partials/nav.php";
?>


<!-- Page Content -->
<div class="container">
    <?php if (isset($errors['search'])) : ?>
        <h1 class="text-danger text-uppercase"><?= $errors['search'] ?></h1>
    <?php endif; ?>
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if (!empty($getSearch)) : ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
    
                <!-- First Blog Post -->
                <div class="content">
                    <h2>
                        <a href="#"><?= $getSearch['post_title'] ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?= $getSearch['post_author'] ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $getSearch['post_date'] ?></p>
                    <hr>
                    <img class="img-responsive w-100 h-75" src="./assets/img/<?= $getSearch['post_image'] ?>" alt="<?= $getSearch['post_image'] ?>">
                    <hr>
                    <p>
                        <?= $getSearch['post_content'] ?>
                    </p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
                </div>
            <?php endif; ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        require "./assets/components/page/sidebar.php";
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->


<?php
require "./assets/components/partials/footer.php";
?>