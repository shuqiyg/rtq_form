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
                <label class="col-md-4" style="float: left;"> First Name of Applicant <span class="err">*</span> </label>
                <input type="text" id="insured_ApplicantFirstName" name="insured_ApplicantFirstName" class="form-control col-md-8 required"  value="">
            </div>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Last Name of Applicant <span class="err">*</span> </label>
                <input type="text" id="insured_ApplicantLastName" name="insured_ApplicantLastName" class="form-control col-md-8 required"  value="">
            </div>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> SOLE or CORP <span class="err">*</span> </label>
                <select id="insured_soleOrCorp" name="insured_soleOrCorp" class="form-control col-md-8 infoToggle required">
                    <option value="">-Select Insured Type-</option>
                    <option value="Sole">Sole Owner </option>
                    <option value="Corporation">Corporation</option>
                </select>
            </div>
            
             <div class="form-group insuredSoleBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">DBA/OA Name <span class="err">*</span> </span></label>
                <input type="text" id="insured_soleDBAName" name="insured_DBAName" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group insuredSoleBOX" style="display: none;">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Phone Number  </span></label>
                <input type="text" id="insured_solePhoneNumber" name="insured_solePhoneNumber" class="form-control col-md-8 checkPhone"  value="" placeholder="Please use x or ext if there is extention">
            </div>

            <div class="form-group insuredCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact First Name <span class="err">*</span> </span></label>
                <input type="text" id="contact_first_name" name="contact_first_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group insuredCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact Last Name <span class="err">*</span> </span></label>
                <input type="text" id="contact_last_name" name="contact_last_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group insuredCorpBox" style="display: none;">
                <p class="validPhoneError" style="display: none;color: red;">Please enter valid phone</p>
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Contact Phone Number </span> </label>
                <input type="tel" id="contact_phone_number" name="contact_phone_number" class="form-control col-md-8 checkPhone"  value=""  placeholder="Please use x or ext if there is extention">
            </div>
            
            <div class="form-group insuredSoleOrCorpBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="nestedBox">Website </span></label>
                <input type="text" id="website" name="website" class="form-control col-md-8"  value="">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year Business Started <span class="err">*</span> </label>
                <input type="text" id="insured_yearBusinessStarted" name="insured_yearBusinessStarted" class="form-control col-md-8 required onlyNumbers checkYear"  value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Year of Experience <span class="err">*</span> </label>
                <input type="text" id="insured_yearOfExperience" name="insured_yearOfExperience" class="form-control col-md-8 required onlyNumbers"  value="" maxlength="3" >
            </div>
            
        </div>
    </div>
</section>
<section class="mailing_address">
    <h3>Mailing Address</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Street <span class="err">*</span> </label>
                <input type="text" id="mailing_address_street" name="mailing_address_street" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> City <span class="err">*</span> </label>
                <input type="text" id="mailing_address_city" name="mailing_address_city" class="form-control col-md-8 required"  value="">
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
            <div class="form-group"  id="mailing_address_provOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_province_other" id="mailing_address_province_other" style="float: left;margin-bottom: 5px;" />
                <a id="revertProvinceList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="mailing_address_postalCode" name="mailing_address_postalCode" class="form-control col-md-8 onlyNumbersAndLetters required"  value="" maxlength="10">
            </div>
            <div class="form-group"  id="mailing_address_countryBox">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="mailing_address_country" name="mailing_address_country">
                    <option value="">-Select Country-</option>
                    <option value="Canada">Canada</option>
                    <option value="USA">USA</option>
                    <option value="other">Other Country</option>
                </select>
            </div>
            <div class="form-group"  id="mailing_address_countryOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span> </label>
                <input type="text" class="form-control col-md-7 required" name="mailing_address_countryOther" id="mailing_address_countryOther" style="float: left;margin-bottom: 5px;" />
                <a id="revertContryList" class="col-md-1" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Is the risk address same as above address? <span class="err">*</span> </label>
                <input type="checkbox" id="insured_isRiskAddressSame" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
            </div>

            <h3>Risk Address</h3>
            
            <div class="form-group riskAddressBOX" >
                <label class="col-md-4" style="float: left;"> Street <span class="err">*</span> </label>
                <input type="text" id="risk_address_street" name="risk_address_street" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group riskAddressBOX" >
                <label class="col-md-4" style="float: left;"> City <span class="err">*</span> </label>
                <input type="text" id="risk_address_city" name="risk_address_city" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group riskAddressBOX" >
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group riskAddressBOX" >
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="risk_address_postalCode" name="risk_address_postalCode" class="form-control col-md-8 onlyNumbersAndLetters required"  value="" maxlength="10">
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
                        <select class="form-control col-md-8 required" id="insured_licenced" name="insured_licenced">
                            <option value="">-Select Value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>