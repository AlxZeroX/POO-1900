<?php 
require_once('model/PersonaModel.php');
require_once('model/CursoModel.php');
require_once('model/AreaModel.php');
require_once('model/TipoRolModel.php');

class PersonaController{

	function list(){
		$this->nav();
		$persona = new PersonaModel();

    $aux = '';
		$rows = $persona->getList();
    $aux .= "</h1><h2>Usuario</h2><a class=\"btn btn-success\" href=\"?c=Persona&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th>id</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Edad</th>
    <th>Pais</th>
    <th>Correo</th>
    <th>Password</th>
    <th>Username</th>
    <th>Curso</th>
    <th>Edificio-Aula</th>
    <th>Tipo Usuario</th>
    <th>Accion</th>
    </tr></thead><tbody>";
    for($i=0;$i<count($rows);$i++){
      $aux .= "\t<tr>\n";
      foreach($rows[$i] as $campo=>$valor) {
        $persona->$campo = $valor;
  
        switch ($campo) {
          case 'curso_id':
            $curso = new CursoModel();
            $curso->get($persona->curso_id);
            $aux .= "\t\t<td>". $curso->nombre . "</td>\n";
          break;
          case 'tiporol_id':
            $tm = new TipoRolModel();
            $tm->get($persona->tiporol_id);
            $aux .= "\t\t<td>". $tm->nombre . "</td>\n";
          break;
          case 'area_id':
            $area = new AreaModel();
            $area->get($persona->area_id);
            $aux .= "\t\t<td>". $area->edificio  . "-" . $area->aula . "</td>\n";
          break;
          default:
            $aux .= "\t\t<td>". $persona->$campo . "</td>\n";
          break;
        }

      }

      $aux .= "\t<td><a href=\"?c=persona&a=editform&id=" . $persona->id . " \"class=\"btn btn-success\">Editar</a><a href=\"?c=persona&a=delete&id=" . $persona->id . " \"class=\"btn btn-danger\">Eliminar</a></td></tr>\n";
    }
    $aux .= "</tbody></table>\n";
    echo $aux;
		//require_once('view/list.php');
		
	}

  function addform(){
    $this->nav();
    $curso = new CursoModel();

    $aux = '';
    $rows = $curso->getList();
    $aux .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Curso:</label>
          <div class="col-sm-10">
            <select class="form-control" name="curso_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $curso->$campo = $valor;
        if($campo == 'id'){
          $aux .= '<option value="' . $curso->$campo . '">';
        }
        if($campo == 'nombre'){
          $aux .= $curso->$campo . '</option>';
        }

      }

    }

    $aux .= '</select></div></div>';

    $tm = new TipoRolModel();

    $auxtm = '';
    $rows = $tm->getList();
    $auxtm .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Tipo Rol:</label>
          <div class="col-sm-10">
            <select class="form-control" name="tiporol_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $tm->$campo = $valor;
        if($campo == 'id'){
          $auxtm .= '<option value="' . $tm->$campo . '">';
        }
        if($campo == 'nombre'){
          $auxtm .= $tm->$campo . '</option>';
        }

      }

    }

    $auxtm .= '</select></div></div>';


    $area = new AreaModel();

    $auxsu = '';
    $rows = $area->getList();
    $auxsu .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Edificio:</label>
          <div class="col-sm-10">
            <select class="form-control" name="area_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $area->$campo = $valor;
        if($campo == 'id'){
          $auxsu .= '<option value="' . $area->$campo . '">';
        }
        if($campo == 'edificio'){
          $auxsu .= $area->$campo . '</option>';
        }

      }

    }

    $auxsu .= '</select></div></div>';


    echo ' > Agregar</h1><h2>Agregar Persona:</h2>
      <form class="form-horizontal" action="?c=persona&a=add" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            ID:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="Identificacion" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="Ingrese Su Nombre"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Apellido:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="apellido" placeholder="Ingrese su apellido"
            >
          </div>
        </div>      

        <div class="form-group">
          <label class="control-label col-sm-2">
            Edad:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="edad" min="10" placeholder="Ingrese su edad" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Pais:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="pais" placeholder="Ingrese su pais"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            e-Mail:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="correo" placeholder="Ingrese su correo"
            >
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Password:
          </label>
          <div class="col-sm-10">
            <input type="password" class="form-control"
              name="password" placeholder="Ingrese su password"
            >
          </div>
        </div>
            
        <div class="form-group">
          <label class="control-label col-sm-2">
            Usuario:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="username" placeholder="Ingrese su username"
            >
          </div>
        </div>        

        ' . $aux . $auxsu . $auxtm . '

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <input type="submit" class="btn btn-success" value="Guardar" >
          </div>
        </div>
      </form>';
  }

  function editform(){
    $this->nav();
    $persona = new PersonaModel();
    $persona->get($_GET['id']);


    $curso = new CursoModel();

    $auxr = '';
    $rows = $curso->getList();
    $auxr .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Curso:</label>
          <div class="col-sm-10">
            <select class="form-control" name="curso_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $curso->$campo = $valor;
        if($campo == 'id'){
          if($curso->$campo == $persona->curso_id){
             $auxr .= '<option value="' . $curso->$campo . '" selected >';
          }
          else{
            $auxr .= '<option value="' . $curso->$campo . '">';
          }
        }
        if($campo == 'nombre'){
          $auxr .= $curso->$campo . '</option>';
        }

      }

    }

    $auxr .= '</select></div></div>';


    $tm = new TipoRolModel();

    $auxtm = '';
    $rows = $tm->getList();
    $auxtm .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Tipo Rol:</label>
          <div class="col-sm-10">
            <select class="form-control" name="tiporol_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $tm->$campo = $valor;
        if($campo == 'id'){
          if($tm->$campo == $persona->tiporol_id){
             $auxtm .= '<option value="' . $tm->$campo . '" selected >';
          }
          else{
            $auxtm .= '<option value="' . $tm->$campo . '">';
          }
        }
        if($campo == 'nombre'){
          $auxtm .= $tm->$campo . '</option>';
        }

      }

    }

    $auxtm .= '</select></div></div>';


    $area = new AreaModel();

    $auxsu = '';
    $rows = $area->getList();
    $auxsu .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Edificio:</label>
          <div class="col-sm-10">
            <select class="form-control" name="area_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $area->$campo = $valor;
        if($campo == 'id'){
          if($area->$campo == $persona->area_id){
             $auxsu .= '<option value="' . $area->$campo . '" selected >';
          }
          else{
            $auxsu .= '<option value="' . $area->$campo . '">';
          }
        }
        if($campo == 'edificio'){
          $auxsu .= $area->$campo . '</option>';
        }

      }

    }

    $auxsu .= '</select></div></div>';

    $aux = ' > Editar</h1><h2>Editar Usuario:</h2>
      <form class="form-horizontal" action="?c=Persona&a=edit" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="id" value="' . $persona->id . '"  readonly="readonly" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre" value="' . $persona->nombre . '"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Apellido:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="apellido" placeholder="Ingrese su apellido" value="' . $persona->apellido . '" 
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
           Edad:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="edad" min="10" placeholder="Ingrese su edad" value="' . $persona->edad . '" onkeypress="return valida(event)"
            >
          </div>
        </div>    

        <div class="form-group">
          <label class="control-label col-sm-2">
            Pais:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="pais" placeholder="Ingrese su pais" value="' . $persona->pais . '"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
           Correo:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="correo" placeholder="Ingrese su correo" value="' . $persona->correo . '"
            >
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="control-label col-sm-2">
           Password:
          </label>
          <div class="col-sm-10">
            <input type="password" class="form-control"
              name="password" placeholder="Ingrese su password" value="' . $persona->password . '"
            >
          </div>
        </div>
            
        <div class="form-group">
          <label class="control-label col-sm-2">
           Username:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="username" placeholder="edad persona" value="' . $persona->username . '"
            >
          </div>
        </div>

        ' . $auxr . $auxsu . $auxtm . '

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
      $persona = new PersonaModel();
      $persona->edit($_POST);
      $this->list();
      echo $persona->msj;
    }
  }

  function add(){
    if(isset($_POST['id'])){
      $persona = new PersonaModel();
      $persona->set($_POST);
    }
    $this->list();
    echo $persona->msj;
  }

  function delete(){
    if(!empty($_GET['id'])){
      
      $persona = new PersonaModel();
      $persona->delete($_GET['id']);
      $this->list();
      echo $persona->msj;

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
          <h1>Inicio > Personas
          ';

	}
} ?>
