<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Numbers;
use DateTime;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'number:generate',
    description: 'Generate random number',
    hidden: false,
)]
class NumberGenerateCommand extends Command
{
    private $entityManager;

    public function __construct(ManagerRegistry $doctrine) {
        $this->entityManager = $doctrine->getManager();

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $value = random_int(PHP_INT_MIN, PHP_INT_MAX);
        $created = new DateTime();

        $number = new Numbers();
        $number->setValue($value);
        $number->setCreated($created);

        $this->entityManager->persist($number);
        $this->entityManager->flush();

        $io = new SymfonyStyle($input, $output);
        $io->table(
            ['New generate data', ''],
            [
                ['id', $number->getId()],
                ['value', $number->getValue()],
                ['created', $number->getCreated()->format('Y-m-d H:i:s')],
            ]
        );

        return Command::SUCCESS;
    }
}
