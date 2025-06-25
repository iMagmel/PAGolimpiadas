USE dbolimpiadas;
GO

CREATE OR ALTER PROCEDURE SP_RegistroUsuario
    @nombre NVARCHAR(50),
    @apellido NVARCHAR(50),
    @documento NVARCHAR(20),
    @id_tipo_doc INT,
    @id_genero INT,
    @sexo NVARCHAR(10),
    @fecha_nacimiento DATE,
    @email NVARCHAR(100),
    @usuario NVARCHAR(50),
    @password NVARCHAR(256),
    @id_rol INT,
    @id_localidad INT,
    @registrado BIT OUTPUT
AS
BEGIN
    SET NOCOUNT ON;

    IF NOT EXISTS (
        SELECT 1 FROM Usuarios WHERE Email = @email
    )
    BEGIN
        DECLARE @id_pais INT;

        -- Obtener el Id_Pais a partir del Id_Localidad
        SELECT @id_pais = Pr.Id_Pais
        FROM dbo.Localidad L
        INNER JOIN dbo.Partido Pa ON L.Id_Partido = Pa.Id_Partido
        INNER JOIN dbo.Provincia Pr ON Pa.Id_Provincia = Pr.Id_Provincia
        WHERE L.Id_Localidad = @id_localidad;

        INSERT INTO Personal (
            Nombre, Apellido, Doc, Id_TipoDoc,
            Id_Pais, Id_Genero, Sexo,
            Fecha_Nacimiento
        )
        VALUES (
            @nombre, @apellido, @documento, @id_tipo_doc,
            @id_pais, @id_genero, @sexo,
            @fecha_nacimiento
        );

        DECLARE @id_personal INT = SCOPE_IDENTITY();

        INSERT INTO Usuarios (
            Email, Usuario, Password, Fecha_Alta,
            Ultimo_Login, Email_Confirmado,
            Id_Rol, Id_Personal
        )
        VALUES (
            @email, @usuario, @password, GETDATE(),
            GETDATE(), 0, @id_rol, @id_personal
        );

        SET @registrado = 1; -- Registro exitoso
    END 
    ELSE
    BEGIN
        SET @registrado = 0; -- El correo ya existe
    END
END
