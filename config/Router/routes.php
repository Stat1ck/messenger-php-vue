<?php

return [

	'/:userid' => [
		'controller'	=> 'account',
		'action'		=> 'userpage',
		'title'			=> 'Страница',
		'method'		=> 'GET',
		'access'		=> 'public',
	],

	'/group/:groupname' => [
		'controller'	=> 'group',
		'action'		=> 'grouppage',
		'title'			=> 'Страница',
		'method'		=> 'GET',
		'access'		=> 'public',
	],

	'/' => [
		'controller'	=> 'index',
		'action'		=> 'index',
		'title'			=> 'Главная страница | Hello',
		'method'		=> 'GET',
		'access'		=> 'public',
	],

	'/register' => [
		'controller'	=> 'auth',
		'action'		=> 'register',
		'title'			=> 'Регистрация',
		'method'		=> 'GET',
		'access'		=> 'public',
	],

	'/api/create/user' => [
		'controller'	=> 'user',
		'action'		=> 'create',
		'title'			=> '',
		'method'		=> 'POST',
		'access'		=> 'public',
	],
];