<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IsCanCommand extends EmployeeCommand
{
    protected function configure()
    {
        $this->setName('is-can')
            ->setDescription('Check is staff has permission')
            ->setHelp('help for test command')
            ->addArgument('employee', InputArgument::REQUIRED, 'Employee: designer|developer|manager|tester')
            ->addArgument('permission', InputArgument::REQUIRED, 'Permission: Art|CommunicateWithManager|CreateTask|TestCode|WriteCode');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $employee = $this->getEmployee($input->getArgument('employee'));

        if (!$employee) {
            $output->writeln('Employee must be designer|developer|manager|tester');

            //fix fatal error
            return 0;
        }

        $output->writeln($employee->hasPermission($input->getArgument('permission')) ? 'true' : 'false');

        //fix fatal error
        return 0;
    }
}