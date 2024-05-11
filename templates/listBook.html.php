

<hr>
<div>
    <button><a href="add_book_form.php">Ajouter un livre</a></button>
</div>
<ul>
    <?php foreach ($books as $book) : ?>
        <li>
                    <a href="details_book.php?id=<?= $book['id']?>"><?= $book['name'] ?></a>
        </li>
    <?php endforeach ?>
</ul>
