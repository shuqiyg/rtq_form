<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Add Broker Code to Json List</title>

	<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
    	.bcCard{
    		text-align: center;
    		float: left;
    		margin: 10px;
    		padding: 10px;
    		border: 1px solid silver;
    	}
    	.bcCard:hover{
    		background: #ebf58c;
    	}
    </style>

</head>
<body style="width: 80%;margin:0 auto;border: 1px solid silver;">
	<?php
        $bcList = json_decode(file_get_contents(public_path().'/json/brokercodelist.json'), true);
        //echo sizeof($bcList[0]).' [] ';
        ksort($bcList[0]);
        //echo sizeof($bcList[0]).' [] ';
		//print_r($bcList);
    ?>
	<div style="margin : 10px 0px;padding: 20px;" >
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-4" style="float: left;">Broker Code</label>
					<input type="text" name="brokerCode" id="brokerCode" class="form-control col-md-8" placeholder="Add broker code to add new or update existing">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-4" style="float: left;">Domain</label>
					<input type="text" name="brokerDomain" id="brokerDomain" class="form-control col-md-8">
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-4" style="float: left;">Type</label>
					<select class="form-control col-md-8" id="brokerCodeType" name="brokerCodeType">
						<option value="Standard">Standard</option>
						<option value="Preferred">Preferred</option>
						<option value="Payfirst">Payfirst</option>
					</select>
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<button class="col-md-12 btn btn-primary form-control " id="addBC">Add/Update</button>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">
				<p id="msg"> </p>
			</div>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				@php $i = 1; @endphp
				@foreach($bcList as $k => $v)
					@foreach($v as $k1 => $v1)
					<tr>
						<td>{{$i}}</td>
						<td>{{$k1}}</td>
						@foreach($v1 as $k2 => $v2)
						<td>{{ $v2 }}</td>
						@endforeach
					</tr>
					@php $i++; @endphp
					@endforeach
				@endforeach
			</table>
		</div>
	</div> -->

	<div class="row">
		<div class="col-md-12" id="bcCardList">
			@foreach($bcList as $k => $v)
				@foreach($v as $k1 => $v1)
					<div class="bcCard">
						<span data-toggle="tooltip" title="
							<?php foreach($v1 as $k2 => $v2)
								echo trim($v2).'</br>';
							?>"
							>
							{{$k1}}
						</span>
					</div>
				@endforeach
			@endforeach
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			//activate bootstrap tooltip
			$('[data-toggle="tooltip"]').tooltip({
				html:true,
			    placement : 'top'
			});

			$("#addBC").on('click',function(){
				var bc = $.trim($("#brokerCode").val());
				var bd = $.trim($("#brokerDomain").val());
				var bcType = $.trim($("#brokerCodeType").val());

				if(bc != '' && bc != null){
					$.ajax({
				        url:"api/addBrokerCodeToList",
				        method:"post",
				        //async: true,
				        data: {bc:bc,bd:bd,bcType:bcType, _token:$('meta[name="csrf-token"]').attr('content')},
				        datatype: 'json',
				        success: function(msg){
				        	console.log(msg);

				        	// clear fields
				        	$("#brokerCode").val('');
				        	$("#brokerDomain").val('');
				        	$("#brokerCodeType").val('Standard');

				        	var sucessMsg = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="false">X</span></button> Added broker code '+bc+' Successfully. </div>';
				        	$("#msg").html(sucessMsg);

				        	// append code in existing BC card list on page to see it without refresh
				        	var appendBC = '<div class="bcCard"><span data-toggle="tooltip" title="'+bd+'\n'+bcType+'">'+bc+'</span></div>';
				        	if(bc != ''){
				        		$("#bcCardList").append(appendBC);
				        	}
				        },
				        error: function(data){
				        	console.log(data);
				        }
				      });
				}else{
					swal('Please enter values');
				}
			});
			
		});
	</script>

</body>
</html>