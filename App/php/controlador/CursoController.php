<?php 
require_once('model/CursoModel.php');


class CursoController{

	function list(){
		$this->nav();
		$curso = new CursoModel();

    $aux = '';
		$rows = $curso->getList();
    $aux .= "</h1><h2>Curso</h2><a class=\"btn btn-success\" href=\"?c=Curso&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Instructor</th>
    <th>listaalumnos</th>
    <th>Duracion</th>
    <th>id</th>
    <th>Accion</th>
    </tr>
    </thead>
    <tbody>";
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
              name="id" placeholder="Codigo Del Curso" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="Escriba El Nombre Del Curso"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Instructores:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="listainstructores" placeholder="Elija El Instructor"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Alumnos:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="listaalumnos" placeholder="Alumnos Asignados"
            >
          </div>
        </div>        
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Duracion:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="duracion" min="1" placeholder="Horas" onkeypress="return valida(event)"
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
          <label class="control-label col-sm-2">
            Lista Instructores:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="listainstructores" placeholder="Lista De Instructores" value="' . $curso->listainstructores . '"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Lista Alumnos:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="listaalumnos" placeholder="nombre" value="' . $curso->listaalumnos . '"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Duracion:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="duracion" min="1" placeholder="Horas" value="' . $curso->duracion . '" onkeypress="return valida(event)"
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
      
      $curso = new CursoModel();
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
              <a class="nav-link" href="?c=Prueba&a=list">Prueba <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Persona&a=list">Personas (Registro) <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?c=Curso&a=list">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Instructor&a=list">Instructores</a>
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
          <h1>Inicio > Cursos
          ';

	}
} ?>
