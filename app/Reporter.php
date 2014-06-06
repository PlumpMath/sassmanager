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
EOD;
	const MSG_NOTHING_TO_CLOSE = <<<EOD
.: No SASS processes running :.
EOD;
	const MSG_LIST_HEAD = <<<EOD
..	PROCESSES   ..

PID             | NAME            | TIME            | CPU             | MEM               
==========================================================================================
EOD;
	const MSG_LIST_ITEM = <<<EOD
%-15s | %-15s | %-15s | %-15s | %s
EOD;
	const MSG_HELP = <<<EOD
EOD;
	const MSG_ARGUMENT_MISSING = <<<EOD
.: Some necessary arguments are missing :.
EOD;
	const MSG_EXPECTED = <<<EOD
	==> Needed %s: [%s]
EOD;
	const MSG_UNRECOGNIZED_COMMAND = <<<EOD
.: Unrecognized Command :.
EOD;
	const MSG_WATCH = <<<EOD
... Initializing SASS Instances ...

	==> Watching %s: [ %s ]
EOD;

	const MSG_STOP = <<<EOD
... Killing SASS Instances ...

	==> Killed SASS [ %s, %s ]
EOD;

	const MSG_NOT_ALIVE = <<< EOD
.: SASS Instance [ %s ] cannot be found :.
EOD;

	public static function shout($msg, $parameters=null)
	{
		if ( ! is_null($parameters)) {
			if ( ! is_array($parameters)) $parameters = [$parameters];
		}

		echo vsprintf($msg, $parameters)."\n";
	}
}
