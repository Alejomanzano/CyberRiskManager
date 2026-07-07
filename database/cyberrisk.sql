CREATE DATABASE IF NOT EXISTS cyberrisk_manager;
USE cyberrisk_manager;

-- ===========================
-- TABLA USUARIOS
-- ===========================

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('Administrador','Analista') DEFAULT 'Analista',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- TABLA ACTIVOS
-- ===========================

CREATE TABLE activos (
    id_activo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    propietario VARCHAR(100),
    descripcion TEXT,
    confidencialidad INT CHECK(confidencialidad BETWEEN 1 AND 5),
    integridad INT CHECK(integridad BETWEEN 1 AND 5),
    disponibilidad INT CHECK(disponibilidad BETWEEN 1 AND 5),
    valor_activo DECIMAL(5,2)
);

-- ===========================
-- TABLA RIESGOS
-- ===========================

CREATE TABLE riesgos (
    id_riesgo INT AUTO_INCREMENT PRIMARY KEY,
    id_activo INT NOT NULL,
    amenaza VARCHAR(200),
    vulnerabilidad VARCHAR(200),
    probabilidad INT CHECK(probabilidad BETWEEN 1 AND 5),
    impacto INT CHECK(impacto BETWEEN 1 AND 5),
    nivel_riesgo INT,
    clasificacion VARCHAR(20),

    FOREIGN KEY (id_activo)
    REFERENCES activos(id_activo)
    ON DELETE CASCADE
);

-- ===========================
-- TABLA CONTROLES
-- ===========================

CREATE TABLE controles (

    id_control INT AUTO_INCREMENT PRIMARY KEY,

    id_riesgo INT,

    tratamiento ENUM(
        'Mitigar',
        'Transferir',
        'Aceptar',
        'Evitar'
    ),

    control_propuesto VARCHAR(200),

    responsable VARCHAR(100),

    fecha_implementacion DATE,

    estado ENUM(
        'Pendiente',
        'En Proceso',
        'Implementado'
    ),

    FOREIGN KEY(id_riesgo)
    REFERENCES riesgos(id_riesgo)
    ON DELETE CASCADE

);

-- ===========================
-- TABLA RIESGO RESIDUAL
-- ===========================

CREATE TABLE riesgos_residuales (

    id_residual INT AUTO_INCREMENT PRIMARY KEY,

    id_riesgo INT UNIQUE,

    nueva_probabilidad INT,

    nuevo_impacto INT,

    riesgo_residual INT,

    porcentaje_reduccion DECIMAL(5,2),

    FOREIGN KEY(id_riesgo)
    REFERENCES riesgos(id_riesgo)
    ON DELETE CASCADE

);

-- ===========================
-- TABLA OBSERVACIONES
-- ===========================

CREATE TABLE observaciones (

    id_observacion INT AUTO_INCREMENT PRIMARY KEY,

    id_riesgo INT,

    observacion TEXT,

    recomendacion TEXT,

    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(id_riesgo)
    REFERENCES riesgos(id_riesgo)
    ON DELETE CASCADE

);
INSERT INTO usuarios
(nombre,correo,password,rol)
VALUES
(
'Administrador',
'admin@cyberrisk.com',
'admin123',
'Administrador'
);