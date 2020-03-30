<?php

namespace maskeynihal\ladder;

class Ladder 
{
    public function configNotPublished()
    {
        return is_null(config('ladder')); 
    }

    public function prefix()
    {
        return config('ladder.prefix', 'ladder');
    }
}