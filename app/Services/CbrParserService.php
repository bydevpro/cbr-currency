<?php

namespace App\Services;
use App\Models\CbrCurrency;
use Illuminate\Support\Facades\Http;
class CbrParserService
{
    protected $client; 
    protected $date;
    public function __construct()
    {
        //
        

  
            $this->client = Http::baseUrl('https://www.cbr.ru/'); 
            
    
        
    }
    public function parse() 
        { 
            $this->date= date('d/m/Y');
            $response = $this->client->get('scripts/XML_daily.asp',['date_req' => $this->date]); 
            $data = $response->body(); 
    
            // parse the XML data 
            $xml = simplexml_load_string($data); 
            $json = json_encode($xml); 
            $data = json_decode($json, true); 
    
            foreach($data['Valute'] as $value) {
                $currencies = CbrCurrency::all();
                $currency = $currencies->where('currentId', $value['@attributes']['ID'])->first();

                if ($currency) {                     
                    $currency->currentNumCode = $value['NumCode'];
                    $currency->currentName = $value['Name'];
                    $currency->currentValue = str_replace(',', '.', $value['Value']);
                    $currency->updated_at = $currency->freshTimestamp();
                    $currency->save();
                 
                   
                } else {
                    // Create a new CbrCurrency object
                    $currency = new CbrCurrency;
                    $currency->currentId = $value['@attributes']['ID'];
                    $currency->currentNumCode = $value['NumCode'];
                    $currency->currentCode = $value['CharCode'];
                    $currency->currentName = $value['Name'];
                    $currency->currentValue = str_replace(',', '.', $value['Value']);
                    $currency->save();
                }
            }
            
            return response()->json('Data inserted/updated successfully');
        } 
    }