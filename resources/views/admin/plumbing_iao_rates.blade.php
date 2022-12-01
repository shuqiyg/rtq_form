<div class="row" id="cefSLBox">
	<div class="col-md-12">
		<p id="piaorNotify" style="display: none;"></p>
		
		<div class="form-group" id="piaorTableBox" >
			<div class="col-md-12" id="piaorTable">
				<table class='table table-striped table-bordered'>
					<thead>
					<th>IAO</th>
				<!-- 	<th>Desc</th> -->
					<th>ins fees</th>
					<th>Revenue</th>
					<th>Deductible</th>
					<th>Retained</th>
					<th>Min prem</th>
					<th>AB</th>
					<th>BC</th> 
					<th>MB</th> 
					<th>NB</th>
					<th>NFL</th>
					<th>NT</th>
					<th>NS</th>
					<th>NU</th> 
					<th>ON</th> 
					<th>PEI</th> 
					<th>QC</th> 
					<th>SK</th> 
					<th>YT</th>
					<th>Rating Base</th>
					</thead>
					<tbody>
						@foreach($plumbing_iao as $key => $value)
						<tr>
							<td> {{ $key }} </td>
							@foreach($value as $k => $v)
							@if(!in_array($k,array("iao","desc")))								
								<td class="changePIAOR"> <input type="text" value="{{ $v }}" class="piaorVal" data-key = "{{$k}}" data-iao = "{{$key}}" /> </td>
							@endif
							@endforeach

						</tr>
						@endforeach
					</tbody>
					
				</table>
			</div>
		</div>
		<p id="cefSLNotify" style="display: none;padding: 0;"></p>
	</div>
</div>