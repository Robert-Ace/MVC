<?php

namespace application\models;

use application\core\AbstractModel;

class Main extends AbstractModel
{
    public function getNews()
    {
        $sql = 'SELECT * FROM `news`';
        return $this->db->getRow($sql);
    }
}