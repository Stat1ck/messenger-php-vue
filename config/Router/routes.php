<?php

return [

	'/:userid' => [
		'controller'	=> 'account',
		'action'		=> 'userpage',
		'title'			=> 'Страница',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/group/:groupname' => [
		'controller'	=> 'group',
		'action'		=> 'grouppage',
		'title'			=> 'Страница',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/' => [
		'controller'	=> 'main',
		'action'		=> 'index',
		'title'			=> 'Главная',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/register' => [
		'controller'	=> 'account',
		'action'		=> 'register',
		'title'			=> 'Регистрация',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/api/create/user' => [
		'controller'	=> 'account',
		'action'		=> 'register',
		'title'			=> '',
		'method'		=> 'POST',
		'access'		=> 'public'
	],
];