<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="legalTerms">
	<h3 class="legalHeader"> Purpose of this Form </h3>
	<!-- Home Inspector OLD VERSION LEGAL --
	<p>This is an application for insurance and the insurer is not obligated to accept the applicant for coverage. If a policy is issued, one signed copy of the application will be attached to the policy or certificate. Signature on the application form and submission of a premium payment does not bind the insurer to complete an insurance transaction with the applicant. Coverage is bound upon receipt from A.M. Fredericks Underwriting Management Ltd. Confirming Policy #, coverage and Effective Date. If a policy is issued, it provides Errors and Omissions insurance that applies on a claims-made basis. The following provides a general description of this coverage and is subject to the terms and provisions of the actual policy. </p>
	<ul>
		<li>The policy will not cover any losses from incidents which take place before the Retroactive Date, if any, or after the expiration of the policy period (subject to the Extended Reporting Period provision).</li>
		<li>The policy will provide coverage for losses from incidents which take place on or after the Retroactive Date, if any, but before the beginning of the policy period only if the insured did not know of the incident before the beginning of the policy period.</li>
		<li>The policy will not cover any loss for which a claim is first made after: 
			<ul>
				<li>The expiration of the policy period or its earlier termination date, if any; or</li>
				<li>The Extended Reporting Period if any and then only in accordance with the terms described in the policy.</li>		
			</ul>
		</li>
		<li>The policy will only cover claims which are first made:
			<ul>
				<li>During the policy period; or</li>
				<li>During an Extended Reporting Period if any and then only in accordance with the terms and conditions described in the Extended Reporting Period Section of the policy.</li>		
			</ul>
		</li>
		<li>Please request a copy of the Policy and review the terms and conditions to obtain more information.</li>
		<li>The limits for Defense Cost may vary by insurer. Refer to your policy for complete details of coverage.</li>
	</ul>
	<p>Please answer ALL the questions. This information is required to make an underwriting and pricing evaluation. Your answers hereunder are considered legally material to such evaluation. If a question is not applicable, state "not applicable", not "N/A."  The application and any supplement(s) must be signed and dated by a principal, partner, or officer of the prospective insured's organization. </p>
	<div>
		<p id="agreeDisagreeError" style="color: red"> </p>
		<input type="radio" name="hiAgreeDisAgree" id="hiAgreeDisAgree" value="agree" class="infoToggle">
		<label>Agree</label> &nbsp;&nbsp;
		<input type="radio" name="hiAgreeDisAgree" id="hiAgreeDisAgree" value="disagree"  class="infoToggle">
		<label>Disagree</label>
	</div>
	<div>
		<p><span style="color: #d67f04;"><b>Attach: 1 </b></span> The firms Statement of Qualifications inclding resumes of all key (technical) personnel along with any avaliable marketing material or company brochures</p>
		<input name="qualificationUpload" id="qualificationUpload" type="file">
	</div>
	<div style="margin-top: 10px">
		<p><span style="color: #d67f04;"><b>Attach: 2 </b></span> A copy of the outline from the firm’s Quality Assurance / Quality Control (QA/QC) manual</p>
		<input name="qaqcUpload" id="qaqcUpload" type="file">
	</div>
	 -->
	<p>This application can provide an actual quote that can be bound by the Broker’s Representative. Certain conditions must be met: </p>
	<ul>
		<li> The broker must be approved by AM Fredericks Underwriting Management Ltd (AMFUM). This means that:
			<ul>
				<li>The broker has completed a Broker Application and been approved</li>
				<li>The broker has received an AMFUM Broker Number</li>
			</ul>
		</li>
		<!-- <li>This is for Named Perils Property and Liability (CGL) Rented Dwelling Coverage.</li> -->
		<li>The system may determine that some feature(s) of the risk require Underwriter intervention in order to produce a quote. In that case:
			<ul>
				<li>No price will be provided. Therefore,</li>
				<li>No binding option will be available (Submit only)</li>
			</ul>
		</li>
	</ul>
	<br/>
	<h3 class="legalHeader">Limitations on Binding (if applicable)</h3>
	<p>Although Binding is initiated by the Broker through this form, it is not considered Bound until the representative receives a confirmation email directly from AMFUM. This confirmation will contain:</p>
	<ul>
		<li>A copy of the information submitted in the form of an application.</li>
		<li>Notification that we consider this bound.</li>
		@if($formVal == "homeInspector")
		<li>If this submission includes Errors & Omissions Coverage:
			<ul>
				<li>Errors and Omissions insurance that applies on a claims-made basis. The following provides a general description of this coverage and is subject to the terms and provisions of the actual policy.</li>	
			</ul>
		 </li>
		@endif
	</ul>
	<p>Please note that completion of the on-line application does not eliminate the requirement for a signed application. Once the application is received, it is to be signed by your client and sent to us within five (5) days after coverage is bound.</p>
	<p>As is the case with quotes based on the traditional printed applications, our electronic quotation is made with reliance on the information contained in the electronic application. Any subsequently discovered errors or changes in exposures must be brought to our attention a.s.a.p.</p>
	<br>
	<h3 class="legalHeader">Language</h3>
	<p>The Language flag in the application applies to the final Policy Documents. Not to the interface language.</p>
	<br>
	<h3 class="legalHeader">Privacy Policy</h3>
	<p>A copy of our company privacy policy is located here: <a href="https://www.amfredericks.com/privacy-policy" target="_blank">https://www.amfredericks.com/privacy-policy</a></p>
	<p>Additionally, as it pertains to this application, no information is stored online and is transmitted securely to our internal system. AMFUM has no control over the Broker’s systems and assume all standard security protocols are followed by the Broker.</p>
	<br>
	<h3 class="legalHeader">Acknowledgements</h3>
	<p class="acknowledgeError" style="display: none;color: red;"></p>
	<div class="row">
		<div class="col-md-12">
			<input type="checkbox" class="form-control col-md-1" id="cb1" style="float: left;"><span class="col-md-11">I acknowledge that I am a representative of the Brokerage used for this application</span> 
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<input type="checkbox" class="form-control col-md-1" id="cb2" style="float: left;"><span class="col-md-11">I acknowledge that I am licensed in the province where the Risk is located</span>
		</div>
	</div>
	<div class="row"> 
		<div class="col-md-12">
			<input type="checkbox" class="form-control col-md-1" id="cb3" style="float: left;"><span class="col-md-11">I acknowledge that I have read and understood the information contained on this page</span> 
		</div>
	</div>
	
</section>