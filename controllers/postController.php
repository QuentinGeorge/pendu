<?php
if(!isset($_COOKIE['game_data'])) {
    die('Les cookies doivent être activés sur votre machine pour que le jeu puisse fonctionner.');
}
$aCookiesData = fDecodeCookie($_COOKIE['game_data']);
$aLetters = $aCookiesData['aLetters'];

$sSelectedLetter = $_POST['select_letter'];
$aLetters[$sSelectedLetter] = false;
$sTriedLetters = fGetTriedLetters($aLetters);

$iIndexWord = intval($aCookiesData['iIndexWord']);
$sWord = fGetWord($aWords, $iIndexWord);
$iWordLength = strlen($sWord);

$sHiddenWord = $aCookiesData['sHiddenWord'];

$iRemainingTrials =  intval($aCookiesData['iRemainingTrials']);

$bLetterFound = false;
for($i = 0; $i < $iWordLength; $i++) {
    $l = substr($sWord, $i, 1);
    if($sSelectedLetter === $l) {
        $bLetterFound = true;
        $sHiddenWord = substr_replace($sHiddenWord, $l, $i, 1);
    }
}
if(!$bLetterFound) {
    $iRemainingTrials -= 1;
}

$aCookiesData = fEncodeCookie(compact('aLetters', 'iIndexWord', 'sHiddenWord', 'iRemainingTrials'));
setcookie('game_data', $aCookiesData);
