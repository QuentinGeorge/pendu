<?php include('_main.php') ?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Il te reste <?= $remainingTrials; ?> essais pour sauver ta peau</legend>
        <label for="letter">Choissis ta lettre</label>
        <select id="letter" name="select_letter">
            <?php foreach ($aLetters as $key => $value): ?>
                <?php if ($value === true): ?>
                    <option value="<?= $key; ?>"><?= $key; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="letters" value="<?= $sTriedLetters; ?>">
        <input type="submit" value="Esseyer cette lettre">
    </fieldset>
</form>
