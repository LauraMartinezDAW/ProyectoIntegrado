<?php
/* Clase Pedido */

    // Llamo a la clase conexión
    include_once("../db/conexion.php");
    include_once("../funciones/strContains.php");
    
    class Pedido extends Conexion {

        // Método para insertar un nuevo pedido en la base de datos
        function insertarPedido($email, $fecha, $enviado = 0) {
            echo "dentro del método";
            $consulta = "INSERT INTO pedidos (EMAIL_USUARIO, FACTURA, FECHA, ENVIADO) 
                                    VALUES (:email, NULL, :fecha, :enviado)"; 

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
            $pdo->bindValue(":fecha", $fecha);
            $pdo->bindValue(":enviado", $enviado);

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

        // Método para poner un pedido con estado enviado
        function setPedidoEnviado($idPedido) {
            $consulta = "UPDATE pedidos
                            SET ENVIADO = 1
                            WHERE ID_PEDIDO = :idPedido"; 
            
            $pdo = $this->conexion->prepare($consulta);

            $pdo->bindValue(":idPedido", $idPedido);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método para obtener los pedidos 
        function getPedidos() {
            $consulta = "SELECT *  
                            FROM pedidos";
            $pdo = $this->conexion->prepare($consulta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para obtener los pedidos por usuario
        function getPedidosPorUsuario($email) {
            $consulta = "SELECT *  
                            FROM pedidos
                        WHERE EMAIL_USUARIO = :email";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":email", $email);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para obtener los pedidos que no se han enviado
        function getPedidosNoEnviados() {
            $consulta = "SELECT *  
                            FROM pedidos
                                WHERE ENVIADO = 0";
            $pdo = $this->conexion->prepare($consulta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }



        // Método para eliminar un pedido
        function eliminarPedido($idPedido) {
            $consulta = "DELETE FROM pedidos WHERE ID_PEDIDO = :idPedido";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idPedido", $idPedido);
    
            try {

                $resultado = $pdo->execute();
                
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para obtener el id de un pedido mediante su fecha
        function getIdPedidoPorFecha($fechaPedido) {
            $consulta = "SELECT ID_PEDIDO  
                            FROM pedidos
                        WHERE FECHA = :fechaPedido";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":fechaPedido", $fechaPedido);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado[0];
        }

        // Obtener los datos de un pedido por su id
        function getDatosProductoId($idPedido) {
            $consulta = "SELECT *
                            FROM pedidos
                        WHERE ID_PEDIDO = :idPedido";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idPedido", $idPedido);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para introducir la factura en el pedido
        function setFactura($idPedido, $factura) {
            $consulta = "UPDATE pedidos
                            SET FACTURA = :factura
                        WHERE ID_PEDIDO = :idPedido"; 
            
            $pdo = $this->conexion->prepare($consulta);

            $pdo->bindValue(":idPedido", $idPedido);
            $pdo->bindValue(":factura", $factura);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método que filtra los pedidos por el filtro pasado por parámetro
        function filtrarPedidos($filtro) {
            $pedido = new Pedido();
            $pedidos = $pedido->getPedidos();
            $pedidosFiltrados = array();

            if (!empty($filtro)) {

                for ($i = 0; $i < count($pedidos); $i++) {

                    if (str_contains(strtolower($pedidos[$i]["EMAIL_USUARIO"]), strtolower($filtro))) {
                        array_push($pedidosFiltrados, ($pedido->getDatosProductoId($pedidos[$i]["ID_PEDIDO"])));
                    }
                }

            } else {
                $pedidosFiltrados = $pedidos;
            }  
            return $pedidosFiltrados;
        }
    }
?>