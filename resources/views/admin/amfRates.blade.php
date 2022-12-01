<div class="row" id="amfRateBox">
	<div class="col-md-12">
		<p id="amfRateNotify" style="display: none;padding: 0;"></p>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Select Form :</label>
			<select class="col-md-8 form-control" name="amfRateForm" id="amfRateForm">
				<option value="">-Select form-</option>
                @foreach($forms as $f)
                <option value="{{$f['id']}}">{{ $f['name'] }}</option>
                @endforeach
			</select>
		</div>

		<div class="form-group">
			<div class="col-md-12" id="amfRateTable">

			</div>
		</div>

		<!-- <div class="form-group">
			<div style="float: right;">
				<button id="amfRateSave" class="btn btn-secondary">Save</button>
				<button id="amfRateCancel" data-box="amfRateBox" class="btn btn-secondary">Cancel</button>
			</div>
		</div> -->

	</div>
</div>