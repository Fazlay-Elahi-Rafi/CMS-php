   <div class="col-md-4">
       <!-- Blog Search Well -->
       <div class="well">
           <h4>Blog Search</h4>
           <form action="/cms/search.php" method="POST">
               <div class="input-group">
                   <input type="text" name="search" placeholder="search here..." class="form-control">
                   <span class="input-group-btn">
                       <button class="btn btn-default" name="submit" type="submit">
                           <span class="glyphicon glyphicon-search"></span>
                       </button>
                   </span>
               </div>
           </form>
       </div>

       <?php require "./login.php"; ?>

       <!-- Blog Categories Well -->
       <div class="well">
           <h4>Blog Categories</h4>
           <div class="row">
               <div class="col-lg-6">
                   <ul class="list-unstyled">
                       <?php foreach ($category as $cate) : ?>
                           <li>
                               <a href="post.php?source=post_by_category&category_id=<?= $cate['cat_id'] ?>">
                                   <?= $cate['cat_title'] ?>
                               </a>
                           </li>
                       <?php endforeach; ?>
                   </ul>
               </div>
           </div>
           <!-- /.row -->
       </div>

       <!-- Side Widget Well -->
       <div class="well">
           <h4>Side Widget Well</h4>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
       </div>

   </div>