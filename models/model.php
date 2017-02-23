<?php
$aLetters = [
    'a' => true,
    'b' => true,
    'c' => true,
    'd' => true,
    'e' => true,
    'f' => true,
    'g' => true,
    'h' => true,
    'i' => true,
    'j' => true,
    'k' => true,
    'l' => true,
    'm' => true,
    'n' => true,
    'o' => true,
    'p' => true,
    'q' => true,
    'r' => true,
    's' => true,
    't' => true,
    'u' => true,
    'v' => true,
    'w' => true,
    'x' => true,
    'y' => true,
    'z' => true,
];
$aWords = file(SOURCE_NAME);
$iIndexWord = rand(0, count($aWords));
$sWord = strtolower(trim($aWords[$iIndexWord]));
$iWordLength = strlen($sWord);
for($i=0; $i < $iWordLength; $i++) {
    $sHiddenWord .= "-";
}
$sSerializedWord = urlencode(serialize($sWord));
$sSerializedLetters = urlencode(serialize($aLetters));

function fCheckLetterPosition($sLetter, $sWord)
{
    $aPosition = [];
    $aWordSplit = str_split($sWord);
    for($i=0; $i < count($aWordSplit); $i++) {
        if($aWordSplit[$i] === $sLetter) {
            array_push($aPosition, $i);
        }
    }

    return $aPosition;
}

function fCheckErrorIsInAlphabet($sLetter, $aAlphabet)
{
    foreach($aAlphabet as $key => $value) {
        if ($key === $sLetter) {
            return true;
        }
    }

    return false;
}
