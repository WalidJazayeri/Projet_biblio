<?php
$title = 'Detail';
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) )
{
    $idBook = $_GET['id'];
    $query = "  SELECT b.name AS book_name, b.publication_date, c.name AS category, a.name AS author
                FROM book AS b
                JOIN category AS c ON c.id = b.category_id
                JOIN author AS a ON a.id = b.author_id
                WHERE b.id = :idprotege";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':idprotege', $idBook, \PDO::PARAM_INT);
    $statement->execute();
    $book = $statement->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Vue -->
<table>
    <tr>
        <th>Nom du Livre</th>
        <th>Date de Publication</th>
        <th>Catégorie</th>
        <th>Autheur</th>
    </tr>
    <tr>
        <td><?php if(isset($book['book_name'])){echo $book['book_name'];} ?></td>
        <td><?php if(isset($book['publication_date'])){echo $book['publication_date'];} ?></td>
        <td><?php if(isset($book['category'])){echo $book['category'];} ?></td>
        <td><?php if(isset($book['author'])){echo $book['author'];} ?></td>
    </tr>
</table>
<br>
<button>
    <a href="delete_book.php?id=<?php if(isset($idBook)){echo $idBook;} ?>">Supprimer</a>
</button>
<button>
    <a href="modify_book.php?<?php if(isset($idBook) && isset($book['book_name']) && isset($book['publication_date']) && isset($book['category']) && isset($book['author']) ){echo 'id='.$idBook.'&book_name='.urlencode($book['book_name']).'&publication_date='.$book['publication_date'].'&category='.$book['category'].'&author='.$book['author'].'';}?>">Modifier</a>
</button>

<?php
include 'footer.php'
?>