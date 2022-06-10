<?php
/* Clase Comentario */

// Llamada a la clase conexión
include_once("../db/conexion.php");

    class Comentario extends Conexion {
    
        // Método para obtener los comentarios de un tipo de planta.
        function getComentarios($idProducto) {
            $consulta = "SELECT NOMBRE_USUARIO, APELLIDO1, CONTENIDO  
                            FROM usuarios JOIN comentarios 
                                ON usuarios.EMAIL = comentarios.EMAIL_USUARIO
                                    JOIN producto
                                        ON producto.ID_TIPO_PLANTA = comentarios.ID_TIPO_PLANTA
                            WHERE producto.ID_PRODUCTO = :idProducto";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idProducto", $idProducto);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }


        function insertarComentario($contenido, $tipo_planta, $email) {
            $consulta = "INSERT INTO comentarios (CONTENIDO, ID_TIPO_PLANTA, EMAIL_USUARIO) VALUES (:contenido, :tipo_planta, :email)"; 
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":contenido", $contenido);
            $pdo->bindValue(":tipo_planta", $tipo_planta);
            $pdo->bindValue(":email", $email);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

    }
?>