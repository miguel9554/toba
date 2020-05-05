CREATE TABLE prestamos_maestro(
	id_prestamo serial PRIMARY KEY,
	id_usuario INTEGER REFERENCES usuarios(id_usuario),
        fecha_salida DATE NOT NULL,
        fecha_devolucion DATE NOT NULL,
        fecha_carga DATE NOT NULL DEFAULT NOW()
);
