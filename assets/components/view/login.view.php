       <div class="well">
           <h4>Login</h4>
           <form method="POST">
               <div class="form-group">
                   <input type="email" name="email" class="form-control" placeholder="enter your email">
               </div>
               <div class="form-group">
                   <input type="password" name="password" class="form-control" placeholder="password">
               </div>
               <?php if (isset($errors['is_empty'])) : ?>
                   <p class="text-danger"><?= $errors['is_empty'] ?></p>
               <?php endif; ?>
               <?php if (isset($errors['not_found'])) : ?>
                   <p class="text-danger"><?= $errors['not_found'] ?></p>
               <?php endif; ?>

               <button class="btn btn-primary" name="signin" type="submit">SingIn</button>
           </form>
       </div>