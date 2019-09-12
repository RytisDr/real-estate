<?php

/* if (empty($_SESSION)) {
    header("Location: /impereal-estate/");
} */
$sPageTitle = 'My Properties';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
?>
<form>
    <div class="addPropertyContainer">
        <input type="file" name="mainPropertyImg" id="mainImg">
        <input type="text" id="propertyTitleInput" name="title" placeholder="Title">
        <input type="number" id="price" name="price" placeholder="Price">
        <button id="btnAddProperty">Add a Property</button>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/addProperty.js"></script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
