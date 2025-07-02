use dbolimpiadas;
go
    CREATE PROCEDURE SP_InsertarAutos
    @Tipo_Auto NVARCHAR(30),
    @Modelo NVARCHAR(30)
    AS
    BEGIN
        SET NOCOUNT ON;

        IF EXISTS (SELECT 1 FROM Autos WHERE Tipo_Auto = @Tipo_Auto AND Modelo = @Modelo)
        BEGIN
            RAISERROR('Ya existe un auto con el mismo tipo y modelo.', 16, 1);
            RETURN;
        END

        INSERT INTO Autos (Tipo_Auto, Modelo)
        VALUES (@Tipo_Auto, @Modelo);
    END;