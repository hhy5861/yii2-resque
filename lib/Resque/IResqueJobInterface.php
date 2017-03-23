<?php
namespace qesque\lib\Resque;

interface IResqueJobInterface
{
	/**
	 * @return bool
	 */
	public function perform();
}
