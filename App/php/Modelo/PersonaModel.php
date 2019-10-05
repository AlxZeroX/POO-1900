<?php
# Importar modelo de abstracción de base de datos
require_once('config/DBAbstractModel.php');
class PersonaModel extends DBAbstractModel {

	public $nombre;
	public $apellido;
	public $edad;
	public $pais;
	public $tpersona;
	public $correo;
    public $password;
	public $id;
    public $username;

	# Traer datos de una Persona
	public function get($iid=''){
		if($iid != '') {
			$this->query = "
			SELECT *
			FROM persona
			WHERE id = '$iid'
			";
			$this->getResultQuery();
		}
		if(count($this->rows) == 1){
			foreach ($this->rows[0] as $campo=>$valor) {
				$this->$campo = $valor;
			}

			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Persona encontrada.
						  </div>';

		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra la Persona.
</div>';
		}
	}
	# Traer Lista
	public function getList(){
		$this->query = "
		SELECT *
		FROM persona
		ORDER BY id ASC";

		$this->getResultQuery();

		$aux = "";
		if(count($this->rows) >= 1){
			$this->msj = '<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Realizado!</strong> Persona(s) encontrada(s).
</div>';
			return $this->rows;
		}
		else{
			$this->msj = '<div class="alert alert-danger">
  <strong>A ocurrido un error!</strong> no existe ninguna columna de la tabla Persona.
</div>';
		}
		return array();
	}

	public function set($data=array()){
		if($data['id']!=null){
			$this->get($data['id']);
			if($data['id'] != $this->id) {
				foreach ($data as $campo=>$valor) {
					$$campo = $valor;
				}

				$this->query = "
				INSERT INTO persona
				(id, nombre, apellido, edad, pais, correo, password, username, tpersona)
				VALUES
				('$id', '$nombre', '$apellido', '$edad', '$pais', '$correo', '$password', '$username', '$tpersona')
				";
				$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Persona agregada exitosamente.
						  </div>';
				$this->executeSQuery();
			}
			else{
				$this->msj = '<div class="alert alert-warning">
  <strong>Peligro!</strong> La Persona que desea agregar ya existe.
</div>';
			}
		}
		else{
			$this->msj = '<div class="alert alert-danger">
  <strong>A ocurrido un error!</strong> no existe ninguna columna de la tabla Persona.
</div>';
		}
	}
	# Modificar una Persona
	public function edit($data=array()) {
		foreach ($data as $campo=>$valor) {
			$$campo = $valor;
		}
        
		$this->query = "
		UPDATE persona
		SET nombre='$id',
		apellido='$apellido',
		edad='$edad', 
		pais='$pais',
		correo='$correo',
        password='$password',
        username='$username',
		tpersona='$tpersona'
		WHERE id = '$id'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Persona modificada exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Eliminar una Persona
	public function delete($iid='') {
		$this->query = "
		DELETE FROM persona
		WHERE id = '$iid'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Persona eliminada exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Método constructor
	function __construct() {
		$this->db_name = 'persona';
	}

}
?>
