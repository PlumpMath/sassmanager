<?php

abstract class Directive extends Command
{
	public static function pattern()
	{
		return '/(\-'.substr(static::$keyword, 0, 1).'|\-\-'.static::$keyword.')/';
	}
}
