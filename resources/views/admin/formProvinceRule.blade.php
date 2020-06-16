<div class="row" id="fprBox">
	<div class="col-md-12">
		

		<!-- <div class="form-group">
			<label class="col-md-4" style="float: left;">Select Form : *</label>
			<select class="col-md-8 form-control fprGetData" name="fprForm" id="fprForm">
				<option value="">-Select form-</option>
                @foreach($forms as $f)
                <option value="{{$f['id']}}">{{ $f['name'] }}</option>
                @endforeach
			</select>
		</div>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Select Province : *</label>
			<select class="col-md-8 form-control fprGetData" name="fprProvince" id="fprProvince">
				<option value="">-Select province-</option>
                @foreach($canState as $cs)
                <option value="{{$cs['name']}}">{{ $cs['name'] }}</option>
                @endforeach
			</select>
		</div>

		<div class="form-group">
			<label class="col-md-4" style="float: left;">Refer/Quote :</label>
			<select class="col-md-8 form-control" name="fprRQ" id="fprRQ">
				<option value="">-Select value-</option>
                <option value="R">Refer</option>
                <option value="Q">Quote</option>
			</select>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" id="fprUpdate">Update</button>
		</div> -->
		<p class='col-md-12'> R = Refer  Q = Quote [ <b>Note : </b> Change value to update json ] </p>
			
		<div class="form-group" id="fprTableBox" >
			<div class="col-md-12" id="fprTable">
				<table class='table table-striped table-bordered'>
					<thead>
						<th>Form</th> <th>AB</th> <th>BC</th> <th>MB</th> <th>NB</th> <th>NFL</th> <th>NT</th> <th>NS</th> <th>NU</th> <th>ON</th> <th>PEI</th> <th>QC</th> <th>SK</th> <th>YT</th>
					</thead>
					<tbody>
						@foreach($forms_provinceRules as $key => $value)
						<tr>
							<td> {{ $key }} </td>
							@foreach($value as $k => $v)
							<td class="changeFPR"> <input type="text" value="{{ $v }}" class="fprVal fprValidateText" data-province = "{{$k}}" data-form = "{{$key}}" maxlength="1" /> </td>
							@endforeach

						</tr>
						@endforeach
					</tbody>
					
				</table>
			</div>
		</div>
		<p id="fprNotify" style="display: none;padding: 0;"></p>
	</div>
</div>