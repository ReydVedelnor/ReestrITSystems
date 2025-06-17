<?php

$localhost="localhost";
$username="root";
$password="";
$database="newbase";

try {
    $pdo = new PDO("mysql:host=$localhost;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo htmlentities("Подключение к базе данных успешно") ."<br>";
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage() . "<br>");
}

// 1 SQL-запрос для создания таблицы пользователей
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    middlename VARCHAR(255) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 2 SQL-запрос для создания таблицы ролей
$sql_roles = "CREATE TABLE IF NOT EXISTS roles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    the_role VARCHAR(50) NOT NULL
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 3 SQL-запрос для создания таблицы, связывающей роли и пользователей
$sql_users_roles = "CREATE TABLE IF NOT EXISTS rolesAndUsers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    role_id INT(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 4 SQL-запрос для создания таблицы атрибутов
$sql_atributes = "CREATE TABLE IF NOT EXISTS atributes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atribute_name VARCHAR(255) NOT NULL,
    atribute_type VARCHAR(50) NOT NULL
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 5 SQL-запрос для создания таблицы, связывающей роли и атрибуты
$sql_atributes_and_roles="CREATE TABLE IF NOT EXISTS atributesAndRoles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atribute_id INT(11) NOT NULL,
    role_id INT(11) NOT NULL,
    operation VARCHAR(100) NOT NULL,
    FOREIGN KEY (atribute_id) REFERENCES atributes(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 6 SQL-запрос для создания таблицы групп
$sql_groupes = "CREATE TABLE IF NOT EXISTS groupes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    groupe_name VARCHAR(255) NOT NULL
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 7 SQL-запрос для создания таблицы, связывающей группы и атрибуты
$sql_groupes_and_atributes="CREATE TABLE IF NOT EXISTS atributesAndGroupes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atribute_id INT(11) NOT NULL,
    groupe_id INT(11) NOT NULL,
    FOREIGN KEY (atribute_id) REFERENCES atributes(id) ON DELETE CASCADE,
    FOREIGN KEY (groupe_id) REFERENCES groupes(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 8 SQL-запрос для создания таблицы систем
$sql_systems = "CREATE TABLE IF NOT EXISTS systems (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    system_name VARCHAR(255) NOT NULL
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 9 SQL-запрос для создания таблицы, связывающей системы и атрибуты
$sql_systems_and_atributes="CREATE TABLE IF NOT EXISTS atributesAndSystems (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atribute_id INT(11) NOT NULL,
    system_id INT(11) NOT NULL,
    FOREIGN KEY (atribute_id) REFERENCES atributes(id) ON DELETE CASCADE,
    FOREIGN KEY (system_id) REFERENCES systems(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 10 SQL-запрос для создания таблицы с одиночными значениями атрибутов
$sql_single_values="CREATE TABLE IF NOT EXISTS singleValues (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atributes_and_systems_id INT(11) NOT NULL,
    atribute_value VARCHAR(300) NOT NULL,
    FOREIGN KEY (atributes_and_systems_id) REFERENCES atributesAndSystems(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 11 SQL-запрос для создания таблицы со значениями атрибутов типа список
$sql_list_values="CREATE TABLE IF NOT EXISTS listValues (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atributes_and_systems_id INT(11) NOT NULL,
    atribute_value VARCHAR(300) NOT NULL,
    FOREIGN KEY (atributes_and_systems_id) REFERENCES atributesAndSystems(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 12 SQL-запрос для создания таблицы со значениями атрибутов типа справочник
$sql_directory_values="CREATE TABLE IF NOT EXISTS directoryValues (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    atributes_and_systems_id INT(11) NOT NULL,
    atribute_value VARCHAR(300) NOT NULL,
    FOREIGN KEY (atributes_and_systems_id) REFERENCES atributesAndSystems(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// 13 SQL-запрос для создания таблицы истории изменений
$sql_history="CREATE TABLE IF NOT EXISTS historyOfChages (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    system_id INT(11) NOT NULL,
    atribute_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    change_type VARCHAR(50) NOT NULL,
    date_time DATETIME NOT NULL,
    FOREIGN KEY (system_id) REFERENCES systems(id) ON DELETE CASCADE,
    FOREIGN KEY (atribute_id) REFERENCES atributes(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

// Выполняем запросы на создание таблиц

//1
try{
    $pdo->exec($sql_users) === TRUE;
    //echo "Таблица users успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы users: " . $e->getMessage() . "<br>";
}

//2
try{
    $pdo->exec($sql_roles) === TRUE;
    //echo "Таблица roles успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы roles: " . $e->getMessage() . "<br>";
}

//3
try{
    $pdo->exec($sql_users_roles) === TRUE;
    //echo "Таблица roles_and_users успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы roles_and_users: " . $e->getMessage() . "<br>";
}

//4
try{
    $pdo->exec($sql_atributes) === TRUE;
    //echo "Таблица atributes успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы atributes: " . $e->getMessage() . "<br>";
}

//5
try{
    $pdo->exec($sql_atributes_and_roles) === TRUE;
    //echo "Таблица atributesAndRoles успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы atributesAndRoles: " . $e->getMessage() . "<br>";
}

//6
try{
    $pdo->exec($sql_groupes) === TRUE;
    //echo "Таблица groupes успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы groupes: " . $e->getMessage() . "<br>";
}

//7
try{
    $pdo->exec($sql_groupes_and_atributes) === TRUE;
    //echo "Таблица atributesAndGroupes успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы atributesAndGroupes: " . $e->getMessage() . "<br>";
}

//8
try{
    $pdo->exec($sql_systems) === TRUE;
    //echo "Таблица systems успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы systems: " . $e->getMessage() . "<br>";
}

//9
try{
    $pdo->exec($sql_systems_and_atributes) === TRUE;
    //echo "Таблица atributesAndSystems успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы atributesAndSystems: " . $e->getMessage() . "<br>";
}

//10
try{
    $pdo->exec($sql_single_values) === TRUE;
    //echo "Таблица singleValues успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы singleValues: " . $e->getMessage() . "<br>";
}

//11
try{
    $pdo->exec($sql_list_values) === TRUE;
    //echo "Таблица listValues успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы listValues: " . $e->getMessage() . "<br>";
}

//12
try{
    $pdo->exec($sql_directory_values) === TRUE;
    //echo "Таблица directoryValues успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы directoryValues: " . $e->getMessage() . "<br>";
}

//13
try{
    $pdo->exec($sql_history) === TRUE;
    //echo "Таблица historyOfChages успешно создана.<br>";
} catch (PDOException $e) {
    echo "Ошибка создания таблицы historyOfChages: " . $e->getMessage() . "<br>";
}

// Checking pdoection
/*if (!$pdo) {
    die("pdoection failed: " . mysqli_pdoect_error());
}
mysqli_query($pdo, "SET NAMES 'utf8'");
// Creating a database named newDB
$sql = "CREATE DATABASE reestr_it_systems;"
$sql = "CREATE TABLE IF NOT EXISTS systems (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', 
            name VARCHAR(255) COMMENT ''
        )DEFAULT CHARSET UTF8 COMMENT '';
		CREATE TABLE IF NOT EXISTS atributes (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', 
            name VARCHAR(255) COMMENT '',
            groupe VARCHAR(255) COMMENT '',
            type VARCHAR(255) COMMENT ''
        )DEFAULT CHARSET UTF8 COMMENT '';
		CREATE TABLE IF NOT EXISTS atributes_and_values (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', 
            system VARCHAR(255) COMMENT ''
        )DEFAULT CHARSET UTF8 COMMENT '';
		CREATE TABLE IF NOT EXISTS groupes (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', 
            name VARCHAR(255) COMMENT ''
        )DEFAULT CHARSET UTF8 COMMENT '';
        ";
/*CREATE TABLE IF NOT EXISTS atributes (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', 
            name VARCHAR(255) COMMENT '',
            groupe VARCHAR(255) COMMENT '',
            type VARCHAR(255) COMMENT ''
        )DEFAULT CHARSET UTF8 COMMENT ''

if (mysqli_multi_query($pdo, $sql)) {
    echo "Table created successfully with the name 'systems'";
} else {
    echo "Error creating database: " . mysqli_error($pdo);
}*/
//mysqli_close($pdo);
?>
