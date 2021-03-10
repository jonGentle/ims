<!-- navbar -->
<div class="navbar navbar-dark navbar-static-top" role="navigation">
    <div class="container-fluid">
 
        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 
            <!-- Change "Your Site" to your site name -->
            <a class="navbar-brand" href="<?php echo $home_url; ?>">Inventory Management System</a>
        </div>
        <?php
            // login and logout options will be here 
            // check if users / customer was logged in
// if user was logged in, show "Edit Profile", "Orders" and "Logout" options
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer')
    ?>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
        <li <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <?php echo $_SESSION['firstname']; ?>
                  <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo $home_url; ?>logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
   <!-- end nav-collapse -->
             
        </div>
 
    </div>
    <!-- end navbar -->
</div>
