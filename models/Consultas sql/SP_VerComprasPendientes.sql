use olimpiadas;
GO
CREATE PROCEDURE SP_VerComprasPendientes
    @id_usuario INT
AS
BEGIN
    SELECT C.Id_Compra, V.Destino, V.Fecha_Salida, C.Cant_Compra
    FROM Compras C
    JOIN Viajes V ON C.Id_Viaje = V.Id_Viaje
    WHERE C.Id_Usuario = @id_usuario AND Estado_Compra = 'Pendiente';
END
