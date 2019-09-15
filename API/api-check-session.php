<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['accType'] == 'users') {
        echo '<button id="interestedBtn">Interested</button>';
        exit;
    }
}
