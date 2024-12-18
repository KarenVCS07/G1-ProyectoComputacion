/*Se crea la base de datos */
drop schema if exists tienda_tecnologica;
drop user if exists usuario_grupo1;
CREATE SCHEMA tienda_tecnologica ;

create user 'usuario_grupo1'@'%' identified by 'Usuar1o_ClaveG1.';

grant all privileges on tienda_tecnologica.* to 'usuario_grupo1'@'%';
flush privileges;


create table tienda_tecnologica.categoria (
  id_categoria INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(30) NOT NULL,
  ruta_imagen varchar(1024),
  activo bool,
  PRIMARY KEY (id_categoria))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

create table tienda_tecnologica.producto (
  id_producto INT NOT NULL AUTO_INCREMENT,
  id_categoria INT NOT NULL,
  descripcion VARCHAR(30) NOT NULL,  
  detalle VARCHAR(1600) NOT NULL, 
  precio double,
  existencias int,  
  ruta_imagen varchar(1024),
  activo bool,
  PRIMARY KEY (id_producto),
  foreign key fk_producto_caregoria (id_categoria) references categoria(id_categoria)  
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tienda_tecnologica.usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  password varchar(512) NOT NULL,
  nombre VARCHAR(20) NOT NULL,
  apellidos VARCHAR(30) NOT NULL,
  correo VARCHAR(75) NULL,
  telefono VARCHAR(15) NULL,
  ruta_imagen varchar(1024),
  activo boolean,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

create table tienda_tecnologica.factura (
  id_factura INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  fecha date,  
  total double,
  estado int,
  PRIMARY KEY (id_factura),
  foreign key fk_factura_usuario (id_usuario) references usuario(id_usuario)  
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

create table tienda_tecnologica.venta (
  id_venta INT NOT NULL AUTO_INCREMENT,
  id_factura INT NOT NULL,
  id_producto INT NOT NULL,
  precio double, 
  cantidad int,
  PRIMARY KEY (id_venta),
  foreign key fk_ventas_factura (id_factura) references factura(id_factura),
  foreign key fk_ventas_producto (id_producto) references producto(id_producto) 
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

create table tienda_tecnologica.rol (
  id_rol INT NOT NULL AUTO_INCREMENT,
  nombre varchar(20),
  id_usuario int,
  PRIMARY KEY (id_rol),
  foreign key fk_rol_usuario (id_usuario) references usuario(id_usuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



/*PROCEDIMIENTOS ALMACENADOS*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* INSERTAR UNA CATEGORÍA */
DELIMITER //
CREATE PROCEDURE sp_insert_categoria(
    IN sp_descripcion VARCHAR(30),
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    INSERT INTO tienda_tecnologica.categoria (descripcion, ruta_imagen, activo)
    VALUES (sp_descripcion, sp_ruta_imagen, sp_activo);
END //
DELIMITER ;

-- CALL sp_insert_categoria('Electrónicos', '/imagenes/electronicos.jpg', TRUE);

/* ELIMINAR UNA CATEGORÍA */
DELIMITER //
CREATE PROCEDURE sp_delete_categoria(
    IN sp_id_categoria INT
)
BEGIN
    DELETE FROM tienda_tecnologica.categoria
    WHERE id_categoria = sp_id_categoria;
END //
DELIMITER ;

-- CALL sp_delete_categoria(1);

/*MODIFICAR UNA CATEGORÍA */
DELIMITER //
CREATE PROCEDURE sp_update_categoria(
    IN sp_id_categoria INT,
    IN sp_descripcion VARCHAR(30),
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    UPDATE tienda_tecnologica.categoria
    SET descripcion = sp_descripcion,
        ruta_imagen = sp_ruta_imagen,
        activo = sp_activo
    WHERE id_categoria = sp_id_categoria;
END //
DELIMITER ;
-- CALL sp_update_categoria(1, 'Computadoras', '/imagenes/computadoras.jpg', FALSE);

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*INSERTAR UN PRODUCTO */
DELIMITER //
CREATE PROCEDURE sp_insert_producto(
    IN sp_id_categoria INT,
    IN sp_descripcion VARCHAR(30),
    IN sp_detalle VARCHAR(1600),
    IN sp_precio DOUBLE,
    IN sp_existencias INT,
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    INSERT INTO tienda_tecnologica.producto (id_categoria, descripcion, detalle, precio, existencias, ruta_imagen, activo)
    VALUES (sp_id_categoria, sp_descripcion, sp_detalle, sp_precio, sp_existencias, sp_ruta_imagen, sp_activo);
END //
DELIMITER ;

 CALL sp_insert_producto(1, 'Laptop', 'Laptop con 16GB RAM y 512GB SSD', 1200.99, 10, '/imagenes/laptop.jpg', TRUE);

/*ELIMINAR UN PRODUCTO */
DELIMITER //
CREATE PROCEDURE sp_delete_producto(
    IN sp_id_producto INT
)
BEGIN
    DELETE FROM tienda_tecnologica.producto
    WHERE id_producto = sp_id_producto;
END //
DELIMITER ;

CALL sp_delete_producto(1);

/*MODIFICAR UN PRODUCTO */
DELIMITER //
CREATE PROCEDURE sp_update_producto(
    IN sp_id_producto INT,
    IN sp_id_categoria INT,
    IN sp_descripcion VARCHAR(30),
    IN sp_detalle VARCHAR(1600),
    IN sp_precio DOUBLE,
    IN sp_existencias INT,
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    UPDATE tienda_tecnologica.producto
    SET id_categoria = sp_id_categoria,
        descripcion = sp_descripcion,
        detalle = sp_detalle,
        precio = sp_precio,
        existencias = sp_existencias,
        ruta_imagen = sp_ruta_imagen,
        activo = sp_activo
    WHERE id_producto = sp_id_producto;
END //
DELIMITER ;

CALL sp_update_producto(1, 2, 'Tablet', 'Tablet con pantalla de 10 pulgadas', 350.50, 20, '/imagenes/tablet.jpg', TRUE);

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*INSERTAR UN USUARIO */
DELIMITER //
CREATE PROCEDURE sp_insert_usuario(
    IN sp_username VARCHAR(20),
    IN sp_password VARCHAR(512),
    IN sp_nombre VARCHAR(20),
    IN sp_apellidos VARCHAR(30),
    IN sp_correo VARCHAR(75),
    IN sp_telefono VARCHAR(15),
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    INSERT INTO tienda_tecnologica.usuario (username, password, nombre, apellidos, correo, telefono, ruta_imagen, activo)
    VALUES (sp_username, sp_password, sp_nombre, sp_apellidos, sp_correo, sp_telefono, sp_ruta_imagen, sp_activo);
END //
DELIMITER ;

CALL sp_insert_usuario('jdoe', 'securepassword', 'John', 'Doe', 'jdoe@example.com', '1234567890', '/imagenes/jdoe.jpg', TRUE);

/*ELIMINAR UN USUARIO */
DELIMITER //
CREATE PROCEDURE sp_delete_usuario(
    IN sp_id_usuario INT
)
BEGIN
    DELETE FROM tienda_tecnologica.usuario
    WHERE id_usuario = sp_id_usuario;
END //
DELIMITER ;

CALL sp_delete_usuario(1);

/*MODIFICAR UN USUARIO */
DELIMITER //
CREATE PROCEDURE sp_update_usuario(
    IN sp_id_usuario INT,
    IN sp_username VARCHAR(20),
    IN sp_password VARCHAR(512),
    IN sp_nombre VARCHAR(20),
    IN sp_apellidos VARCHAR(30),
    IN sp_correo VARCHAR(75),
    IN sp_telefono VARCHAR(15),
    IN sp_ruta_imagen VARCHAR(1024),
    IN sp_activo BOOLEAN
)
BEGIN
    UPDATE tienda_tecnologica.usuario
    SET username = sp_username,
        password = sp_password,
        nombre = sp_nombre,
        apellidos = sp_apellidos,
        correo = sp_correo,
        telefono = sp_telefono,
        ruta_imagen = sp_ruta_imagen,
        activo = sp_activo
    WHERE id_usuario = sp_id_usuario;
END //
DELIMITER ;

CALL sp_update_usuario(1, 'jdoe', 'newsecurepassword', 'John', 'Doe', 'jdoe@example.com', '0987654321', '/imagenes/jdoe_updated.jpg', TRUE);
