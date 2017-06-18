<?php
Class Mascota{
	
	private $id;
	private $idUsuario;
	private $sexo;
	private $fechaNacimiento;
	private $urlLite;
	private $nombre;
	private $idMuroMascota;
	private $idRaza;
	private $idAnimal;

	function __construct($id, $idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal){
		$this->id = $id;
		$this->idUsuario = $idUsuario;
		$this->sexo = $sexo;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->urlLite = $urlLite;
		$this->nombre = $nombre;
		$this->idMuroMascota = $idMuroMascota;
		$this->idRaza = $idRaza;
		$this->idAnimal = $idAnimal;
	}


	public static function traerCitas($conexion, $desde, $cantidad){
		$output = array();
		$sql = "SELECT  M.nombre nombreMascota, U.nombre nombreUsuario
			FROM usuario U join mascota M on U.id_usuario=M.id_usuario join
				muro_mascota MM on MM.id_muro_mascota=M.id_muro_mascota 
			where MM.cita =  1
			limit ?,?";

		$stmt = $conexion->prepare($sql);

		mysqli_stmt_bind_param($stmt, "ii", $desde, $cantidad);

		mysqli_stmt_execute($stmt);
		$resultado = mysqli_get_result($stmt);

		while ($row = myqli_fetch_array($resultado)) {
			$output[] =$row;
		}
		
		return $output;								
	}
	
}

?>