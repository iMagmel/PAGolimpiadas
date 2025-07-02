use dbolimpiadas;
GO
CREATE PROCEDURE SP_InsertarViaje
    @Id_Pais INT,
    @Destino NVARCHAR(30),
    @Descripcion TEXT,
    @Fecha_Salida DATE,
    @Fecha_Vuelta DATE
AS
BEGIN
    SET NOCOUNT ON;

    IF EXISTS (
        SELECT 1 FROM Viajes 
        WHERE Destino = @Destino 
        AND Fecha_Salida = @Fecha_Salida 
        AND Fecha_Vuelta = @Fecha_Vuelta
    )
    BEGIN
        RAISERROR('Ya existe un viaje con el mismo destino y fechas.', 16, 1);
        RETURN;
    END

    INSERT INTO Viajes (Id_Pais, Destino, Descripcion, Fecha_Salida, Fecha_Vuelta)
    VALUES (@Id_Pais, @Destino, @Descripcion, @Fecha_Salida, @Fecha_Vuelta);
END
