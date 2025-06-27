DECLARE @idPempresa INT;

INSERT INTO PersonalEmpresa 
(Nombre, Apellido, Id_TipoDoc, Doc, Id_Pais, Id_Genero, Sexo, Fecha_Nacimiento) 
VALUES 
('Admin', 'Principal', 1, 12345678, 1, 1, 'M', '1980-01-01');


SET @idPempresa = SCOPE_IDENTITY();


INSERT INTO Usuarios 
(Id_Pempresa, Email, usuario, Password, Fecha_Alta, Ultimo_Login, Id_Rol)
VALUES 
(@idPempresa, 'admin@skyway.com', 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', GETDATE(), GETDATE(), 1);
--contraseña: admin123, esta encriptada con sha256