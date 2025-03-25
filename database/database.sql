Create Database tienda_master;
use tienda_master;

/* Usuarios */
Create table usuarios(
  id        int auto_increment not null,
  nombre    varchar(30) not null,
  apellidos varchar(30),
  email     varchar(100) not null,
  password  varchar(80) not null,
  rol       varchar(20),
  imagen    varchar(255),
  Constraint pk_usuarios Primary key(id),
  Constraint uq_email Unique(email)
)Engine=InnoDb;

Insert into usuarios Values(null, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', null);

/* Categorias */
Create table categorias(
  id        int auto_increment not null,
  nombre    varchar(50) not null,
  Constraint pk_categorias Primary key(id)
)Engine=InnoDb;

Insert into categorias Values(null, 'Manga corta'), (null, 'Tirantes'), 
      (null, 'Manga larga'), (null, 'Sudaderas');

/* Productos */
Create table productos(
  id            int auto_increment not null,
  categoria_id  int not null,
  nombre        varchar(80) not null,
  descripcion   text,
  precio        float(100, 2) not null,
  stock         int not null,
  oferta        varchar(2),
  fecha         date not null,
  imagen        varchar(255),
  Constraint pk_productos Primary key(id),
  Constraint fk_producto_categoria Foreign Key(categoria_id) References categorias(id)
)Engine=InnoDb;

/* Pedidos */
Create table pedidos(
  id            int auto_increment not null,
  usuario_id    int not null,
  provincia     varchar(80) not null,
  localidad     varchar(80) not null,
  direccion     varchar(80) not null,
  coste         float(200, 2) not null,
  estado        varchar(20) not null,
  fecha         date,
  hora          time,
  Constraint pk_pedidos Primary key(id),
  Constraint fk_pedido_usuario Foreign Key(usuario_id) References usuarios(id)
)Engine=InnoDb;

/* Linea_pedidos */
Create table lineas_pedidos(
  id            int auto_increment not null,
  pedido_id     int not null,
  producto_id   int not null,
  unidades      int not null,
  Constraint pk_lineas_pedidos Primary key(id),
  Constraint fk_linea_pedido Foreign Key(pedido_id) References pedidos(id),
  Constraint fk_linea_producto Foreign Key(producto_id) References productos(id)
)Engine=InnoDb;
