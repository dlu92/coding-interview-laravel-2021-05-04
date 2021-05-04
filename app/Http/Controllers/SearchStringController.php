<?php

/**
 * @author David Luis
 * Description:
 * Class for string search
 * 
 */

namespace App\Http\Controllers;

// Libs
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

class SearchStringController extends Controller
{

    // GLOBAL VARIABLES
    private $request;
        
    // --- PUBLIC METHODS ---

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * Method that returns the view of the form
     *
     * @return object
     */
    public function index()
    {
        $nameTemplate = 'layouts.searchString';

        if(View::exists($nameTemplate)){
            $string = trim(data_get($this->request::all(), 'string', ''));
            $data = [
                'string' => $string,
                'words' => $this->countWords($string),
            ];

            return view($nameTemplate, ['data' => $data]);
        }

        Log::error('The view does not exist');

        return abort(404);
    }

    /**
     * Method to count the words of a string
     *
     * @param  string  $string
     * @return array
     */
    public function countWords($string)
    {
        $string = preg_replace('([^A-Za-z0-9 ])', '', $string);
        $words = strlen($string) > 0 ? explode(' ', $string) : [];
        $repetitions = [];

        foreach($words as $word){
            $repetitions[$word] = substr_count($string, $word);
        }

        Log::info('Word count is complete');

        return $repetitions;
    }

}
