<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>


<section class="risk_address">
    <div class="row">
        <div class="form-group col-md-12" style="padding-left: 0px;">
            <h3 class="col-md-5" style="float: left;padding-left: 0px;">Risk Address</h3>
            <input type="checkbox" class="form-control col-md-1" name="sameAsMailingAddress" id="sameAsMailingAddress" style="float: left;"> 
            <label class="col-md-6" style="padding-top: 5px;"> Same as mailing address </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Street <span class="err">*</span> </label>
                <input type="text" id="risk_address_street" name="risk_address_street" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> City <span class="err">*</span> </label>
                <input type="text" id="risk_address_city" name="risk_address_city" class="form-control col-md-8 required"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Postal code / Zip code <span class="err">*</span> </label>
                <input type="text" id="risk_address_postalCode" name="risk_address_postalCode" class="form-control col-md-8 onlyNumbersAndLetters required"  value="" maxlength="10">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Lot Size <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_lot_size" name="risk_address_lot_size">
                    <option value="">-Select lot size-</option>
                    <option value="Standard">Standard</option>
                    <option value="Over 1 Acre">Over 1 Acre</option>
                </select>
            </div>
            <div class="form-group" id="describeOver1Acre" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">  Describe Use Over 1 Acre </span> </label>
                <input type="text" id="risk_address_describeOver1Acre" name="risk_address_describeOver1Acre" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> How Many Mortgagees ? <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_howmany_mortgagees" name="risk_address_howmany_mortgagees">
                    <option value="">-Select mortgagees number-</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="more">More</option>
                </select>
            </div>
            <div id="howManyMortgagees" style="display: none;">
                
            </div>

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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Has the insured been cancelled/declined insurance ? <span class="err">*</span> </label>
                        <select class="form-control col-md-8 required" id="risk_address_hasInsuredCancelInsurance" name="risk_address_hasInsuredCancelInsurance">
                            <option value="">-Select value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="risk_address_hasInsuredCancelInsuranceIfYesBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">If yes, please attach details </span> </label>
                <input type="text" id="risk_address_hasInsuredCancelInsuranceIfYes" name="risk_address_hasInsuredCancelInsuranceIfYes" class="form-control col-md-8"  value="">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Number of claims in the last 5 years ? <span class="err">*</span> </label>
                        <select class="form-control col-md-8 required" id="risk_address_noOfClaims" name="risk_address_noOfClaims">
                            <option value="">-Select claims-</option>
                            <option value="0">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="more">More</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="numberOfClaims" style="display: none;">
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Are you aware of any incidence that may result in a claim ? <span class="err">*</span></label>
                        <select class="form-control col-md-8 required" id="risk_address_incidenceInClaim" name="risk_address_incidenceInClaim">
                            <option value="">-Select value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="incidenceOfClaimBox" style="display: none;">
                <div class="form-group"  >
                    <label class="col-md-4" style="float: left;"> <span class="optionalBox">If yes, please advise details </span> </label>
                    <input type="text" id="risk_address_incidenceOfClaim_details" name="risk_address_incidenceOfClaim_details" class="form-control col-md-8"  value="">
                </div>
                <div class="form-group" >
                    <label class="col-md-4" style="float: left;"> <span class="optionalBox">Type of claims </span> <span class="err">*</span></label>
                    <select class="form-control col-md-8 required" id="risk_address_incidenceOfClaim_type" name="risk_address_incidenceOfClaim_type">
                        <option value="">-Select claim type-</option>
                        <option value="Property">Property</option>
                        <option value="Liability">Liability</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> In what type of neighborhood is it located ? <span class="err">*</span></label>
                        <select class="form-control col-md-8 required" id="risk_address_typeOfNeighborhood" name="risk_address_typeOfNeighborhood">
                            <option value="">-Select type of neighborhood-</option>
                            <option value="Residential">Residential</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Urban">Urban</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>