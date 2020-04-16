<?php

namespace Console\App\Services\Staff;

use Console\App\Services\Staff\Contracts\{
    CommunicateWithManager,
    TestCode,
    WriteCode
};

class DeveloperService extends StaffService
{
    use WriteCode, TestCode, CommunicateWithManager;
}