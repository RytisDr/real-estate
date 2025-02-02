<?php
$sPageTitle = 'Properties';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
include_once(__DIR__ . '/global-php-functions/functions.php')
?>

<div id="indexBodyCont">
    <div id="indexMapContainer">

    </div>
    <div id="rightContainer">
        <form id="frmSearch">
            <input name="search" id="txtSearch" type="text" placeholder="Search By Zipcode">
        </form>
        <div id="results"></div>
        <div id="indexPropertiesContainer">

            <?php
            $sDataPath = __DIR__ . '/data/data.json';
            $jData = getAndDecodeToJSON($sDataPath);
            foreach ($jData->agents as $sAgentId => $agent) {
                $sAgentEmail = $agent->email;
                if (!empty($agent->properties)) {
                    $aPropertiesArray = array();
                    foreach ($agent->properties as $sPropId => $jProperty) {
                        //create properties, put them in array for later use in JS
                        $newProp = new stdClass();
                        $newProp = $jProperty;
                        $newProp->id = $sPropId;

                        array_push($aPropertiesArray, $newProp);
                        echo '   
                <div class="property"  id="Right' . $sPropId . '" data-agent-email="' . $sAgentEmail . '">
                    <img class="propertyMainImg" src="images/' . $jProperty->image . '" alt="">
                    <h1  id="propertyTitle">' . $jProperty->title . '</h1>
                    <h1  id="propertyPrice">' . $jProperty->price . '</h1>';
                        if ($_SESSION) {
                            if ($_SESSION['accType'] == 'users') {
                                echo '<button id="interestedBtn">Interested</button>';
                            }
                        }
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS/sendEmail.js"> </script>
<script src="JS/activeLink.js"> </script>
<script>
    removeActiveClass()
    setActiveLink("navProperties");
    const sjProperties = '<?php echo json_encode($aPropertiesArray); ?>'
</script>
<script src="JS/formatPrice.js"></script>
<script src="JS/map.js"></script>
<script src="JS/search.js"></script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
