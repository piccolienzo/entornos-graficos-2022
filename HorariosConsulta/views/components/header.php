<header class="header  collapsible-menu">
    <button id="volver" class="btn btn-violeta"><span class="icon-volver"></span>Volver</button>
    <img class="utnlogo" src="img/utn-logo.svg" alt="logo utn">
    <input type="checkbox" id="menu">
    <label for="menu"></label>
    <nav class="menu menu-content">
        
            <ul class=" ">
                <!-- TODO: terminar   -->               
                <?php
                    session_start();
                    if($_SERVER['SERVER_NAME'] == "localhost"){
                            $sv ="http://localhost/horariosconsulta";
                    }
                    else{
                        $sv = "https://horariosconsulta.000webhostapp.com";
                    }
                    if(isset($_SESSION['usuario'])){                  
                        $role = $_SESSION['role'];
                        if( $role == "administrador"){
                            echo "
                            <li>
                                ADMINISTRADOR
                            </li>
                            <li>
                                 <a href='{$sv}/index.php'>Inicio</a>
                            </li>
                            <li>
                                <a href='{$sv}/controllers/consultations/consultations.php?admin=true'>Consultas</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/pages/listado-usuarios.php'>Usuarios</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/logout.php'>Cerrar sesión</a>
                            </li>
                        "; 
                        }
                        if( $role == 'alumno'){
                            echo "
                            <li>
                                ALUMNO
                            </li>
                            <li>
                                <a href='{$sv}/index.php'>Inicio</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/pages/tipo-consulta.php'>Consultas</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/pages/listado-consultas.php'>Mis Consultas</a>
                            </li>
                            <li>
                            <a href='{$sv}/views/logout.php'>Cerrar sesión</a>
                            </li>
                        ";
                        }
                        if( $role == 'profesor'){
                            echo "
                            <li>
                                PROFESOR
                            </li>
                            <li>
                            <a href='{$sv}/index.php'>Inicio</a>
                            </li>
                            <li>
                                <a href='{$sv}/controllers/consultations/consultations.php'>Consultas</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/logout.php'>Cerrar sesión</a>
                            </li>
                        ";
                        }                   
                    }               
                    else{
                        echo "
                            <li>
                                <a href='{$sv}/index.php'>Inicio</a>
                            </li>
                            <li>
                                <a href='{$sv}/views/pages/tipo-consulta.php'>Consultas</a>
                            </li>
                            <li>
                            <a href='{$sv}/views/pages/login.php'>Iniciar sesión</a>
                            </li>
                        ";
                    }
                ?>
            </ul>
         
    </nav>
</header>
<style>   
    /*#region Estilos */   
.btn#volver span.icon-volver {
    background: url("icon/arrow-left.svg") no-repeat;
    float: left;
    margin-top: 2px;
    margin-right: 3px;
    width: 20px;
    height: 20px; 
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
}
.btn#volver{
    position: absolute;
    top: 120px;
    left: 200px;
    width: 100px;
    display: none;
}
    .header{
        width: 100%;
        height: 111px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;   
        align-items: center;
    }
    .header img{
        padding-left: 32px;
    }
    .header ul{
        display: flex;
        flex-direction: row;
        padding-right: 32px;
        align-items: center;
    }
    .header ul li{
        padding: 0 20px 0 20px;
    }
    .header ul li a{
        font-size: 20px;
        font-weight: 500;
        line-height: 28px;
        letter-spacing: 0em;
        text-align: left;
        color: black;
        text-decoration: none;
    }
    .header ul li a:hover{
        text-decoration: underline;
    
    }
    input#menu {
        display: none;
    }

    @media (max-width: 720px) {
        .header ul {
    display: flex;
    flex-direction: column;
    /* padding-right: 32px; */
    align-items: center;
    justify-content: center;
    align-content: center;
}
        .header{
            width:100%;
            height:80px;
            flex-direction: column;
        }
        .header .utnlogo{
            height:80px;

        }
        .header  .collapsible-menu{
            display:flex;
        }
        .collapsible-menu label {
            font-size: 56px;
            display: flex;
            cursor: pointer;
            background: url("icon/menu.svg") no-repeat left center;
            padding: 10px 0 10px 50px;
            position:absolute;
            top:30px;
            right:0;
        }
        .menu-content {
            padding: 0 0 0 50px;
        }
        .collapsible-menu {
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 2px 3px rgba(0,0,0,0.2);
        }
        .collapsible-menu ul {
            list-style-type: none;
            padding: 0;
        }
        .collapsible-menu a {
            display:block;
            text-decoration: none;
        }
        .menu-content {
            max-height: 0;
            overflow: hidden;
            padding: 0 0 0 50px;
        }
        /* Toggle Effect */
        input:checked ~ label {
            position:absolute;
            top:30px;
            right:0;
            z-index:100;
            background: url("icon/menu-close.svg") no-repeat left center;
        }
        input:checked ~ .menu-content {
            position: absolute;
            top: 80px;
            right: 0;
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
            max-height: 100vh;
            z-index: 10;
            background: white;
            margin: 0;
            align-items: center;
            justify-content: flex-start;

        }
        .header ul li {
            padding: 10% 20px 10% 20px;
            margin-top:20px;
        }

        .btn#volver{
            position: absolute;
            top: 20px;
            left: 5px;
            width: 100px;
            display: none;
}
    }
    /*#endregion */
</style>
