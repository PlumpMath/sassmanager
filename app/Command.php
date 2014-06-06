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
					$this->addDirective($expect, new $expect(array_slice($directives, $i)));
				}
			}
		}
	}

	public function addDirective($name, $directive)
	{
		if ( ! isset($this->directives[$name])) {
			$this->directives[$name] = [$directive];
		} else {
			$this->directives[$name][] = $directive;
		}
	}

	public function getDirective($type)
	{
		if (count($this->directives) === 1) {
			$this->getFirstDirective($type);
		} else {
			return $this->directives[$type];
		}
	}

	public function getFirstDirective($type)
	{
		return $this->directives[$type][0];
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

	public function directiveExists($type)
	{
		return (isset($this->directives[$type]));
	}
}
