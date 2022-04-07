<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="claimHistoryTab">
    <h3>Loss History</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-10" style="float: left;"> Number of claims reported for application of insurance on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors in past 5 years? <span class="err">*</span> </label>
                <select class="form-control col-md-2 required" id="risk_address_noOfClaims" name="risk_address_noOfClaims">
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

    <!--
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-10" style="float: left;">  Have any claims been reported for application of insurance on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors in past 5 years?  <span class="err">*</span> </label>
                <select id="claimHistory_anyClaimsReportedOnUrBehalf" name="claimHistory_anyClaimsReportedOnUrBehalf" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group anyClaimReportedBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox"> Provide Full Details</span>  </label>
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyClaimsReportedFullDetails"
                    name="claimHistory_anyClaimsReportedFullDetails"></textarea>
            </div>
            <div class="form-group anyClaimReportedBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Steps to prevent reoccurence of claim </span> </label>
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyClaimsToPreventSteps"
                    name="claimHistory_anyClaimsToPreventSteps"></textarea>
            </div>
        </div>
    </div>
-->

    @if ($formVal == 'homeInspector')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-10" style="float: left;"> Has any policy on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors been declined or cancelled in the past 5 years? <span class="err">*</span> </label>
                    <!-- <select id="claimHistory_anyPolicyReportedOnUrBehalf" name="claimHistory_anyPolicyReportedOnUrBehalf" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select> -->
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="claimHistory_anyPolicyReportedOnUrBehalf" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="claimHistory_anyPolicyReportedOnUrBehalf" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group anyPolicyReportedBox" style="display: none;">
                    <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Steps to prevent reoccurence of claim </span> </label>
                    <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyPolicyToPreventSteps" name="claimHistory_anyPolicyToPreventSteps"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-10" style="float: left;"> Any unresolved act for errors and omissions or renewal refused or any claims, suits, demands for arbitration made or liabilities assumed? <span class="err">*</span> </label>
                    <!--   <select id="claimHistory_anyUnresolvedAct" name="claimHistory_anyUnresolvedAct" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select> -->
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="claimHistory_anyUnresolvedAct" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="claimHistory_anyUnresolvedAct" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group anyUnresolvedActBox" style="display: none;">
                    <label class="col-md-4" style="float: left;"><span class="optionalBox"> Provide Full Details </span></label>
                    <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyUnresolvedActFullDetails" name="claimHistory_anyUnresolvedActFullDetails"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-10" style="float: left;"> With regard to Questions above, it is understood and agreed that if any such claim, act, error, omission, dispute or circumstance exists, then such claim and/or any claim arising from such act, error, omission, dispute or circumstance is excluded from coverage that may be provided under this proposed insurance. Further, failure to disclose such claim, act, error, omission, dispute or circumstance may result in the proposed insurance being void, and/or subject to rescission. <span class="err">*</span>
                    </label>
                    <!--  <select id="claimHistory_ifSubjectToRescission" name="claimHistory_ifSubjectToRescission" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select> -->
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="claimHistory_ifSubjectToRescission" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="claimHistory_ifSubjectToRescission" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>

            </div>
        </div>
    @endif

    <!-- plumbing form has some different fileds to show -->
    @if ($formVal == 'plumbing')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-10" style="float: left;"> Are you aware of any incidence that may result in a Loss? <span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="risk_address_incidenceInClaim" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="risk_address_incidenceInClaim" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
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
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Type of Loss </span>
                </label>
                <select class="form-control col-md-8 " id="risk_address_incidenceOfClaim_type" name="risk_address_incidenceOfClaim_type">
                    <option value="">-Select claim type-</option>
                    <option value="Property">Property</option>
                    <option value="Liability">Liability</option>
                </select>
            </div>
        </div>

        <h5 style="clear: both;">Abuse and Employment Practices Disclosure</h5>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-10" style="float: left;"> I have no knowledge of any past or pending claims against my company with respect to abuse including allegations of sexual abuse, or, any other employment practices violations including wrongful dismissal and discrimination. <span class="err">*</span> </label>
                    <select id="claimHistory_abuseEmploymentDisclosure" name="claimHistory_abuseEmploymentDisclosure" class="form-control col-md-2 required">
                        <option value="">-Select value-</option>
                        <option value="Agree">Agree</option>
                        <option value="Disagree">Disagree</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" id="claimHistory_abuseEmploymentDisclosureBox" style="display: none;">
                    <label class="col-md-4" style="float: left;"><span class="optionalBox"> If disagree provide details: </span></label>
                    <textarea rows="5" class="form-control col-md-8" id="claimHistory_abuseEmploymentDisclosureDisAgreeDetails" name="claimHistory_abuseEmploymentDisclosureDisAgreeDetails"></textarea>
                </div>
            </div>
        </div>
    @endif

</section>
