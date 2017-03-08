<?php
session_start();
if($aWords = fGetFileWordsArray()) {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        include('getController.php');
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('postController.php');
    }

    if($_SESSION['trials'] === 0) {
        $sView = '_gameOver.php';
    }elseif($_SESSION['word'] === $_SESSION['hidden_word']) {
        $sView = '_gameWin.php';
    }else {
        $sView = '_form.php';
    }
}else {
    die('Ooops, un problème est survenu lors de la récupération des mots.');
}
