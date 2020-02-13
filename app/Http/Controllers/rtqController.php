<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rtqController extends Controller
{
    /***
	Calculate function process data and show price to broker
	***/
	function calculate(Request $req){
		// set all required values
		$province = ucfirst( $req['province'] );
		$yearsBuilt =  $req['yearsBuilt'];
		$fireDeptDistance = ucfirst( $req['fireDeptDistance'] );
		$fireDeptType = ucwords( $req['fireDeptType'] );
		$hydrant = ucfirst( $req['hydrant'] );
		$buildingLimit = $this->checkValue($req['buildingLimit']);
		$contentsLimit = $this->checkValue($req['contentsLimit']);
		$rentalIncomeLimit = $this->checkValue($req['rentalIncomeLimit']);
		$garageLimit = $this->checkValue($req['garageLimit']);
		$shedLimit = $this->checkValue($req['shedLimit']);
		$liability = $req['liability'];

		// get json data from lookup files
		$amf_rates = json_decode(file_get_contents(public_path().'/json/amf_rates.json'), true);
		$constructiontype = json_decode(file_get_contents(public_path().'/json/constructiontype.json'), true);
		$firedept = json_decode(file_get_contents(public_path().'/json/firedept.json'), true);
		$firedepttype = json_decode(file_get_contents(public_path().'/json/firedepttype.json'), true);
		$hydrants = json_decode(file_get_contents(public_path().'/json/hydrants.json'), true);
		$provincerate = json_decode(file_get_contents(public_path().'/json/provincerate.json'), true);
		$towngrade = json_decode(file_get_contents(public_path().'/json/towngrade.json'), true);

		// find building age
		$age = date("Y") - $yearsBuilt;
		if($age <= 25){
			$age_rate = 'under25';
		}else{
			$age_rate = 'over25';
		}

		$hydrantVal = $hydrants[0][$hydrant]['value'];
		$fd = $firedept[0][$fireDeptDistance]['value'];
		$fdt = $firedepttype[0][$fireDeptType]['value'];
		$findTG = $fd.$fdt.$hydrantVal;
		$tg = $towngrade[0][$findTG]['tg'];

		$provRate = $amf_rates[$age_rate][0][$province][$tg];
		$rentalIncomeLimitRate = $provRate * 0.75;

		if($liability != 'none'){
			$liabilityVal = $amf_rates[$age_rate][0][$province][$liability];
		}else{
			$liabilityVal = 0;
		}

		$propertyTotal = ceil(($buildingLimit*$provRate)/100) + ceil(($contentsLimit*$provRate)/100) + ceil(($rentalIncomeLimit*$rentalIncomeLimitRate)/100) + ceil(($garageLimit*$provRate)/100) + ceil(($shedLimit*$provRate)/100) ;

		$fee = $amf_rates[$age_rate][0][$province]['policy_fee'];

		$total = $propertyTotal + $liabilityVal + $fee ;

		// make array to store value and return json to display price 
		$priceArray = array();
		$priceArray['propertyTotal'] = $propertyTotal;
		$priceArray['liabilityVal'] = $liabilityVal;
		$priceArray['fee'] = $fee;
		$priceArray['total'] = $total;

		return json_encode($priceArray);

	}

	// function to check number value 
	function checkValue($fieldVal){
		if($fieldVal != ''){
			return $fieldVal;
		}else{
			return '0';
		}
	}

	/***

	Submit function will get all data of form and validate them before make PDF and send email

	***/
	function finish(Request $req){
		$formData = json_decode($req['formData']);
		
		$fd = json_decode($this->formatFormDataToProperJson($formData) , true );
		//echo $fd[0]['contact_phone_number']['value'];
		return $fd;
		$valid = $this->validation($fd);
	}

	/**
	Format form data to proper json way so we can get extract data easily from json using key as fieldID 
	**/
	function formatFormDataToProperJson($fd){
		// check data size to add comma at end of each json value except last one
		$i = 1;
		$json = '[ {';
		foreach ($fd as $key => $value) {
			foreach ($value as $k => $v) {
				if($k == 'name'){
					$json .= '"'.$v.'": { ';
				}else if($k == 'value'){
					$json .= '"value" : "'.$v.'" }';
					if($i < sizeof($fd)){
						$json .= ',';
					}
				}

			}
			$i++;
		}
		$json .= '} ]';
		
		return $json;
	}

	// validate data
	function validation($fd){
		// get all data need to validate from form data
		$risk_address_howmany_mortgagees = $fd[0]['risk_address_howmany_mortgagees']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_hasInsuredCancelInsurance = $fd[0]['risk_address_hasInsuredCancelInsurance']['value'];
		$risk_address_noOfClaims = $fd[0]['risk_address_noOfClaims']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
		$risk_address_existingInsurer = $fd[0]['risk_address_existingInsurer']['value'];
	}

	// Generate PDF for broker
	function generatePDF(){

	}
}


