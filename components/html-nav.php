<nav>
    <?php session_start();
    ?>
    <a id="navProperties" href="/impereal-estate/index">Properties</a>
    <a id="navLogInOut" href=<?= $_SESSION ? '/impereal-estate/global-php-functions/logout' : '/impereal-estate/login';
                                ?>>
        <?= $_SESSION ? 'Logout' : 'Login';
        ?>
    </a>
    <?= $_SESSION ? null : '<a id="navSignup" href="/impereal-estate/signup">Signup</a>' ?>
    <?= $_SESSION ? '<a id="navProfile" href="/impereal-estate/profile">Profile</a>' : null ?>
    <?= empty($_SESSION['accType']) ? null : $_SESSION['accType'] == 'agents' ? '<a id="navMyProperties" href="/impereal-estate/my-properties">My Properties</a>' : null ?>
</nav>