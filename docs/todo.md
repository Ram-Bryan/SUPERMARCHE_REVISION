# To-Do — Caisse de supermarché (CodeIgniter + SQLite)

## Phase 0 — Socle commun (à faire ensemble, ~30mn)

- [ ] Créer la base de données SQLite et les migrations — 30mn

## Étudiant A — Authentification, navigation & session (~95mn)

- [ ] Créer l'écran de login (formulaire + vérification login/mot de passe contre la table `utilisateur`) — 25mn
- [ ] Créer l'écran d'accueil « Choix de la caisse » (liste déroulante des caisses + bouton Valider) — 20mn
- [ ] Stocker en session l'utilisateur connecté et la caisse choisie, puis les afficher au-dessus du menu sur les pages suivantes — 25mn

## Étudiant B — Saisie des achats & clôture (~130mn)

- [ ] Page de saisie des achats — partie haute : liste déroulante des produits + champ quantité + bouton Valider, qui ajoute une ligne au panier (en session) — 60mn
- [ ] Page de saisie des achats — partie basse : tableau récapitulatif (Produit / Prix Unit / Qté / Montant) + ligne Total — 45mn
- [ ] Bouton « Clôturer achat » : enregistrer l'achat et ses lignes en base, décrémenter le stock, vider le panier pour le client suivant — 25mn

## Intégration finale (ensemble)

- [ ] Vérifier l'enchaînement complet : Login → Choix caisse → Saisie achats → Clôture → retour saisie vide
- [ ] Vérifier que changer de caisse ne mélange pas les paniers entre caissiers
- [ ] Relecture croisée du code de l'autre avant de rendre

## ✅ Vérification de couverture des fonctionnalités du sujet

| Exigence du sujet | Couverte par | Statut |
|---|---|---|
| Table Produit (désignation, prix, quantité en stock) | `schema.sql` | ✅ |
| Table Caisse | `schema.sql` | ✅ |
| Table Achat | `schema.sql` (`achat` + `ligne_achat`) | ✅ |
| Insertion de 5 produits et 2 caisses | `schema.sql` | ✅ |
| Initialiser CodeIgniter | Phase 0 | ✅ |
| Template à partir du fichier fourni | Étudiant A | ✅ |
| Écran de choix de caisse (liste déroulante + Valider) | Étudiant A | ✅ |
| Affichage de la caisse choisie en session, au-dessus du menu | Étudiant A | ✅ |
| Page de saisie des achats — partie haute | Étudiant B | ✅ |
| Page de saisie des achats — partie basse + Total | Étudiant B | ✅ |
| Écran de login avant la page de choix de caisse | Étudiant A | ✅ |
| Bouton « Clôturer achat » + remise à zéro du panier | Étudiant B | ✅ |

Toutes les fonctionnalités demandées dans le sujet sont couvertes. Seul ajout par rapport à l'énoncé : la table `utilisateur`, nécessaire pour faire fonctionner l'écran de login (non listée explicitement dans le sujet initial, mais indispensable au Travail à faire 4.1).
