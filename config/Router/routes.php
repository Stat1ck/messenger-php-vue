<?php

return [

	'/:userid' => [
		'controller'	=> 'account',
		'action'		=> 'userpage',
		'title'			=> '��������',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/group/:groupname' => [
		'controller'	=> 'group',
		'action'		=> 'grouppage',
		'title'			=> '��������',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/' => [
		'controller'	=> 'main',
		'action'		=> 'index',
		'title'			=> '�������',
		'method'		=> 'GET',
		'access'		=> 'public'
	],

	'/register' => [
		'controller'	=> 'account',
		'action'		=> 'register',
		'title'			=> '�����������',
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