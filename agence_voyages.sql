CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(45),
    prenom VARCHAR(45),
    courriel VARCHAR(45),
    telephone VARCHAR(20),
    adresse VARCHAR(45)
);

CREATE TABLE voyage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(45),
    date_debut DATE,
    date_fin DATE,
    prix DOUBLE,
    description TEXT
);

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    voyage_id INT,
    date_reservation DATE,
    nombre_personne INT,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (voyage_id) REFERENCES voyage(id)
);

CREATE TABLE paiement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    montant DOUBLE,
    date_paiement DATE,
    mode_paiement VARCHAR(45),
    FOREIGN KEY (reservation_id) REFERENCES reservation(id)
);