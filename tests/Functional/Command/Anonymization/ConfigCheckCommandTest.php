<?php

declare(strict_types=1);

namespace MakinaCorpus\DbToolsBundle\Tests\Functional\Command\Anonymization;

use MakinaCorpus\DbToolsBundle\Tests\FunctionalKernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ConfigCheckCommandTest extends FunctionalKernelTestCase
{
    public function testExecute(): void
    {
        self::skipIfNoDatabase();

        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('db-tools:anonymization:config-check');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            [],
            [
                'interactive' => false,
                'capture_stderr_separately' => true
            ]
        );

        self::assertCommandIsSuccessful($commandTester);
    }
}