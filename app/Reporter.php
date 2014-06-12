<?php

class Reporter
{

	const MSG_START = <<<EOD
Welcome to Stylish SASS

EOD;
	const MSG_HELP = <<<EOD
NAME
	stylish -- manage SASS processes

SYNOPSIS
	stylish watch [-n | --name] ProcessName [-c | --compressed] [-h | --help] [InputFile:OutputFile ...]

	stylish stop [ProcessID | ProcessName]

	stylish list

	stylish shutdown

DESCRIPTION

	watch 						Create a SASS process

		The following options are available for watch:

		-n --name 					Name the created SASS process

		-c --compressed 			Specify that the OutputFile should be compressed

		-h --help 					Display this dialogue

		InputFile:OutputFile 		Specify SASS's Inputs and Outputs


	stop 						Stop a SASS process

		The following options are available for stop:

		ProcessID ProcessName  		The name or pid of the process to stop


	list 						List all managed SASS processes


	shutdown 					Stop all managed SASS processes

EXAMPLES
	The following launches a SASS process that monitors main.sass and compiles to main.css. The process will be named development.

	stylish watch -n development main.sass:main.css

	The following lists all managed SASS processes.

	stylish list

EOD;
	const MSG_HELP_ITEM = <<<EOD
%-15s
EOD;
	const MSG_SHUTDOWN = <<<EOD
Shutting down Stylish SASS ...

	==> Closed [ %d ] processes
EOD;
	const MSG_NOTHING_TO_CLOSE = <<<EOD
.: No SASS processes running :.
EOD;
	const MSG_LIST_HEAD = <<<EOD
PROCESSES

PID             | NAME            | TIME            | CPU             | MEM               
==========================================================================================
EOD;
	const MSG_LIST_ITEM = <<<EOD
%-15s | %-15s | %-15s | %-15s | %s
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
Initializing SASS Instance ...

	==> Watching %s: [ %s ]
EOD;
	const MSG_COMPILE = <<<EOD
Running SASS Instance once...

	==> Compiling: [ %s ]
EOD;
	const MSG_STOP = <<<EOD
Killing SASS Instances ...

	==> Killed SASS [ %s, %s ]
EOD;
	const MSG_IS_NOT_SASS = <<<EOD
.: Process is not SASS :.
EOD;
	const MSG_NOT_ALIVE = <<<EOD
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
