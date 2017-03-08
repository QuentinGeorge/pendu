<?php
if(isset($_POST['select_letter']) && isset($_POST['letters'])) {
    if(is_string($_POST['select_letter']) && is_string($_POST['letters'])) {
        $sSelectedLetter = $_POST['select_letter'];
        $aLetters = fUnserializeLetters($_POST['letters']);
        if(fCheckErrorIsInAlphabet($sSelectedLetter, $aLetters) === true) {
            $aLetters[$sSelectedLetter] = false;
            $sSerializedLetters = fSerializeLetters($aLetters);
            $sTriedLetters = fGetTriedLetters($aLetters);
        }else {
            $aErrors['select_letter'] = 'L´option sélectionnée n´est pas une lettre de l´alphabet.';
        }
    }else {
        $aErrors['select_letter'] = 'Les lettres sélectionnées ne sont pas dans une chaine de caractères.';
    }
}else {
    $aErrors['select_letter'] = 'OOps, on dirait que vous esseyez de tricher. Les lettres sélectionnées sont absentes de la requête.';
}
if(isset($_POST['index'])) {
    if(is_numeric($_POST['index'])) {
        $iIndexWord = intval($_POST['index']);
        $sWord = fGetWord($aWords, $iIndexWord);
        $iWordLength = strlen($sWord);
    }else {
        $aErrors['index'] = 'L´index du mot a trouver n´est pas un nombre.';
    }
}else {
    $aErrors['index'] = 'OOps, on dirait que vous esseyez de tricher. Le mot a trouver est absent de la requête.';
}
if(isset($_POST['hidden_word'])) {
    if(is_string($_POST['hidden_word'])) {
        $sHiddenWord = $_POST['hidden_word'];
    }else {
        $aErrors['hidden_word'] = 'Le mot avec les lettres démasquées n´est pas une chaine de caractères.';
    }
}else {
    $aErrors['hidden_word'] = 'OOps, on dirait que vous esseyez de tricher. Le mot avec les lettres démasquées est absent de la requête.';
}
if(isset($_POST['trials'])) {
    if(is_numeric($_POST['trials'])) {
        $iRemainingTrials = intval($_POST['trials']);
    }else {
        $aErrors['trials'] = 'Le nombre d´essais restants n´est pas un nombre.';
    }
}else {
    $aErrors['trials'] = 'OOps, on dirait que vous esseyez de tricher. Le nombre d´essais restants est absent de la requête.';
}
if(count($aErrors) === 0) {
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
}else {
    $sView = '_errors.php';
}
