<?php
$sSelectedLetter = $_POST['select_letter'];

$_SESSION['letters'][$sSelectedLetter] = false;
$sTriedLetters = fGetTriedLetters($_SESSION['letters']);

$iWordLength = strlen($_SESSION['word']);

$bLetterFound = false;
for($i = 0; $i < $iWordLength; $i++) {
    $l = substr($_SESSION['word'], $i, 1);
    if($sSelectedLetter === $l) {
        $bLetterFound = true;
        $_SESSION['hidden_word'] = substr_replace($_SESSION['hidden_word'], $l, $i, 1);
    }
}
if(!$bLetterFound) {
    $_SESSION['trials'] -= 1;
}
