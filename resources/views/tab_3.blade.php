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
            <label class="col-md-6" style="padding-top: 5px;" for="sameAsMailingAddress"> Same as mailing address </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Street <span class="err">*</span></label>
                <input type="text" id="risk_address_street" name="risk_address_street" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> City <span class="err">*</span> </label>
                <input type="text" id="risk_address_city" name="risk_address_city" class="form-control col-md-8 required" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Province <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <p class="validPostalError" style="display: none;color: red;">Please enter valid Postal Code</p>
                <label class="col-md-4" style="float: left;"> Postal code <span class="err">*</span></label>
                <input type="text" id="risk_address_postalCode" name="risk_address_postalCode" class="form-control col-md-8 postalcodeValidation onlyNumbersAndLetters required" value="" maxlength="10">
            </div>

            @if ($formVal != 'plumbing')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Lot Size <span class="err">*</span> </label>
                    <select class="form-control col-md-8 required" id="risk_address_lot_size" name="risk_address_lot_size">
                        <option value="">-Select lot size-</option>
                        <option value="Standard">Standard</option>
                        <option value="Over 1 Acre">Over 1 Acre</option>
                    </select>
                </div>
                <div class="form-group" id="describeOver1Acre" style="display: none;">
                    <label class="col-md-4" style="float: left;"><span class="optionalBox"> Describe Use Over 1 Acre </span> </label>
                    <input type="text" id="risk_address_describeOver1Acre" name="risk_address_describeOver1Acre" class="form-control col-md-8" value="">
                </div>
            @endif

            @if ($formVal == 'plumbing')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-4" style="float: left;"> Is building coverage required? <span class="err">*</span> </label>
                            <div class="radio_group required">
                                <input type="radio" id="yes" name="risk_address_requireBuildingCoverage"
                                    value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no"
                                    name="risk_address_requireBuildingCoverage" value="No"><span
                                    class="radio_title">No</span>
                                <span class="radio_error" style="display:none;color: red;">Required.</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group howManyMortgageesBox">
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

            @if ($formVal != 'plumbing')
                @include('existingInsurance')
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Has the insured been cancelled/declined insurance? <span class="err">*</span></label>
                        <div class="radio_group required">
                            <input type="radio" id="yes" name="risk_address_hasInsuredCancelInsurance" value="Yes"><span
                                class="radio_title">Yes</span><input type="radio" id="no"
                                name="risk_address_hasInsuredCancelInsurance" value="No"><span
                                class="radio_title">No</span>
                            <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="risk_address_hasInsuredCancelInsuranceIfYesBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">If yes, please attach details </span> </label>
                <input type="text" id="risk_address_hasInsuredCancelInsuranceIfYes" name="risk_address_hasInsuredCancelInsuranceIfYes" class="form-control col-md-8" value="">
            </div>

            <!-- some form don't want below fields -->
            @if ($formVal != 'plumbing')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-4" style="float: left;"> Number of claims in the last 5 years? <span class="err">*</span> </label>
                            <select class="form-control col-md-8 required" id="risk_address_noOfClaims"
                                name="risk_address_noOfClaims">
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
                            <label class="col-md-4" style="float: left;"> Are you aware of any incidence that may result in a claim?</label>
                            <!--  <input class="checkbox_custom" type="checkbox"  id="risk_address_incidenceInClaim" name="risk_address_incidenceInClaim">  -->
                            <div class="radio_group">
                                <input type="radio" id="yes" name="risk_address_incidenceInClaim" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="risk_address_incidenceInClaim" value="No">
                                <span class="radio_title">No</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="incidenceOfClaimBox" style="display: none;">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> <span class="optionalBox">If yes, please advise details </span> </label>
                        <input type="text" id="risk_address_incidenceOfClaim_details" name="risk_address_incidenceOfClaim_details" class="form-control col-md-8" value="">
                    </div>
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> <span class="optionalBox">Type of claims
                            </span> <span class="err">*</span></label>
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
            @endif
        </div>
    </div>
</section>

<!-- below form required some fields specific to that one -->
@if ($formVal == 'plumbing')
    @include('buildingConstruction')

    <section class="surroundingExposure">
        <h5>Surrounding Exposure</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4" style="float: left;">North</label>
                    <input type="text" id="buildingConstruction_surroundingExposureNorth" name="buildingConstruction_surroundingExposureNorth" class="form-control col-md-8" value="">
                </div>

                <div class="form-group">
                    <label class="col-md-4" style="float: left;">South</label>
                    <input type="text" id="buildingConstruction_surroundingExposureSouth" name="buildingConstruction_surroundingExposureSouth" class="form-control col-md-8" value="">
                </div>

                <div class="form-group">
                    <label class="col-md-4" style="float: left;">East</label>
                    <input type="text" id="buildingConstruction_surroundingExposureEast" name="buildingConstruction_surroundingExposureEast" class="form-control col-md-8" value="">
                </div>

                <div class="form-group">
                    <label class="col-md-4" style="float: left;">West</label>
                    <input type="text" id="buildingConstruction_surroundingExposureWest" name="buildingConstruction_surroundingExposureWest" class="form-control col-md-8" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4" style="float: left;">Occupancy by Others</label>
                    <input type="text" id="buildingConstruction_OccupancyByOther" name="buildingConstruction_OccupancyByOther" class="form-control col-md-8" value="" placeholder="Leave empty if no Occupancy">
                </div>
            </div>
        </div>
    </section>

    @include('existingInsurance')
@endif
