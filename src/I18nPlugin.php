<?php

namespace Aml\I18n;

use Aml\I18n\Command\I18nExtractCommand;
use Cake\Core\BasePlugin;
use Cake\Console\CommandCollection;

class I18nPlugin extends BasePlugin
{
 
    /**
     * @inheritDoc
     */
    public function console(CommandCollection $commands): CommandCollection
    {
        $commands = parent::console($commands);
        $commands->add('i18n extract', I18nExtractCommand::class);

        return $commands;
    }

}