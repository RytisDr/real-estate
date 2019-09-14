<?php
$sPageTitle = 'My Properties';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
if ($_SESSION['accType'] != 'agents') {
    header("Location: /impereal-estate/agent/agent-login-form");
}
?>
<div class="addPropertyContainer">
    <form id="addPropertyForm">
        <input type="file" name="mainPropertyImg" id="mainImg">
        <input type="text" id="propertyTitleInput" name="title" placeholder="Title">
        <input type="number" id="priceInput" name="price" placeholder="Price">
        <input name="longitude" type="number" placeholder="Longitude" id="propertyLongitudeInput">
        <input name="latitude" type="number" placeholder="Latitude" id="propertyLatitudeInput">
        <button id="btnAddProperty">Add a Property</button>
    </form>
</div>
<div id="propertiesContainer">
    <?php

    $sAgentId = strval($_SESSION['userId']);
    $sjData = file_get_contents(__DIR__ . '../data/data.json'); //text from file
    $jData = json_decode($sjData); //convert text to JSON
    if (!empty($jData->agents->$sAgentId->properties)) {
        foreach ($jData->agents->$sAgentId->properties as $sId => $jProperty) {
            echo '   
            <div class="property"  id="' . $sId . '">
                <img src="images/' . $jProperty->image . '" alt="">
                <input data-update="title" name="title" type="text" value="' . $jProperty->title . '" id="" required>
                <input data-update="price" name="price" type="number" value="' . $jProperty->price . '" id="">
                <input data-update="long" name="longitude" type="number" placeholder="Longitude" value="' . $jProperty->geometry->coordinates[0] . '" id="">
                <input data-update="lat" name="latitude" type="number" placeholder="Latitude" value="' . $jProperty->geometry->coordinates[1] . '" id="">
                <button id="deletePropertyBtn">Remove This Property</button>
            </div>';
        }
    }

    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/addProperty.js"></script>
<script src="JS/updateProperty.js"></script>
<script src="JS/deleteProperty.js"></script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
