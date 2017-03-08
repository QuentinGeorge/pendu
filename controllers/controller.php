<?php
if($aWords = fGetFileWordsArray()) {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        include('getController.php');
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('postController.php');
    }

    if($iRemainingTrials === 0) {
        $sView = '_gameOver.php';
    }elseif($sWord === $sHiddenWord) {
        $sView = '_gameWin.php';
    }else {
        $sView = '_form.php';
    }
}else {
    die('Ooops, un problème est survenu lors de la récupération des mots.');
}
