<form action="add_book.php" method="post">
    <div>
        <label for="name">Nom du livre</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="publication_date">Date de publication</label>
        <input type="date" name="publication_date" required>
    </div>
    <div>
        <label for="category_id">Catégorie</label>
        <select name="category_id" id="">
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="author_id">Auteur</label>
        <select name="author_id" id="">
            <?php foreach ($authors as $author) : ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <input type="submit">
    </div>
</form>
