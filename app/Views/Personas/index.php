<!-- app/Views/Personas/index.php -->
<?= $this->extend('Views/Dashboard/escritorio'); ?>

<?= $this->section('contenido'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Módulo de Personas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Personas</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="content-wrapper">

<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form id="editarForm">
        <input type="hidden" id="personaId" name="id">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <!-- Agregar otros campos aquí -->
    </form>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarEdicion">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Todas las Personas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>nombre</th>
                                        <th>apellido</th>
                                        <th>telefono</th>
                                        <th>edad</th>
                                        <th>email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($personas as $persona): ?>
                                        <tr>
                                            <td><?= esc($persona['nombre']); ?> </td>
                                            <td><?= esc($persona['apellido']); ?></td>
                                            <td><?= esc($persona['telefono']); ?></td>
                                            <td><?= esc($persona['edad']); ?></td>
                                            <td><?= esc($persona['email']); ?></td>
                                            <td>
                                               <a href="#" class="btn btn-sm btn-info editar-persona" data-id="<?= $persona['id']; ?>">editar</a>
                                               <a href="#" class="btn btn-sm btn-danger delete-persona" data-id="<?= $persona['id']; ?>">borrar</a>
                                           </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>nombre</th>
                                        <th>apellido</th>
                                        <th>telefono</th>
                                        <th>edad</th>
                                        <th>email</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<script type="text/javascript">
    $("#menuAdministracion").addClass("menu-open");
    $("#menuUsuarios").addClass("active");
</script>
<script>
    $(document).ready(function() {
        $(".editar-persona").click(function() {
            const personaId = $(this).data("id");
            // Aquí puedes hacer una solicitud AJAX para obtener los datos de la persona por ID
            // y llenar los campos del formulario en el modal

            // Mostrar el modal
            $("#editarModal").modal("show");
        });
        
        $(".delete-persona").click(function() {
    const personaId = $(this).data("id");
    
    if (confirm("¿Estás seguro de que deseas eliminar esta persona?")) {
        $.ajax({
            method: "POST",
            url: "<?= site_url('personas/borrarPersona'); ?>/" + personaId,
            success: function(response) {
                if (response.success) {
                    // Recargar la página después de borrar la persona
                    location.reload();
                }
            }
        });
    }
});

        $("#guardarEdicion").click(function() {
    const personaId = $("#personaId").val();
    const nombre = $("#nombre").val();
    const apellido = $("#apellido").val();
    const telefono = $("#telefono").val();
    const edad = $("#edad").val();
    const email = $("#email").val();

    // Hacer una solicitud AJAX para actualizar los datos de la persona en la base de datos
    $.ajax({
        method: "POST",
        url: "<?= site_url('personas/actualizar'); ?>", // Ruta correcta para la actualización
        data: {
            id: personaId,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            edad: edad,
            email: email,
            // Otros campos
        },
        success: function(response) {
            if (response.success) {
                // Cargar los datos actualizados de la persona en la fila correspondiente
                $.ajax({
                    method: "GET",
                    url: "<?= site_url('personas/obtenerPersona'); ?>/" + personaId, // Ruta correcta para obtener los datos
                    success: function(personaData) {
                        if (personaData.success) {
                            // Reemplazar la fila en la tabla con los nuevos datos
                            const filaPersona = $("tr[data-id='" + personaId + "']");
                            filaPersona.replaceWith(personaData.html);
                            
                            // Cerrar el modal
                            $("#editarModal").modal("hide");
                        }
                    }
                });
            }
        }
    });
});
})
</script>




<?= $this->endSection(); ?>
