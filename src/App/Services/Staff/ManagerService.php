<?php

namespace Console\App\Services\Staff;

use Console\App\Services\Staff\Contracts\CreateTask;

class ManagerService extends StaffService
{
    use CreateTask;
}