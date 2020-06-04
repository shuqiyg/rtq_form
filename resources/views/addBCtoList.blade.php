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

		/*** SET URL AS PER ENVIRONMENT SET IN .env FILE **/
        $env = trim(env('APP_ENV')); 
        if($env == "production"){
            $addBrokerCodeToList = "/rtqform/api/2020/amf/root/addBrokerCodeToList";
            $searchBrokerCodeToList = "/rtqform/api/2020/amf/root/searchBrokerCodeToList";
        }else{
            $addBrokerCodeToList = "/api/2020/amf/root/addBrokerCodeToList";
            $searchBrokerCodeToList = "/api/2020/amf/root/searchBrokerCodeToList";
        }


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
					<input type="text" name="brokerDomain" id="brokerDomain" class="form-control col-md-8" placeholder="add more domain using comma">
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
				<p id="msg" style="display: none;"> </p>
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
		<div class="col-md-12">
			<div class="form-group">
				<select class="form-control col-md-2" id="searchType" name="searchType" style="float: left;margin-left: 8%;margin-right: 10px;">
					<option value="byCode">By Code</option>
					<option value="byDomain">By Domain</option>
				</select>
				<input type="text" name="searchBrokerList" id="searchBrokerList" class="col-md-8 form-control" placeholder="Search using broker code , Press tab to see results">
			</div>
		</div>
		<p class="col-md-12" id="searchMSG" style="display: none;color: red;padding-left: 8%;"></p>
		<div class="col-md-12" id="listSearchBroker" style="display: none;">

		</div>
	</div>

	<hr>
	
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
			//$( document ).tooltip();
			$('[data-toggle="tooltip"]').tooltip({
				html:true,
			    placement : 'top'
			});
			// For Dynamically added broker list [ for search ]
			$(document).on('mouseover','.bcCard',function () {
				$("[data-toggle=tooltip]").tooltip();
			});

			/** only alphanumeric and some specific character allowed to input in some of field
			    ^ - start of string
			    (?!\d+$) - the negative lookahead that fails the match if a string is numeric only
			    (?:[a-zA-Z0-9][a-zA-Z0-9 @&$]*)? - an optional sequence of:
			        [a-zA-Z0-9] - a digit or a letter
			        [a-zA-Z0-9 @&$]* - 0+ digits, letters, spaces, @, & or $ chars
			    $ - end of string.
			**/
			$(".onlyValidText").on("keypress", function(e){
				var keyCode = e.which;
			    /*
			        65-90 A-Z
			        97-122 a-z
			        127 delete button
			        32 spacebar
			        44 comma 
			        47 backslash
			        38 &
			        46 dot
			        39 single quote '
			        dash - 45
			        48-57 - (0-9)Numbers
			    */
			    var allowedCharacter = [32,127,44,47,38,39,45,46];
				if ( (!(keyCode >= 48 && keyCode <= 57)) && (!(keyCode >= 65 && keyCode <= 90)) && (!(keyCode >= 97 && keyCode <= 122)) && jQuery.inArray(keyCode,allowedCharacter) == -1) { 
			    	return false;
			    }
			});
			/** Numeric values allowed **/
			$(".onlyValidNumbers").on("keypress", function(e){
		    	var keyCode = e.which;
		      	/*
			        48-57 - (0-9)Numbers
		      	*/
			    if ( (!(keyCode >= 48 && keyCode <= 57))) { 
		        	return false;
		      	}
		  	});

			var addBrokerCodeToList = "{!!$addBrokerCodeToList!!}";
            var searchBrokerCodeToList = "{!!$searchBrokerCodeToList!!}";
			
			$("#addBC").on('click',function(){
				var bc = $.trim($("#brokerCode").val());
				var bd = $.trim($("#brokerDomain").val());
				var bcType = $.trim($("#brokerCodeType").val());

				if(bc != '' && bc != null){
					$.ajax({
				        url:addBrokerCodeToList,
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
				        	$("#msg").show();
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

			// IF SEARCH TYPE CHANGE 
			$("#searchType").on('change',function(){
				// get value - By default it shows by code
				var searchType = $("#searchType").val();
				// if search type is by domain then remove class onlyNumbers so user can add any domain name
				if(searchType == "byDomain"){
					/*$("#searchBrokerList").removeClass('onlyValidNumbers');
					$("#searchBrokerList").addClass('onlyValidText');*/
					$("#searchBrokerList").attr('placeholder','Search using domain , Press tab to see results');
				}else{
					/*$("#searchBrokerList").removeClass('onlyValidText');
					$("#searchBrokerList").addClass('onlyValidNumbers');*/
					$("#searchBrokerList").attr('placeholder','Search using broker code , Press tab to see results');
				}
				$("#searchBrokerList").val('');
				$("#searchMSG").text('');
				$("#searchMSG").hide();
				$(this).unbind('.onlyValidNumbers');
			});
			// AJAX REQUEST FOR SEARCH BROKER LIST
			$("#searchBrokerList").on('focusout',function(){
				var search = $.trim($("#searchBrokerList").val());
				var searchType = $("#searchType").val();

				if(search != '' && search != null){
					$.ajax({
				        url:searchBrokerCodeToList,
				        method:"post",
				        //async: true,
				        data: {search:search,searchType:searchType,_token:$('meta[name="csrf-token"]').attr('content')},
				        datatype: 'json',
				        success: function(msg){
				        	console.log(msg);
				        	var html = '';

				        	if(msg != '' && msg != null){
				        		$.each(msg,function(key,value){
					        		//console.log(value);
					        		html += '<div class="bcCard"><span data-toggle="tooltip" title="';
					        		$.each(value,function(key1,value1){
					        			html += '[ '+value1+' ] ';
					        		});
					        		html += '">'+key+'</span></div>';		
					        	});

					        	//console.log(html);
					        	$("#listSearchBroker").html(html);
					        	$("#listSearchBroker").show();
					        	$("#searchMSG").text('');
					        	$("#searchMSG").hide();
				        	}else{
				        		$("#listSearchBroker").hide();
								$("#listSearchBroker").html('');
								$("#searchMSG").show();
								if(searchType == "byDomain"){
									$("#searchMSG").text('Search using domain '+search+' is not available.');
								}else{
									$("#searchMSG").text('Search using code '+search+' is not available.');
								}
				        		
				        	}
				        	
				        },
				        error: function(data){
				        	console.log(data);
				        }
				      });
				}else{
					$("#listSearchBroker").hide();
					$("#listSearchBroker").html('');
				}
			});
			
		});
	</script>

</body>
</html>