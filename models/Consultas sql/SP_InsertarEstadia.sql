use dbolimpiadas;
GO
    CREATE PROCEDURE SP_InsertarEstadia
    @Estadia NVARCHAR(30),
	@Id_Pais INT,
    @Calle NVARCHAR(30),
    @Numero INT,
    @Piso NVARCHAR(10),
    @Depto NVARCHAR(10),
    @Tipo_Estadia NVARCHAR(30)

    AS
    BEGIN
        SET NOCOUNT ON;

        IF EXISTS (SELECT 1 FROM Estadia WHERE Estadia = @Tipo_Estadia AND Id_Pais = @Id_Pais)
        BEGIN
            RAISERROR('Ya existe una estadía con el mismo tipo y país.', 16, 1);
            RETURN;
        END

        INSERT INTO Estadia (Estadia, Id_Pais, Calle, Nro, Piso, Depto, Tipo_Estadia)
        VALUES (@Estadia, @Id_Pais, @Calle, @Numero, @Piso, @Depto, @Tipo_Estadia);
    END;