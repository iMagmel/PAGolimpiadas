USE dbolimpiadas;
GO

CREATE OR ALTER PROCEDURE SP_Login
    @Email NVARCHAR(100),
    @Usuario NVARCHAR(20),
    @Password NVARCHAR(256)
AS
BEGIN
    SELECT 
        U.Id_Usuario, 
        COALESCE(P.Nombre, PE.Nombre) AS Nombre,
        COALESCE(P.Apellido, PE.Apellido) AS Apellido,
        U.Usuario,
        U.Id_Rol, 
        U.Email_Confirmado, 
        U.Email
    FROM Usuarios U
    LEFT JOIN Personal P ON U.Id_Personal = P.Id_Personal
    LEFT JOIN PersonalEmpresa PE ON U.Id_Pempresa = PE.Id_Pempresa
    WHERE U.Email = @Email AND U.Usuario = @Usuario AND U.Password = @Password;
    
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
