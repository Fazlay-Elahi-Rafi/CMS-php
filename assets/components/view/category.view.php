  <?php if (!empty($relatedPosts)) : ?>
      <div class="content">
          <?php foreach ($relatedPosts as $post) : ?>
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
          <?php endforeach; ?>
      </div>

      <hr>
  <?php endif; ?>

  <?php if (isset($errors['category'])) : ?>
      <h1 class="text-danger text-uppercase"><?= $errors['category'] ?></h1>
      <a href="/cms/" class="btn btn-success text-uppercase">back to home</a>
  <?php endif; ?>

  <!-- Posted Comments -->