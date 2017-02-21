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
        $sUnserializedWord = unserialize(urldecode($_POST['word']));
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
    $aLetterPositions = fCheckLetterPosition($_POST['select_letter'], $sUnserializedWord);
    if(count($aLetterPositions) > 0) {
        $aHiddenWordSplited = str_split($sHiddenWord);
        foreach($aLetterPositions as $value) {
            $aHiddenWordSplited[$value] = $_POST['select_letter'];
        }
        $sHiddenWord = implode($aHiddenWordSplited);
    }else {
        $iRemainingTrials -= 1;
    }
}

if($iRemainingTrials === 0) {
    $sView = '_gameOver.php';
}else if($sUnserializedWord === $sHiddenWord) {
    $sView = '_gameWin.php';
}else {
    $sView = '_form.php';
}

include('layout.php');
echo $sUnserializedWord;  // only for test
