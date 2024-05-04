<table>
    <tr>
        <th>Nom du Livre</th>
        <th>Date de Publication</th>
        <th>Catégorie</th>
        <th>Autheur</th>
    </tr>
    <tr>
        <td><?= $book['book_name']?></td>
        <td><?= $book['publication_date']?></td>
        <td><?= $book['category']?></td>
        <td><?= $book['author']?></td>
    </tr>
</table>
<br>
<button>
    <a href="delete_book.php?id=<?= $book_id ?>">Supprimer</a>
</button>
<button>
    <a href="modify_book.php?<?= 'id='.$book_id ?>">Modifier</a>
</button>

