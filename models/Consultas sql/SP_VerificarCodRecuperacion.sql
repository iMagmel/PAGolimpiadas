use dbolimpiadas;
GO
CREATE PROCEDURE SP_VerificarCodRecuperacion
	@Email NVARCHAR(100),
	@Codigo NVARCHAR(10)
AS 
BEGIN
	SELECT Id_Usuario
	FROM Usuarios
	WHERE Email = @Email AND codigo_recuperacion = @Codigo;
END