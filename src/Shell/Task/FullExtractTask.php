<?php

namespace Aml\I18n\Shell\Task;

use Cake\Console\Shell;
use Cake\Shell\Task\ExtractTask;

/**
 * @inheritDoc
 */
class FullExtractTask extends ExtractTask
{

    
    /**
     * Add __t() token
     * 
     * @inheritDoc
     */
    protected function _extractTokens()
    {
        /** @var \Cake\Shell\Helper\ProgressHelper $progress */
        $progress = $this->helper('progress');
        $progress->init(['total' => count($this->_files)]);
        $isVerbose = $this->param('verbose');

        $functions = [
            '__' => ['singular'],
            '__t' => ['singular'],
            '__n' => ['singular', 'plural'],
            '__d' => ['domain', 'singular'],
            '__dn' => ['domain', 'singular', 'plural'],
            '__x' => ['context', 'singular'],
            '__xn' => ['context', 'singular', 'plural'],
            '__dx' => ['domain', 'context', 'singular'],
            '__dxn' => ['domain', 'context', 'singular', 'plural'],
        ];
        $pattern = '/(' . implode('|', array_keys($functions)) . ')\s*\(/';

        foreach ($this->_files as $file) {
            $this->_file = $file;
            if ($isVerbose) {
                $this->out(sprintf('Processing %s...', $file), 1, Shell::VERBOSE);
            }

            $code = file_get_contents($file);

            if (preg_match($pattern, $code) === 1) {
                $allTokens = token_get_all($code);

                $this->_tokens = [];
                foreach ($allTokens as $token) {
                    if (!is_array($token) || ($token[0] !== T_WHITESPACE && $token[0] !== T_INLINE_HTML)) {
                        $this->_tokens[] = $token;
                    }
                }
                unset($allTokens);

                foreach ($functions as $functionName => $map) {
                    $this->_parse($functionName, $map);
                }
            }

            if (!$isVerbose) {
                $progress->increment(1);
                $progress->draw();
            }
        }
    }

}