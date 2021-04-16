<?php require_once 'inc/header.php'; ?>
<?php require_once 'function.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="form-group mt-2">
                        <label for="first-name">Prénom</label>
                        <input type="text" class="form-control" id="first-name " placeholder="John" name="first-name">
                    </div>

                    <div class="form-group">
                        <label for="last-name">Nom</label>
                        <input type="text" class="form-control" id="last-name" placeholder="117" name="last-name">
                    </div>

                    <div class="form-group">
                        <label for="birthdaydate">Birthday</label>
                        <input type="date" class="form-control" id="birthdaydate" name="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br>
                    <?php
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect value of input field
                        $firstName = $_POST['first-name'];
                        if (empty($firstName)) {
                            echo "Prénom est vide";
                        } else {
                            echo $firstName;
                        }
                    } 
                    ?><br>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect value of input field
                        $lastName = $_POST['last-name'];
                        if (empty($lastName)) {
                            echo "Nom est vide";
                        } else {
                            echo $lastName;
                        }
                    } 
                    ?><br>
                    
                    <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect value of input field
                        $date = $_POST['date'];
                        if (empty($date)) {
                            echo "Date est vide";
                        } else {
                            echo $date;
                        }
                    } 
                    
                    
                    ?><br>
                </form>
            </div>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>