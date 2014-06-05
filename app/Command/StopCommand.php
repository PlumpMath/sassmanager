<?php

class StopCommand extends Command
{
	static $keyword = 'stop';

	public static function expect()
	{
		return [
			'Parameter'
		];
	}

	public function execute()
	{
		$successful = true;

		if ( ! $this->directiveExists('Parameter')) {
			Reporter::shout("Missing arguments...");
			$successful = false;
		} else {
			$id = $this->directives['Parameter']->value;

			$command = "kill -KILL ".$id;

			Process::run($command);
			FileInstanceManager::remove($id);
		}

		return $successful;
	}
}
