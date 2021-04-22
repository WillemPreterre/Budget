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

                    //  Post du formulaire
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect value of input field
                        // Extract
                        $first_name = $_POST['first-name'];
                        $last_name = $_POST['last-name'];
                        $date = $_POST['birth-date'];

                        if (empty($first_name)) {
                            echo "Prénom est vide";
                        }
                        //else {
                        //     echo $firstName;
                        // }
                        if (empty($last_name)) {
                            echo "Nom est vide";
                        }
                        // 
                        // else {
                        //     echo $lastName;
                        // }
                        if (empty($date)) {
                            echo "Date est vide";
                        }
                        // else {
                        //     echo $date;
                        // 

                    }
                    //  Envoie donnée dans la database 
                    $first_name = $_POST['first-name'];
                    $last_name = $_POST['last-name'];
                    $birth_date = $_POST['birth-date'];

                    // Nettoyage du formulaire
                    $sanitize_firstname = sanitize_first($first_name);
                    $sanitize_lastname = sanitize_last($last_name);
                    $sanitize_birthday = sanitize_date($date);

                    // Majuscule au début et minuscule
                    $caps_validate_first = ucwords(strtolower($sanitize_firstname));
                    $caps_validate_last = ucwords(strtolower($sanitize_lastname));
                    $caps_validate_date = ucwords(strtolower($sanitize_birthday));

                    // Validation du formulaire
                    $validate_firstname = validate_first($caps_validate_first);
                    $validate_lastname = validate_last($caps_validate_last);
                    $validate_birthday = validate_date($caps_validate_date);

                    //     $pattern = '^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])^ ';
                    //     if (preg_match($pattern, $validate_birthday)) {
                    //     echo "Le mot a été trouvé.";
                    // } else {
                    //     echo "Le mot n'a pas été trouvé.";
                    // };
                    //     var_dump($pattern);

                    if (validate_last($sanitize_lastname) != false && validate_first($sanitize_firstname) != false && validate_date($sanitize_birthday) != false) {
                        $link = mysqli_connect("localhost", "root", "", "budget");
                        // Attempt insert query execution
                        $sql = "INSERT INTO users (first_name, last_name, birth_date) VALUES ('$caps_validate_first', '$caps_validate_last','$caps_validate_date')";
                        if (mysqli_query($link, $sql)) {
                            echo "Records added successfully.";
                        } else {
                            echo "error";
                        }
                        // Close connection
                        mysqli_close($link);
                    } elseif (validate_date($sanitize_birthday) != true); {
                        echo "Wrong date ";
                    }

                    // var_dump($validate_firstname);
                    // var_dump($validate_lastname);
                    // var_dump($validate_birthday);
                    // print_r($_POST);
                    ?>
                    <?php
                    $toto = " hello// 111 <script>alert('Hello')</script>";
                        // $result = sanitize_date($toto);
                    ;


                    ?>

                </form>
            </div>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>
    <?php require_once 'help.php'; ?>