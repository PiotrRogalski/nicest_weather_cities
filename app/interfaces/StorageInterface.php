<?php
interface StorageInterface
{

	public function get($key);

	/**
	* @prototype
	*
	*
	**/
	public function set($key, $value);
}