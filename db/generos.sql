CREATE TABLE generos(
	id_genero serial PRIMARY KEY,
	genero VARCHAR (50) UNIQUE NOT NULL
);
INSERT INTO generos (genero) VALUES
    ('Terror'),
    ('Drama'),
    ('Espias'),
    ('Historia');
