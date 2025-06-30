use dbolimpiadas;
GO
CREATE PROCEDURE SP_ObtenerEstadia
AS
BEGIN
 SELECT Id_Estadia, Estadia, Tipo_Estadia, Calle, Nro, Piso, Depto
    FROM Estadia;
END