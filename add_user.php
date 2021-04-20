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
                        <input type="date" class="form-control" id="birth-date" required placeholder="1999-05-03" name="birth-date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br>
                    <?php

                    //  Post du formulaire
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect value of input field
                        // Extract
                        $firstName = $_POST['first-name'];
                        $lastName = $_POST['last-name'];
                        $date = $_POST['birth-date'];
                        if (empty($firstName)) {
                            echo "Prénom est vide";
                        }
                        //else {
                        //     echo $firstName;
                        // }
                        if (empty($lastName)) {
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
                    
                    if (isset($lastName, $date, $firstName)) {
                        $first_name = $_POST['first-name'];
                        $last_name = $_POST['last-name'];
                        $birth_date = $_POST['birth-date'];

                        $link = mysqli_connect("localhost", "root", "", "budget");
                        // Attempt insert query execution
                        $sql = "INSERT INTO users (first_name, last_name, birth_date) VALUES ('$first_name', '$last_name','$birth_date')";
                        if (mysqli_query($link, $sql)) {
                            echo "Records added successfully.";
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        // Close connection
                        // double
                        mysqli_close($link);
                    }
                    ?>

                    <!-- Regex -->

                </form>
            </div>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>
    <?php require_once 'help.php'; ?>