<?php
require_once 'db.php';

function get_users()
{
    $db = db(); // connexion à la base, création d'un objet PDO, stocké dans $db
    $sql = <<<EOD
            select * from users;
EOD;

    // exécute la requête 
    $postsStmt = $db->query($sql); // Récupère le jeu de données (objet PDO statement)
    $users = $postsStmt->fetchAll();
    return $users;
}

?>
<?php 
// $prenom = $_POST['first-name'];
// $nom = $_POST['last-name'];
// $date = $_POST['date'];

?>
