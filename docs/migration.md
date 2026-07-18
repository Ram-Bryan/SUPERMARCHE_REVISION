# 3. Créer le dossier de la base SQLite
mkdir -p writable/db

# 4. Créer les tables et les données de démonstration
php spark make:migration CreateClientTable
php spark make:migration CreateCaissierTable
php spark make:migration CreateCaisseTable
php spark make:migration CreateProduitTable
php spark make:migration CreateAchatTable
php spark make:migration CreateAchatDetailsTable

php spark migrate
php spark db:seed SupermarcheSeeder


# 5. Lancer le serveur
php spark serve