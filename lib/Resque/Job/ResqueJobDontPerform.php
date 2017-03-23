<?php
/**
 * Exception to be thrown if a job should not be performed/run.
 *
 * @package        Resque/Job
 * @author        Chris Boulton <chris@bigcommerce.com>
 * @license        http://www.opensource.org/licenses/mit-license.php
 */

namespace qesque\lib\Resque\Job;

use Exception;

class ResqueJobDontPerform extends Exception
{

}