<?php

abstract class Command
{
	public $directives = [];

	static $keyword;

	public function __construct($directives)
	{
		array_shift($directives);
		$expects = static::expect();

		foreach ($directives as $i => $directive) {
			foreach ($expects as $j => $expect) {
				if ($expect::detect($directive)) {
					$this->directives[$expect] = new $expect(array_slice($directives, $i));
					unset($expects[$j]);
				}
			}
		}
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

	public function execute()
	{

	}

	public function getDirective($type)
	{
		return $this->directives[$type];
	}

	public function directiveExists($type)
	{
		return (isset($this->directives[$type]));
	}
}
