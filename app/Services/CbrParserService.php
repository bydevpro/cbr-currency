<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
class CbrParserService
{
    protected $client; 
    public function __construct()
    {
        //
        

  
            $this->client = Http::baseUrl('https://www.cbr.ru/'); 
    
        
    }
    public function parse() 
        { 
            $response = $this->client->get('scripts/XML_daily.asp'); 
            $data = $response->body(); 
    
            // parse the XML data 
            $xml = simplexml_load_string($data); 
            $json = json_encode($xml); 
            $data = json_decode($json, true); 
    
            return $data; 
        } 
    }