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
			if (Process::isType($process["id"], '(ruby)(.*)+(sass)')) {
				Process::kill(+$process["id"]);
			} else {
				Reporter::shout(Reporter::MSG_IS_NOT_SASS, $process["id"]);
			}
		}

		FileInstanceManager::removeAll();

		if ($n > 0)
			Reporter::shout(Reporter::MSG_SHUTDOWN, $n);
		else
			Reporter::shout(Reporter::MSG_NOTHING_TO_CLOSE);

		return $successful;
	}
}
