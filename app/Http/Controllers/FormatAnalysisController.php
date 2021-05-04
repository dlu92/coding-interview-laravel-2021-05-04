<?php

/**
 * @author David Luis
 * Description:
 * Class for the analysis of the code format
 * 
 */

namespace App\Http\Controllers;

// Libs
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

class FormatAnalysisController extends Controller
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
        $nameTemplate = 'layouts.formatAnalysis';

        if(View::exists($nameTemplate)){
            $string = trim(data_get($this->request::all(), 'string', ''));
            $data = [
                'string' => $string,
                'analysis' => $this->analysis($string) ? 'true' : 'false',
            ];
            
            return view($nameTemplate, ['data' => $data]);
        }

        Log::error('The view does not exist');
        
        return abort(404);
    }

    /**
     * Method that parses the code format
     *
     * @param  string  $string
     * @return boolean
     */
    public function analysis($string)
    {
        $numCharacters = strlen($string);
        $string = preg_replace('([^\{,\},\(,\),\[,\]])', '', $string);

        if($numCharacters > 0 && strlen($string) == $numCharacters){

            $characters = str_split($string);
            $openings = [];

            foreach($characters as $character){
                
                $type = $this->typeCharacter($character);

                if(array_search($character, ['(','{','[']) > -1){
                    $openings[] = $type;
                } else {
                    $lastOpening = (count($openings) - 1);
                    if($type == data_get($openings, $lastOpening, false)){
                        unset($openings[$lastOpening]);
                        $openings = array_values($openings);
                    } else {
                        Log::error('The string is not in the correct format');
                        return false;
                    }
                }

            }

            if(count($openings) < 1){
                Log::info('Analysis completed successfully');
                return true;
            }

            Log::error('The string is not in the correct format');
            return false;

        }

        Log::error('The string does not meet the characteristics to be analyzed');
        return null;
        
    }

    /**
     * Method that assigns a type to characters
     *
     * @param  string  $string
     * @return integer
     */
    private function typeCharacter($character)
    {
        switch($character){
            case '(':
            case ')':
                return (int) 1;
                break;
            case '{':
            case '}':
                return 2;
                break;
            case '[':
            case ']':
                return 3;
                break;
            default:
                return (int) 0;
        }
    }

}
