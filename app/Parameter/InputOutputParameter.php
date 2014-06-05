<?php

class InputOutputParameter extends Parameter
{
	public static function pattern()
	{
		return '/(.*):(.*)/';
	}
}
