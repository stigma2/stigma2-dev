<?php

namespace Stigma\Installation;

use Stigma\Installation\Validators\DatabaseValidation ;

class InstallManager
{
    public function getServiceForDatabase()
    {
        return new DatabaseInstallation() ;
    }
}
