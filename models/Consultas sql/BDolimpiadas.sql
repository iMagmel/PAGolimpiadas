    use dbolimpiadas;
    go
    CREATE TABLE Genero (
        Id_Genero INT PRIMARY KEY identity(1,1) not null,
        Genero NVARCHAR(20) not null
    );

    CREATE TABLE Pais (
        Id_Pais INT PRIMARY KEY identity(1,1) not null,
        Pais NVARCHAR(30) not null
    );

    CREATE TABLE Provincia (
        Id_Provincia INT PRIMARY KEY identity(1,1) not null,
        Provincia NVARCHAR(30) not null,
        Id_Pais INT,
        FOREIGN KEY (Id_Pais) REFERENCES Pais(Id_Pais)
    );

    CREATE TABLE Partido (
        Id_Partido INT PRIMARY KEY identity(1,1) not null,
        Partido NVARCHAR(30) not null,
        Id_Provincia INT,
        FOREIGN KEY (Id_Provincia) REFERENCES Provincia(Id_Provincia)
    );

    CREATE TABLE Localidad (
        Id_Localidad INT PRIMARY KEY identity(1,1) not null,
        Localidad NVARCHAR(30) not null,
        Id_Partido INT,
        FOREIGN KEY (Id_Partido) REFERENCES Partido(Id_Partido)
    );

    CREATE TABLE Roles (
        Id_Rol INT PRIMARY KEY identity(1,1) not null,
        Rol NVARCHAR(30) not null
    );

    CREATE TABLE Tipo_Doc (
        Id_TipoDoc INT PRIMARY KEY identity(1,1) not null,
        TipoDoc NVARCHAR(30) not null	
    );

    CREATE TABLE PersonalEmpresa (
        Id_Pempresa	INT PRIMARY KEY identity(1,1) not null,
        Nombre NVARCHAR(50) not null,
        Apellido NVARCHAR(50) not null,
        Id_TipoDoc INT,
        Doc INT not null,
        Id_Pais INT,
        Id_Genero INT,
        Sexo CHAR(1) not null,
        Fecha_Nacimiento DATE,
        FOREIGN KEY (Id_TipoDoc) REFERENCES Tipo_Doc(Id_TipoDoc),
        FOREIGN KEY (Id_Pais) REFERENCES Pais(Id_Pais),
        FOREIGN KEY (Id_Genero) REFERENCES Genero(Id_Genero)
    );

    CREATE TABLE Personal (
        Id_Personal INT PRIMARY KEY identity(1,1) not null,
        Nombre NVARCHAR(50) not null,
        Apellido NVARCHAR(50) not null,
        Id_TipoDoc INT,
        Doc INT not null,
        Id_Pais INT,
        Id_Genero INT,
        Sexo CHAR(1) not null,
        Fecha_Nacimiento DATE,
        FOREIGN KEY (Id_TipoDoc) REFERENCES Tipo_Doc(Id_TipoDoc),
        FOREIGN KEY (Id_Pais) REFERENCES Pais(Id_Pais),
        FOREIGN KEY (Id_Genero) REFERENCES Genero(Id_Genero)
    );

    CREATE TABLE Usuarios (
        Id_Usuario INT PRIMARY KEY identity(1,1) not null,
        Id_Personal INT,
        Id_Pempresa INT,
        Email NVARCHAR(100),
        usuario NVARCHAR(20) not null,
        Password NVARCHAR(256) not null,
        Fecha_Alta DATE,
        Ultimo_Login DATETIME,
        Id_Rol INT,
        Email_Confirmado BIT,
        FOREIGN KEY (Id_Personal) REFERENCES Personal(Id_Personal),
        FOREIGN KEY (Id_Pempresa) REFERENCES PersonalEmpresa(Id_Pempresa),
        FOREIGN KEY (Id_Rol) REFERENCES Roles(Id_Rol)
    );

    CREATE TABLE Estadia (
        Id_Estadia INT PRIMARY KEY identity(1,1) not null,
        Estadia NVARCHAR (30),
        Id_Pais INT,
        Calle NVARCHAR(30),
        Nro INT,
        Piso INT,
        Depto NVARCHAR(20),
        FOREIGN KEY (Id_Pais) REFERENCES Pais(Id_Pais)
    );

    CREATE TABLE Clases (
        Id_Clase INT PRIMARY KEY identity(1,1) not null,
        Clase NVARCHAR(30) not null,
        Precio DECIMAL(10, 2) not null
    );

    CREATE TABLE Vuelos (
        Id_Vuelo INT PRIMARY KEY identity(1,1) not null,
        N_Vuelo INT not null,
        Capacidad INT
    );

    CREATE TABLE Asientos (
        Id_Asiento INT PRIMARY KEY identity(1,1) not null,
        N_AsientoIda INT not null,
        N_AsientoVuelta INT not null,
        Id_Clase INT,
        Id_Vuelo INT,
        FOREIGN KEY (Id_Clase) REFERENCES Clases(Id_Clase),
        FOREIGN KEY (Id_Vuelo) REFERENCES Vuelos(Id_Vuelo)
    );

    CREATE TABLE Viajes (
        Id_Viaje INT PRIMARY KEY identity(1,1) not null,
        Id_Vuelo INT,
        Id_Estadia INT,
        Destino NVARCHAR(30),
        Descripcion TEXT,
        Cupos_Disponibles INT,
        Fecha_Salida DATE,
        Fecha_Vuelta DATE,
        Estado_Viaje NVARCHAR(20),
        FOREIGN KEY (Id_Estadia) REFERENCES Estadia(Id_Estadia),
        FOREIGN KEY (Id_Vuelo) REFERENCES Vuelos(Id_Vuelo)
    );


    CREATE TABLE Compras (
        Id_Compra INT PRIMARY KEY identity(1,1) not null,
        Id_Viaje INT,
        Id_Usuario INT,
        Num_Compra INT,
        N_Pasaje INT,
        Id_Asiento INT,
        N_Asiento INT not null,
        Estado_Compra NVARCHAR(30),
        Fecha_Compra DATE,
        Cant_Compra INT not null,
        FOREIGN KEY (Id_Usuario) REFERENCES Usuarios (Id_Usuario),
        FOREIGN KEY (Id_Viaje) REFERENCES Viajes(Id_Viaje),
        FOREIGN KEY (Id_Asiento) REFERENCES Asientos(Id_Asiento)
    );

    CREATE TABLE Notificaciones (
    Id_Notificacion INT PRIMARY KEY IDENTITY(1,1),
    Id_Compra INT,
    EmailDestino NVARCHAR(100),
    Tipo NVARCHAR(30), 
    Asunto NVARCHAR(100),
    Mensaje TEXT,
    FechaEnvio DATETIME,
    Enviado BIT DEFAULT 0,
    FOREIGN KEY (Id_Compra) REFERENCES Compras(Id_Compra)
);


    CREATE TABLE Historial_Compras (
        Id_Hcompra INT PRIMARY KEY identity(1,1) not null,
        Id_Compra INT,
        Id_Usuario INT,
        Fecha_Compra DATE,
        FOREIGN KEY (Id_Compra) REFERENCES Compras(Id_Compra),
        FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    );

    CREATE TABLE Historial_Contraseñas(
        Id_Hcontra INT PRIMARY KEY identity(1,1) not null,
        Id_Usuario INT,
        Fecha_Cambio DATE,
        Password NVARCHAR(256) not null,
        FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    );

    IF NOT EXISTS (
        SELECT * FROM sysobjects WHERE name = 'Carrito_Usuario' AND xtype = 'U'
    )
    BEGIN
        CREATE TABLE Carrito_Usuario (
            Id_Carrito INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
            Id_Usuario INT,
            Id_Viaje INT,
            FOREIGN KEY (Id_Usuario) REFERENCES Usuarios (Id_Usuario),
            FOREIGN KEY (Id_Viaje) REFERENCES Viajes (Id_Viaje)
        );
    END