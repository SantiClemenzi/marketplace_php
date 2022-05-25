CREATE DATABASE  marketplace_master;
USE marketplace_master;

-- creamos tabla 
CREATE TABLE usuarios(
id          int(255) auto_increment not null,
nombre      varchar(65) not null,
apellido    varchar(65) not null,
email       varchar(65) not null,
password    varchar(255) not null,
rol         varchar(20),
imagen      varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

-- creamos tabla
CREATE TABLE categorias(
id          int(255) auto_increment not null,
nombre      varchar(65) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;
-- insertamos valores
INSERT INTO categorias VALUES(NULL,  'remera mangas cortas');
INSERT INTO categorias VALUES(NULL,  'remera mangas largas');
INSERT INTO categorias VALUES(NULL,  'remera musculosa');

-- creamos tabla
CREATE TABLE productos(
id                int(255) auto_increment not null,
categorias_id     int(255) not null,
nombre            varchar(100) not null,
descripcion       text not null,
precio            float(100, 2) not null,
stock             int(255) not null,
oferta            varchar(2),
fecha             date not null,
imagen            varchar(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY (categorias_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

-- creamos tabla
CREATE TABLE pedidos(
id                int(255) auto_increment not null,
usuarios_id       int(255) not null,
provincia         varchar(100) not null,
localidad         varchar(100) not null,
direccion         varchar(150) not null,
coste             float(200, 2) not null,
estado            varchar(20) not null,
fecha             date,
hora              time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuarios_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

-- creamos tabla
CREATE TABLE linea_pedidos(
id               int(255) auto_increment not null,
pedidos_id       int(255) not null,
productos_id     int(255) not null,
unidades     int(255) not null,
CONSTRAINT pk_linea_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedidos_pedidos FOREIGN KEY (pedidos_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_pedidos_productos FOREIGN KEY (productos_id) REFERENCES productos(id)
)ENGINE=InnoDb;