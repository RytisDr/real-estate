<?php
if (!isset($_GET['search'])) {
    echo '[]';
    exit;
}

include_once(__DIR__ . '/../global-php-functions/functions.php');
$sSearchFor = $_GET['search'];
$sDataPath = __DIR__ . '/../data/data.json';
$jData = getAndDecodeToJSON($sDataPath);
$aPropertiesFound = [];
foreach ($jData->agents as $sAgentId => $agent) {
    if (!empty($agent->properties)) {
        foreach ($agent->properties as $sPropId => $jProperty) {
            if ($jProperty->zip == $sSearchFor) {
                $jProperty->id = $sPropId;
                $jProperty->agentEmail = $agent->email;
                array_push($aPropertiesFound, $jProperty);
            }
        }
    }
}

echo json_encode($aPropertiesFound);
