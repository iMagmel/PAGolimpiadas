use olimpiadas;
GO
CREATE PROCEDURE SP_Login
	@email NVARCHAR(100),
	@usuario NVARCHAR(20),
	@password NVARCHAR(256)
AS
BEGIN
	SELECT Id_Usuario, Id_Rol
	FROM Usuarios
	WHERE Email = @email AND usuario = @usuario AND Password = @password AND Email_Confirmado = 1;
END