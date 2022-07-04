<header class="header">
    <button id="volver" class="btn btn-violeta"><span class="icon-volver"></span>Volver</button>
    <img src="/horariosconsulta/static/images/utn-logo.svg" alt="logo utn">
    <nav class="menu">
        <ul>
            <!-- TODO: terminar   -->
            <?php
                function cerrar_sesion(){
                    session_destroy();
                    header("Location: ../../../index.php");
                }
                session_start();
                if(isset($_SESSION['usuario'])){                  
                    $role = $_SESSION['role'];
                    if( $role == "administrador"){
                        echo '
                        <li>
                            <a>ADMINISTRADOR</a>
                        </li>
                        <li>
                        <a href="/horariosconsulta/index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="http://">Consultas</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/views/logout.php">Cerrar sesión</a>
                        </li>
                    '; 
                    }
                    if( $role == "alumno"){
                        echo '
                        <li>
                        <a>ALUMNO</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/views/pages/tipo-consulta.php">Consultas</a>
                        </li>
                        <li>
                            <a href="http://">Mis Consultas</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/views/logout.php">Cerrar sesión</a>
                        </li>
                    ';
                    }
                    if( $role == "profesor"){
                        echo '
                        <li>
                        <a>PROFESOR</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/index.php">Inicio</a>
                        </li>
                        <li>
                            <a href=/horariosconsulta/views/listado-consultas.php">Consultas</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/views/logout.php">Cerrar sesión</a>
                        </li>
                    ';
                    }                   
                }               
                else{
                    echo '
                        <li>
                            <a href="http://">Inicio</a>
                        </li>
                        <li>
                            <a href="/horariosconsulta/views/pages/tipo-consulta.php">Consultas</a>
                        </li>
                        <li>
                        <a href="/horariosconsulta/views/pages/login.php">Login</a>
                        </li>
                    ';
                }
            ?>
        </ul>
    </nav>
</header>
<style>
    
    /*#region Estilos */

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

    @media (max-width: 720px) {
        .header img{
            padding-left: 10px;
            width: 70px; 
        }
    }
    /*#endregion */
</style>
