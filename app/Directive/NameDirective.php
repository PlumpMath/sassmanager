<?php

class NameDirective extends Directive
{
	static $keyword = 'name';

	public static function expect()
	{
		return [
			'Parameter'
		];
	}
}
