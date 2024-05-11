<form action="modify_book.php" method="post">
    <div>
        <label for="">Nom du livre</label>
        <input type="text" name="name" value="<?= $book['name'] ?>" required>
    </div>
    <div>
        <label for="">Date de publication</label>
        <input type="date" name="publication_date" value="<?= $book['publication_date'] ?>" required>
    </div>
    <div>
        <label for="">Catégorie</label>
        <select name="category_id" id="">
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie['id'] ?>"<?= $selected($current_category_id, $categorie['id']) ?>><?= $categorie['name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="">Auteur</label>
        <select name="author_id" id="">
            <?php foreach ($authors as $author) : ?>
                    <option value="<?= $author['id'] ?>"<?= $selected($current_author_id, $author['id']) ?>><?= $author['name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <input type="submit">
    </div>
</form>