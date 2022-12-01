<div class="row" id="cefSLBox">
	<div class="col-md-12">
		<p class='col-md-12'>Showing CEF schedule limit total</p>
		
		<div class="form-group" id="cefSLTableBox" >
			<div class="col-md-12" id="cefSLTable">
				<table class='table table-striped table-bordered'>
					<thead>
						<th>Form</th> <th>AB</th> <th>BC</th> <th>MB</th> <th>NB</th> <th>NFL</th> <th>NT</th> <th>NS</th> <th>NU</th> <th>ON</th> <th>PEI</th> <th>QC</th> <th>SK</th> <th>YT</th>
					</thead>
					<tbody>
						@foreach($cef_scheduleLimit[0] as $key => $value)
						<tr>
							@foreach($value as $k => $v)
								<td> {{ $key }} </td>
								@if($k == "cefSceduleLimit")
									@foreach($v as $k1 => $v1)
										@foreach($v1 as $k2 => $v2)
											@if($k2 == "limitByTotal")
												<td class="changeCEFsl"> <input type="text" value="{{ $v2 }}" class="cefSLVal onlyNumbers" data-province = "{{$k1}}" data-form = "{{$key}}" /> </td>
											@endif
										@endforeach
									@endforeach
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