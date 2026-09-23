CREATE DATABASE exemplo;

USE exemplo;

CREATE TABLE pessoa (
	id INTEGER auto_increment primary key,
    nome VARCHAR(200) not null,
    idade INTEGER
);

INSERT INTO pessoa (nome, idade) VALUES ('Molina', 40);
INSERT INTO pessoa (nome, idade) VALUES ('Maria', 20);
INSERT INTO pessoa (nome, idade) VALUES ('André', 21);

SELECT * FROM pessoa;