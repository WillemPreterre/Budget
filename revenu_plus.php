<?php require_once 'inc/header.php'; ?>
<?php require_once 'function.php' ?>
<?php $usersAll = get_users(); ?>
<?php $incomes = get_incomes(); ?>
<?php $erreur1 = $erreur2 = $erreur3 = false; ?>


<?php

// récupération en POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    Extract($_POST);
    print_r_function($_POST);

    // Nettoyage du formulaire
    $type = $_POST["type_id"];
    $date = $_POST["date_id"];
    $cost = $_POST["cost_id"];
    $user = $_POST["user_id"];

    $sanitize_type = sanitize_int($type);
    $sanitize_date = sanitize_int($date);
    $sanitize_cost = sanitize_int($cost);
    $sanitize_user = sanitize_int($user);
    // print_r_function($sanitize_birthday);

    // Vérification si sanitaze passe on valide et on envoie sinon erreur
    if ($user == $sanitize_user && validate_int($user) && $type == $sanitize_type && validate_int($type) && $cost == $sanitize_cost && validate_int($cost) && isValid($date)) {

        // Passage des champs avec une majuscule
        $caps_validate_type = ucwords(strtolower($sanitize_type));
        $validate_date = $sanitize_date;
        $validate_cost = $sanitize_cost;
        $validate_user = $sanitize_user;
        
        $link = mysqli_connect("localhost", "root", "", "budget");

        // Attempt insert query execution
        $sql = "INSERT INTO incomes (inc_receipt_date, inc_amount, inc_cat_id, user_id) VALUES ('$validate_date', '$validate_cost','$caps_validate_type','$validate_user')";

        if (mysqli_query($link, $sql)) {
            echo "Records added successfully.";
        } else {
            echo "error";
        }

        mysqli_close($link); // Close connection

    } else {

        // Message d'erreur sur les input
        if ($type == $sanitize_type && !validate_string($type)) {
            $erreur1 = true;
        }

        if ($cost == $sanitize_cost && !validate_int($cost)) {
            $erreur2 = true;
        }

        if (!isValid($date)) {
            $erreur3 = true;
        }
    }

    // // https://www.tutorialrepublic.com/php-tutorial/php-filters.php
    // // Sample email address
    // $email = "someone@+example.com";

    // // Remove all illegal characters from email
    // $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    // // Validate email address
    // if ($email == $sanitizedEmail && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "The $email is a valid email address";
    // } else {
    //     echo "The $email is not a valid email address";
    // }

}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Revenu</h1>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="type">Type de revenu</label>
                        <select class="form-control" id="type" name="type_id">
                            <?php foreach ($incomes as $income) : ?>

                                <option value="<?php echo $income['inc_cat_id'] ?>"> <?php echo $income['inc_cat_name'] ?></option>

                            <?php endforeach ?>

                            <?php if ($erreur1 == true) : ?>
                                <p class="text-danger">Type incorrect</p>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="date">Date de remise</label>
                        <input type="date" class="form-control" id="date" required placeholder="Table" required name="date_id">
                        <?php if ($erreur3 == true) : ?>
                            <p class="text-danger">Date incorrect</p>
                        <?php endif ?>
                    </div>

                    <!-- Mettre un symbole euros inefacable -->
                    <div class="form-group mt-2">
                        <label for="cost">Argent reçu</label>
                        <input type="number" class="form-control" id="cost" required placeholder="27" required name="cost_id">
                        <?php if ($erreur2 == true) : ?>
                            <p class="text-danger">reçu incorrect</p>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label for="user-selection">Utilisateur</label>
                        <select class="form-control" id="user-selection" name="user_id">
                            <?php foreach ($usersAll as $user) : ?>
                                <option> <?php echo $user['user_id'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- idée liste avec quand on appuie sur bouton l'users sélectionner est directement sélectionné -->
    <?php require_once 'inc/footer.php'; ?>