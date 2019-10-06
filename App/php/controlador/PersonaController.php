<?php 
require_once('model/PersonaModel.php');
require_once('model/CursoModel.php');
require_once('model/SucursalModel.php');
require_once('model/TipoMascotaModel.php');

class PersonaController{

	function list(){
		$this->nav();
		$persona = new PersonaModel();

    $aux = '';
		$rows = $persona->getList();
    $aux .= "</h1><h2>Mascotas</h2><a class=\"btn btn-success\" href=\"?c=Mascota&a=addform\">Agregar</a><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th>id</th><th>tamaño</th><th>precio venta</th><th>color predominante</th><th>curso</th><th>tipo mascota</th><th>sucursal</th><th>Accion</th></tr></thead><tbody>";
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
          case 'tipo_mascota_id':
            $tm = new TipoMascotaModel();
            $tm->get($mascota->tipo_mascota_id);
            $aux .= "\t\t<td>". $tm->descripcion . "</td>\n";
          break;
          case 'sucursal_id':
            $sucursal = new SucursalModel();
            $sucursal->get($mascota->sucursal_id);
            $aux .= "\t\t<td>". $sucursal->nombre . "</td>\n";
          break;
          default:
            $aux .= "\t\t<td>". $mascota->$campo . "</td>\n";
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

    $tm = new TipoMascotaModel();

    $auxtm = '';
    $rows = $tm->getList();
    $auxtm .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Tipo Mascota:</label>
          <div class="col-sm-10">
            <select class="form-control" name="tipo_mascota_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $tm->$campo = $valor;
        if($campo == 'id'){
          $auxtm .= '<option value="' . $tm->$campo . '">';
        }
        if($campo == 'descripcion'){
          $auxtm .= $tm->$campo . '</option>';
        }

      }

    }

    $auxtm .= '</select></div></div>';


    $sucursal = new SucursalModel();

    $auxsu = '';
    $rows = $sucursal->getList();
    $auxsu .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Sucursal:</label>
          <div class="col-sm-10">
            <select class="form-control" name="sucursal_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $sucursal->$campo = $valor;
        if($campo == 'id'){
          $auxsu .= '<option value="' . $sucursal->$campo . '">';
        }
        if($campo == 'nombre'){
          $auxsu .= $sucursal->$campo . '</option>';
        }

      }

    }

    $auxsu .= '</select></div></div>';


    echo ' > Agregar</h1><h2>Agregar Persona:</h2>
      <form class="form-horizontal" action="?c=persona&a=add" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            id:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="id" placeholder="id" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre de la persona" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            Edad:
          </label>
          <div class="col-sm-10">
            <input type="number" class="form-control"
              name="edad" min="12" placeholder="edad de la persona" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            pais:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="pais" placeholder="pais de la persona"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            correo:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="correo" placeholder="correo de la persona"
            >
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            password:
          </label>
          <div class="col-sm-10">
            <input type="password" class="form-control"
              name="password" placeholder="password"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
            username:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="username" placeholder="username"
            >
          </div>
        </div>        

        ' . $aux . $auxtm . $auxsu . '

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


    $tm = new TipoMascotaModel();

    $auxtm = '';
    $rows = $tm->getList();
    $auxtm .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Tipo Mascota:</label>
          <div class="col-sm-10">
            <select class="form-control" name="tipo_mascota_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $tm->$campo = $valor;
        if($campo == 'id'){
          if($tm->$campo == $mascota->tipo_mascota_id){
             $auxtm .= '<option value="' . $tm->$campo . '" selected >';
          }
          else{
            $auxtm .= '<option value="' . $tm->$campo . '">';
          }
        }
        if($campo == 'descripcion'){
          $auxtm .= $tm->$campo . '</option>';
        }

      }

    }

    $auxtm .= '</select></div></div>';


    $sucursal = new SucursalModel();

    $auxsu = '';
    $rows = $sucursal->getList();
    $auxsu .= '<div class="form-group">
          <label class="control-label col-sm-2" for="sel1">Sucursal:</label>
          <div class="col-sm-10">
            <select class="form-control" name="sucursal_id">';
            
    for($i=0;$i<count($rows);$i++){
      foreach($rows[$i] as $campo=>$valor) {
        $sucursal->$campo = $valor;
        if($campo == 'id'){
          if($sucursal->$campo == $mascota->sucursal_id){
             $auxsu .= '<option value="' . $sucursal->$campo . '" selected >';
          }
          else{
            $auxsu .= '<option value="' . $sucursal->$campo . '">';
          }
        }
        if($campo == 'nombre'){
          $auxsu .= $sucursal->$campo . '</option>';
        }

      }

    }

    $auxsu .= '</select></div></div>';

    $aux = ' > Editar</h1><h2>Editar Mascota:</h2>
      <form class="form-horizontal" action="?c=Persona&a=edit" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">
            Nombre:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="nombre" placeholder="nombre" value="' . $persona->nombre . '"  readonly="readonly" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            apellido:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="apellido" placeholder="apellido de la persona" value="' . $persona->apellido . '" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
           Edad:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="edad" placeholder="edad persona" value="' . $persona->edad . '" onkeypress="return valida(event)"
            >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">
            pais:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="pais" placeholder="pais" value="' . $persona->pais . '"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
           Correo:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="correo" placeholder="correo persona" value="' . $persona->correo . '" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="control-label col-sm-2">
           Password:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="password" placeholder="password persona" value="' . $persona->password . '" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">
           Tipo Persona:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="tpersona" placeholder="Tipo persona" value="' . $persona->tpersona . '" onkeypress="return valida(event)"
            >
          </div>
        </div>
        
                <div class="form-group">
          <label class="control-label col-sm-2">
           Username:
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control"
              name="username" placeholder="edad persona" value="' . $persona->username . '" onkeypress="return valida(event)"
            >
          </div>
        </div>

        ' . $auxr . $auxtm . $auxsu . '

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
              <a class="nav-link active" href="?c=Mascota&a=list">Mascotas<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Raza&a=list">Razas</a>
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

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=E2&a=list">Consultas Entrega II</a>
            </li>
          </ul>

        </nav>
       

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">       
          <h1>Inicio > Mascotas
          ';

	}
} ?>
