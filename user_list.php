<?php
require_once 'inc/header.php';
require_once 'function.php';

// Fonction Suppression Utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    delete_users($_POST["user_id"]);
}

?>

<body>
    <h1 class="text-center mt-2">Users</h1>
    <?php
    $usersAll = get_users();
    // echo '<pre>' . print_r($usersAll, true) . '</pre>';
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <form method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Info</th>
                                <th scope="col">Supprimer</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($usersAll as $user) : ?>
                                <tr>
                                    <td><?php echo $user['first_name'] ?></td>
                                    <td><?php echo $user['last_name'] ?></td>
                                    <td><a class="col-3" href="user_detail.php"> + Info </a></td>
                                    <!-- Faire index pour chaque personne -->
                                    <td><button type="submit" name="user_id" value="<?php echo $user['user_id'] ?>" class="btn"><img class="img-thumbnail" src="img/poubelle.png"></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </form>
                <!-- <pre>  -->
                <?php 
                // print_r($usersAll)   
                ?>
                <!-- </pre> -->

            </div>
        </div>


        <?php require_once 'inc/footer.php'; ?>