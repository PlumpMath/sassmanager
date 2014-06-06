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

		if ($n > 0)
			Reporter::shout(Reporter::MSG_SHUTDOWN, $n);
		else
			Reporter::shout(Reporter::MSG_NOTHING_TO_CLOSE);

		return $successful;
	}
}
