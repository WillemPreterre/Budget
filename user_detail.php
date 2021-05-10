<?php require_once 'function.php'; ?>
<?php require_once 'inc/header.php'; ?>

<!-- récup en get le id du user et le mettre dans le parametre de la fonction -->

<body>
    <div class="container">
        <div class="row">


            <?php

            $erreur = "<div class='alert alert-warning'>L'application n'a pas trouvé d'utilisateur.</div>";

            // récupération de l'id
            extract($_GET);
            $user_id = $_GET["user_id"];
            // print_r_function($_GET);
            // print_r_function($user_id);                

            // Si $_GET contient la clé user_id et qu'elle n'est pas vide
            if (isset($user_id) && !empty($user_id)) {

                // On va chercher les détails dans la table users si ils existent
                $user = get_user_detail($user_id);
                // Si la fonction get_user_detail trouve une correspondance avec $user_id
                if (get_user_detail($user_id) != false) {
                    // fonction avec dépense + revenu
                    // var_dump($user);

                    // Récupération des expenses en fonction de l'id
                    $expense = get_user_detail_expense($user_id)
            ?>
                    <div class="col">
                        <h2><?php echo $user['first_name'], $user['last_name'] ?></h2>
                        <p><?php echo $user['birth_date']; ?></p>
                    </div>
                    <div class="col">
                        <h3>Dépense</h3>
                        <p><?php echo $expense['exp_label'] ?> <?php echo $expense['exp_amount'] ?>
                            <?php echo $expense['exp_date'] ?></p>
                    </div>

            <?php
                } else {

                    echo $erreur;
                }
            } else {

                echo $erreur;
                // alert 

            };
            // Envoie nombre dans comme paramètre
            ?>

        </div>
    </div>

    <?php require_once 'inc/footer.php';
    print_r_function($user); ?>