<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class rtqController extends Controller
{
    /**
    loadForm function will get form value and pass it to view and get all relate form data 
     **/
    public function loadForm(Request $req)
    {
        $formVal = trim($req['formVal']);
        $_SESSION['selectedTab'] = $formVal;

        return view('main')->with('formVal', $formVal);
    }

    /** 
    Get banner message
     **/
    public function getBannerMessage(Request $req)
    {
        $formID = trim($req['formID']);

        // get banner message
        $bannerMSG = json_decode(file_get_contents(public_path() . '/json/bannerMSG.json'), true);
        if ($bannerMSG[$formID][0]['message']['active'] == 0) {
            $bannerMessage = $bannerMSG[$formID][0]['message']['value'];
        } else {
            $bannerMessage = '';
        }

        return $bannerMessage;
    }

    /***
    Calculate function process data and show price to broker
     ***/
    function calculate(Request $req)
    {
        $rtqForm = $req['rtqForm'];

        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            // set all required values
            $province = ucfirst($req['province']);
            $yearsBuilt =  $req['yearsBuilt'];
            $fireDeptDistance = ucfirst($req['fireDeptDistance']);
            $fireDeptType = ucwords($req['fireDeptType']);
            $hydrant = ucfirst($req['hydrant']);
            $buildingLimit = $this->checkValue($req['buildingLimit']);
            $contentsLimit = $this->checkValue($req['contentsLimit']);
            $rentalIncomeLimit = $this->checkValue($req['rentalIncomeLimit']);
            $garageLimit = $this->checkValue($req['garageLimit']);
            $shedLimit = $this->checkValue($req['shedLimit']);
            $liability = $req['liability'];



            // get calculateArray
            $calculateArray = $this->getCalculateArray($province, $yearsBuilt, $fireDeptDistance, $fireDeptType, $hydrant, $buildingLimit, $contentsLimit, $rentalIncomeLimit, $garageLimit, $shedLimit, $liability, $rtqForm);
        } else if ($rtqForm == "homeInspector") {
            // set all required values
            $inspectionProvince = trim($req['inspectionProv']);
            $cgl_cglLimitsOfLiablitiy = trim($req['cgl_cglLimitsOfLiablitiy']);
            $cgl_eoLimitsOfLiablity = trim($req['cgl_eoLimitsOfLiablity']);
            $ops_totalGrossAnnualReceipts = trim($req['ops_totalGrossAnnualReceipts']);
            $cgl_deductible = trim($req['cgl_deductible']);
            $cgl_contractorsEquipmentFloater = trim($req['cgl_contractorsEquipmentFloater']);
            $cgl_additionalPropertyFrill = trim($req['cgl_additionalPropertyFrill']);
            $risk_address_noOfClaims = trim($req['risk_address_noOfClaims']);
            // get calculateArray
            $calculateArray = $this->getCalculateArrayHI($inspectionProvince, $risk_address_noOfClaims, $cgl_cglLimitsOfLiablitiy, $cgl_eoLimitsOfLiablity, $ops_totalGrossAnnualReceipts, $cgl_deductible, $cgl_contractorsEquipmentFloater, $cgl_additionalPropertyFrill, $rtqForm);
        } else if ($rtqForm == "plumbing") {
            // set all required values
            $province = trim($req['province']);
            $totalRevenue = $this->checkValue(trim($req['totalRevenue']));
            $coverage_CEF = $this->checkValue(trim($req['coverage_CEF']));
            $coverage_toolFloater = $this->checkValue(trim($req['coverage_toolFloater']));
            $coverage_officeEquipmentsFloater = $this->checkValue(trim($req['coverage_officeEquipmentsFloater']));
            $coverage_profits = $this->checkValue(trim($req['coverage_profits']));
            $coverage_buildingLimit = $this->checkValue(trim($req['coverage_buildingLimit']));
            $coverage_contentsLimit = $this->checkValue(trim($req['coverage_contentsLimit']));
            $coverage_contentsLimitStock = $this->checkValue(trim($req['coverage_contentsLimitStock']));
            $coverage_contentsLimitEquipment = $this->checkValue(trim($req['coverage_contentsLimitEquipment']));
            $coverage_contentsLimitImprovements = $this->checkValue(trim($req['coverage_contentsLimitImprovements']));
            $coverage_grossEarnings = $this->checkValue(trim($req['coverage_grossEarnings']));
            $coverage_grossEarningsPer = trim($req['coverage_grossEarningsPer']);
            $coverage_extraExpenses = $this->checkValue(trim($req['coverage_extraExpenses']));
            $coverage_rentalIncomeLimit = $this->checkValue(trim($req['coverage_rentalIncomeLimit']));
            $coverage_signFloater = $this->checkValue(trim($req['coverage_signFloater']));

            $coverage_crime_broadFormMoney = $this->checkValue(trim($req['coverage_crime_broadFormMoney']));
            $coverage_crime_insideRobbery = $this->checkValue(trim($req['coverage_crime_insideRobbery']));
            $coverage_crime_outsideRobbery = $this->checkValue(trim($req['coverage_crime_outsideRobbery']));
            $coverage_crime_employeeDishonesty = $this->checkValue(trim($req['coverage_crime_employeeDishonesty']));
            $coverage_crime_3dRider = $this->checkValue(trim($req['coverage_crime_3dRider']));

            $coverage_liabilityLimit = trim($req['coverage_liabilityLimit']);
            $yearsBuilt =  $req['yearsBuilt'];

            $constructionType = trim($req['constructionType']);
            $fireDeptDistance = ucfirst($req['fireDeptDistance']);
            $fireDeptType = ucwords($req['fireDeptType']);
            $hydrant = ucfirst($req['hydrant']);

            $closestCity = trim($req['closestCity']);
            $distanceFromClosestCity = $this->checkValue(trim($req['distanceFromClosestCity']));

            $liability_typeOfOpsWorkPerformIAO = $req['liability_typeOfOpsWorkPerformIAO'];

            // get calculateArray for plumbing form
            $calculateArray = $this->getCalculateArrayPlumbing($province, $totalRevenue, $coverage_CEF, $coverage_toolFloater, $coverage_officeEquipmentsFloater, $coverage_profits, $coverage_buildingLimit, $coverage_contentsLimit, $coverage_contentsLimitStock, $coverage_contentsLimitEquipment, $coverage_contentsLimitImprovements, $coverage_grossEarnings, $coverage_grossEarningsPer, $coverage_extraExpenses, $coverage_rentalIncomeLimit, $coverage_signFloater, $coverage_crime_broadFormMoney, $coverage_crime_insideRobbery, $coverage_crime_outsideRobbery, $coverage_crime_employeeDishonesty, $coverage_crime_3dRider, $coverage_liabilityLimit, $yearsBuilt, $constructionType, $fireDeptDistance, $fireDeptType, $hydrant, $closestCity, $distanceFromClosestCity, $liability_typeOfOpsWorkPerformIAO, $rtqForm);
        }
        return json_encode($calculateArray);
    }

    // function to set priceArray / calculate for plumbing form
    public function getCalculateArrayPlumbing($province, $totalRevenue, $coverage_CEF, $coverage_toolFloater, $coverage_officeEquipmentsFloater, $coverage_profits, $coverage_buildingLimit, $coverage_contentsLimit, $coverage_contentsLimitStock, $coverage_contentsLimitEquipment, $coverage_contentsLimitImprovements, $coverage_grossEarnings, $coverage_grossEarningsPer, $coverage_extraExpenses, $coverage_rentalIncomeLimit, $coverage_signFloater, $coverage_crime_broadFormMoney, $coverage_crime_insideRobbery, $coverage_crime_outsideRobbery, $coverage_crime_employeeDishonesty, $coverage_crime_3dRider, $coverage_liabilityLimit, $yearsBuilt, $constructionType, $fireDeptDistance, $fireDeptType, $hydrant, $closestCity, $distanceFromClosestCity, $liability_typeOfOpsWorkPerformIAO, $rtqForm)
    {
        //dd($province);

        // get values from json file
        //$provincerate = json_decode(file_get_contents(public_path().'/json/provincerate_plumbing.json'), true);  
        $coverageRate = json_decode(file_get_contents(public_path() . '/json/plumbingPropertyCoverageRate.json'), true);
        $policy_fee = json_decode(file_get_contents(public_path() . '/json/policyFee.json'), true);
        $getZone =   json_decode(file_get_contents(public_path() . '/json/zoneWiseInspectionFee.json'), true);

        $firedept = json_decode(file_get_contents(public_path() . '/json/firedept.json'), true);
        $firedepttype = json_decode(file_get_contents(public_path() . '/json/firedepttype.json'), true);
        $hydrants = json_decode(file_get_contents(public_path() . '/json/hydrants.json'), true);
        $towngrade = json_decode(file_get_contents(public_path() . '/json/towngrade.json'), true);

        $provinceMod = json_decode(file_get_contents(public_path() . '/json/propertyMod_province.json'), true);
        $townGradeMod = json_decode(file_get_contents(public_path() . '/json/propertyMod_towngrade.json'), true);
        $constructionMod = json_decode(file_get_contents(public_path() . '/json/propertyMod_construction.json'), true);

        $plumbing_iao = json_decode(file_get_contents(public_path() . '/json/plumbing_iao.json'), true);

        // get rates to send for backend process
        $amf_rates = json_decode(file_get_contents(public_path() . '/json/amf_rates_plumbing.json'), true);

        if ($yearsBuilt == null || empty($yearsBuilt)) {
            $yearsBuilt = date("Y");
        }

        // find building age
        $age = date("Y") - $yearsBuilt;
        if ($age <= 25) {
            $age_rate = 'under25';
        } else {
            $age_rate = 'over25';
        }

        if ($hydrant != '' && $fireDeptDistance != '' &&  $fireDeptType != '') {
            $hydrantVal = $hydrants[0][$hydrant]['value'];
            $fd = $firedept[0][$fireDeptDistance]['value'];
            $fdt = $firedepttype[0][$fireDeptType]['value'];
            $findTG = $fd . $fdt . $hydrantVal;
            $tg = $towngrade[0][$findTG]['tg'];

            $amfRate = $amf_rates[$age_rate][0][$province][$tg];
            $rentalIncomeLimitRate = $amfRate * 0.75;
        } else {
            $tg = "NotAvailable";
            // make default amf_rate
            $amfRate = 0;
            $rentalIncomeLimitRate = 0;
        }

        // get base rate 
        if (($constructionType != '' && !empty($constructionType)) && ($tg != '' && !empty($tg) && $tg != 'NotAvailable')) {
            // get mod value
            $provMod = $provinceMod[0][$province]['Mod'];
            $tgMod = $townGradeMod[0][$tg]['Mod'];
            $conMod = $constructionMod[0][$constructionType]['mod'];

            $startRate = 0.136; // BY DEFAULT

            // calculate deviation
            $deviation = ($provMod / 100) + ($tgMod / 100) + ($conMod / 100);

            $baseRate = round($startRate * (1 + $deviation), 2);
        } else {
            $baseRate = "NotAvailable";
        }

        // Calculating rates for property total and calculate property total
        if ($baseRate != "NotAvailable") {
            $commonRate = round($baseRate + (($baseRate * 20) / 100), 3); // base rate + 20% of base rate

            $cefRate = $coverageRate[0]["Contractors Equipment Floater"]['rate']; // 1.5 $1.50 per $100 value so its 1.5 * CEF amount entered
            $toolFloaterRate = $coverageRate[0]["Tool Floater"]['rate']; // 3.5 $3.50 per $100 value so its 3.5 * tool floater amount entered
            $officeComputerRate = round($commonRate + 0.05, 3); // base rate + 20% + $0.05 per $100 (means 0.05%)
            $profitsRate = $commonRate;

            $buildingRate = $baseRate;
            $contentRate = $commonRate;
            $stockRate = $commonRate;
            $equipmentRate = $commonRate;
            $tenantImprovmentRate = $commonRate;

            if (strpos($coverage_grossEarningsPer, '80') !== false) {
                // if 80% co-ins
                $grossEarningRate = round(0.6 * $baseRate, 3); // 60% of base rate
            } else if (strpos($coverage_grossEarningsPer, '50') !== false) {
                // if 50% co-ins
                $grossEarningRate = round(0.8 * $baseRate, 3); // 80% of base rate
            } else {
                // if No Co-ins
                $grossEarningRate = round(1.5 * $baseRate, 3); // 150% of base rate
            }
            $extraExpenseRate = round(2 * $baseRate, 3); // 200% of base rate

            if ($province != '' && $province != null) {
                if ($province == "Quebec") {
                    $rentRate = $baseRate; // 100% of base rate
                } else {
                    $rentRate = round(0.75 * $baseRate, 3); // 75% of base rate
                }
            } else {
                $rentRate = 0;
            }
            $signRate = 3; // $3 per $100 means 3%
        } else {
            $cefRate = 0;
            $toolFloaterRate = 0;
            $officeComputerRate = 0;
            $profitsRate = 0;
            $buildingRate = 0;
            $contentRate = 0;
            $stockRate = 0;
            $equipmentRate = 0;
            $tenantImprovmentRate = 0;
            $grossEarningRate = 0;
            $extraExpenseRate = 0;
            $rentRate = 0;
            $signRate = 0;
        }

        /*// CRIME PROPERTY COVERAGE IS NOT BASED ON BASE RATE SO CALCULATE OUTSIDE
        $crimebroadFormMoneyRate = 0.075; // $75 per $1000 coverage
        $crimeinsideRobberyRate = 0.05; // $50 per $1000 coverage
        $crimeoutsideRobberyRate = 0.05; // $50 per $1000 coverage
        $crimeemployeeDishonestyRate = 0.025; // $25 per $1000 coverage
        $crime3dRiderRate = 0.07; // $70 per $1000 coverage*/

        // Calculate amount of each property with rate to get property total
        $cefAmount = ($coverage_CEF * $cefRate) / 100;
        $officeComputerAmount = ($coverage_officeEquipmentsFloater * $officeComputerRate) / 100;
        $profitsAmount = ($coverage_profits * $profitsRate) / 100;
        $toolFloaterAmount = ($coverage_toolFloater * $toolFloaterRate) / 100;

        $buildingAmount = ($coverage_buildingLimit * $buildingRate) / 100;
        $contentAmount = ($coverage_contentsLimit * $contentRate) / 100;
        $stockAmount = ($coverage_contentsLimitStock * $stockRate) / 100;
        $equipmentAmount = ($coverage_contentsLimitEquipment * $equipmentRate) / 100;
        $tenantImprovmentAmount = ($coverage_contentsLimitImprovements * $tenantImprovmentRate) / 100;
        $grossEarningAmount = ($coverage_grossEarnings * $grossEarningRate) / 100;
        $extraExpenseAmount = ($coverage_extraExpenses * $extraExpenseRate) / 100;
        $rentAmount = ($coverage_rentalIncomeLimit * $rentRate) / 100;
        $signFloaterAmount = ($coverage_signFloater * $signRate) / 100;

        // CALCULATE CRIME COVERAGE AND ADD TO PREMIUM
        $crimebroadFormMoneyAmount = $coverage_crime_broadFormMoney * (75 / 1000); // RATE $75 per $1000 coverage
        $crimeinsideRobberyAmount = $coverage_crime_insideRobbery * (50 / 1000); // RATE $50 per $1000 coverage
        $crimeoutsideRobberyAmount = $coverage_crime_outsideRobbery * (50 / 1000); // RATE $50 per $1000 coverage
        $crimeemployeeDishonestyAmount = $coverage_crime_employeeDishonesty * (25 / 1000); // RATE $25 per $1000 coverage
        $crime3dRiderAmount = $coverage_crime_3dRider * (70 / 1000); // RATE $70 per $1000 coverage

        // if province is null or empty then make by default Ontario
        if ($distanceFromClosestCity == null || empty($distanceFromClosestCity)) {
            $distance = "0";
        } else {
            // manipulate distance to get zone
            if ($distanceFromClosestCity == 0 || $distanceFromClosestCity == "") {
                $distance = "0";
            } else if ($distanceFromClosestCity < 50) {
                $distance = "within50";
            } else if ($distanceFromClosestCity >= 50 && $distanceFromClosestCity < 100) {
                $distance = "50-100";
            } else if ($distanceFromClosestCity >= 100 && $distanceFromClosestCity < 200) {
                $distance = "100-200";
            } else if ($distanceFromClosestCity >= 200 && $distanceFromClosestCity < 300) {
                $distance = "200-300";
            } else if ($distanceFromClosestCity >= 300 && $distanceFromClosestCity < 400) {
                $distance = "300-400";
            } else if ($distanceFromClosestCity >= 400) {
                $distance = "Refer";
            }
        }

        if ($closestCity != null || !empty($closestCity)) {
            // get zone number
            $zoneValid = $getZone[$closestCity][0];
            if (isset($zoneValid[$distance]['zone']) && ($distance != "Refer" || $distance != "NotAvailable")) {
                $zone = $zoneValid[$distance]['zone'];
            } else {
                $zone = 'NotAvailable';
            }
        } else {
            $zone = 'NotAvailable';
        }

        $totalRevenue1mmPremium = 0;
        $opsProdIAO = array();
        if (!empty($liability_typeOfOpsWorkPerformIAO)) {
            // CALCULATE LIABILITY TOTAL
            $iao = explode(',', $liability_typeOfOpsWorkPerformIAO);
            // dd( $liability_typeOfOpsWorkPerformIAO );
            foreach ($iao as $key => $value) {
                $v = explode('-', $value);
                // get iao code and annual revenue for specific product or operation
                $iaoCode = $v[0];
                // dd($value);
                $annualRevenue = $v[1];
                $annualPayroll = $v[2];
                // check if iao code is not null or empty
                if ($iaoCode != '') {
                    // check risk address province is not empty
                    if ($province != null && !empty($province)) {
                        // get province rate
                        $pr = $plumbing_iao[$iaoCode][$province];
                        // get rating basis
                        $ratingBasis = $plumbing_iao[$iaoCode]['Rating Base'];
                        // Consider payroll value if rating basis is payroll else annual revenue
                        if ($ratingBasis == "Payroll") {
                            // calculate total revenue premium for 1mm
                            $opsRevenuePremium = ($annualPayroll * $pr) / 1000;
                        } else {
                            // calculate total revenue premium for 1mm
                            $opsRevenuePremium = ($annualRevenue * $pr) / 1000;
                        }

                        // check minimum premium
                        $minPremium = $plumbing_iao[$iaoCode]['Min_prem'];

                        // check totalRevenue1mmPremium is less than minimum premium then keep minimum premium
                        if ($opsRevenuePremium < $minPremium) {
                            $opsRevenuePremium = $minPremium;
                        }

                        // add sum to totalRevenue1mmPremium
                        $totalRevenue1mmPremium += $opsRevenuePremium;

                        // store values in array for backend
                        $row = array();
                        $row['productIAO'] = $iaoCode;
                        $row['productProvRate'] = $pr;
                        $row['productPremium'] = $opsRevenuePremium;
                        $row['ratingBasis'] = $ratingBasis;
                        $row['annualRevenue'] = $annualRevenue;
                        $row['annualPayroll'] = $annualPayroll;
                        array_push($opsProdIAO, $row);
                    } else {
                        $pr = 0;
                    }
                }
            }
        }
        $liablity1mm = 0;
        $liablity2mm = 0;
        if ($coverage_liabilityLimit == "2mm") {
            if ($totalRevenue1mmPremium > 1500) {
                $liablity1mm = $totalRevenue1mmPremium;
            } else {
                $liablity1mm = 1500;     // Minimum 1500 // HELPDESK-8446 -Roy ticket
            }

            $totalRevenue2mmPremium = $totalRevenue1mmPremium * 0.25; // 25% of 1mm premium
            if ($totalRevenue2mmPremium > 500) {
                $liablity2mm = $totalRevenue2mmPremium;
            } else {
                $liablity2mm = 500; // Minimum 500
            }

            $liablity = $liablity1mm + $liablity2mm; // it include liability for 1mm and other 1mm 
        } else if ($coverage_liabilityLimit == "1mm") {
            if ($totalRevenue1mmPremium > 1500) {
                $liablity1mm = $totalRevenue1mmPremium;
            } else {
                $liablity1mm = 1500;     // Minimum 1500
            }
            $liablity = $liablity1mm;
        } else {
            $liablity = 0; // if no liability
        }

        // Property Total
        $propertyTotal = $cefAmount + $officeComputerAmount + $profitsAmount + $toolFloaterAmount + $buildingAmount + $contentAmount + $stockAmount + $equipmentAmount + $tenantImprovmentAmount + $grossEarningAmount + $extraExpenseAmount + $rentAmount + $signFloaterAmount + $crimebroadFormMoneyAmount + $crimeinsideRobberyAmount + $crimeoutsideRobberyAmount + $crimeemployeeDishonestyAmount + $crime3dRiderAmount;
        // round property total
        $propertyTotal = round($propertyTotal);

        $premiumWithoutFees = $propertyTotal + $liablity;

        if ($premiumWithoutFees > 0 && $premiumWithoutFees < 5000) {
            $feePremium = "below5k";
        } else if ($premiumWithoutFees >= 5000 && $premiumWithoutFees < 10000) {
            $feePremium = "5000";
        } else if ($premiumWithoutFees >= 10000 && $premiumWithoutFees < 20000) {
            $feePremium = "10000";
        } else if ($premiumWithoutFees >= 20000) {
            $feePremium = "20000";
        } else {
            $feePremium = "NotAvailable";
        }

        if ($feePremium != "NotAvailable") {
            $policyFee = $policy_fee[$rtqForm][0][$feePremium]['fee'];
        } else {
            $policyFee = 0;
        }

        // get zone fee by zone wise [Note: Zone & zone fee are available from PrecisePriceList-ZoneFee2020.PDF ]
        if ($zone == 1) {
            $zoneFee = 0;
        } else if ($zone == 2) {
            $zoneFee = 15.27;
        } else if ($zone == 3) {
            $zoneFee = 30.83;
        } else if ($zone == 4) {
            $zoneFee = 50.65;
        } else if ($zone == 5) {
            $zoneFee = 66.19;
        } else if ($zone == 6) {
            $zoneFee = 82.87;
        }

        $baseRateInspectionFee = 350;
        if ($distance == "Refer" || $zone == "NotAvailable") {
            $inspectionFee = "";
        } else {
            // get distance fee
            $distanceFee = $distanceFromClosestCity * 0.20;
            $inspectionFee = ceil($baseRateInspectionFee + $zoneFee + $distanceFee); // ceil - round up even its 3.4 = 4 , 3.6 = 4
            //$inspectionFee = $baseRateInspectionFee + $zoneFee + $distanceFee;
        }

        if ($inspectionFee != "") {
            $total = $premiumWithoutFees + $policyFee + $inspectionFee;
        } else {
            $total = $premiumWithoutFees + $policyFee;
        }

        $priceArray = array();
        $priceArray['propertyTotal'] = round($propertyTotal, 2);
        $priceArray['liabilityVal'] = round($liablity, 2);
        //$priceArray['provinceRate'] = $pr;
        $priceArray['liablity1mm'] = $liablity1mm;
        $priceArray['liablity2mm'] = $liablity2mm;
        $priceArray['fee'] = $policyFee;
        $priceArray['inspectionFee'] = $inspectionFee;
        $priceArray['towngrade'] = $tg;
        /** Rates Start **/
        $priceArray['cefRate'] = $cefRate;
        $priceArray['officeComputerRate'] = $officeComputerRate;
        $priceArray['profitsRate'] = $profitsRate;
        $priceArray['toolFloaterRate'] = $toolFloaterRate;
        $priceArray['buildingRate'] = $buildingRate;
        $priceArray['contentRate'] = $contentRate;
        $priceArray['stockRate'] = $stockRate;
        $priceArray['equipmentRate'] = $equipmentRate;
        $priceArray['tenantImprovmentRate'] = $tenantImprovmentRate;
        $priceArray['grossEarningRate'] = $grossEarningRate;
        $priceArray['extraExpenseRate'] = $extraExpenseRate;
        $priceArray['rentRate'] = $rentRate;
        $priceArray['signRate'] = $signRate;
        $priceArray['opsProdIAO'] = $opsProdIAO;
        /** Rates End **/
        $priceArray['amfRate'] = $amfRate;
        $priceArray['rentalIncomeLimitRate'] = round($rentalIncomeLimitRate, 2);
        $priceArray['baseRate'] = $baseRate;
        $priceArray['total'] = round($total, 2);

        return $priceArray;
    }

    // function to set priceArray for Home Inspector form
    public function getCalculateArrayHI($inspectionProvince, $risk_address_noOfClaims, $cgl_cglLimitsOfLiablitiy, $cgl_eoLimitsOfLiablity, $ops_totalGrossAnnualReceipts, $cgl_deductible, $cgl_contractorsEquipmentFloater, $cgl_additionalPropertyFrill, $rtqForm)
    {
        $baseAmount = 2100;
        $fees = 50;
        $cglCEF = 0;
        $cglFrill = 0;
        $priceArray = array();

        if ($cgl_contractorsEquipmentFloater == "Yes") {
            $cglCEF = 100;
        }
        if ($cgl_additionalPropertyFrill == "Yes") {
            $cglFrill = 300;
        }

        // get json data for claims
        $hi_claims = json_decode(file_get_contents(public_path() . '/json/hi_claims.json'), true);

        if ($cgl_cglLimitsOfLiablitiy != '') {
            $cglLimit = explode('/', $cgl_cglLimitsOfLiablitiy)[1];
        } else {
            $cglLimit = '1mm'; // by default
        }

        if ($risk_address_noOfClaims > 2 || $risk_address_noOfClaims == '') {
            // Refer rule will be encounter
            $noOfClaim = 'Refer';

            $limitModifier = $hi_claims["LimitModifier"][0][$cglLimit]['Modifier'];

            $premium = round($baseAmount + $limitModifier, 2); // claimModifier not calculting because claim is more than 2

            $total_value = round($premium + $cglCEF + $cglFrill + $fees, 2);

            $priceArray['cglPremium'] = '';
            $priceArray['cglCEF'] = $cglCEF;
            $priceArray['cglFrill'] = $cglFrill;
            $priceArray['fee'] = $fees;
            $priceArray['premium'] = $premium;
            $priceArray['total'] = $total_value;
        } else {
            $cglPremium = $hi_claims["Claims" . $cglLimit][0][$risk_address_noOfClaims]['Premium'];
            $claimModifier = $hi_claims["ClaimsModifier"][0][$risk_address_noOfClaims]['Modifier'];
            $limitModifier = $hi_claims["LimitModifier"][0][$cglLimit]['Modifier'];

            $premium = round($baseAmount + $claimModifier + $limitModifier, 2);

            $total_value = round($premium + $cglCEF + $cglFrill + $fees, 2);

            $priceArray['cglPremium'] = $cglPremium;
            $priceArray['cglCEF'] = $cglCEF;
            $priceArray['cglFrill'] = $cglFrill;
            $priceArray['fee'] = $fees;
            $priceArray['premium'] = $premium;
            $priceArray['total'] = $total_value;
        }
        return $priceArray;
        // console.log(total_value);  
    }

    // function to set priceArray for RentedDwelling and Owner Occupied form
    public function getCalculateArray($province, $yearsBuilt, $fireDeptDistance, $fireDeptType, $hydrant, $buildingLimit, $contentsLimit, $rentalIncomeLimit, $garageLimit, $shedLimit, $liability, $rtqForm)
    {

        // get json data from lookup files
        if ($rtqForm == "ownerOccupied") {
            $amf_rates = json_decode(file_get_contents(public_path() . '/json/amf_rates_ownerOccupied.json'), true);
        } else {
            $amf_rates = json_decode(file_get_contents(public_path() . '/json/amf_rates.json'), true);
        }

        $constructiontype = json_decode(file_get_contents(public_path() . '/json/constructiontype.json'), true);
        $firedept = json_decode(file_get_contents(public_path() . '/json/firedept.json'), true);
        $firedepttype = json_decode(file_get_contents(public_path() . '/json/firedepttype.json'), true);
        $hydrants = json_decode(file_get_contents(public_path() . '/json/hydrants.json'), true);
        $provincerate = json_decode(file_get_contents(public_path() . '/json/provincerate.json'), true);
        $towngrade = json_decode(file_get_contents(public_path() . '/json/towngrade.json'), true);

        if ($yearsBuilt == null || empty($yearsBuilt)) {
            $yearsBuilt = date("Y");
        }

        // find building age
        $age = date("Y") - $yearsBuilt;
        if ($age <= 25) {
            $age_rate = 'under25';
        } else {
            $age_rate = 'over25';
        }

        // make array to store value and return json to display price 
        $priceArray = array();

        // if province is null or empty then make by default Ontario
        if ($province == null || empty($province)) {
            $province = "Ontario";
        }

        if ($hydrant != '' && $fireDeptDistance != '' &&  $fireDeptType != '') {
            $hydrantVal = $hydrants[0][$hydrant]['value'];
            $fd = $firedept[0][$fireDeptDistance]['value'];
            $fdt = $firedepttype[0][$fireDeptType]['value'];
            $findTG = $fd . $fdt . $hydrantVal;
            $tg = $towngrade[0][$findTG]['tg'];

            // check TIV Limit
            $tivLimit = $buildingLimit + $contentsLimit + $rentalIncomeLimit + $garageLimit + $shedLimit;
            $getTIVLimit = $amf_rates[$age_rate][0][$province]['TIV Ceiling'];
            if ($tivLimit > $getTIVLimit) {
                $priceArray['TivLimit'] = "Above";
            } else {
                $priceArray['TivLimit'] = "Under";
            }
            $priceArray['AvailableTivLimit'] = $getTIVLimit;

            $provRate = $amf_rates[$age_rate][0][$province][$tg];
            $rentalIncomeLimitRate = $provRate * 0.75;

            if ($liability != 'none' && $liability != '') {
                $liabilityVal = $amf_rates[$age_rate][0][$province][$liability];
            } else {
                $liabilityVal = 0;
            }

            $inspection = $amf_rates[$age_rate][0][$province]['inspection'];
            if (!empty($inspection) && $inspection != '') {
                $inspectionFee = $inspection;
            } else {
                $inspectionFee = 0;
            }

            $buildingLimitCalc = (($buildingLimit * $provRate) / 100);
            $contentsLimitCalc = (($contentsLimit * $provRate) / 100);
            $rentalIncomeLimitCalc = (($rentalIncomeLimit * $rentalIncomeLimitRate) / 100);
            $garageLimitCalc = (($garageLimit * $provRate) / 100);
            $shedLimitCalc = (($shedLimit * $provRate) / 100);

            // floor used to get down integer, use ceil for get up to integer
            //$propertyTotal = floor(($buildingLimit*$provRate)/100) + floor(($contentsLimit*$provRate)/100) + floor(($rentalIncomeLimit*$rentalIncomeLimitRate)/100) + floor(($garageLimit*$provRate)/100) + floor(($shedLimit*$provRate)/100) ;
            $propertyTotal =  round($buildingLimitCalc + $contentsLimitCalc + $rentalIncomeLimitCalc + $garageLimitCalc + $shedLimitCalc);

            $fee = $amf_rates[$age_rate][0][$province]['policy_fee'];

            /*$priceArray['buildingLimitCalc'] = $buildingLimitCalc;
            $priceArray['contentsLimitCalc'] = $contentsLimitCalc;
            $priceArray['rentalIncomeLimitCalc'] = $rentalIncomeLimitCalc;
            $priceArray['garageLimitCalc'] = $garageLimitCalc;
            $priceArray['shedLimitCalc'] = $shedLimitCalc;*/


            $priceArray['towngrade'] = $tg;
            $priceArray['amfRate'] = $provRate;
            $priceArray['rentalIncomeLimitRate'] = $rentalIncomeLimitRate;
        } else {
            $propertyTotal = 0;
            $liabilityVal = 0;
            $inspectionFee = 0;
            $fee = 0;
            $priceArray['TivLimit'] = "";
            $priceArray['AvailableTivLimit'] = "1000000"; // by default 1 milion
            $priceArray['towngrade'] = 0;
        }

        $total = $propertyTotal + $liabilityVal + $fee;

        $priceArray['propertyTotal'] = $propertyTotal;
        $priceArray['liabilityVal'] = $liabilityVal;
        $priceArray['fee'] = $fee;
        $priceArray['inspectionFee'] = $inspectionFee;
        $priceArray['total'] = $total;

        return $priceArray;
    }


    // function to check number value 
    function checkValue($fieldVal)
    {
        if ($fieldVal != '') {
            return str_replace(',', '', $fieldVal);
        } else {
            return '0';
        }
    }

    /***

    Submit function will get all data of form and validate them before make PDF and send email

     ***/
    function finish(Request $req)
    {
        // dd($req);
        $formData = json_decode($req['formData'], true);
        $rtqForm = $req['rtqForm'];
        $referNotMatchReason = json_decode($req['referNotMatchReason'], true);
        $filesRequired = json_decode($req['filesRequired'], true);
        //$noOfClaimsArray = json_decode($req['noOfClaimsArray'], true);
        $binding = trim($req['binding']);

        // check which form is submitted
        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied" || $rtqForm == "plumbing") {
            //$noOfMortgageesArray = json_decode($req['noOfMortgageesArray'], true);
            //$fdFormattedJson = $this->formatFormDataToProperJson($formData,$noOfMortgageesArray,$noOfClaimsArray,$referNotMatchReason,$filesRequired,$rtqForm,'');
            $fdFormattedJson = $this->formatFormDataToProperJson($formData, $referNotMatchReason, $filesRequired, $rtqForm, '');
            $fd = json_decode($fdFormattedJson, true);

            $valid = $this->validation($fd, $rtqForm);
            //dd($valid);
        } else if ($rtqForm == "homeInspector" || $rtqForm == "dayCare") {
            //$fdFormattedJson = $this->formatFormDataToProperJson($formData,'',$noOfClaimsArray,$referNotMatchReason,$filesRequired,$rtqForm,'');
            $fdFormattedJson = $this->formatFormDataToProperJson($formData, $referNotMatchReason, $filesRequired, $rtqForm, '');
            $fd = json_decode($fdFormattedJson, true);

            $valid = $this->validation($fd, $rtqForm);
        }

        //echo $fd[0]['contact_phone_number']['value'];

        // before closing json, validate rules and add status in json
        // send json to check refer rules

        $status = '';
        if ($valid['valid'] == true && $binding == "Bound") {
            $status = "Bound";
        } else if ($valid['valid'] == true && ($binding == "Quoted")) {
            $status = "Quoted";
        } else {
            $status = "Assigned";
        }
        // add status to form data array
        $fd[0]['status']['value'] = $status;

        // encode form data
        $fdJson = json_encode($fd);

        // check which form is submitted
        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            //get calculate array
            // set all required values
            $province = ucfirst($fd[0]['risk_address_province']['value']);
            $yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];
            $fireDeptDistance = ucfirst($fd[0]['fireAlarmDetectors_fireDeptDistance']['value']);
            $fireDeptType = ucwords($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
            $hydrant = ucfirst($fd[0]['fireAlarmDetectors_hydrant']['value']);
            $buildingLimit = $this->checkValue($fd[0]['coverage_buildingLimit']['value']);
            $contentsLimit = $this->checkValue($fd[0]['coverage_contentsLimit']['value']);
            $rentalIncomeLimit = $this->checkValue($fd[0]['coverage_rentalIncomeLimit']['value']);
            $garageLimit = $this->checkValue($fd[0]['coverage_garageLimit']['value']);
            $shedLimit = $this->checkValue($fd[0]['coverage_shedLimit']['value']);
            $liability = $fd[0]['coverage_liabilityLimit']['value'];

            // get calculateArray
            $calculateArray = $this->getCalculateArray($province, $yearsBuilt, $fireDeptDistance, $fireDeptType, $hydrant, $buildingLimit, $contentsLimit, $rentalIncomeLimit, $garageLimit, $shedLimit, $liability, $rtqForm);

            // set calculated array to form data 
            //$fd[0]['towngrade']['value'] = $calculateArray['towngrade'];

            // remove towngrade from calculateArray to avoid duplication in form data array
            //unset($calculateArray['towngrade']);

            $fd[0]['calculation'] = $calculateArray;
            //$fd[0]['liabilityVal']['value'] = $calculateArray['liabilityVal'];
            //$fd[0]['fee']['value'] = $calculateArray['fee'];
            //$fd[0]['total']['value'] = $calculateArray['total'];
            $ca =  json_encode($calculateArray);
        } else if ($rtqForm == "homeInspector") {
            // set all required values
            $inspectionProvince = trim($fd[0]['risk_address_provinceOfInspection']['value']);
            $cgl_cglLimitsOfLiablitiy = trim($fd[0]['cgl_cglLimitsOfLiablitiy']['value']);
            $cgl_eoLimitsOfLiablity = trim($fd[0]['cgl_eoLimitsOfLiablity']['value']);
            $ops_totalGrossAnnualReceipts = trim($fd[0]['ops_totalGrossAnnualReceipts']['value']);
            $cgl_deductible = trim($fd[0]['cgl_deductible']['value']);
            $cgl_contractorsEquipmentFloater = trim($fd[0]['cgl_contractorsEquipmentFloater']['value']);
            $cgl_additionalPropertyFrill = trim($fd[0]['cgl_additionalPropertyFrill']['value']);
            $risk_address_noOfClaims = trim($fd[0]['risk_address_noOfClaims']['value']);
            // get calculateArray
            $calculateArray = $this->getCalculateArrayHI($inspectionProvince, $risk_address_noOfClaims, $cgl_cglLimitsOfLiablitiy, $cgl_eoLimitsOfLiablity, $ops_totalGrossAnnualReceipts, $cgl_deductible, $cgl_contractorsEquipmentFloater, $cgl_additionalPropertyFrill, $rtqForm);

            //$fd[0]['total_value']['value'] = $calculateArray['total_value'];
            $fd[0]['calculation'] = $calculateArray;
        } else if ($rtqForm == "plumbing") {
            // set all required values
            $province = trim($fd[0]['risk_address_province']['value']);
            $totalRevenue = $this->checkValue(trim($fd[0]['totalRevenue']['value']));
            $coverage_CEF = $this->checkValue(trim($fd[0]['coverage_CEF']['value']));
            $coverage_toolFloater = $this->checkValue(trim($fd[0]['coverage_toolFloater']['value']));
            $coverage_officeEquipmentsFloater = $this->checkValue(trim($fd[0]['coverage_officeEquipmentsFloater']['value']));
            $coverage_profits = $this->checkValue(trim($fd[0]['coverage_profits']['value']));
            $coverage_buildingLimit = $this->checkValue(trim($fd[0]['coverage_buildingLimit']['value']));
            $coverage_contentsLimit = $this->checkValue(trim($fd[0]['coverage_contentsLimit']['value']));
            $coverage_contentsLimitStock = $this->checkValue(trim($fd[0]['coverage_contentsLimitStock']['value']));
            $coverage_contentsLimitEquipment = $this->checkValue(trim($fd[0]['coverage_contentsLimitEquipment']['value']));
            $coverage_contentsLimitImprovements = $this->checkValue(trim($fd[0]['coverage_contentsLimitImprovements']['value']));
            $coverage_grossEarnings = $this->checkValue(trim($fd[0]['coverage_grossEarnings']['value']));
            $coverage_grossEarningsPer = trim($fd[0]['coverage_grossEarningsPer']['value']);
            $coverage_extraExpenses = $this->checkValue(trim($fd[0]['coverage_extraExpenses']['value']));
            $coverage_rentalIncomeLimit = $this->checkValue(trim($fd[0]['coverage_rentalIncomeLimit']['value']));
            $coverage_signFloater = $this->checkValue(trim($fd[0]['coverage_signFloater']['value']));

            $coverage_crime_broadFormMoney = $this->checkValue(trim($fd[0]['coverage_crime_broadFormMoney']['value']));
            $coverage_crime_insideRobbery = $this->checkValue(trim($fd[0]['coverage_crime_insideRobbery']['value']));
            $coverage_crime_outsideRobbery = $this->checkValue(trim($fd[0]['coverage_crime_outsideRobbery']['value']));
            $coverage_crime_employeeDishonesty = $this->checkValue(trim($fd[0]['coverage_crime_employeeDishonesty']['value']));
            $coverage_crime_3dRider = $this->checkValue(trim($fd[0]['coverage_crime_3dRider']['value']));

            $coverage_liabilityLimit = trim($fd[0]['coverage_liabilityLimit']['value']);
            $yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];

            $constructionType = trim($fd[0]['buildingConstruction_overallConstruction']['value']);
            $fireDeptDistance = ucfirst($fd[0]['fireAlarmDetectors_fireDeptDistance']['value']);
            $fireDeptType = ucwords($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
            $hydrant = ucfirst($fd[0]['fireAlarmDetectors_hydrant']['value']);

            $closestCity = trim($fd[0]['closestCity']['value']);
            $distanceFromClosestCity = $this->checkValue(trim($fd[0]['distanceFromClosestCity']['value']));

            $liability_typeOfOpsWorkPerformIAO = trim($fd[0]['liability_typeOfOpsWorkPerformIAO']['value']);

            // get calculateArray for plumbing form
            $calculateArray = $this->getCalculateArrayPlumbing($province, $totalRevenue, $coverage_CEF, $coverage_toolFloater, $coverage_officeEquipmentsFloater, $coverage_profits, $coverage_buildingLimit, $coverage_contentsLimit, $coverage_contentsLimitStock, $coverage_contentsLimitEquipment, $coverage_contentsLimitImprovements, $coverage_grossEarnings, $coverage_grossEarningsPer, $coverage_extraExpenses, $coverage_rentalIncomeLimit, $coverage_signFloater, $coverage_crime_broadFormMoney, $coverage_crime_insideRobbery, $coverage_crime_outsideRobbery, $coverage_crime_employeeDishonesty, $coverage_crime_3dRider, $coverage_liabilityLimit, $yearsBuilt, $constructionType, $fireDeptDistance, $fireDeptType, $hydrant, $closestCity, $distanceFromClosestCity, $liability_typeOfOpsWorkPerformIAO, $rtqForm);

            //$fd[0]['total_value']['value'] = $calculateArray['total_value'];
            $fd[0]['calculation'] = $calculateArray;
        }

        // Add md5 Hash id to form 
        $formHashID = md5(json_encode($fd));
        $fd[0]['formHashID']['value'] = $formHashID;

        //return json_encode($fd);

        // now Send email to ..... to process email
        $emailSent = $this->emailSent($fd);
        //$emailSent = 0;
        // dd($emailSent);
        if ($emailSent == 0) {
            $message = array('message' => 'Form has been sent to AMF.', 'success' => 'true');
        } else {
            $message = array('message' => 'There is something wrong to send form to AMF.', 'success' => 'false');
        }

        return $message;
    }

    /**
    Format form data to proper json way so we can get extract data easily from json using key as fieldID 
     **/
    //function formatFormDataToProperJson($fd,$noOfMortgageesArray,$noOfClaimsArray,$referNotMatchReason,$filesRequired,$rtqForm,$requiredError){
    function formatFormDataToProperJson($fd, $referNotMatchReason, $filesRequired, $rtqForm, $requiredError)
    {
        // check data size to add comma at end of each json value except last one
        $i = 1;
        // start json
        $json = '[ {';

        // add form id
        $json .= '"rtqFormId" : { "value" : "' . $rtqForm . '" },';

        // loop through all form data
        /*foreach ($fd as $key => $value) {
            foreach ($value as $k => $v) {
                // if value has key name then take it out and if has key value then append it under key name
                if($k == 'name'){
                    $json .= '"'.$v.'": { ';
                }else if($k == 'value'){
                    // remove \n and \r from textarea value
                    //$v = json_encode($v);
                    //$v = str_replace('\r','',$v);
                    //$v = str_replace('\n','',$v);
                    //$v = json_decode($v);
                    $v = htmlentities($v);
                    $v = trim($v);
                    $json .= '"value" : '.trim(json_encode($v)).' }';
                    // add comma at end of each data except last one
                    if($i < sizeof($fd)){
                        $json .= ',';
                    }
                }

            }
            $i++;
        }*/
        foreach ($fd as $key => $value) {
            $json .= '"' . $key . '": { ';
            $j = 1;
            foreach ($value as $k => $v) {
                // if value has key name then take it out and if has key value then append it under key name
                //$json .= '"'.$k.'": { ';
                //if($k == 'name'){
                //$json .= '"'.$v.'": { ';
                //}else 
                if ($k == 'value') {
                    // remove \n and \r from textarea value
                    //$v = json_encode($v);
                    //$v = str_replace('\r','',$v);
                    //$v = str_replace('\n','',$v);
                    //$v = json_decode($v);
                    $v = htmlentities($v);
                    $v = trim($v);
                    $json .= '"value" : ' . trim(json_encode($v));
                    // add comma at end of each data except last one

                } else if ($k == 'title') {
                    $v = trim($v);
                    //$v = str_replace('&quot;', "'", $v);
                    //$v = stripslashes($v);
                    $json .= '"title" : ' . trim(json_encode($v));
                    // add comma at end of each data except last one
                    /*if($i < sizeof($value)){
                        $json .= ',';
                    }*/
                }

                if ($j < sizeof($value)) {
                    $json .= ',';
                }

                $j++;
            }
            $json .= '} ';

            if ($i < sizeof($fd)) {
                $json .= ',';
            }

            $i++;
        }


        /*if($noOfMortgageesArray != ''){
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
                    $v = trim($v);
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
        }*/

        /*if($noOfClaimsArray != ''){
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
                    $v = trim($v);
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
        }*/

        if ($filesRequired != '') {
            // append value to json
            $r = 0;
            $json .= ',"filesRequired": {';
            foreach ($filesRequired as $key => $value) {
                $value = trim($value);
                $json .= '"' . $key . '" : "' . $value . '"';
                // add comma at end of each value except last

                if (($r + 1) < sizeof($filesRequired)) {
                    $json .= ',';
                }
                // go out of loop if all data of array added to json
                if ($r == sizeof($filesRequired)) {
                    goto out3;
                }
                $r++;
            }
            // complete each claim
            $json .= '}';

            out3:

            // here $t start with 0 and we have array started with 1 so we add $t+1 to add comma at end of each mortgagee except last one

        }

        if ($referNotMatchReason != '') {
            // Show this reasons in last and always add comma before starting for valid json

            // append value to json
            $r = 0;
            $json .= ',"ReferNotPassedReason": {';
            foreach ($referNotMatchReason as $key => $value) {
                $value = trim($value);
                $json .= '"' . $key . '" : "' . $value . '"';
                // add comma at end of each value except last

                if (($r + 1) < sizeof($referNotMatchReason)) {
                    $json .= ',';
                }
                // go out of loop if all data of array added to json
                if ($r == sizeof($referNotMatchReason)) {
                    goto out4;
                }
                $r++;
            }
            // complete each claim
            $json .= '}';

            out4:

            // here $t start with 0 and we have array started with 1 so we add $t+1 to add comma at end of each mortgagee except last one

        }

        // add required error if not null and available
        if ($requiredError != '' && $requiredError != null && !empty($requiredError)) {
            $json .= ',"requiredError": { "value": "' . $requiredError . '"}';
        }

        // end json
        $json .= '} ]';

        return $json;
    }

    // CHECK REFER OR QUOTE RULES BASED ON FORM AND PROVINCE
    function checkFormProvinceQuoteRule(Request $req)
    {
        // get value
        $riskProvince = $req['riskProvince'];
        $rtqForm = $req['rtqForm'];

        if ($riskProvince != "" && $riskProvince != null) {
            // get json file
            $formProvinceRule = json_decode(file_get_contents(public_path() . '/json/forms_provinceRules.json'), true);
            // get value refer or quote
            $result = $formProvinceRule[$rtqForm][$riskProvince];
        } else {
            $result = "R"; // REFER
        }

        return trim($result);
    }

    // validate data ( check with refer rules )
    function validation($fd, $rtqForm)
    {

        // define array for filesRequired
        $filesRequired = array();

        // check which form
        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied" || $rtqForm == "plumbing") {
            return $this->validateRentedAndOwnerAndPlumbing($fd, $rtqForm, $filesRequired);
        } // END OF Form REFER VALIDATION FOR RENTED DWELLING AND OWNER OCCUPIED
        else if ($rtqForm == "homeInspector") {
            array_push($filesRequired, "The firms Statement of Qualifications inclding resumes of all key (technical) personnel along with any avaliable marketing material or company brochures");
            array_push($filesRequired, "A copy of the outline from the firm's Quality Assurance / Quality Control (QA/QC) manual");
            return $this->validateHomeInspector($fd, $rtqForm, $filesRequired);
        }
        else if($rtqForm == "dayCare"){
            return $this->validateDayCare($fd, $rtqForm, $filesRequired);
        }
    }

    // function to validate home inspector form
    function validateHomeInspector($fd, $rtqForm, $filesRequired)
    {
        // get all required data
        $risk_address_provinceOfInspection = trim($fd[0]['risk_address_provinceOfInspection']['value']);

        if (isset($fd[0]['insured_licenced']))
            $insured_licenced = trim($fd[0]['insured_licenced']['value']);

        if (isset($fd[0]['claimHistory_ifSubjectToRescission']))
            $claimHistory_ifSubjectToRescission = trim($fd[0]['claimHistory_ifSubjectToRescission']['value']);

        if (isset($fd[0]['ops_radioactiveSamplingTesting_thirdPartyInsurance']))
            $ops_radioactiveSamplingTesting_thirdPartyInsurance = trim($fd[0]['ops_radioactiveSamplingTesting_thirdPartyInsurance']['value']);

        if (isset($fd[0]['ops_doProvideServiceOutsideOfCanada']))
            $ops_doProvideServiceOutsideOfCanada = trim($fd[0]['ops_doProvideServiceOutsideOfCanada']['value']);

        if (isset($fd[0]['ops_provideWrittenInspectionReport']))
            $ops_offerRepairServiceAfterInspection = trim($fd[0]['ops_offerRepairServiceAfterInspection']['value']);

        if (isset($fd[0]['claimHistory_ifSubjectToRescission']))
            $ops_provideWrittenInspectionReport = trim($fd[0]['ops_provideWrittenInspectionReport']['value']);

        if (isset($fd[0]['ops_haveContractForServices']))
            $ops_haveContractForServices = trim($fd[0]['ops_haveContractForServices']['value']);

        $risk_address_noOfClaims = trim($fd[0]['risk_address_noOfClaims']['value']);

        // now check all rules
        $valid = true;
        $referMatchArray = array();
        //$filesRequired = array();
        /*
        if( (in_array($risk_address_provinceOfInspection, array("Ontario","Alberta","British Columbia")) && $insured_licenced == "No" ) || $claimHistory_ifSubjectToRescission == "No" || $ops_radioactiveSamplingTesting_thirdPartyInsurance == "No" || $ops_doProvideServiceOutsideOfCanada == "Yes" || $ops_offerRepairServiceAfterInspection == "Yes" || $ops_provideWrittenInspectionReport == "No" || $ops_haveContractForServices == "Yes" || $risk_address_noOfClaims > 2){
            $valid = false;*/

        if (in_array($risk_address_provinceOfInspection, array("Ontario", "Alberta", "British Columbia")) && $insured_licenced == "No") {
            if ($risk_address_provinceOfInspection == "Ontario") {
                array_push($referMatchArray, "Province of inspection is Ontario and don't have required licence.");
                $valid = false;
            } else if ($risk_address_provinceOfInspection == "Alberta") {
                array_push($referMatchArray, "Province of inspection is Alberta and don't have required licence.");
                $valid = false;
            } else if ($risk_address_provinceOfInspection == "British Columbia") {
                array_push($referMatchArray, "Province of inspection is British Columbia and don't have required licence.");
                $valid = false;
            }
        }

        if (isset($claimHistory_ifSubjectToRescission) && $claimHistory_ifSubjectToRescission == "No") {
            array_push($referMatchArray, "You have selected No for claim history failure to disclose question.");
            $valid = false;
        }

        if (isset($fd[0]['ops_radioactiveSamplingTesting']) && trim($fd[0]['ops_radioactiveSamplingTesting']['value']) == "Yes") {
            if (isset($ops_radioactiveSamplingTesting_thirdPartyInsurance) && $ops_radioactiveSamplingTesting_thirdPartyInsurance == "No") {
                array_push($referMatchArray, 'Third party with own insurance is not outsourced.');
                $valid = false;
            }
        }

        if (isset($ops_doProvideServiceOutsideOfCanada) && $ops_doProvideServiceOutsideOfCanada == "Yes") {
            array_push($referMatchArray, "You provide service outside of Canada.");
            $valid = false;
        }

        if (isset($ops_offerRepairServiceAfterInspection) && $ops_offerRepairServiceAfterInspection == "Yes") {
            array_push($referMatchArray, "Your firm offer repair/renovation services to clients after an inspection.");
            $valid = false;
        }

        if (isset($ops_provideWrittenInspectionReport) && $ops_provideWrittenInspectionReport == "No") {
            array_push($referMatchArray, "You are not providing a written inspection report to all your clients.");
            $valid = false;
        }

        if (isset($ops_haveContractForServices) && $ops_haveContractForServices == "Yes") {
            array_push($referMatchArray, "You have contract for services in place.");
            array_push($filesRequired, "A copy of standard contract, include any lease agreement or railway siding agreement");
            $valid = false;
        }

        if ($risk_address_noOfClaims > 2) {
            array_push($referMatchArray, "Number of claims reported in last 5 years are more than 2.");
            $valid = false;
        }
        /*
        }else if($risk_address_provinceOfInspection == "" || $insured_licenced == "" || $claimHistory_ifSubjectToRescission == "" || $ops_radioactiveSamplingTesting_thirdPartyInsurance == "" || $ops_doProvideServiceOutsideOfCanada == "" || $ops_offerRepairServiceAfterInspection == "" || $ops_provideWrittenInspectionReport == "" || $risk_address_noOfClaims == ""){
            $valid = "Empty";*/
        if ($risk_address_provinceOfInspection == "") {
            array_push($referMatchArray, "Please select Province of inspection field." . $risk_address_provinceOfInspection);
            $valid = "Empty";
        }
        if (isset($insured_licenced)) {
            array_push($referMatchArray, "Please select Are you Licenced ? field." . $insured_licenced);
            $valid = "Empty";
        }
        if (!isset($claimHistory_ifSubjectToRescission)) {
            array_push($referMatchArray, "Please select Claim history failure to disclose question field.");
            $valid = "Empty";
        }
        if (isset($fd[0]['ops_radioactiveSamplingTesting']) && trim($fd[0]['ops_radioactiveSamplingTesting']['value']) == "Yes") {
            if (!isset($ops_radioactiveSamplingTesting_thirdPartyInsurance)) {
                array_push($referMatchArray, 'Please select Is it outsourced to third party with own insurance field.');
                $valid = "Empty";
            }
        }
        if (!isset($ops_doProvideServiceOutsideOfCanada)) {
            array_push($referMatchArray, "Please select do you provide service outside of Canada ? field.");
            $valid = "Empty";
        }
        if (!isset($ops_offerRepairServiceAfterInspection)) {
            array_push($referMatchArray, "Please select Does your firm offer repair/renovation services to clients after an inspection field.");
            $valid = "Empty";
        }

        if (!isset($ops_provideWrittenInspectionReport)) {
            array_push($referMatchArray, "Please select Do you provide all your clients with a written inspection report? field.");
            $valid = "Empty";
        }

        /*  if($ops_haveContractForServices == ""){
                // empty files required
                //$filesRequired = array();
            }*/

        if ($risk_address_noOfClaims == "") {
            array_push($referMatchArray, "Please select Number of claims reported for application of insurance on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors in past 5 years? field.");
            $valid = "Empty";
        }
        /* }else{
            $valid = true;
            $referMatchArray = array();
            //$filesRequired = array();
        }*/

        return array("valid" => $valid, "matchArray" => $referMatchArray, "filesRequired" => $filesRequired);
    }

    function validateDayCare($fd, $rtqForm, $filesRequired){
        $valid = true;
        $referMatchArray = array();
        return array("valid" => $valid, "matchArray" => $referMatchArray, "filesRequired" => $filesRequired);
    }

    // function to validate rented dwelling and owner occupied form
    function validateRentedAndOwnerAndPlumbing($fd, $rtqForm, $filesRequired)
    {
        //dd($fd);
        $liability = $fd[0]['coverage_liabilityLimit']['value'];

        // get all data need to validate or  refer from form data
        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            $risk_address_existingInsurer = trim($fd[0]['risk_address_existingInsurer']['value']);

            if (isset($fd[0]['risk_address_hasInsuredCancelInsurance']))
                $risk_address_hasInsuredCancelInsurance = trim($fd[0]['risk_address_hasInsuredCancelInsurance']['value']);

            $risk_address_incidenceOfClaim_type = trim($fd[0]['risk_address_incidenceOfClaim_type']['value']);

            if (isset($fd[0]['occupancy_commercialOperations']))
                $occupancy_commercialOperations = trim($fd[0]['occupancy_commercialOperations']['value']);

            if (isset($fd[0]['occupancy_shortTermRentals']))
                $occupancy_shortTermRentals = trim($fd[0]['occupancy_shortTermRentals']['value']);

            if (isset($fd[0]['liability_doesPremisesFenced']))
                $liability_doesPremisesFenced = trim($fd[0]['liability_doesPremisesFenced']['value']);

            //get calculate array
            // set all required values
            $province = ucfirst($fd[0]['risk_address_province']['value']);
            $yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];
            $fireDeptDistance = ucfirst($fd[0]['fireAlarmDetectors_fireDeptDistance']['value']);
            $fireDeptType = ucwords($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
            $hydrant = ucfirst($fd[0]['fireAlarmDetectors_hydrant']['value']);
            $buildingLimit = $this->checkValue($fd[0]['coverage_buildingLimit']['value']);
            $contentsLimit = $this->checkValue($fd[0]['coverage_contentsLimit']['value']);
            $rentalIncomeLimit = $this->checkValue($fd[0]['coverage_rentalIncomeLimit']['value']);
            $garageLimit = $this->checkValue($fd[0]['coverage_garageLimit']['value']);
            $shedLimit = $this->checkValue($fd[0]['coverage_shedLimit']['value']);


            // get calculateArray
            $calculateArray = $this->getCalculateArray($province, $yearsBuilt, $fireDeptDistance, $fireDeptType, $hydrant, $buildingLimit, $contentsLimit, $rentalIncomeLimit, $garageLimit, $shedLimit, $liability, $rtqForm);
        } else if ($rtqForm == "plumbing") {

            $insured_yearBusinessStarted = $this->checkValue($fd[0]['insured_yearBusinessStarted']['value']);
            $insured_yearOfExperience = $this->checkValue($fd[0]['insured_yearOfExperience']['value']);
            // Calculate year of experince with year business started
            $currentYear = date('Y');
            $insuredNoYearBusinessStarted = $currentYear - $insured_yearBusinessStarted;
            $totalYearOperationExperience = $insuredNoYearBusinessStarted + $insured_yearOfExperience;

            $buildingConstruction_OccupancyByOther = trim($fd[0]['buildingConstruction_OccupancyByOther']['value']);

            //if()
            if (isset($fd[0]['risk_address_requireBuildingCoverage']))
                $buildingRequirement = $fd[0]['risk_address_requireBuildingCoverage']['value'];

            if (isset($fd[0]['burglaryAlarm_otherMeasures_guardDog']))
                $burglaryAlarm_otherMeasures_guardDog = $fd[0]['burglaryAlarm_otherMeasures_guardDog']['value'];

            if (isset($fd[0]['burglaryAlarm_otherMeasures_other']))
                $burglaryAlarm_otherMeasures_other = $fd[0]['burglaryAlarm_otherMeasures_other']['value'];

            if (isset($fd[0]['liability_contractualListLeaseEtc']))
                $liability_contractualListLeaseEtc = $fd[0]['liability_contractualListLeaseEtc']['value'];

            if (isset($fd[0]['liability_workSubletOut']))
                $liability_workSubletOut = $fd[0]['liability_workSubletOut']['value'];

            if (isset($fd[0]['liability_wsoSubConLiablityInsurance']))
                $liability_wsoSubConLiablityInsurance = $fd[0]['liability_wsoSubConLiablityInsurance']['value'];

            // Check any gross annual sales rather than canada in product for sale
            /*$liability_productsForSaleDetailsCount = $fd[0]['liability_productsForSaleDetailsCount']['value'];
            $referPFS = false;
            if($liability_productsForSaleDetailsCount > 0 ){
                for($i=1;$i <= $liability_productsForSaleDetailsCount;$i++){
                    $pfsUS = $fd[0]['liability_productsForSaleGrossAnnualSaleUSA_'.$i]['value'];
                    $pfsOther = $fd[0]['liability_productsForSaleGrossAnnualSaleOther_'.$i]['value'];

                    // check if any value in gross annual sales USA or OTHER
                    if(($pfsUS !=0 && $pfsUS != null) || ($pfsOther != 0 && $pfsOther != null)){
                        $referPFS = true;
                        goto outPFS;
                    }
                }
            }
            outPFS:*/

            /*$liability_anyUSExposure  = $fd[0]['liability_anyUSExposure']['value'];
            $liability_anyUSInstallation  = $fd[0]['liability_anyUSInstallation']['value'];*/
            if (isset($fd[0]['liability_anyFourStories']))
                $liability_anyFourStories = $fd[0]['liability_anyFourStories']['value'];

            if (isset($fd[0]['liability_anyRadioactiveMaterials']))
                $liability_anyRadioactiveMaterials  = $fd[0]['liability_anyRadioactiveMaterials']['value'];

            if (isset($fd[0]['liability_engageOpsDemolition']))
                $liability_engageOpsDemolition  = $fd[0]['liability_engageOpsDemolition']['value'];

            if (isset($fd[0]['liability_engageOpsShoring']))
                $liability_engageOpsShoring  = $fd[0]['liability_engageOpsShoring']['value'];

            if (isset($fd[0]['liability_engageOpsUnderpinning']))
                $liability_engageOpsUnderpinning  = $fd[0]['liability_engageOpsUnderpinning']['value'];

            if (isset($fd[0]['liability_engageOpsCaissonWork']))
                $liability_engageOpsCaissonWork  = $fd[0]['liability_engageOpsCaissonWork']['value'];

            if (isset($fd[0]['liability_engageOpsExcavation']))
                $liability_engageOpsExcavation  = $fd[0]['liability_engageOpsExcavation']['value'];

            if (isset($fd[0]['liability_engageOpsExplosives']))
                $liability_engageOpsExplosives  = $fd[0]['liability_engageOpsExplosives']['value'];

            if (isset($fd[0]['liability_engageOpsTunneling']))
                $liability_engageOpsTunneling  = $fd[0]['liability_engageOpsTunneling']['value'];

            if (isset($fd[0]['liability_engageOpsRaisingBuildings']))
                $liability_engageOpsRaisingBuildings  = $fd[0]['liability_engageOpsRaisingBuildings']['value'];

            if (isset($fd[0]['liability_equipmentRented']))
                $liability_equipmentRented  = $fd[0]['liability_equipmentRented']['value'];

            if (isset($fd[0]['coverage_boiler']))
                $coverage_boiler = $fd[0]['coverage_boiler']['value'];

            $coverage_crime_broadFormMoney = $this->checkValue($fd[0]['coverage_crime_broadFormMoney']['value']);
            $coverage_crime_insideRobbery = $this->checkValue($fd[0]['coverage_crime_insideRobbery']['value']);
            $coverage_crime_outsideRobbery = $this->checkValue($fd[0]['coverage_crime_outsideRobbery']['value']);
            $coverage_crime_employeeDishonesty = $this->checkValue($fd[0]['coverage_crime_employeeDishonesty']['value']);
            $coverage_crime_3dRider = $this->checkValue($fd[0]['coverage_crime_3dRider']['value']);
            $coverage_otherLiability = trim($fd[0]['coverage_otherLiability']['value']);

            if (isset($fd[0]['coverage_includeExclude_flood']))
                $coverage_includeExclude_flood = trim($fd[0]['coverage_includeExclude_flood']['value']);

            if (isset($fd[0]['coverage_includeExclude_earthquake']))
                $coverage_includeExclude_earthquake = trim($fd[0]['coverage_includeExclude_earthquake']['value']);

            $equipmentScheduleTotalAmount  = $this->checkValue($fd[0]['equipmentScheduleTotalAmount']['value']);

            $coverage_SEF94 = $this->checkValue($fd[0]['coverage_SEF94']['value']);
            $coverage_faultyWorkmanship = $this->checkValue($fd[0]['coverage_faultyWorkmanship']['value']);
            $coverage_TLL = $this->checkValue($fd[0]['coverage_TLL']['value']);

            $province = ucfirst($fd[0]['risk_address_province']['value']);
            if ($province == '' || $province == null) {
                $province = "Ontario";
            }
            // get cef schedule limit
            $getCEFScheduleLimit = json_decode(file_get_contents(public_path() . '/json/cefLimitByItemTotal.json'), true);
            $cefScheduleLimit = $getCEFScheduleLimit[0][$rtqForm]['cefSceduleLimit'][$province]['limitByTotal'];

            // Get operations / products values
            $ltowpc = $this->checkValue($fd[0]['liability_typeOfOpsWorkPerformCount']['value']);
            $ops = array(); // save all operations which has any us or foreign exposure
            if ($ltowpc != 0) {
                for ($i = 1; $i <= $ltowpc; $i++) {
                    // get value of US/Foreign Exposure
                    if (isset($fd[0]['liability_typeOfOpsWorkPerformUsForeignExposure_' . $i]))
                        $usForeignExposure = $fd[0]['liability_typeOfOpsWorkPerformUsForeignExposure_' . $i]['value'];
                    // if any of product or operation has us or foreign exposure then refer it
                    if (isset($usForeignExposure) && $usForeignExposure == "Yes") {
                        $opsProduct = $fd[0]['liability_typeOfOpsWorkPerformOperation_' . $i]['value'];
                        if ($opsProduct != '') {
                            array_push($ops, $opsProduct);
                        }
                    }
                }
                // get size of ops array if its  > 0 then its refer means there is us or foreign exposure
                $opsUsForeignExposure = sizeof($ops);
            } else {
                $opsUsForeignExposure = 0;
            }
        }

        $buildingConstruction_yearBuilt = trim($fd[0]['buildingConstruction_yearBuilt']['value']);
        // find building age
        if ($buildingConstruction_yearBuilt == '' || empty($buildingConstruction_yearBuilt)) {
            $building_age = 0;
        } else {
            $building_age = date("Y") - $buildingConstruction_yearBuilt;
        }

        if ($rtqForm == "plumbing" && isset($buildingRequirement) && $buildingRequirement == "No") {
            $risk_address_howmany_mortgagees = 0;
        } else {
            $risk_address_howmany_mortgagees = trim($fd[0]['risk_address_howmany_mortgagees']['value']);
        }
        $risk_address_noOfClaims = trim($fd[0]['risk_address_noOfClaims']['value']);

        if (isset($fd[0]['buildingConstruction_isBuildingHeritage']))
            $buildingConstruction_isBuildingHeritage = trim($fd[0]['buildingConstruction_isBuildingHeritage']['value']);

        $buildingConstruction_wiringType = trim($fd[0]['buildingConstruction_wiringType']['value']);
        $buildingConstruction_plumbingType = trim($fd[0]['buildingConstruction_plumbingType']['value']);
        $buildingConstruction_roofTypeCovering = trim($fd[0]['buildingConstruction_roofTypeCovering']['value']);
        $buildingConstruction_amperage = trim($fd[0]['buildingConstruction_amperage']['value']);
        $buildingConstruction_heatingPrimaryType = trim($fd[0]['buildingConstruction_heatingPrimaryType']['value']);
        $buildingConstruction_heatingSecondaryType = trim($fd[0]['buildingConstruction_heatingSecondaryType']['value']);
        $fireAlarmDetectors_fireDeptTye = trim($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);



        if ($rtqForm == "rentedDwelling") {
            $occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
        } else if ($rtqForm == "ownerOccupied") {
            $occupancy_numberOfFamilies = trim($fd[0]['occupancy_numberOfFamilies']['value']);
            if (isset($fd[0]['insured_isCorporation']))
                $insured_isCorporation = trim($fd[0]['insured_isCorporation']['value']);
        }

        //  dd( $buildingConstruction_wiringType);


        // now check all rules
        $valid = true;
        $referMatchArray = array();

        // if any rule is not matched then make valid false
        /*if((in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $risk_address_howmany_mortgagees > 2) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $risk_address_existingInsurer == "AMF") 
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && isset($risk_address_hasInsuredCancelInsurance) && $risk_address_hasInsuredCancelInsurance == "Yes")
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $risk_address_noOfClaims > 0) 
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $risk_address_incidenceOfClaim_type == "Liability") 
                 ||  (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $occupancy_commercialOperations == "Yes") 
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $occupancy_shortTermRentals == "Yes") 
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $building_age > 75) 
                 || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && isset($buildingConstruction_isBuildingHeritage) && $buildingConstruction_isBuildingHeritage == "Yes") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && in_array($buildingConstruction_wiringType,array('Knob and Tube', 'Other'))) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && in_array($buildingConstruction_plumbingType,array('Other')))
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && in_array($buildingConstruction_roofTypeCovering,array('Other')))
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && ($buildingConstruction_amperage == "60AMP" || $buildingConstruction_amperage == "100AMP Fuse")) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) &&  in_array($buildingConstruction_heatingPrimaryType,array('Other','Wood-Solid')))
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $fireAlarmDetectors_fireDeptTye == "Volunteer") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $liability_doesPremisesFenced == "No")
                || ($rtqForm == "rentedDwelling" && (($occupancy_rentedDwellingUnits == "4-6 units" || $occupancy_rentedDwellingUnits == "6+ units")))
                || ($rtqForm == "ownerOccupied" && (($occupancy_numberOfFamilies == "3" || $occupancy_numberOfFamilies == "More") || ($insured_isCorporation == "Yes"))) 
                ||  ($rtqForm == "plumbing" && (($buildingConstruction_OccupancyByOther != '' 
                || !empty($buildingConstruction_OccupancyByOther)) 
                || isset($burglaryAlarm_otherMeasures_guardDog) && $burglaryAlarm_otherMeasures_guardDog == "Yes"
                || (isset($liability_workSubletOut) && $liability_workSubletOut == "Yes"
                 && (isset($liability_wsoSubConLiablityInsurance) && $liability_wsoSubConLiablityInsurance == "No")
                ) 
                || isset($liability_anyRadioactiveMaterials) && $liability_anyRadioactiveMaterials == "Yes" 
                || isset($liability_engageOpsDemolition) && $liability_engageOpsDemolition == "Yes"  
                || isset($liability_engageOpsShoring) && $liability_engageOpsShoring == "Yes"  
                || isset($liability_engageOpsUnderpinning) && $liability_engageOpsUnderpinning == "Yes"  
                || isset($liability_engageOpsCaissonWork) && $liability_engageOpsCaissonWork == "Yes"  
                || isset($liability_engageOpsExcavation) && $liability_engageOpsExcavation == "Yes"  
                || isset($liability_engageOpsExplosives) && $liability_engageOpsExplosives == "Yes"  
                || isset($liability_engageOpsTunneling) && $liability_engageOpsTunneling == "Yes"  
                || isset($liability_engageOpsRaisingBuildings) && $liability_engageOpsRaisingBuildings == "Yes" 
                || $equipmentScheduleTotalAmount > $cefScheduleLimit 
                || isset($liability_contractualListLeaseEtc) && $liability_contractualListLeaseEtc == "Yes" 
                || isset($coverage_boiler) && $coverage_boiler == "Yes" 
                 || $coverage_crime_broadFormMoney > 10000  
                 || $coverage_crime_insideRobbery > 10000  
                 || $coverage_crime_outsideRobbery > 10000  
                 || $coverage_crime_employeeDishonesty > 10000  
                 || $coverage_crime_3dRider > 10000  
                 || $coverage_otherLiability != '' 
                 || isset($coverage_includeExclude_flood) && $coverage_includeExclude_flood == "Yes" 
                 || isset($coverage_includeExclude_earthquake) && $coverage_includeExclude_earthquake == "Yes" 
                 || $liability == "3mmOrMore" 
                 || $coverage_SEF94 > 50000 
                 || $coverage_faultyWorkmanship > 25000 
                 || $coverage_TLL > 250000 
                 || $totalYearOperationExperience < 3 
                 || $opsUsForeignExposure > 0) )){*/
        // $referPFS || 
        /*if($rtqForm == "rentedDwelling"){
                    $occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
                    if(($occupancy_rentedDwellingUnits == "4-6 units" || $occupancy_rentedDwellingUnits == "6+ units")){
                        $valid = false;
                    }
                }else if($rtqForm == "ownerOccupied"){
                    $occupancy_numberOfFamilies = trim($fd[0]['occupancy_numberOfFamilies']['value']);
                    $insured_isCorporation = trim($fd[0]['insured_isCorporation']['value']);
                    if(($occupancy_numberOfFamilies == "3" || $occupancy_numberOfFamilies == "More") || ($insured_isCorporation == "Yes")){
                        $valid = false;
                    }
                }*/


        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied" || $rtqForm == "plumbing") {
            if ($rtqForm == "plumbing" && isset($buildingRequirement) && $buildingRequirement != "No") {
                if ($risk_address_howmany_mortgagees > 2) {
                    array_push($referMatchArray, 'Mortgagee is greater than 2.');
                    $valid = false;
                }
            } else if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
                if ($risk_address_howmany_mortgagees > 2) {
                    array_push($referMatchArray, 'Mortgagee is greater than 2.');
                    $valid = false;
                }
            }
            if ($risk_address_noOfClaims != '0' && $risk_address_noOfClaims != '') {
                array_push($referMatchArray, 'Claims in last 5 years.');
                $valid = false;
            }
        }

        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            if ($risk_address_existingInsurer == 'AMF') {
                array_push($referMatchArray, 'Existing insurer is A.M.Fredericks.');
                $valid = false;
            }
            if (isset($risk_address_hasInsuredCancelInsurance) && $risk_address_hasInsuredCancelInsurance == "Yes") {
                array_push($referMatchArray, 'Insured has cancelled insurance.');
                $valid = false;
            }

            if (isset($fd[0]['risk_address_incidenceInClaim'])) {
                if (trim($fd[0]['risk_address_incidenceInClaim']['value']) == "Yes") {
                    if ($risk_address_incidenceOfClaim_type == "Liability") {
                        array_push($referMatchArray, 'Type of claim incidence is liablity');
                        $valid = false;
                    }
                }
            }

            if ($rtqForm == "rentedDwelling") {
                //$occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
                if (in_array($occupancy_rentedDwellingUnits, array("4-6 units", "6+ units"))) {
                    array_push($referMatchArray, 'Rented Dwelling units is more than 4 units.');
                    $valid = false;
                }
            } else if ($rtqForm == "ownerOccupied") {
                //$occupancy_numberOfFamilies = trim($fd[0]['occupancy_numberOfFamilies']['value']);
                //$insured_isCorporation = trim($fd[0]['insured_isCorporation']['value']);
                if (in_array($occupancy_numberOfFamilies, array("3", "More"))) {
                    array_push($referMatchArray, 'Number of families is 3 or more.');
                    $valid = false;
                }
                if (isset($insured_isCorporation) && $insured_isCorporation == "Yes") {
                    array_push($referMatchArray, 'Insured is a corporation.');
                    $valid = false;
                }
            }


            if (isset($occupancy_commercialOperations) && $occupancy_commercialOperations == "Yes") {
                array_push($referMatchArray, 'There is commercial operations in premises.');
                $valid = false;
            }
            if (isset($occupancy_shortTermRentals) && $occupancy_shortTermRentals == "Yes") {
                array_push($referMatchArray, 'There is short term rentals allowed.');
                $valid = false;
            }

            if (isset($fd[0]['liability_doesPremisesHavePool']) && trim($fd[0]['liability_doesPremisesHavePool']['value']) == "Yes") {
                if (isset($liability_doesPremisesFenced) && $liability_doesPremisesFenced == "No") {
                    array_push($referMatchArray, 'Premises has not fenced and gated.');
                    $valid = false;
                }
            }
        }

        if (in_array($rtqForm, array('rentedDwelling', 'ownerOccupied')) || ($rtqForm == "plumbing" && isset($buildingRequirement) && $buildingRequirement != "No")) {
            //if(in_array($rtqForm,array('rentedDwelling','ownerOccupied',"plumbing")) ){
            if ($building_age > 75) {
                array_push($referMatchArray, 'Building age is greater than or equals to 75.');
                $valid = false;
            }
            if (isset($buildingConstruction_isBuildingHeritage) && $buildingConstruction_isBuildingHeritage == "Yes") {
                array_push($referMatchArray, 'Building is heritage.');
                $valid = false;
            }
            if (in_array($buildingConstruction_wiringType, array('Knob and Tube', 'Other'))) {
                array_push($referMatchArray, 'Building wiring type is ' . $buildingConstruction_wiringType . '.');
                $valid = false;
            }
            if (in_array($buildingConstruction_plumbingType, array('Other'))) {
                array_push($referMatchArray, 'Building plumbing type is ' . $buildingConstruction_plumbingType . '.');
                $valid = false;
            }
            if (in_array($buildingConstruction_roofTypeCovering, array('Other'))) {
                array_push($referMatchArray, 'Building roof covering type is ' . $buildingConstruction_roofTypeCovering . '.');
                $valid = false;
            }

            if (in_array($buildingConstruction_amperage, array("60AMP", "100AMP Fuse"))) {
                array_push($referMatchArray, 'Building construnction amperage is 60 AMP or 100 AMP fuse.');
                $valid = false;
            }
            if (in_array($buildingConstruction_heatingPrimaryType, array('Other', 'Wood-Solid'))) {
                array_push($referMatchArray, 'Buildingheating primary type is ' . $buildingConstruction_heatingPrimaryType . '.');
                $valid = false;
            }

            if (in_array($buildingConstruction_heatingSecondaryType, array('Other', 'Wood-Solid'))) {
                array_push($referMatchArray, 'Buildingheating secondary type is ' . $buildingConstruction_heatingSecondaryType . '.');
                $valid = false;
            }


            /*
                        if($buildingConstruction_heatingPrimaryType == "Wood-Solid"){
                            array_push($referMatchArray, 'Building heating primary type is wood/solid.');
                        }*/
        }

        /*  if($fireAlarmDetectors_fireDeptTye == "Volunteer"){
                        array_push($referMatchArray, 'Fire department type is volunteer.');
                         $valid = false;
                    }
*/
        if ($rtqForm == "plumbing") {
            if ($totalYearOperationExperience != '' && !empty($totalYearOperationExperience) && $totalYearOperationExperience < 3) {
                array_push($referMatchArray, 'Years of operation and experince is less than 2.');
                $valid = false;
            }

            if ($buildingConstruction_OccupancyByOther != '' || !empty($buildingConstruction_OccupancyByOther)) {
                array_push($referMatchArray, 'There is occupancy by other.');
                $valid = false;
            }
            if (isset($burglaryAlarm_otherMeasures_guardDog) && $burglaryAlarm_otherMeasures_guardDog  == "Yes") {
                array_push($referMatchArray, 'There is guard dog.');
                $valid = false;
            }

            if (isset($burglaryAlarm_otherMeasures_other) && !empty($burglaryAlarm_otherMeasures_other)) {
                array_push($referMatchArray, 'There is non-empty Other filed in Burglary Alarm Systems section.');
                $valid = false;
            }
            if (isset($liability_workSubletOut) && $liability_workSubletOut == "Yes") {
                if (isset($liability_wsoSubConLiablityInsurance) && $liability_wsoSubConLiablityInsurance == "No") {
                    array_push($referMatchArray, 'Sub contractors are not required to carry liability insurance.');
                    $valid = false;
                }
            }

            if ($opsUsForeignExposure > 0) {
                // show all operation or product that has us or foreign exposure
                foreach ($ops as $key => $value) {
                    array_push($referMatchArray, 'There is US or Foreign Exposure for ' . $value . '.');
                    $valid = false;
                }
            }

            /*if($referPFS){
                        array_push($referMatchArray, 'There is gross annual sales outside of Canada.');   
                    }*/
            if (isset($liability_anyFourStories) && $liability_anyFourStories == "Yes") {
                array_push($referMatchArray, 'You are working with building taller than four stories.');
                $valid = false;
            }

            if (isset($liability_anyRadioactiveMaterials) && $liability_anyRadioactiveMaterials  == "Yes") {
                array_push($referMatchArray, 'There is any use of radioactive materials in the premises.');
                $valid = false;
            }

            if (isset($liability_engageOpsDemolition) && $liability_engageOpsDemolition  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of demolition.');
                $valid = false;
            }
            if (isset($liability_engageOpsShoring) && $liability_engageOpsShoring  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of shoring.');
                $valid = false;
            }
            if (isset($liability_engageOpsUnderpinning) && $liability_engageOpsUnderpinning  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of underpinning.');
                $valid = false;
            }
            if (isset($liability_engageOpsCaissonWork) && $liability_engageOpsCaissonWork  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of caisson work.');
                $valid = false;
            }
            if (isset($liability_engageOpsExcavation) && $liability_engageOpsExcavation  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of excavation.');
                $valid = false;
            }
            if (isset($liability_engageOpsExplosives) && $liability_engageOpsExplosives  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of explosives.');
                $valid = false;
            }
            if (isset($liability_engageOpsTunneling) && $liability_engageOpsTunneling  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of tunneling.');
                $valid = false;
            }
            if (isset($liability_engageOpsRaisingBuildings) && $liability_engageOpsRaisingBuildings  == "Yes") {
                array_push($referMatchArray, 'Engage in operation of raising or moving of buildings and structures.');
                $valid = false;
            }

            if (isset($liability_equipmentRented) && $liability_equipmentRented  == "Yes") {
                array_push($referMatchArray, 'Engage in  equipments rented to others');
                $valid = false;
            }

            if ($equipmentScheduleTotalAmount  > $cefScheduleLimit) {
                array_push($referMatchArray, 'CEF equipment schedule coverage is more than ' . $cefScheduleLimit . '.');
                $valid = false;
            }
            if (isset($liability_contractualListLeaseEtc) && $liability_contractualListLeaseEtc  == "Yes") {
                array_push($referMatchArray, 'There is contractual agreements ( Other than premises lease ).');
                $valid = false;
            }
            if (isset($coverage_boiler) && $coverage_boiler  == "Yes") {
                array_push($referMatchArray, 'There is boiler and other machinery.');
                $valid = false;
            }
            if ($coverage_crime_broadFormMoney  > 10000) {
                array_push($referMatchArray, 'Broad form money and securities crime coverage is more than 10k.');
                $valid = false;
            }
            if ($coverage_crime_insideRobbery  > 10000) {
                array_push($referMatchArray, 'Inside robbery crime coverage is more than 10k.');
                $valid = false;
            }
            if ($coverage_crime_outsideRobbery  > 10000) {
                array_push($referMatchArray, 'Outside robbery crime coverage is more than 10k.');
                $valid = false;
            }
            if ($coverage_crime_employeeDishonesty  > 10000) {
                array_push($referMatchArray, 'Employee dishonesty - Form A crime coverage is more than 10k.');
                $valid = false;
            }
            if ($coverage_crime_3dRider  > 10000) {
                array_push($referMatchArray, 'Comprehensive 3D rider crime coverage is more than 10k.');
                $valid = false;
            }

            if ($coverage_SEF94  > 50000) {
                array_push($referMatchArray, 'SEF #94 - Private Passenger & Light Commercial under 2,800Kg coverage is more than 50k.');
                $valid = false;
            }
            if ($coverage_faultyWorkmanship  > 25000) {
                array_push($referMatchArray, 'Faulty Workmanship coverage is more than 25k.');
                $valid = false;
            }
            if ($coverage_TLL  > 250000) {
                array_push($referMatchArray, 'Tenant\'s Legal Liability coverage is more than 250k.');
                $valid = false;
            }

            if ($coverage_otherLiability != '') {
                array_push($referMatchArray, 'There is other liability.');
                $valid = false;
            }
            if (isset($coverage_includeExclude_flood) && $coverage_includeExclude_flood == 'Yes') {
                array_push($referMatchArray, 'There is flood coverage included.');
                $valid = false;
            }
            if (isset($coverage_includeExclude_earthquake) && $coverage_includeExclude_earthquake == 'Yes') {
                array_push($referMatchArray, 'There is earthquake coverage included.');
                $valid = false;
            }

            /*if($liability_anyUSExposure == 'Yes'){
                        array_push($referMatchArray, 'There is US exposure.');
                    }
                    if($liability_anyUSInstallation == 'Yes'){
                        array_push($referMatchArray, 'There is US installation.');
                    }*/
            if ($liability == '3mmOrMore') {
                array_push($referMatchArray, 'There is CGL liability limit $3mm or more.');
                $valid = false;
            }
        }

        /* }else if(
                (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $risk_address_howmany_mortgagees == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $risk_address_existingInsurer == "")  
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && isset($risk_address_hasInsuredCancelInsurance) && $risk_address_hasInsuredCancelInsurance == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $risk_address_noOfClaims == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $risk_address_incidenceOfClaim_type == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $occupancy_commercialOperations == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $occupancy_shortTermRentals == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $building_age == 0) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && !isset($buildingConstruction_isBuildingHeritage) ) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $buildingConstruction_wiringType == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $buildingConstruction_amperage == "" ) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $buildingConstruction_heatingPrimaryType == "") 
                || (isset($buildingRequirement) && $buildingRequirement != "No" && (in_array($rtqForm,array('plumbing')) && $building_age == 0) 
                || (in_array($rtqForm,array('plumbing')) && !isset($buildingConstruction_isBuildingHeritage)) 
                || (in_array($rtqForm,array('plumbing')) && $buildingConstruction_wiringType == "") 
                || (in_array($rtqForm,array('plumbing')) && $buildingConstruction_amperage == "" ) 
                || (in_array($rtqForm,array('plumbing')) && $buildingConstruction_heatingPrimaryType == "")) 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied','plumbing')) && $fireAlarmDetectors_fireDeptTye == "") 
                || (in_array($rtqForm,array('rentedDwelling','ownerOccupied')) && $liability_doesPremisesFenced == "") 
                || ($rtqForm == "rentedDwelling" && ($occupancy_rentedDwellingUnits == "")) 
                || ($rtqForm == "ownerOccupied" && ($occupancy_numberOfFamilies == "" || $insured_isCorporation == "")) 
                || ($rtqForm == "plumbing" && ( !isset($burglaryAlarm_otherMeasures_guardDog) == "" 
                || !isset($liability_workSubletOut) 
                /*|| (isset($liability_workSubletOut) && !isset($liability_workSubletOut == "Yes" && (!isset($liability_wsoSubConLiablityInsurance))) 
                || (isset($liability_workSubletOut) && $liability_workSubletOut == "Yes" && (!isset($liability_wsoSubConLiablityInsurance))) */
        /*|| !isset($liability_anyRadioactiveMaterials) 
                || !isset($liability_engageOpsDemolition)  
                || !isset($liability_engageOpsShoring) 
                || !isset($liability_engageOpsUnderpinning) 
                || !isset($liability_engageOpsCaissonWork) 
                || !isset($liability_engageOpsExcavation) 
                || !isset($liability_engageOpsExplosives) 
                || !isset($liability_engageOpsTunneling)   
                || !isset($liability_engageOpsRaisingBuildings) ))){*/

        /*if($rtqForm == "rentedDwelling"){
                    $occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
                    if(($occupancy_rentedDwellingUnits == "")){
                        $valid = 'Empty';
                
                    }
                }else if($rtqForm == "ownerOccupied"){
                    $occupancy_numberOfFamilies = trim($fd[0]['occupancy_numberOfFamilies']['value']);
                    $insured_isCorporation = trim($fd[0]['insured_isCorporation']['value']);
                    if(($occupancy_numberOfFamilies == "") || ($insured_isCorporation == "")){
                        $valid = 'Empty';
                
                    }
                }*/


        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied" || $rtqForm == "plumbing") {
            if ($rtqForm == "plumbing" && isset($buildingRequirement) && $buildingRequirement == "Yes") {
                if ($risk_address_howmany_mortgagees == "") {
                    array_push($referMatchArray, 'Please select how many mortgagee field.');
                    $valid = 'Empty';
                }
            } else if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
                if ($risk_address_howmany_mortgagees == "") {
                    array_push($referMatchArray, 'Please select how many mortgagee field.');
                    $valid = 'Empty';
                }
            }

            if ($risk_address_noOfClaims == '') {
                array_push($referMatchArray, 'Please select  number of claims in the last 5 years ? field.');
                $valid = 'Empty';
            }
        }

        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            if ($risk_address_existingInsurer == "Other") {
                if (trim($fd[0]['risk_address_existingInsurerOther']['value']) == "") {
                    array_push($referMatchArray, 'Please select existing insurer field.');
                    $valid = 'Empty';
                }
            } else {
                if ($risk_address_existingInsurer == "") {
                    array_push($referMatchArray, 'Please select existing insurer field.');
                    $valid = 'Empty';
                }
            }

            if (!isset($risk_address_hasInsuredCancelInsurance)) {
                array_push($referMatchArray, 'Please select has the insured been cancelled/declined insurance ? field.');
                $valid = 'Empty';
            }
            if (isset($fd[0]['risk_address_incidenceInClaim'])) {
                if (trim($fd[0]['risk_address_incidenceInClaim']['value']) == "Yes") {
                    if ($risk_address_incidenceOfClaim_type == "") {
                        array_push($referMatchArray, 'Please select type of claim field');
                        $valid = 'Empty';
                    }
                }
            }

            if ($rtqForm == "rentedDwelling") {
                //$occupancy_rentedDwellingUnits = trim($fd[0]['occupancy_rentedDwellingUnits']['value']);
                if ($occupancy_rentedDwellingUnits == "") {
                    array_push($referMatchArray, 'Please select rented dwelling units field.');
                    $valid = 'Empty';
                }
            } else if ($rtqForm == "ownerOccupied") {
                //$occupancy_numberOfFamilies = trim($fd[0]['occupancy_numberOfFamilies']['value']);
                if ($occupancy_numberOfFamilies == "") {
                    array_push($referMatchArray, 'Please select number of families field.');
                    $valid = 'Empty';
                }
                //$insured_isCorporation = trim($fd[0]['insured_isCorporation']['value']);
                if (!isset($insured_isCorporation)) {
                    array_push($referMatchArray, 'Please select is insured a corporation field.');
                    $valid = 'Empty';
                }
            }


            if (!isset($occupancy_commercialOperations)) {
                array_push($referMatchArray, 'Please select are there any commercial operations on the premises ? field.');
                $valid = 'Empty';
            }
            if (!isset($occupancy_shortTermRentals)) {
                array_push($referMatchArray, 'Please select are short term rentals allowed (e.g. AirBNB) field.');
                $valid = 'Empty';
            }

            if (isset($fd[0]['liability_doesPremisesHavePool']) && trim($fd[0]['liability_doesPremisesHavePool']['value']) == "Yes") {
                if (!isset($liability_doesPremisesFenced)) {
                    array_push($referMatchArray, 'Please select are the premises fenced and gated? field.');
                    $valid = 'Empty';
                }
            }
        }

        if (in_array($rtqForm, array('rentedDwelling', 'ownerOccupied')) || ($rtqForm == "plumbing" && isset($buildingRequirement) && $buildingRequirement != "No")) {
            if ($building_age = "") {
                array_push($referMatchArray, 'Please select year built field.');
                $valid = 'Empty';
            }
            if (!isset($buildingConstruction_isBuildingHeritage)) {
                array_push($referMatchArray, 'Please select is building considered a heritage building ? field.');
                $valid = 'Empty';
            }
            if ($buildingConstruction_wiringType == "") {
                array_push($referMatchArray, 'Please select wiring type field.');
                $valid = 'Empty';
            }
            if ($buildingConstruction_amperage == "") {
                array_push($referMatchArray, 'Please select amperage field.');
                $valid = 'Empty';
            }

            if ($buildingConstruction_heatingPrimaryType == "") {
                array_push($referMatchArray, 'Please select heating primary type field.');
                $valid = 'Empty';
            }

            if ($buildingConstruction_heatingSecondaryType == "") {
                array_push($referMatchArray, 'Please select heating secondary type field.');
                $valid = 'Empty';
            }
        }

        if ($fireAlarmDetectors_fireDeptTye == "") {
            array_push($referMatchArray, 'Please select fire department type field.');
            $valid = 'Empty';
        }

        if ($rtqForm == "plumbing") {
            if (!isset($burglaryAlarm_otherMeasures_guardDog)) {
                array_push($referMatchArray, 'Please select guard dog field.');
                $valid = 'Empty';
            }
            /*
                    if($liability_anyUSExposure  == ""){
                        array_push($referMatchArray, 'Please select Any U.S. Exposure (Past/Present/Future) field.');
                    }
                    if($liability_anyUSInstallation  == ""){
                        array_push($referMatchArray, 'Please select Any U.S. Installation (Past/Present/Future field.');
                    }*/

            if (isset($liability_workSubletOut) && $liability_workSubletOut == "Yes") {
                if (!isset($liability_wsoSubConLiablityInsurance)) {
                    array_push($referMatchArray, 'Please select Are sub-contractors required to carry liability insurance? field.');
                    $valid = 'Empty';
                }
            }
            if (!isset($liability_anyRadioactiveMaterials)) {
                array_push($referMatchArray, 'Please select Is there any use of radioactive materials in the premises? field.');
                $valid = 'Empty';
            }
            if (!isset($liability_anyFourStories)) {
                array_push($referMatchArray, 'Please Select if you are working with building taller than four stories? field.');
                $valid = 'Empty';
            }

            if (!isset($liability_engageOpsDemolition)) {
                array_push($referMatchArray, 'Please select Demolition or Wrecking field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsShoring)) {
                array_push($referMatchArray, 'Please select Shoring field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsUnderpinning)) {
                array_push($referMatchArray, 'Please select Underpinning field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsCaissonWork)) {
                array_push($referMatchArray, 'Please select Caisson Work field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsExcavation)) {
                array_push($referMatchArray, 'Please select Excavation field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsExplosives)) {
                array_push($referMatchArray, 'Please select Use of Explosives field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsTunneling)) {
                array_push($referMatchArray, 'Please select Tunneling field.');
                $valid = 'Empty';
            }
            if (!isset($liability_engageOpsRaisingBuildings)) {
                array_push($referMatchArray, 'Please select Raising or moving of buildings and structures field.');
                $valid = 'Empty';
            }
            if (!isset($liability_equipmentRented)) {
                array_push($referMatchArray, 'Please select Eqiuptments rented to others');
                $valid = 'Empty';
            }
        }
        /*}else{
                $valid = true;
                $referMatchArray = array();
            }*/
        /* echo "<pre>";
            print_r($valid);
            //print_r($referMatchArray);
            exit;*/
        // check TIV limit
        if (isset($calculateArray['TivLimit']) && $calculateArray['TivLimit'] == "Above") {
            array_push($referMatchArray, 'TIV limit is going above ' . $calculateArray['AvailableTivLimit']);
        }

        return array("valid" => $valid, "matchArray" => $referMatchArray, "filesRequired" => $filesRequired);
    }

    /**
     * Replace accented characters with non accented
     *
     * @param $str
     * @return mixed
     * @link http://myshadowself.com/coding/php-function-to-convert-accented-characters-to-their-non-accented-equivalant/
     */
    function removeAccents($str)
    {
        //$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'd’', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', "l'", 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', "n'",'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');

        $a = array('&Agrave;', '&Aacute;', '&Acirc;', '&Atilde;', '&Auml;', '&Aring;', '&AElig;', '&Ccedil;', '&Egrave;', '&Eacute;', '&Ecirc;', '&Euml;', '&Igrave;', '&Iacute;', '&Icirc;', '&Iuml;', '&ETH;', '&Ntilde;', '&Ograve;', '&Oacute;', '&Ocirc;', '&Otilde;', '&Ouml;', '&Oslash;', '&Ugrave;', '&Uacute;', '&Ucirc;', '&Uuml;', '&Yacute;', '&szlig;', '&agrave;', '&aacute;', '&acirc;', '&atilde;', '&auml;', '&aring;', '&aelig;', '&ccedil;', '&egrave;', '&eacute;', '&ecirc;', '&euml;', '&igrave;', '&iacute;', '&icirc;', '&iuml;', '&ntilde;', '&ograve;', '&oacute;', '&ocirc;', '&otilde;', '&ouml;', '&oslash;', '&ugrave;', '&uacute;', '&ucirc;', '&uuml;', '&yacute;', '&yuml;', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'd’', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', "l&rsquo;", 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', "n&rsquo;", 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', '&OElig;', '&oelig;', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', '&Scaron;', '&scaron;', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', '&Yuml;', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', "O&rsquo;", "o&rsquo;", "S&rsquo;", "s&rsquo;", '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');

        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', '?', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'O', 'o', 'S', 's', 'O', 'o', '?', 'a', '?', 'e', '?', '?', 'O', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
        return str_replace($a, $b, $str);
        /*$str = htmlentities($str, ENT_COMPAT, "UTF-8");
       $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/','$1',$str);
       return html_entity_decode($str);*/
    }

    // email sent to AMF
    public function emailSent($fd)
    {

        //$fdDecode = json_decode($fd,true);
        $in = trim($fd[0]['insured_name']['value']);

        //$convertIn = html_entity_decode($in,ENT_COMPAT, 'UTF-8');
        $insuredName = $this->removeAccents($in);
        //dd($insuredName);

        // check insured name length and if its too long then add only 15 characters
        if (strlen($insuredName) > 15) {
            $insuredName = substr($insuredName, 0, 15);
        }

        if ($insuredName == "" || empty($insuredName)) {
            $insuredName = "unknown";
        }

        // add slashes for word like o'reilly
        $insuredName =  str_replace(["/", "'", " ", ",", "-", "+", "%", "$", "(", ")", "&", "@", "!"], "", addslashes($insuredName));

        $formData = json_encode($fd);

        // sending email
        //$result = Mail::send($email_template, array('submission' => $submission,'email_template',$email_template), function ($message) use ($submission, $inputs, &$email,$uemail,$email_template) {
        // $result = Mail::send([], [], function ($message) use ($formData,$insuredName) {

        //     //$result = Mail::raw($email_template,  function ($message) use ($submission, $inputs, &$email,$uemail,$email_template) {
        //     $message->from('test@amfum.com');//'no-reply@amfredericks.com' // test@amfum.com
        //     $message->subject('RTQ-'.$insuredName); //'RTQ-Form'
        //     // $message->to('jagruti.bhudiya@amfredericks.com');
        //     $message->to('kapil.trivedi@amfredericks.com'); // rtq@amfredericks.com
        //     $message->setBody($formData);

        //     $email = $message->getSwiftMessage();
        //     $email->setCharset('utf-8');
        //     $email->setMaxLineLength(1000);
        //     $email->setContentType('text/html');
        // });

        $h = file_put_contents('../output/' . $insuredName . "_" . date('Y-m-d_His') . ".json", $formData);
        // print_r(getcwd() . "\n");exit;
        return 0;
    }

    /**
    This function will check all refer rules match or not 
     **/
    public function checkReferRules(Request $req)
    {
        //$formD = str_replace('\n', '', $req['formData']);
        $formData = json_decode($req['formData'], true);
        $rtqForm = $req['rtqForm'];
        //return $formData;
        $fdFormattedJson = $this->formatFormDataToProperJson($formData, '', '', '', '', $rtqForm, '');
        //print_r($fdFormattedJson);exit;
        $fd = json_decode($fdFormattedJson, true);

        // check refer rule is valid or not
        $referValid = $this->validation($fd, $rtqForm);
        //dd( $referValid);
        if ($referValid['valid'] == false) {
            // check which refer vaidation rules is not matched to show it to users
            $matchedOrNot = $referValid['matchArray'];
        } else if ($referValid['valid'] === 'Empty') {
            $matchedOrNot = 'Empty';
        }
        /*else{
            $referValid['valid'] = 'NotMatched';
        }*/
        // dd($referValid);
        return $referValid;
    }

    /***

    resetForm function will get all data of form and send them to AMF & reset page

     ***/
    function resetForm(Request $req)
    {
        $formData = json_decode($req['formData'], true);
        $rtqForm = $req['rtqForm'];

        $referNotMatchReason = json_decode($req['referNotMatchReason'], true);
        $filesRequired = json_decode($req['filesRequired'], true);
        //$noOfClaimsArray = json_decode($req['noOfClaimsArray'], true);
        $requiredError = trim($req['requiredError']);

        $abandonStatus = $req['abandonStatus'];
        //echo $fd[0]['contact_phone_number']['value'];
        $binding = trim($req['binding']);

        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied" || $rtqForm == "plumbing") {
            //$noOfMortgageesArray = json_decode($req['noOfMortgageesArray'], true);

            //$fdFormattedJson = $this->formatFormDataToProperJson($formData,$noOfMortgageesArray,$noOfClaimsArray,$referNotMatchReason,$filesRequired,$rtqForm,$requiredError);
            $fdFormattedJson = $this->formatFormDataToProperJson($formData, $referNotMatchReason, $filesRequired, $rtqForm, $requiredError);
            $fd = json_decode($fdFormattedJson, true);

            $valid = $this->validation($fd, $rtqForm);
        } else if ($rtqForm == "homeInspector") {
            //$fdFormattedJson = $this->formatFormDataToProperJson($formData,'',$noOfClaimsArray,$referNotMatchReason,$filesRequired,$rtqForm,$requiredError);
            $fdFormattedJson = $this->formatFormDataToProperJson($formData, $referNotMatchReason, $filesRequired, $rtqForm, $requiredError);
            $fd = json_decode($fdFormattedJson, true);

            $valid = $this->validation($fd, $rtqForm);
        }


        $ReferNotPassedReason = sizeof($fd[0]['ReferNotPassedReason']);
        $doesCalculated = trim($req['doesCalculated']);

        $status = '';
        if ($ReferNotPassedReason == 0 && $doesCalculated == "quoted") {
            $status = "Quoted";
        } else {
            $status = "Not Required";
        }
        // add status to form data array
        $fd[0]['status']['value'] = $status;
        // abandon status
        $fd[0]['abandonStatus']['value'] = $abandonStatus;

        // encode form data
        $fdJson = json_encode($fd);

        // check which form is submitted
        if ($rtqForm == "rentedDwelling" || $rtqForm == "ownerOccupied") {
            //get calculate array
            // set all required values
            $province = ucfirst($fd[0]['risk_address_province']['value']);
            $yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];
            $fireDeptDistance = ucfirst($fd[0]['fireAlarmDetectors_fireDeptDistance']['value']);
            $fireDeptType = ucwords($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
            $hydrant = ucfirst($fd[0]['fireAlarmDetectors_hydrant']['value']);
            $buildingLimit = $this->checkValue($fd[0]['coverage_buildingLimit']['value']);
            $contentsLimit = $this->checkValue($fd[0]['coverage_contentsLimit']['value']);
            $rentalIncomeLimit = $this->checkValue($fd[0]['coverage_rentalIncomeLimit']['value']);
            $garageLimit = $this->checkValue($fd[0]['coverage_garageLimit']['value']);
            $shedLimit = $this->checkValue($fd[0]['coverage_shedLimit']['value']);
            $liability = $fd[0]['coverage_liabilityLimit']['value'];

            // get calculateArray
            $calculateArray = $this->getCalculateArray($province, $yearsBuilt, $fireDeptDistance, $fireDeptType, $hydrant, $buildingLimit, $contentsLimit, $rentalIncomeLimit, $garageLimit, $shedLimit, $liability, $rtqForm);

            // set calculated array to form data 
            if (isset($calculateArray['towngrade'])) {
                //$fd[0]['towngrade']['value'] = $calculateArray['towngrade'];
            } else {
                //$fd[0]['towngrade']['value'] = 0;
            }

            // remove towngrade from calculateArray to avoid duplication in form data array
            //unset($calculateArray['towngrade']);

            $fd[0]['calculation'] = $calculateArray;
            //$fd[0]['liabilityVal']['value'] = $calculateArray['liabilityVal'];
            //$fd[0]['fee']['value'] = $calculateArray['fee'];
            //$fd[0]['total']['value'] = $calculateArray['total'];
            $ca =  json_encode($calculateArray);
        } else if ($rtqForm == "homeInspector") {
            // set all required values
            $inspectionProvince = trim($fd[0]['risk_address_provinceOfInspection']['value']);
            $cgl_cglLimitsOfLiablitiy = trim($fd[0]['cgl_cglLimitsOfLiablitiy']['value']);
            $cgl_eoLimitsOfLiablity = trim($fd[0]['cgl_eoLimitsOfLiablity']['value']);
            $ops_totalGrossAnnualReceipts = trim($fd[0]['ops_totalGrossAnnualReceipts']['value']);
            $cgl_deductible = trim($fd[0]['cgl_deductible']['value']);
            $cgl_contractorsEquipmentFloater = trim($fd[0]['cgl_contractorsEquipmentFloater']['value']);
            $cgl_additionalPropertyFrill = trim($fd[0]['cgl_additionalPropertyFrill']['value']);
            $risk_address_noOfClaims = trim($fd[0]['risk_address_noOfClaims']['value']);
            // get calculateArray
            $calculateArray = $this->getCalculateArrayHI($inspectionProvince, $risk_address_noOfClaims, $cgl_cglLimitsOfLiablitiy, $cgl_eoLimitsOfLiablity, $ops_totalGrossAnnualReceipts, $cgl_deductible, $cgl_contractorsEquipmentFloater, $cgl_additionalPropertyFrill, $rtqForm);

            //$fd[0]['total_value']['value'] = $calculateArray['total_value'];
            $fd[0]['calculation'] = $calculateArray;
        } else if ($rtqForm == "plumbing") {
            // set all required values
            $province = trim($fd[0]['risk_address_province']['value']);
            $totalRevenue = $this->checkValue(trim($fd[0]['totalRevenue']['value']));
            $coverage_CEF = $this->checkValue(trim($fd[0]['coverage_CEF']['value']));
            $coverage_toolFloater = $this->checkValue(trim($fd[0]['coverage_toolFloater']['value']));
            $coverage_officeEquipmentsFloater = $this->checkValue(trim($fd[0]['coverage_officeEquipmentsFloater']['value']));
            $coverage_profits = $this->checkValue(trim($fd[0]['coverage_profits']['value']));
            $coverage_buildingLimit = $this->checkValue(trim($fd[0]['coverage_buildingLimit']['value']));
            $coverage_contentsLimit = $this->checkValue(trim($fd[0]['coverage_contentsLimit']['value']));
            $coverage_contentsLimitStock = $this->checkValue(trim($fd[0]['coverage_contentsLimitStock']['value']));
            $coverage_contentsLimitEquipment = $this->checkValue(trim($fd[0]['coverage_contentsLimitEquipment']['value']));
            $coverage_contentsLimitImprovements = $this->checkValue(trim($fd[0]['coverage_contentsLimitImprovements']['value']));
            $coverage_grossEarnings = $this->checkValue(trim($fd[0]['coverage_grossEarnings']['value']));
            $coverage_grossEarningsPer = trim($fd[0]['coverage_grossEarningsPer']['value']);
            $coverage_extraExpenses = $this->checkValue(trim($fd[0]['coverage_extraExpenses']['value']));
            $coverage_rentalIncomeLimit = $this->checkValue(trim($fd[0]['coverage_rentalIncomeLimit']['value']));
            $coverage_signFloater = $this->checkValue(trim($fd[0]['coverage_signFloater']['value']));

            $coverage_crime_broadFormMoney = $this->checkValue(trim($fd[0]['coverage_crime_broadFormMoney']['value']));
            $coverage_crime_insideRobbery = $this->checkValue(trim($fd[0]['coverage_crime_insideRobbery']['value']));
            $coverage_crime_outsideRobbery = $this->checkValue(trim($fd[0]['coverage_crime_outsideRobbery']['value']));
            $coverage_crime_employeeDishonesty = $this->checkValue(trim($fd[0]['coverage_crime_employeeDishonesty']['value']));
            $coverage_crime_3dRider = $this->checkValue(trim($fd[0]['coverage_crime_3dRider']['value']));

            $coverage_liabilityLimit = trim($fd[0]['coverage_liabilityLimit']['value']);
            $yearsBuilt =  $fd[0]['buildingConstruction_yearBuilt']['value'];

            $constructionType = trim($fd[0]['buildingConstruction_overallConstruction']['value']);
            $fireDeptDistance = ucfirst($fd[0]['fireAlarmDetectors_fireDeptDistance']['value']);
            $fireDeptType = ucwords($fd[0]['fireAlarmDetectors_fireDeptTye']['value']);
            $hydrant = ucfirst($fd[0]['fireAlarmDetectors_hydrant']['value']);

            $closestCity = trim($fd[0]['closestCity']['value']);
            $distanceFromClosestCity = $this->checkValue(trim($fd[0]['distanceFromClosestCity']['value']));

            $liability_typeOfOpsWorkPerformIAO = trim($fd[0]['liability_typeOfOpsWorkPerformIAO']['value']);

            // get calculateArray for plumbing form
            $calculateArray = $this->getCalculateArrayPlumbing($province, $totalRevenue, $coverage_CEF, $coverage_toolFloater, $coverage_officeEquipmentsFloater, $coverage_profits, $coverage_buildingLimit, $coverage_contentsLimit, $coverage_contentsLimitStock, $coverage_contentsLimitEquipment, $coverage_contentsLimitImprovements, $coverage_grossEarnings, $coverage_grossEarningsPer, $coverage_extraExpenses, $coverage_rentalIncomeLimit, $coverage_signFloater, $coverage_crime_broadFormMoney, $coverage_crime_insideRobbery, $coverage_crime_outsideRobbery, $coverage_crime_employeeDishonesty, $coverage_crime_3dRider, $coverage_liabilityLimit, $yearsBuilt, $constructionType, $fireDeptDistance, $fireDeptType, $hydrant, $closestCity, $distanceFromClosestCity, $liability_typeOfOpsWorkPerformIAO, $rtqForm);

            //$fd[0]['total_value']['value'] = $calculateArray['total_value'];
            $fd[0]['calculation'] = $calculateArray;
        }

        // Add md5 Hash id to form 
        $formHashID = md5(json_encode($fd));
        $fd[0]['formHashID']['value'] = $formHashID;

        //return json_encode($fd);

        // now Send email to ..... to process email
        $emailSent = $this->emailSent($fd);
        //$emailSent = 0;
        if ($emailSent == 0) {
            if ($abandonStatus ==  "windowClose") {
                $message = array('message' => 'Form has been sent to AMF.', 'success' => 'true', "abs" => "wc");
                $_SESSION['abs'] = "wc";
            } else {
                $message = array('message' => 'Form has been sent to AMF.', 'success' => 'true');
                $_SESSION['abs'] = "other";
            }
        } else {
            if ($abandonStatus ==  "windowClose") {
                $message = array('message' => 'There is something wrong to send form to AMF.', 'success' => 'false', "abs" => "wc");
                $_SESSION['abs'] = "wc";
            } else {
                $message = array('message' => 'There is something wrong to send form to AMF.', 'success' => 'false');
                $_SESSION['abs'] = "other";
            }
        }

        return $message;
    }

    // function to validate broker code with status
    public function brokerValidation(Request $req)
    {
        $brokerCode = trim($req['brokerCode']);
        $brokerDomain = trim($req['brokerDomain']);

        //get list of broker code
        $bclist = json_decode(file_get_contents(public_path() . '/json/brokercodelist.json'), true);

        // check broker code is in list
        if (isset($bclist[0][$brokerCode])) {
            if (in_array($bclist[0][$brokerCode]['status'], array("Standard", "Preferred", "Payfirst"))) {
                // if broker code is valid then check with domain if available
                if ($brokerDomain != "" && $brokerDomain != null) {
                    if (trim($bclist[0][$brokerCode]['domain']) != '') {
                        $jsonBrokerDomain = trim($bclist[0][$brokerCode]['domain']);
                        // check broker domain in json have comma separated
                        if (strpos($jsonBrokerDomain, ',') !== false) {
                            $separatedDomain = explode(',', $jsonBrokerDomain);
                            foreach ($separatedDomain as $d) {
                                if ($d == $brokerDomain) {
                                    $msg = "valid";
                                    goto out;
                                } else {
                                    $msg = "error";
                                }
                            }
                            out:
                        } else {
                            if ($bclist[0][$brokerCode]['domain'] === $brokerDomain) {
                                $msg = "valid";
                            } else {
                                $msg = "error";
                            }
                        }
                    } else {
                        $msg = "valid";
                    }
                } else {
                    $msg = "valid";
                }
            } else {
                $msg = "cancelled";
            }

            /*if($bclist[0][$brokerCode]['status'] == "Cancelled"){
                $msg = "cancelled";
            }else{
                // if broker code is valid then check with domain if available
                if($brokerDomain != "" && $brokerDomain != null){
                    if($bclist[0][$brokerCode]['domain'] === $brokerDomain){
                        $msg = "valid";
                    }else{
                        $msg = "error";
                    }
                }else{
                    $msg = "valid";
                }
            }*/
        } else {
            $msg = "Not available";
        }
        return $msg;
    }

    // FUNCTION TO GET CEF SCHEDULE LIMIT JSON DATA
    function getCEFScheduleLimit()
    {
        $getCEFScheduleLimit = json_decode(file_get_contents(public_path() . '/json/cefLimitByItemTotal.json'), true);
        return $getCEFScheduleLimit;
    }
}
