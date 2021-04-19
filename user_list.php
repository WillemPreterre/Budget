<?php require_once 'inc/header.php';
require_once 'function.php'; ?>

<body>
    <h1 class="text-center mt-2">Users</h1>
    <?php
    $usersAll = get_users();
    // echo '<pre>' . print_r($usersAll, true) . '</pre>';
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
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
                                <td><?php echo $user['1'] ?></td>
                                <td><?php echo $user['2'] ?></td>
                                <td><a class="col-3" href="user_detail.php"> + Info </a></td> 
                                <!-- Faire index pour chaque personne -->
                                <td><img class="img-thumbnail" src="img/poubelle.png"></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>


        <?php require_once 'inc/footer.php'; ?>