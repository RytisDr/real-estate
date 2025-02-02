<?php
$sPageTitle = 'My Properties';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
if ($_SESSION['accType'] != 'agents') {
    header("Location: /impereal-estate/agent/agent-login-form");
}
?>
<div id="myPropContainer"></div>
<div class="addPropertyContainer">
    <form id="addPropertyForm">
        <div id="inputFileCont">
            <label for="mainPropertyImg">Choose an image</label>
            <input id="overlayInput" value="">

            <input type="file" name="mainPropertyImg" id="mainImg">
        </div>
        <input type="text" id="propertyTitleInput" name="title" placeholder="Title">
        <input type="number" id="priceInput" name="price" placeholder="Price">
        <input name="longitude" type="number" placeholder="Longitude" id="propertyLongitudeInput">
        <input name="latitude" type="number" placeholder="Latitude" id="propertyLatitudeInput">
        <input name="zipcode" type="number" maxlength="4" placeholder="ZIP" id="propertyZipInput">
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
                <input data-update="title" name="title" type="text" value="' . $jProperty->title . '" required>
                <input data-update="price" name="price" type="number" value="' . $jProperty->price . '">
                <input data-update="long" name="longitude" type="number" placeholder="Longitude" value="' . $jProperty->geometry->coordinates[0] . '" id="">
                <input data-update="lat" name="latitude" type="number" placeholder="Latitude" value="' . $jProperty->geometry->coordinates[1] . '" id="">
                <input name="zipcode" type="number" maxlength="4" placeholder="ZIP" value="' . $jProperty->zip . '">
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
<script src="JS/activeLink.js"> </script>
<script>
    removeActiveClass()
    setActiveLink("navMyProperties");
    let fileInput = document.getElementById('mainImg')
    fileInput.onchange = function() {
        document.getElementById('overlayInput').value = fileInput.files[0].name;
    }
</script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
