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

function add_expenses() {

}

// Trouver un user pour le bouton info
function get_user_detail($user_id) {
    $db = db();
    $sql = <<<EOD
        SELECT user_id,first_name,last_name,birth_date FROM `users`
        WHERE `user_id` = :user_id;
        
EOD;
// :user_id syntaxe pour supprimer
    $find_user_Stmt = $db->prepare($sql);
    // Bind pour mettre la valeur 
    $find_user_Stmt->bindValue(':user_id', $user_id);
    $find_user_Stmt->execute();
    return $find_user_Stmt->fetch(PDO::FETCH_ASSOC);

}

// Supprimer un user dans la list
function delete_users($delete_user)
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
    $delete_user_Stmt->bindValue(':user_id', $delete_user);
    $delete_user_Stmt->execute();
}

function print_r_function($value) {
     echo '<pre>' . print_r($value, true) . '</pre>';

}