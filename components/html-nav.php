<nav>
    <?php ///$sBaseDirectory = __DIR__  Why DIR is not allowed in hrefs
    ?>
    <a id="navProperties" href="/impereal-estate/index.php">Properties</a>
    <a id="navLogInOut" href=<?php session_start();
                                echo $_SESSION ? '/impereal-estate/global-php-functions/logout.php' : '/impereal-estate/login.php';
                                ?>>
        <?= $_SESSION ? 'Logout' : 'Login';
        ?>
    </a>
    <?= $_SESSION ? null : '<a id="navSignup" href="/impereal-estate/signup.php">Signup</a>' ?>
    <?= $_SESSION ? '<a id="navProfile" href="/impereal-estate/profile.php">Profile</a>' : null ?>
</nav>