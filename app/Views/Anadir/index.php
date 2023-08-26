<?= $this->extend('Views/Dashboard/escritorio'); ?>

<?= $this->section('contenido');?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $titulo; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Añadir</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- Main content -->
    <section class="content">
    <div class="card">
    <div class="card-header">
    <h5 class="card-title">
        Añadir Usuario
    </h5>
    </div>
    <div class="card-body">
    <form role="form" action="<?= site_url('anadir/guardarUsuario'); ?>" method="post">

    <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
    </div>
    </div>
    <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">apellido</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido" required>
    </div>
    </div>
    <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">telefono</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="telefono" placeholder="Ingrese su numero de telefono" required>
    </div>
    </div>
    <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">edad</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" name="edad" placeholder="Ingrese su edad" required>
    </div>
    </div>
    <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" name="email" placeholder="Ingrese su direccion email" required>
    </div>
    </div>
    </div>

    <div class="card-footer"> 
    <button type="submit" class="btn btn-info">agregar</button>  
    </div>
    </form>  
    </div>
    </div>

    </section>
 
      <script type="text/javascript">
        $("#menuAdministracion").addClass("menu-open");
        $("#menuAñadir").addClass("active");
    </script>

    <?= $this->endSection();?>