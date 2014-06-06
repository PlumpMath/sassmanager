<?php

class Process
{
	public static function logURI()
	{
		return WORKING_DIR.'/.sasslog';
	}

	public static function run($command)
	{
		return +shell_exec("nohup $command >> ".static::logURI()." & echo $!");
	}

	public static function getCPUUsage($id)
	{
		return trim(exec("ps -o %cpu= $id")).'%';
	}

	public static function getMemUsage($id)
	{
		$info = +trim(exec("ps -o rss= $id"));

		if ($info > 1024) {
			return (round($info/1024, 3))." MB";
		} else {
			return $info." KB";
		}
	}

	public static function isAlive($id)
	{
		exec("ps $id", $_out);

		return (count($_out) >= 2);
	}

	public static function isType($id, $type)
	{
		exec ("ps $id", $_out);

		if (count($_out) > 1 && preg_match('/'.$type.'/', $_out[1])) return true;

		return false;
	}

	public static function kill($id)
	{
		return shell_exec("kill -KILL $id");
	}
}
