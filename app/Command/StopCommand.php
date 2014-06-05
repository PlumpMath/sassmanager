<?php

class StopCommand extends Command
{
	static $keyword = 'stop';

	public static function expect()
	{
		return [
			'InputOutputParameter',
			'Parameter'
		];
	}
}
