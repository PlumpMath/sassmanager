<?php

abstract class Command
{
	public $directives;

	public $found = [];

	static $keyword;

	public function __construct($directives)
	{
		array_shift($directives);
		$this->directives = $directives;
		$expects = static::expect();

		foreach ($directives as $i => $directive) {
			foreach ($expects as $j => $expect) {
				if ($expect::detect($directive)) {
					$found[] = new $expect(array_slice($directives, $i));
					unset($expects[$j]);
				}
			}
		}

		print_r([
			get_called_class(),
			$found
		]);
	}

	public static function pattern()
	{
		return '/'.static::$keyword.'/';
	}
	
	public static function detect($arg)
	{
		return (preg_match(static::pattern(), $arg));
	}

	public static function expect()
	{
		return [];
	}
}
