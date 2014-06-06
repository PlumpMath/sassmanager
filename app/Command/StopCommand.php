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
			Reporter::shout(Reporter::MSG_ARGUMENT_MISSING);
			Reporter::shout(Reporter::MSG_EXPECTED, ["Parameter", "--name"]);
			$successful = false;
		} else {
			$id = $this->getDirective('Parameter')->value;

			if (is_null($id)) {
				Reporter::shout(Reporter::MSG_NOT_ALIVE, $name);
			} else {

				if ( ! is_numeric($id)) {
					$name = $id;
					$id = FileInstanceManager::find($id);
				} else {
					$name = FileInstanceManager::findName($id);
				}

				if (Process::isType($id, '(ruby)(.*)+(sass)')) {
					Reporter::shout(Reporter::MSG_STOP, [$name, $id]);

					Process::kill($id);
				} else {
					Reporter::shout(Reporter::MSG_IS_NOT_SASS, $process["id"]);
				}

				FileInstanceManager::remove($id);
			}
		}

		return $successful;
	}
}
