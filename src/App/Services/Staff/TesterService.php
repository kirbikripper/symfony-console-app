<?php

namespace Console\App\Services\Staff;

use Console\App\Services\Staff\Contracts\{
    CommunicateWithManager,
    CreateTask,
    TestCode
};

class TesterService extends StaffService
{
    use TestCode, CommunicateWithManager, CreateTask;
}