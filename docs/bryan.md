## Sqlite 
### Syntax
- inserer la date de maintenant: INSERT INTO achat(date_achat)
VALUES(CURRENT_TIMESTAMP);
- show tables: .tables
- desc table: .schema produit
- quitter: .quit
- pas de right join
- pas de alter column

### Migrations:
- php spark make:migration <NomDuFichier>
- php spark migrate
- $this->forge->....
- auto_increment => true
- null => false
- $this->db->table('caisse')->insertBatch([])

## CI
- csrf
- session()->get("caissier", $infoSurLeCaissier)
- session()->setFlashdata('....')
- base_url()
- pagination    