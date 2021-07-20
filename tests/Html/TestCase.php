<?php

namespace SpenserHale\Html\Test\Html;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Mockery;
use SpenserHale\Html\Html;
use SpenserHale\Html\Test\Concerns\AssertsHtmlStrings;

abstract class TestCase extends \SpenserHale\Html\Test\TestCase
{
    use AssertsHtmlStrings;

    /** @var \Mockery\MockInterface */
    protected $request;

    /** @var array */
    protected $session = [];

    /** @var \SpenserHale\Html\Html */
    protected $html;

    public function setUp(): void
    {
        parent::setUp();

        $this->html = new Html();
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
