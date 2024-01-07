<?php

function public_path(string $path): string
{
	return PUBLIC_PATH . '/' . $path;
}

function storage_path(string $path): string
{
	return STORAGE_PATH . '/' . $path;
}

function clearStr($string): string
{
	return htmlspecialchars($string);
}
