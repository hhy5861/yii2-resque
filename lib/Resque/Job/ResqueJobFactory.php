<?php

namespace qesque\lib\Resque\Job;

use qesque\lib\Resque\ResqueException;

class ResqueJobFactory implements IResqueJobFactoryInterface
{
    /**
     * @param $className
     * @param $args
     * @param $queue
     * @return mixed
     * @throws ResqueException
     */
    public function create($className, $args, $queue)
    {
        if (!class_exists($className)) {
            throw new ResqueException(
                'Could not find job class ' . $className . '.'
            );
        }

        if (!method_exists($className, 'perform')) {
            throw new ResqueException(
                'Job class ' . $className . ' does not contain a perform method.'
            );
        }

        $instance = new $className;
        $instance->args = $args;
        $instance->queue = $queue;
        return $instance;
    }
}
