<?php

class ListCommand extends Command
{
	static $keyword = 'list';

	public function execute()
	{
		$successful = true;

		$processes = FileInstanceManager::findAll();
		$lines = [];

		Reporter::shout(Reporter::MSG_LIST_HEAD);

		foreach ($processes as $process) {
			Reporter::shout(Reporter::MSG_LIST_ITEM, $process);
		}

		return $successful;
	}
}
