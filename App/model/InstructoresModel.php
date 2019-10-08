<?php 
# Importar modelo de abstracción de base de datos
require_once('config/DBAbstractModel.php');
class InstructoresModel extends DBAbstractModel{
	public $curso_id;
	public $instructor_id;

	# Traer datos de un Instructor
	public function get($ai='',$bi=''){
		if($ai != '' && $bi != '') {
			$this->query = "
			SELECT *
			FROM instructores
			WHERE instructor_id = '$ai' AND curso_id= '$bi'
			";
			$this->getResultQuery();
		}
		if(count($this->rows) == 1){
			foreach ($this->rows[0] as $campo=>$valor) {
				$this->$campo = $valor;
			}

			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Instructor encontrado.
						  </div>';

		}
		else{
			$this->msj = 'instructor no encontrada';
		}
	}
	# Traer Lista
	public function getList(){
		$this->query = "
		SELECT *
		FROM instructores
		ORDER BY instructor_id ASC";

		$this->getResultQuery();

		$aux = "";
		if(count($this->rows) >= 1){
			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Instructor encontrado.
						  </div>';
			return $this->rows;
		}
		else{
			$this->msj = 'Instructor no encontrada';
		}
		return array();
	}

	public function set($data=array()){
		if($data['instructor_id']!=null && $data['curso_id']!=null){
			$this->get($data['instructor_id']);
			$this->get($data['curso_id']);
			if(($data['instructor_id'] != $this->instructor_id) && ($data['curso_id'] != $this->curso_id)) {
				foreach ($data as $campo=>$valor) {
					$$campo = $valor;
				}

				$this->query = "
				INSERT INTO instructores
				(instructor_id, curso_id)
				VALUES
				('$instructor_id', '$curso_id')
				";
				$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Instructor Agregado exitosamente.
						  </div>';
				$this->executeSQuery();
			}
			else{
				$this->msj = 'El Instructor ya existe';
			}
		}
		else{
			$this->msj = 'No se ha agregado el Instructor';
		}
	}
	# Modificar Instructor
	public function edit($data=array()) {
		foreach ($data as $campo=>$valor) {
			$$campo = $valor;
		}


		$this->query = "
		UPDATE instructores
		SET instructor_id='$instructor_id'
		WHERE curso_id = '$curso_id'
		";
		$this->executeSQuery();

		$this->query = "
		UPDATE instructores
		SET instructor_id='$instructor_id'
		WHERE curso_id = '$curso_id'
		";
		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Instructor Modificado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Eliminar Instructor
	public function delete($ida='',$idba='') {
		$this->query = "
		DELETE FROM instructores
		WHERE instructor_id = '$ida' AND curso_id = '$idba'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> Instructor Eliminado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Método constructor
	function __construct() {
		$this->db_name = 'Poo';
	}
}
?>