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
			$iops = $this->getDirective('InputOutputParameter');

			$io_str = '';

			foreach ($iops as $iop) {
				$io_str .= ' '.$iop->value;
			}

			$command = "sass --watch".$io_str;

			if ($this->directiveExists('CompressDirective'))
				$command .= " --style compressed";

			$name = $this->getFirstDirective('NameDirective')->getFirstDirective('Parameter')->value;

			FileInstanceManager::add(Process::run($command), $name);
		}

		return $successful;
	}
}
