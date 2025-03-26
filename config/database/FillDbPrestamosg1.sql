-- By Gaboh - 20250311
-- Database: `prestamosg1`

USE prestamosg1;

INSERT INTO roles VALUES
(null, 'Administrador'),
(null, 'Usuario'),
(null, 'Secretaria');

INSERT INTO generos VALUES
(null, 'Hombre'),
(null, 'Mujer'),
(null, 'Otro');

INSERT INTO usuarios VALUES
('761', 'Juan Peréz', 'juan@uno.com', '1234', '3113', 'Calle 1', 1, 1),
('341', 'María Cuellar', 'maria@uno.com', '1234', '3112', 'Carrera 2', 3, 2),
('762', 'Mario Burbano', 'mario@uno.com', '1234', '3111', 'Calle 2', 2, 1);