<?php 
# Importar modelo de abstracción de base de datos
require_once('config/DBAbstractModel.php');
class AreaModel extends DBAbstractModel{
	public $edificio;
    public $aula;
	public $id;

	# Traer datos deL Area
	public function get($iid=''){
		if($iid != '') {
			$this->query = "
			SELECT *
			FROM area
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
  							<strong>Realizado!</strong> area encontrada.
						  </div>';

		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el area.
</div>';
		}
	}
	# Traer Lista
	public function getList(){
		$this->query = "
		SELECT *
		FROM area
		ORDER BY id ASC";

		$this->getResultQuery();

		$aux = "";
		if(count($this->rows) >= 1){
			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Area encontrada.
						  </div>';
			return $this->rows;
		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el area.
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
				INSERT INTO area
				(id, edificio, aula)
				VALUES
				('$id', '$edificio', '$aula')
				";

				$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Area agregada exitosamente.
						  </div>';
				$this->executeSQuery();
			}
			else{
				$this->msj = '<div class="alert alert-warning">
  <strong>Peligro!</strong> El area que desea agregar ya existe.
</div>';
			}
		}
		else{
			$this->msj = '<div class="alert alert-danger">
  <strong>A ocurrido un error!</strong> no existe ninguna columna de la tabla Area.
</div>';
		}
	}
	# Modificar el  Area
	public function edit($data=array()) {
		foreach ($data as $campo=>$valor) {
			$$campo = $valor;
		}


		$this->query = "
		UPDATE area
		SET edificio='$edificio',
        aula='$aula'
		WHERE id = '$id'
		";
		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Area modificada exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Eliminar el  Area
	public function delete($iid='') {
		$this->query = "
		DELETE FROM area
		WHERE id = '$iid'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Area elimminada exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Método constructor
	function __construct() {
		$this->db_name = 'Poo';
	}
}
?>