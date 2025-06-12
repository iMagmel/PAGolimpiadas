CREATE PROCEDURE SP_CompraConfirmada
    @id_compra INT
AS
BEGIN
    INSERT INTO Historial_Compras (Id_Compra, Fecha_Compra)
    SELECT Id_Compra, Fecha_Compra 
	FROM Compras
	WHERE Id_Compra = @id_compra;
    UPDATE Compras SET Estado_Compra = 'Entregada' WHERE Id_Compra = @id_compra;
END
