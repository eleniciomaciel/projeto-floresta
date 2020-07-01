<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lista-cidades/(:num)'] = 'welcome/select_cidades/$1';
$route['add-clubes-regiao'] = 'welcome/add_my_clube';
$route['lista-estados_cadastradas'] = 'welcome/estados_user';
$route['lista-cidades-clubes/(:num)'] = 'welcome/cidade_clubes/$1';
$route['lista-cidades-meu-clubes/(:num)'] = 'welcome/meuClubeCidade/$1';
$route['lista-nome-meu-clubes/(:num)'] = 'welcome/listaClubesNomes/$1';
$route['cadastra-usuarios-novos'] = 'welcome/addNovosUsuarios';

$route['verificando-login-usuario'] = 'welcome/login';
$route['sair'] = 'welcome/logout';
$route['lista-classes'] = 'master/classesController/listaClasses';
$route['add-requisitos'] = 'master/classesController/add_requidito';
$route['lista-todos-requisitos'] = 'master/classesController/get_requisitos';
$route['lista-dados-de-um-requisito/(:num)'] = 'master/classesController/get_lista_um_requisito/$1';
$route['deleta-requisito/(:num)'] = 'master/classesController/delete_requisito/$1';
$route['altera-meu-requisitos/(:num)'] = 'master/classesController/altera_um_requisito/$1';


/**usuarios */
$route['lista-todos-usuarios-geral'] = 'master/usuariosController/index';
$route['lista-todos-clubes'] = 'master/classesController/get_clubes';
$route['soma-todos-usuarios'] = 'master/classesController/somaUsuarios';
$route['soma-todos-classes'] = 'master/classesController/somClasses';
$route['soma-todos-clubes'] = 'master/classesController/somaClubes';

$route['ativa-login'] = 'welcome/ativaLoginUsuário';
$route['valida-acesso-novo-usuarios'] = 'welcome/validaNovoAcessoClube';


/**rota perfil */
$route['dados-do-perfil-usuario/(:num)'] = 'diretor/diretor-perfil/PerfilController/index/$1';
$route['altera-dados-usuario-perfil/(:num)'] = 'diretor/diretor-perfil/PerfilController/alteraDadosPerfil/$1';
$route['alte-dados-usuario-acesso/(:num)'] = 'diretor/diretor-perfil/PerfilController/alteraAcessoLogin/$1';

/**minha liderança */
$route['lista-toda-lideranca'] = 'diretor/lideranca/LiderancaController/index';