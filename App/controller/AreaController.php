<?php 
require_once('model/AreaModel.php');


class AreaController{

	function list(){
		$this->nav();
		$area = new AreaModel();

    $aux = '';
		$rows = $area->getList();
    $aux .= "</h1><h2>Area De Estudio</h2><a class=\"btn btn-success\" href=\"?c=area&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th>id</th>
    <th>Edificio</th>
    <th>Aula</th>
    <th>Accion</th>
    </tr></thead>
    <tbody>";
    for($i=0;$i<count($rows);$i++){
      $aux .= "\t<tr>\n";
      foreach($rows[$i] as $campo=>$valor) {
        $area->$campo = $valor;
        $aux .= "\t\t<td>". $area->$campo . "</td>\n";
    }

      $aux .= "\t<td><a href=\"?c=Area&a=editform&id=" . $area->id . " \"class=\"btn btn-success\">Editar</a><a href=\"?c=Area&a=delete&id=" . $area->id . " \"class=\"btn btn-danger\">Eliminar</a></td></tr>\n";
    }
    $aux .= "</tbody></table>\n";
    echo $aux;
		//require_once('view/list.php');
		
	}

  function addform(){
    $this->nav();

    echo ' > Agregar</h1><h2>Agregar Area:</h2>
      <form class="form-horizontal" action="?c=Area&a=add" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="Identificacion Del Area" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Edificio:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="edificio" placeholder="Edificio del curso a impartir"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Aula:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="aula" placeholder="Aula del curso a impartir"
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
    $area = new AreaModel();
    $area->get($_GET['id']);

    $aux = ' > Editar</h1><h2>Editar Area:</h2>
      <form class="form-horizontal" action="?c=Area&a=edit" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="id" value="' . $area->id . '"  readonly="readonly" onkeypress="return valida(event)"

            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Edificio:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="edificio" placeholder="Edificio del curso a impartir" value="' . $area->edificio . '"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Aula:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="aula" placeholder="Aula del curso a impartir" value="' . $area->aula . '"
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
      $area = new AreaModel();
      $area->edit($_POST);
      $this->list();
      echo $area->msj;
    }
  }

  function add(){
    if(isset($_POST['id'])){
      $area = new AreaModel();
      $area->set($_POST);
    }
    $this->list();
    echo $area->msj;
  }

  function delete(){
    if(!empty($_GET['id'])){
      
      $area = new AreaModel();
      $area->delete($_GET['id']);
      $this->list();
      echo $area->msj;
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
          <h1>Inicio > Area
          ';

	}
} ?>