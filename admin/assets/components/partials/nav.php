   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="/cms">MD Admin</a>
       </div>
       <!-- Top Menu Items -->
       <ul class="nav navbar-right top-nav">
           <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['username'] ?> <b class="caret"></b></a>
               <ul class="dropdown-menu">
                   <li>
                       <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                   </li>
                   <li class="divider"></li>
                   <li>
                       <a href="/cms/admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                   </li>
               </ul>
           </li>
       </ul>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
           <ul class="nav navbar-nav side-nav">
               <li class="active">
                   <a href="/cms/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
               </li>
               <li>
                   <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                   <ul id="post" class="collapse">
                       <li>
                           <a href="/cms/admin/post.php">View All Post</a>
                       </li>
                       <li>
                           <a href="post.php?source=add_post">Add Posts</a>
                       </li>
                       <li>
                           <a href="post.php?source=edit_post">Edit Posts</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="/cms/admin/category.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
               </li>

               <li>
                   <a href="/cms/admin/comment.php"><i class="fa fa-fw fa-file"></i> Comment</a>
               </li>
               <li>
                   <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                   <ul id="users" class="collapse">
                       <li>
                           <a href="/cms/admin/user.php">View All User</a>
                       </li>
                       <li>
                           <a href="user.php?source=add_user">Add Users</a>
                       </li>
                   </ul>
               </li>
               <li>
                   <a href="#"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
               </li>
           </ul>
       </div>
       <!-- /.navbar-collapse -->
   </nav>