--Creacion de paquetes jefe de ventas
use olimpiadas;
GO
CREATE PROCEDURE SP_InsertarViaje
    @id_transporte INT,
    @id_estadia INT,
    @destino NVARCHAR(30),
    @descripcion TEXT,
    @cupos INT,
    @fecha_salida DATE,
    @fecha_vuelta DATE
AS
BEGIN
    INSERT INTO Viajes (Id_Transporte, Id_Estadia, Destino, Descripcion, Cupos_Disponibles, Fecha_Salida, Fecha_Vuelta, Estado_Viaje)
    VALUES (@id_transporte, @id_estadia, @destino, @descripcion, @cupos, @fecha_salida, @fecha_vuelta, 'Disponible');
END
