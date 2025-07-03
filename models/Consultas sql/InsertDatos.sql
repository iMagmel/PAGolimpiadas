USE dbolimpiadas;
GO


INSERT INTO Genero (Genero) VALUES
('Hombre'),
('Mujer'),
('No binario'),
('Prefiero no decirlo');
GO


INSERT INTO Pais (Pais) VALUES
('Argentina'),
('Brasil'),
('Chile'),
('Uruguay'),
('Paraguay'),
('Bolivia'),
('Perú'),
('Ecuador'),
('Colombia'),
('Venezuela');
GO


-- Brasil (Id_Pais = 2)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('São Paulo', 2),
('Rio de Janeiro', 2);

-- Chile (Id_Pais = 3)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Santiago Metropolitan', 3),
('Valparaíso', 3);

-- Uruguay (Id_Pais = 4)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Montevideo', 4),
('Canelones', 4);

-- Paraguay (Id_Pais = 5)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Central', 5),
('Alto Paraná', 5);

-- Bolivia (Id_Pais = 6)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('La Paz', 6),
('Santa Cruz', 6);

-- Perú (Id_Pais = 7)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Lima', 7),
('Cusco', 7);

-- Ecuador (Id_Pais = 8)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Pichincha', 8),
('Guayas', 8);

-- Colombia (Id_Pais = 9)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Cundinamarca', 9),
('Antioquia', 9);

-- Venezuela (Id_Pais = 10)
INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Distrito Capital', 10),
('Zulia', 10);
GO

-- Brasil - São Paulo (Id_Provincia = 11), Rio de Janeiro (12)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Campinas', 11),
('Santos', 11),
('Niterói', 12),
('Nova Iguaçu', 12);

-- Chile - Santiago Metropolitan (13), Valparaíso (14)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Santiago Centro', 13),
('Puente Alto', 13),
('Valparaíso Centro', 14),
('Viña del Mar', 14);

-- Uruguay - Montevideo (15), Canelones (16)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Centro', 15),
('Pocitos', 15),
('Las Piedras', 16),
('Ciudad de la Costa', 16);

-- Paraguay - Central (17), Alto Paraná (18)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('San Lorenzo', 17),
('Lambaré', 17),
('Ciudad del Este', 18),
('Hernandarias', 18);

-- Bolivia - La Paz (19), Santa Cruz (20)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('El Alto', 19),
('Zona Sur', 19),
('Santa Cruz de la Sierra', 20),
('Warnes', 20);

-- Perú - Lima (21), Cusco (22)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Miraflores', 21),
('San Isidro', 21),
('Cusco Centro', 22),
('San Sebastián', 22);

-- Ecuador - Pichincha (23), Guayas (24)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Quito Centro', 23),
('Tumbaco', 23),
('Guayaquil Centro', 24),
('Durán', 24);

-- Colombia - Cundinamarca (25), Antioquia (26)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Soacha', 25),
('Chía', 25),
('Medellín', 26),
('Bello', 26);


-- Venezuela - Distrito Capital (27), Zulia (28)
INSERT INTO Partido (Partido, Id_Provincia) VALUES
('Caracas Centro', 27),
('El Paraíso', 27),
('Maracaibo Centro', 28),
('San Francisco', 28);
GO

INSERT INTO Localidad (Localidad, Id_Partido) VALUES
-- Brasil
('Jardim Paulista', 11),
('Gonzaga', 12),
('Icaraí', 13),
('Comendador Soares', 14),

-- Chile
('Barrio Lastarria', 15),
('Bajos de Mena', 16),
('Playa Ancha', 17),
('Recreo', 18),

-- Uruguay
('Ciudad Vieja', 19),
('Punta Carretas', 20),
('Villa Alegría', 21),
('Lagomar', 22),

-- Paraguay
('Marianela', 23),
('Vista Alegre', 24),
('Zona Comercial', 25),
('Centro de Hernandarias', 26),

-- Bolivia
('12 de Octubre', 27),
('Achumani', 28),
('Equipetrol', 29),
('Satélite Norte', 30),

-- Perú
('Larcomar', 31),
('El Olivar', 32),
('Plaza de Armas', 33),
('Zona de San Sebastián', 34),

-- Ecuador
('Centro Histórico', 35),
('Valle de Tumbaco', 36),
('Malecón 2000', 37),
('Vía Durán', 38),

-- Colombia
('Centro Soacha', 39),
('Zona Industrial Chía', 40),
('El Poblado', 41),
('Niquía', 42),

-- Venezuela
('Sabana Grande', 43),
('Montalbán', 44),
('Veritas', 45),
('La Polar', 46);



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


