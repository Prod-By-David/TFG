<style>
.button.is-rounded {
    border-radius: 9999px;
    padding-left: calc(1em + .25em);
    padding-right: calc(1em + .25em);
}

.button.is-info {
    background-color: #B01B00;
    border-color: transparent;
    color: #fff;
}

.button.is-link.is-light {
    background-color: #eff1fa;
    color: #B01B00;
}
</style>

<div class="container is-fluid mb-6">
    <h1 class="title">CAJAS</h1>
    <h2 class="subtitle"><i class="fas fa-cash-register fa-fw"></i> &nbsp;Nueva caja:</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
        // Verificar si el usuario tiene rol de Administrador
        if ($_SESSION['usuario'] !== "Administrador") {
            echo '<p class="has-text-centered has-text-danger"><i class="fas fa-exclamation-triangle"></i> No tienes permisos para acceder a esta sección.</p>';
            exit();
        }
    ?>

    <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off">

        <input type="hidden" name="modulo_caja" value="registrar">

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>NÚMERO DE CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
                    <input class="input" type="text" name="caja_numero" pattern="[0-9]{1,5}" maxlength="5" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>NOMBRE O CÓDIGO DE CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
                    <input class="input" type="text" name="caja_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ:# ]{3,70}" maxlength="70" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>EFECTIVO EN CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
                    <input class="input" type="text" name="caja_efectivo" pattern="[0-9.]{1,25}" maxlength="25" value="0.00" required>
                </div>
            </div>
        </div>
        <p class="has-text-centered">
            <button type="reset" class="button is-link is-light is-rounded"><i class="fas fa-paint-roller"></i> &nbsp;Limpiar</button>
            <button type="submit" class="button is-info is-rounded"><i class="far fa-save"></i> &nbsp;Guardar</button>
        </p>
        <p class="has-text-centered pt-6">
            <small><b><u>Los campos marcados con</u></b><?php echo CAMPO_OBLIGATORIO; ?><b><u> son obligatorios</u></b></small>
        </p>
    </form>
</div>