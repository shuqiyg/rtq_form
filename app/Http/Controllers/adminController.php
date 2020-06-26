<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    // FUNCTION TO SAVE/UPDATE BANNER DETAILS
    public function bannerSave(Request $req){
    	$bf = $req['bannerForm'];
    	$bm = $req['bannerMSG'];
    	$ba = $req['bannerActive'];
    	// Read File
    	$jsonString = file_get_contents(public_path().'/json/bannerMSG.json');
		$data = json_decode($jsonString, true);

		if($bm == null || empty($bm)){
			$bm = '';
		}
  		// Update Key
  		$data[$bf][0]['message']['value'] = $bm;
  		$data[$bf][0]['message']['active'] = $ba;

	    // Write File
    	$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
    	file_put_contents(public_path().'/json/bannerMSG.json', stripslashes($newJsonString));

    	return "done";    	
    }

    // FUNCTION TO GET BANNER JSON DATA
    function bannerJSON(){
    	// get banner message
        $bannerMSG = json_decode(file_get_contents(public_path().'/json/bannerMSG.json'), true);
        return $bannerMSG;
    }

    // FUNCTION TO GET AMF RATES JSON DATA
    function amfRateJSON(Request $req){
    	$formVal = $req->query('formVal');
    	
    	if($formVal == 'rentedDwelling'){
    		$amfRatesJson = json_decode(file_get_contents(public_path().'/json/amf_rates.json'), true);	
    	}else if($formVal == 'ownerOccupied'){
    		$amfRatesJson = json_decode(file_get_contents(public_path().'/json/amf_rates_ownerOccupied.json'), true);	
    	}else if($formVal == 'plumbing'){
    		$amfRatesJson = json_decode(file_get_contents(public_path().'/json/amf_rates_plumbing.json'), true);	
    	}else{
    		$amfRatesJson = json_encode(array("message"=>"No rates available."));
    	}
        
        return $amfRatesJson;
    }

    // FUNCTION TO GET Province Mod Property Modifier JSON DATA
    function propertyProvModJson(){
    	$provModPropertyJson = json_decode(file_get_contents(public_path().'/json/propertyMod_province.json'), true);	
    	return $provModPropertyJson;
    }

    // FUNCTION TO SAVE/UPDATE province mod of Property modifier
    public function propertyProvModSave(Request $req){
    	$province = $req['province'];
    	$newMod = $req['propertyProvModMod'];
    	// Read File
    	$jsonString = file_get_contents(public_path().'/json/propertyMod_province.json');
		$data = json_decode($jsonString, true);

		if($newMod == null || empty($newMod)){
			$newMod = '';
		}
  		// Update Key
  		$data[0][$province]['Mod'] = $newMod;
  		
	    // Write File
    	$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
    	file_put_contents(public_path().'/json/propertyMod_province.json', stripslashes($newJsonString));

    	return "done";    	
    }

    // FUNCTION TO GET Towngrade Mod Property Modifier JSON DATA
    function propertyTGModJson(){
    	$towngradeModPropertyJson = json_decode(file_get_contents(public_path().'/json/propertyMod_towngrade.json'), true);	
    	return $towngradeModPropertyJson;
    }

    // FUNCTION TO SAVE/UPDATE towngrade mod of Property modifier
    public function propertyTGModSave(Request $req){
    	$towngrade = $req['towngrade'];
    	$newMod = $req['propertyTGModMod'];
    	// Read File
    	$jsonString = file_get_contents(public_path().'/json/propertyMod_towngrade.json');
		$data = json_decode($jsonString, true);

		if($newMod == null || empty($newMod)){
			$newMod = "0";
		}
  		// Update Key
  		$data[0][$towngrade]['Mod'] = $newMod;
  		
	    // Write File
    	$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
    	file_put_contents(public_path().'/json/propertyMod_towngrade.json', stripslashes($newJsonString));

    	return "done";    	
    }

    // FUNCTION TO GET Construction Mod Property Modifier JSON DATA
    function propertyConModJson(){
    	$conModPropertyJson = json_decode(file_get_contents(public_path().'/json/propertyMod_construction.json'), true);	
    	return $conModPropertyJson;
    }

    // FUNCTION TO SAVE/UPDATE Construction mod of Property modifier
    public function propertyConModSave(Request $req){
    	$conType = $req['constructionType'];
    	$conTypeCode = $req['propertyConModCode'];
    	$newMod = $req['propertyConModMod'];
    	// Read File
    	$jsonString = file_get_contents(public_path().'/json/propertyMod_construction.json');
		$data = json_decode($jsonString, true);

		if($newMod == null || empty($newMod)){
			$newMod = "0";
		}
  		// Update Key
  		$data[0][$conType]['mod'] = $newMod;
  		$data[0][$conType]['code'] = $conTypeCode;
  		
	    // Write File
    	$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
    	file_put_contents(public_path().'/json/propertyMod_construction.json', stripslashes($newJsonString));

    	return "done";    	
    }

    // FUNCTION TO GET form province rule table  JSON DATA
    function getFormProvinceRulesJson(){
        $formProvinceRulesJson = json_decode(file_get_contents(public_path().'/json/forms_provinceRules.json'), true);    
        return $formProvinceRulesJson;
    }

    // FUNCTION TO SAVE/UPDATE form province rule table 
    public function formProvinceRuleUpdate(Request $req){
        $form = $req['fprForm'];
        $province = $req['fprProvince'];
        $roq = $req['fprRQ'];
        // Read File
        $jsonString = file_get_contents(public_path().'/json/forms_provinceRules.json');
        $data = json_decode($jsonString, true);

        if($roq == null || empty($roq)){
            $roq = "";
        }
        // Update Key
        $data[$form][$province] = $roq;
        
        // Write File
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(public_path().'/json/forms_provinceRules.json', stripslashes($newJsonString));

        return "done";      
    }

    // FUNCTION TO SAVE/UPDATE cefScheduleLimit table
    public function cefScheduleLimitUpdate(Request $req){
        $form = $req['cefSLForm'];
        $province = $req['cefSLProvince'];
        $cefSLTotal = $req['cefSLTotal'];
        // Read File
        $jsonString = file_get_contents(public_path().'/json/cefLimitByItemTotal.json');
        $data = json_decode($jsonString, true);

        if($cefSLTotal == null || empty($cefSLTotal)){
            $cefSLTotal = "";
        }
        // Update Key
        $data[0][$form]['cefSceduleLimit'][$province]['limitByTotal'] = $cefSLTotal;
        
        // Write File
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(public_path().'/json/cefLimitByItemTotal.json', stripslashes($newJsonString));

        return "done";      
    }
}
