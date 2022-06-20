<?php
/* Clase producto */

    // Llamo a la clase conexión
    include_once("../db/conexion.php");

    include_once("../funciones/strContains.php");

    class Producto extends Conexion {

        function datosProducto() {
            $consulta = "SELECT NOMBRE_CATEGORIA, NOMBRE_TIPO, TAMANIO, FOTO, ID_PRODUCTO 
                            FROM producto JOIN tipo_planta
                                ON producto.ID_tipo_planta = tipo_planta.ID_TIPO
                                    JOIN categoria 
                                        ON tipo_planta.ID_CAT = categoria.ID_CATEGORIA
                            WHERE tipo_planta.ID_TIPO = producto.ID_TIPO_PLANTA";
            $pdo = $this->conexion->prepare($consulta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }
        
        // Obtener los datos de un producto por su id
        function getDatosProductoId($idProducto) {
            $consulta = "SELECT NOMBRE_CATEGORIA, TIPO_PLANTA.NOMBRE_TIPO, ID_PRODUCTO, TAMANIO, FOTO, PRECIO, DESCRIPCION, STOCK, ID_TIPO, ID_CATEGORIA 
                            FROM producto JOIN tipo_planta                     	
                                ON producto.ID_tipo_planta = tipo_planta.ID_TIPO
                                    JOIN categoria 
                                        ON tipo_planta.ID_CAT = categoria.ID_CATEGORIA
                            WHERE producto.ID_PRODUCTO = :idProducto";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idProducto", $idProducto);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para crear una categoría nueva
        function insertarCategoria($categoria) {
            $producto = new Producto();
            $categorias = $producto->getCategorias();
            $hayCategoria = false;

            foreach ($categorias as $cat) {
                if ($cat["NOMBRE_CATEGORIA"] == $categoria) {
                    $hayCategoria = $cat["NOMBRE_CATEGORIA"];
                }
            }

            if (!$hayCategoria) {
                $consulta = "INSERT INTO categoria (NOMBRE_CATEGORIA) VALUES (:categoria)"; 
                $pdo = $this->conexion->prepare($consulta);
                $pdo->bindValue(":categoria", $categoria);
        
                try {
                    $resultado = $pdo->execute();
                } catch(PDOException $e) {
                    $resultado = false;
                    echo $e->getMessage();
                }
                return $resultado;
                
            } else {
                return $hayCategoria;
            }
        }

        // Método para modificar el nombre de una categoría
        function modificarCategoria($idCat, $nuevoNombre) {
            $consulta = "UPDATE categoria
                            SET NOMBRE_CATEGORIA = :nuevoNombre
                            WHERE ID_CATEGORIA = :idCat"; 
            
            $pdo = $this->conexion->prepare($consulta);

            $pdo->bindValue(":idCat", $idCat);
            $pdo->bindValue(":nuevoNombre", $nuevoNombre);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método para obtener el nombre de las categorías
        function getCategorias() {
            $consulta = "SELECT NOMBRE_CATEGORIA 
                            FROM  categoria";

            $pdo = $this->conexion->prepare($consulta);

            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }

            return $resultado;
        }

        // Método para obtener el id de la categoría por su nombre
        function getIdCat($categoria) {
            $consulta = "SELECT ID_CATEGORIA FROM categoria WHERE NOMBRE_CATEGORIA = :categoria";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":categoria", $categoria);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado[0];
        }

        // Método para obtener el nombre de los tipos de planta
        function getTiposPlanta() {
            $consulta = "SELECT NOMBRE_TIPO 
                            FROM  tipo_planta";

            $pdo = $this->conexion->prepare($consulta);

            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }

            return $resultado;
        }

        function modificarTipoPlanta($idTipoPlanta, $nuevoNombre) {
            $consulta = "UPDATE tipo_planta
                            SET NOMBRE_TIPO = :nuevoNombre
                        WHERE ID_TIPO = :idTipoPlanta"; 

            $pdo = $this->conexion->prepare($consulta);

            $pdo->bindValue(":idTipoPlanta", $idTipoPlanta);
            $pdo->bindValue(":nuevoNombre", $nuevoNombre);

            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            
            return $resultado;
        }

        // Método para obtener el id del tipo de planta por su nombre
        function getIdTipoPlanta($tipo_planta) {
            $consulta = "SELECT ID_TIPO FROM tipo_planta WHERE NOMBRE_TIPO = :tipo_planta";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":tipo_planta", $tipo_planta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado[0];
        }

        // Método para crear un tipo de planta nuevo
        function insertarTipoPlanta($tipo_planta, $categoria) {
            $producto = new Producto();
            $tiposPlanta = $producto->getTiposPlanta();
            $hayTipoPlanta = false;

            foreach ($tiposPlanta as $tipo) {
                if ($tipo["NOMBRE_TIPO"] == $tipo_planta) {
                    $hayTipoPlanta = $tipo["NOMBRE_TIPO"];
                }
            }

            if (!$hayTipoPlanta) {
                $consulta = "INSERT INTO tipo_planta (NOMBRE_TIPO, ID_CAT) VALUES (:tipo_planta, :categoria)"; 
                $pdo = $this->conexion->prepare($consulta);
                $pdo->bindValue(":tipo_planta", $tipo_planta);
                $pdo->bindValue(":categoria", $producto->getIdCat($categoria));

                try {
                    $resultado = $pdo->execute();

                } catch(PDOException $e) {
                    $resultado = false;
                    echo $e->getMessage();
                }
                return $resultado; 

            } else {
                return $hayTipoPlanta;
            }
        }

        function insertarProducto($categoria, $tipo_planta, $foto, $precio, $descripcion, $tamanio, $stock) {
            $producto = new Producto();

            $cat = $producto->insertarCategoria($categoria);

            if (is_string($cat)) {
                $categoria = $cat;
            }

            $planta = $producto->insertarTipoPlanta($tipo_planta, $categoria);
            $idTipoPlanta = $producto->getIdTipoPlanta($tipo_planta);

            if (is_string($planta)) {
                $descripcion = $producto->getDescripcion($idTipoPlanta);
            }          

            $consulta = "INSERT INTO producto (ID_TIPO_PLANTA, FOTO, PRECIO, DESCRIPCION, TAMANIO, STOCK) VALUES (:idTipoPlanta, :foto, :precio, :descripcion, :tamanio, :stock)"; 
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idTipoPlanta", $idTipoPlanta);
            $pdo->bindValue(":foto", $foto);
            $pdo->bindValue(":precio", $precio);
            $pdo->bindValue(":descripcion", $descripcion);
            $pdo->bindValue(":tamanio", $tamanio);
            $pdo->bindValue(":stock", $stock);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;

        }

        // Método para obtener todos los productos
        function getProductos() {
            $consulta = "SELECT NOMBRE_CATEGORIA, NOMBRE_TIPO, TAMANIO, FOTO, DESCRIPCION, ID_PRODUCTO, PRECIO, STOCK, ID_TIPO, ID_CATEGORIA 
                            FROM producto JOIN tipo_planta
                                ON producto.ID_tipo_planta = tipo_planta.ID_TIPO
                                    JOIN categoria 
                                        ON tipo_planta.ID_CAT = categoria.ID_CATEGORIA
                            WHERE tipo_planta.ID_TIPO = producto.ID_TIPO_PLANTA";
            $pdo = $this->conexion->prepare($consulta);

            try {
                $pdo->execute();
                $resultado = $pdo->fetchAll();
            } catch(PDOException $e) {
                $resultado = false;
            }

            return $resultado;
        }

        // Método para eliminar un tipo de planta
        function eliminarTipoPlanta($idTipoPlanta) {
            $consulta = "DELETE FROM tipo_planta WHERE ID_TIPO = :idTipoPlanta";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idTipoPlanta", $idTipoPlanta);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        function eliminarCategoria($categoria) {
            $consulta = "DELETE FROM categoria WHERE ID_CATEGORIA = :categoria";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":categoria", $categoria);
    
            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado;
        }

        // Método para eliminar un producto
        function eliminarProducto($producto, $idTipoPlanta, $categoria) {
            $consulta = "DELETE FROM producto WHERE ID_PRODUCTO = :producto";
            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":producto", $producto);

            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
            }

            if ($resultado) {
                $producto = new Producto();
                $tipoEliminado = $producto->eliminarTipoPlanta($idTipoPlanta);
            }

            if ($tipoEliminado) {
                $resultado = $producto->eliminarCategoria($categoria);
            }

            return $resultado;
        }

        function modificarProducto($idProducto, $descripcion, $destino, $precio, $tamanio, $stock) {
            $consulta = "UPDATE producto
                            SET DESCRIPCION = :descripcion,
                            FOTO = :destino,
                            PRECIO = :precio,
                            TAMANIO = :tamanio,
                            STOCK = :stock
                        WHERE ID_PRODUCTO = :idProducto"; 

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":descripcion", $descripcion);
            $pdo->bindValue(":destino", $destino);
            $pdo->bindValue(":precio", $precio);
            $pdo->bindValue(":tamanio", $tamanio);
            $pdo->bindValue(":stock", $stock);
            $pdo->bindValue(":idProducto", $idProducto);

            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        function restarStock($stockActual, $cantidad, $idProducto) {
            $nuevoStock = $stockActual - $cantidad;

            $consulta = "UPDATE producto
                            SET STOCK = $nuevoStock
                        WHERE ID_PRODUCTO = :idProducto"; 

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idProducto", $idProducto);

            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        function modificarStock($stock, $idProducto) {
            $consulta = "UPDATE producto
                            SET STOCK = $stock
                        WHERE ID_PRODUCTO = :idProducto"; 

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idProducto", $idProducto);

            try {
                $resultado = $pdo->execute();
            } catch(PDOException $e) {
                $resultado = false;
                echo $e->getMessage();
            }
            return $resultado;
        }

        // Método que filtra los productos por el filtro pasado por parámetro
        function filtrarProductos($filtro) {
            $producto = new Producto();
            $productos = $producto->getProductos();
            $productosFiltrados = array();

            if (!empty($filtro)) {

                for ($i = 0; $i < count($productos); $i++) {

                    if (str_contains(strtolower($productos[$i]["NOMBRE_CATEGORIA"]), strtolower($filtro))) {
                        array_push($productosFiltrados, ($producto->getDatosProductoId($productos[$i]["ID_PRODUCTO"])));
                    }
                }

            } else {
                $productosFiltrados = $productos;
            }  
            return $productosFiltrados;
        }

        // Obtener la descripción de un producto por su tipo de planta
        function getDescripcion($idTipoPlanta) {
            $consulta = "SELECT DESCRIPCION 
                            FROM producto JOIN tipo_planta                     	
                                ON producto.ID_tipo_planta = tipo_planta.ID_TIPO
                        WHERE producto.ID_TIPO_PLANTA = :idTipoPlanta";

            $pdo = $this->conexion->prepare($consulta);
            $pdo->bindValue(":idTipoPlanta", $idTipoPlanta);
    
            try {
                $pdo->execute();
                $resultado = $pdo->fetch();
            } catch(PDOException $e) {
                $resultado = false;
            }
            return $resultado[0];
        }
    }

?>