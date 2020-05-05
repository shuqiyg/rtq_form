<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>


<section class="occupancyTab">
    <h3>Occupancy</h3>
    <div class="row">
        <div class="col-md-12">
            @if($formVal == "rentedDwelling")
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Rented Dwelling (number of self-contained units)<span class="err">*</span> </label>
                        <select id="occupancy_rentedDwellingUnits" name="occupancy_rentedDwellingUnits" class="form-control col-md-8 required">
                            <option value="">-Select rented dwelling units-</option>
                            <option value="Single Family">Single Family</option>
                            <option value="2-3 units">2-3 Units</option>
                            <option value="4-6 units">4-6 Units</option>
                            <option value="6+ units">6+ Units</option>
                        </select>
                    </div>
                </div>
            </div>
            @endif
            @if($formVal == "ownerOccupied")
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Number of Families <span class="err">*</span> </label>
                        <select id="occupancy_numberOfFamilies" name="occupancy_numberOfFamilies" class="form-control col-md-8 required">
                            <option value="">-Select number of families-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="More">More</option>
                        </select>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Are there any commercial operations on the premises ?<span class="err">*</span> </label>
                        <select id="occupancy_commercialOperations" name="occupancy_commercialOperations" class="form-control col-md-8 required">
                            <option value="">-Select value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="occupancy_commercialOperationsDescribeBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Please Describe </span> </label>
                <input type="text" id="occupancy_commercialOperationsDescribe" name="occupancy_commercialOperationsDescribe" class="form-control col-md-8"  value="">
            </div>
            @if($formVal == "ownerOccupied")
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Are there any Rental Suites? <span class="err">*</span> </label>
                        <select id="occupancy_anyRentalSuites" name="occupancy_anyRentalSuites" class="form-control col-md-8 required">
                            <option value="">-Select value-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" id="occupancy_anyRentalSuitesBox" style="display: none;">
                        <label class="col-md-4" style="float: left;"><span class="optionalBox">Please Describe </span> </label>
                        <input type="text" id="occupancy_anyRentalSuitesDescribe" name="occupancy_anyRentalSuitesDescribe" class="form-control col-md-8"  value="">
                    </div>
                </div>
            </div>
            @endif
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Are short term rentals allowed (e.g. AirBNB) <span class="err">*</span> </label>
                <select id="occupancy_shortTermRentals" name="occupancy_shortTermRentals" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            
        </div>
    </div>
</section>

<!-- Building Construction -->
@include('buildingConstruction')

<!-- Fire Alarm / Detectors -->
@include('fireAlarmBurglary')

<section class="liability">
    <h3>Liability</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Does the premises have a pool? <span class="err">*</span></label>
                <select id="liability_doesPremisesHavePool" name="liability_doesPremisesHavePool" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifPremiseHasPoolBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">If Yes, Are the premises fenced and gated? </span> </label>
                <select id="liability_doesPremisesFenced" name="liability_doesPremisesFenced" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    @if($formVal == "ownerOccupied")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Do you own any Saddle or Draft Animals? <span class="err">*</span></label>
                <select id="liability_ownSaddleDraftAnimals" name="liability_ownSaddleDraftAnimals" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Do you own any Watercraft or Trailers? <span class="err">*</span></label>
                <select id="liability_ownWatercraftTrailers" name="liability_ownWatercraftTrailers" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">Do you own/rent any other properties? <span class="err">*</span></label>
                <select id="liability_ownOrRentOtherProperties" name="liability_ownOrRentOtherProperties" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    @endif
</section>