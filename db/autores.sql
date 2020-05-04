CREATE TABLE autores(
	id_autor serial PRIMARY KEY,
	nombre VARCHAR (50) NOT NULL,
	apellido VARCHAR (50) NOT NULL
);
INSERT INTO autores (nombre, apellido) VALUES
    ('Miguel', 'Perez Andrade'),
    ('Juan Domingo', 'Peron'),
    ('James Clerk', 'Maxwell'),
    ('Edinson', 'Cavani');
