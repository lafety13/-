<?php

return [
	'phonebook/delete/([0-9]+)' => 'site/delete/$1',
	'phonebook/edit/([0-9]+)' => 'site/edit/$1',
	'phonebook/create' => 'site/create',
	'phonebook/search' => 'site/search',
	'phonebook' => 'site/phonebook', 
	'index.php' => 'site/index',
	'index' => 'site/index',
	'' => 'site/index',
];