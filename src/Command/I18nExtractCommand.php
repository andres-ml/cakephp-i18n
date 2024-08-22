<?php
declare(strict_types=1);

namespace Aml\I18n\Command;

use Cake\Command\Helper\ProgressHelper;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

/**
 * Language string extractor
 */
class I18nExtractCommand extends \Cake\Command\I18nExtractCommand
{
    
    /**
     * Extract tokens out of all files to be processed
     *
     * @param \Cake\Console\Arguments $args The io instance
     * @param \Cake\Console\ConsoleIo $io The io instance
     * @return void
     */
    protected function _extractTokens(Arguments $args, ConsoleIo $io): void
    {
        $progress = $io->helper('progress');
        assert($progress instanceof ProgressHelper);
        $progress->init(['total' => count($this->_files)]);
        $isVerbose = $args->getOption('verbose');

        $functions = [
            '__' => ['singular'],
            '__t' => ['singular'], // new function
            '__n' => ['singular', 'plural'],
            '__tn' => ['singular', 'plural'], // new function
            '__d' => ['domain', 'singular'],
            '__dn' => ['domain', 'singular', 'plural'],
            '__x' => ['context', 'singular'],
            '__tx' => ['context', 'singular'], // new function
            '__xn' => ['context', 'singular', 'plural'],
            '__txn' => ['context', 'singular', 'plural'], // new function
            '__dx' => ['domain', 'context', 'singular'],
            '__dxn' => ['domain', 'context', 'singular', 'plural'],
        ];
        $pattern = '/(' . implode('|', array_keys($functions)) . ')\s*\(/';

        foreach ($this->_files as $file) {
            $this->_file = $file;
            if ($isVerbose) {
                $io->verbose(sprintf('Processing %s...', $file));
            }

            $code = (string)file_get_contents($file);

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
                    $this->_parse($io, $functionName, $map);
                }
            }

            if (!$isVerbose) {
                $progress->increment(1);
                $progress->draw();
            }
        }
    }
}
