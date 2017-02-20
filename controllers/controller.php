<?php
include('settings.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['select_letter'])) {
        $sTriedLetters = $_POST['letters'] . $_POST['select_letter'];
        for($i=0; $i < strlen($sTriedLetters); $i++) {
            $aLetters[str_split($sTriedLetters)[$i]] = false;
        }
    }
}

if(!$bDead) {
    $sView = '_form.php';
}else {
    $sView = '_gameOver.php';
}

include('layout.php');
