<?php

class ShutdownCommand extends Command
{
	static $keyword = 'shutdown';

	public function execute()
	{
		$successful = true;

		$processes = FileInstanceManager::findAll();
		$n = count($processes);

		foreach ($processes as $process) {
			Process::kill(+$process["id"]);
		}

		FileInstanceManager::removeAll();

		Reporter::shout(Reporter::MSG_SHUTDOWN, $n);

		return $successful;
	}
}
