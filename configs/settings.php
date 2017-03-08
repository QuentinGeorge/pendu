<?php
define('SITE_TITLE', 'Le jeu du pendu');
define('SOURCE_NAME', 'data/words.txt');
define('REPLACEMENT_CHAR', '-');
define('MAX_TRIALS', 8);

$sView = '_main.php';
$sWord = '';
$sTriedLetters = '';
$sHiddenWord = '';
$sSerializedLetters = '';
$sSelectedLetter = '';
$aWords = [];
$aLetters = [];
$aErrors = [];
$iIndexWord = 0;
$iRemainingTrials = 0;
$iWordLength = 0;
