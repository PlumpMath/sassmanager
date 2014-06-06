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
			Reporter::shout(Reporter::MSG_MISSING_ARGUMENTS);
			Reporter::shout(Reporter::EXPECTED, "process name");
			$successful = false;
		} else {
			$id = $this->getDirective('Parameter')->value;

			if ( ! is_int($id)) {
				$id = FileInstanceManager::find($id);
			}

			FileInstanceManager::remove($id);
			Process::kill($id);
		}

		return $successful;
	}
}
