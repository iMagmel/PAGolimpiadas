use dbolimpiadas;
GO
CREATE PROCEDURE SP_VerificarEmail
	@Email NVARCHAR(100)
AS 
BEGIN
	SELECT Id_Usuario FROM Usuarios WHERE Email = @Email;
END