<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PermissionsListCommand extends EmployeeCommand
{
    protected function configure()
    {
        $this->setName('permission-list')
            ->setDescription('Check is staff has permission')
            ->setHelp('help for test command')
            ->addArgument('employee', InputArgument::REQUIRED, 'Employee: designer|developer|manager|tester');
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

        foreach ($employee->permissions as $permission) {
            $output->writeln('- ' . $permission);
        }

        //fix fatal error
        return 0;
    }
}