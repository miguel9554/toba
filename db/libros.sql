CREATE TABLE libros(
  id_libro serial PRIMARY KEY,
  nombre VARCHAR (50) NOT NULL,
  isbn INTEGER UNIQUE NOT NULL,
  editorial VARCHAR (50) NOT NULL,
  id_genero INTEGER REFERENCES generos(id_genero),
  id_autor INTEGER REFERENCES autores(id_autor)
);
INSERT INTO libros (nombre, isbn, editorial, id_genero, id_autor) VALUES
  ('Hola', 25, 'Nueva Libreria', 2, 3),
  ('Infeliz', 33, 'Schrodinger', 1, 3),
  ('JKA', 1, 'Newton', 1, 4),
  ('MMM', 2, 'Nueva Libreria', 4, 1),
  ('Frankestein', 3, 'Editorial Inexistente', 3, 2);
