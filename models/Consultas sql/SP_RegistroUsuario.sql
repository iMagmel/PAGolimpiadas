USE dbolimpiadas;
GO

CREATE PROCEDURE SP_RegistroUsuario
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
    @id_pais INT,
    @registrado BIT OUTPUT
AS
BEGIN
    SET NOCOUNT ON;


    IF EXISTS (SELECT 1 FROM Usuarios WHERE Email = @email OR usuario = @usuario)
    BEGIN
        SET @registrado = 0;
        RETURN;
    END


    INSERT INTO Personal (Nombre, Apellido, Id_TipoDoc, Doc, Id_Pais, Id_Genero, Sexo, Fecha_Nacimiento)
    VALUES (@nombre, @apellido, @id_tipo_doc, @documento, @id_pais, @id_genero, @sexo, @fecha_nacimiento);

    DECLARE @id_personal INT = SCOPE_IDENTITY();


    INSERT INTO Usuarios (Id_Personal, Email, usuario, Password, Fecha_Alta, Id_Rol)
    VALUES (@id_personal, @email, @usuario, @password, GETDATE(), @id_rol);

    SET @registrado = 1;
END
