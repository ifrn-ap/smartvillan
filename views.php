<?php
	ob_start();
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include 'views/header.php';
    include 'controlador.php';
    $control = new Controlador;
    $control->mensagem();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //categoria
        if($_POST['acao']=='add-usuario') $control->add_usuario();
        if($_POST['acao']=='up-usuario') $control->up_usuario();
        //animal
        if($_POST['acao']=='add-animal') $control->add_animal();
        if($_POST['acao']=='add-peso') $control->add_peso();
        if($_POST['acao']=='up-animal') $control->up_animal();
        if($_POST['acao']=='filtrar-animal') $control->filtrar_animal();
        //vacina
        if($_POST['acao']=='add-vacina') $control->add_vacina();
        if($_POST['acao']=='up-vacina') $control->up_vacina();
        //vacina
        if($_POST['acao']=='add-vacinacao') $control->add_vacinacao();
        //categoria
        if($_POST['acao']=='add-categoria') $control->add_categoria();
        if($_POST['acao']=='up-categoria') $control->up_categoria();
        //
        if($_POST['acao']=='add-leite') $control->add_leite();
        if($_POST['acao']=='up-leite') $control->up_leite();
        //material
        if($_POST['acao']=='add-material') $control->add_material();
        if($_POST['acao']=='up-material') $control->up_material();
        //item
        if($_POST['acao']=='add-item') $control->add_item();
        if($_POST['acao']=='up-item') $control->up_item();
        //saida
        if($_POST['acao']=='add-saida') $control->add_saida();
        if($_POST['acao']=='up-saida') $control->up_saida();
        //
        if($_POST['acao']=='add-entrada') $control->add_entrada();
        if($_POST['acao']=='up-entrada') $control->up_entrada();
        //
        if($_POST['acao']=='filtrar-estoque') $control->filtrar_estoque();        
    }else if($_SERVER['REQUEST_METHOD']=='GET'){
        if($_GET['acao']=='add-painel') $control->add_painel();
        //usuario
        if($_GET['acao']=='cadastrar-usuario') $control->cadastrar_usuario();
        if($_GET['acao']=='listar-usuario') $control->listar_usuario();
        if($_GET['acao']=='perfil-usuario') $control->perfil_usuario();
        if($_GET['acao']=='atualizar-usuario') $control->atualizar_usuario();
        if($_GET['acao']=='deletar-usuario') $control->deletar_usuario();
        //animal
        if($_GET['acao']=='cadastrar-animal') $control->cadastrar_animal();
        if($_GET['acao']=='listar-animal') $control->listar_animal();
        if($_GET['acao']=='perfil-animal') $control->perfil_animal();
        if($_GET['acao']=='atualizar-animal') $control->atualizar_animal();
        if($_GET['acao']=='deletar-animal') $control->deletar_animal();
        //categoria
        if($_GET['acao']=='cadastrar-categoria') $control->cadastrar_categoria();
        if($_GET['acao']=='listar-categoria') $control->listar_categoria();
        if($_GET['acao']=='atualizar-categoria') $control->atualizar_categoria();
        if($_GET['acao']=='deletar-categoria') $control->deletar_categoria();
        //categoria
        if($_GET['acao']=='cadastrar-vacina') $control->cadastrar_vacina();
        if($_GET['acao']=='listar-vacina') $control->listar_vacina();
        if($_GET['acao']=='atualizar-vacina') $control->atualizar_vacina();
        if($_GET['acao']=='deletar-vacina') $control->deletar_vacina();
        //categoria
        if($_GET['acao']=='cadastrar-leite') $control->cadastrar_leite();
        if($_GET['acao']=='listar-leite') $control->listar_leite();
        if($_GET['acao']=='atualizar-leite') $control->atualizar_leite();
        if($_GET['acao']=='deletar-leite') $control->deletar_leite();
        //vacinacao
        if($_GET['acao']=='agendar-vacinacao') $control->agendar_vacinacao();
        if($_GET['acao']=='listar-vacinacao') $control->listar_vacinacao();
        if($_GET['acao']=='deletar-vacinacao') $control->deletar_vacinacao();
        if($_GET['acao']=='mostrar-calendario') $control->mostrar_calendario();
        //material
        if($_GET['acao']=='cadastrar-material') $control->cadastrar_material();
        if($_GET['acao']=='listar-material') $control->listar_material();
        if($_GET['acao']=='atualizar-material') $control->atualizar_material();
        if($_GET['acao']=='deletar-material') $control->deletar_material();
        //item
        if($_GET['acao']=='cadastrar-item') $control->cadastrar_item();
        if($_GET['acao']=='listar-item') $control->listar_item();
        if($_GET['acao']=='atualizar-item') $control->atualizar_item();
        if($_GET['acao']=='deletar-item') $control->deletar_item();
        //saida
        if($_GET['acao']=='cadastrar-saida') $control->cadastrar_saida();
        if($_GET['acao']=='listar-saida') $control->listar_saida();
        if($_GET['acao']=='atualizar-saida') $control->atualizar_saida();
        if($_GET['acao']=='deletar-saida') $control->deletar_saida();
        //estoque
        if($_GET['acao']=='listar-estoque') $control->listar_estoque();
        //peso
        if($_GET['acao']=='deletar-peso') $control->deletar_peso();
        //entrada
        if($_GET['acao']=='cadastrar-entrada') $control->cadastrar_entrada();
        if($_GET['acao']=='listar-entrada') $control->listar_entrada();
        if($_GET['acao']=='atualizar-entrada') $control->atualizar_entrada();
        if($_GET['acao']=='deletar-entrada') $control->deletar_entrada();
        //relatorios
        if($_GET['acao']=='gerar-relatorio') $control->gerar_relatorio();
        if($_GET['acao']=='chamar_relatorio') $control->chamar_relatorio();
    }
    include 'views/footer.php';
    include 'morris.php';
 ?>