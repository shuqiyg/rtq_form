<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="coverageRequired">
    <h3>Coverage Required</h3>
    @if($formVal == "motor_truck_cargo")
    <h5 class="header5">Property</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Vehicles</h5>   
        </div>
    </div>
    <input type="hidden" name="VehicleCount" id="VehicleCount" value="1">
    <!-- <input type="hidden" name="liability_typeOfOpsWorkPerformIAO" id="liability_typeOfOpsWorkPerformIAO"> -->
    <div class="row">
        <div class="col-md-12" style="padding: 0% 10%;">
        
            <div class="opsWorkPerformed" id ="vehicles_table">
                <div class="new_sections" id="" style="width: 100%;">
                    <div id="new_sections_xyz" style="display:none">
                        <hr>
                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Manufacturer / Model </label>
                        <input type="text" id="vehicleModel_xyz" name="vehicleModel_xyz" class="form-control col-md-7"  value="" >
                        
                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Serial No.</label>
                        <input type="text" id="vehicleSeral_xyz" name="vehicleSeral_xyz" class="form-control col-md-7"  value="" >

                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Year </label>
                        <input type="number" id="vehicleYear_xyz" name="vehicleYear_xyz" class="form-control col-md-7"  value="" >
                        
                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Tonnage</label>
                        <input type="text" id="vehicleTonnage_xyz" name="vehicleTonnage_xyz" class="form-control col-md-7 commaValues"  value="" >                   
                    </div>
                </div>

                <div id="liability_premisesHaveElevatorDetails" style="display: none;">
                
                </div>
                <div class="col-md-12" style="float: left;display: contents;">
                    <button class="btn btn-secondary" id="addItemBox">Add</button>
                    <button class="btn btn-secondary" id="removeItemBox">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Equipment</h5>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
              <caption>List of Power Units</caption>
              <thead>
                <tr>
                  <th scope="col">&nbsp</th>
                  <th scope="col">Owned</th>
                  <th scope="col">Non-Owned</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Tractors</th>
                  <td><input id="ownedTractors" min="0" type="number" name="ownedTractors"></td>
                  <td><input id="non_ownedTractors" min="0" type="number" name="non_ownedTractors"></td>
                </tr>
                <tr>
                  <th scope="row">Stright Trucks</th>
                  <td><input id="ownedStrightTrucks" min="0" type="number" name="ownedStrightTrucks"></td>
                  <td><input id="non_ownedStrightTrucks" min="0" type="number" name="non_ownedStrightTrucks"></td>
                </tr>
                <tr>
                  <th scope="row">Refer Trucks</th>
                  <td><input id="ownedReferTrucks" min="0" type="number" name="ownedReferTrucks"></td>
                  <td><input id="non_ownedReferTrucks" min="0" type="number" name="non_ownedReferTrucks"></td>
                </tr>
                <tr>
                  <th scope="row">Tank Trucks</th>
                  <td><input id="ownedTankTrucks" min="0" type="number" name="ownedTankTrucks"></td>
                  <td><input id="non_ownedTankTrucks" min="0" type="number" name="non_ownedTankTrucks"></td>
                </tr>
                <tr>
                  <th scope="row">Other Power Units</th>
                  <td><input id="ownedOtherPowerUnits" min="0" type="number" name="ownedOtherPowerUnits"></td>
                  <td><input id="non_ownedOtherPowerUnits" min="0" type="number" name="non_ownedOtherPowerUnits"></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-responsive">
              <caption>List of trailers Units</caption>
              <thead>
                <tr>
                  <th scope="col">&nbsp</th>
                  <th scope="col">Owned</th>
                  <th scope="col">Non-Owned</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Refer Trailers</th>
                  <td><input id="ownedReferTrailers" min="0" type="number" name="ownedReferTrailers"></td>
                  <td><input id="non_ownedReferTrailers" min="0" type="number" name="non_ownedReferTrailers"></td>
                </tr>
                <tr>
                  <th scope="row">Flat Bed Trailers</th>
                  <td><input id="" min="0" type="number" name=""></td>
                  <td><input id="" min="0" type="number" name=""></td>
                </tr>
                <tr>
                  <th scope="row">Tank Trailers</th>
                  <td><input min="0" id="ownedTankTrailers" type="number" name="ownedTankTrailers"></td>
                  <td><input min="0" id="non_ownedTankTrailers" type="number" name="non_ownedTankTrailers"></td>
                </tr>
                <tr>
                  <th scope="row">Other Trailers</th>
                  <td><input min="0" id="ownedOtherTrailers" type="number" name="ownedOtherTrailers"></td>
                  <td><input min="0" id="non_ownedOtherTrailers" type="number" name="non_ownedOtherTrailers"></td>
                </tr><tr>
                  <th scope="row">&nbsp</th>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Limits of Liability</h5>  
        </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Motor Truck Cargo: per Vehicle <span class="err">*</span> </label>
                    <input min="0" type="number" id="mtCargoPerVehicle" name="mtCargoPerVehicle" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Deductible <span class="err">*</span> </label>
                    <input min="0" type="number" id="mtCargoPerVehicleDeductible" name="mtCargoPerVehicleDeductible" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Commercial General Liability <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_mtComGenLiability" name="liability_mtComGenLiability" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Deductible <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_mtCargoPerVehicleDeductible" name="liability_mtCargoPerVehicleDeductible" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Non-Owned trailer CAT Limit  <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_nonOwnedTrailerCAT" name="liability_nonOwnedTrailerCAT" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Deductible <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_nonOwnedTrailerCATDeductible" name="liability_nonOwnedTrailerCATDeductible" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Non-Owned Trailer any one trailer  <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_nonOwnedAnyoneTrailer" name="liability_nonOwnedAnyoneTrailer" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Deductible <span class="err">*</span> </label>
                    <input min="0" type="number" id="liability_nonOwnedAnyoneTrailerDeductible" name="liability_nonOwnedAnyoneTrailerDeductible" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Commodity Carried</h5>
        </div>
    </div>
    <!-- get list of commodity -->
    <?php
              
                $Commodity = json_decode(file_get_contents(public_path().'/json/commodity.json'), true);
                // array_multisort( array_column($Commodity, "desc"), SORT_ASC, $Commodity);
            // dd($Commodity);
                foreach ($Commodity as $section) {
                    // dd($key);
                }
    ?>
<!-- NOT USED BUT IT WORKS SEARCH SELECT **popping in a modal of selection for Commodity instead-->
    <div class="row" style="display: none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Commodity <span class="err">*</span> </label>
                <select id="commoditySelect" name="commoditySelect" class="form-control col-md-7 required combobox selectpicker custom-select" data-live-search="true">
                    <option id="defaultSelect" value="">-Select Commodity/Product-</option>
                    @foreach($Commodity as $key=>$val)
                    <!--  -->
                        <optgroup label="{{$key}}" >
                            <!-- <i class="fa fa-exclamation-triangle fa-lg" data-toggle="tooltip" title="{{$key}}"></i> -->
                            @foreach($val as $item)
                            <option id ="{{$item['id']}}" value="{{$item['name']}}">{{$item['name']}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach

                    <!-- generate option from php grab json file from json folder -->
                </select>
            </div>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-md-12">
         <table class="table">
                  <caption>List of Commodity</caption>
                  <thead>
                    <tr>
                      <th scope="col">Commodity</th>
                      <th scope="col">%</th>
                      <th scope="col">Avg. $ Value per Load</th>
                      <th scope="col">Max $ Value per Load</th>
                      <th scope="col">Remove</th>
                    </tr>
                  </thead>
                  <tbody id='commodityTable'>
                  </tbody>
            </table>   
        </div>
    </div>
<!-- END OF NOT USE BUT IT WORKS SEARCH SELECT -->
    <div class="row">
        <div class="col-md-12">
         <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Commodity</th>
                      <th scope="col">%</th>
                      <th scope="col">Avg. $ Value per Load</th>
                      <th scope="col">Max $ Value per Load</th>
                      <th scope="col"><span style="padding:0;" type="button" style="
                        color: #000;
                        background-color: #fbfbfb;
                        border-color: #111;" data-toggle="modal" data-target="#commodityModal" class="btn commodityEdit"><i class="fa fa-edit fa-lg" data-toggle="tooltip" title="Edit"></i>Edit</span></th>
                    </tr>
                  </thead>
                  <tbody id='commodityTableList'>
                    <!-- <tr id='alcohol-lala'>
                      <th scope="row">Alcohol</th>
                      <td><input min="0" id="" type="number" name=""></td>
                      <td><input min="0" id="" type="number" name=""></td>
                      <td><input min="0" id="" type="number" name=""></td>
                      <td><button type="button" class="btn btn-danger commodityRemove"><i class="fa fa-trash fa-lg" data-toggle="tooltip" title="Remove"></i></button></td>
                    </tr> -->
                  </tbody>
            </table>   
        </div>
    </div>
    <!-- test modal -->
    <!-- test modal -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="commodityModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">List of Commodity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form></form>
            <div class="modal-body">
                    <div class="row" id="">
                    @foreach($Commodity as $key=>$val)
                    <form class="commodityList" id="{{$key}}" method="">
                        <div class="col-lg">
                        @if($key=="target")
                        <h5>Target</h5>
                        @elseif($key=="nonTarget")
                        <h5>Non-Target</h5>
                        @else
                        <h5>Others</h5>
                        @endif
                        <hr>
                        @foreach($val as $item)
                            <div style="white-space: nowrap;">
                                <input class="" type="checkbox" id="{{$item['id']}}" name="{{$item['id']}}">
                                <label style="white-space: nowrap;" for="{{$item['id']}}">{{$item['name']}} </label>
                            </div>
                        @endforeach
                        </div>
                    </form>
                    @endforeach
                    </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="commoditySubmit">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <b><p style="color:#0000FF">*** Please email a copy of the Applicant's Bill of Lading or Standard contract to us once you get the application copy ***</p></b> 
        </div>
    </div>
    <h5>Annual gross Receipts</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <hr>
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Past 12 Months <span class="err">*</span> </label>
                    <input min="0" type="number" id="grossReceiptsPast12Mnths" name="grossReceiptsPast12Mnths" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Next 12 Months (Estimated) <span class="err">*</span> </label>
                    <input min="0" type="number" id="grossReceiptsNext12Mnths" name="grossReceiptsNext12Mnths" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5>U.S. Exposure</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <label class="col-md-4" style="float: left;"> Past <span class="err">*</span> </label>
                    <input min="0" type="number" id="usExposurePast" name="usExposurePast" class="form-control col-md-8 required" >
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Present <span class="err">*</span> </label>
                    <input min="0" type="number" id="usExposurePresent" name="usExposurePresent" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
                <div class="input-group md-2">
                    <label class="col-md-4" style="float: left;"> Future <span class="err">*</span> </label>
                    <input min="0" type="number" id="usExposureFuture" name="usExposureFuture" class="form-control col-md-8 required">
                    <div class="input-group-append">
                        <div class="input-group-text">$</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5>Theft Exposure</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Are Vehicles Left Unlocked or Unattended?<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="vehiclesUnlocked" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="vehiclesUnlocked" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group secuirtyMessures" style="display: none;">
                    <label class="col-md-4" style="float: left;">What other secuirty messures were taken place?</label>
                    <textarea type="text" id="secuirtyMessures" name="secuirtyMessures" class="form-control col-md-8"  value=""></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6" style="float: left;white-space: nowrap;">Does Applicant ever leave Loaded Trailers Detached from Power Units?<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="trailerDetached" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="trailerDetached" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group detachTralierReason" style="display: none;">
                    <label class="col-md-4" style="float: left;">Please describe</label>
                    <textarea type="text" id="detachTralierReason" name="detachTralierReason" class="form-control col-md-8"  value=""></textarea>
                </div>
            </div>
<!--             <div class="form-group">
                <label class="col-md-4" style="float: left;">Does Applicant ever leave Loaded Trailers Detached from Power Units?<span class="err">*</span></label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="trailerDetached" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="trailerDetached" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group detachTralierReason" style="display: none;">
                    <label class="col-md-4" style="float: left;">Please describe</label>
                    <textarea type="text" id="detachTralierReason" name="detachTralierReason" class="form-control col-md-8"  value=""></textarea>
                </div>
            </div> -->
        </div>
    </div>
    <h5>Driver Information</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Total Numbers of Drivers</label>
                    <input type="number" id="totalDriversNums" name="totalDriversNums" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of Drivers Under 25 Years old</label>
                    <input type="number" id="under25DriversNums" name="under25DriversNums" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of Drivers over 60 years old</label>
                    <input type="number" id="over60DriversNums" name="over60DriversNums" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of Full Time Employee Drivers</label>
                    <input type="number" id="fullTimeDriversNums" name="fullTimeDriversNums" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of Drivers on Long Term Lease</label>
                    <input type="number" id="longTermLeaseDriversNums" name="longTermLeaseDriversNums" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of two Person Driver Teams</label>
                    <input type="number" id="twoPeopleDriversTeams" name="twoPeopleDriversTeams" class="form-control col-md-8">
                </div>
                <div class="form-group driversDetails" style="">
                    <label class="col-md-4" style="float: left;">Number of Drivers or Persons assigned to Each Vehicle?</label>
                    <input type="number" id="driversAssignedToEachVehicle" name="driversAssignedToEachVehicle" class="form-control col-md-8">
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-4" style="float: left;">Are all Drivers & Helpers Regular Employees?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="allRegularEmployees" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="allRegularEmployees" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-4" style="float: left;">Is Driver Required to be Present While Loading?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="presentWhileLoading" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="presentWhileLoading" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-4" style="float: left;">Is There a Vehicle Maintenance Program in Effect?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="vehicleMaintenanceProgram" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="vehicleMaintenanceProgram" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-6" style="float: left; white-space: nowrap;">Is Merchandise Ever Transported to Another Motor Truck Carrier?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="merchandiseTransport" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="merchandiseTransport" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-4" style="float: left;">Are Vehicles Equipped with alarms?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="vehicleAlarms" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="vehicleAlarms" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
                <div class="form-group driverDetailsMVR">
                    <label class="col-md-4" style="float: left;">Does Applicant Obtain MVR on all Drivers?<span class="err">*</span> </label>
                    <div class="row">
                        <div class="radio_group required">
                            <input type="radio" id="yes" name="mvr" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="mvr" value="No"><span class="radio_title">No</span>
                              <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div>
                        <div class="col-md-12 form-group MVR" style="display: none;">
                            <p style="float: left;"><b>***Please Provide Copies of all MVRs***</b></p>
                        </div>
                    </div>
                </div>
                <div class="form-group driverDetails">
                    
                </div>
                <div class="form-group driverDetails">
                    <label class="col-md-6" style="float: left; white-space: nowrap;">Are any Vehicles Assigned to a Particular Shipper,Carrying Shippers Products Only?<span class="err">*</span> </label>
                    <div class="radio_group required">
                        <input type="radio" id="yes" name="assignedParticularShipper" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="assignedParticularShipper" value="No"><span class="radio_title">No</span>
                          <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                    <div class="form-group particularShipperList" style="display:none">
                        <div class="row">
                            <div class="col-md-12" style="padding: 0% 10%;">
                                <div class="assignedParticularShipperList" id ="shipper_table">
                                    <div class="new_shipper" id="" style="width: 100%;">
                                        <input type="hidden" id="particulaShipperCount" value=1>
                                        <div id="new_shipper_xyz" style="display:none">
                                            <hr>
                                            <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                                            <label class="col-md-4" style="float: left;">Name </label>
                                            <input type="text" id="particularShipperName_xyz" name="particularShipperName_xyz" class="form-control col-md-7"  value="" >
                                            
                                            <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                                            <label class="col-md-4" style="float: left;">Product</label>
                                            <input type="text" id="particularShipperProduct_xyz" name="particularShipperProduct_xyz" class="form-control col-md-7"  value="" >                   
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="float: left;display: contents;">
                                        <button class="btn btn-secondary" id="addParticulaShipperBox">Add</button>
                                        <button class="btn btn-secondary" id="removeParticulaShipperBox">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5>Terminals</h5>
    <hr>
    <div class="row">
        <div class="col-md-12" style="padding: 0% 10%;">
            <div class="terminalList" id ="terminal_table">
                <div class="new_terminal" id="" style="width: 100%;">
                    <input type="hidden" id="terminalCount" value=1>
                    <div id="new_terminal_xyz" style="display:none">
                        <hr>
                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Location </label>
                        <input type="text" id="terminalLocation_xyz" name="terminalLocation_xyz" class="form-control col-md-7"  value="" >
                        
                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Maximum Values</label>
                        <input type="text" id="ternimalMaxVal_xyz" name="ternimalMaxVal_xyz" class="form-control col-md-7"  value="">

                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Construction</label>
                        <input type="text" id="terminalConstruction_xyz" name="terminalConstruction_xyz" class="form-control col-md-7"  value="">

                        <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                        <label class="col-md-4" style="float: left;">Terminal Security/Fire Protection</label>
                        <textarea type="text" id="terminalSecurity_xyz" name="terminalSecurity_xyz" class="form-control col-md-7"  value=""></textarea>                   
                    </div>
                </div>
                <div class="col-md-12" style="float: left;display: contents;">
                    <button class="btn btn-secondary" id="addTerminalBox">Add</button>
                    <button class="btn btn-secondary" id="removeTerminalBox">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <h5> Reefer Mechanical breakdown(Complete this section if cover extension is required)</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">Maintenance Scheduel:</label>
                <textarea type="text" id="reeferMaintenanceScheduel" name="reeferMaintenanceScheduel" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">What are indicator lights of reefer failure located? Are they clearly visiable to driver?</label>
                <textarea type="text" id="visibilityReeferLights" name="visibilityReeferLights" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">What is the established procedure for drivers to check this gauge and log the reading and how often?(hours)</label>
                <textarea type="text" id="reeferCheckProcedure" name="reeferCheckProcedure" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">In the event of a reefer problem, what procedures has the Insured outline for drivers to follow?</label>
                <textarea type="text" id="proceduresToFollow" name="proceduresToFollow" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">What insured and uninsured losses has the Insured had with respect to this particular coverage?(5 years history)</label>
                <textarea type="text" id="insuredUninsuredLosses" name="insuredUninsuredLosses" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">Is a Ryan's Chart maintained on all shipments?</label>
                <textarea type="text" id="ryanChartMaintained" name="ryanChartMaintained" class="form-control col-md-8"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ReeferDetails" style="">
                <label class="col-md-4" style="float: left;">How long has the insured been using reefer units?</label>
                <textarea type="text" id="howLongUseReeferUnits" name="howLongUseReeferUnits" class="form-control col-md-8"></textarea>
            </div>
        </div>
    </div>
    <h5>Optional Endorsments Schedule</h5>
    <hr>
    <div class="row">
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Refrigeration Breakdown Endorsement<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="fridgeBreakdownEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="fridgeBreakdownEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group fridgeBreakdownDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="fridgeEndorsementDeductible" name="fridgeEndorsementDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group fridgeBreakdownDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="fridgeEndorsementLimit" name="fridgeEndorsementLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Riggers Endorsement<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="riggersEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="riggersEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group riggersEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="riggersEndorsementDeductible" name="riggersEndorsementDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group riggersEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="riggersEndorsementLimit" name="riggersEndorsementLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Contingent Transit Endorsement (Truck Brokering)<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="contingentTransitEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="contingentTransitEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group contingentTransitEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="contingentTransitDeductible" name="contingentTransitDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group contingentTransitEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="contingentTransitLimit" name="contingentTransitLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Unattended Truck Endorsement<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="unattendedTruckEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="unattendedTruckEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group unattendedTruckEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="unattendedTruckDeductible" name="unattendedTruckDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group unattendedTruckEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="unattendedTruckLimit" name="unattendedTruckLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Earned Freight Endorsment<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="earnedFreightEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="earnedFreightEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group earnedFreightEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="earnedFreightDeductible" name="earnedFreightDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group earnedFreightEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="earnedFreightLimit" name="earnedFreightLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Debris Removal Endorsment<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="debrisRemovalEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="debrisRemovalEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group debrisRemovalEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="debrisRemovalDeductible" name="debrisRemovalDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group debrisRemovalEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="debrisRemovalLimit" name="debrisRemovalLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">L.T.L Endorsement (72 Hour Off Truck Cover)<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="lTLEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="lTLEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group lTLEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="lTLDeductible" name="lTLDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group lTLEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="lTLLimit" name="lTLLimit" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group lTLEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Trailer Limit</label>
                    <input type="number" id="perLTLLimit" name="perLTLLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">In Full Premium Endorsement (Specified Vehicles)<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="fullPremiumEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="fullPremiumEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group fullPremiumEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="fullPremiumDeductible" name="debrisRemovalDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group fullPremiumEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="fullPremiumLimit" name="debrisRemovalLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div> 
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4" style="float: left;">Trailer Intercharge Endorsement<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="trailerInterchargeEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="trailerInterchargeEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group trailerInterchargeEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="trailerInterchargeDeductible" name="trailerInterchargeDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group trailerInterchargeEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="trailerInterchargeLimit" name="trailerInterchargeLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-6" style="float: left; white-space: nowrap;">Improper Setting of Temperature Endorsement and Warranty Clasue<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="temperatureEndorsement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="temperatureEndorsement" value="No"><span class="radio_title">No</span>
                      <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
                <div class="form-group temperatureEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Deductible</label>
                    <input type="number" id="temperatureDeductible" name="temperatureDeductible" class="form-control col-md-8" min=0>
                </div>
                <div class="form-group temperatureEndorsementDetail" style="display: none;">
                    <label class="col-md-4" style="float: left;">Limit</label>
                    <input type="number" id="temperatureLimit" name="temperatureLimit" class="form-control col-md-8" min=0>
                </div>
            </div>
       </div>
    </div>

    @endif
    @if($formVal == "rentedDwelling" || $formVal == "ownerOccupied")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Building Limit </label>
                <input type="text" id="coverage_buildingLimit" name="coverage_buildingLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contents Limit  </label>
                <input type="text" id="coverage_contentsLimit" name="coverage_contentsLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Rental Income Limit  </label>
                <input type="text" id="coverage_rentalIncomeLimit" name="coverage_rentalIncomeLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Garage Limit </label>
                <input type="text" id="coverage_garageLimit" name="coverage_garageLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Shed Limit </label>
                <input type="text" id="coverage_shedLimit" name="coverage_shedLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group" >
                <label class="col-md-4" style="float: left;"> Liability Limit <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="coverage_liabilityLimit" name="coverage_liabilityLimit">
                    <option value="">-Select liability limit-</option>
                    <option value="1mm">$1mm</option>
                    <option value="2mm">$2mm</option>
                    <option value="none">None</option>
                </select>
            </div>
        </div>
    </div>
    @endif
    @if($formVal == "plumbing")
    <!-- Hidden fields for backend -->
    <input type="hidden" name="tivLimit" id="tivLimit">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Perils </label>
                <input type="text" class="form-control col-md-8 " id="coverage_perils" name="coverage_perils" value="All Risk" disabled>
                <!-- <select class="form-control col-md-8 required" id="coverage_perils" name="coverage_perils">
                    <option value="">-Select Perils-</option>
                    <option value="All Risk">All Risk</option>
                    <option value="Named Perils">Named Perils</option>
                </select> -->
            </div>
        </div>
    </div>
    <h5 class="header5">Property</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Building </label>
                <input type="text" id="coverage_buildingLimit" name="coverage_buildingLimit" class="form-control col-md-8 commaValues getTIV amfPropertyExtention " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contents </label>
                <input type="text" id="coverage_contentsLimit" name="coverage_contentsLimit" class="form-control col-md-8 commaValues getTIV amfPropertyExtention " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Stock  </label>
                <input type="text" id="coverage_contentsLimitStock" name="coverage_contentsLimitStock" class="form-control col-md-8 getTIV amfPropertyExtention commaValues" placeholder="Enter Limit " value="">
            </div>   
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Equipment  </label>
                <input type="text" id="coverage_contentsLimitEquipment" name="coverage_contentsLimitEquipment" class="form-control getTIV amfPropertyExtention col-md-8 commaValues" placeholder="Enter Limit " value="">
            </div>     
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">   
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Tenants' improvements  </label>
                <input type="text" id="coverage_contentsLimitImprovements" name="coverage_contentsLimitImprovements" class="form-control col-md-8 getTIV amfPropertyExtention commaValues" placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>
    
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Consequential Loss <span class="err">*</span></label>
                <input type="text" id="coverage_consequentialLoss" name="coverage_consequentialLoss" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><input type="radio" id="profit_toggle" name="profit_grossEarning_toggle" value="profit_toggle"> Profits [100% co.]</label>
                <input type="text" id="coverage_profits" name="coverage_profits" class="form-control col-md-8 commaValues getTIV amfPropertyExtention " placeholder="Enter Limit " value="" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> <input type="radio" id="grossEarning_toggle" name="profit_grossEarning_toggle" value="grossEarning_toggle"> Gross Earnings </label>
                <input type="text" id="coverage_grossEarnings" name="coverage_grossEarnings" class="form-control col-md-8 commaValues getTIV amfPropertyExtention " placeholder="Enter Limit " value="" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"  id="ifcoverageGrossEarningsLimitBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Co-ins </span> <span class="err">*</span> </label>
                <select id="coverage_grossEarningsPer" name="coverage_grossEarningsPer" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="80% Co.">80% Co.</option>
                    <option value="50% Co.">50% Co.</option>
                    <option value="No Co.">No Co.</option>
                </select>
            </div> 
            <!-- <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">80% Co. </span> </label>
                <select id="coverage_grossEarnings80Per" name="coverage_grossEarnings80Per" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>    
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">50% Co. </span> </label>
                <select id="coverage_grossEarnings50Per" name="coverage_grossEarnings50Per" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div> 
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">No Co. </span> </label>
                <select id="coverage_grossEarningsNoPer" name="coverage_grossEarningsNoPer" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>  -->
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Extra Expenses  </label>
                <input type="text" id="coverage_extraExpenses" name="coverage_extraExpenses" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Rents </label>
                <input type="text" id="coverage_rentalIncomeLimit" name="coverage_rentalIncomeLimit" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit " value="">
            </div>            
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sign Floater </label>
                <input type="text" id="coverage_signFloater" name="coverage_signFloater" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Office Equipment Floater </label>
                <input type="text" id="coverage_officeEquipmentsFloater" name="coverage_officeEquipmentsFloater" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;" > Tool Floater (Max $1,000 per any one item or set of items)</label>
                <input type="text" id="coverage_toolFloater" name="coverage_toolFloater" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit " value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- <label class="col-md-4 subFormLabel" style="float: left;" id="openCEF" data-toggle="tooltip" title="Open CEF sub form"> Contractors Equipment Floater <i class="fa fa-level-down"></i></label> -->
                <label class="col-md-4 subFormLabel" style="float: left;" id="openCEF" data-toggle="tooltip" title="Open CEF Form"> Contractors Equipment Floater <i>(Open CEF App)</i></label>
                <input type="text" style="float: left;" id="coverage_CEF" name="coverage_CEF" class="form-control col-md-8 getTIV amfPropertyExtention commaValues " placeholder="Enter Limit if required" value="">
                <p class="col-md-12" style="width:100%;float: left;display: none;" id="processSF"></p>
                <p class="col-md-12" style="width:100%;color: red;float: left;display: none;" id="subformCEF_MSG">Please complete the CEF form</p>
            </div>
        </div>
    </div>
    <div class="row subformCEF" id="accordion" style="display: none;">
        @include('subform/CEF')
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Boiler & Other Machinery </label>
               <!--  <select id="coverage_boiler" name="coverage_boiler" class="form-control col-md-8 " style="margin-top: 5px;">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                <!--  <input class="checkbox_custom" type="checkbox"  id="coverage_boiler" name="coverage_boiler"> -->
                <div class="radio_group">
                <input type="radio" id="yes" name="coverage_boiler" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="coverage_boiler" value="No" required><span class="radio_title">No</span>
                </div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> AMF Property Extensions </label>
                <input type="text" id="coverage_amfPropertyExt" name="coverage_amfPropertyExt" class="form-control col-md-8 commaValues " value="Not Available"  disabled>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Other </label>
                <input type="text" id="coverage_otherProperty" name="coverage_otherProperty" class="form-control col-md-8 commaValues "  value="">
            </div>
        </div>
    </div> -->

    @if($formVal == "plumbing")
<section>
    <h3  class="includeExclude">Include or Exclude</h3>
    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Flood </label>
               <!--  <select id="coverage_includeExclude_flood" name="coverage_includeExclude_flood" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                <div class="radio_group">
                <input type="radio" id="yes" name="coverage_includeExclude_flood" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="coverage_includeExclude_flood" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Earthquake </label>
               <!--  <select id="coverage_includeExclude_earthquake" name="coverage_includeExclude_earthquake" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                <div class="radio_group">
                <input type="radio" id="yes" name="coverage_includeExclude_earthquake" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="coverage_includeExclude_earthquake" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sewer Backup</label>
              <!--   <select id="coverage_includeExclude_sewerBackup" name="coverage_includeExclude_sewerBackup" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                 <div class="radio_group">
                <input type="radio" id="yes" name="coverage_includeExclude_sewerBackup" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="coverage_includeExclude_sewerBackup" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endif

@if($formVal == "plumbing")
<section>
    <h3>Crime</h3>
     <div class="row">
        <div class="col-md-12">
          <div class="form-group" >
                <label class="col-md-4" style="float: left;"> Crime Type </label>
                <select class="form-control col-md-8" id="crime_type" name="crime_type">
                    <option value="">-Select Type-</option>
                    <option value="Broad Form Money & Securities">Broad Form Money & Securities / Employee Dishonesty - Form A</option>
                    <option value="Inside Robbery">Inside Robbery / Outside Robbery</option>
                    <option value="Comprehensive 3D rider">Comprehensive 3D rider</option>
                </select>
            </div>
      </div>
    </div>
    <div class="row" id="broad_form_money" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Broad Form Money & Securities </label>
                <input type="text" id="coverage_crime_broadFormMoney" name="coverage_crime_broadFormMoney" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>


    <div class="row" id="inside_robbery" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Inside Robbery </label>
                <input type="text" id="coverage_crime_insideRobbery" name="coverage_crime_insideRobbery" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>

    <div class="row" id="outside_robbery" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Outside Robbery </label>
                <input type="text" id="coverage_crime_outsideRobbery" name="coverage_crime_outsideRobbery" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>

    <div class="row" id="employee_dishonesty" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Employee Dishonesty - Form A</label>
                <input type="text" id="coverage_crime_employeeDishonesty" name="coverage_crime_employeeDishonesty" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>
    
    <div class="row" id="comprehensive_rider" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Comprehensive 3D rider </label>
                <input type="text" id="coverage_crime_3dRider" name="coverage_crime_3dRider" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>
    
</section>
@endif

    <br/>
    <h5 class="header5">Liability</h5>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" >
                <label class="col-md-4" style="float: left;"> CGL Liability Limit  </label>
                <select class="form-control col-md-8 " id="coverage_liabilityLimit" name="coverage_liabilityLimit">
                    <option value="">-Select liability limit-</option>
                    <option value="none">None</option>
                    <option value="1mm">$1mm</option>
                    <option value="2mm">$2mm</option>
                    <option value="3mmOrMore">$3mm or More</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Broad Form Vendors <span class="err">*</span></label>
                <input type="text" id="coverage_broadFormVendors" name="coverage_broadFormVendors" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div> -->
   
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> SEF #94 - Private Passenger & Light Commercial under 2,800Kg. </label>
                <input type="text" id="coverage_SEF94" name="coverage_SEF94" class="form-control col-md-8 commaValues " placeholder="Enter Limit " value="50,000">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> SEF #96 - Contractual Liability Endorsement</label>
                <input type="text" id="coverage_SEF96" name="coverage_SEF96" class="form-control col-md-8 commaValues" value="" disabled>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Forest Fire Fighting Expense <span class="err">*</span></label>
                <input type="text" id="coverage_forestFireFightingExpense" name="coverage_forestFireFightingExpense" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Faulty Workmanship </label>
                <input type="text" id="coverage_faultyWorkmanship" name="coverage_faultyWorkmanship" class="form-control col-md-8 commaValues " placeholder="Enter Limit " value="25,000">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Tenant's Legal Liability</label>
                <input type="text" id="coverage_TLL" name="coverage_TLL" class="form-control col-md-8 commaValues " placeholder="Enter Limit " value="250,000">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Other </label>
                <input type="text" id="coverage_otherLiability" name="coverage_otherLiability" class="form-control col-md-8 commaValues"  value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="coverage_otherLiabilityBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Describe </span> </label>
                <input type="text" id="coverage_otherLiabilityDescribe" name="coverage_otherLiabilityDescribe" class="form-control col-md-8 "  value="">
            </div>
        </div>
    </div>


    @endif

</section>

