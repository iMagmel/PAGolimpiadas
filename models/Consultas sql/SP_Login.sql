USE dbolimpiadas;
GO

CREATE OR ALTER PROCEDURE SP_Login
    @Email NVARCHAR(100),
    @Usuario NVARCHAR(20),
    @Password NVARCHAR(256)
AS
BEGIN
    SELECT Id_Usuario, Id_Rol, Email_Confirmado, Email
    FROM Usuarios
    WHERE Email = @Email AND Usuario = @Usuario AND Password = @Password;
    
    IF EXISTS (
        SELECT 1 FROM Usuarios 
        WHERE Email = @Email AND Usuario = @Usuario AND Password = @Password AND Email_Confirmado = 1
    )
    BEGIN
        UPDATE Usuarios
        SET Ultimo_Login = GETDATE()
        WHERE Email = @Email;
    END
END
