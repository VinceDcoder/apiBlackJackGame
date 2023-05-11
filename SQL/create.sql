DROP TABLE IF EXISTS blackjackScores;
CREATE TABLE blackjackScores(
    id int NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    highScore varchar(255) NOT NULL DEFAULT 0,
    createdAt datetime DEFAULT NOW(),
    updatedAt datetime ON UPDATE NOW(),
    PRIMARY KEY (id)
);