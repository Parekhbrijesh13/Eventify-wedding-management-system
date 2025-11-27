<?php
session_start();
?>
<nav>
    <!-- Your nav content -->

    <?php if(isset($_SESSION['admin_id'])): ?>
        <!-- Admin logged in -->
        <div class="dropdown">
            <a class="btn-login" href="admindashboard.php">Admin Panel</a>
            
        </div>

    <?php elseif(isset($_SESSION['user_id'])): ?>
        <!-- User logged in -->
        <div class="dropdown">
            <a class="btn-login" href="dashboard.php">Your Profile</a>
        </div>

    <?php else: ?>
        <!-- No one logged in -->
        <a class="btn-login" href="login.php">Login Here</a>
    <?php endif; ?>
</nav>
