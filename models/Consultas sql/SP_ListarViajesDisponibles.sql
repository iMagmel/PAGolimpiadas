use olimpiadas;
GO
CREATE PROCEDURE SP_ListarViajesDisponibles
AS
BEGIN
    SELECT V.Id_Viaje, V.Destino, V.Descripcion, V.Fecha_Salida, V.Cupos_Disponibles
    FROM Viajes V
    WHERE Estado_Viaje = 'Disponible' AND Cupos_Disponibles > 0;
END
