<?php

namespace Lazy\LaravelSls\Tests;

use Orchestra\Testbench\TestCase;
use Lazy\LaravelSls\LaravelSlsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelSlsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
