use olimpiadas;
GO
CREATE PROCEDURE SP_RegistroUsuario
    @nombre NVARCHAR(50),
    @apellido NVARCHAR(50),
    @documento NVARCHAR(20),
    @id_tipo_doc INT,
    @id_localidad INT,          
    @id_genero INT,
    @sexo NVARCHAR(10),
    @fecha_nacimiento DATE,
    @email NVARCHAR(100),
    @usuario NVARCHAR(50),
    @password NVARCHAR(256),
    @id_rol INT,
    @registrado BIT OUTPUT
AS
BEGIN
    IF(NOT EXIST(SELECT * FROM Usuarios WHERE Email = @Email))
    BEGIN
    INSERT INTO Personal (
        Nombre, Apellido, Doc, Id_TipoDoc,
        Id_Localidad, Id_Genero, Sexo,
        Fecha_Nacimiento
    )
    VALUES (
        @nombre, @apellido, @documento, @id_tipo_doc,
        @id_localidad, @id_genero, @sexo,
        @fecha_nacimiento
    );

    -- Trae el Id para Personal
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
    SET @registrado = 1 --Registro completado
    END 
    ELSE
    BEGIN
    SET @registrado = 0 -- El correo ya se registro
    END
END
