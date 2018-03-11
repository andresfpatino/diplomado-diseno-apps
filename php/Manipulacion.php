<?php 
	class Manipulacion extends Conexion{		
		private $arreglonombres=[];
		private $arreglovalores=[];
		private $cadenanombres;
		private $cadenavalores;
		private $consulta;

		public $mitabla;

		public function __construct($s=NULL,$u=NULL,$c=NULL,$b=NULL){
			is_null($s) ? $s="localhost" : $s;
			is_null($u) ? $u="root" 	 : $u;
			is_null($c) ? $c="root" 	 : $c;
			is_null($b) ? $b="diplomado" : $b;

			parent::__construct($s,$u,$c,$b);
		}


		public function capturar(){
			
			foreach ($_POST as $nombres => $valores) {
				$this->arreglonombres[]=$nombres;
				$this->arreglovalores[]="'".$valores."'";

			}
			$this->cadenanombres=implode($this->arreglonombres,",");
			$this->cadenavalores=implode($this->arreglovalores,",");
			//echo $this->cadenanombres;
			// echo "<hr>";
			//echo $this->cadenavalores;
		}

		public function insertar(){
			$this->consulta="INSERT into ".$this->mitabla."(".$this->cadenanombres.") values (".$this->cadenavalores.")";
			
			// aqui se inserta el dato
			$this->conectar->query($this->consulta);
		
			//recuperar el id insertado
			$id=$this->conectar->insert_id;
			echo $id;
			$this->consulta="INSERT into nomina (`id_docente`) values ('".$id."'".")";
			$this->conectar->query($this->consulta);	
		}

		public function insertarE(){
				$this->consulta="INSERT into ".$this->mitabla."(".$this->cadenanombres.")values(".$this->cadenavalores.")";
				echo $this->consulta;
			// aqui se inserta el dato
			$this->conectar->query($this->consulta);
			//recuperar el id insertado
			$id=$this->conectar->insert_id;
			// este procedimiento es para la foto
			$rutaEnServidor='../images';
			$rutaTemporal=$_FILES['foto']['tmp_name'];
			$nombreImagen=$_FILES['foto']['name'];
			$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemporal, $rutaDestino);

			if ($_POST) {
			$this->consulta= "UPDATE estudiante set foto='".$rutaDestino."' where id_estudiante='".$id."'";
			$this->conectar->query($this->consulta);
			echo $this->consulta;
	
			}



			$this->consulta="INSERT INTO `notas`(`id_estudiante`, `n1`, `n2`, `n3`, `n4`) VALUES ($id,'0','0','0','0')";
			$this->conectar->query($this->consulta);
		}

		public function mostrar(){
			$this->consulta="SELECT  * from ".$this->mitabla;
			$resultado=$this->conectar->query($this->consulta);
			//traer el numero total de los registros
			$num_total_registros = $resultado->num_rows;
			echo "Total registros: $num_total_registros";
			// fetch array es el  apuntador a la base de datos

			//Limito la busqueda
			$TAMANO_PAGINA = 5;

			//examino la página a mostrar y el inicio del registro a mostrar
			//si no existe get pagina
			if (!isset($_GET["pagina"])) {
		   		$inicio = 0;
		   		$pagina = 1;
			}
			else {
				$pagina = $_GET["pagina"];
		   		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}
			//calculo el total de páginas
			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
			$this->consulta="SELECT  * from ".$this->mitabla." LIMIT ".$inicio."," . $TAMANO_PAGINA;
			$resultado=$this->conectar->query($this->consulta);

			echo "<table class='mitabla' border>";
			echo "<tr>
					<th>ID</th>
					<th>Cédula</th>
					<th>Nombre</th>
					<th>Ciudad</th>
					<th>Foto</th>
					<th>Eliminar</th>
					<th>Actualizar</th>
			      </tr>";

			while($registro=$resultado->fetch_array()){
				$a=$registro[0];
				$b=$registro[1];
				$c=$registro[2];
				$d=$registro[3];
				$e="<img src='images/".$registro[4]."' width=60>";

				echo "<tr>";
				echo "<td>$a</td>";
				echo "<td id='campoa$a' contenteditable>$b</td>";
				echo "<td id='campob$a' contenteditable>$c</td>";
				echo "<td id='campoc$a' contenteditable>$d</td>";
				echo "<td>$e</td>";
				echo "<td><a class='eli' href='php/eliminar.php?code=$a'>Eliminar</a></td>";
				echo "<td><a title='$a' class='actu' href='php/actualizar.php?code=$a'>Actualizar</a></td>";
				echo "</tr>";
			
			}

			echo "</table>";
			//devuelve EL NOMBRE DE LA PAGINA ACTUAL
			$url=$_SERVER['PHP_SELF'];

			if ($total_paginas > 1) {
   				if ($pagina != 1)
      			    echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="images/izq.gif" border="0"></a>';
      				for ($i=1;$i<=$total_paginas;$i++) {
         				if ($pagina == $i)
            			//si muestro el índice de la página actual, no coloco enlace
            				echo $pagina;
         				else
            				//si el índice no corresponde con la página mostrada actualmente,
            				//coloco el enlace para ir a esa página
            				echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
      				}
      				if ($pagina != $total_paginas)
         				echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="images/der.gif" border="0"></a>';
			}
		}

		public function eliminar($id){
			$this->consulta="DELETE from ".$this->mitabla. " WHERE id =".$id;
			$this->conectar->query($this->consulta) or die (mysqli_error());
			echo "Dato eliminado";

		}

		public function actualizar($a,$b,$c,$d){
			$this->consulta="UPDATE ".$this->mitabla. " set cedula='".$a."',nombre='".$b."',telefono='".$c."' where id='".$d."'";
			$this->conectar->query($this->consulta)or die(mysqli_error());
			echo "Dato actualizado..";
		}


		public function mostrarEperfil($id){
			$this->consulta="SELECT `id_estudiante`, `nombre`, `correo`, `grado`, `grupo`, `foto`, `estado` FROM $this->mitabla WHERE `id_estudiante`=$id";
			$resultado=$this->conectar->query($this->consulta);
			
			while($registro=$resultado->fetch_array()){
				$a=$registro[0];
				$b=$registro[1];
				$c=$registro[2];
				$d=$registro[3];
				$e=$registro[4];
				$f=$registro[5];
				$g=$registro[6];
				echo " <img class='circle' src='$f'>
                        <br>
                        <p style='text-align: center;margin-top: 15px;font-size: 20px;'>$b</p>
					  	<p style='font-weight: bold;' >$d-$e</p>
				";

			}

			$this->consulta="SELECT `id_notas`, `id_estudiante`, `n1`, `n2`, `n3`, `n4` FROM `notas` WHERE `id_estudiante` = $id";
			$resultado=$this->conectar->query($this->consulta);

			while($registro=$resultado->fetch_array()){
				$idn=$registro[0];
				$ide=$registro[1];
				$n1=$registro[2];
				$n2=$registro[3];
				$n3=$registro[4];
				$n4=$registro[5];
				
				echo "<table class='table table-striped table-hover'>";
				echo "  <thead>
                        	<tr>
                            	 <th colspan='4'><h4 style='text-align: center;'>Registro de notas</h4></th>
                            </tr>
                            <tr>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                 <th>Nota 4</th>
                            </tr>
                        </thead>";

				echo "
					<tbody>
						<tr>
					    	<td contenteditable id='n1'>$n1</td>
					    	<td contenteditable id='n2'>$n2</td>
					    	<td contenteditable id='n3'>$n3</td>
					    	<td contenteditable id='n4'>$n4</td>
						</tr>

						<tr>
	                        <td colspan='2'>
	                            <a href='actualizar.php?code=$ide'><button class='button btn btn-primary btn-block'>Editar</button></a>
	                        </td>
	                        <td colspan='2'>
	                            <button id='nfinal' class='button btn btn-primary btn-block'>Nota final</button>
	                        </td>
	                    </tr>

                    </tbody>

					";

					 echo "</table>";
			}


		}

		public function mostrarE(){

			$this->consulta="SELECT  * from ".$this->mitabla;
			$resultado=$this->conectar->query($this->consulta);
			while($registro=$resultado->fetch_array()){

				$a=$registro[0];
				$b=$registro[1];
				$c=$registro[2];
				$d=$registro[3];
				$e=$registro[4];
				$f=$registro[5];
				$g=$registro[6];


				echo "<a href='detalle-estudiante.php?code=$a'><div class='list-group-item'>
                    <div class='row-action-primary'>
                   	 <div class='row-picture'>
                		<img class='circle' src='$f' width='200px' height='200px'>
              		 </div>
                    </div>
                    <div class='row-content'>
                    <div class='action-secondary'><i class='fa fa-info-circle'></i></div>
                        <h4 class='list-group-item-heading'>$b</h4>
                        <p class='list-group-item-text'>$e</p>
                    </div>
                   </div><div class='list-group-separator'></div></a>";

			}

			
		}


		public function mostrarEgrupo(){
			echo "
				<a href='estudiantesCate.php?code=1&get=$this->grado' class='btn btn-default btn-lg btn-block btn-raised'>$this->grado-1</a>
				<a href='estudiantesCate.php?code=2&get=$this->grado' class='btn btn-default btn-lg btn-block btn-raised'>$this->grado-2</a>
				<a href='estudiantesCate.php?code=3&get=$this->grado' class='btn btn-default btn-lg btn-block btn-raised'>$this->grado-3</a>
			";
			

		}

		public function mostararEcate($grupo,$grado){

			$this->consulta="SELECT `id_estudiante`, `nombre`, `correo`, `grado`, `grupo`, `foto`, `estado` FROM $this->mitabla WHERE `grupo`=$grupo and `grado`=$grado";
			$resultado=$this->conectar->query($this->consulta);

			

			while($registro=$resultado->fetch_array()){
				$a=$registro[0];
				$b=$registro[1];
				$c=$registro[2];
				$d=$registro[3];
				$e=$registro[4];
				$f=$registro[5];
				$g=$registro[6];
				

				echo "<a href='detalle-estudiante.php?code=$a'><div class='list-group-item'>
                    <div class='row-action-primary'>
                   	 <div class='row-picture'>
                		<img class='circle' src='$f' width='50px' height='50px'>
              		 </div>
                    </div>
                    <div class='row-content'>
                    <div class='action-secondary'><i class='fa fa-info-circle'></i></div>
                        <h4 class='list-group-item-heading'>$b</h4>
                        <p class='list-group-item-text'>$d-$e</p>
                    </div>
                   </div><div class='list-group-separator'></div></a>";
			}

		}



	}
 ?>