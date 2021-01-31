-- 10-06-2019
-- DAI 5501
-- Por: Emilio Gajardo

CREATE DATABASE bdasistencia;
USE bdasistencia;





CREATE TABLE paciente(
    rut VARCHAR(10) PRIMARY KEY NOT NULL,
    nombre VARCHAR(50),
    apel VARCHAR(50),
    edad INT,
    medicamento VARCHAR(50),
    enfermedad VARCHAR(50)
);




CREATE TABLE enfermera(
    rut VARCHAR(10) PRIMARY KEY NOT NULL,
    nombre VARCHAR(50),
    apel VARCHAR(50),
    valor INT
);





CREATE TABLE turno(
    idturno VARCHAR(10) PRIMARY KEY NOT NULL,
    rutpaciente VARCHAR(10),
    rutenfermera VARCHAR(10),
    fechaturno DATE,
    presion DOUBLE,
    saturacion DOUBLE,
    temperatura DOUBLE,
    observacion VARCHAR(200),
    CONSTRAINT fkrutEnf FOREIGN KEY(rutenfermera) REFERENCES enfermera(rut) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fkrutPac FOREIGN KEY(rutpaciente) REFERENCES paciente(rut) ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE familiar(
    rut VARCHAR(10) PRIMARY KEY NOT NULL,
    rutpaciente VARCHAR(10),
    nombre VARCHAR(50),
    apel VARCHAR(50),
    fono INT,
    email VARCHAR(50),
    tipo VARCHAR(30),
    CONSTRAINT fkrutPaci FOREIGN KEY(rutpaciente) REFERENCES paciente(rut) ON DELETE CASCADE ON UPDATE CASCADE
);





CREATE TABLE remuneracion(
    codigo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rutenfermera VARCHAR(10),
    cantturnos INT,
    valorturn INT,
    total INT,
    fecharemuneracion DATE,
    CONSTRAINT fkrutEnfer FOREIGN KEY(rutenfermera) REFERENCES enfermera(rut) ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE autenticacion(
    usuario VARCHAR(20) PRIMARY KEY NOT NULL,
    clave VARCHAR(20) DEFAULT NULL,
    perfil VARCHAR(20) DEFAULT NULL
);














-- Insercion de datos

INSERT INTO paciente VALUES('1-1', 'Adan Axel', 'Puebla Ortiz', 80, 'Enalapril', 'Hipertencion Arterial');
INSERT INTO paciente VALUES('1-2', 'Berto Bastian', 'Ortega Ortiz', 85, 'Furosemida', 'Retencion de liquido');
INSERT INTO paciente VALUES('1-3', 'Camilo Carlos', 'Lopez Castro', 90, 'Ensure', 'Desnutricion');

INSERT INTO enfermera VALUES('2-1', 'Carmen Rosario', 'Hansen Valenzuela', 15000);
INSERT INTO enfermera VALUES('2-2', 'Dimitri Dante', 'Quezada Oyarzun', 16000);
INSERT INTO enfermera VALUES('2-3', 'Eliseo Esteban', 'Campos Gonzalez', 17000);

INSERT INTO turno VALUES('t1', '1-1', '2-1', '2019-06-10', 10.7, 98, 36, 'Paciente sin observaciones durante el turno');
INSERT INTO turno VALUES('t2', '1-2', '2-2', '2019-06-10', 11.8, 97, 37, 'Paciente sin observaciones durante el turno');
INSERT INTO turno VALUES('t3', '1-3', '2-3', '2019-06-10', 12.9, 96, 35, 'Paciente sin observaciones durante el turno');

INSERT INTO familiar VALUES('3-1', '1-1', 'Fernando Guillermo', 'Puebla Bastias', 99887766, 'fernando@mail.com', 'Hijo');
INSERT INTO familiar VALUES('3-2', '1-2', 'Alejandra Estefani', 'Ortega Bastias', 66554433, 'alejandra@mail.com', 'Hija');
INSERT INTO familiar VALUES('3-3', '1-3', 'Axel Humberto', 'Castro Lozano', 44778833, 'axel@mail.com', 'Sobrino');

INSERT INTO remuneracion VALUES(null, '2-1', 10, 15000, 150000, '2019-06-30');
INSERT INTO remuneracion VALUES(null, '2-2', 20, 16000, 320000,'2019-06-30');
INSERT INTO remuneracion VALUES(null, '2-3', 30, 17000, 510000, '2019-06-30');

INSERT INTO autenticacion VALUES('root','root','root');
INSERT INTO autenticacion VALUES('admin','admin','admin');