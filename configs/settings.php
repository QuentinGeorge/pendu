<?php
define('SITE_TITLE', 'Le jeu du pendu');
define('SOURCE_NAME', 'data/words.txt');
define('MAX_TRIALS', 8);

$sView = '_main.php';
$sTriedLetters = '';
$bDead = false;
$bWin = false;
$aWords = [];
$aLetters = [];
$iIndexWord = 0;
$iRemainingTrials = MAX_TRIALS;
