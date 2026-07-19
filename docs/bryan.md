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
- charts
- gestion ereurs csv 

Custom query:
```php
$query = $this->db->query("SELECT * FROM users WHERE city = ?", array($city));
        return $query->result();

or:

$sql = "SELECT u.*, o.order_date, o.total 
                FROM users u 
                LEFT JOIN orders o ON u.id = o.user_id 
                WHERE u.id = ? 
                ORDER BY o.order_date DESC";
        return $this->db->query($sql, array($user_id))->result();

```

INserting. les keys doit matcher avec les columns de la table

```php

$data = array(
    'email' => 'john@example.com',
    'name' => 'John Doe',
    'phone' => '1234567890'
);

$this->db->insert('users', $data);

return $this->db->insert_id(); // Returns the last inserted ID

`
```


