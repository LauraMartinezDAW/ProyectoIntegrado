<?php
/* Clase Usuario */

// Llamada a la clase conexión
include_once("../db/conexion.php");

    class Usuario extends Conexion {
        protected $email;
        protected $password;
        protected $nombre;
        protected $direccion;

        // Método para obtener el usuario que coincida con el email y la contraseña pasada por parámetro.
        function getEmailUsuario($email, $password) {
            $consulta = "SELECT email FROM usuarios WHERE email = :email AND password = :password";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
            $pdo->bindValue(":password", $password);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para obtener todos los datos del usuario que coincida con el email pasado por parámetro
        function getDatosUsuario($email) {
            $consulta = "SELECT EMAIL, FOTO_USUARIO, NOMBRE_USUARIO, APELLIDO1, APELLIDO2, DIRECCION, TELEFONO, ADMINISTRADOR 
                            FROM usuarios 
                            WHERE email = :email";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }


        function getNombreUsuario($email) {
            $consulta = "SELECT nombre_usuario FROM usuarios WHERE email = :email";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para comprobar si el usuario es un administrador.
        function esAdministrador($email) {
            $consulta = "SELECT administrador FROM usuarios WHERE email = :email";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
                if ($resultado[0] == 1 ) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }
        
        // Método para obtener todos los usuarios
        function getUsuarios() {
            $consulta = "SELECT EMAIL, NOMBRE_USUARIO, APELLIDO1, APELLIDO2, DIRECCION, TELEFONO, ADMINISTRADOR 
                            FROM usuarios;";
            $pdo = $this->conexion->prepare($consulta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }


        // Método para insertar un usuario en la BBDD
        function registroUsuario($email, $password, $nombre_usuario, $apellido1= '', $apellido2= '', $direccion= '', $telefono = '', $administrador= 0) {
            
            $consulta = "INSERT INTO usuarios (email, password, nombre_usuario, apellido1, apellido2, direccion, telefono, administrador) VALUES (:email, :password, :nombre_usuario, :apellido1, :apellido2, :direccion, :telefono, :administrador)"; 
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
            $pdo->bindValue(":password", $password);
            $pdo->bindValue(":nombre_usuario", $nombre_usuario);
            $pdo->bindValue(":apellido1", $apellido1);
            $pdo->bindValue(":apellido2", $apellido2);
            $pdo->bindValue(":direccion", $direccion);
            $pdo->bindValue(":telefono", $telefono);
            $pdo->bindValue(":administrador", $administrador);
    
            try {
                echo "entra en el try";
                $resultado = $pdo->execute();
                echo "resultado" . $resultado;
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método para eliminar a un usuario de la base de datos
        function eliminarUsuario($email) {
            $consulta = "DELETE FROM usuarios WHERE EMAIL = :email";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {

                $resultado = $pdo->execute();
                
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }


        // Método para modificar un usuario
        function modificarUsuario($email, $password, $destino, $nombre_usuario, $apellido1, $apellido2, $direccion, $telefono, $administrador) {
    
            $consulta = "UPDATE usuarios
                            SET	PASSWORD = :password,
                                FOTO_USUARIO = :destino,
                                NOMBRE_USUARIO = :nombre_usuario,
                                APELLIDO1 = :apellido1,
                                APELLIDO2 = :apellido2,
                                DIRECCION = :direccion,
                                TELEFONO = :telefono,
                                ADMINISTRADOR = :administrador
                            WHERE EMAIL = :email"; 
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
            $pdo->bindValue(":password", $password);
            $pdo->bindValue(":destino", $destino);
            $pdo->bindValue(":nombre_usuario", $nombre_usuario);
            $pdo->bindValue(":apellido1", $apellido1);
            $pdo->bindValue(":apellido2", $apellido2);
            $pdo->bindValue(":direccion", $direccion);
            $pdo->bindValue(":telefono", $telefono);
            $pdo->bindValue(":administrador", $administrador);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método para obtener la contraseña
        function getContrasena($email) {
            $consulta = "SELECT PASSWORD FROM usuarios WHERE email = :email";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }



/*         // Método para obtener el nombre y la dirección del usuario correspondiente al correo pasado por parámetro
        function getDatosUsuario($email) {
            $consulta = "SELECT nombre_usuario, direccion FROM usuarios WHERE email = :email";
            $pdo = $this->conexion->prepare($consulta);
            // Establezco que el resultado lo devuelva como un array asociativo.
            $pdo->setFetchMode(PDO::FETCH_ASSOC);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false; 
            }
            return $resultado;
        }  */
    }

?>