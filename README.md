Stylish SASS
============

A PHP wrapper that manages SASS processes.

Synopsis
--------

	stylish watch \[-n | --name\] ProcessName \[-c | --compressed\] \[-h | --help\] \[InputFile:OutputFile ...\]

	stylish stop \[ProcessID | ProcessName\]

	stylish list

	stylish shutdown

Description
-----------

`watch`	--	create a SASS process

The following options are available for watch:

`-n --name` 					Name the created SASS process

`-c --compressed` 				Specify that the OutputFile should be compressed

`-h --help` 					Display this dialogue

`InputFile:OutputFile`	 		Specify SASS's Inputs and Outputs


`stop`	--	Stop a SASS process

The following options are available for stop:

`ProcessID ProcessName`			The name or pid of the process to stop


`list`	--	List all managed SASS processes


`shutdown`	--	Stop all managed SASS processes

Examples
--------

The following launches a SASS process that monitors main.sass and compiles to main.css. The process will be named development.

	stylish watch -n development main.sass:main.css

The following lists all managed SASS processes.

	stylish list

Thanks
------