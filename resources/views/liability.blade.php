<section class="liabilityTab">
    <h3>Liability</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"> Are any of the premises leased or rented in their entirety to others who control and operate the premises? <span class="err">*</span></label>
                <select id="liability_anyPremisesLeasedRentedToOther" name="liability_anyPremisesLeasedRentedToOther" class="form-control col-md-4 required">
                    <option value="">-Select Value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="display: flex;">
                <label class="col-md-8" style="float: left;"> Does the premises have Elevators/Escalators? <span class="err">*</span></label>
                <select id="liability_premisesHaveElevator" name="liability_premisesHaveElevator" class="form-control col-md-4 required" style="float: left;">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <span class="col-md-1" id="addElevatorBox" data-toggle="tooltip" title="Add more elevators description" style="display: none"><i class="fa fa-plus iconPadding" style="cursor: pointer;"></i></span>
            </div>
        </div>
    </div>
    <input type="hidden" name="liability_premisesHaveElevatorDetailsCount" id="liability_premisesHaveElevatorDetailsCount">
    <div id="liability_premisesHaveElevatorDetails" style="display: none;">
            
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="display: flex;">
                <label class="col-md-8" style="float: left;"> Products for Sale </label>
                <select id="liability_productsForSale" name="liability_productsForSale" class="form-control col-md-4" style="float: left;">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
                <span class="col-md-1" id="addProductsForSaleBox" data-toggle="tooltip" title="Add more products for sale description" style="display: none"><i class="fa fa-plus iconPadding" style="cursor: pointer;"></i></span>
            </div>
        </div>
    </div>
    <input type="hidden" name="liability_productsForSaleDetailsCount" id="liability_productsForSaleDetailsCount">
    <div id="liability_productsForSaleDetails" style="display: none;">
            
    </div>


    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Show in detail type(s) of operations and work performed by applicant ( Add as many as required )</h5>
            
        </div>
    </div>
    <input type="hidden" name="liability_typeOfOpsWorkPerformCount" id="liability_typeOfOpsWorkPerformCount">
    <div class="row">
        <div class="col-md-12" style="padding: 0% 10%;">
            <!-- <div class="form-group" style="display: flex;">
                <label class="col-md-8" style="float: left;"> Show in detail type(s) of operations and work performed by applicant <span class="err">*</span></label>
                <select id="liability_typeOfOpsWorkPerform" name="liability_typeOfOpsWorkPerform" class="form-control col-md-4 required" style="float: left;">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                
            </div> -->
            <!-- <div class="towf_sections" data-value="'+addTOWFCount+'">
                <label class="col-md-8" style="float: left;">1. Operation <span class="err">*</span> </label>
                <input type="text" id="liability_typeOfOpsWorkPerformOperation_1" name="liability_typeOfOpsWorkPerformOperation_1" class="form-control col-md-4 required"  value="" >

                <label class="col-md-8" style="float: left;">Number of Employees <span class="err">*</span></label>
                <input type="text" id="liability_typeOfOpsWorkPerformNoEmployee_1" name="liability_typeOfOpsWorkPerformNoEmployee_1" class="form-control col-md-4 required"  value="" >

                <label class="col-md-8" style="float: left;">Payroll <span class="err">*</span></label>
                <input type="text" id="liability_typeOfOpsWorkPerformPayroll_1" name="liability_typeOfOpsWorkPerformPayroll_1" class="form-control col-md-4 commaValues required"  value="" >

                <label class="col-md-8" style="float: left;">Gross Annual Receipts <span class="err">*</span>
                </label><input type="text" id="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" name="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" class="form-control col-md-4 commaValues required"  value="" >
            </div> -->
            <div style="border: 1px solid;background: #e8e8e8;padding: 1%; ">
                <div class="towf_sections" style="width: 100%;">
                    <span class="col-md-1" style="float: left;text-align: center;"> 1) </span>
                    <label class="col-md-4" style="float: left;">Operation <span class="err">*</span> </label>
                    <input type="text" id="liability_typeOfOpsWorkPerformOperation_1" name="liability_typeOfOpsWorkPerformOperation_1" class="form-control col-md-7 required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Number of Employees <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformNoEmployee_1" name="liability_typeOfOpsWorkPerformNoEmployee_1" class="form-control col-md-7 required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Payroll <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformPayroll_1" name="liability_typeOfOpsWorkPerformPayroll_1" class="form-control col-md-7 commaValues required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Gross Annual Receipts <span class="err">*</span>
                    </label><input type="text" id="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" name="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" class="form-control col-md-7 commaValues required"  value="" >
                </div>

                <div id="liability_typeOfOpsWorkPerformDetails" style="display: none;">
                
                </div>
                <div class="col-md-12" style="float: left;display: contents;">
                    <button class="btn btn-secondary" id="addTypeOfOpsWorkPerformBox">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div id="liability_typeOfOpsWorkPerformDetails" style="display: none;">
            
    </div>
    <div class="row">
        <div class="col-md-12">
            <!--<span class="col-md-1" style="float: left;" id="addTypeOfOpsWorkPerformBox" data-toggle="tooltip" title="Add more detail type(s) of operations and work performed description" ><i class="fa fa-plus iconPadding" style="cursor: pointer;"></i></span>
            <button class="btn btn-secondary" id="addTypeOfOpsWorkPerformBox">Add</button>-->
        </div>
    </div>
    <!-- hidden total revenue field -->
    <input type="hidden" id="totalRevenue" name="totalRevenue">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="display: flex;">
                <label class="col-md-8" style="float: left;"> Any U.S. Exposure (Past/Present/Future) <span class="err">*</span></label>
                <select id="liability_anyUSExposure" name="liability_anyUSExposure" class="form-control col-md-4 required" >
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="display: flex;">
                <label class="col-md-8" style="float: left;"> Any U.S. Installation (Past/Present/Future) <span class="err">*</span></label>
                <select id="liability_anyUSInstallation" name="liability_anyUSInstallation" class="form-control col-md-4 required" >
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"> Contractual Agreements</label>
                <select id="liability_contractualListLeaseEtc" name="liability_contractualListLeaseEtc" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" >
            <div class="form-group ifcontractualListLeaseEtcDescBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox"> Railway siding agreements, etc. (Obtain copies of agreements where possible)</span> </label>
                <select id="liability_contractualListLeaseEtcRailwaySiding" name="liability_contractualListLeaseEtcRailwaySiding" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" >
            <div class="form-group ifcontractualListLeaseEtcDescBox"  style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">  Description </span> </label>
                <textarea rows="5" class="form-control col-md-8" id="liability_contractualListLeaseEtcDesc" name="liability_contractualListLeaseEtcDesc" ></textarea>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"> Work Sublet out</label>
                <select id="liability_workSubletOut" name="liability_workSubletOut" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="ifworkSubletOutBox" style="display: none;">
            <div class="form-group" >
                <label class="col-md-8" style="float: left;"><span class="optionalBox">  Cost of Work Sublet </span> </label>
                <input type="text" id="liability_wsoCost" name="liability_wsoCost" class="form-control col-md-4 commaValues"  value="">
            </div>
            <div class="form-group" >
                <label class="col-md-8" style="float: left;"><span class="optionalBox"> Type of work </span> </label>
                <input type="text" id="liability_wsoType" name="liability_wsoType" class="form-control col-md-4 "  value="">
            </div>
            <div class="form-group" >
                <label class="col-md-8" style="float: left;"><span class="optionalBox"> Are sub-contractors requied to carry liability insurance?</span> </label>
                <select id="liability_wsoSubConLiablityInsurance" name="liability_wsoSubConLiablityInsurance" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="ifwsoSubContractorLiablityInsuranceBox" style="display: none;">
            <div class="form-group" >
                <label class="col-md-8" style="float: left;"><span class="nested2Box"> If Yes, Sepcify Limits </span> </label>
                <input type="text" id="liability_wsoSubConLiabilityInsuranceLimits" name="liability_wsoSubConLiabilityInsuranceLimits" class="form-control col-md-4 "  value="">
            </div>
            <div class="form-group" >
                <label class="col-md-8" style="float: left;"><span class="nested2Box">Do you ask sub-contractors to submit liability certificates? </span> </label>
                <select id="liability_wsoAskSubConSubmitLiabilityInsurance" name="liability_wsoAskSubConSubmitLiabilityInsurance" class="form-control col-md-4">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="nested2Box"> Are you added as an additional Insured to their Policy? </span> </label>
                <select id="liability_wsoSubConLiabilityInsuranceAdditionInsured" name="liability_wsoSubConLiabilityInsuranceAdditionInsured" class="form-control col-md-4">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="nested2Box"> Do you and sub-contractor/s enter into formal agreement/s <span class="err">*</span></span> </label>
                <select id="liability_wsoSubConLiabilityInsuranceFormalAgreement" name="liability_wsoSubConLiabilityInsuranceFormalAgreement" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifwsoSubConLiabilityInsuranceFormalAgreementBox" style="display: none;">
                <label class="col-md-8" style="float: left;"><span class="nested3Box">If yes, do you include a “Hold Harmless” clause in your favour? (Submit copy of usual contract form) </span> </label>
                <select id="liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless" name="liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless" class="form-control col-md-4">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Are all employees covered by Workmen's compensation<span class="err">*</span></label>
                <select id="liability_employeesCoveredByCompensation" name="liability_employeesCoveredByCompensation" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifemployeesCoveredByCompensationBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-6" style="float: left;"><span class="optionalBox">If No: Give number and types of employees not covered by Workmen’s Compensation <span class="err">*</span></span> </label>
                <textarea rows="5" class="form-control col-md-6 required" id="liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered" name="liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered" ></textarea>
            </div>
            <div class="form-group">
                <label class="col-md-6" style="float: left;"><span class="optionalBox">If No: Actual Payroll of these employees </span> </label>
                <input type="text" id="liability_employeesCoveredByCompensationActualPayrollIfNo" name="liability_employeesCoveredByCompensationActualPayrollIfNo" class="form-control col-md-6 "  value="">
            </div>
        </div>
    </div>

    <!--<div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Is Employers' Liability Required</label>
                <select id="liability_employerLiablity" name="liability_employerLiablity" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifemployerLiablityBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">If Yes, adise number and occupation of Employees</span> </label>
                <select id="liability_employerLiablityAdiseNumberOccupationEmployees" name="liability_employerLiablityAdiseNumberOccupationEmployees" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Tenants Legal Liability</label>
                <select id="liability_tenantsLegalLiability" name="liability_tenantsLegalLiability" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifTenantsLegalLiabilityBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">Location of Premises</span> </label>
                <input type="text" id="liability_tenantsLegalLiabilityLocation" name="liability_tenantsLegalLiabilityLocation" class="form-control col-md-4 "  value="">
            </div>
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">Amount to be insured</span> </label>
                <input type="text" id="liability_tenantsLegalLiabilityAmount" name="liability_tenantsLegalLiabilityAmount" class="form-control col-md-4 "  value="">
            </div>
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">Is there a lease agreement</span> </label>
                <input type="text" id="liability_tenantsLegalLiabilityAgreement" name="liability_tenantsLegalLiabilityAgreement" class="form-control col-md-4 "  value="">
            </div>
        </div>
    </div>
-->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Is there any use of radioactive materials in the premises?</label>
                <select id="liability_anyRadioactiveMaterials" name="liability_anyRadioactiveMaterials" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Is any welding equipment usage (welder, blowtorches, etc)?</label>
                <select id="liability_anyWeldingEquipUsage" name="liability_anyWeldingEquipUsage" class="form-control col-md-4 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifanyWeldingEquipUsageBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">If Yes, Details of operations</span> </label>
                <input type="text" id="liability_anyWeldingEquipUsageDetails" name="liability_anyWeldingEquipUsageDetails" class="form-control col-md-4 "  value="">
            </div>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Does forest fire prevenion act apply? <span class="err">*</span></label>
                <select id="liability_doesForestFirePreventionAct" name="liability_doesForestFirePreventionAct" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Do you have any special agreement/s with Dept. of Lands and Forest? <span class="err">*</span></label>
                <select id="liability_specialAgreement" name="liability_specialAgreement" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifspecialAgreementBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">State Limit of Liability required (Aggregate/Each Occurrence) <span class="err">*</span></span> </label>
                <input type="text" id="liability_specialAgreementStateLimit" name="liability_specialAgreementStateLimit" class="form-control col-md-4 required"  value="">
            </div>    
        </div>
    </div>

    <h5>Do you engage any of the operation/s below:</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Demolition or Wrecking <span class="err">*</span></label>
                <select id="liability_engageOpsDemolition" name="liability_engageOpsDemolition" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Shoring <span class="err">*</span> </label>
                <select id="liability_engageOpsShoring" name="liability_engageOpsShoring" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Underpinning <span class="err">*</span></label>
                <select id="liability_engageOpsUnderpinning" name="liability_engageOpsUnderpinning" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Caisson Work <span class="err">*</span> </label>
                <select id="liability_engageOpsCaissonWork" name="liability_engageOpsCaissonWork" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Excavation <span class="err">*</span></label>
                <select id="liability_engageOpsExcavation" name="liability_engageOpsExcavation" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Use of Explosives <span class="err">*</span> </label>
                <select id="liability_engageOpsExplosives" name="liability_engageOpsExplosives" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Tunneling <span class="err">*</span></label>
                <select id="liability_engageOpsTunneling" name="liability_engageOpsTunneling" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-8" style="float: left;">Raising or moving of buildings and structures <span class="err">*</span> </label>
                <select id="liability_engageOpsRaisingBuildings" name="liability_engageOpsRaisingBuildings" class="form-control col-md-4 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>    
        </div>
    </div>
</section>