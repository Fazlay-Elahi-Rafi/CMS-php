<?php
$title = "Blog - PHP Template";
require "./assets/components/partials/head.php";
require "./assets/components/partials/nav.php";
?>


<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-8">
            <?php $source === 'get_post' ?
                require "./assets/components/view/posts/singlePost.view.php"
                : require "./assets/components/view/category.view.php" ?>

            <?php $source === 'post_by_category' ? ""
                : require "./assets/components/view/posts/comment.view.php" ?>
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
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<?php
require "./assets/components/partials/footer.php";
?>