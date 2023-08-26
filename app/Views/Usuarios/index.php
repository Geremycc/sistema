<?= $this->extend('Views/Dashboard/escritorio'); ?>

<?= $this->section('contenido');?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Módulo de Personas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="content-wrapper">
 
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
                                            <td><?= esc($persona['nombre']); ?></td>
                                            <td><?= esc($persona['apellido']); ?></td>
                                            <td><?= esc($persona['telefono']); ?></td>
                                            <td><?= esc($persona['edad']); ?></td>
                                            <td><?= esc($persona['email']); ?></td>
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

    <?= $this->endSection();?>