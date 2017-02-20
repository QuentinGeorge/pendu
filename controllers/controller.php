<?php
include('settings.php');
include('model.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['select_letter'])) {
        $sTriedLetters = $_POST['letters'] . $_POST['select_letter'];
        for($i=0; $i < strlen($sTriedLetters); $i++) {
            $aLetters[str_split($sTriedLetters)[$i]] = false;
        }
    }
}

if(!$bDead && !$bWin) {
    $sView = '_form.php';
}else if($bDead && !$bWin) {
    $sView = '_gameOver.php';
}else {
    $sView = '_gameWin.php';
}

include('layout.php');
