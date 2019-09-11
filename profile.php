<?php
$sPageTitle = 'My Profile';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
?>
<section id="userProfile">
    <h1>Edit your profile</h1>
    <div id="profileImgContainer">
        <img id="profileImg" src="images/default-profile-img.png" alt="">
        <label for="profileImageInput">Update the profile image.</label>
        <input type="file" name="profileImageInput" id="profileImgInput">
    </div>
    <div class="profileEditInputs" data-account-type="<?= $_SESSION['accType'] ?>" data-id="<?= $_SESSION['userId'] ?>">
        <label for="firstName">First Name</label>
        <?php
        $sAccType = strval($_SESSION['accType']);
        $sjData = file_get_contents('data/data.json'); //text from file
        $jData = json_decode($sjData);
        foreach ($jData->$sAccType as $sId => $jUser) {
            if ($sId == $_SESSION['userId']) {
                echo '<input type="text" id="firstName" name="firstName" value="' . $jUser->firstName . '">';
            }
        }

        ?>

        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" value="XXXXXX">
        <label for="email">Email (requires verification)</label>
        <input type="email" name="email" id="email" value="<?= $_SESSION['userProps']->email ?>">
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/updateAcc.js"></script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
