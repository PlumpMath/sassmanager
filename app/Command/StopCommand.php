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
			$command = "kill -KILL ".$this->directives['Parameter']->value;

			Process::run($command);
		}

		return $successful;
	}
}
