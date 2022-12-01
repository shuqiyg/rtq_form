<div class="row" id="amfRateBox">
	<div class="col-md-12">
		<div id="propertyModTabs">
	        <ul>
	            <li><a href="#provModTab">Province Mod</a></li>
	            <li><a href="#towngradeModTab">Towngrade Mod</a></li>
	            <li><a href="#constructionModTab">Construction Mod</a></li>
	        </ul>
	        <?php
	            // get province list 
	            $province = json_decode(file_get_contents(public_path().'/json/canStateList.json'), true);
	            $towngrade = json_decode(file_get_contents(public_path().'/json/propertyMod_towngrade.json'), true);
	            $construction = json_decode(file_get_contents(public_path().'/json/propertyMod_construction.json'), true);
	            //print_r($towngrade);
	        ?>
	        <div id="provModTab">
	        	<p id="propertyModProvNotify" style="display: none;padding: 0;"></p>
	        	<div class="row">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Province</label>
	        				<select class="col-md-8 form-control" name="propertyProvModProvince" id="propertyProvModProvince">
	        					<option value="">-Select Province-</option>
	        					@foreach($province as $p)
	        					<option value="{{$p['name']}}">{{$p['name']}}</option>
	        					@endforeach
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Mod (in percentage)</label>
	        				<input type="text" class="col-md-8 allow_decimal form-control" id="propertyProvModMod" name="propertyProvModMod" placeholder="Value must be in percentage">
	        			</div>
	        			<div class="form-group">
							<div style="float: right;">
								<button id="propertyProvModSave" class="btn btn-secondary">Save</button>
								<button id="propertyProvModCancel" data-box="provModTab" class="btn btn-secondary">Cancel</button>
							</div>
						</div>

	        		</div>
	        	</div>
		
	        </div>

	        <div id="towngradeModTab">
	        	<p id="propertyModTGNotify" style="display: none;padding: 0;"></p>
				<div class="row">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Towngrade</label>
	        				<select class="col-md-8 form-control" name="propertyTGModTowngrade" id="propertyTGModTowngrade">
	        					<option value="">-Select towngrade-</option>
	        					@foreach($towngrade[0] as $key=>$value)
	        					<option value="{{$key}}">{{$key}}</option>
	        					@endforeach
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Mod (in percentage)</label>
	        				<input type="text" class="col-md-8 allow_decimal form-control" id="propertyTGModMod" name="propertyTGModMod" placeholder="Value must be in percentage">
	        			</div>
	        			<div class="form-group">
							<div style="float: right;">
								<button id="propertyTGModSave" class="btn btn-secondary">Save</button>
								<button id="propertyTGModCancel" data-box="towngradeModTab" class="btn btn-secondary">Cancel</button>
							</div>
						</div>

	        		</div>
	        	</div>
	        </div>

	        <div id="constructionModTab">
	        	<p id="propertyModConNotify" style="display: none;padding: 0;"></p>
				<div class="row">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Construction Type</label>
	        				<select class="col-md-8 form-control" name="propertyConModConType" id="propertyConModConType">
	        					<option value="">-Select type-</option>
	        					@foreach($construction[0] as $key=>$value)
	        					<option value="{{$key}}">{{$key}}</option>
	        					@endforeach
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Code</label>
	        				<input type="text" class="col-md-8 form-control" id="propertyConModCode" name="propertyConModCode" >
	        			</div>
	        			<div class="form-group">
	        				<label class="col-md-4" style="float: left;">Mod (in percentage)</label>
	        				<input type="text" class="col-md-8 allow_decimal form-control" id="propertyConModMod" name="propertyConModMod" placeholder="Value must be in percentage">
	        			</div>
	        			<div class="form-group">
							<div style="float: right;">
								<button id="propertyConModSave" class="btn btn-secondary">Save</button>
								<button id="propertyConModCancel" data-box="constructionModTab" class="btn btn-secondary">Cancel</button>
							</div>
						</div>

	        		</div>
	        	</div>
	        </div>
    	</div>
		

	</div>
</div>