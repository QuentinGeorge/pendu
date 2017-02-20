<?php
include('settings.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['letter'])) {
        $sLetters = $sLetters . $_GET['letter'];
    }
}

if (!$bDead) {
    $sView = '_form.php';
}else {
    $sView = '_gameOver.php';
}

include('layout.php');
