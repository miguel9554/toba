CREATE TABLE prestamos_detalle(
        id_detalle serial PRIMARY KEY,
	id_prestamo INTEGER REFERENCES prestamos_maestro(id_prestamo),
	id_libro INTEGER REFERENCES libros(id_libro)
);
