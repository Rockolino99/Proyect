<div class="col-md-12">
    <div class="page-header">
        <h1 class="h1-certificado" style="text-align: center">Reestablecer Contraseña</h1>
    </div>
</div>

<div class="container" style="width: 30%; padding: 20px;">
    <div class="card" style="width: 100%; height: 300px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <form class="form" role="form" id="form_RestablecerPass">
            <div class="row">
                <div class="col">
                    <label for="nombreRestablecer">Correo electrónico:</label>
                    <input type="text" class="form-control" id="nombreRestablecer" placeholder="Correo Electrónico">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="passRestablecer1">Contraseña:</label>
                    <input type="password" class="form-control" id="passRestablecer1" placeholder="Contraseña">
                </div>
                <div class="col">
                    <label for="passRestablecer2">Repetir contraseña:</label>
                    <input type="password" class="form-control" id="passRestablecer2" placeholder="Repetir Contraseña">
                </div>
            </div>
            <br><br>
            <center>
                <button class="btn btn-primary" onclick="reestablecerPass()">Cambiar contraseña</button>
            </center>
        </form>
    </div>
</div>