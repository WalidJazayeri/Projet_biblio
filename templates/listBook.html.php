

<hr>
<div>
    <button><a href="create_book.php">Ajouter un livre</a></button>
</div>
<ul>
    <?php foreach ($books as $book) : ?>
        <li>
                    <a href="details_book.php?id=<?= $book['id']?>"><?= $book['name'] ?></a>
        </li>
    <?php endforeach ?>
</ul>
