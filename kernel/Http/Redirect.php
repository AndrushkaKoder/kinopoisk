<?php

namespace App\Kernel\Http;

use App\Kernel\Http\interface\RedirectInterface;

class Redirect implements RedirectInterface
{
	public function to(string $url)
	{
		header("Location: $url");
		exit();
	}

}
