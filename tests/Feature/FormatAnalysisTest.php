<?php

namespace Tests\Feature;

// Libs
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Controllers
use App\Http\Controllers\FormatAnalysisController;

class FormatAnalysisTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {
        $formatAnalysis = new FormatAnalysisController();

        $this->assertTrue($formatAnalysis->analysis('(())'));
        $this->assertTrue($formatAnalysis->analysis('([]{})[(){}]'));
        $this->assertTrue(!$formatAnalysis->analysis('[]{})'));
    }
}
