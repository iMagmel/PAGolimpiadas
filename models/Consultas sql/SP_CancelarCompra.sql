use olimpiadas;
GO
CREATE PROCEDURE SP_CancelarCompra
    @id_compra INT
AS
BEGIN
    UPDATE Compras SET Estado_Compra = 'Cancelada' WHERE Id_Compra = @id_compra;
END
