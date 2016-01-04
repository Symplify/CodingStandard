<?php

/*
 * This file is part of Symplify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz).
 */

namespace Symplify\CodingStandard\Command;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class FixCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this->setName('fix');
        $this->setDescription('Fix coding standard in particular directory');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            foreach ($input->getArgument('path') as $path) {
                $this->executeFixersForDirectory($path);
            }
            $this->io->success('Your code was successfully fixed!');

            return self::EXIT_CODE_SUCCESS;
        } catch (Exception $exception) {
            $this->io->error($exception->getMessage());

            return self::EXIT_CODE_SUCCESS;
        }
    }

    /**
     * @param string $directory
     */
    private function executeFixersForDirectory($directory)
    {
        foreach ($this->runnerCollection->getRunners() as $fixableRunner) {
            $this->io->text($fixableRunner->fixDirectory($directory));
        }
    }
}
