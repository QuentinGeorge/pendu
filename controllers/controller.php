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
    if(isset($_POST['word'])) {
        $sSerializedWord = $_POST['word'];
        $sUnserializedWord = unserialize(urldecode($sSerializedWord));
    }
    if(isset($_POST['length'])) {
        $iWordLength = $_POST['length'];
    }
    if(isset($_POST['hidden_word'])) {
        $sHiddenWord = $_POST['hidden_word'];
    }
    if(isset($_POST['trials'])) {
        $iRemainingTrials = $_POST['trials'];
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
echo $sUnserializedWord;  // only for test
