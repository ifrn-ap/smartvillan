<?php
    class ladp {
/**
*
* @author Rogers Neves
* @name autenticacao
* @tutorial Realiza funções de autenticação via ldap
*
*/
    private $ldap_server;
    private $conexao;
    private $usuario;
    public $usuario_ad;
    private $senha;
    private $base_dn;
    private $filtro;
    private $atributos;
 
    function __construct($server){
 /**
 *
 * @author Rogers Neves
 * @tutorial Método construtor
 * @access private 
 * @return void
 *
 **/
    $this->ldap_server = $server;
    $this->conexao = ldap_connect($this->ldap_server);
    ldap_set_option($this->conexao, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Impossível configurar a versão do LDAP!');
    ldap_set_option($this->conexao, LDAP_OPT_REFERRALS, 0);
  /*-------------------------------------*/
  /* ALTERE AQUI COLOCANDO O SEU DOMINIO */
  /*-------------------------------------*/
    $this->base_dn = "DC=ifrn, DC=local";
    $this->atributos = array('name','givenname','sn');
    }
 
    public function autentica($usuario, $senha){
 /**
 *
 * @author Rogers Neves
 * @tutorial Verifica usuário e senha e retorna true caso estejam corretos 
 * @access public 
 * @param String $usuario
 * @param String $senha
 * @return boolean
 *
 **/
  
    $this->usuario = $usuario;
    $this->senha = $senha;
    
    if(ldap_bind($this->conexao, $this->usuario, $this->senha)){
        $this->usuario_ad = $usuario;
        return true;
    }
    else{
        return false;
    }
 
  }
    public function busca_matricula($samaccountname){
 /**
 *
 * @author Rogers Neves
 * @tutorial Busca nome completo do usuário no LDAP a partir do seu nome de login
 * @access public 
 * @return String
 *
 **/
    $this->filtro = "(&(objectCategory=person)(samaccountname=".$samaccountname."))";
  //$this->filtro = "(&(objectClass=user)(objectCategory=person)(samaccountname=".$samaccountname.")(!(userAccountControl:1.2.840.113556.1.4.803:=2)))";
    $ldap_result = ldap_search($this->conexao, $this->base_dn, $this->filtro, $this->atributos);
    $entries = ldap_get_entries($this->conexao, $ldap_result);
    return $entries[0]['name'][0];
  }
 
 public function busca_nome($samaccountname){
 /**
 *
 * @author Rogers Neves
 * @tutorial Busca nome completo do usuário no LDAP a partir do seu nome de login
 * @access public 
 * @return String
 *
 **/
    $this->filtro = "(&(objectCategory=person)(samaccountname=".$samaccountname."))";
  //$this->filtro = "(&(objectClass=user)(objectCategory=person)(samaccountname=".$samaccountname.")(!(userAccountControl:1.2.840.113556.1.4.803:=2)))";
    $ldap_result = ldap_search($this->conexao, $this->base_dn, $this->filtro, $this->atributos);
    $entries = ldap_get_entries($this->conexao, $ldap_result);
    $nome = $entries[0]['givenname'][0];
    $sobrenome = $entries[0]['sn'][0];
    return $nome.' '.$sobrenome;
  }
  }