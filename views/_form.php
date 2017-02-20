<?php include('_main.php') ?>

<p>Il te reste <?= 'X' ?> essais pour sauver ta peau</p>
<form action="index.php" method="post">
    <label for="letter">Choissis ta lettre&nbsp;: </label>
    <select name="Remaining_letters">
        <option value="a">a</option>
    </select>
    <input type="hidden" name="letter" value="<?= $sLetters; ?>">
    <input type="submit" value="Esseyer cette lettre">
</form>
