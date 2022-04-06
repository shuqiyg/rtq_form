<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="existingInsuranceTab">
    <h3>Existing Insurance</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Are you currently insured? <span
                        class="err">*</span> </label>
                <!-- <select id="existingInsurance_currentlyInsured" name="existingInsurance_currentlyInsured" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select> -->
                <div class="radio_group required">
                    <input type="radio" id="yes" name="existingInsurance_currentlyInsured" value="Yes"><span
                        class="radio_title">Yes</span><input type="radio" id="no"
                        name="existingInsurance_currentlyInsured" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>


            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> Existing Insurer <span
                        class="err">*</span> </label>
                <input type="text" id="risk_address_existingInsurer" name="risk_address_existingInsurer"
                    class="form-control col-md-8 required" value="">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> Expiry Date <span class="err">*</span>
                </label>
                <input type="text" id="risk_address_existingInsurerExpiryDate"
                    name="risk_address_existingInsurerExpiryDate" class="form-control col-md-8 datepicker" value=""
                    placeholder="mm/dd/yyyy">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> Retroactive Date <span
                        class="err">*</span> </label>
                <input type="text" id="risk_address_existingInsurerRetroactiveDate"
                    name="risk_address_existingInsurerRetroactiveDate" class="form-control col-md-8 datepicker" value=""
                    placeholder="mm/dd/yyyy">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;">Policy #</label>
                <input type="text" id="risk_address_existingInsurerPolicyNo" name="risk_address_existingInsurerPolicyNo"
                    class="form-control col-md-8" value="">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;">Expiring Premium</label>
                <input type="text" id="risk_address_existingInsurerExpiringPremium"
                    name="risk_address_existingInsurerExpiringPremium" class="form-control col-md-8 commaValues"
                    value="">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;">Limits</label>
                <input type="text" id="risk_address_existingInsurerLimits" name="risk_address_existingInsurerLimits"
                    class="form-control col-md-8 commaValues" value="">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;">Deductible</label>
                <input type="text" id="risk_address_existingInsurerDeductible"
                    name="risk_address_existingInsurerDeductible" class="form-control col-md-8 commaValues" value="">
            </div>

            <div class="form-group eiBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> Terms And Conditions</label>
                <textarea rows="5" id="existingInsurance_termsAndConditions" name="existingInsurance_termsAndConditions"
                    class="form-control col-md-8"></textarea>
            </div>

        </div>
    </div>
</section>
