<?php

// Configuración de la conexión a la base de datos
$db_host = 'localhost'; // Cambia localhost por la dirección de tu servidor de base de datos si es diferente
$db_database = 'quartierz_v2';
$db_username = 'root';
$db_password = '';

// Conexión a la base de datos
$pdo = new PDO("mysql:host=$db_host;dbname=$db_database", $db_username, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obtener información sobre las tablas
$tables_query = $pdo->query("SHOW TABLES");
$tables = $tables_query->fetchAll(PDO::FETCH_COLUMN);

// Iterar sobre cada tabla
foreach ($tables as $table) {
    echo "Tabla: $table\n";

    // Obtener información sobre las columnas de la tabla
    $columns_query = $pdo->query("SHOW COLUMNS FROM $table");
    $columns = $columns_query->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir información sobre cada columna
    foreach ($columns as $column) {
        echo "\tColumna: {$column['Field']}, Tipo: {$column['Type']}\n";
    }

    // Obtener información sobre las claves foráneas
    $foreign_keys_query = $pdo->query("SHOW CREATE TABLE $table");
    $foreign_keys_result = $foreign_keys_query->fetch(PDO::FETCH_ASSOC);
    $create_table_statement = $foreign_keys_result['Create Table'];

    // Extraer las claves foráneas del statement CREATE TABLE
    preg_match_all('/CONSTRAINT `([^`]*)` FOREIGN KEY \(`([^`]*)`\) REFERENCES `([^`]*)` \(`([^`]*)`\)/', $create_table_statement, $matches, PREG_SET_ORDER);

    // Imprimir información sobre las claves foráneas
    foreach ($matches as $match) {
        echo "\tClave foránea: {$match[1]}, Columna: {$match[2]}, Referencia a tabla: {$match[3]}, Columna de referencia: {$match[4]}\n";
    }

    echo "\n";
}

/*
Tabla: custom
        Columna: id, Tipo: bigint(20) unsigned
        Columna: imagen, Tipo: varchar(255)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp

Tabla: datos_user
        Columna: id, Tipo: bigint(20) unsigned
        Columna: user_id, Tipo: bigint(20) unsigned
        Columna: telefono, Tipo: varchar(255)
        Columna: apellido, Tipo: varchar(255)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: datos_user_user_id_foreign, Columna: user_id, Referencia a tabla: users, Columna de referencia: id

Tabla: design
        Columna: id, Tipo: bigint(20) unsigned
        Columna: nombre, Tipo: varchar(255)
        Columna: nombre_material, Tipo: varchar(255)
        Columna: n_piezas, Tipo: varchar(255)
        Columna: imagen_design, Tipo: varchar(255)
        Columna: precio, Tipo: int(11)
        Columna: material_id, Tipo: bigint(20) unsigned
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: design_material_id_foreign, Columna: material_id, Referencia a tabla: material, Columna de referencia: id

Tabla: dias_vetados
        Columna: id, Tipo: bigint(20) unsigned
        Columna: fecha, Tipo: date
        Columna: tipo_dia_id, Tipo: bigint(20) unsigned
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: dias_vetados_tipo_dia_id_foreign, Columna: tipo_dia_id, Referencia a tabla: tipo_dias_vetados, Columna de referencia: id

Tabla: estados_pedido
        Columna: id, Tipo: bigint(20) unsigned
        Columna: nombre, Tipo: varchar(255)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp

Tabla: material
        Columna: id, Tipo: bigint(20) unsigned
        Columna: material, Tipo: varchar(255)
        Columna: descripcion, Tipo: varchar(500)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp

Tabla: pedido
        Columna: id, Tipo: bigint(20) unsigned
        Columna: user_id, Tipo: bigint(20) unsigned
        Columna: cita, Tipo: datetime
        Columna: estado_pedido_id, Tipo: bigint(20) unsigned
        Columna: cantidad_total, Tipo: int(11)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: pedido_estado_pedido_id_foreign, Columna: estado_pedido_id, Referencia a tabla: estados_pedido, Columna de referencia: id
        Clave foránea: pedido_user_id_foreign, Columna: user_id, Referencia a tabla: users, Columna de referencia: id

Tabla: pedido_design_cantidad
        Columna: id, Tipo: bigint(20) unsigned
        Columna: pedido_id, Tipo: bigint(20) unsigned
        Columna: material_id, Tipo: bigint(20) unsigned
        Columna: design_id, Tipo: bigint(20) unsigned
        Columna: custom_id, Tipo: bigint(20) unsigned
        Columna: cantidad, Tipo: int(11)
        Columna: precio, Tipo: int(11)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: pedido_design_cantidad_custom_id_foreign, Columna: custom_id, Referencia a tabla: custom, Columna de referencia: id
        Clave foránea: pedido_design_cantidad_design_id_foreign, Columna: design_id, Referencia a tabla: design, Columna de referencia: id
        Clave foránea: pedido_design_cantidad_material_id_foreign, Columna: material_id, Referencia a tabla: material, Columna de referencia: id
        Clave foránea: pedido_design_cantidad_pedido_id_foreign, Columna: pedido_id, Referencia a tabla: pedido, Columna de referencia: id

Tabla: pedidos_por_telefono
        Columna: id, Tipo: bigint(20) unsigned
        Columna: nombre, Tipo: varchar(255)
        Columna: apellidos, Tipo: varchar(255)
        Columna: telefono, Tipo: int(11)
        Columna: material_id, Tipo: bigint(20) unsigned
        Columna: design_id, Tipo: bigint(20) unsigned
        Columna: cita, Tipo: datetime
        Columna: estado_pedido_id, Tipo: bigint(20) unsigned
        Columna: cantidad, Tipo: int(11)
        Columna: precio_total, Tipo: int(11)
        Columna: custom_id, Tipo: bigint(20) unsigned
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp
        Clave foránea: pedidos_por_telefono_custom_id_foreign, Columna: custom_id, Referencia a tabla: custom, Columna de referencia: id
        Clave foránea: pedidos_por_telefono_design_id_foreign, Columna: design_id, Referencia a tabla: design, Columna de referencia: id
        Clave foránea: pedidos_por_telefono_estado_pedido_id_foreign, Columna: estado_pedido_id, Referencia a tabla: estados_pedido, Columna de referencia: id
        Clave foránea: pedidos_por_telefono_material_id_foreign, Columna: material_id, Referencia a tabla: material, Columna de referencia: id

Tabla: tipo_dias_vetados
        Columna: id, Tipo: bigint(20) unsigned
        Columna: nombre, Tipo: varchar(255)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp

Tabla: users
        Columna: id, Tipo: bigint(20) unsigned
        Columna: name, Tipo: varchar(255)
        Columna: email, Tipo: varchar(255)
        Columna: email_verified_at, Tipo: timestamp
        Columna: password, Tipo: varchar(255)
        Columna: remember_token, Tipo: varchar(100)
        Columna: created_at, Tipo: timestamp
        Columna: updated_at, Tipo: timestamp

*/
