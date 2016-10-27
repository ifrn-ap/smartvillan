<?php
	require_once 'modelo.php';

	class Controlador{
		private $userModel;
		public function __construct(){
			$this->userModel = new UsuarioModel();
		}

		// efetuar login
		function login(){
			$resp = $this->userModel->login($_POST['matricula']);
			return $resp;
		}

		function checkLogin(){
			if(!isset($_SESSION['user'])){
				header('Location: index.php');
			}
		}

		function logout(){
			$_SESSION['user'] = null;
			session_destroy();
			header('Location: index.php');
		}

		//forumalario de cadastro
		function add_painel(){
			$row['material'] = $this->userModel->listar_material()->num_rows;
			$row['item'] = $this->userModel->listar_item()->num_rows;
			$row['Entrada'] = $this->userModel->listar_entrada()->num_rows;
			$row['saida'] = $this->userModel->listar_saida()->num_rows;
			include 'views/painel.php';
		}

		function listar_estoque(){
			$_POST['categoria'] = $this->userModel->listar_categoria();
			$_POST['material'] = $this->userModel->listar_material();
			$_POST['estoque'] = $this->userModel->listar_estoque();
			include 'views/estoque.php';
		}

		function filtrar_estoque(){
			$_POST['estoque'] = $this->userModel->filtrar_estoque($_POST['categoria'], $_POST['material']);
			$_POST['categoria'] = $this->userModel->listar_categoria();
			$_POST['material'] = $this->userModel->listar_material();
			include 'views/estoque.php';
		}
		//Chamando formulario de cadastro
		function cadastrar_usuario(){
			require_once 'views/form_usuario.php';
		}		
		//Chamando formulario de cadastro
		function perfil_usuario(){
			require_once 'views/perfil_usuario.php';
		}
		//Adicionado
 		function add_usuario(){
 			//USAR LDAP
			$id = $this->userModel->add_usuario($_POST['nome'], $_POST['matricula'], $_POST['email'], $_POST['tipo']);
			if($id) $_SESSION['mensagem']='success/Usuario cadastrado com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao cadastrar tente novamente!';
			header("Location: views.php?acao=cadastrar-usuario");		
		}
		//Listagens
		function listar_usuario(){
			$_POST['usuario'] = $this->userModel->listar_usuario();
			include_once 'views/table_usuario.php';
		}
		//Chamando formulario de atualização
		function atualizar_usuario(){
			$_POST['usuario'] = $this->userModel->atualizar_usuario($_GET['id']);
			$row = $_POST['usuario']->fetch_assoc();
			require_once 'views/form_usuario.php';
		}
		//Atualizando
		function up_usuario(){
			$id = $this->userModel->up_usuario($_POST['nome'], $_POST['matricula'], $_POST['email'], $_POST['tipo']);
			if($id) $_SESSION['mensagem']='success/Dados do usuario atualizados com sucesso!';
			else $_SESSION['mensagem']='danger/Erro ao atualizar os dados do usuario!';
			if($_POST['header']=='pefil') header("Location: views.php?acao=perfil-usuario");
			else header("Location: views.php?acao=listar-usuario");
		}
		//Deletando
		function deletar_usuario(){
			$id = $this->userModel->deletar_usuario($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Usuario deletado com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao deletar usuario';
			header("Location: views.php?acao=listar-usuario");
		}
											//Animal
		//Chamando formulario de cadastro
		function cadastrar_animal(){
			$_POST['mae']=$this->userModel->listar_animal();
			$_POST['pai']=$this->userModel->listar_animal();
			require_once 'views/form_animal.php';
		}
		//adicionar no banco de dados
		function add_peso(){
			$id = $this->userModel->add_peso($_POST['animal'], $_POST['peso'], $_POST['dt_pesagem'], $_POST['disponibilidade'], $_POST['valor']);
			if($id) $_SESSION['mensagem']='success/Pesagem feita com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao realizar a pesagem item, tente novamente!';
			header("Location: views.php?acao=listar-animal");
		}
		//Adicionado
 		function add_animal(){
 			$_POST['img_caminho'] = 'img/'.$_FILES['img']['name'];	
			move_uploaded_file($_FILES['img']['tmp_name'], $_POST['img_caminho']);

			
 			if($_POST['idpai']==0) $_POST['idpai']=null;
 			if($_POST['idmae']==0) $_POST['idmae']=null;
			$id = $this->userModel->add_animal($_POST['microchip'], $_POST['brinco'], $_POST['sexo'], $_POST['data_de_nascimento'], $_POST['data_de_compra'], $_POST['especie'], $_POST['nome'], $_POST['raca'], $_POST['altura'], $_POST['grupo_genetico'], $_POST['pelagem'], $_POST['destinacao'], $_POST['observacao'], $_POST['idmae'], $_POST['idpai'], $_SESSION['user']['matricula'], $_POST['img_caminho']);
			if($id) $_SESSION['mensagem']='success/Animal cadastrado com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao cadastrar o animal tente novamente!';
			header("Location: views.php?acao=cadastrar-animal");		
		}	
		//Listagens
		function listar_animal(){
			$_POST['animal'] = $this->userModel->listar_animal();
			include_once 'views/table_animal.php';
		}

		function filtrar_animal(){
			$_POST['animal'] = $this->userModel->filtrar_animal($_POST['especie'], $_POST['sexo'], $_POST['brinco']);
			include_once 'views/table_animal.php';
		}
		//Chamando formulario de atualização
		function perfil_animal(){
			$_POST['animal'] = $this->userModel->atualizar_animal($_GET['id']);
			$row = $_POST['animal']->fetch_assoc();
			$_POST['pai'] = $this->userModel->atualizar_animal($row['animal_idpai']);
			$pai = $_POST['pai']->fetch_assoc();
			$row['nome_pai'] = $pai['nome'];
			$_POST['mae'] = $this->userModel->atualizar_animal($row['animal_idmae']);
			$mae = $_POST['mae']->fetch_assoc();
			$row['nome_mae'] = $mae['nome'];
			$_POST['peso'] = $this->userModel->listar_peso($_GET['id']);
			$_POST['vacina'] = $this->userModel->vacinacao($_GET['id']);
			$_POST['leite'] = $this->userModel->lactacao($_GET['id']);
			require_once 'views/perfil_animal.php';
		}

		function listar_peso(){
			$peso = $this->userModel->listar_peso($_GET['id']);
			return $peso;
		}

		function atualizar_animal(){
			$_POST['animal'] = $this->userModel->atualizar_animal($_GET['id']);
			$row = $_POST['animal']->fetch_assoc();
			$_POST['pai'] = $this->userModel->atualizar_animal($row['animal_idpai']);
			$pai = $_POST['pai']->fetch_assoc();
			$row['nome_pai'] = $pai['nome'];
			$_POST['mae'] = $this->userModel->atualizar_animal($row['animal_idmae']);
			$mae = $_POST['mae']->fetch_assoc();
			$row['nome_mae'] = $mae['nome'];
			$_POST['mae']=$this->userModel->listar_animal();
			$_POST['pai']=$this->userModel->listar_animal();
			require_once 'views/form_animal.php';
		}

		function deletar_peso(){
			$id = $this->userModel->deletar_peso($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Pesagem apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa pesagem tente novamente!';
			$caminho = 'views.php?id='.$_GET['perfil'].'&acao=perfil-animal';
			header("Location: ".$caminho);	
		}

		 function up_animal(){
		 	if($_POST['idpai']==0) $_POST['idpai']=null;
 			if($_POST['idmae']==0) $_POST['idmae']=null;
		 	if($_FILES['img']['name']!=null){
    			$_POST['img_caminho'] = 'img/'.$_FILES['img']['name'];	
				move_uploaded_file($_FILES['img']['tmp_name'], $_POST['img_caminho']);
			}else{
				$_POST['img_caminho'] = $_POST['imagem'];
			}
			$id = $this->userModel->up_animal($_POST['idanimal'], $_POST['microchip'], $_POST['brinco'], $_POST['sexo'], $_POST['data_de_nascimento'], $_POST['data_de_compra'], $_POST['especie'], $_POST['nome'], $_POST['raca'], $_POST['altura'], $_POST['grupo_genetico'], $_POST['pelagem'], $_POST['destinacao'], $_POST['observacao'], $_POST['idmae'], $_POST['idpai'], $_SESSION['user']['matricula'], $_POST['img_caminho']);
			if($id) $_SESSION['mensagem']='success/Dados do animal atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar os dado do animal tente novamente!';
			$caminho = 'views.php?id='.$_POST['idanimal'].'&acao=perfil-animal';
			header("Location: ".$caminho);		
		}

		function deletar_animal(){
			$id = $this->userModel->deletar_animal($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Animal deletado com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao deletar animal';
			header("Location: views.php?acao=listar-animal");
		}

		function contar_especie($especie){
			$_POST['especie'] = $this->userModel->contar_especie($especie);
			$especie = $_POST['especie']->num_rows;
			return $especie;
		}

		function contar_sexo($sexo){
			$_POST['sexo'] = $this->userModel->contar_sexo($sexo);
			$sexo = $_POST['sexo']->num_rows;
			return $sexo;
		}		
										//Categoria
		//forumalario de cadastro
		function cadastrar_categoria(){
			include 'views/form_categoria.php';
		}
		//tabela de listagem
		function listar_categoria(){
			$_POST['categoria'] = $this->userModel->listar_categoria();
			include 'views/table_categoria.php';
		}
		//adicionar ao banco de dados
		function add_categoria(){
			$id = $this->userModel->add_categoria($_POST['nome'], $_POST['descricao']);
			if($id) $_SESSION['mensagem']='success/Categoria cadastrada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao cadastrar tente novamente!';
			header("Location: views.php?acao=cadastrar-categoria");	
		}
		//formulario de atualização
		function atualizar_categoria(){
			$_POST['categoria'] = $this->userModel->atualizar_categoria($_GET['id']);
			$row = $_POST['categoria']->fetch_assoc();
			include 'views/form_categoria.php';
		}
		//atualizando
		function up_categoria(){
			$id = $this->userModel->up_categoria($_POST['id_categoria'], $_POST['nome'], $_POST['descricao']);
			if($id) $_SESSION['mensagem']='success/Dados da categoria atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados da categoria, tente novamente!';
			header("Location: views.php?acao=listar-categoria");	
		}		
		//deletar
		function deletar_categoria(){
			$id = $this->userModel->deletar_categoria($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Categoria apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa categoria tente novamente!';
			header("Location: views.php?acao=listar-categoria");	
		}
		//leite
		//forumalario de cadastro
		function cadastrar_leite(){
			$_POST['animal'] = $this->userModel->contar_sexo('Femea');
			include 'views/form_leite.php';
		}
		//tabela de listagem
		function listar_leite(){
			$_POST['leite'] = $this->userModel->listar_leite();
			include 'views/table_leite.php';
		}
		//
		function lactacao(){
			$_POST['leite'] = $this->userModel->listar_leite();
			$leite = $_POST['leite'];
			return $leite;
		}
		//adicionar ao banco de dados
		function add_leite(){
			$id = $this->userModel->add_leite($_POST['animal'], $_POST['data'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Ordenha registrada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao registra essa ordenha tente novamente!';
			header("Location: views.php?acao=cadastrar-leite");	
		}
		//formulario de atualização
		function atualizar_leite(){
			$_POST['animal'] = $this->userModel->contar_sexo('Femea');
			$_POST['leite'] = $this->userModel->atualizar_leite($_GET['id']);
			$row = $_POST['leite']->fetch_assoc();
			include 'views/form_leite.php';
		}
		//atualizando
		function up_leite(){
			$id = $this->userModel->up_leite($_POST['idleite'], $_POST['animal'], $_POST['data'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Dados da leite atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados da ordenha, tente novamente!';
			header("Location: views.php?acao=listar-leite");	
		}		
		//deletar
		function deletar_leite(){
			$id = $this->userModel->deletar_leite($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Ordenha apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa ordenha tente novamente!';
			if(isset($_GET['perfil'])){
			$caminho = 'views.php?id='.$_GET['perfil'].'&acao=perfil-animal';
			header("Location: ".$caminho);
			}else{	
			header("Location: views.php?acao=listar-leite");
			}	
		}


										//Vacina
		//forumalario de cadastro
		function cadastrar_vacina(){
			include 'views/form_vacina.php';
		}
		//tabela de listagem
		function listar_vacina(){
			$_POST['vacina'] = $this->userModel->listar_vacina();
			include 'views/table_vacina.php';
		}
		//mostrar vacina
		function mostrar_calendario(){
			$_POST['vacinacao'] = $this->userModel->listar_vacinacao();
			$_POST['ordenha'] = $this->userModel->listar_leite();
			include 'views/calendario.php';
		}
		//
		function deletar_vacina(){
			$id = $this->userModel->deletar_vacina($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Vacina apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagarr essa vacinação tente novamente!';
			header("Location: views.php?acao=listar-vacina");
		}
		//adicionar ao banco de dados
		function add_vacina(){
			$id = $this->userModel->add_vacina($_POST['nome'], $_POST['descricao'], $_POST['destinacao']);
			if($id) $_SESSION['mensagem']='success/Vacina agendada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao agendar tente novamente!';
			header("Location: views.php?acao=cadastrar-vacina");	
		}
		//formulario de atualização
		function atualizar_vacina(){
			$_POST['vacina'] = $this->userModel->atualizar_vacina($_GET['id']);
			$row = $_POST['vacina']->fetch_assoc();
			include 'views/form_vacina.php';
		}
		//atualizando
		function up_vacina(){
			$id = $this->userModel->up_vacina($_POST['id_vacina'], $_POST['nome'], $_POST['descricao'], $_POST['destinacao']);
			if($id) $_SESSION['mensagem']='success/Dados da vacina atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados da vacina, tente novamente!';
			header("Location: views.php?acao=listar-vacina");	
		}		
		//deletar
		function deletar_vacinacao(){
			$id = $this->userModel->deletar_vacinacao($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Vacinação deletada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao deletar essa vacinação tente novamente!';
			if(isset($_GET['perfil'])){
			$caminho = 'views.php?id='.$_GET['perfil'].'&acao=perfil-animal';
			header("Location: ".$caminho);
			}else{	
			header("Location: views.php?acao=listar-vacinacao");	
			}
		}

		function agendar_vacinacao(){
			$_POST['animal'] = $this->userModel->listar_animal();
			$_POST['vacina'] = $this->userModel->listar_vacina();
			include 'views/form_vacinacao.php';
		}
		//adicionar no banco de dados
		function add_vacinacao(){
			$id = $this->userModel->agendar_vacinacao($_POST['animal'], $_POST['vacina'], $_POST['data']);
			if($id) $_SESSION['mensagem']='success/Vacinação agendada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao agendar vacincao, tente novamente!';
			header("Location: views.php?acao=agendar-vacinacao");
		}

		//mostrar vacina
		function listar_vacinacao(){
			$_POST['vacinacao'] = $this->userModel->listar_vacinacao();
			include 'views/table_vacinacao.php';
		}


											//Material
		//forumalario de cadastro
		function cadastrar_material(){
			$_POST['categoria'] = $this->userModel->listar_categoria();
			include 'views/form_material.php';
		}
		//listando
		function listar_material(){
			$_POST['material'] = $this->userModel->listar_material();
			include_once 'views/table_material.php';
		}
		//adicionar no banco de dados
		function add_material(){
			$id = $this->userModel->add_material($_POST['categoria'], $_POST['descricao'], $_POST['origem'], $_POST['marca']);
			if($id) $_SESSION['mensagem']='success/Material cadastrada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao cadastrar material, tente novamente!';
			header("Location: views.php?acao=cadastrar-material");
		}
		//formulario de atualização
		function atualizar_material(){
			$_POST['categoria'] = $this->userModel->listar_categoria();
			$_POST['material'] = $this->userModel->atualizar_material($_GET['id']);
			$row = $_POST['material']->fetch_assoc();
			include 'views/form_material.php';
		}
		//adicionar no banco de dados
		function up_material(){
			$id = $this->userModel->up_material($_POST['idmaterial'], $_POST['categoria'], $_POST['descricao'], $_POST['origem'], $_POST['marca']);
			if($id) $_SESSION['mensagem']='success/Dados do material atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados do material, tente novamente!';
			header("Location: views.php?acao=listar-material");
		}


		function deletar_material(){
			$id = $this->userModel->deletar_material($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Matrial apagado com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa material tente novamente!';
			header("Location: views.php?acao=listar-material");
		}


											//item
		//forumalario de cadastro
		function cadastrar_item(){
			$_POST['material'] = $this->userModel->listar_material();
			include 'views/form_item.php';
		}
		//listando
		function listar_item(){
			$_POST['item'] = $this->userModel->listar_item();
			include_once 'views/table_item.php';
		}
		//listando
		function puchar_item(){
			$_POST['item'] = $this->userModel->puchar_item();
			$item = $_POST['item'];
			return $item;
		}		
		//listando
		function puchar_estoque(){
			$_POST['item'] = $this->userModel->puchar_estoque();
			$item = $_POST['item'];
			return $item;
		}
		//adicionar no banco de dados
		function add_item(){
			$id = $this->userModel->add_item($_POST['material'], $_POST['validade'], $_POST['dt_cadastro'], $_POST['disponibilidade'], $_POST['valor']);
			if($id) $_SESSION['mensagem']='success/Item cadastrada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao cadastrar item, tente novamente!';
			header("Location: views.php?acao=cadastrar-item");
		}
		//formulario de atualização
		function atualizar_item(){
			$_POST['material'] = $this->userModel->listar_material();
			$_POST['item'] = $this->userModel->atualizar_item($_GET['id']);
			$row = $_POST['item']->fetch_assoc();
			include 'views/form_item.php';
		}
		//adicionar no banco de dados
		function up_item(){
			$id = $this->userModel->up_item($_POST['iditem'], $_POST['material'], $_POST['validade'], $_POST['dt_cadastro'], $_POST['disponibilidade'], $_POST['valor']);
			if($id) $_SESSION['mensagem']='success/Dados do material atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados do material, tente novamente!';
			header("Location: views.php?acao=listar-item");
		}
		//deletar
		function deletar_item(){
			$id = $this->userModel->deletar_item($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Item apagado com sucesso';
			else $_SESSION['mensagem']='danger/Item ao apagar essa material tente novamente!';
			header("Location: views.php?acao=listar-item");
		}


										//saida
		//listando
		function listar_saida(){
			$_POST['saida'] = $this->userModel->listar_saida();
			include_once 'views/table_saida.php';
		}
		//adicionar no banco de dados
		function add_saida(){
			$id = $this->userModel->up_quantidade($_POST['item'], $_POST['quantidade'], 'saida');
			if($id) $id = $this->userModel->add_saida($_SESSION['user']['matricula'], $_POST['dt_cadastro'], $_POST['item'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Retirada realizada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao realizar essa retirada, tente novamente!';
			header("Location: views.php?acao=listar-estoque");
		}
		//formulario de atualização
		function atualizar_saida(){
			$_POST['item'] = $this->userModel->listar_item();
			$_POST['saida'] = $this->userModel->atualizar_saida($_GET['id']);
			$row = $_POST['saida']->fetch_assoc();
			include 'views/form_saida.php';
		}
		//adicionar no banco de dados
		function up_saida(){
			$id = $this->userModel->up_saida($_POST['idsaida'], $_SESSION['user']['matricula'], $_POST['dt_cadastro'], $_POST['item'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Dados da saida atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados da saida, tente novamente!';
			header("Location: views.php?acao=listar-saida");
		}
		//deletar
		function deletar_saida(){
			$id = $this->userModel->deletar_saida($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Saida apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa saida tente novamente!';
			header("Location: views.php?acao=listar-saida");
		}


												//Entrada
		//listando
		function listar_entrada(){
			$_POST['entrada'] = $this->userModel->listar_entrada();
			include_once 'views/table_entrada.php';
		}
		//adicionar no banco de dados
		function add_entrada(){
			$id = $this->userModel->up_quantidade($_POST['item'], $_POST['quantidade'], 'entrada');
			if($id) $id = $this->userModel->add_entrada($_SESSION['user']['matricula'], $_POST['dt_cadastro'], $_POST['item'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Entrada realizada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao realizar essa entrada, tente novamente!';
			header("Location: views.php?acao=listar-estoque");
		}
		//formulario de atualização
		function atualizar_entrada(){
			$_POST['item'] = $this->userModel->listar_item();
			$_POST['entrada'] = $this->userModel->atualizar_entrada($_GET['id']);
			$row = $_POST['entrada']->fetch_assoc();
			include 'views/form_entrada.php';
		}
		//adicionar no banco de dados
		function up_entrada(){
			$id = $this->userModel->up_entrada($_POST['identrada'], $_SESSION['user']['matricula'], $_POST['dt_cadastro'], $_POST['item'], $_POST['quantidade']);
			if($id) $_SESSION['mensagem']='success/Dados da entrada atualizados com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao atualizar dados da entrada, tente novamente!';
			header("Location: views.php?acao=listar-entrada");
		}
		//deletar
		function deletar_entrada(){
			$id = $this->userModel->deletar_entrada($_GET['id']);
			if($id) $_SESSION['mensagem']='success/Entrada apagada com sucesso';
			else $_SESSION['mensagem']='danger/Erro ao apagar essa entrada tente novamente!';
			header("Location: views.php?acao=listar-entrada");
		}		
		//listando
		function puchar_saida(){
			$_POST['saida'] = $this->userModel->puchar_saida();
			$saida = $_POST['saida'];
			return $saida;
		}
		//listando
		function puchar_entrada(){
			$_POST['entrada'] = $this->userModel->puchar_entrada();
			$entrada = $_POST['entrada'];
			return $entrada;
		}
		//deletar
		function gerar_relatorio(){
			if($_GET['tipo']=='material'){
				$_POST['material'] = $this->userModel->relatorio_material();
				include 'views/relatorio_material.php';
			}else if($_GET['tipo']=='estoque'){
				$_POST['estoque'] = $this->userModel->relatorio_estoque();
				include 'views/relatorio_estoque.php';
			}else if($_GET['tipo']=='entrada'){
				$_POST['entrada'] = $this->userModel->listar_entrada();
				include 'views/relatorio_entrada.php';
			}else if($_GET['tipo']=='saida'){
				$_POST['saida'] = $this->userModel->listar_saida();
				include 'views/relatorio_saida.php';
			}else if($_GET['tipo']=='material_grafico'){
				$_POST['id'] = "morris-material";
				include 'views/graficos.php';
			}else if($_GET['tipo']=='estoque_grafico'){
				$_POST['id'] = "morris-estoque";
				include 'views/graficos.php';
			}else if($_GET['tipo']=='entrada_grafico'){
				$_POST['id'] = "morris-entrada";
				include 'views/graficos.php';
			}else if($_GET['tipo']=='saida_grafico'){
				$_POST['id'] = "morris-saida";
				include 'views/graficos.php';
			}
		}

		function chamar_relatorio(){
			$_POST['saida'] = $this->userModel->listar_saida();
			include 'views/form_relatorio.php';
		}
		//Outras funcoes
 		function idade($data){
   			list($ano, $mes, $dia) = explode('-', $data);
    		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
   			$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   			$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
   			$tempo = "Anos";
   			if($idade==1){
   				$tempo = "Ano";	
   			}else if($idade==0){
	   			$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 30);
	   			$tempo = "meses";
	   			if($idade==1){
	   				$tempo = "mês";	
   				}else if($idade==0){
	   				$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24));
	   				$t = "dias";
		   			if($idade==1){
		   				$t = "dia";	
		   			}
   				}
   			}
   			return $idade.' '.$tempo;
		}
		//converter a data para o formato normal
		function data($date){
			$data=date('d/m/Y', strtotime($date));
			return $data;
		}
		//mensagem
 		function mensagem(){
	 		if(isset($_SESSION['mensagem'])){ 
	 			list($tipo, $mensagem) = explode('/', $_SESSION['mensagem']);
	        	echo'
	            	<div id="mensagem" class="alert alert-'.$tipo.' text-center">
	                	<h7>
	                    	'.$mensagem.'
	                	</h7>
	            	</div>
	        	';
	       	 	$_SESSION['mensagem']=null;
	    	}
 		}

 		//Listagens
		function applistar_animal(){
			$_POST['animal'] = $this->userModel->listar_animal();
			include_once 'ajax/table_animal.php';
		}

		//Chamando formulario de atualização
		function appperfil_animal(){
			$_POST['animal'] = $this->userModel->atualizar_animal($_GET['id']);
			$row = $_POST['animal']->fetch_assoc();
			$_POST['pai'] = $this->userModel->atualizar_animal($row['animal_idpai']);
			$pai = $_POST['pai']->fetch_assoc();
			$row['nome_pai'] = $pai['nome'];
			$_POST['mae'] = $this->userModel->atualizar_animal($row['animal_idmae']);
			$mae = $_POST['mae']->fetch_assoc();
			$row['nome_mae'] = $mae['nome'];
			$_POST['peso'] = $this->userModel->listar_peso($_GET['id']);
			$_POST['vacina'] = $this->userModel->vacinacao($_GET['id']);
			$_POST['leite'] = $this->userModel->lactacao($_GET['id']);
			require_once 'ajax/perfil_animal.php';
		}

		function applogin(){
			$resp = $this->userModel->login($_GET['matricula']);
			if(!is_null($resp)){
				echo 'sucesso';
			}else{
				echo 'erro';
			}
		}

				//mostrar vacina
		function appmostrar_calendario(){
			$_POST['vacinacao'] = $this->userModel->listar_vacinacao();
			$_POST['ordenha'] = $this->userModel->listar_leite();
			include 'ajax/calendario.php';
		}

		function appmostrar_estoque(){
			$_POST['categoria'] = $this->userModel->listar_categoria();
			$_POST['material'] = $this->userModel->listar_material();
			$_POST['estoque'] = $this->userModel->listar_estoque();
			include 'ajax/estoque.php';
		}
	}
?>