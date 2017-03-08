<h1>Trouve le mot en moins de <?= MAX_TRIALS; ?> coups&nbsp;!</h1>
<p>Le mot à deviner compte <?= $iWordLength; ?> lettres&nbsp;: <?= $_SESSION['hidden_word'] ?></p>
<img src="./img/pendu<?= $_SESSION['trials']; ?>.jpg" alt="">
<p>Voici les lettres que tu as déjà essayées&nbsp;: <?= $sTriedLetters; ?></p>
