use dbolimpiadas;
GO
CREATE PROCEDURE SP_GuardarCodRecuperacion
	@Email NVARCHAR(100),
	@Codigo NVARCHAR(10)
AS 
BEGIN
	UPDATE Usuarios
	SET codigo_recuperacion = @Codigo
	WHERE Email = @Email;
END