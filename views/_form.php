<?php include('_main.php') ?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Il te reste <?= $iRemainingTrials; ?> essais pour sauver ta peau</legend>
        <label for="letter">Choissis ta lettre</label>
        <select id="letter" name="select_letter">
            <?php foreach ($aLetters as $key => $value): ?>
                <?php if ($value === true): ?>
                    <option value="<?= $key; ?>"><?= $key; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="letters" value="<?= $sTriedLetters; ?>">
        <input type="hidden" name="word" value="<?= $sWord; ?>">
        <input type="hidden" name="lenght" value="<?= $iWordLength; ?>">
        <input type="hidden" name="hidden_word" value="<?= $sHiddenWord; ?>">
        <input type="hidden" name="trials" value="<?= $iRemainingTrials; ?>">

        <input type="submit" value="Esseyer cette lettre">
    </fieldset>
</form>
