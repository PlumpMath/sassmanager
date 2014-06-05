<?php

class WatchCommand extends Command
{
	static $keyword = 'watch';

	public static function expect()
	{
		return [
			'NameDirective',
			'CompressDirective',
			'InputOutputParameter'
		];
	}
}
