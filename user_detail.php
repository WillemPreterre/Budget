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

                // On va cherhcer les détails dans la table users si ils existent
                $user = get_user_detail($user_id);

                // Si la fonction get_user_detail trouve une correspondance avec $user_id
                if (get_user_detail($user_id) != false) {
                    // fonction avec dépense + revenu
                    // var_dump($user);

            ?>
                    <div class="col">
                        <h2><?php echo $user['first_name'], $user['last_name'],$user['birth_date']; ?></h2>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>



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

            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>

    <?php require_once 'inc/footer.php';                     print_r_function($user);?>
