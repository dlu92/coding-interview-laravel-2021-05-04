<?php

namespace Tests\Feature;

// Libs
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

// Controllers
use App\Http\Controllers\SearchStringController;

class SearchStringTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {
        $searchString = new SearchStringController();
        $string = Str::random(300);

        $this->assertTrue(count($searchString->countWords($string)) > 0);
        $this->assertTrue(!count($searchString->countWords('')) > 0);
    }
}
