use olimpiadas;
GO
--VER historial de compras de clientes (para el cliente en info de "mi cuenta")
CREATE PROCEDURE SP_EstadoCuentaCliente
    @id_usuario INT
AS
BEGIN
    SELECT Num_Compra, Fecha_Compra, Estado_Compra, Cant_Compra
    FROM Compras
    WHERE Id_Usuario = @id_usuario
    ORDER BY Fecha_Compra DESC;
END
