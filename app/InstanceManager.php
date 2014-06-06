<?php

abstract class InstanceManager
{
	private function __construct() {}

	abstract static function add($id, $name);

	public static function remove($id)
	{
		return (is_int($id)) ? static::removeById($id) : static::removeByName($id);
	}

	abstract static function removeById($id);
	abstract static function removeByName($name);

	abstract static function find($name);
	abstract static function findAll();
}
