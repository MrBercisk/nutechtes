<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class JWT extends BaseConfig
{
    public $key = 'cskhfuwt48wbfjn3i4utnjf38754hf3yfbjc93758thrjsnf83hcwn8437'; 
    public $algorithm = 'HS256';
    public $expire  = 3600; 
}
