<?php

/**
 * Failed Resque job.
 *
 * @package		Resque/Failure
 * @author		Chris Boulton <chris@bigcommerce.com>
 * @license		http://www.opensource.org/licenses/mit-license.php
 */
namespace qesque\lib\Resque;

use Exception;

class ResqueFailure
{
	/**
	 * @var string Class name representing the backend to pass failed jobs off to.
	 */
	private static $backend;

	/**
	 * Create a new failed job on the backend.
	 *
	 * @param object $payload        The contents of the job that has just failed.
	 * @param \Exception $exception  The exception generated when the job failed to run.
	 * @param \Resque_Worker $worker Instance of Resque_Worker that was running this job when it failed.
	 * @param string $queue          The name of the queue that this job was fetched from.
	 */
	public static function create($payload, Exception $exception, ResqueWorker $worker, $queue)
	{
		$backend = self::getBackend();
		new $backend($payload, $exception, $worker, $queue);
	}

    /**
     * @return string
     */
	public static function getBackend()
	{
		if(self::$backend === null) {
			self::$backend = '\qesque\lib\Resque\Failure\ResqueFailureRedis';
		}

		return self::$backend;
	}

	/**
	 * Set the backend to use for raised job failures. The supplied backend
	 * should be the name of a class to be instantiated when a job fails.
	 * It is your responsibility to have the backend class loaded (or autoloaded)
	 *
	 * @param string $backend The class name of the backend to pipe failures to.
	 */
	public static function setBackend($backend)
	{
		self::$backend = $backend;
	}
}