<?php
include('settings.php');
include('model.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['select_letter']) && isset($_POST['letters'])) {
        if(is_string($_POST['select_letter']) && is_string($_POST['letters'])) {
            if(fCheckErrorIsInAlphabet($_POST['select_letter'], $aLetters) === true) {
                $aLetters = unserialize(urldecode($_POST['letters']));
                $aLetters[$_POST['select_letter']] = false;
                $sSerializedLetters = urlencode(serialize($aLetters));
                foreach($aLetters as $key => $value) {
                    if($value === false) {
                        $sTriedLetters .= $key;
                    }
                }
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
        if(is_string($_POST['index'])) {
            $iIndexWord = $_POST['index'];
            $sWord = strtolower(trim($aWords[$iIndexWord]));
        }else {
            $aErrors['index'] = 'Le mot a trouver n´est pas une chaine de caractères.';
        }
    }else {
        $aErrors['index'] = 'OOps, on dirait que vous esseyez de tricher. Le mot a trouver est absent de la requête.';
    }
    if(isset($_POST['length'])) {
        if(is_numeric($_POST['length'])) {
            $iWordLength = $_POST['length'];
        }else {
            $aErrors['length'] = 'La longeure du mot n´est pas un nombre.';
        }
    }else {
        $aErrors['length'] = 'OOps, on dirait que vous esseyez de tricher. La longeure du mot est absente de la requête.';
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
            $iRemainingTrials = $_POST['trials'];
        }else {
            $aErrors['trials'] = 'Le nombre d´essais restants n´est pas un nombre.';
        }
    }else {
        $aErrors['trials'] = 'OOps, on dirait que vous esseyez de tricher. Le nombre d´essais restants est absent de la requête.';
    }
    if(count($aErrors) === 0) {
        $aLetterPositions = fCheckLetterPosition($_POST['select_letter'], $sWord);
        if(count($aLetterPositions) > 0) {
            $aHiddenWordSplited = str_split($sHiddenWord);
            foreach($aLetterPositions as $value) {
                $aHiddenWordSplited[$value] = $_POST['select_letter'];
            }
            $sHiddenWord = implode($aHiddenWordSplited);
        }else {
            $iRemainingTrials -= 1;
        }
    }else {
        $sView = '_errors.php';
    }
}

if(count($aErrors) === 0) {
    if($iRemainingTrials === 0) {
        $sView = '_gameOver.php';
    }else if($sWord === $sHiddenWord) {
        $sView = '_gameWin.php';
    }else {
        $sView = '_form.php';
    }
}

include('layout.php');
