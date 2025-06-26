USE dbolimpiadas;
GO

CREATE PROCEDURE SP_Login
    @Email NVARCHAR(100),
    @Usuario NVARCHAR(20),
    @Password NVARCHAR(256)
AS
BEGIN
    DECLARE @IdUsuario INT;

    SELECT @IdUsuario = Id_Usuario
    FROM Usuarios
    WHERE Email = @Email AND Usuario = @Usuario AND Password = @Password;

    IF @IdUsuario IS NOT NULL
    BEGIN
        SELECT Id_Usuario, Id_Rol
        FROM Usuarios
        WHERE Id_Usuario = @IdUsuario;

        UPDATE Usuarios
        SET Ultimo_Login = GETDATE()
        WHERE Id_Usuario = @IdUsuario;
    END
    ELSE
    BEGIN
        SELECT NULL AS Id_Usuario, NULL AS Id_Rol;
    END
END
