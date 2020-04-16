<?php

namespace Console\App\Commands;

use Console\App\Services\Staff\{
    DesignerService,
    DeveloperService,
    ManagerService,
    TesterService
};
use Symfony\Component\Console\Command\Command;

class EmployeeCommand extends Command
{
    private $staff = [
        'designer'  => DesignerService::class,
        'developer' => DeveloperService::class,
        'manager'   => ManagerService::class,
        'tester'    => TesterService::class,
    ];

    protected function getEmployee($employee) {
        return isset($this->staff[$employee]) ? new $this->staff[$employee]() : false;
    }
}