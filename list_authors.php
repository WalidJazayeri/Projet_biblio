<?php
$title = 'Liste des auteurs';
include 'header.php';

$query = "SELECT name FROM author";
$statement = $pdo->query($query);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<button><a href="create_author.php">Ajouter un auteur</a></button>';
echo '<table>
    <tr>
        <th>Nom</th>
    </tr>';
foreach($authors as $author){
    echo '
    <tr>
            <td>
                '.$author['name'].'
            </td>
    </tr>';
}
echo '
</table>';
include 'footer.php';
?>