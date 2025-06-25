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


INSERT INTO Provincia (Provincia, Id_Pais) VALUES
('Buenos Aires', 1),
('Córdoba', 1),
('Santa Fe', 1),
('Mendoza', 1),
('Tucumán', 1),
('Salta', 1),
('Neuquén', 1),
('Misiones', 1),
('Chaco', 1),
('Entre Ríos', 1);
GO

INSERT INTO Partido (Partido, Id_Provincia) VALUES
('La Matanza', 1),
('Lanús', 1),
('Lomas de Zamora', 1),
('Quilmes', 1),
('Morón', 1),
('Almirante Brown', 1),
('San Isidro', 1),
('Avellaneda', 1),
('Tigre', 1),
('José C. Paz', 1);
GO


INSERT INTO Localidad (Localidad, Id_Partido) VALUES
('San Justo', 1),
('Remedios de Escalada', 2),
('Lomas de Zamora Centro', 3),
('Quilmes Centro', 4),
('Castelar', 5),
('Adrogué', 6),
('San Isidro Centro', 7),
('Avellaneda Centro', 8),
('Tigre Centro', 9),
('José C. Paz Centro', 10);
GO


INSERT INTO Roles (Rol) VALUES
('Jefe de Ventas'),
('Cliente/Usuario');
GO


INSERT INTO Tipo_Doc (TipoDoc) VALUES
('DNI'),
('Pasaporte');
GO


INSERT INTO Estadia (Estadia, Id_Pais, Calle, Nro, Piso, Depto) VALUES
('Hotel Sol', 1, 'Av. Corrientes', 1234, 5, 'B'),
('Hostel Luna', 1, 'Calle Mitre', 567, NULL, NULL),
('Cabañas del Lago', 1, 'Ruta 40', 7890, NULL, NULL),
('Posada El Bosque', 2, 'Rua das Flores', 45, 2, 'A'),
('Hotel Mar Azul', 3, 'Av. Libertador', 1111, 10, 'C'),
('Hostel Patagonico', 1, 'San Martín', 222, 3, 'D'),
('Cabañas del Sol', 4, 'Camino Real', 88, NULL, NULL),
('Posada del Rio', 5, 'Calle San Juan', 999, 1, 'E'),
('Hotel Central', 6, 'Av. Principal', 333, NULL, NULL),
('Hostel Estrella', 7, 'Calle 9 de Julio', 1010, 7, 'F');
GO


INSERT INTO Transporte (Transporte, Capacidad) VALUES
('Bus', 40),
('Micro', 50),
('Van', 15),
('Auto', 4),
('Camioneta', 12),
('Tren', 200),
('Avion', 180),
('Barco', 300),
('Helicoptero', 6),
('Bicicleta', 1);
GO


INSERT INTO Viajes (Id_Transporte, Id_Estadia, Destino, Descripcion, Cupos_Disponibles, Fecha_Salida, Fecha_Vuelta, Estado_Viaje, N_Pasaje) VALUES
(1, 1, 'Mar del Plata', 'Viaje a la playa para descansar', 35, '2025-07-01', '2025-07-07', 'Disponible', 1001),
(2, 2, 'Bariloche', 'Excursión a la montaña y nieve', 45, '2025-08-15', '2025-08-22', 'Disponible', 1002),
(3, 3, 'Ushuaia', 'Aventura en el fin del mundo', 10, '2025-09-05', '2025-09-12', 'Disponible', 1003),
(4, 4, 'Rio de Janeiro', 'Turismo en Brasil', 3, '2025-07-20', '2025-07-30', 'Disponible', 1004),
(5, 5, 'Santiago de Chile', 'Visita a la capital chilena', 10, '2025-08-01', '2025-08-10', 'Disponible', 1005),
(6, 6, 'Salta', 'Tour cultural por Salta', 35, '2025-09-10', '2025-09-15', 'Disponible', 1006),
(7, 7, 'Misiones', 'Visita a las Cataratas del Iguazú', 25, '2025-07-05', '2025-07-12', 'Disponible', 1007),
(8, 8, 'Asunción', 'Turismo en Paraguay', 9, '2025-10-01', '2025-10-07', 'Disponible', 1008),
(9, 9, 'Medellín', 'Turismo en Colombia', 15, '2025-11-01', '2025-11-10', 'Disponible', 1009),
(10, 10, 'Caracas', 'Visita cultural y turística', 50, '2025-12-01', '2025-12-07', 'Disponible', 1010);
GO
