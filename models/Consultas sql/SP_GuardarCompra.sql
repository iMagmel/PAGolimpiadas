use olimpiadas;
GO
CREATE PROCEDURE SP_GuardarCompra
    @id_usuario INT,
    @id_viaje INT,
    @cantidad INT,
    @transporte nvarchar(30),
    @estadia nvarchar(30)
AS
AS
BEGIN
    INSERT INTO Compras (Id_Viaje, Id_Usuario, Num_Compra, Estado_Compra, Fecha_Compra, Cant_Compra)
    VALUES (@id_viaje, @id_usuario, (SELECT ISNULL(MAX(Num_Compra),0)+1 FROM Compras), 'Pendiente', GETDATE(), @cantidad);
END
