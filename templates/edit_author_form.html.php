<form action="edit_author.php" method="post">
    <div>
        <label for="">Nom de l'auteur</label>
        <input type="text" name="name" value="<?= $author['name'] ?>" required>
    </div>
    <div>
        <input type="submit">
    </div>
</form>