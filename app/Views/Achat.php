<!-- Partie haute : saisie achat -->
<div class="container">

    <h2>Saisie des achats</h2>

    <form action="<?= base_url('achat/ajouter') ?>" method="post">

        <!-- Liste déroulante des produits -->
        <div class="mb-3">
            <label for="produit" class="form-label">
                Produit
            </label>

            <select name="id_produit" id="produit" class="form-select">
                <option value="">-- Choisir un produit --</option>

                <?php foreach($produits as $produit): ?>
                    <option value="<?= $produit['id'] ?>">
                        <?= $produit['nom'] ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>


        <!-- Champ quantité -->
        <div class="mb-3">
            <label for="quantite" class="form-label">
                Quantité
            </label>

            <input 
                type="number" 
                name="quantite" 
                id="quantite"
                class="form-control"
                min="1"
                value="1"
            >
        </div>


        <!-- Bouton Valider -->
        <button type="submit" class="btn btn-primary">
            Valider
        </button>

    </form>

</div>