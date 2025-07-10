USE dbolimpiadas;
GO


INSERT INTO Genero (Genero) VALUES
('Hombre'),
('Mujer'),
('No binario'),
('Prefiero no decirlo');
GO


SET IDENTITY_INSERT Pais ON;

INSERT INTO Pais (Id_Pais, Pais) VALUES
(1, 'Argentina'),
(2, 'Brasil'),
(3, 'Chile'),
(4, 'Uruguay'),
(5, 'Paraguay'),
(6, 'Bolivia'),
(7, 'Perú'),
(8, 'Ecuador'),
(9, 'Colombia'),
(10, 'Venezuela');
GO

SET IDENTITY_INSERT Pais OFF;
SET IDENTITY_INSERT Provincia ON;

INSERT INTO Provincia (Id_Provincia, Provincia, Id_Pais) VALUES
(6, 'Buenos Aires', 1),
(7, 'CABA', 1),
(8, 'Salta', 1),
(9, 'Córdoba', 1),
(10, 'Mendoza', 1),
(11, 'São Paulo', 2),
(12, 'Rio de Janeiro', 2),
(13, 'Santiago Metropolitan', 3),
(14, 'Valparaíso', 3),
(15, 'Montevideo', 4),
(16, 'Canelones', 4),
(17, 'Central', 5),
(18, 'Alto Paraná', 5),
(19, 'La Paz', 6),
(20, 'Santa Cruz', 6),
(21, 'Lima', 7),
(22, 'Cusco', 7),
(23, 'Pichincha', 8),
(24, 'Guayas', 8),
(25, 'Cundinamarca', 9),
(26, 'Antioquia', 9),
(27, 'Distrito Capital', 10),
(28, 'Zulia', 10);
GO

SET IDENTITY_INSERT Provincia OFF;
SET IDENTITY_INSERT Partido ON;

INSERT INTO Partido (Id_Partido, Partido, Id_Provincia) VALUES

(6, 'San Telmo', 6),
(7, 'Palermo', 7),
(8, 'Salta Centro', 8),
(9, 'Córdoba Centro', 9),
(10, 'Mendoza Centro', 10),
(11, 'Campinas', 11),
(12, 'Santos', 11),
(13, 'Niterói', 12),
(14, 'Nova Iguaçu', 12),
(15, 'Santiago Centro', 13),
(16, 'Puente Alto', 13),
(17, 'Valparaíso Centro', 14),
(18, 'Viña del Mar', 14),
(19, 'Centro', 15),
(20, 'Pocitos', 15),
(21, 'Las Piedras', 16),
(22, 'Ciudad de la Costa', 16),
(23, 'San Lorenzo', 17),
(24, 'Lambaré', 17),
(25, 'Ciudad del Este', 18),
(26, 'Hernandarias', 18),
(27, 'El Alto', 19),
(28, 'Zona Sur', 19),
(29, 'Santa Cruz de la Sierra', 20),
(30, 'Warnes', 20),
(31, 'Miraflores', 21),
(32, 'San Isidro', 21),
(33, 'Cusco Centro', 22),
(34, 'San Sebastián', 22),
(35, 'Quito Centro', 23),
(36, 'Tumbaco', 23),
(37, 'Guayaquil Centro', 24),
(38, 'Durán', 24),
(39, 'Centro Soacha', 25),
(40, 'Zona Industrial Chía', 25),
(41, 'El Poblado', 26),
(42, 'Niquía', 26),
(43, 'Sabana Grande', 27),
(44, 'Montalbán', 27),
(45, 'Veritas', 28),
(46, 'La Polar', 28);
GO

SET IDENTITY_INSERT Partido OFF;
INSERT INTO Localidad (Localidad, Id_Partido) VALUES

('San Telmo', 6),
('Palermo', 7),
('Salta Centro', 8),
('Córdoba Centro', 9),
('Mendoza Centro', 10),
('Jardim Paulista', 11),
('Gonzaga', 12),
('Icaraí', 13),
('Comendador Soares', 14),
('Barrio Lastarria', 15),
('Bajos de Mena', 16),
('Playa Ancha', 17),
('Recreo', 18),
('Ciudad Vieja', 19),
('Punta Carretas', 20),
('Villa Alegría', 21),
('Lagomar', 22),
('Marianela', 23),
('Vista Alegre', 24),
('Zona Comercial', 25),
('Centro de Hernandarias', 26),
('12 de Octubre', 27),
('Achumani', 28),
('Equipetrol', 29),
('Satélite Norte', 30),
('Larcomar', 31),
('El Olivar', 32),
('Plaza de Armas', 33),
('Zona de San Sebastián', 34),
('Centro Histórico', 35),
('Valle de Tumbaco', 36),
('Malecón 2000', 37),
('Vía Durán', 38),
('Centro Soacha', 39),
('Zona Industrial Chía', 40),
('El Poblado', 41),
('Niquía', 42),
('Sabana Grande', 43),
('Montalbán', 44),
('Veritas', 45),
('La Polar', 46);
GO

INSERT INTO Roles (Rol) VALUES
('Jefe de Ventas'),
('Cliente/Usuario');
GO


INSERT INTO Tipo_Doc (TipoDoc) VALUES
('DNI'),
('Pasaporte');
GO

-- Hoteles
INSERT INTO Estadia (Estadia, Id_Pais, Calle, Nro, Piso, Depto, Tipo_Estadia) VALUES
('Hotel Buenos Aires', 1, 'Av. Corrientes', 1234, 2, 'A', 'Hotel'),
('Hotel Copacabana', 2, 'Rua Atlântica', 500, 5, 'C', 'Hotel'),
('Hotel Santiago', 3, 'Alameda', 789, 3, 'B', 'Hotel'),
('Hotel Montevideo', 4, '18 de Julio', 101, 1, 'D', 'Hotel'),
('Hotel Asunción', 5, 'Mariscal López', 2020, 4, 'E', 'Hotel');

-- PH (Propiedad Horizontal)
INSERT INTO Estadia (Estadia, Id_Pais, Calle, Nro, Piso, Depto, Tipo_Estadia) VALUES
('PH San Telmo', 1, 'Defensa', 345, 1, '1A', 'PH'),
('PH Jardins', 2, 'Rua Augusta', 789, 2, '2B', 'PH'),
('PH Valparaíso', 3, 'Blanco', 150, 1, 'PB', 'PH'),
('PH Pocitos', 4, 'Benito Blanco', 910, 3, '3C', 'PH'),
('PH Central', 5, 'Avenida Eusebio Ayala', 4000, 2, '4D', 'PH');

-- Hosterías
INSERT INTO Estadia (Estadia, Id_Pais, Calle, Nro, Piso, Depto, Tipo_Estadia) VALUES
('Hostería Salta', 1, 'Caseros', 670, 1, 'PB', 'Hostería'),
('Hostería Búzios', 2, 'Rua das Pedras', 100, 2, '2E', 'Hostería'),
('Hostería Viña', 3, 'Avenida Perú', 345, 1, '1C', 'Hostería'),
('Hostería Punta del Este', 4, 'Gorlero', 789, 3, '3A', 'Hostería'),
('Hostería Encarnación', 5, 'Av. Caballero', 1122, 2, '2D', 'Hostería');

INSERT INTO Clases (Clase, Precio) VALUES
('Turista', 50000.00),
('Turista Premium', 80000.00),
('Business', 120000.00);
GO


INSERT INTO Vuelos (N_Vuelo, Capacidad) VALUES
(1001, 50),
(1001, 50),
(1002, 50),
(1003, 50),
(1004, 50),
(1005, 50),
(1006, 50),
(1007, 50),
(1008, 50),
(1009, 50),
(1010, 50);


GO

INSERT INTO Viajes (Destino, Descripcion, Cupos_Disponibles, Fecha_Salida, Fecha_Vuelta, Estado_Viaje) VALUES
-- Ecuador
('Quito', 'Visita a la capital ecuatoriana', 50, '2025-09-20', '2025-09-27', 'Disponible'),
('Guayaquil', 'Turismo y gastronomía en la costa', 50, '2025-11-10', '2025-11-17', 'Cancelado'),

-- Perú
('Lima', 'Turismo cultural en la capital peruana', 50, '2025-08-05', '2025-08-12', 'Disponible'),
('Cusco', 'Visita a Machu Picchu y los Andes', 50, '2025-09-15', '2025-09-22', 'Disponible'),

-- Bolivia
('La Paz', 'Aventura en altura', 50, '2025-10-10', '2025-10-17', 'Cancelado'),
('Santa Cruz de la Sierra', 'Turismo urbano y selva', 50, '2025-11-05', '2025-11-12', 'Disponible'),

-- Chile (adicional a Santiago)
('Valparaíso', 'Paseo costero y ciudad cultural', 50, '2025-07-25', '2025-08-01', 'Disponible'),

-- Brasil (adicional a Río)
('Salvador de Bahía', 'Viaje cultural y playas paradisíacas', 50, '2025-12-05', '2025-12-12', 'Disponible'),
('São Paulo', 'Turismo urbano y negocios', 50, '2025-10-20', '2025-10-27', 'Cancelado'),

-- Colombia (adicional a Medellín)
('Bogotá', 'Capital colombiana y su historia', 50, '2025-08-10', '2025-08-17', 'Disponible'),

-- Venezuela (adicional a Caracas)
('Maracaibo', 'Turismo y gastronomía local', 50, '2025-09-25', '2025-10-02', 'Disponible');
GO

INSERT INTO Autos (Tipo_Auto, Modelo) VALUES
-- Sedán
('Sedán', 'Toyota Corolla'),
('Sedán', 'Honda Civic'),
('Sedán', 'Volkswagen Vento'),

-- SUV
('SUV', 'Toyota RAV4'),
('SUV', 'Ford EcoSport'),
('SUV', 'Chevrolet Tracker'),

-- Pick-Up
('Pick-Up', 'Toyota Hilux'),
('Pick-Up', 'Ford Ranger'),
('Pick-Up', 'Volkswagen Amarok'),

-- Hatchback
('Hatchback', 'Volkswagen Gol'),
('Hatchback', 'Ford Fiesta'),
('Hatchback', 'Chevrolet Onix'),

-- Deportivo
('Deportivo', 'Ford Mustang'),
('Deportivo', 'Chevrolet Camaro'),
('Deportivo', 'Porsche 911');


