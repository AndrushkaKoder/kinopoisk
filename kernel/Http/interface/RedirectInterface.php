<?php

namespace App\Kernel\Http\interface;

interface RedirectInterface
{
	//Метод для редиректа по url
	public function to(string $url);

}
