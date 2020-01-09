<?php

namespace WDB\Primes\Streams;

abstract class AbstractReadStream implements limitedReadStreamInterface
{
    protected $position;

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $this->position = 0;
        return true;
    }

    public function stream_tell()
    {
        return $this->position;
    }
    
    abstract public function stream_eof()
    {

    }
}
