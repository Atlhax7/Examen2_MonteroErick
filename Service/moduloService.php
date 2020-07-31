<?php
include './Service/conection.php';
function insert($nombre, $genero, $plataforma, $precio)
{
    $conection = getConection();
    $stmt = $conection->prepare("INSERT INTO videojuego (nombre, genero, plataforma,precio) VALUES (?, ?, ?,?)");
    $stmt->bind_param("sssd", $nombre, $genero, $plataforma, $precio);
    $stmt->execute();
    $stmt->close();
}
function insertModulo($rol, $modulo)
{
    $conection = getConection();
    $stmt = $conection->prepare("INSERT INTO rol_modulo (COD_ROL, COD_MODULO) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ss", $rol, $modulo);
    $stmt->execute();
    $stmt->close();
}

function findAll()
{
    $conection = getConection();
    return $conection->query("SELECT * FROM VIDEOJUEGO");;
}
function findSegRol()
{
    $conection = getConection();
    return $conection->query("SELECT * FROM seg_rol");;
}
function findSegModulo($codRol)
{
    $conection = getConection();
    return $conection->query("SELECT * FROM seg_modulo,rol_modulo WHERE seg_modulo.COD_MODULO=rol_modulo.COD_MODULO AND rol_modulo.COD_MODULO=".$codRol);;
}
function findAllFuncionalidades()
{
    $conection = getConection();
    return $conection->query("SELECT * FROM seg_funcionalidad");;
}
function findAllRolModulo()
{
    $conection = getConection();
    return $conection->query("SELECT * FROM rol_modulo");;
}

function modify($nombre, $genero, $plataforma,$precio,$codVideojuego)
{
    $conection = getConection();
    $stmt = $conection->prepare("update videojuego set nombre=?,  genero=?,  plataforma=?, precio=? where cod_videojuego=?");
    $stmt->bind_param("sssdi", $nombre, $genero, $plataforma,$precio,$codVideojuego);
    $stmt->execute();
    $stmt->close();
}
function remove($codVideojuego)
{
    $conection = getConection();
    $sql = "DELETE FROM videojuego WHERE cod_videojuego=".$codVideojuego;
    $conection->query($sql);
    $conection->close();
}
function findByCod($codVideojuego)
{
    $conection = getConection();
    return $conection->query("SELECT * FROM VIDEOJUEGO WHERE cod_videojuego=".$codVideojuego);;
}
?>


