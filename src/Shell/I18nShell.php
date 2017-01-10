<?php

/**
 */
namespace Aml\I18n\Shell;

use Cake\Console\Shell;

/**
 * Shell for I18N management.
 *
 */
class I18nShell extends Shell
{
    /**
     * Contains tasks to load and instantiate
     *
     * @var array
     */
    public $tasks = ['Aml/I18n.FullExtract'];
    
    public function main() {
        $this->FullExtract->main();
    }
    
    /**
     * Gets the option parser instance and configures it.
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();
        
        $parser->addSubcommand('extract', [
            'help' => 'Extract the po translations from your application',
            'parser' => $this->FullExtract->getOptionParser()
        ]);

        return $parser;
    }

}
