<?php

class Process
{
	public static function run($command)
	{
		return +shell_exec("nohup $command > /dev/null & echo $!");
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
