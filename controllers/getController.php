<?php  // ici on fait tout ce qui doit se passer a la première arrivée sur le site
$aLetters = fGetLettersArray();
$sSerializedLetters = fSerializeLetters($aLetters);
$aWords = fGetFileWordsArray();;
$iIndexWord = fGetWordIndex($aWords);
$sWord = fGetWord($aWords, $iIndexWord);
$iWordLength = strlen($sWord); // si mot contenant des accent alors utiliser mb_strlen pour préciser l'encodage car strlen comptera 2 pour un caracter accentuer
$sHiddenWord = fGetHiddenString($iWordLength);
$iRemainingTrials = MAX_TRIALS;
