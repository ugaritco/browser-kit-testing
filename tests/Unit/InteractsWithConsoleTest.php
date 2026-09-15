<?php

namespace Ugarit\BrowserKitTesting\Tests\Unit;

use Heritage\Contracts\Console\Kernel;
use Ugarit\BrowserKitTesting\Concerns\InteractsWithConsole;
use Ugarit\BrowserKitTesting\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InteractsWithConsoleTest extends TestCase
{
    use InteractsWithConsole;

    protected $app;

    #[Test]
    public function call_scribe_command_return_code()
    {
        $this->app[Kernel::class] = new class
        {
            public function call($command, $parameters)
            {
                return 'User was created.';
            }
        };
        $command = 'app:user';
        $parameters = ['name' => 'john'];

        $this->assertSame(
            'User was created.',
            $this->scribe($command, $parameters)
        );

        $this->assertSame(
            $this->code,
            $this->app[Kernel::class]->call($command, $parameters)
        );
    }
}
