<?php

namespace qesque\lib\Resque\Job;

interface IResqueJobFactoryInterface
{
    /**
     * @param $className
     * @param $args
     * @param $queue
     * @return mixed
     */
    public function create($className, $args, $queue);
}
