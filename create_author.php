<?php
$title = 'Creer un auteur';
include './header.php';
echo '
<form action="confirm_create_author.php" method="post">
    <div>
        <label for="">Nom de l\'auteur :</label>
        <input type="text" name="author_name">
    </div>
    <div>
        <input type="submit">
    </div>
</form>';

include './footer.php';
?>
