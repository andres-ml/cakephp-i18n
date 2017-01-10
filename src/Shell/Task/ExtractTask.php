<?php

namespace App\Shell\Task;

use Cake\Shell\Task\ExtractTask as CakeExtractTask;

class ExtractTask extends CakeExtractTask
{

    protected function _parse($functionName, $map) {
        if ($functionName === '__') {
            parent::prase('__t', $map);
        }
        
        parent::parse($functionName, $map);
    }
    
}