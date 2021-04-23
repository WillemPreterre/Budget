<?php require_once 'inc/header.php'; ?>
<?php require_once 'function.php'; ?>
<?php $erreur1 = $erreur2 = $erreur3 = false;
    //  Post du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variable pour erreur


        Extract($_POST);
        // print_r_function($_POST);

        // Nettoyage du formulaire
        $first = $_POST["first-name"];
        $last = $_POST["last-name"];
        $date = $_POST["birth-date"];


        $sanitize_firstname = sanitize_string($first);
        $sanitize_lastname = sanitize_string($last);
        $sanitize_birthday = sanitize_int($date);
        // print_r_function($sanitize_lastname);

        
        // // https://www.tutorialrepublic.com/php-tutorial/php-filters.php
        // Vérification si sanitaze passe on valide et on envoie sinon erreur
        if ($first == $sanitize_firstname && validate_string($first) && $last == $sanitize_lastname && validate_string($last) && isValid($date)) {

            // Passage des champs avec une majuscule
            $caps_validate_first = ucwords(strtolower($sanitize_firstname));
            $caps_validate_last = ucwords(strtolower($sanitize_lastname));
            $caps_validate_date = ucwords(strtolower($sanitize_birthday));

            $link = mysqli_connect("localhost", "root", "", "budget");

            // Attempt insert query execution
            $sql = "INSERT INTO users (first_name, last_name, birth_date) VALUES ('$caps_validate_first', '$caps_validate_last','$caps_validate_date')";

            if (mysqli_query($link, $sql)) {
                echo "Records added successfully.";
            } else {
                echo "error";
            }

            mysqli_close($link); // Close connection

        } else {

            // Message d'erreur sur les input
            if ($first == $sanitize_firstname && !validate_string($first)) {
                $erreur1 = true;
            }

            if ($last == $sanitize_lastname && !validate_string($last)) {
                $erreur2 = true;
            }
            
            if (!isValid($date)) {
                $erreur3 = true;
            }
        }

    }

    ?> <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="form-group mt-2">
                        <label for="first-name">Prénom</label>
                        <input type="text" class="form-control" id="first-name " required placeholder="John" required name="first-name">
                        <!-- Permet d'afficher le msg si erreur = true -->
                        <?php if ($erreur1 == true) {
                            echo "Prénom incorrect";
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="last-name">Nom</label>
                        <input type="text" class="form-control" id="last-name" required placeholder="117" required name="last-name">
                        <?php if ($erreur2 == true) {
                            echo "Nom incorrect";
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="birthdaydate">Birthday</label>
                        <input type="date" class="form-control" id="birth-date" required placeholder="<?php echo date("Y/n/j"); ?>" name="birth-date">
                        <?php if ($erreur3 == true) {
                            echo "Date incorrect";
                        } ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br>
                    <?php
                    print_r_function($_POST);
                    ?>




                </form>
            </div>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>
    <?php require_once 'help.php'; ?>