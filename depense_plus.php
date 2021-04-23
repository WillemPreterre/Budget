<?php require_once 'inc/header.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Dépense</h1>
                <form method="POST" action="">
                    <div class="form-group mt-2">
                        <label for="name">Nom et prénom</label>
                        <input type="text" class="form-control" id="name" required placeholder="John Katarne" required name="name_id">
                    </div>
                    <div class="form-group mt-2">
                        <label for="object">Nom de l'objet</label>
                        <input type="text" class="form-control" id="object" required placeholder="Table" required name="object_id">
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

                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST["name_id"];
                        $object = $_POST["object_id"];
                        $date = $_POST["date_id"];
                        $cost = $_POST["cost_id"];

                        if (empty($name)) {
                            echo "Prénom est vide";
                        }

                        if (empty($object)) {
                            echo "Nom est vide";
                        }

                        if (empty($date)) {
                            echo "Date est vide";
                        }

                        if (empty($cost)) {
                            echo "Date est vide";
                        }


                        var_dump($name,$object,$date,$cost);
                    }?>
                </form>
            </div>
        </div>
    </div>
    <!-- idée liste avec quand on appuie sur bouton l'users sélectionner est directement sélectionné -->
    <?php require_once 'inc/footer.php'; ?>