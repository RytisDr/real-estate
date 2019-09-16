<?php
$sPageTitle = 'My Profile';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');

include_once(__DIR__ . '/components/html-nav.php');
if (!$_SESSION) {
    header('Location: /impereal-estate/login');
}
?>
<section id="userProfile">
    <h1>Edit Your Profile</h1>
    <div id="profileImgContainer">
        <img id="profileImg" src="images/default-profile-img.png" alt="">
        <!-- <label for="profileImageInput">Update the profile image.</label>
        <input type="file" name="profileImageInput" id="profileImgInput"> -->
    </div>
    <div class="profileEditInputs">
        <?php
        $sAccType = strval($_SESSION['accType']);
        $sjData = file_get_contents('data/data.json');
        $jData = json_decode($sjData);
        foreach ($jData->$sAccType as $sId => $jUser) {
            if ($sId == $_SESSION['userId']) {
                if (empty($jUser->firstName)) {
                    $jUser->firstName = '';
                }
                if (empty($jUser->lastName)) {
                    $jUser->lastName = '';
                }
                echo '
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" value="' . $jUser->firstName . '">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="' . $jUser->lastName . '">
                        <input type="email" name="email" id="email" placeholder="Email" value="' . $jUser->email . '">
                    ';
            }
        }

        ?>


        <!--  <label for="email">Email</label> -->

    </div>
    <h1>Or</h1>
    <button id="deleteProfileBtn">Delete Profile</button>
    <div id="deleteMessage">
        <h1>Are you sure you want to delete your profile?</h1>
        <button id="yes">Yes</button><button id="no">No</button>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/updateAcc.js"></script>
<script src="JS/deleteProfile.js"></script>
<script src="JS/activeLink.js"> </script>
<script>
    removeActiveClass()
    setActiveLink("navProfile");
</script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
