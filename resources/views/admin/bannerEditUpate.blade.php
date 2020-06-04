<div class="row" id="bannerBox">
	<div class="col-md-12">
		<p id="bannerNotify" style="display: none;padding: 0;"></p>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Select Form :</label>
			<select class="col-md-8 form-control" name="bannerForm" id="bannerForm">
				<option value="">-Select form-</option>
                @foreach($forms as $f)
                <option value="{{$f['id']}}">{{ $f['name'] }}</option>
                @endforeach
			</select>
		</div>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Message</label>
			<input type="text" name="bannerMSG" id="bannerMSG" class="form-control col-md-8" />
		</div>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Activate</label>
			<select class="col-md-8 form-control" name="bannerActive" id="bannerActive">
				<option value="">-Select value-</option>
                <option value="0"> 0 - Activate</option>
                <option value="1"> 1 - Deactivate</option>
			</select>
		</div>

		<div class="form-group">
			<div style="float: right;">
				<button id="bannerSave" class="btn btn-secondary">Save</button>
				<button id="bannerCancel" data-box="bannerBox" class="btn btn-secondary">Cancel</button>
			</div>
		</div>

	</div>
</div>