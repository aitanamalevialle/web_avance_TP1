CREATE TABLE personne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(45) NOT NULL,
    courriel VARCHAR(45) NOT NULL,
    telephone VARCHAR(20) 
);

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(45) NOT NULL,
    FOREIGN KEY (id) REFERENCES personne(id) ON DELETE CASCADE
);

CREATE TABLE guide (
    id INT AUTO_INCREMENT PRIMARY KEY,
    langues_parlees VARCHAR(45),
    specialite VARCHAR(45),
    FOREIGN KEY (id) REFERENCES personne(id) ON DELETE CASCADE
);

CREATE TABLE voyage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(45) NOT NULL,
    date_depart DATE NOT NULL,
    date_retour DATE NOT NULL,
    prix DOUBLE NOT NULL,
    description TEXT
);

CREATE TABLE facture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    voyage_id INT,
    montant DOUBLE NOT NULL,
    date_facture DATE,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (voyage_id) REFERENCES voyage(id)
);

CREATE TABLE guide_voyage (
    guide_id INT,
    voyage_id INT,
    PRIMARY KEY (guide_id, voyage_id),
    FOREIGN KEY (guide_id) REFERENCES guide(id),
    FOREIGN KEY (voyage_id) REFERENCES voyage(id)
);