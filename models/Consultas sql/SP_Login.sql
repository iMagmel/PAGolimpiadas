use olimpiadas;
GO
CREATE PROCEDURE SP_Login
	@usuario NVARCHAR(20),
	@password NVARCHAR(256)
AS
BEGIN
	SELECT Id_Usuario, Id_Rol
	FROM Usuarios
	WHERE usuario = @usuario AND Password = @password AND Email_Confirmado = 1;
END