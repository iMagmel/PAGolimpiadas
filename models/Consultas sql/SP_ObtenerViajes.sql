USE dbolimpiadas;
GO
CREATE OR ALTER PROCEDURE SP_ObtenerViajes
AS
BEGIN
    SELECT 
        Id_Viaje,
        Destino,
        Descripcion,
        Fecha_Salida,
        Fecha_Vuelta
    FROM Viajes;
END
