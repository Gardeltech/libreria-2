---
---

## -- Nombre base de datos: `libreria-app`;

--

## -- Estructura de tabla para la tabla `libros`

--

`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`titulo` varchar(255) NOT NULL,
`autor` varchar(255) NOT NULL,
`genero` varchar(50) DEFAULT NULL,
`anio_publicacion` year DEFAULT NULL,
`precio` decimal(10, 2) DEFAULT NULL,
`imagen` varchar(255) DEFAULT NULL,
`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP

---

--

## -- Estructura de tabla para la tabla `usuario`

`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`usuario` varchar(50) NOT NULL,
`password` varchar(255) NOT NULL,
`email` varchar(100) NOT NULL,
`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP

---
