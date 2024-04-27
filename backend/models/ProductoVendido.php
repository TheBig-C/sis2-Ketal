<?php
class ProductoVendido {
    
    private $cpv;
    private $venta_cv;
    private $producto_cp;

    public function __construct($cpv, $venta_cv, $producto_cp) {
        $this->cpv = $cpv;
        $this->venta_cv = $venta_cv;
        $this->producto_cp = $producto_cp;
    }
    public function getProductoCp() {
        return $this->producto_cp;
    }

    public function setProductoCp($producto_cp) {
        $this->cpv = $producto_cp;
    }
    public function getCpv() {
        return $this->cpv;
    }

    public function setCpv($cpv) {
        $this->cpv = $cpv;
    }
    public function getVentaCv() {
        return $this->venta_cv;
    }

    public function setVentaCv($venta_cv) {
        $this->cpv = $venta_cv;
    }
    
    // Métodos CRUD con formato estático
    public static function insertarProductoVendido($cpv, $venta_cv, $producto_cp) {
        $conn = conexion();

        $cpv = pg_escape_string($conn, $cpv);
        $venta_cv = pg_escape_string($conn, $venta_cv);
        $producto_cp = pg_escape_string($conn, $producto_cp);

        $query = "INSERT INTO ProductoVendido (cpv, venta_cv, producto_cp) VALUES ('$cpv', '$venta_cv', '$producto_cp')";

        $result = pg_query($conn, $query);
        if (!$result) {
            echo "Ocurrió un error al insertar en los productos vendidos.\n";
            exit;
        }
    }

    public static function seleccionarProductosVendidos() {
        $conn = conexion();
        $query = "SELECT * FROM ProductoVendido";

        $result = pg_query($conn, $query);
        if (!$result) {
            echo "Ocurrió un error al seleccionar los productos vendidos.\n";
            exit;
        }

        $productosVendidos = [];
        while ($productoVendidoData = pg_fetch_assoc($result)) {
            $productosVendidos[] = new ProductoVendido(
                $productoVendidoData['cpv'],
                $productoVendidoData['venta_cv'],
                $productoVendidoData['producto_cp']
            );
        }

        return $productosVendidos;
    }
    public static function seleccionarProductosVendidosPorVenta($venta_cv) {
        $conn = conexion();
        $venta_cv = pg_escape_string($conn, $venta_cv);
        
        $query = "SELECT * FROM ProductoVendido WHERE venta_cv = '$venta_cv'";
        
        $result = pg_query($conn, $query);
        if (!$result) {
            echo "Ocurrió un error al seleccionar los productos vendidos para la venta $venta_cv.\n";
            exit;
        }
        
        $productosVendidos = [];
        while ($productoVendidoData = pg_fetch_assoc($result)) {
            // Aquí podrías incluir la lógica necesaria para obtener más detalles del producto
            $productosVendidos[] = new ProductoVendido(
                $productoVendidoData['cpv'],
                $productoVendidoData['venta_cv'],
                $productoVendidoData['producto_cp']
            );
        }
        
        return $productosVendidos;
    }
    
    public static function actualizarProductoVendido($cpv, $venta_cv, $producto_cp) {
        $conn = conexion();

        $cpv = pg_escape_string($conn, $cpv);
        $venta_cv = pg_escape_string($conn, $venta_cv);
        $producto_cp = pg_escape_string($conn, $producto_cp);

        $query = "UPDATE ProductoVendido SET venta_cv = '$venta_cv', producto_cp = '$producto_cp' WHERE cpv = '$cpv'";

        $result = pg_query($conn, $query);
        if (!$result) {
            echo "Ocurrió un error al actualizar el producto vendido.\n";
            exit;
        }
    }

    public static function eliminarProductoVendido($cpv) {
        $conn = conexion();

        $cpv = pg_escape_string($conn, $cpv);

        $query = "DELETE FROM ProductoVendido WHERE cpv = '$cpv'";

        $result = pg_query($conn, $query);
        if (!$result) {
            echo "Ocurrió un error al eliminar del producto vendido.\n";
            exit;
        }
    }
}
?>
