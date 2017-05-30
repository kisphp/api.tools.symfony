<?php

namespace ApiBundle\Command;

use ApiBundle\Tools\DownloadManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadUrlCommand extends Command
{
    protected function configure()
    {
        $this->setName('kp:download')
            ->setDescription('Download pending files')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $cmd = new DownloadManager();
      $cmd->saveUrlToFile('asd');

      dump('a');
    }
}