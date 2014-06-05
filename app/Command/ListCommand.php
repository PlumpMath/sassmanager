<?php

class ListCommand extends Command
{
	static $keyword = 'list';

	public function execute()
	{
		$successful = true;

		$id = $this->directives['Parameter']->value;

		$processes = FileInstanceManager::findAll();
		$lines = [];

		foreach ($processes as $process) {
			$lines[] = implode(" ", $process);
		}

		Reporter::shout("The following are alive:\n".implode("\n", $lines));

		return $successful;
	}
}
