<?php

namespace Console\App\Services\Staff;

class StaffService
{
    /**
     * @var array
     */
    public $permissions = [];

    private $allPermissions = [
        'art',
        'communicateWithManager',
        'createTask',
        'testCode',
        'writeCode'
    ];

    public function __construct()
    {
        foreach ($this->allPermissions as $permission) {
            if (method_exists($this, $permission)) {
                $this->permissions[] = $permission;
            }
        }
    }

    /**
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions);
    }
}