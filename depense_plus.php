<?php require_once 'inc/header.php'; ?>
<?php require_once 'function.php'?>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Dépense</h1>
                <form method="POST" action="">
                    <div class="form-group mt-2">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" required placeholder="Table" required name="type_id">
                    </div>
                    <div class="form-group mt-2">
                        <label for="date">Date d'achat</label>
                        <input type="date" class="form-control" id="date" required placeholder="Table" required name="date_id">
                    </div>
                    <!-- Mettre un symbole euros inefacable -->
                    <div class="form-group mt-2">
                        <label for="cost">Coût du produit</label>
                        <input type="number" class="form-control" id="cost" required placeholder="27" required name="cost_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php

                    // récupération en POST

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        Extract($_POST);
                        print_r_function($_POST);
    
                            // Nettoyage du formulaire
                            $type = $_POST["type_id"];
                            $date = $_POST["date_id"];
                            $cost = $_POST["cost_id"];
                            
                            $sanitize_type = sanitize_int($type);
                            $sanitize_date = sanitize_int($date);
                            $sanitize_cost = sanitize_int($cost);
                            // print_r_function($sanitize_birthday);
    
    
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
    <!-- idée liste avec quand on appuie sur bouton l'users sélectionner est directement sélectionné -->
    <?php require_once 'inc/footer.php'; ?>