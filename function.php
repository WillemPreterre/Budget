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
    $users = $postsStmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}


function delete_users($user_id)
{
    $db = db();
    $request = <<<EOD
        DELETE FROM `expenses`
        WHERE `user_id` = :user_id;
        DELETE FROM `incomes`
        WHERE `user_id` = :user_id;
        DELETE FROM `users`
        WHERE `user_id` = :user_id;
EOD;
    $delete_user_Stmt = $db->prepare($request);
    $delete_user_Stmt->bindValue(':user_id', $user_id);
    $delete_user_Stmt->execute();
}