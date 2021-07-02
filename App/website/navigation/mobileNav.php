 <!-- menu mobie right -->

 (empty($farmer_data)) ? $hide = false : $hide = true;
 <div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up active d-md-none">
     <div class="content-boxpage col">
         <div class="box-header d-flex justify-content-between align-items-center">
             <div class="title-box">

                 <?php
                    if ($hide) {
                        echo $farmer_data['farmer_name'];
                    } else {
                        echo 'Welcome';
                    }
                    ?>
             </div>
             <div class="close-box">Close</div>
         </div>
         <div class="box-content">
             <nav>
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <div id="megamenu" class="nov-megamenu clearfix">
                     <ul class="menu level1">
                         <li class="item home-page has-sub">

                             <a href="index.php" title="Home">
                                 <i class="fa fa-users" aria-hidden="true"></i>Agronomonists</a>
                         </li>
                         <li class="item has-sub">

                             <a href="learn.php" title="Blog">
                                 <i class="fa fa-book" aria-hidden="true"></i>Learning</a>


                         </li>
                         <li class="item  has-sub">

                             <a href="#" title="Page">
                                 <i class="fa fa-car" aria-hidden="true"></i>Service Provider</a>

                         </li>

                         <?php
                            if (!$hide) {
                            ?>
                             <li class="item  has-sub">

                                 <a href="login.php" title="Page">
                                     <i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>

                             </li>
                             <li class="item  has-sub">

                                 <a href="register.php" title="Page">
                                     <i class="fa fa-user" aria-hidden="true"></i>Register</a>

                             </li>
                         <?php
                            } else {
                            ?>
                             <li class="item  has-sub">

                                 <a href="account.php" title="Page">
                                     <i class="fa fa-sign-in" aria-hidden="true"></i>My Actount</a>

                             </li>
                             <li class="item  has-sub">

                                 <a href="logout.php" title="Page">
                                     <i class="fa fa-cog" aria-hidden="true"></i>Logout</a>

                             </li>
                         <?php
                            }
                            ?>

                     </ul>
                 </div>
             </nav>
         </div>
     </div>
 </div>