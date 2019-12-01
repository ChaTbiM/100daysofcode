
<form action="editjoke.php" method="post">
<textarea name="joketext" id="text" cols="30" rows="10">
<?php echo $joke; ?>
</textarea><br>
<input type="hidden" name="jokeid" value="<?php echo $joke['id']; ?>">
<button type="submit">Submit</button>
</form>