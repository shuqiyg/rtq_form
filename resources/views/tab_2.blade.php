<section class="insuredTab">
    <h3>Insured</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Insured Name / Legal Entity Name <span class="err">*</span> </label>
                <input type="text" id="insured_name" name="insured_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact First Name <span class="err">*</span> </label>
                <input type="text" id="contact_first_name" name="contact_first_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact Last Name <span class="err">*</span> </label>
                <input type="text" id="contact_last_name" name="contact_last_name" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact Phone Number  </label>
                <input type="tel" id="contact_phone_number" name="contact_phone_number" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contact Email </label>
                <input type="email" id="contact_email" name="contact_email" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Website </label>
                <input type="text" id="website" name="website" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Due Date </label>
                <input type="date" id="due_date" name="due_date" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Policy Language  </label>
                <select class="form-control col-md-8" id="policy_language" name="policy_language">
                    <option value="">-Select Value-</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-4" style="float: left;"> Does the Insured have a criminal record ? <span class="err">*</span> </label>
                        <select class="form-control col-md-8 required" id="insured_criminal_record" name="insured_criminal_record">
                            <option value="">-Select Value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="details_of_record_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Details of record</span> </label>
                <input type="text" id="details_of_record" name="details_of_record" class="form-control col-md-8"  value="">
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
            <div class="form-group">
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
                <div id="other_province"  style="display: none;">
                    <input type="text" class="form-control col-md-7 required" name="mailing_address_province_other" id="mailing_address_province_other" style="float: left;margin-bottom: 5px;" />
                    <a id="revertProvinceList" class="col-md-2" style="cursor: pointer;" data-toggle="tooltip" title="Click to reset list"><i class="fa fa-rotate-right" style="padding-top: 10px;"></i></a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="mailing_address_postalCode" name="mailing_address_postalCode" class="form-control col-md-8 onlyNumbersAndLetters required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Country <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="mailing_address_country" name="mailing_address_country">
                    <option value="">-Select Value-</option>
                    <option value="Canada">Canada</option>
                    <option value="USA">USA</option>
                </select>
            </div>
        </div>
    </div>
</section>