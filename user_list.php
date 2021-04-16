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
            <div class="col-3">
                <h5>Prénom</h5>
            </div>
            <div class="col-6">
                <h5>Nom</h5>
            </div>
        </div>

        <?php foreach ($usersAll as $user) : ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h5 class="card-title"> <?php echo $user['1'] ?> </h5>
                        </div>
                        <div class="col-6">
                            <h5><?php echo $user['2'] ?></h5>
                        </div>
                        <a class="col-3" href="user_detail.php"> + Info </a>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach ?>

<?php require_once 'inc/footer.php'; ?>