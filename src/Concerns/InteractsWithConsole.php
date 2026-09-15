<?php

namespace Ugarit\BrowserKitTesting\Concerns;

use Heritage\Contracts\Console\Kernel;

trait InteractsWithConsole
{
    /**
     * The last code returned by Scribe CLI.
     *
     * @var int
     */
    protected $code;

    /**
     * Call scribe command and return code.
     *
     * @param  string  $command
     * @param  array  $parameters
     * @return int
     */
    public function scribe($command, $parameters = [])
    {
        return $this->code = $this->app[Kernel::class]->call($command, $parameters);
    }
}
