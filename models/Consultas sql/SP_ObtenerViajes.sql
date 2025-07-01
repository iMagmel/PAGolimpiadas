use dbolimpiadas;
GO
CREATE PROCEDURE SP_ObtenerViajes
AS
BEGIN
SELECT Id_Viaje, Id_Pais, Destino, Descripcion
FROM Viajes;
END