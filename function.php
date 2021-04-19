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



function drop_user()
{
    $link = mysqli_connect("localhost", "root", "", "budget");
    // Attempt insert query execution
    $sql = "DELETE FROM `users` WHERE `user_id` = :user_id; ";
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
