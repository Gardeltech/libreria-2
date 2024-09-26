---
---
## -- Nombre base de datos: `libreria_app`;
CREATE DATABASE IF NOT exists libreria_app;

--
USE libreria_app;
## -- Estructura de tabla para la tabla `libros`

DROP TABLE libros;
--
CREATE TABLE libros (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `titulo` varchar(255) NOT NULL,
    `autor` varchar(255) NOT NULL,
    `genero` varchar(50),
    `anio_publicacion` int,
    `precio` decimal(10, 2),
    `imagen` varchar(255) DEFAULT 'avatar-libro.jpg',
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP
);
---
INSERT INTO
    libros (
        titulo,
        autor,
        genero,
        anio_publicacion,
        precio
    )
VALUES (
        'Cien años de soledad',
        'Gabriel García Márquez',
        'Realismo mágico',
        1967,
        12.99
    ),
    (
        'Don Quijote de la Mancha',
        'Miguel de Cervantes',
        'Novela',
        1605,
        15.50
    ),
    (
        'La sombra del viento',
        'Carlos Ruiz Zafón',
        'Ficción',
        2001,
        14.75
    ),
    (
        'El amor en los tiempos del cólera',
        'Gabriel García Márquez',
        'Romántico',
        1985,
        13.25
    ),
    (
        'Los detectives salvajes',
        'Roberto Bolaño',
        'Literatura contemporánea',
        1998,
        16.00
    ),
    (
        'La casa de los espíritus',
        'Isabel Allende',
        'Realismo mágico',
        1982,
        11.50
    ),
    (
        'El túnel',
        'Ernesto Sabato',
        'Psicológico',
        1948,
        10.99
    ),
    (
        'Rayuela',
        'Julio Cortázar',
        'Experimental',
        1963,
        17.30
    ),
    (
        'Ficciones',
        'Jorge Luis Borges',
        'Ficción',
        1944,
        12.00
    ),
    (
        'Pedro Páramo',
        'Juan Rulfo',
        'Ficción',
        1955,
        9.99
    );
## -- Estructura de tabla para la tabla `usuario`
CREATE TABLE usuario (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `username` varchar(50) UNIQUE NOT NULL,
    `userpass` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
);
---
DROP TABLE usuario;
--

UPDATE libros
SET
    imagen = "avatar-libros.jpg"
WHERE
    imagen != "avatar-libros.jpg";

UPDATE libros
SET
    titulo = ":titulo",
    autor = ":autor",
    genero = ":genero",
    anio_publicacion = 1234,
    precio = 23
WHERE
    id = 24;