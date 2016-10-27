<?php
	class UsuarioModel{
		private $servername = "127.0.0.1";
		private $database = "smartvillan";
		private $username = "root";
		private $password = "";
		private $con;

		public function __construct(){

		}

		private function conectar(){
			$this->con = new mysqli($this->servername,
									$this->username,
									$this->password,
									$this->database);
			if($this->con->connect_error){
				die("Falha ao conectar: " . mysqli_connect_error());
				return false;
			}
			$this->con->set_charset('utf8');
			return true;
		}

		function login($matricula){
				$user = null;
			if($this->conectar()){
				$sql = "SELECT * FROM usuario WHERE matricula=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("s", $matricula);
				$stmt->execute();
				$results = $stmt->get_result();
				if($results->num_rows > 0){
					while($row = $results->fetch_assoc()){
						$user = array();
						$user['matricula'] = $row['matricula'];
						$user['email'] = $row['email'];
						$user['nome'] = $row['nome'];
						$user['tipo'] = $row['tipo'];
					}
				}
				$stmt->close();
			}
			return $user;
		}

		//add-leilao
		public function add_usuario($nome, $matricula, $email, $tipo){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO usuario(nome, matricula, email, tipo)
					VALUES(?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("siss", $nome, $matricula, $email, $tipo);
				if($stmt->execute())
					$id = true;
				$stmt->close();
			}
			return $id;
		}

		//listagens
		public function listar_usuario(){
			$usuario = null;
			if($this->conectar()){
				$sql = "SELECT * FROM usuario";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$usuario = $stmt->get_result();
				$stmt->close();
			}
			return $usuario;
		}

		//atualizar
		public function atualizar_usuario($matricula){
			$usuario = null;
			if($this->conectar()){
				$sql = "SELECT * FROM usuario WHERE matricula=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $matricula);
				if($stmt->execute())
					$usuario = $stmt->get_result();
				$stmt->close();
			}
			return $usuario;
		}

		public function up_usuario($nome, $matricula, $email, $tipo){
			if($this->conectar()){
				$sql = "UPDATE usuario SET nome=?, email=?, tipo=? WHERE matricula=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("sssi", $nome, $email, $tipo, $matricula);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function deletar_usuario($id){
			$usuario = null;
			if($this->conectar()){
				$sql = "DELETE FROM usuario WHERE matricula=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$usuario = true;
				$stmt->close();
				}
			return $usuario;
		}

		public function add_animal($microchip, $brinco, $sexo, $data_de_nascimento, $data_de_compra, $especie, $nome, $raca, $altura, $grupo_genetico, $pelagem, $destinacao, $observacao, $animal_idmae, $animal_idpai, $usuario_matricula, $img){
			$id = null;
			echo $animal_idpai;
			echo $animal_idmae;
			if($this->conectar()){
				$sql = "INSERT INTO animal(microchip, brinco, sexo, data_de_nascimento, data_de_compra, especie, nome, raca, altura, grupo_genetico, pelagem, destinacao, observacao, animal_idmae, animal_idpai, usuario_matricula, img)
					VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("issssssssssssiiis", $microchip, $brinco, $sexo, $data_de_nascimento, $data_de_compra, $especie, $nome, $raca, $altura, $grupo_genetico, $pelagem, $destinacao, $observacao, $animal_idmae, $animal_idpai, $usuario_matricula, $img);
				if($stmt->execute())
					$id =  true;
				$stmt->close();
			}
			return $id;
		}


		public function add_peso($animal, $peso, $dt_pesagem){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO peso(animal_idanimal, peso, data_de_pesagem)
					VALUES(?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("iss", $animal, $peso, $dt_pesagem);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_peso($idanimal){
			$material = null;
			if($this->conectar()){
				$sql = "SELECT * FROM peso WHERE animal_idanimal=? ORDER BY data_de_pesagem DESC";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idanimal);
				if($stmt->execute())
					$material = $stmt->get_result();
				$stmt->close();
			}
			return $material;
		}

		public function listar_animal(){
			$material = null;
			if($this->conectar()){
				$sql = "SELECT * FROM animal";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$material = $stmt->get_result();
				$stmt->close();
			}
			return $material;
		}

		public function atualizar_animal($idanimal){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM Animal WHERE idanimal=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idanimal);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function filtrar_animal($especie, $sexo, $brinco){
			$categoria = null;
			if($this->conectar()){
				if($especie!=null) $sql = "SELECT * FROM animal WHERE especie=?";
				if($sexo!=null) $sql = "SELECT * FROM animal WHERE sexo=?";
				if($brinco!=null) $sql = "SELECT * FROM animal WHERE brinco=?";
				$stmt = $this->con->prepare($sql);
				if($especie!=null) $stmt->bind_param("s", $especie);
				if($sexo!=null) $stmt->bind_param("s", $sexo);
				if($brinco!=null) $stmt->bind_param("i", $brinco);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;	
		}

		public function contar_especie($especie){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM animal WHERE especie=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("s", $especie);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function contar_sexo($sexo){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM animal WHERE sexo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("s", $sexo);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}
		public function up_animal($idanimal, $microchip, $brinco, $sexo, $data_de_nascimento, $data_de_compra, $especie, $nome, $raca, $altura, $grupo_genetico, $pelagem, $destinacao, $observacao, $animal_idmae, $animal_idpai, $usuario_matricula, $img){
			$id = null;
			echo $animal_idpai;
			if($this->conectar()){
				$sql = "UPDATE animal SET microchip=?, brinco=?, sexo=?, data_de_nascimento=?, data_de_compra=?, especie=?, nome=?, raca=?, altura=?, grupo_genetico=?, pelagem=?, destinacao=?, observacao=?, animal_idmae=?, animal_idpai=?, usuario_matricula=?, img=? WHERE idanimal = ?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("issssssssssssiiisi", $microchip, $brinco, $sexo, $data_de_nascimento, $data_de_compra, $especie, $nome, $raca, $altura, $grupo_genetico, $pelagem, $destinacao, $observacao, $animal_idmae, $animal_idpai, $usuario_matricula, $img, $idanimal);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return $id;
		}


		public function deletar_animal($idanimal){
			if($this->conectar()){
				$sql = "DELETE FROM peso WHERE animal_idanimal=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idanimal);
				if($stmt->execute())
					$sql = "DELETE FROM animal WHERE idanimal=?";
					$stmt = $this->con->prepare($sql);
					$stmt->bind_param("i", $idanimal);
					if($stmt->execute())
						return true;
					$stmt->close();
				$stmt->close();
			}
			return false;
		}

		public function deletar_peso($idpeso){
			if($this->conectar()){
				$sql = "DELETE FROM peso WHERE idpeso=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idpeso);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}



		public function add_material($categoria, $descricao, $origem, $marca){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO Material(categoria_idcategoria, descricao, origem, marca)
					VALUES(?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("isss", $categoria, $descricao, $origem, $marca);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_material(){
			$material = null;
			if($this->conectar()){
				$sql = "SELECT * FROM material, categoria WHERE categoria_idcategoria=idcategoria";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$material = $stmt->get_result();
				$stmt->close();
			}
			return $material;
		}

		public function atualizar_material($id_material){
			$material = null;
			if($this->conectar()){
				$sql = "SELECT * FROM Material, Categoria WHERE idcategoria=categoria_idcategoria AND idmaterial=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_material);
				if($stmt->execute())
					$material = $stmt->get_result();
				$stmt->close();
			}
			return $material;
		}

		public function up_material($id_material, $categoria, $descricao, $origem, $marca){
			if($this->conectar()){
				$sql = "UPDATE Material SET categoria_idcategoria=?, descricao=?, origem=?, marca=? WHERE idmaterial=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("isssi", $categoria, $descricao, $origem, $marca, $id_material);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function deletar_material($id){
			if($this->conectar()){
				$sql = "DELETE FROM Material WHERE idmaterial=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function add_categoria($nome, $descricao){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO Categoria(nome, descricao_categoria)
					VALUES(?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ss", $nome, $descricao);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_categoria(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM Categoria";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function atualizar_categoria($id_categoria){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM Categoria WHERE idcategoria=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_categoria);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function up_categoria($id_categoria, $nome, $descricao){
			$categoria = null;
			if($this->conectar()){
				$sql = "UPDATE Categoria SET nome=?, descricao_categoria=? WHERE idcategoria=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ssi", $nome, $descricao, $id_categoria);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
		}


		public function deletar_categoria($id_categoria){
			if($this->conectar()){
				$sql = "DELETE FROM Categoria WHERE idcategoria=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_categoria);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function add_vacina($nome, $descricao, $destinacao){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO vacina(nome, descricao, destinacao)
					VALUES(?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("sss", $nome, $descricao, $destinacao);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_vacina(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM Vacina";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function atualizar_vacina($id_vacina){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM vacina WHERE idvacina=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_vacina);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function up_vacina($id_vacina, $nome, $descricao, $destinacao){
			$categoria = null;
			if($this->conectar()){
				$sql = "UPDATE vacina SET nome=?, descricao=?, destinacao=? WHERE idvacina=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("sssi", $nome, $descricao, $destinacao, $id_vacina);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
		}


		public function deletar_vacina($id_vacina){
			if($this->conectar()){
				$sql = "DELETE FROM vacina WHERE idvacina=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_vacina);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function agendar_vacinacao($animal_idanimal, $vacina_idvacina, $data){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO vacina_has_animal(animal_idanimal, vacina_idvacina, data)
					VALUES(?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("iis", $animal_idanimal, $vacina_idvacina, $data);
				if($stmt->execute())
					$id =  true;
				$stmt->close();
			}
			return $id;
		}

		public function listar_vacinacao(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT *, a.nome as animal FROM vacina_has_animal as va, animal as a, vacina as v  WHERE a.idanimal=va.animal_idanimal AND v.idvacina=va.vacina_idvacina";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function vacinacao($idanimal){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT *, a.nome as animal FROM vacina_has_animal as va, animal as a, vacina as v  WHERE a.idanimal=va.animal_idanimal AND v.idvacina=va.vacina_idvacina AND va.animal_idanimal=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idanimal);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function deletar_vacinacao($idvacinacao){
			if($this->conectar()){
				$sql = "DELETE FROM vacina_has_animal WHERE idvacinacao=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idvacinacao);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function add_leite($idanimal, $data, $quantidade){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO leite(animal_idanimal, data_de_ordenha, quantidade)
					VALUES(?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("iss", $idanimal, $data, $quantidade);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_leite(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM leite, animal WHERE idanimal=animal_idanimal";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function lactacao($idanimal){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM leite, animal WHERE idanimal=animal_idanimal AND animal_idanimal=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idanimal);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function atualizar_leite($id_leite){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM leite, animal WHERE animal_idanimal=idanimal AND idleite=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_leite);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function up_leite($id_leite, $idanimal, $data, $quantidade){
			$categoria = null;
			if($this->conectar()){
				$sql = "UPDATE leite SET animal_idanimal=?, data_de_ordenha=?, quantidade=? WHERE idleite=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("issi", $idanimal, $data, $quantidade, $id_leite);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
		}


		public function deletar_leite($id_leite){
			if($this->conectar()){
				$sql = "DELETE FROM Leite WHERE idleite=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id_leite);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}


		public function add_item($material, $validade, $dt_cadastro, $disponibilidade, $valor){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO item(material_idmaterial, validade, data_cadastro, disponibilidade, valor)
					VALUES(?, ?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("issis", $material, $validade, $dt_cadastro, $disponibilidade, $valor);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_item(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM material as m, item as i, categoria as c WHERE c.idcategoria = m.categoria_idcategoria AND m.idmaterial=i.material_idmaterial ORDER BY validade ASC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function puchar_item(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM categoria, material, saida, item WHERE idcategoria=categoria_idcategoria AND iditem=item_iditem AND idmaterial=material_idmaterial AND disponibilidade!=0 ORDER BY quantidade DESC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function up_quantidade($item, $quantidade, $tipo){
			if($this->conectar()){
				$sql = "SELECT * FROM item WHERE iditem=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $item);
				$stmt->execute();
				$quant = $stmt->get_result();
				$row = $quant->fetch_assoc();
				if($tipo=='saida')$quantidade = $row['disponibilidade']-$quantidade;
				if($tipo=='entrada')$quantidade = $row['disponibilidade']+$quantidade; 
				if($quantidade>=0){
				$sql = "UPDATE item SET disponibilidade=? WHERE iditem=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ii", $quantidade, $item);
				$stmt->execute();
				return true;
				}
			}
			return false;
		}

		public function atualizar_item($iditem){
			$item = null;
			if($this->conectar()){
				$sql = "SELECT * FROM material as m, item as i WHERE m.idmaterial=i.material_idmaterial AND i.iditem=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $iditem);
				if($stmt->execute())
					$item = $stmt->get_result();
				$stmt->close();
			}
			return $item;
		}

		public function up_item($iditem, $material, $validade, $dt_cadastro, $disponibilidade, $valor){
			if($this->conectar()){
				$sql = "UPDATE item SET material_idmaterial=?, validade=?, data_cadastro=?, valor=?, disponibilidade=? WHERE iditem=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("isssii", $material, $validade, $dt_cadastro, $valor, $disponibilidade, $iditem);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function deletar_item($iditem){
			if($this->conectar()){
				$sql = "DELETE FROM item WHERE iditem=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $iditem);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}


		public function add_saida($matricula, $data, $item, $quantidade){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO saida(data, usuario_matricula, item_iditem, quantidade)
					VALUES(?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("siii", $data, $matricula, $item, $quantidade);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_saida(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM saida, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula ORDER BY data DESC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function puchar_saida(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM saida, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula ORDER BY data DESC LIMIT 8";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function atualizar_saida($idsaida){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM saida, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula AND idsaida=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idsaida);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function up_saida($idsaida, $matricula, $data, $item, $quantidade){
			if($this->conectar()){
				$sql = "UPDATE saida SET data=?, usuario_matricula=?, item_iditem=?, quantidade=? WHERE idsaida=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("siiii", $data, $matricula, $item, $quantidade, $idsaida);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function deletar_saida($idsaida){
			if($this->conectar()){
				$sql = "DELETE FROM saida WHERE idsaida=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idsaida);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function add_entrada($matricula, $data, $item, $quantidade){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO entrada(data, usuario_matricula, item_iditem, quantidade)
					VALUES(?, ?, ?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("siii", $data, $matricula, $item, $quantidade);
				if($stmt->execute())
					$id =  $this->con->insert_id;
				$stmt->close();
			}
			return $id;
		}

		public function listar_entrada(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM entrada, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function puchar_entrada(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM entrada, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula LIMIT 8";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function atualizar_entrada($identrada){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM entrada, item, usuario WHERE item_iditem=iditem AND matricula=usuario_matricula AND identrada=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $identrada);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function up_entrada($identrada, $matricula, $data, $item, $quantidade){
			if($this->conectar()){
				$sql = "UPDATE entrada SET data=?, usuario_matricula=?, item_iditem=?, quantidade=? WHERE identrada=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("siiii", $data, $matricula, $item, $quantidade, $identrada);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function deletar_entrada($idsaida){
			if($this->conectar()){
				$sql = "DELETE FROM entrada WHERE identrada=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $idsaida);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function listar_estoque(){
			$categoria = null;
			if($this->conectar()){
				$sql = "SELECT * FROM material as m, item as i, categoria as c WHERE c.idcategoria = m.categoria_idcategoria AND m.idmaterial=i.material_idmaterial AND i.disponibilidade<>0 ORDER BY validade ASC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function filtrar_estoque($idcategoria, $idmaterial){
		$categoria = null;
			if($this->conectar()){
				if($idmaterial==0) $sql = "SELECT * FROM item as i, material as m, categoria as c WHERE c.idcategoria = m.categoria_idcategoria  AND i.disponibilidade<>0 AND i.material_idmaterial=m.idmaterial AND m.categoria_idcategoria=? ORDER BY validade ASC";
				else $sql = "SELECT * FROM item as i, material as m, categoria as c WHERE c.idcategoria = m.categoria_idcategoria  AND i.disponibilidade<>0  AND i.material_idmaterial=m.idmaterial AND i.material_idmaterial=? ORDER BY validade ASC";
				$stmt = $this->con->prepare($sql);
				if($idmaterial==0) $stmt->bind_param("i", $idcategoria);
				else $stmt->bind_param("i", $idmaterial);
				if($stmt->execute())
					$categoria = $stmt->get_result();
				$stmt->close();
			}
			return $categoria;
		}

		public function relatorio_material(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM categoria, material, saida, item WHERE idcategoria=categoria_idcategoria AND iditem=item_iditem AND idmaterial=material_idmaterial ORDER BY quantidade DESC, item_iditem ASC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function relatorio_estoque(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM categoria, material, item WHERE idcategoria=categoria_idcategoria AND idmaterial=material_idmaterial AND disponibilidade>0 ORDER BY disponibilidade DESC, iditem ASC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

		public function puchar_estoque(){
			$saida = null;
			if($this->conectar()){
				$sql = "SELECT * FROM material, item WHERE idmaterial=material_idmaterial AND disponibilidade>0 ORDER BY disponibilidade DESC";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$saida = $stmt->get_result();
				$stmt->close();
			}
			return $saida;
		}

	}

?>