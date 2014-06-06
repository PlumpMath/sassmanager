<?php

class FileInstanceManager extends InstanceManager
{
	public static $uri = "sass.instances";

	public static function load()
	{
		$instances = file_get_contents(static::$uri);
		$processes = explode("\n", $instances);
		$_out = [];

		foreach ($processes as $process) {
			if (!!$process) {
				$fields = explode(" ", $process);

				$_out[] = [
					"id" => +$fields[0],
					"name" => $fields[1],
					"timestamp" => $fields[2]
				];
			}
		}

		return $_out;
	}

	public static function save($processes=null)
	{
		if ( ! is_null($processes)) {
			$lines = [];

			foreach($processes as $process) {
				$lines[] = implode(' ', $process);
			}

			if (is_array($lines)) $lines = implode("\n", $lines);
		} else {
			$lines = "";
		}

		file_put_contents(static::$uri, $lines);
	}

	static function add($id, $name)
	{
		$now = time();
		file_put_contents(static::$uri, "\n$id $name $now", FILE_APPEND);
	}

	static function removeById($id)
	{
		$loaded = static::load();
		$processes = [];
		$removed = false;

		foreach ($loaded as $process) {
			if ( $process["id"] != $id) $processes[] = $process;
			else $removed = true;
		}

		if ($removed) static::save($processes);
	}

	static function removeByName($name)
	{
		$loaded = static::load();
		$processes = [];
		$removed = false;

		foreach ($loaded as $process) {
			if ($process["name"] != $name) {
				$processes[] = $process;
			} else {
				$removed = true;
			}
		}

		if ($removed) static::save($processes);
	}

	static function removeAll()
	{
		static::save();
	}

	static function find($name)
	{
		$loaded = static::load();
		$processes = [];
		$instance = null;

		foreach ($loaded as $process) {
			if ($process["name"] === $name) $instance = $process["id"];
		}

		return $instance;
	}

	static function findName($id)
	{
		$loaded = static::load();

		foreach ($loaded as $process) {
			if ($process["id"] == $id) return $process["name"];
		}

		return "Not Found";
	}

	static function findAll()
	{
		$loaded = static::load();
		$processes = [];
		$removed = false;

		foreach ($loaded as $process) {
			if (Process::isAlive(+$process["id"])) {
				$processes[] = $process;
			} else {
				$removed = true;
			}
		}

		if ($removed === true) {
			static::save($processes);
		}

		return $processes;
	}

	static function exists($id)
	{
		return ( ! is_null(static::find($id)));
	}
}
