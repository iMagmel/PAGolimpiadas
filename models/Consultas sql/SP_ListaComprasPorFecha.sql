use olimpiadas;
GO
--si el jefe de ventas quiere ver las compras de un cliente desde tal hasta tal fecha
--jefe de ventas consulta pedidos por fecha
CREATE PROCEDURE SP_ListaComprasPorFecha
    @desde DATE,
    @hasta DATE
AS
BEGIN
    SELECT C.Id_Compra, C.Num_Compra, P.Nombre, P.Apellido, C.Fecha_Compra, V.Destino
    FROM Compras C
    JOIN Usuarios U ON C.Id_Usuario = U.Id_Usuario
    JOIN Personal P ON U.Id_Personal = P.Id_Personal
    JOIN Viajes V ON C.Id_Viaje = V.Id_Viaje
    WHERE C.Fecha_Compra BETWEEN @desde AND @hasta
    ORDER BY C.Fecha_Compra DESC;
END
