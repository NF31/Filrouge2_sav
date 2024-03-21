CREATE TABLE TICKET_EXP (
    NUM_TICKET INT AUTO_INCREMENT PRIMARY KEY,
    NUM_COMMANDE INT,
    CODE_TICKET VARCHAR(10),
    STATUT_TICKET VARCHAR(20),
    FOREIGN KEY (NUM_COMMANDE) REFERENCES commande(NUM_COMMANDE) ON DELETE CASCADE
);

