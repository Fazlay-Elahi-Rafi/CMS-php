<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="POST">
        <div class="form-group">
            <textarea class="form-control" name="comnt_content" rows="3" placeholder="Write comment"></textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="comnt_author" placeholder="your name">
        </div>
        <div class="form-group">
            <input class="form-control" type="email" name="comnt_email" placeholder="your email">
        </div>
        <button type="submit" name="submit_comnt" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->
<!-- Comment -->

<?php foreach ($getPostComnt as $comnt) : ?>
    <div class="media">
        <!-- <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="Avatar">
        </a> -->
        <div class="media-body">
            <h4 class="media-heading">
                <?= htmlspecialchars($comnt['comnt_author']) ?>
                <small><?= htmlspecialchars($comnt['comnt_date']) ?></small>
            </h4>
            <?= htmlspecialchars($comnt['comnt_content']) ?>
        </div>
    </div>
<?php endforeach; ?>