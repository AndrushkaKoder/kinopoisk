<?php

namespace App\Controllers;

class HomeController
{
	public function index()
	{
		include_once VIEWS . '/pages/home.php';
	}

}
