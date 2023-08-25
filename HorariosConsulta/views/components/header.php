<?php
    session_start();
?>
<header class="header  collapsible-menu">
    <button id="volver" class="btn btn-violeta"><span class="icon-volver"></span>Volver</button>
    <img class="utnlogo" src="img/utn-logo.svg" alt="Logo de la universidad">
    <input type="checkbox" id="menu">
    <label for="menu"></label>
    <nav class="menu menu-content">
        
            <ul class=" ">
                <?php
                    if($_SERVER['SERVER_NAME'] == "localhost"){
                            $sv ="http://localhost/horariosconsulta";
                    }
                    else{
                        $sv = "https://tpentornosgraficos.000webhostapp.com/HorariosConsulta";
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
                                <a href='{$sv}/views/pages/mis-consultas.php'>Mis Consultas</a>
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
                                <a href='{$sv}/controllers/consultations/consultations.php?teacher=true'>Consultas</a>
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

    <script>
        let backurl = "";

        (function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            backurl = urlParams.get('backurl');
            if(backurl) {
                document.querySelector("#volver").style.display = "block";
                document.querySelector("#volver").addEventListener("click", back);      
            }
        })();

        function back(){
            window.location.href = atob(backurl);
        }
    </script>

</header>