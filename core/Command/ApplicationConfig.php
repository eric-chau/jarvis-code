<?php

declare(strict_types=1);

namespace JarvisCode\Command;

use Jarvis\Skill\Console\AbstractApplicationConfig;
use Jarvis\Skill\Doctrine\Console\DoctrineCommandHandler;

/**
 * @author Eric Chau <eriic.chau@gmail.com>
 */
class ApplicationConfig extends AbstractApplicationConfig
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this
            ->setName('jarviscode')
            ->setVersion('1.0.0')
            ->beginCommand('doctrine')
                ->setDescription('Doctrine ORM entry command.')
                ->setHandler(function () {
                    return new DoctrineCommandHandler($this->app);
                })
                ->beginSubCommand('schema-update')
                    ->setHandlerMethod('handleDatabaseUpdate')
                ->end()
                ->beginSubCommand('database-create')
                    ->setHandlerMethod('handleDatabaseCreate')
                ->end()
            ->end()
        ;
    }
}
