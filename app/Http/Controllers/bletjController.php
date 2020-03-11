<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class bletjController extends Controller
{
    // function to parse excel
    public function parseExcel(){
    	// give file address
		$address = '/public/brokercodelist.xlsx';
		// load excel file with policy column data only
		$results = Excel::load($address, function($reader) {
	    })->get(array('code','domain','status'));
	    // extract policy and add in array
	    $data = array();
		foreach ($results as $r) {
	 		$bl = array();
	 		$bl['code'] = $r->code;
	 		$bl['domain'] = $r->domain;
	 		$bl['status'] = $r->status;
	 		array_push($data, $bl);
	 	}
	    // return policy array
	    return json_encode($data);
    }

    // function to make json as per our requirement
    public function excelToJson(){
    	$excelData = $this->parseExcel();
    	$data = json_decode($excelData,true);

    	// check data size to add comma at end of each json value except last one
		$i = 1;
		// start json
		$json = '[ {';

    	foreach ($data as $key => $value) {
    		//print_r($key);
    		// loop through all form data
			foreach ($value as $k => $v) {
				// if value has key name then take it out and if has key value then append it under key name
				if($k == 'code'){
					$json .= '"'.$v.'": { ';
				}else if($k == 'domain'){
					$json .= '"domain" : "'.$v.'",';
				}else if($k == 'status'){
					$json .= '"status" : "'.$v.'"}';
					// add comma at end of each data except last one
					if($i < sizeof($data)){
						$json .= ',';
					}
				}


			}
			$i++;
			
    	}

    	// start json
		$json .= '} ]';
    	print_r($json);
    }
}
