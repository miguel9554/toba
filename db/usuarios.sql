CREATE TABLE usuarios(
	id_usuario serial PRIMARY KEY,
	nombre VARCHAR (50) NOT NULL,
	apellido VARCHAR (50) NOT NULL,
        dni integer UNIQUE NOT NULL,
        direccion VARCHAR(50) NOT NULL,
        telefono VARCHAR (50) NOT NULL
);
INSERT INTO usuarios (nombre, apellido, dni, direccion, telefono) VALUES
    ('Miguel', 'Perez Andrade', 39559627, 'Directorio 1315', '111-11'),
    ('Juan Domingo', 'Peron', 39554627, 'Directorio 1315', '111-11'),
    ('James Clerk', 'Maxwell', 39459627, 'Directorio 1315', '111-11'),
    ('Edinson', 'Cavani', 39559622, 'Directorio 1315', '111-11');
