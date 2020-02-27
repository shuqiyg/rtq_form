<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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

		// get calculateArray
		$calculateArray = $this->getCalculateArray($province,$yearsBuilt,$fireDeptDistance,$fireDeptType,$hydrant,$buildingLimit,$contentsLimit,$rentalIncomeLimit,$garageLimit,$shedLimit,$liability);

		return json_encode($calculateArray);

	}

	// function to set priceArray
	public function getCalculateArray($province,$yearsBuilt,$fireDeptDistance,$fireDeptType,$hydrant,$buildingLimit,$contentsLimit,$rentalIncomeLimit,$garageLimit,$shedLimit,$liability){
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
		$priceArray['towngrade'] = $tg;
		$priceArray['total'] = $total;
		$priceArray['amfRate'] = $provRate;

		return $priceArray;
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
		$noOfMortgageesArray = json_decode($req['noOfMortgageesArray'], true);
		$noOfClaimsArray = json_decode($req['noOfClaimsArray'], true);
		$referNotMatchReason = json_decode($req['referNotMatchReason'], true);
		$fdFormattedJson = $this->formatFormDataToProperJson($formData,$noOfMortgageesArray,$noOfClaimsArray,$referNotMatchReason);
		$fd = json_decode($fdFormattedJson , true );
		
		//echo $fd[0]['contact_phone_number']['value'];
		$binding = $req['binding'];
		// before closing json, validate rules and add status in json
		// send json to check refer rules
		$valid = $this->validation($fd);
		$status = '';
		if($valid['valid'] == true && $binding == "Yes"){
			$status = "Bound";
		}else if($valid['valid'] == true && ($binding == "" || $binding == "No") ){
			$status = "Quoted";
		}else{
			$status = "Assigned";
		}
		// add status to form data array
		$fd[0]['status']['value'] = $status;
		
		// encode form data
		$fdJson = json_encode($fd);
		
		//get calculate array
		// set all required values
		$province = ucfirst( $fd[0]['risk_address_province']['value'] );
		$yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];
		$fireDeptDistance = ucfirst( $fd[0]['fireAlarmDetectors_fireDeptDistance']['value'] );
		$fireDeptType = ucwords( $fd[0]['fireAlarmDetectors_fireDeptTye']['value'] );
		$hydrant = ucfirst( $fd[0]['fireAlarmDetectors_hydrant']['value'] );
		$buildingLimit = $this->checkValue($fd[0]['coverage_buildingLimit']['value']);
		$contentsLimit = $this->checkValue($fd[0]['coverage_contentsLimit']['value']);
		$rentalIncomeLimit = $this->checkValue($fd[0]['coverage_rentalIncomeLimit']['value']);
		$garageLimit = $this->checkValue($fd[0]['coverage_garageLimit']['value']);
		$shedLimit = $this->checkValue($fd[0]['coverage_shedLimit']['value']);
		$liability = $fd[0]['coverage_liabilityLimit']['value'];

		// get calculateArray
		$calculateArray = $this->getCalculateArray($province,$yearsBuilt,$fireDeptDistance,$fireDeptType,$hydrant,$buildingLimit,$contentsLimit,$rentalIncomeLimit,$garageLimit,$shedLimit,$liability);

		// set calculated array to form data 
		$fd[0]['towngrade']['value'] = $calculateArray['towngrade'];

		// remove towngrade from calculateArray to avoid duplication in form data array
		unset($calculateArray['towngrade']);

		$fd[0]['calculation'] = $calculateArray;
		//$fd[0]['liabilityVal']['value'] = $calculateArray['liabilityVal'];
		//$fd[0]['fee']['value'] = $calculateArray['fee'];
		//$fd[0]['total']['value'] = $calculateArray['total'];
		$ca =  json_encode($calculateArray);

		// now Send email to ..... to process email
		$emailSent = $this->emailSent($fd);
		//$emailSent = 0;
		if($emailSent == 0){
			$message = array('message'=>'Form has been sent to AMF.','success'=>'true');
		}else{
			$message = array('message'=>'There is something wrong to send form to AMF.','success'=>'false');	
		}
		
		return $message;
		
	}

	/**
	Format form data to proper json way so we can get extract data easily from json using key as fieldID 
	**/
	function formatFormDataToProperJson($fd,$noOfMortgageesArray,$noOfClaimsArray,$referNotMatchReason){
		// check data size to add comma at end of each json value except last one
		$i = 1;
		// start json
		$json = '[ {';
		// loop through all form data
		foreach ($fd as $key => $value) {
			foreach ($value as $k => $v) {
				// if value has key name then take it out and if has key value then append it under key name
				if($k == 'name'){
					$json .= '"'.$v.'": { ';
				}else if($k == 'value'){
					$json .= '"value" : "'.$v.'" }';
					// add comma at end of each data except last one
					if($i < sizeof($fd)){
						$json .= ',';
					}
				}

			}
			$i++;
		}

		if($noOfMortgageesArray != ''){
			// if there is mortgagees then add comma to append list of mortgagees
			if(sizeof($noOfMortgageesArray) > 0){
				$json .= ',';
			}
			// list data of mortgagees
			$j = 0;
			foreach ($noOfMortgageesArray as $key => $value) {
				// give name 
				$json .= '"mortagagee_'.($j+1).'": {';
				// append value to json
				$r = 1;
				foreach ($value as $k => $v) {
					$json .= '"'.$k.'" : "'.$v.'"';
					// add comma at end of each value except last
					if($r < sizeof($value)){
						$json .= ',';
					}
					$r++;
				}
				// complete each mortgagee
				$json .= '}';
				// here $j start with 0 and we have array started with 1 so we add $j+1 to add comma at end of each mortgagee except last one
				if(($j+1) < sizeof($noOfMortgageesArray)){
					$json .= ',';
				}
				// go out of loop if all data of array added to json
				if($j == sizeof($noOfMortgageesArray)){
					goto out;
				}
				$j++;
			}
			out:
		}

		if($noOfClaimsArray != ''){
			// if there is claim then add comma to append list of claims
			if(sizeof($noOfClaimsArray) > 0){
				$json .= ',';
			}
			// list data of claims
			$t = 0;
			foreach ($noOfClaimsArray as $key => $value) {
				// give name 
				$json .= '"claim_'.($t+1).'": {';
				// append value to json
				$r = 1;
				foreach ($value as $k => $v) {
					$json .= '"'.$k.'" : "'.$v.'"';
					// add comma at end of each value except last
					if($r < sizeof($value)){
						$json .= ',';
					}
					$r++;
				}
				// complete each claim
				$json .= '}';
				// here $t start with 0 and we have array started with 1 so we add $t+1 to add comma at end of each mortgagee except last one
				if(($t+1) < sizeof($noOfClaimsArray)){
					$json .= ',';
				}
				// go out of loop if all data of array added to json
				if($t == sizeof($noOfClaimsArray)){
					goto out2;
				}
				$t++;
			}
			out2:
		}


		if($referNotMatchReason != ''){
			// Show this reasons in last and always add comma before starting for valid json
			
			// append value to json
			$r = 0;
			$json .= ',"ReferNotPassedReason": {';
			foreach ($referNotMatchReason as $key => $value) {
				$json .= '"'.$key.'" : "'.$value.'"';
					// add comma at end of each value except last
				
				if(($r+1) < sizeof($referNotMatchReason)){
					$json .= ',';
				}
				// go out of loop if all data of array added to json
				if($r == sizeof($referNotMatchReason)){
					goto out3;
				}
				$r++;
			}
			// complete each claim
			$json .= '}';
					
			out3:
			
			// here $t start with 0 and we have array started with 1 so we add $t+1 to add comma at end of each mortgagee except last one
			
			
		}

		// end json
		$json .= '} ]';
		
		return $json;
	}

	// validate data ( check with refer rules )
	function validation($fd){
		// get all data need to validate or  refer from form data
		$risk_address_howmany_mortgagees = trim($fd[0]['risk_address_howmany_mortgagees']['value']);
		$risk_address_existingInsurer = trim($fd[0]['risk_address_existingInsurer']['value']);
		$risk_address_hasInsuredCancelInsurance = trim($fd[0]['risk_address_hasInsuredCancelInsurance']['value']);
		$risk_address_noOfClaims = trim($fd[0]['risk_address_noOfClaims']['value']);
		$risk_address_incidenceOfClaim_type = trim($fd[0]['risk_address_incidenceOfClaim_type']['value']);
		$occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
		$occupancy_commercialOperations = trim($fd[0]['occupancy_commercialOperations']['value']);
		$occupancy_shortTermRentals = trim($fd[0]['occupancy_shortTermRentals']['value']);
		$buildingConstruction_yearBuilt = trim($fd[0]['buildingConstruction_yearBuilt']['value']);
		
		// find building age
		if($buildingConstruction_yearBuilt == '' || empty($buildingConstruction_yearBuilt)){
			$building_age = 0;
		}else{
			$building_age = date("Y") - $buildingConstruction_yearBuilt;	
		}
			

		$buildingConstruction_isBuildingHeritage = trim($fd[0]['buildingConstruction_isBuildingHeritage']['value']);
		$buildingConstruction_wiringType = trim($fd[0]['buildingConstruction_wiringType']['value']);
		$buildingConstruction_amperage = trim($fd[0]['buildingConstruction_amperage']['value']);
		$buildingConstruction_heatingPrimaryType = trim($fd[0]['buildingConstruction_heatingPrimaryType']['value']);
		$fireAlarmDetectors_fireDeptTye = trim($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
		$liability_doesPremisesFenced = trim($fd[0]['liability_doesPremisesFenced']['value']);

		// now check all rules
		$valid = false;
		$referMatchArray = array();
		// if any rule is not matched then make valid false
		if(($risk_address_howmany_mortgagees > 2) || ($risk_address_existingInsurer == "AMF")  || ($risk_address_hasInsuredCancelInsurance == "Yes") || ($risk_address_noOfClaims > 0) || ($risk_address_incidenceOfClaim_type == "Liability") || ($occupancy_rentedDwellingUnits == "4-6 units" || $occupancy_rentedDwellingUnits == "6+ units") || ($occupancy_commercialOperations == "Yes") || ($occupancy_shortTermRentals == "Yes") || ($building_age > 75) || ($buildingConstruction_isBuildingHeritage == "Yes") || ($buildingConstruction_wiringType == "Knob & Tube") || ($buildingConstruction_amperage == "60AMP" || $buildingConstruction_amperage == "100AMP Fuse") || ($buildingConstruction_heatingPrimaryType == "Wood-Solid") || ($fireAlarmDetectors_fireDeptTye == "Volunteer") || ($liability_doesPremisesFenced == "No")){
			$valid = false;

			
			if($risk_address_howmany_mortgagees > 2){
				array_push($referMatchArray, 'Mortgagee is greater than 2.');
			}
			if($risk_address_existingInsurer == 'AMF'){
				array_push($referMatchArray, 'Existing insurer is AMF.');
			}
			if($risk_address_hasInsuredCancelInsurance == "Yes"){
				array_push($referMatchArray, 'Insured has cancelled insurance.');
			}
			if($risk_address_noOfClaims != '0' && $risk_address_noOfClaims != ''){
				array_push($referMatchArray, 'Claims in last 5 years.');
			}
			if(trim($fd[0]['risk_address_incidenceInClaim']['value']) == "Yes"){
				if($risk_address_incidenceOfClaim_type == "Liability"){
					array_push($referMatchArray, 'Type of claim incidence is liablity');
				}
			}
			if(in_array($occupancy_rentedDwellingUnits, array("4-6 units","6+ units") ) ){
				array_push($referMatchArray, 'Rented Dwelling units is more than 4 units.');
			}

			if($occupancy_commercialOperations == "Yes"){
				array_push($referMatchArray, 'There is commercial operations in premises.');
			}
			if($occupancy_shortTermRentals == "Yes"){
				array_push($referMatchArray, 'There is short term rentals allowed.');
			}
			if($building_age > 75){
				array_push($referMatchArray, 'Building age is greater than or equals to 75.');
			}
			if($buildingConstruction_isBuildingHeritage == "Yes"){
				array_push($referMatchArray, 'Building is heritage.');
			}
			if($buildingConstruction_wiringType == "Knob & Tube"){
				array_push($referMatchArray, 'Building wiring type is knob & tube.');
			}
			if(in_array($buildingConstruction_amperage, array("60AMP","100AMP Fuse") ) ){
				array_push($referMatchArray, 'Building construnction amperage is 60 AMP or 100 AMP fuse.');
			}

			if($buildingConstruction_heatingPrimaryType == "Wood-Solid"){
				array_push($referMatchArray, 'Building heating primary type is wood/solid.');
			}
			if($fireAlarmDetectors_fireDeptTye == "Volunteer"){
				array_push($referMatchArray, 'Fire department type is volunteer.');
			}
			if(trim($fd[0]['liability_doesPremisesHavePool']['value']) == "Yes"){
				if($liability_doesPremisesFenced == "No"){
					array_push($referMatchArray, 'Premises has not fenced and gated.');
				}
			}
			
		}else if(($risk_address_howmany_mortgagees == "") || ($risk_address_existingInsurer == "")  || ($risk_address_hasInsuredCancelInsurance == "") || ($risk_address_noOfClaims == "") || ($risk_address_incidenceOfClaim_type == "") || ($occupancy_rentedDwellingUnits == "" ) || ($occupancy_commercialOperations == "") || ($occupancy_shortTermRentals == "") || ($building_age == 0) || ($buildingConstruction_isBuildingHeritage == "") || ($buildingConstruction_wiringType == "") || ($buildingConstruction_amperage == "" ) || ($buildingConstruction_heatingPrimaryType == "") || ($fireAlarmDetectors_fireDeptTye == "") || ($liability_doesPremisesFenced == "")){
			$valid = 'Empty';
			if($risk_address_howmany_mortgagees == ""){
				array_push($referMatchArray, 'Please select how many mortgagee field.');
			}
			if($risk_address_existingInsurer == ''){
				array_push($referMatchArray, 'Plese select existing insurer field.');
			}
			if($risk_address_hasInsuredCancelInsurance == ""){
				array_push($referMatchArray, 'Plese select has the insured been cancelled/declined insurance ? field.');
			}
			if($risk_address_noOfClaims == ''){
				array_push($referMatchArray, 'Plese select  number of claims in the last 5 years ? field.');
			}
			if(trim($fd[0]['risk_address_incidenceInClaim']['value']) == "Yes"){
				if($risk_address_incidenceOfClaim_type == ""){
					array_push($referMatchArray, 'Plese select type of claim field');
				}
			}
			if($occupancy_rentedDwellingUnits == "" ){
				array_push($referMatchArray, 'Plese select rented dwelling units field.');
			}

			if($occupancy_commercialOperations == ""){
				array_push($referMatchArray, 'Plese select are there any commercial operations on the premises ? field.');
			}
			if($occupancy_shortTermRentals == ""){
				array_push($referMatchArray, 'Plese select are short term rentals allowed (e.g. AirBNB) field.');
			}
			if($building_age > 75){
				array_push($referMatchArray, 'Please select year built field.');
			}
			if($buildingConstruction_isBuildingHeritage == ""){
				array_push($referMatchArray, 'Please select is building considered a heritage building ? field.');
			}
			if($buildingConstruction_wiringType == ""){
				array_push($referMatchArray, 'Please select wiring type field.');
			}
			if($buildingConstruction_amperage == "" ){
				array_push($referMatchArray, 'Please select amperage field.');
			}

			if($buildingConstruction_heatingPrimaryType == ""){
				array_push($referMatchArray, 'Please select heating primary type field.');
			}
			if($fireAlarmDetectors_fireDeptTye == ""){
				array_push($referMatchArray, 'Please select fire department type field.');
			}
			if(trim($fd[0]['liability_doesPremisesHavePool']['value']) == "Yes"){
				if($liability_doesPremisesFenced == ""){
					array_push($referMatchArray, 'Please select are the premises fenced and gated? field.');
				}
			}
		}else{
			$valid = true;
			$referMatchArray = array();
		}

		return array("valid"=>$valid,"matchArray"=>$referMatchArray);

	}

	// email sent to AMF
	public function emailSent($fd){
		$formData = json_encode($fd);

		// sending email
		//$result = Mail::send($email_template, array('submission' => $submission,'email_template',$email_template), function ($message) use ($submission, $inputs, &$email,$uemail,$email_template) {
        $result = Mail::send([], [], function ($message) use ($formData) {

        	//$result = Mail::raw($email_template,  function ($message) use ($submission, $inputs, &$email,$uemail,$email_template) {
            $message->from('no-reply@amfredericks.com');//'no-reply@amfredericks.com'
            $message->subject('RTQ-Form');
            $message->to('ankit.savaliya@amfredericks.com');
            $message->setBody($formData);

            $email = $message->getSwiftMessage();
            $email->setCharset('utf-8');
            $email->setMaxLineLength(1000);
            $email->setContentType('text/html');
        });

        return $result;

	}

	/**
	This function will check all refer rules match or not 
	**/
	public function checkReferRules(Request $req){
		$formData = json_decode($req['formData']);
		$fdFormattedJson = $this->formatFormDataToProperJson($formData,'','','');
		$fd = json_decode($fdFormattedJson , true );
		// check refer rule is valid or not
		$referValid = $this->validation($fd);

		if($referValid['valid'] == false){
			// check which refer vaidation rules is not matched to show it to users
			$matchedOrNot = $referValid['matchArray'];
		}else if($referValid['valid'] == 'Empty'){
			$matchedOrNot = 'Empty';
		}else{
			$referValid['valid'] = 'NotMatched';
		}

		return $referValid;
	}

}


