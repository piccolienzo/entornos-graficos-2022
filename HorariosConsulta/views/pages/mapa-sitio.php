<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <title>Mapa del sitio</title>
    </head>

    <body>

        <?php
            require('../components/header.php');
            
            $links = [];
            if(isset($_SESSION['usuario'])){                  
                $role = $_SESSION['role'];

                if( $role == "alumno"){
                    array_push(
                        $links,
                        array("text" => "Buscador de consultas", "href" => "tipo-consulta.php"),
                        array("text" => "Mis inscripciones a consultas", "href" => "listado-consultas.php")
                    );
                }
                else if( $role == "profesor"){
                    array_push(
                        $links,
                        array("text" => "Mis consultas", "href" => "listado-consultas.php")
                    );
                }
                else if( $role == "administrador"){
                    array_push(
                        $links,
                        array("text" => "Listado de consultas", "href" => "listado-consultas-admin.php"),
                        array("text" => "Listado de usuarios", "href" => "listado-usuarios.php")
                    );
                }
            }
            else {
                array_push(
                    $links,
                    array("text" => "Buscador de consultas", "href" => "tipo-consulta.php"),
                    array("text" => "Listado de consultas", "href" => "listado-consultas.php")
                );
            }

            array_push(
                $links,
                array("text" => "Contacto", "href" => "contacto.php")
            );
        ?>

        <main class="container">
            <h1>Mapa del sitio</h1>
            <section class="card">
                <ul>
                    <?php
                        foreach($links as $item) {
                            echo('<li><a href="'.$item["href"].'">'.$item["text"].'</a></li>');
                        }
                    ?>
                </ul>
            </section>
        </main>

        <?php
            require('../components/footer.php')
        ?>

        <script>
            
        </script>
    </body>
</html>