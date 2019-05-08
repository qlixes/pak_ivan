<?= validation_errors() ?>
<? if($message): ?>
    <p><?= $message ?></p>
<? endif ?>

<?= form_open('dashboard/check/') ?>
<input type="text" name="username" placeholder="username" value="<?= set_value('username') ?>"/>
<input type="password" name="password" placeholder="password" value="<?= set_value('username') ?>"/>
<input type="submit" name="submit" />
<?= form_close() ?>