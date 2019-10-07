<?php 
require_once('model/PersonaModel.php');
require_once('model/CursoModel.php');
require_once('model/InstructoresModel.php');

class InstructoresController{

	function list(){
		$this->nav();
		$instructores = new InstructoresModel();

    $aux = '';
		$rows = $instructores->getList();
    $aux .= "</h1><h2>Instructores</h2><a class=\"btn btn-success\" href=\"?c=Instructores&a=addform\">Agregar</a><div class=\"table-responsive\">
    <table class=\"table table-striped\">
    <thead>
    <tr><th>Curso</th>
    <th>Maestro</th>
    <th>Accion</th></tr>
    </thead>
    <tbody>";
    for($i=0;$i<count($rows);$i++){
      $aux .= "\t<tr>\n";
      foreach($rows[$i] as $campo=>$valor) {
        $instructores->$campo = $valor;
        

        switch ($campo) {
          case 'instructor_id':
            $persona = new PersonaModel();
            $persona->get($instructores->instructor_id);
            $aux .= "\t\t<td>". $persona->nombre . "</td>\n";
          break;
          case 'curso_id':
            $curso = new CursoModel();
            $curso->get($instructores->curso_id);
            $aux .= "\t\t<td>". $curso->nombre  . "</td>\n";
          break;
          default:
            $aux .= "\t\t<td>". $instructores->$campo . "</td>\n";
          break;
        }
    }

    $aux .= "\t<td><a href=\"?c=Instructores&a=delete&id_a=" . $instructores->instructor_id ."&id_ba=" . $instructores->curso_id . " \"class=\"btn btn-danger\">Eliminar</a></td></tr>\n";
    }
    $aux .= "</tbody></table>\n";
    echo $aux;
		//require_once('view/list.php');
		
	}

  function addform(){
    $this->nav();

    $persona = new PersonaModel();

    $aux = '';
    $rows = $persona->getList();
    $aux .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Maestro:</label>
          <div class="col-sm-10">
            <select class="form-control" name="instructor_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $persona->$campo = $valor;
        if($campo == 'id'){
          $aux .= '<option value="' . $persona->$campo . '">';
        }
        if($campo == 'nombre'){
          $aux .= $persona->$campo . '</option>';
        }

      }

    }

    $aux .= '</select></div></div>';

    $curso = new CursoModel();

    $auxb = '';
    $rows = $curso->getList();
    $auxb .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Edificio:</label>
          <div class="col-sm-10">
            <select class="form-control" name="curso_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $curso->$campo = $valor;
        if($campo == 'id'){
          $auxb .= '<option value="' . $curso->$campo . '">';
        }
        if($campo == 'nombre'){
          $auxb .= $curso->$campo . '</option>';
        }

      }

    }

    $auxb .= '</select></div></div>';

    echo ' > Agregar</h1><h2>Agregar Instructor Y curso:</h2>
      <form class="form-horizontal" action="?c=Instructores&a=add" method="post">
        <div class="form-group">
        ' . $aux .'
        </div>
        <div class="form-group">
        ' . $auxb . '
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
    $instructores = new InstructoresModel();
    $instructores->get($_GET['id_a'],$_GET['id_ba']);

    $persona = new PersonaModel();

    $aux = '';
    $rows = $persona->getList();
    $aux .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Instructor:</label>
          <div class="col-sm-10">
            <select class="form-control" name="instructor_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $persona->$campo = $valor;
        if($campo == 'id'){
          if($persona->$campo == $instructores->instructor_id){
             $aux .= '<option value="' . $persona->$campo . '" selected >';
          }
          else{
            $aux .= '<option value="' . $persona->$campo . '">';
          }
        }
        if($campo == 'nombre'){
          $aux .= $persona->$campo . '</option>';
        }

      }

    }

    $aux .= '</select></div></div>';

    $curso = new CursoModel();

    $auxb = '';
    $rows = $curso->getList();
    $auxb .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Curso:</label>
          <div class="col-sm-10">
            <select class="form-control" name="curso_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $curso->$campo = $valor;
        if($campo == 'id'){
          
          if($curso->$campo == $instructores->curso_id){
            $auxb .= '<option value="' . $curso->$campo . '" selected >' . $curso->$campo . '</option>';
          }
          else{
            $auxb .= '<option value="' . $curso->$campo . '">' . $curso->$campo . '</option>';
          }
        }

      }

    }

    $auxb .= '</select></div></div>';

    $aux = ' > Editar</h1><h2>Editar Instructor y curso:</h2>
      <form class="form-horizontal" action="?c=Instructores&a=edit" method="post">
        <div class="form-group">
        ' . $aux .'
        </div>
        <div class="form-group">
        ' . $auxb . '
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
    if(isset($_POST['instructor_id'])){
      $instructores = new InstructoresModel();
      $instructores->edit($_POST);
      $this->list();
      echo $instructores->msj;
    }
  }

  function add(){
    if(isset($_POST['instructor_id'])){
      $instructores = new InstructoresModel();
      $instructores->set($_POST);
      $this->list();
    echo $instructores->msj;
    }
  }

  function delete(){
    if(!empty($_GET['id_a']) && !empty($_GET['id_ba'])){
      
      $instructores = new InstructoresModel();
      $instructores->delete($_GET['id_a'],$_GET['id_ba']);
      $this->list();
      echo $instructores->msj;
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
              <a class="nav-link" href="?c=Mascota&a=list">Prueba <span class="sr-only">(current)</span></a>
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
          <h1>Inicio > Cursos
          ';

	}
} ?>