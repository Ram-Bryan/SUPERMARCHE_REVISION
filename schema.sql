-- ============================================
-- COMPLETE SQL SCRIPT
-- ============================================

PRAGMA foreign_keys = ON;

-- ---------- Table des clients ----------
CREATE TABLE client (
    id_client  INTEGER PRIMARY KEY AUTOINCREMENT,
    nom        TEXT NOT NULL
);

-- ---------- Table des caissiers ----------
CREATE TABLE caissier (
    id_caissier INTEGER PRIMARY KEY AUTOINCREMENT,
    mot_de_passe TEXT NOT NULL,
    email TEXT
);

-- ---------- Table des caisses ----------
CREATE TABLE caisse (
    id_caisse INTEGER PRIMARY KEY AUTOINCREMENT,
    numero    TEXT NOT NULL,
    libelle   TEXT
);

-- ---------- Table des produits ----------
CREATE TABLE produit (
    id_produit      INTEGER PRIMARY KEY AUTOINCREMENT,
    designation     TEXT NOT NULL,
    prix            REAL NOT NULL,
    quantite_stock  INTEGER NOT NULL DEFAULT 0
);

-- ---------- Table des achats ----------
CREATE TABLE achat (
    id_achat INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    id_caisse INTEGER NOT NULL,
    id_caissier INTEGER,
    date_achat TEXT NOT NULL DEFAULT (datetime('now')),
    statut TEXT NOT NULL DEFAULT 'en_cours'
        CHECK (statut IN ('en_cours','cloture')),
    FOREIGN KEY (id_caisse) REFERENCES caisse(id_caisse),
    FOREIGN KEY (id_caissier) REFERENCES caissier(id_caissier),
    FOREIGN KEY (id_client) REFERENCES client(id_client) ON DELETE CASCADE
);

-- ---------- Table des détails d'achat ----------
CREATE TABLE achat_details (
    id_detail       INTEGER PRIMARY KEY AUTOINCREMENT,
    id_achat       INTEGER NOT NULL,
    id_produit     INTEGER NOT NULL,
    quantite       INTEGER NOT NULL,
    prix_unitaire  REAL NOT NULL,
    FOREIGN KEY (id_achat) REFERENCES achat(id_achat),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
);

-- ============================================
-- INSERT DATA
-- ============================================

-- 1. Insert cash registers
INSERT INTO caisse (numero, libelle) VALUES 
('1', 'Caisse 1'),
('2', 'Caisse 2');

-- 2. Insert products
INSERT INTO produit (designation, prix, quantite_stock) VALUES 
('Biscuit', 1000, 50),
('Pain', 400, 100),
('Lait', 1200, 30),
('Riz (1kg)', 2500, 40),
('Savon', 800, 60);

-- 3. Insert cashier
INSERT INTO caissier (mot_de_passe, email) VALUES 
('$2y$10$5ggM0DclsFQ9nv0xZhVmv.Yn.xBh7xA6NkQff0zbE/eWRgujvssfS', 'caissier@gmail.com');

-- 4. Insert clients
INSERT INTO client (nom) VALUES 
('Jean Dupont'),
('Marie Martin'),
('Pierre Bernard');

-- 5. Insert purchases
INSERT INTO achat (id_client, id_caisse, id_caissier, date_achat, statut) VALUES 
(1, 1, 1, '2026-01-15 10:30:00', 'cloture'),
(2, 1, 1, '2026-01-16 14:20:00', 'cloture'),
(3, 2, 1, '2026-01-17 09:45:00', 'en_cours');


-- 6. Insert purchase details
INSERT INTO achat_details (id_achat, id_produit, quantite, prix_unitaire) VALUES 
(1, 1, 2, 1000),
(1, 3, 3, 1200),
(2, 2, 5, 400),
(2, 5, 2, 800),
(3, 4, 1, 2500),
(3, 3, 2, 1200);

CREATE VIEW v_export_achat AS
SELECT
    a.id_achat,

    c.nom              AS client,

    ca.numero          AS caisse,

    cs.email           AS caissier,

    a.date_achat,

    a.statut,

    p.designation      AS produit,

    ad.quantite,

    ad.prix_unitaire,

    ad.quantite * ad.prix_unitaire AS montant

FROM achat a

JOIN achat_details ad
    ON a.id_achat = ad.id_achat

JOIN produit p
    ON p.id_produit = ad.id_produit

JOIN client c
    ON c.id_client = a.id_client

JOIN caisse ca
    ON ca.id_caisse = a.id_caisse

LEFT JOIN caissier cs
    ON cs.id_caissier = a.id_caissier;

    -- Drop child tables first (tables with foreign keys)
DROP TABLE IF EXISTS achat_details;
DROP TABLE IF EXISTS achat;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS caissier;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS caisse;