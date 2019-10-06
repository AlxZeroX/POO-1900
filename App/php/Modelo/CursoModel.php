<?php 
# Importar modelo de abstracción de base de datos
require_once('config/DBAbstractModel.php');
class CursoModel extends DBAbstractModel{
	public $nombre;
    public $duracion;
	public $id;

	# Traer datos de un curso
	public function get($iid=''){
		if($iid != '') {
			$this->query = "
			SELECT *
			FROM cursos
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
  							<strong>Realizado!</strong> curso encontrado.
						  </div>';

		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el curso.
</div>';
		}
	}
	# Traer Lista
	public function getList(){
		$this->query = "
		SELECT *
		FROM cursos
		ORDER BY id ASC";

		$this->getResultQuery();

		$aux = "";
		if(count($this->rows) >= 1){
			$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> curso encontrada.
						  </div>';
			return $this->rows;
		}
		else{
			$this->msj = '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>A ocurrido un error!</strong> no se encuentra el curso.
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
				INSERT INTO cursos
				(id, nombre)
				VALUES
				('$id', '$nombre','$duracion')
				";


				$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> curso agregado exitosamente.
						  </div>';
				$this->executeSQuery();
			}
			else{
				$this->msj = '<div class="alert alert-warning">
  <strong>Peligro!</strong> el curso que desea agregar ya existe.
</div>';
			}
		}
		else{
			$this->msj = '<div class="alert alert-danger">
  <strong>No se a podido agregar!</strong> has dejado un valor en blanco.
</div>';
		}
	}
	# Modificar un curso.
	public function edit($data=array()) {
		foreach ($data as $campo=>$valor) {
			$$campo = $valor;
		}


		$this->query = "
		UPDATE cursos
		SET nombre='$nombre',
        SET duracion='$duracion'
		WHERE id = '$id'
		";

		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> curso modificado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Eliminar una curso.
	public function delete($iid='') {
		$this->query = "
		DELETE FROM cursos
		WHERE id = '$iid'
		";
		$this->msj = '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Realizado!</strong> curso eliminado exitosamente.
						  </div>';
		$this->executeSQuery();
	}
	# Método constructor
	function __construct() {
		$this->db_name = 'Poo';
	}
}
?>