<nav>
    <?php ///$sBaseDirectory = __DIR__  Why DIR is not allowed in hrefs
    ?>
    <a id="properties" href="/impereal-estate/index.php">Properties</a>
    <a id="logInOut" href=<?php session_start();
                            echo $_SESSION ? '/impereal-estate/global-php-functions/logout.php' : '/impereal-estate/login.php';
                            ?>>
        <?= $_SESSION ? 'Logout' : 'Login';
        ?>
    </a>
    <?= $_SESSION ? null : '<a id="signup" href="/impereal-estate/signup.php">Signup</a>' ?>
</nav>