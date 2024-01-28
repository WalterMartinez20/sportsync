<?php
$Auth = new Auth();

if (isset($_GET['id'])) {
    $salon = $Auth->conseguirSalon($_GET['id']);
}
?>

<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url('https://www.aytopalencia.es/sites/default/files/2022-09/deportes.jpg');">
            <div class="sombra"></div>
            <div class="datos-perfil">
                <h4 class="titulo-usuario">
                    <?php if (isset($_GET['id'])) {
                        echo $salon['email'];
                    } ?>
                </h4>
            </div>
        </div>
        <div class="menu-perfil">
            <ul>
                <!-- <li><a href="Perfil_Salon.php?id=<?php echo $_GET['id'] ?>" title=""> Inicio</a></li> -->
                <li><a href="servicios.php?id=<?php echo $_GET['id'] ?>" title="">Canchas</a></li>
            </ul>
        </div>
    </div>
</section>