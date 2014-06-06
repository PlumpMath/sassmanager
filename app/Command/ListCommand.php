<?php

class ListCommand extends Command
{
	static $keyword = 'list';

	public function execute()
	{
		$successful = true;

		$processes = FileInstanceManager::findAll();

		Reporter::shout(Reporter::MSG_LIST_HEAD);

		foreach ($processes as $process) {
			$process["cpu"] = Process::getCPUUsage($process["id"]);
			$process["mem"] = Process::getMemUsage($process["id"]);

			Reporter::shout(Reporter::MSG_LIST_ITEM, $process);
		}

		return $successful;
	}
}
