<nav>
    <?php session_start();
    ?>
    <a id="navProperties" href="/impereal-estate/index.php">Properties</a>
    <a id="navLogInOut" href=<?= $_SESSION ? '/impereal-estate/global-php-functions/logout.php' : '/impereal-estate/login.php';
                                ?>>
        <?= $_SESSION ? 'Logout' : 'Login';
        ?>
    </a>
    <?= $_SESSION ? null : '<a id="navSignup" href="/impereal-estate/signup.php">Signup</a>' ?>
    <?= $_SESSION ? '<a id="navProfile" href="/impereal-estate/profile.php">Profile</a>' : null ?>
    <?= empty($_SESSION['accType']) ? null : $_SESSION['accType'] == 'agents' ? '<a id="navMyProperties" href="/impereal-estate/my-properties.php">My Propeties</a>' : null ?>
</nav>