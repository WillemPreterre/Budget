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
                    <!-- Mettre un symbole euros inefacable -->
                    <div class="form-group mt-2">
                        <label for="product">Coût du produit</label>
                        <input type="number" class="form-control" id="product" required placeholder="27 euros" required name="product_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
    <!-- idée liste avec quand on appuie sur bouton l'users sélectionner est directement sélectionné -->
    <?php require_once 'inc/footer.php'; ?>