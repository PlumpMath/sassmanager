<?php

class WatchCommand extends Command
{
	static $keyword = 'watch';

	public static function expect()
	{
		return [
			'NameDirective',
			'CompressDirective',
			'InputOutputParameter'
		];
	}

	public function execute()
	{
		$successful = true;

		if ( ! $this->directiveExists('NameDirective') ||
			 ! $this->directiveExists('InputOutputParameter')) {
			Reporter::shout("Missing arguments...");
			$successful = false;
		} else {
			$command = "sass --watch ".$this->directives['InputOutputParameter']->value;

			if ($this->directiveExists('CompressDirective'))
				$command .= " --style compressed";

			$name = $this->directives['NameDirective']->directives['Parameter']->value;

			FileInstanceManager::add(Process::run($command), $name);
		}

		return $successful;
	}
}
