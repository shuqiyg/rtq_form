<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<div id="meaning-tab-1" style="display: none;">
    <dl class="meaning">
        <dt>Broker Name</dt>
        <dd>First And Last name of broker</dd>
        <dt>Broker Code</dt>
        <dd>Four digit code given by AMF to authorized broker</dd>
    </dl>
</div>

<section class="brokerInfo">
    <h3>Broker</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Broker Name <span class="err">*</span> </label>
                <input type="text" id="broker_name" name="broker_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group has-feedback">
                <p id="bcMsg" style="color: red;"></p>
                <label class="col-md-4" style="float: left;"> Broker Code </label>
                <input type="text" id="broker_code" name="broker_code" class="form-control col-md-8 onlyNumbers validateBroker"  value="" maxlength="4">
            </div>
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Producer Name <span class="err">*</span> </label>
                <input type="text" id="broker_producer_name" name="broker_producer_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group has-feedback">
                <p class="validEmailError" style="display: none;color: red;">Please enter valid email</p>
                <label class="col-md-4" style="float: left;"> Producer Email <span class="err">*</span> </label>
                <input type="email" id="broker_producer_email" name="broker_producer_email" class="form-control col-md-8 checkEmail validateBroker required"  value="">
            </div>
            <div class="form-group has-feedback">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> Producer Phone <span class="err">*</span> </label>
                <input type="tel" id="broker_producer_phone" name="broker_producer_phone" class="form-control col-md-8 checkPhone required"  value="" placeholder="Please use x or ext if there is extention">
            </div>

            @if($formVal == "plumbing")   
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Is this quote required for a specific date? </label>
                <input type="text" id="due_date" name="due_date" class="form-control col-md-8 datepicker "  value="" placeholder="mm/dd/yyyy">
            </div>
            @endif

        </div>
    </div>
</section>
<section class="brokerSurvey">
    <h3>Broker Survey</h3>
   
    <div class="row">
    <div class="form-group col-md-12 item_flex">
        <label class="col-md-4"> Do you know the Applicant Personally <span class="err">*</span> </label>
       <!--  <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_applicantPersonally" name="brokerSurvey_applicantPersonally">    -->
       <div class="radio_group required">
        <label><input type="radio" id="yes" name="brokerSurvey_applicantPersonally" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="brokerSurvey_applicantPersonally" value="No" required><span class="radio_title">No</span></label>
        <span class="radio_error" style="display:none;color: red;">Required.</span>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifYesApplicantPersonally" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If Yes, for how long </span> </label>
                <input type="tel" id="brokerSurvey_applicantPersonally_HowLong" name="brokerSurvey_applicantPersonally_HowLong" class="form-control col-md-8" >
            </div>
            
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Did you receive the order direct from the Applicant <span class="err">*</span> </label>         
<!--                 <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_OrderDirectApplicant" name="brokerSurvey_OrderDirectApplicant"> -->
             <div class="radio_group required">
            <label><input type="radio" id="yes" name="brokerSurvey_OrderDirectApplicant" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="brokerSurvey_OrderDirectApplicant" value="No"><span class="radio_title">No</span> </label>
             <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifNoOrderDirectApplicant" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If No, from whom and why </span> </label>
                <input type="tel" id="brokerSurvey_OrderDirectApplicantWhomWhy" name="brokerSurvey_OrderDirectApplicantWhomWhy" class="form-control col-md-8" >
            </div>
            
        </div>
    </div><div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Do you handle other Insurance for the Applicant <span class="err">*</span> </label>
               <!--  <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_handleOtherInsurance" name="brokerSurvey_handleOtherInsurance"> -->
                <div class="radio_group required">
                <label><input type="radio" id="yes" name="brokerSurvey_handleOtherInsurance" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="brokerSurvey_handleOtherInsurance" value="No"><span class="radio_title">No</span></label>
                <span class="radio_error" style="display:none;color: red;">Required.</span>  
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifYesHandleOtherInsurance" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If Yes, Which Coverages </span> </label>
                <input type="tel" id="brokerSurvey_handleOtherInsuranceCoverages" name="brokerSurvey_handleOtherInsuranceCoverages" class="form-control col-md-8" >
            </div>
            
        </div>
    </div><div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Do you recommend this risk in every Respect  <span class="err">*</span> </label>
                <!-- <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_recommandRisk" name="brokerSurvey_recommandRisk"> --> 
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="brokerSurvey_recommandRisk" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="brokerSurvey_recommandRisk" value="No"><span class="radio_title">No</span></label>
                <span class="radio_error" style="display:none;color: red;">Required.</span> 
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifNoRecommandRisk" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If No, please explain </span> </label>
                <input type="tel" id="brokerSurvey_recommandRiskExplain" name="brokerSurvey_recommandRiskExplain" class="form-control col-md-8" >
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Is this risk a renewal to your office <span class="err">*</span> </label>
                <!-- <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_riskRenewalToOffice" name="brokerSurvey_riskRenewalToOffice"> --> 
                 <div class="radio_group required">
                <label><input type="radio" id="yes" name="brokerSurvey_riskRenewalToOffice" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="brokerSurvey_riskRenewalToOffice" value="No"><span class="radio_title">No</span></label>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifYesRiskRenewalToOffice" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If yes, how long have you placed this risk </span> </label>
                <input type="tel" id="brokerSurvey_riskRenewalToOfficeHowLong" name="brokerSurvey_riskRenewalToOfficeHowLong" class="form-control col-md-8" >
            </div>
            
        </div>
    </div>   
    @if($formVal == "homeInspector")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are you a licenced broker in the province where the risk is located? </label>               
                <!-- <input class="checkbox_custom" type="checkbox"  id="brokerSurvey_licenced" name="brokerSurvey_licenced">  -->
                <input type="tel" id="brokerSurvey_licenced" name="brokerSurvey_licenced" class="form-control col-md-8" >
            </div>
        </div>
    </div>
    @endif    
</section>