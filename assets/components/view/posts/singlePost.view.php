<!-- Title -->
<h1><?= $getPost['post_title'] ?></h1>

<!-- Author -->
<p class="lead">
    by <a href="#"><?= $getPost['post_author'] ?></a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on <?= $getPost['post_date'] ?></p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="./assets/img/<?= $getPost['post_image'] ?>" alt="<?= $getPost['post_image'] ?>" alt="" style="height: 300px; width: 100%;">

<hr>

<!-- Post Content -->
<p><?= $getPost['post_content'] ?></p>

<hr>

<!-- Posted Comments -->