<?php
class validate
{
	public function isstring($string)
	{
		return (is_string($string));
	}

	public function isint($int)
	{
		return (preg_match("/^([0-9.,-]+)$/", $int) > 0);
	}

	public function isbool($bool)
	{
		$b = 1 * $bool;
		return ($b == 1 || $b == 0);
	}
}
