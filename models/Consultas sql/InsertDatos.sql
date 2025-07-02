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

INSERT INTO Clases (Clase, Precio) VALUES
('Turista', 50.000.00),
('Turista Premium', 80.000.00),
('Business', 120.000.00);
GO

INSERT INTO Vuelos (N_Vuelo, Id_Clase, Capacidad) VALUES
(1001, 1, 50),
(1001, 1, 50),
(1002, 2, 50),
(1003, 1, 50),
(1004, 3, 50),
(1005, 2, 50),
(1006, 1, 50),
(1007, 3, 50),
(1008, 2, 50),
(1009, 1, 50),
(1010, 3, 50);
GO

INSERT INTO Viajes (Destino, Descripcion, Cupos_Disponibles, Fecha_Salida, Fecha_Vuelta, Estado_Viaje) VALUES
('Mar del Plata', 'Viaje a la playa para descansar', 50, '2025-07-01', '2025-07-07', 'Disponible'),
('Bariloche', 'Excursión a la montaña y nieve', 50, '2025-08-15', '2025-08-22', 'Cancelado'),
('Ushuaia', 'Aventura en el fin del mundo', 50, '2025-09-05', '2025-09-12', 'Disponible'),
('Rio de Janeiro', 'Turismo en Brasil', 50, '2025-07-20', '2025-07-30', 'Disponible'),
('Santiago de Chile', 'Visita a la capital chilena', 50, '2025-08-01', '2025-08-10', 'Disponible'),
('Montevideo', 'Descanso en la capital uruguaya', 50, '2025-09-01', '2025-09-08', 'Disponible'),
('Córdoba', 'Turismo cultural en Córdoba', 50, '2025-10-05', '2025-10-12', 'Cancelado'),
('Tucumán', 'Visita a la provincia norteña', 50, '2025-11-15', '2025-11-22', 'Disponible'),
('Salta', 'Tour cultural por Salta', 50, '2025-09-10', '2025-09-15', 'Cancelado'),
('Misiones', 'Visita a las Cataratas del Iguazú', 50, '2025-07-05', '2025-07-12', 'Disponible'),
('Asunción', 'Turismo en Paraguay', 50, '2025-10-01', '2025-10-07', 'Cancelado'),
('Medellín', 'Turismo en Colombia', 50, '2025-11-01', '2025-11-10', 'Disponible'),
('Caracas', 'Visita cultural y turística', 50, '2025-12-01', '2025-12-07', 'Disponible');
GO

