<div class="box redondo">

<p>Esta &aacute;rea es de uso restringido, porfavor coloca tu usuario y contrase&ntilde;a para accesar al sitio.</p>

<form action="validar_usuario.php" method="post" enctype="multipart/form-data" id="former1">
    Nombre:
    <input type="text" name="usuario" class=":required" />
    Password:
    <input type="hidden" name="url_destino" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
    <input type="password" name="password" class=":required" />
    
    <a href="#" class="boton redondo" onclick="document.getElementById('former1').submit()" style="width:140px;">Entrar</a>
</form>
</div>