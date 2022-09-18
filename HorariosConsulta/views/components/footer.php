<footer class="footer">
    <div>
        <p class="footer-title">Universidad Tecnológica Nacional</p>
        <p class="footer-descripcion">Facultad Regional Rosario</p>
        
        <p class="footer-descripcion">
            <a href="views/pages/mapa-sitio.php">Mapa del sitio</a>
        </p>
    </div>

    <div>
        <p class="footer-title">
            <a href="../pages/contacto.php">Contacto</a>
        </p>
        <p class="footer-descripcion">
            ZEBALLOS 1341 - S2000BQA -ROSARIO
        </p>
        <p class="footer-descripcion">
            EMAIL: contacto@frro.utn.edu.ar
        </p>
        <p class="footer-descripcion">
            TEL: 0341 4481871
        </p>
    </div>
</footer>
<style>
    
    /*#region estilos_footer*/
    
    .footer{  
        width: 100%;
        height: 150px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-self: flex-end;
        margin-top: auto;
    }

    .footer div{
        width: 15%;
        margin:0 15px 0 15px;
        color: var(--violeta);
    }

    .footer .footer-title{
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }

    .footer .footer-descripcion{
        font-size: 12px;
        font-weight: 400;
        line-height: 16px;
        letter-spacing: 0em;
        text-align: left;
    }

    .footer a{
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    /*#endregion*/
</style>