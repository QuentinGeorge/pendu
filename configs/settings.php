<?php
define('SITE_TITLE', 'Le jeu du pendu');
define('SOURCE_NAME', 'data/words.txt');
define('REPLACEMENT_CHAR', '-');
define('MAX_TRIALS', 8);

$sView = '_main.php';
$sTriedLetters = '';
$sSelectedLetter = '';
$aWords = [];
$iWordLength = 0;
$iIndexWord = 0;
