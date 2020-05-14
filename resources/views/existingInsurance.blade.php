            <div class="form-group" id="risk_address_existingInsurerBox">
                <label class="col-md-4" style="float: left;"> Existing Insurer <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_existingInsurer" name="risk_address_existingInsurer">
                    <option value="">-Select Existing Insurer-</option>
                    <option value="None">None</option>
                    <option value="AMF">A.M.Fredericks</option>
                    <option value="Other">Other</option>
                </select>
            </div>
                
    
            <div class="form-group"  id="risk_address_existingInsurerOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Existing Insurer <span class="err">*</span> </label>
                <input type="text" id="risk_address_existingInsurerOther" name="risk_address_existingInsurerOther" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                <a id="revertExistingInsurerList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Expiry Date</span></label>
                <input type="text" id="risk_address_existingInsurerExpiryDate" name="risk_address_existingInsurerExpiryDate" class="form-control col-md-8 datepicker"  value="" placeholder="mm/dd/yyyy">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Policy # </span></label>
                <input type="text" id="risk_address_existingInsurerPolicyNo" name="risk_address_existingInsurerPolicyNo" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Will they renew ? </span></label>
                <select class="form-control col-md-8" id="risk_address_existingInsurerWillRenew" name="risk_address_existingInsurerWillRenew">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group" id="risk_address_existingInsurerNonRenewalBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> If no, give reason for non-renewal </span> </label>
                <input type="text" id="risk_address_existingInsurerNonRenewal" name="risk_address_existingInsurerNonRenewal" class="form-control col-md-8"  value="">
            </div>

            @if($formVal == "plumbing")  
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Expiring Premium </span></label>
                <input type="text" id="risk_address_existingInsurerExpiringPremium" name="risk_address_existingInsurerExpiringPremium" class="form-control col-md-8 commaValues"  value="">
            </div>
            @endif
