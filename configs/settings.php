<?php
define('SITE_TITLE', 'Le jeu du pendu');
define('SOURCE_NAME', 'data/words.txt');
define('MAX_TRIALS', 8);

$sView = '_main.php';
$sWord = '';
$sSerializedWord = '';
$sUnserializedWord = '';
$sHiddenWord = '';
$sTriedLetters = '';
$aWords = [];
$aLetters = [];
$aLetterPositions = [];
$aHiddenWordSplited = [];
$iIndexWord = 0;
$iRemainingTrials = MAX_TRIALS;
$iWordLength = 0;
