<?php  // ici on fait tout ce qui doit se passer a la première arrivée sur le site
$_SESSION['letters'] = fGetLettersArray();
$aWords = fGetFileWordsArray();
$iIndexWord = fGetWordIndex($aWords);
$_SESSION['word'] = fGetWord($aWords, $iIndexWord);
$iWordLength = strlen($_SESSION['word']); // si mot contenant des accent alors utiliser mb_strlen pour préciser l'encodage car strlen comptera 2 pour un caracter accentuer
$_SESSION['hidden_word'] = fGetHiddenString($iWordLength);
$_SESSION['trials'] = MAX_TRIALS;
