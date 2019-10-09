<?php 
# Importar modelo de abstracción de base de datos
require_once('config/DBAbstractModel.php');
class TipoRolModel extends DBAbstractModel{
	public $nombre;
    public $rol;
	public $id;

	# Traer datos de un tipo_rol
	public function get($iid=''){
		if($iid != '') {
			$this->query = "
			SELECT *
			FROM tipo_rol
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
  							<strong>Realizado!</strong> tipo_rol encontrado.
						  </div>';

		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el tipo_rol.
</div>';
		}
	}
	# Traer Lista
	public function getList(){
		$this->query = "
		SELECT *
		FROM tipo_rol
		ORDER BY id ASC";

		$this->getResultQuery();

		$aux = "";
		if(count($this->rows) >= 1){
			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> tipo_rol encontrado.
						  </div>';
			return $this->rows;
		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el tipo_rol.
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
				INSERT INTO tipo_rol
				(id, nombre)
				VALUES
				('$id', '$nombre')
				";

				$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> tipo_rol agregado exitosamente.
						  </div>';
				$this->executeSQuery();
			}
			else{
				$this->msj = '<div class="alert alert-warning">
  <strong>Peligro!</strong> el tipo_rol que desea agregar ya existe.
</div>';
			}
		}
		else{
			$this->msj = '<div class="alert alert-danger">
  <strong>No se a podido agregar!</strong> has dejado un valor en blanco.
</div>';
		}
	}
	# Modificar un tipo_rol
	public function edit($data=array()) {
		foreach ($data as $campo=>$valor) {
			$$campo = $valor;
		}


		$this->query = "
		UPDATE tipo_rol
		SET nombre='$nombre'
		WHERE id = '$id'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> tipo_rol modificado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Eliminar un tipo_rol
	public function delete($iid='') {
		$this->query = "
		DELETE FROM tipo_rol
		WHERE id = '$iid'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> tipo_rol eliminado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Método constructor
	function __construct() {
		$this->db_name = 'Poo';
	}
}
?>