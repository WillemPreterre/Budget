<?php
//-----------------------------Liste des require----------------------------- 

require_once 'db.php';


// -----------------------------Liste des formulaires----------------------------- 

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
function get_expenses()
{
    $db = db(); // connexion à la base, création d'un objet PDO, stocké dans $db
    $sql = <<<EOD
            select * from expenses;
EOD;

    // exécute la requête 
    $postsStmt = $db->query($sql); // Récupère le jeu de données (objet PDO statement)
    $users = $postsStmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
function get_incomes_tab()
{
    $db = db(); // connexion à la base, création d'un objet PDO, stocké dans $db
    $sql = <<<EOD
    SELECT incomes.inc_id, incomes_categories.inc_cat_name, incomes.inc_receipt_date,incomes.inc_amount,incomes.user_id
    FROM incomes
    INNER JOIN incomes_categories ON incomes.inc_cat_id=incomes_categories.inc_cat_id;
EOD;

    // exécute la requête 
    $postsStmt = $db->query($sql); // Récupère le jeu de données (objet PDO statement)
    $users = $postsStmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function get_incomes()
{
    $db = db(); // connexion à la base, création d'un objet PDO, stocké dans $db
    $sql = <<<EOD
    SELECT * from incomes_categories
EOD;

    // exécute la requête 
    $postsStmt = $db->query($sql); // Récupère le jeu de données (objet PDO statement)
    $users = $postsStmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}


// Trouver un user pour le bouton info
function get_user_detail($user_id)
{
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

function get_user_detail_expense($user_id)
{
    $db = db();
    $sql = <<<EOD
    SELECT exp_id,exp_date,exp_amount,exp_label FROM `expenses`
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

// -----------------------------              ----------------------------- 
