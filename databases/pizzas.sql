DROP DATABASE IF EXISTS pizzas;

CREATE DATABASE IF NOT EXISTS pizzas;

USE pizzas;

--Crear las tablas para la BD
CREATE TABLE IF NOT EXISTS pedidos (
    Codigo INTEGER NOT NULL,
    Tipo VARCHAR(25) NOT NULL DEFAULT 'Al gusto' COMMENT 'Tipo de Pizza',
    Tamano VARCHAR(20) NOT NULL,
    Masa VARCHAR(50) NOT NULL,
    Queso VARCHAR(20) NOT NULL,
    Ingredientes VARCHAR(250) NOT NULL,
    Precio INTEGER(10) UNSIGNED NOT NULL
) ENGINE=InnoDB COMMENT='Orden para Cocina';

ALTER TABLE pedidos ADD PRIMARY KEY (Codigo);

ALTER TABLE pedidos MODIFY Codigo INTEGER NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 100;

INSERT INTO pedidos(Tipo, Tamano, Masa, Queso, Ingredientes, Precio) VALUES
    ('Al gusto', 'Grande', 'Esponjosita', 'Cheddar', 'Tocino, Aceituna y Pierna', 190),
    ('Especialidad', 'Chica', 'Delgada', 'Gouda', 'Salami y Choorizo Argentino', 90),
    ('Al gusto', 'Mediana', 'Original', 'Sin queso', 'Pepperoni, Aceitunas y Pierna', 150);
