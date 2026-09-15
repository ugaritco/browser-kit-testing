<?php

namespace Ugarit\BrowserKitTesting\Tests;

use Heritage\Contracts\Console\Kernel;
use Heritage\Foundation\Application;

use function Orchestra\Testbench\package_path;

trait CreatesApplication
{
    /**
     * Create a new application instance.
     */
    public function createApplication(): Application
    {
        $app = require package_path('vendor/orchestra/testbench-core/ugarit/bootstrap/app.php');

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
