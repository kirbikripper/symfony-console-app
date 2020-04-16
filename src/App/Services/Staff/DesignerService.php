<?php

namespace Console\App\Services\Staff;

use Console\App\Services\Staff\Contracts\{
    Art,
    CommunicateWithManager
};

class DesignerService extends StaffService
{
    use Art, CommunicateWithManager;
}