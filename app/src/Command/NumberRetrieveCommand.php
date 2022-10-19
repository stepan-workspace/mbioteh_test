<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Numbers;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(
    name: 'number:retrieve',
    description: 'Get number by id',
    hidden: false,
)]
class NumberRetrieveCommand extends Command
{
    private $entityManager;

    public function __construct(ManagerRegistry $doctrine) {
        $this->entityManager = $doctrine->getManager();

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('id', InputArgument::REQUIRED, 'Enter Id on records:');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = $input->getArgument('id');

        $number = $this->entityManager->getRepository(Numbers::class)->find($id);

        if (!$number) {
            $output->writeln('Record not found for id ' . $id);
            return Command::SUCCESS;
        }

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
