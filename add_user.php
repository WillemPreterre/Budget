<?php require_once 'inc/header.php'; ?>
<?php require_once 'function.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="form-group mt-2">
                        <label for="first-name">Prénom</label>
                        <input type="text" class="form-control" id="first-name " required placeholder="John" required name="first-name">
                    </div>

                    <div class="form-group">
                        <label for="last-name">Nom</label>
                        <input type="text" class="form-control" id="last-name" required placeholder="117" required name="last-name">
                    </div>

                    <div class="form-group">
                        <label for="birthdaydate">Birthday</label>
                        <input type="date" class="form-control" id="birth-date" required placeholder="<?php echo date("Y/n/j"); ?>" name="birth-date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br>
                    <?php
                    print_r_function($_POST);

                    //  Post du formulaire
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        Extract($_POST);
                        // print_r_function($_POST);

                        // Nettoyage du formulaire
                        $first = $_POST["first-name"];
                        $last = $_POST["last-name"];
                        $date = $_POST["birth-date"];



                        $sanitize_firstname = sanitize_first($first);
                        $sanitize_lastname = sanitize_last($last);
                        $sanitize_birthday = sanitize_date($date);
                        // print_r_function($sanitize_lastname);


                        // Vérification si sanitaze passe on valide et on envoie sinon erreur
                        if ($first == $sanitize_firstname && validate_first($first) && $last == $sanitize_lastname && validate_last($last)) {

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
                            echo "The $date is not a valid ";
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


                </form>
            </div>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>
    <?php require_once 'help.php'; ?>