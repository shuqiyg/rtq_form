<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-4" style="float: left;">Select Form :</label>
			<select class="form-control col-md-8 " name="calculatorForm" id="calculatorForm">
				<option value="">-Select form-</option>
                @foreach($forms as $f)
                <option value="{{$f['id']}}">{{ $f['name'] }}</option>
                @endforeach
			</select>
		</div>
	</div>
</div>
<hr>

<div class="row" id="calculatorBox" style="display: none;">
	<!-- SHOW FIELDS AS PER FORM AND CALCULATE BUTTON -->
	<!-- SOME FIELDS ARE SAME SO ADD IT ACCORDINGLY -->
	<!-- USE CLASS 'formID'+'CalcBox' to show or hide form, THIS IS BECAUSE SOME FIELDS ARE USED IN TWO OR MORE FORMS -->
	<div class="row w-100 formCalcBox ownerOccupiedCalcBox rentedDwellingCalcBox" id="rentedDwellingCalcBox" style="display: none;">
		@include('admin.calculatorRentedOwner')
	</div>

	<!-- Home Inspector -->
	<div class="row w-100 formCalcBox homeInspectorCalcBox" id="homeInspectorCalcBox" style="display: none;">
		@include('admin.calculatorHomeInspector')
	</div>

	<!-- Home Inspector -->
	<div class="row w-100 formCalcBox plumbingCalcBox" id="plumbingCalcBox" style="display: none;">
		@include('admin.calculatorPlumbing')
	</div>

</div>

<div class="form-group" >
    <button class="btn btn-primary" style="float: right;" id="getCalculation">Calculate</button>
</div>


<div class="row">
	<div class="col-md-12">
		<div id="priceBox">

		</div>
	</div>
</div>