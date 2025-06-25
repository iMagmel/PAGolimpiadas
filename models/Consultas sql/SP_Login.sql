use dbolimpiadas;
GO
CREATE PROCEDURE SP_Login
	@id_usuario INT,
	@email NVARCHAR(100),
	@usuario NVARCHAR(20),
	@password NVARCHAR(256)
AS
BEGIN
	SELECT Id_Usuario, Id_Rol
	FROM Usuarios
	WHERE Email = @email AND usuario = @usuario AND Password = @password AND Email_Confirmado = 1;

	UPDATE Usuarios
	SET Ultimo_Login = GETDATE()
	WHERE Id_Usuario = @id_usuario;
END