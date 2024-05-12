<hr>
<div>
    <button><a href="add_author_form.php">Ajouter un auteur</a></button>
</div>
<ul>
    <?php foreach ($authors as $author) : ?>
        <li>
                    <?= $author['name']?> <a href="edit_author_form.php?id=<?= $author['id'] ?>">Modifier</a> <a href="delete_author.php?id=<?= $author['id'] ?>">Supprimer</a>
        </li>
    <?php endforeach ?>
</ul>