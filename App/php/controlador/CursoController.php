<?php 
require_once('model/CursoModel.php');


class CursoController{

	function list(){
		$this->nav();
		$curso = new CursoModel();

    $aux = '';
		$rows = $curso->getList();
    $aux .= "</h1><h2>Curso</h2><a class=\"btn btn-success\" href=\"?c=Curso&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th>id</th><th>Nombre</th><th>Accion</th></tr></thead><tbody>";
    for($i=0;$i<count($rows);$i++){
      $aux .= "\t<tr>\n";
      foreach($rows[$i] as $campo=>$valor) {
        $curso->$campo = $valor;
        $aux .= "\t\t<td>". $curso->$campo . "</td>\n";
    }

      $aux .= "\t<td><a href=\"?c=Curso&a=editform&id=" . $curso->id . " \"class=\"btn btn-success\">Editar</a><a href=\"?c=Curso&a=delete&id=" . $curso->id . " \"class=\"btn btn-danger\">Eliminar</a></td></tr>\n";
    }
    $aux .= "</tbody></table>\n";
    echo $aux;
		//require_once('view/list.php');
		
	}

  function addform(){
    $this->nav();

    echo ' > Agregar</h1><h2>Agregar Curso:</h2>
      <form class="form-horizontal" action="?c=Curso&a=add" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
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
    $curso = new CursoModel();
    $curso->get($_GET['id']);

    $aux = ' > Editar</h1><h2>Editar Curso:</h2>
      <form class="form-horizontal" action="?c=Curso&a=edit" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="id" value="' . $curso->id . '"  readonly="readonly" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre" value="' . $curso->nombre . '"
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
      $curso = new CursoModel();
      $curso->edit($_POST);
      $this->list();
      echo $curso->msj;
    }
  }

  function add(){
    if(isset($_POST['id'])){
      $curso = new CursoModel();
      $curso->set($_POST);
    }
    $this->list();
    echo $curso->msj;
  }

  function delete(){
    if(!empty($_GET['id'])){
      
      $curso = new RazaModel();
      $curso->delete($_GET['id']);
      $this->list();
      echo $curso->msj;
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
              <a class="nav-link" href="?c=Mascota&a=list">Mascotas<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="?c=Raza&a=list">Razas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=TipoMascota&a=list">Tipo mascota</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Accesorio&a=list">Accesorios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Categoria&a=list">Categorias</a>
            </li>
          </ul>

        </nav>
       

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Inicio > Cursos
          ';

	}
} ?>