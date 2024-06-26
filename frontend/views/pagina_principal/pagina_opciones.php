<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden; 
        }
        .header {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 0vh 5vh;
            background: aliceblue;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }
        .header a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            font-size: 3vh;
            background-color: #ef233c;
            border-radius: 10px;
            padding: 1vh 2vh;
        }
        .header a:hover {
            background-color: #d90429;
        }
        .navbar span {
            color: #14141E;
            padding-left: 3vh;
            padding-right: 3vh;
            font-size: 6vh;
        }
        .navbar img {
            width: 15vh;
            height: auto;
        }
        .container.mt-5 {
            padding-top: 60px; 
            margin-top: 0;
        }
        .btn-option {
            height: 100px;
            margin: 10px;
            font-size: 1.5em;
            background-color: #ef233c;
            border-color: #ef233c; 
            color: white; 
            display: flex; 
            justify-content: center; 
            align-items: center;
            text-align: center; 
            width: calc(33.333% - 20px);
        }
        .btn-option:hover {
            background-color: #d90429; 
            border-color: #d90429;
        }
        @media (min-width: 768px) {
            .btn-option {
                height: calc(25vh - 20px);
            }
        }
    </style>
</head>
<body class="body-suc">
    <header class="header">
        <nav class="navbar">
            <img src="/sis2-Ketal//frontend/assets/ketal.png">
            <?php
                include_once 'C:\xampp\htdocs\sis2-ketal\backend\models\classes.php';
                if (isset($_COOKIE['sucursal'])) {
                    $serializedSucursal = $_COOKIE['sucursal'];
                    $suc = unserialize($serializedSucursal);
                }
                echo "<span>Menú de Opciones - Sucursal: ". $suc->getZona() ." </span>";
            ?>
        </nav>
        <a href="../auth/login.html"><b>Salir</b></a>
    </header>
    <br>
    <br>
    <div class="container mt-5">
        <div class="row text-center options-container">
            <a href="../ventas/view_realizar_venta.php" class="btn btn-option">REGISTRAR VENTA</a>
            <a href="../pedido/view_pedido.php" class="btn btn-option">REALIZAR PEDIDO</a>
            <a href="../productos/view_register_product.php" class="btn btn-option">AGREGAR NUEVO PRODUCTO</a>
        </div>
        <div class="row text-center options-container">
            <a href="../funcionario/view_funcionarios.php" class="btn btn-option">EMPLEADOS</a>
            <a href="../funcionario/view_fun.php" class="btn btn-option">AGREGAR EMPLEADO</a>
            <a href="../estado_pedido/view_epedido.php" class="btn btn-option">PEDIDOS</a>
        </div>
        <div class="row text-center options-container">
            <a href="../inventario/view_inventario.php" class="btn btn-option">INVENTARIO</a>
            <a href="../ventas/view_ventas.php" class="btn btn-option">VENTAS</a>
            <a href="view_dashboards.html" class="btn btn-option">VER DASHBOARDS</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
