<?php

class Process
{
	public static function run($command)
	{
		return +shell_exec("nohup $command > /dev/null & echo $!");
	}

	public static function getCPUUsage($id)
	{
		return trim(exec("ps -o %cpu= $id")).'%';
	}

	public static function getMemUsage($id)
	{
		return trim(exec("ps -o rss= $id")).' bytes';
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
