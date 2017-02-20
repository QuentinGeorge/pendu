<?php include('_main.php') ?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Il te reste <?= 'X' ?> essais pour sauver ta peau</legend>
        <label for="letter">Choissis ta lettre&nbsp;: </label>
        <select name="Remaining_letters">
            <option value="a">a</option>
        </select>
        <input type="hidden" name="letter" value="<?= $sLetters; ?>">
        <input type="submit" value="Esseyer cette lettre">
    </fieldset>
</form>
