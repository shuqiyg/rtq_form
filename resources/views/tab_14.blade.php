<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
 <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next" style="visibility:''"></i>
    </div>
</div>

<section class="opsIndustryGeneralTab">
    <h3>CGL</h3>
     
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Which CGL limits of liability are required?(Per Claim/Aggregate)  <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="cgl_cglLimitsOfLiablitiy" name="cgl_cglLimitsOfLiablitiy">
                    <option value="">-Select CGL Limits-</option>
                    <option value="1mm/1mm">$1mm/$1mm</option>
                    <option value="1mm/2mm">$1mm/$2mm</option>
                    <option value="2mm/2mm">$2mm/$2mm</option>
                </select>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> What deductible would you like? <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="cgl_deductible" name="cgl_deductible">
                    <option value="">-Select deductible-</option>
                    <option value="2500">$2500</option>
                    <option value="5000">$5000</option>
                </select>
            </div>
        </div>
    </div> --}}
</section>
