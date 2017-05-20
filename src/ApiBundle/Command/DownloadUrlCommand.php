<?php

namespace ApiBundle\Command;

use ApiBundle\Tools\DownloadManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadUrlCommand extends ContainerAwareCommand
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
        $database = $this->getApplication()
            ->getKernel()
            ->getContainer()
            ->get('model.service')
        ;

        $cmd = new DownloadManager($database);
        $isSuccess = $cmd->downloadFirstFile();

        if (!$isSuccess) {
            $output->writeln('<info>No file to download</info>');

            return;
        }

        $output->writeln('<info>File downloaded successfully</info>');
    }
}
