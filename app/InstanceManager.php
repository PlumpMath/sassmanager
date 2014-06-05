<?php

class InstanceManager
{
	public static function add($pid, $name)
	{
		Reporter::shout("SASS Process started with id: ".$pid);
	}
}
