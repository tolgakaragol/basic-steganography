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

class DecodeCommand extends Command
{
    protected static $defaultName = 'steganog:decode';

    public function configure()
    {
        $this->addOption('path', 'p', InputOption::VALUE_REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getOption('path');

        $basic = new Basic();

        $output->writeln('Decoding process start...');

        $secret = $basic->decode($path);

        $output->writeln('Decoding process completed!');
        $output->writeln('Secret Data: <info>' . $secret . '</info>');

        return 0;
    }
}