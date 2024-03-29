<?php 
require_once('model/TipoRolModel.php');


class TipoRolController{

	function list(){
		$this->nav();
		$tm = new TipoRolModel();

    $aux = '';
		$rows = $tm->getList();
    $aux .= "</h1><h2>TIPO ROL DE USUARIO</h2><a class=\"btn btn-success\" href=\"?c=TipoRol&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th>ID</th><th>Nombre</th><th>Accion</th></tr></thead><tbody>";
    for($i=0;$i<count($rows);$i++){
      $aux .= "\t<tr>\n";
      foreach($rows[$i] as $campo=>$valor) {
        $tm->$campo = $valor;
        $aux .= "\t\t<td>". $tm->$campo . "</td>\n";
    }

      $aux .= "\t<td><a href=\"?c=TipoRol&a=editform&id=" . $tm->id . " \"class=\"btn btn-success\">Editar</a><a href=\"?c=TipoRol&a=delete&id=" . $tm->id . " \"class=\"btn btn-danger\">Eliminar</a></td></tr>\n";
    }
    $aux .= "</tbody></table>\n";
    echo $aux;
		//require_once('view/list.php');
		
	}

  function addform(){
    $this->nav();

    echo ' > Agregar</h1><h2>Agregar Tipo De Rol:</h2>
      <form class="form-horizontal" action="?c=TipoMascota&a=add" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            ID:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="identificacion" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre"
            >
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <input type="submit" class="btn btn-success" value="Guardar" >
          </div>
        </div>
      </form>';
  }

  function editform(){
    $this->nav();
    $tm = new TipoRolModel();
    $tm->get($_GET['id']);

    $aux = ' > Editar</h1><h2>Editar Tipo Rol:</h2>
      <form class="form-horizontal" action="?c=TipoRol&a=edit" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            ID:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="id" value="' . $tm->id . '"  readonly="readonly" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre" value="' . $tm->nombre . '"
            >
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <input type="submit" class="btn btn-success" value="Guardar" >
          </div>
        </div>
      </form>';


      echo $aux;
  }

  function edit(){
    if(isset($_POST['id'])){
      $tm = new TipoRolModel();
      $tm->edit($_POST);
      $this->list();
      echo $sucursal->msj;
    }
  }

  function add(){
    if(isset($_POST['id'])){
      $tm = new TipoRolModel();
      $tm->set($_POST);
    }
    $this->list();
    echo $sucursal->msj;
  }

  function delete(){
    if(!empty($_GET['id'])){
      
      $tm = new TipoRolModel();
      $tm->delete($_GET['id']);
      $this->list();
      echo $sucursal->msj;
    }

  }

	function nav(){
		echo '<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link"  href="?c=Index&a=index">Inicio</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Prueba&a=list">Prueba <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Persona&a=list">Personas (Registro) <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?c=Curso&a=list">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Instructores&a=list">Instructores</a>
            </li>
          </ul>
          
            <li class="nav-item">
              <a class="nav-link" href="?c=Area&a=list">Asignar area a los cursos</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Calificaciones&a=list">Calificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Imprimir&a=list">Imprimir</a>
            </li>
          </ul>

        </nav>
       

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Inicio > Mascotas
          ';

	}
} ?>
