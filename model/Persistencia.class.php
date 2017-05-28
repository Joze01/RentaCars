<?php
	
	Class Persistencia{


		public function queryExecute($consult, $mensaje){	
		require('Conexion.php');
		$resultok="Completado Exitosamente: ".$mensaje;
		$resultno="Error, no se pudo completar: ".$consult;	
		$resultc = $db->query($consult);
		if($resultc){
			echo $resultok;
		}else{
			echo $resultno;
		}
					//Cerrar la conexión
		$db->close();
			
		}

		public function getResult($query){
						require('Conexion.php');
		   
						if ($result = $db->query($query)) {
							return $result;
			    			$result->free();
						}
						return $result;
					$db->close();
					}



		};

	


?>