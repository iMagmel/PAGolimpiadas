use dbolimpiadas;
GO
    CREATE PROCEDURE SP_InsertarEstadia
    @Tipo_Estadia NVARCHAR(50),
    @Id_Pais INT,
    @Calle NVARCHAR(30),
    @Numero INT,
    @Piso NVARCHAR(10),
    @Depto NVARCHAR(10)

    AS
    BEGIN
        SET NOCOUNT ON;

        IF EXISTS (SELECT 1 FROM Estadia WHERE Estadia = @Tipo_Estadia AND Id_Pais = @Id_Pais)
        BEGIN
            RAISERROR('Ya existe una estadía con el mismo tipo y país.', 16, 1);
            RETURN;
        END

        INSERT INTO Estadia (Tipo_Estadia, Id_Pais, Calle, Nro, Piso, Depto)
        VALUES (@Tipo_Estadia, @Id_Pais, @Calle, @Numero, @Piso, @Depto);
    END;