<?php

namespace Ugarit\BrowserKitTesting\Tests;

use Heritage\Foundation\Application;
use Ugarit\BrowserKitTesting\TestCase;

class TestCaseTest extends TestCase
{
    use CreatesApplication;

    public function test_refresh_application()
    {
        $this->refreshApplication();

        $this->assertInstanceOf(Application::class, $this->app);
    }
}
