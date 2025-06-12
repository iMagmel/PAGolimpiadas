use olimpiadas;
GO
CREATE PROCEDURE SP_ActualizarUltimoLog
	@id_usuario INT
AS 
BEGIN
	UPDATE Usuarios
	SET Ultimo_Login = GETDATE()
	WHERE Id_Usuario = @id_usuario;
END