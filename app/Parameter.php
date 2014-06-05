<?php

class Parameter extends Command {
	public $value;

	public function __construct($directives)
	{
		$this->value = trim($directives[0]);
		parent::__construct($directives);
	}

	public static function pattern()
	{
		return '/^[^-]/';
	}
}
