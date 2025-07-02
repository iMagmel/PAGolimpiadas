use dbolimpiadas;
GO
CREATE PROCEDURE SP_InsertarVuelos
    @N_Vuelo INT,
    @Capacidad INT
    AS
    BEGIN
        SET NOCOUNT ON;

        IF EXISTS (SELECT 1 FROM Vuelos WHERE N_Vuelo = @N_Vuelo)
        BEGIN
            RAISERROR('Ya existe un vuelo con el mismo número.', 16, 1);
            RETURN;
        END

        INSERT INTO Vuelos (N_Vuelo, Capacidad)
        VALUES (@N_Vuelo, @Capacidad);
    END;