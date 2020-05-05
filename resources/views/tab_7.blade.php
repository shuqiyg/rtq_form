<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="claimHistoryTab">
    <h3>Claim History</h3>
    
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
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyClaimsReportedFullDetails" name="claimHistory_anyClaimsReportedFullDetails" ></textarea>
            </div>
            <div class="form-group anyClaimReportedBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Steps to prevent reoccurence of claim </span> </label>
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyClaimsToPreventSteps" name="claimHistory_anyClaimsToPreventSteps" ></textarea>
            </div>
        </div>
    </div>
    -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-10" style="float: left;">  Has any policy on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors been declined or cancelled in the past 5 years? <span class="err">*</span> </label>
                <select id="claimHistory_anyPolicyReportedOnUrBehalf" name="claimHistory_anyPolicyReportedOnUrBehalf" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group anyPolicyReportedBox" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox"> Steps to prevent reoccurence of claim </span> </label>
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyPolicyToPreventSteps" name="claimHistory_anyPolicyToPreventSteps" ></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-10" style="float: left;">  Any unresolved act for errors and omissions or renewal refused or any claims, suits, demands for arbitration made or liabilities assumed?   <span class="err">*</span> </label>
                <select id="claimHistory_anyUnresolvedAct" name="claimHistory_anyUnresolvedAct" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group anyUnresolvedActBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox"> Provide Full Details  </span></label>
                <textarea rows="5" class="form-control col-md-8" id="claimHistory_anyUnresolvedActFullDetails" name="claimHistory_anyUnresolvedActFullDetails" ></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-10" style="float: left;">  With regard to Questions above, it is understood and agreed that if any such claim, act, error, omission, dispute or circumstance exists, then such claim and/or any claim arising from such act, error, omission, dispute or circumstance is excluded from coverage that may be provided under this proposed insurance. Further, failure to disclose such claim, act, error, omission, dispute or circumstance may result in the proposed insurance being void, and/or subject to rescission.   <span class="err">*</span> </label>
                <select id="claimHistory_ifSubjectToRescission" name="claimHistory_ifSubjectToRescission" class="form-control col-md-2 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes </option>
                    <option value="No">No</option>
                </select>
            </div>

        </div>
    </div>
</section>