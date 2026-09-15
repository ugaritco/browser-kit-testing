<?php

namespace Ugarit\BrowserKitTesting\Tests\Feature;

use Heritage\Foundation\Auth\User;
use Heritage\Foundation\Testing\DatabaseTransactions;
use Ugarit\BrowserKitTesting\TestCase;
use Ugarit\BrowserKitTesting\Tests\CreatesApplication;
use Orchestra\Testbench\Foundation\Env;

class ParallelTestingTest extends TestCase
{
    use CreatesApplication, DatabaseTransactions;

    protected function setUp(): void
    {
        if (class_exists(Env::class)) {
            if (Env::get('UGARIT_PARALLEL_TESTING', false) === false) {
                $this->markTestSkipped('Requires paratest to execute the tests');
            }
        } else {
            if (\Orchestra\Sidekick\Env::get('UGARIT_PARALLEL_TESTING', false) === false) {
                $this->markTestSkipped('Requires paratest to execute the tests');
            }
        }

        parent::setUp();
    }

    public function test_database_connection_name()
    {
        $databaseName = (new User)->getConnection()->getDatabaseName();

        $this->assertStringContainsString('_test_', $databaseName);
    }
}
