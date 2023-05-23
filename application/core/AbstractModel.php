<?php

namespace application\core;

use application\lib\Db;

abstract class AbstractModel
{
    protected Db $db;
    public function __construct()
    {
        $this->db = new Db();
    }
}