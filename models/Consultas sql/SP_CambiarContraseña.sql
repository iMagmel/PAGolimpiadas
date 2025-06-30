use dbolimpiadas;
GO
CREATE PROCEDURE SP_CambiarContraseña
	@Email NVARCHAR(100),
	@Password NVARCHAR(256)
AS
BEGIN
	DECLARE @Id_Usuario INT;

	SELECT @Id_Usuario = Id_Usuario 
	FROM Usuarios
	WHERE Email = @Email;

	UPDATE Usuarios
	SET Password = @Password,
	codigo_recuperacion = NULL
	WHERE Email = @Email;

	INSERT INTO Historial_Contraseñas (Id_Usuario, Fecha_Cambio, Password)
	VALUES (@Id_Usuario, GETDATE(), @Password);
END