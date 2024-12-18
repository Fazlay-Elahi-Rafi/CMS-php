<?php
$title = "CMS - PHP Template";
require "./assets/components/partials/head.php";
require "./assets/components/partials/nav.php";
?>


<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php foreach ($getPost as $post) : ?>
                <div class="content">
                    <h2>
                        <a href="post.php?source=get_post&post_title=<?= urlencode($post['post_title']) ?>&post_id=<?= $post['post_id'] ?>">
                            <?= htmlspecialchars($post['post_title']) ?>
                        </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?= $post['post_author'] ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post['post_date'] ?></p>
                    <hr>
                    <img class="img-responsive w-100 h-75" src="./assets/img/<?= $post['post_image'] ?>" alt="<?= $post['post_image'] ?>">
                    <hr>
                    <p>
                        <?= $post['post_content'] ?>
                    </p>
                    <a class="btn btn-primary" href="post.php?source=get_post&post_title=<?= urlencode($post['post_title']) ?>&post_id=<?= $post['post_id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                </div>
            <?php endforeach; ?>
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