<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="opsIndustryGeneralTab">
    <h3>OPS  <small>(Industry General)</small></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> What is the type of service offered? <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="ops_typeOfService" name="ops_typeOfService">
                    <option value="">-Select type of service offered-</option>
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Industrial">Industrial</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Do you provide service outside of Canada?  <span class="err">*</span> </label>
                <!-- <select class="col-md-8 form-control required" id="ops_doProvideServiceOutsideOfCanada" name="ops_doProvideServiceOutsideOfCanada">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_doProvideServiceOutsideOfCanada" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_doProvideServiceOutsideOfCanada" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
            
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;">What are the total Gross Annual Receipts? <span class="err">*</span> </label>
                <input type="text" id="ops_totalGrossAnnualReceipts" name="ops_totalGrossAnnualReceipts" class="form-control col-md-8 required commaValues"  value="">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;">How many employees do you have? <span class="err">*</span> </label>
                <input type="text" id="ops_howManyEmployees" name="ops_howManyEmployees" class="form-control col-md-8 required onlyNumbers"  value="">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;">Whats is the actual payroll of the employees ? <span class="err">*</span> </label>
                <input type="text" id="ops_actualPayrollOfEmployees" name="ops_actualPayrollOfEmployees" class="form-control col-md-8 required commaValues"  value="">
            </div>

            <h4 style="clear: both;">What are their positions ?</h4>
            <small>Please enter the disturbution of employees below in %</small>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Principals, Partners or Officers % <span class="err">*</span> </label>
                <input type="number" id="ops_ppoEmployeesPercentage" name="ops_ppoEmployeesPercentage" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;">Professionals %<span class="err">*</span> </label>
                <input type="number" id="ops_professionalsEmployeesPercentage" name="ops_professionalsEmployeesPercentage" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Support staff %  <span class="err">*</span> </label>
                <input type="number" id="ops_supportStaffEmployeesPercentage" name="ops_supportStaffEmployeesPercentage" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Part-time professionals (works less than 20 hours a week) % <span class="err">*</span> </label>
                <input type="number" id="ops_partTimeProfEmployeesPercentage" name="ops_partTimeProfEmployeesPercentage" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Do you carry employer's liability insurance? <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_carryEmployerLiablityInsurance" name="ops_carryEmployerLiablityInsurance">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_carryEmployerLiablityInsurance" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_carryEmployerLiablityInsurance" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group carryEmployerLiablityInsuranceBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Give number and occupation of employees </span> </label>
                <textarea rows="5" class="form-control col-md-8" id="ops_carryELInumberOccupationOfEmployees" name="ops_carryELInumberOccupationOfEmployees" ></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Are they covered by Worker's Compensation?   <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_coveredByWorkerCompensation" name="ops_coveredByWorkerCompensation">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_coveredByWorkerCompensation" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_coveredByWorkerCompensation" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group coveredByWorkerCompensationBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Give number and types of employees that are not covered </span>  </label>
                <textarea rows="5" class="form-control col-md-8" id="ops_coveredByWCnumberAndTypeOfEmployees" name="ops_coveredByWCnumberAndTypeOfEmployees" ></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Do you have a contract for your services in place?  <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_haveContractForServices" name="ops_haveContractForServices">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_haveContractForServices" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_haveContractForServices" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-md-12">
            <div class="form-group haveContractForServicesBOX" style="display: none;">
                <label class="col-md-12" style="float: left;"> <span class="optionalBox">Please provide a copy of standard contract, include any lease agreement or railway siding agreement </span> </label>
                <input type="file" class="col-md-12 " name="contractForServiceHI" id="contractForServiceHI" style="margin-left: 20px;padding-left: 5px;">
            </div>
        </div>
    </div>
    -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Do you have subcontactors that preform services?  <span class="err">*</span> </label>
                <!-- <select class="col-md-8 form-control required" id="ops_haveSubContractors" name="ops_haveSubContractors">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_haveSubContractors" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_haveSubContractors" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group haveSubContractorsBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Cost of work sublet <span class="err">*</span> </span> </label>
                <input type="text" id="ops_haveSubContractors_costOfSublet" name="ops_haveSubContractors_costOfSublet" class="form-control col-md-8 required commaValues"  value="">
            </div>
            <div class="form-group haveSubContractorsBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Type of sublet <span class="err">*</span></span> </label>
                <input type="text" id="ops_haveSubContractors_typeOfSublet" name="ops_haveSubContractors_typeOfSublet" class="form-control col-md-8 required"  value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group haveSubContractorsBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">hold harmless agreement  <span class="err">*</span></span> </label>
                <!-- <select class="col-md-8 form-control required" id="ops_haveSubContractors_harmlessAgreement" name="ops_haveSubContractors_harmlessAgreement">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_haveSubContractors_harmlessAgreement" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_haveSubContractors_harmlessAgreement" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group haveSubContractorsBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> Do you ask them to carry minimum liability insurance?  <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_haveSubContractors_askToCarryMinLiaInsurance" name="ops_haveSubContractors_askToCarryMinLiaInsurance">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_haveSubContractors_askToCarryMinLiaInsurance" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_haveSubContractors_askToCarryMinLiaInsurance" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group minLiaInsuranceBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Limits <span class="err">*</span> </span></label>
                <input type="text" id="ops_haveSubContractors_limitsMinCarryLiaIns" name="ops_haveSubContractors_limitsMinCarryLiaIns" class="form-control col-md-8 required commaValues"  value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group minLiaInsuranceBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">% of billings <span class="err">*</span></span> </label>
                <input type="number" id="ops_haveSubContractors_perBillingsMinLiaIns" name="ops_haveSubContractors_perBillingsMinLiaIns" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group minLiaInsuranceBOX"  style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">added as additional insured  <span class="err">*</span> </span></label>
               <!--  <select class="col-md-8 form-control required" id="ops_haveSubContractors_additionalInsured" name="ops_haveSubContractors_additionalInsured">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                  <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_haveSubContractors_additionalInsured" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_haveSubContractors_additionalInsured" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Is there any branch office or subsidiary?  <span class="err">*</span> </label>
              <!--   <select class="col-md-8 form-control required" id="ops_anyBranchOrSubsidiary" name="ops_anyBranchOrSubsidiary">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="ops_anyBranchOrSubsidiary" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="ops_anyBranchOrSubsidiary" value="No"><span class="radio_title">No</span></label>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group anyBranchOrSubsidiaryBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Name and Discription of operations</span> </label>
                <textarea rows="5" class="form-control col-md-8" id="ops_anyBranchOrSubsidiary_nameAndDesc" name="ops_anyBranchOrSubsidiary_nameAndDesc" ></textarea>
            </div>
        </div>
    </div>

</section>
