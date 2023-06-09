<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="insuredTab">
    <h3>Insured</h3>
    <div class="row">
        <div class="col-md-12">

            {{-- Day Care --}}
            @if ($formVal == 'dayCare')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-4" style="float: left;"> Is this a Licensed Daycare? </label>
                        <div class="radio_group">
                            <input type="radio" id="yes" name="licensed_dayCare" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="licensed_dayCare" value="No"><span class="radio_title">No</span>
                            <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-4" style="float: left;"> Is this a Commercial or Home Daycare? </label>
                        <div class="radio_group">
                            <input type="radio" id="comm_or_home" name="comm_or_home" value="commercial"><span class="radio_title">Commercial</span><input type="radio" id="comm_or_home" name="comm_or_home" value="home"><span class="radio_title">Home Daycare</span>
                            <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Insured Name / Legal Entity Name <span
                        class="err">*</span> </label>
                <input type="text" id="insured_name" name="insured_name" class="form-control col-md-8 required"
                    value="">
            </div>
            @if ($formVal == 'ownerOccupied')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> <span class="nestedBox"> Is this a Corporation? </span><span class="err">*</span> </label>
                    <!--  <select id="insured_isCorporation" name="insured_isCorporation" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->

                    <div class="radio_group required">
                        <input type="radio" id="yes" name="insured_isCorporation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="insured_isCorporation" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact First Name <span class="err">*</span> </label>
                <input type="text" id="insured_contact_first_name" name="insured_contact_first_name" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact Last Name <span class="err">*</span> </label>
                <input type="text" id="insured_contact_last_name" name="insured_contact_last_name" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> Contact Phone Number <span class="err">*</span></label>
                <input type="tel" id="insured_contact_phone_number" name="insured_contact_phone_number" class="form-control col-md-8 checkPhone" value="" placeholder="Please use x or ext if there is extention">
            </div>
            <div class="form-group">
                <p class="validEmailError" style="display: none;color: red;">Please enter valid email</p>
                <label class="col-md-4" style="float: left;"> Contact Email </label>
                <input type="email" id="insured_contact_email" name="insured_contact_email" class="form-control col-md-8 checkEmail" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Website </label>
                <input type="text" id="insured_website" name="insured_website" class="form-control col-md-8" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Due Date </label>
                <input type="text" id="insured_due_date" name="insured_due_date" class="form-control col-md-8 datepicker" value="" placeholder="mm/dd/yyyy">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Policy Language </label>
                <select class="form-control col-md-8" id="insured_policy_language" name="insured_policy_language">
                    <option value="">-Select policy language-</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                </select>
            </div>

            {{-- Day care --}}
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year Business Started <span class="err">*</span></label>
                <input type="text" id="year_started" name="year_started" class="form-control col-md-8" value="" placeholder="yyyy" required="true">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year of Experience </label>
                <input type="text" id="year_experience" name="year_experience" class="form-control col-md-8 " value="" placeholder=""><span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> What are the estimated annual receipts? </label>
                <input type="text" id="ops_totalGrossAnnualReceipts" name="ops_totalGrossAnnualReceipts" class="form-control col-md-8 " value="" placeholder="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Current Insurer </label>
                <input type="text" id="current_insurer" name="current_insurer" class="form-control col-md-8 " value="">
            </div>
            {{-- <div class="form-group">
                <label class="col-md-4" style="float: left;"> Expiring Premium </label>
                <input type="text" id="expiring_premium" name="expiring_premium" class="form-control col-md-8 datepicker" value="">
            </div> --}}

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-4" style="float: left;"> Does the Insured have a criminal record? <span class="err">*</span></label>
                        <div class="radio_group">
                            <input type="radio" id="yes" name="insured_criminal_record" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="insured_criminal_record" value="No"><span class="radio_title">No</span>
                            <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="details_of_record_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Details of record</span> </label>
                <input type="text" id="insured_criminalRecord_details_of_record" name="insured_criminalRecord_details_of_record" class="form-control col-md-8" value="">
            </div>
            @if ($formVal == 'ownerOccupied')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;">Is there a co-occupant that requires coverage? <span class="err">*</span></label>
                    <input type="text" id="insured_coOccupantCoverage" name="insured_coOccupantCoverage" class="form-control col-md-8 required" value="">
                </div>
            @endif
        </div>
    </div>
</section>

<section class="mailing_address">
    <h3>Mailing Address</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Street <span class="err">*</span>
                </label>
                <input type="text" id="mailing_address_street" name="mailing_address_street" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> City <span class="err">*</span> </label>
                <input type="text" id="mailing_address_city" name="mailing_address_city" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group" id="mailing_address_provBox">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="mailing_address_province" name="mailing_address_province">
                    <option value="">-Select province/state-</option>
                    <optgroup label="Canada">
                        @foreach ($canState as $s)
                            <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                        @endforeach
                    </optgroup>
                    <optgroup label="USA">
                        @foreach ($usState as $s)
                            <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                        @endforeach
                    </optgroup>
                    <option value="other">Other State</option>
                </select>

            </div>
            {{-- <div class="form-group" id="mailing_address_provOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_province_other" id="mailing_address_province_other" style="float: left;margin-bottom: 5px;" />
                <a id="revertProvinceList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div> --}}
            <div class="form-group">
                <p class="validPostalError" style="display: none;color: red;">Please enter valid Postal Code</p>
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="mailing_address_postalCode" name="mailing_address_postalCode" class="form-control col-md-8 postalcodeValidation onlyNumbersAndLetters required" value="" maxlength="10">
            </div>
            <div class="form-group" id="mailing_address_countryBox">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span></label>
                <select class="form-control col-md-8 required" id="mailing_address_country"
                    name="mailing_address_country">
                    <option value="">-Select Country-</option>
                    <option value="Canada">Canada</option>
                    <option value="USA">USA</option>
                    <option value="other">Other Country</option>
                </select>
            </div>
            {{-- <div class="form-group" id="mailing_address_countryOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span></label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_countryOther" id="mailing_address_countryOther" style="float: left;margin-bottom: 5px;" />
                <a id="revertContryList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div> --}}
        </div>
    </div>
</section>

<section class="risk_address">
    <h3>Risk Address</h3>
                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Is the risk address same as above address? <span class="err">*</span> </label>
                    <input type="checkbox" id="insured_isRiskAddressSame" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                </div> 
                {{-- <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Is the risk address same as above address? <span class="err">*</span> </label>
                    <input type="checkbox" id="insured_isRiskAddressSame" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                </div>  --}}

                {{-- <div class="radio_group required">
                    <input type="radio" id="yes" name="brokerSurvey_riskRenewalToOffice" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="brokerSurvey_riskRenewalToOffice" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div> --}}
                
                <div class="form-group ">
                    <label class="col-md-4" style="float: left;"> Street <span class="err">*</span></label>
                    <input type="text" id="risk_address_street" name="risk_address_street" class="form-control col-md-8 required" value="">
                </div>
                <div class="form-group ">
                    <label class="col-md-4" style="float: left;"> City <span class="err">*</span></label>
                    <input type="text" id="risk_address_city" name="risk_address_city" class="form-control col-md-8 required" value="">
                </div>
                <div class="form-group ">
                    <label class="col-md-4" style="float: left;"> Province <span class="err">*</span></label>
                    <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                        <option value="">-Select province-</option>
                        @foreach ($canState as $s)
                            <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <p class="validPostalError" style="display: none;color: red;">Please enter valid Postal Code</p>
                    <label class="col-md-4" style="float: left;"> Postal code <span class="err">*</span> </label>
                    <input type="text" id="risk_address_postalCode" name="risk_address_postalCode" class="form-control col-md-8 postalcodeValidation onlyNumbersAndLetters required" value="" maxlength="10">
                </div>
                <div class="form-group" id="risk_address_countryBox">
                    <label class="col-md-4" style="float: left;"> Country <span class="err">*</span></label>
                    <select class="form-control col-md-8 required" id="risk_address_country"
                        name="risk_address_country">
                        <option value="">-Select Country-</option>
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
                        <option value="other">Other Country</option>
                    </select>
                </div>
</section>
