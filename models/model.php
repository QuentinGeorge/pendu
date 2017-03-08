<?php
function fGetLettersArray() {
    return [
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
}

function fEncodeCookie($sCookie) {
    return base64_encode(json_encode($sCookie));
}

function fDecodeCookie($sCookie) {
    return json_decode(base64_decode($sCookie), true);
}

function fGetFileWordsArray() {
    return @file(SOURCE_NAME)?:false;
    // @ permet de gérer l'erreure nous même plustôt que d'afficher une erreure de php a notre utilisateur
    // return le fichier si il existe sinon return false
}

function fGetWordIndex($aWords) {
    return rand(0, count($aWords));
}

function fGetWord($aWords, $iIndexWord) {
    return strtolower(trim($aWords[$iIndexWord]));
}

function fGetHiddenString($iWordLength) {
    return str_pad('', $iWordLength, REPLACEMENT_CHAR);
}

function fGetTriedLetters($aLetters) {
    $sTriedLetters = '';
    foreach($aLetters as $key => $value) {
        if($value === false) {
            $sTriedLetters .= $key;
        }
    }
    return $sTriedLetters;
}
