<?php

	namespace app\controllers;
	use app\models\mainModel;

	class companyController extends mainModel{

		/*----------  Controlador registrar empresa  ----------*/
		public function registrarEmpresaControlador(){

			# Almacenando datos#
		    $nombre=$this->limpiarCadena($_POST['empresa_nombre']);

		    $telefono=$this->limpiarCadena($_POST['empresa_telefono']);
		    $email=$this->limpiarCadena($_POST['empresa_email']);

		    $direccion=$this->limpiarCadena($_POST['empresa_direccion']);

		    # Verificando campos obligatorios #
            if($nombre==""){
            	$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"No has llenado todos los campos obligatorios.",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
            }

            # Verificando integridad de los datos #
		    if($this->verificarDatos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ., ]{4,85}",$nombre)){
		    	$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"El NOMBRE no coincide con el formato solicitado.",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
		    }

		    if($telefono!=""){
		    	if($this->verificarDatos("[0-9()+]{8,20}",$telefono)){
			    	$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"El TELÉFONO no coincide con el formato solicitado.",
						"icono"=>"error"
					];
					return json_encode($alerta);
			        exit();
			    }
		    }

		    if($direccion!=""){
		    	if($this->verificarDatos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,97}",$direccion)){
			    	$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"La DIRECCIÓN no coincide con el formato solicitado.",
						"icono"=>"error"
					];
					return json_encode($alerta);
			        exit();
			    }
		    }

		    # Verificando email #
		    if($email!=""){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"Ha ingresado un correo electrónico no válido.",
						"icono"=>"error"
					];
					return json_encode($alerta);
					exit();
				}
            }

            $empresa_datos_reg=[
				[
					"campo_nombre"=>"empresa_nombre",
					"campo_marcador"=>":Nombre",
					"campo_valor"=>$nombre
				],
				[
					"campo_nombre"=>"empresa_telefono",
					"campo_marcador"=>":Telefono",
					"campo_valor"=>$telefono
				],
				[
					"campo_nombre"=>"empresa_email",
					"campo_marcador"=>":Email",
					"campo_valor"=>$email
				],
				[
					"campo_nombre"=>"empresa_direccion",
					"campo_marcador"=>":Direccion",
					"campo_valor"=>$direccion
				]
			];

			$registrar_empresa=$this->guardarDatos("empresa",$empresa_datos_reg);

			if($registrar_empresa->rowCount()==1){
				$alerta=[
					"tipo"=>"recargar",
					"titulo"=>"EMPRESA REGISTRADA",
					"texto"=>"Los datos de la empresa se han registrado con éxito.",
					"icono"=>"success"
				];
			}else{
				$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"No se pudo registrar los datos de la empresa, por favor inténtelo de nuevo.",
					"icono"=>"error"
				];
			}

			return json_encode($alerta);
		}


		/*----------  Controlador actualizar empresa  ----------*/
		public function actualizarEmpresaControlador(){

			$id=$this->limpiarCadena($_POST['empresa_id']);

			# Verificando empresa #
		    $datos=$this->ejecutarConsulta("SELECT * FROM empresa WHERE empresa_id='$id'");
		    if($datos->rowCount()<=0){
		        $alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"No hemos encontrado la empresa en el sistema.",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
		    }else{
		    	$datos=$datos->fetch();
		    }

		    # Almacenando datos#
		    $nombre=$this->limpiarCadena($_POST['empresa_nombre']);

		    $telefono=$this->limpiarCadena($_POST['empresa_telefono']);
		    $email=$this->limpiarCadena($_POST['empresa_email']);

		    $direccion=$this->limpiarCadena($_POST['empresa_direccion']);

		    # Verificando campos obligatorios #
            if($nombre==""){
            	$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"No has llenado todos los campos obligatorios.",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
            }

            # Verificando integridad de los datos #
		    if($this->verificarDatos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ., ]{4,85}",$nombre)){
		    	$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"El NOMBRE no coincide con el formato solicitado.",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
		    }

		    if($telefono!=""){
		    	if($this->verificarDatos("[0-9()+]{8,20}",$telefono)){
			    	$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"El TELÉFONO no coincide con el formato solicitado.",
						"icono"=>"error"
					];
					return json_encode($alerta);
			        exit();
			    }
		    }

		    if($direccion!=""){
		    	if($this->verificarDatos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,97}",$direccion)){
			    	$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"La DIRECCIÓN no coincide con el formato solicitado.",
						"icono"=>"error"
					];
					return json_encode($alerta);
			        exit();
			    }
		    }

		    # Verificando email #
		    if($email!=""){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$alerta=[
						"tipo"=>"simple",
						"titulo"=>"HA OCURRIDO UN ERROR",
						"texto"=>"Ha ingresado un correo electrónico no válido.",
						"icono"=>"error"
					];
					return json_encode($alerta);
					exit();
				}
            }

            $empresa_datos_up=[
				[
					"campo_nombre"=>"empresa_nombre",
					"campo_marcador"=>":Nombre",
					"campo_valor"=>$nombre
				],
				[
					"campo_nombre"=>"empresa_telefono",
					"campo_marcador"=>":Telefono",
					"campo_valor"=>$telefono
				],
				[
					"campo_nombre"=>"empresa_email",
					"campo_marcador"=>":Email",
					"campo_valor"=>$email
				],
				[
					"campo_nombre"=>"empresa_direccion",
					"campo_marcador"=>":Direccion",
					"campo_valor"=>$direccion
				]
			];

			$condicion=[
				"condicion_campo"=>"empresa_id",
				"condicion_marcador"=>":ID",
				"condicion_valor"=>$id
			];

			if($this->actualizarDatos("empresa",$empresa_datos_up,$condicion)){
				$alerta=[
					"tipo"=>"recargar",
					"titulo"=>"EMPRESA ACTUALIZADA",
					"texto"=>"Los datos de la empresa se han actualizado correctamente.",
					"icono"=>"success"
				];
			}else{
				$alerta=[
					"tipo"=>"simple",
					"titulo"=>"HA OCURRIDO UN ERROR",
					"texto"=>"No hemos podido actualizar los datos de la empresa, por favor inténtelo de nuevo.",
					"icono"=>"error"
				];
			}

			return json_encode($alerta);
		}

	}