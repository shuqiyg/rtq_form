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

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sole Proprietorship or Incorporated <span
                        class="err">*</span> </label>
                <select id="insured_soleOrCorp" name="insured_soleOrCorp"
                    class="form-control col-md-8 infoToggle required">
                    <option value="">-Select Insured Type-</option>
                    <option value="Sole">Sole Owner </option>
                    <option value="Corporation">Corporation</option>
                </select>
            </div>

            <div class="form-group insuredSoleOrCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Insured Name / Legal
                        Entity Name <span class="err">*</span> </span></label>
                <input type="text" id="insured_name" name="insured_name" class="form-control col-md-8 required"
                    value="">
            </div>
            <div class="form-group insuredSoleBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">First Name of Applicant
                        <span class="err">*</span> </span></label>
                <input type="text" id="insured_ApplicantFirstName" name="insured_ApplicantFirstName"
                    class="form-control col-md-8 required" value="">
            </div>

            <div class="form-group insuredSoleBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Last Name of Applicant
                        <span class="err">*</span></span> </label>
                <input type="text" id="insured_ApplicantLastName" name="insured_ApplicantLastName"
                    class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group insuredSoleBOX" style="display: none;">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Phone Number
                    </span></label>
                <input type="text" id="insured_solePhoneNumber" name="insured_solePhoneNumber"
                    class="form-control col-md-8 checkPhone" value=""
                    placeholder="Please use x or ext if there is extention">
            </div>


            <div class="form-group insuredCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Name of Principals
                        <span class="err">*</span> </span></label>
                <input type="text" id="insured_namePrincipalsInsured" name="insured_namePrincipalsInsured"
                    class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group insuredCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact First Name
                        <span class="err">*</span> </span></label>
                <input type="text" id="insured_contact_first_name" name="insured_contact_first_name"
                    class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group insuredCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact Last Name <span
                            class="err">*</span> </span></label>
                <input type="text" id="insured_contact_last_name" name="insured_contact_last_name"
                    class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group insuredCorpBox" style="display: none;">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact Phone Number
                    </span> </label>
                <input type="tel" id="insured_contact_phone_number" name="insured_contact_phone_number"
                    class="form-control col-md-8 checkPhone" value=""
                    placeholder="Please use x or ext if there is extention">
            </div>

            <div class="form-group insuredSoleOrCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Website </span></label>
                <input type="text" id="insured_website" name="insured_website" class="form-control col-md-8" value="">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year Business Started <span
                        class="err">*</span> </label>
                <input type="text" id="insured_yearBusinessStarted" name="insured_yearBusinessStarted"
                    class="form-control col-md-8 required onlyNumbers checkYear" value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year of Experience </label>
                <input type="text" id="insured_yearOfExperience" name="insured_yearOfExperience"
                    class="form-control col-md-8 onlyNumbers" value="" maxlength="3">
            </div>

            <!-- Plumbing form have some different fields that need to add here -->
            @if ($formVal == 'plumbing')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Policy Language </label>
                    <select class="form-control col-md-8" id="insured_policy_language" name="insured_policy_language">
                        <option value="">-Select policy language-</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-md-4" style="float: left;"> Does the Insured have a criminal record?</label>
                            <!--  <input class="checkbox_custom" type="checkbox"  id="insured_criminal_record" name="insured_criminal_record"> -->
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
            <div class="form-group" id="mailing_address_provOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_province_other" id="mailing_address_province_other" style="float: left;margin-bottom: 5px;" />
                <a id="revertProvinceList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div>
            <div class="form-group">
                <p class="validPostalError" style="display: none;color: red;">Please enter valid Postal Code</p>
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="mailing_address_postalCode" name="mailing_address_postalCode" class="form-control col-md-8 postalcodeValidation onlyNumbersAndLetters required" value="" maxlength="10">
            </div>
            <div class="form-group" id="mailing_address_countryBox">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span>
                </label>
                <select class="form-control col-md-8 required" id="mailing_address_country"
                    name="mailing_address_country">
                    <option value="">-Select Country-</option>
                    <option value="Canada">Canada</option>
                    <option value="USA">USA</option>
                    <option value="other">Other Country</option>
                </select>
            </div>
            <div class="form-group" id="mailing_address_countryOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span></label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_countryOther"
                    id="mailing_address_countryOther" style="float: left;margin-bottom: 5px;" />
                <a id="revertContryList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip"
                    title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div>
        </div>
    </div>
    <!-- Below form don't need risk address fields on this tab -->
    @if ($formVal != 'plumbing')
        <div class="row">
            <div class="col-md-12">

                {{-- <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Is the risk address same as above address? <span class="err">*</span> </label>
                    <input type="checkbox" id="insured_isRiskAddressSame" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                </div> --}}

                <h3>Risk Address</h3>

                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Is the risk address same as above address? <span class="err">*</span> </label>
                    <input type="checkbox" id="insured_isRiskAddressSame" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                </div> 

                <div class="radio_group required">
                    <input type="radio" id="yes" name="brokerSurvey_riskRenewalToOffice" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="brokerSurvey_riskRenewalToOffice" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                
                <div class="form-group riskAddressBOX">
                    <label class="col-md-4" style="float: left;"> Street <span class="err">*</span></label>
                    <input type="text" id="risk_address_street" name="risk_address_street" class="form-control col-md-8 required" value="">
                </div>
                <div class="form-group riskAddressBOX">
                    <label class="col-md-4" style="float: left;"> City <span class="err">*</span></label>
                    <input type="text" id="risk_address_city" name="risk_address_city" class="form-control col-md-8 required" value="">
                </div>
                <div class="form-group riskAddressBOX">
                    <label class="col-md-4" style="float: left;"> Province <span class="err">*</span></label>
                    <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                        <option value="">-Select province-</option>
                        @foreach ($canState as $s)
                            <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group riskAddressBOX">
                    <p class="validPostalError" style="display: none;color: red;">Please enter valid Postal Code</p>
                    <label class="col-md-4" style="float: left;"> Postal code <span class="err">*</span> </label>
                    <input type="text" id="risk_address_postalCode" name="risk_address_postalCode" class="form-control col-md-8 postalcodeValidation onlyNumbersAndLetters required" value="" maxlength="10">
                </div>

                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Province of Inspection <span class="err">*</span> </label>
                    <select class="form-control col-md-8 required" id="risk_address_provinceOfInspection" name="risk_address_provinceOfInspection">
                        <option value="">-Select province-</option>
                        @foreach ($canState as $s)
                            <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-md-4" style="float: left;"> Are you Licenced? <span class="err">*</span> </label>
                            <!--  <select class="form-control col-md-8 required" id="insured_licenced" name="insured_licenced">
                            <option value="">-Select Value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select> -->
                            <div class="radio_group required">
                                <input type="radio" id="yes" name="insured_licenced" value="Yes"><span
                                    class="radio_title">Yes</span><input type="radio" id="no"
                                    name="insured_licenced" value="No"><span class="radio_title">No</span>
                                <span class="radio_error" style="display:none;color: red;">Required.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif

</section>
