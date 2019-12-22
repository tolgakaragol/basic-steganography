<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-22
 * Time: 18:26
 */

namespace BasicSteganography\Command;

use BasicSteganography\Encoder\Basic;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class EncodeCommand extends Command
{
    protected static $defaultName = 'steganog:encode';

    public function configure()
    {
        $this->addOption('secret', 's', InputOption::VALUE_REQUIRED);
        $this->addOption('source_path', 'p', InputOption::VALUE_REQUIRED);
        $this->addOption('target', 't', InputOption::VALUE_OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $secret = $input->getOption('secret');
        $path = $input->getOption('source_path');
        $target = $input->getOption('target');

        $basic = new Basic();

        $output->writeln('Encoding process start...');

        $basic->encode($secret, $path, $target);

        $output->writeln('Encoding process completed!');

        return 0;
    }
}