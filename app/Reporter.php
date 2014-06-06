<?php

class Reporter
{

	const MSG_START = <<<EOD
... Welcome to Stylish SASS ...
	v0.0.0

EOD;
	const MSG_SHUTDOWN = <<<EOD
... Shutting down Stylish SASS ...

	==> Closed [ %d ] processes

	Goodbye!
EOD;
	const MSG_LIST_HEAD = <<<EOD
..	PROCESSES   ..

PID             | NAME            | TIME
===========================================================
EOD;
	const MSG_LIST_ITEM = <<<EOD
%-15s | %-15s | %-15s
EOD;
	const MSG_HELP = <<<EOD
EOD;
	const MSG_ARGUMENT_MISSING = <<<EOD
.: Some necessary arguments are missing :.
EOD;
	const MSG_EXPECTED = <<<EOD
	==> Needed %s [%s]
EOD;
	const MSG_UNRECOGNIZED_COMMAND = <<<EOD
.: Unrecognized Command :.
EOD;

	public static function shout($msg, $parameters=null)
	{
		if ( ! is_null($parameters)) {
			if ( ! is_array($parameters)) $parameters = [$parameters];
		}

		echo vsprintf($msg, $parameters)."\n";
	}
}
