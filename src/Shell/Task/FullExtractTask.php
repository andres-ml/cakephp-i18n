<?php

namespace Aml\I18n\Shell\Task;

use Cake\Shell\Task\ExtractTask;

/**
 * Override ExtractTask
 * 
 * <!> Do not use ExtractTask as name since cakephp ignores plugin tasks if core task exists
 * 
 */
class FullExtractTask extends ExtractTask
{

    protected function _parse($functionName, $map) {
        if ($functionName === '__') {
            parent::_parse('__t', $map);
        }
        parent::_parse($functionName, $map);
    }
    
}