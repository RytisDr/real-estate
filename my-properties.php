<?php
$sPageTitle = 'My Properties';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
if ($_SESSION['accType'] != 'agents') {
    header("Location: /impereal-estate/");
}
?>
<div class="addPropertyContainer">
    <form id="addPropertyForm">
        <input type="file" name="mainPropertyImg" id="mainImg">
        <input type="text" id="propertyTitleInput" name="title" placeholder="Title">
        <input type="number" id="price" name="price" placeholder="Price">
        <button id="btnAddProperty">Add a Property</button>
    </form>
</div>
<div id="propertiesContainer" data-acc-type="<?= $_SESSION['accType'] ?>" data-owner="<?= $_SESSION['userID'] ?>">
    <?php

    $sAgentId = strval($_SESSION['userId']);
    $sjData = file_get_contents(__DIR__ . '../data/data.json'); //text from file
    $jData = json_decode($sjData); //convert text to JSON
    if (!empty($jData->agents->$sAgentId->properties)) {
        foreach ($jData->agents->$sAgentId->properties as $sId => $jProperty) {
            echo '   
            <div class="property"  id="' . $sId . '">
                <img src="images/' . $jProperty->image . '" alt="">
                <input data-update="title" name="title" type="text" value="' . $jProperty->title . '" id="">
                <input data-update="price" name="price" type="number" value="' . $jProperty->price . '" id="">
            </div>';
        }
    }

    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/addProperty.js"></script>
<script src="JS/updateProperty.js"></script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
