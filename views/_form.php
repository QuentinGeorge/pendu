<?php include('_main.php') ?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Il te reste <?= $_SESSION['trials']; ?> essais pour sauver ta peau</legend>
        <label for="letter">Choissis ta lettre</label>
        <select id="letter" name="select_letter">
            <?php foreach ($_SESSION['letters'] as $key => $value): ?>
                <?php if ($value === true): ?>
                    <option value="<?= $key; ?>"><?= $key; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Esseyer cette lettre">
    </fieldset>
</form>
