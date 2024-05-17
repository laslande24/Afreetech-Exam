CREATE DATABASE intia;

USE intia;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresse VARCHAR(100),
    telephone VARCHAR(15),
    email VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE assurances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_assurance VARCHAR(50),
    prime DECIMAL(10, 2),
    duree INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE client_assurance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    assurance_id INT,
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (assurance_id) REFERENCES assurances(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);