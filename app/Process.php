<?php

class Process
{
	public static function run($command)
	{
		return +shell_exec("nohup $command >> sass.log & echo $!");
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

	public static function kill($id)
	{
		return shell_exec("kill -KILL $id");
	}
}
