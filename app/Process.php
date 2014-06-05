<?php

class Process
{
	public static function run($command)
	{
		return shell_exec("nohup $command > /dev/null & echo $!");
	}

	public static function kill($id)
	{
		return shell_exec("kill -KILL $pid");
	}
}
