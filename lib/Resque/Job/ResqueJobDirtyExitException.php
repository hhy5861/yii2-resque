<?php
/**
 * Runtime exception class for a job that does not exit cleanly.
 *
 * @package        Resque/Job
 * @author        Chris Boulton <chris@bigcommerce.com>
 * @license        http://www.opensource.org/licenses/mit-license.php
 */

namespace qesque\lib\Resque\Job;

use RuntimeException;

class ResqueJobDirtyExitException extends RuntimeException
{

}