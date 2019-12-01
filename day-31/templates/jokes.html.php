<?php foreach ($jokes as $joke) { ?>
<blockquote>
<p>
<?php echo htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8'); ?>
<form action="deletejoke.php" method="post">
    <input type="hidden" name="id" value="<?php echo $joke['id']; ?>">
    <input type="submit" value="delete">
    <?php echo $joke['author_id']; ?>
    <?php echo $joke['name']; ?>
    <?php echo $joke['email']; ?>

</form>
</p>
</blockquote>
<?php } ?>