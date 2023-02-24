    
        <?php
            // get us-canada state/province name list
            $canState = json_decode(file_get_contents(public_path().'/json/canStateList.json'), true);
            $usState = json_decode(file_get_contents(public_path().'/json/usStateList.json'), true);

            // use formVal value coming from controller to use to select fields according to it.
        ?>
    <form id="rtq_form">
        <div id="smartwizard" class="sw-main sw-theme-arrows">
            <ul class="nav nav-tabs step-anchor">
               <!--  <li><a href="#tab-12">Liability<br /><small>Liability details</small></a></li> -->
                <li><a href="#legal">Legal<br /><small>T&C</small></a></li>
                <li><a href="#tab-1">Broker<br /><small>Broker Info</small></a></li>
                <li><a href="#tab-2">Insured<br /><small>Insured Info</small></a></li>
                @if($formVal == "homeInspector" || $formVal == "motor_truck_cargo")
                <li><a href="#tab-6">Existing Insurance<br /><small>Insurance Info</small></a></li>
                @endif
                @if($formVal == "homeInspector" || $formVal == "plumbing" || $formVal == "motor_truck_cargo" || $formVal == "dayCare")
                <li><a href="#tab-7">Loss History<br /><small>Claim and loss</small></a></li> 
                @endif
                @if($formVal == "homeInspector")
                <li><a href="#tab-8">OPS<br /><small>Industry general</small></a></li> 
                <li><a href="#tab-9">OPS<br /><small>Industry specific</small></a></li> 
                <li><a href="#tab-10">CGL<br /><small>Required Coverage</small></a></li>
                @elseif($formVal == "motor_truck_cargo")
                <li><a href="#description_of_operation">Description<br /><small>Operation details</small></a></li>
                <li><a href="#tab-5">Coverage<br /><small>Coverage Required</small></a></li>  
                @elseif($formVal == "dayCare")
                {{-- Operations Tab --}}
                <li><a href="#tab-13">Operations<br /><small>Operation Details</small></a></li>
                @else
                <li><a href="#tab-3">Risk Address<br /><small>Risk Address</small></a></li>
                    @if($formVal != "plumbing")
                    <li><a href="#tab-4">Occupancy<br /><small>Building details</small></a></li>
                    @endif
               <!--  @if($formVal == "motor_truck_cargo")
                <li><a href="#description_of_operation">Description<br /><small>Operation details</small></a></li>
                @endif -->
                    @if($formVal == "plumbing")
                    <li><a href="#tab-11">Protections<br /><small>Protections details</small></a></li>
                    <li><a href="#tab-12">Liability<br /><small>Liability details</small></a></li>
                    @endif
                <li><a href="#tab-5">Coverage<br /><small>Coverage Required</small></a></li>
                @endif 
                @if($formVal == "dayCare")

                @endif
                <li><a href="#result">Result<br /><small>Final</small></a></li>
            </ul>
         
            <div>
                <!-- Legal Tab -->
                <div id="legal" class="">
                    @include('legal')
                </div>
                <!-- Broker info & survey Tab -->
                <div id="tab-1" class="">
                    @include('tab_1')
                </div>
                <!-- Insured & Mailing Address Tab -->
                <div id="tab-2" class="">
                    @if($formVal == "homeInspector" || $formVal == "plumbing")
                        @include('hi_insured')
                    @else
                        @include('tab_2')
                    @endif
                    
                </div>
                
                @if($formVal == "homeInspector" || $formVal == "motor_truck_cargo")
                <!-- Existing Insurance -->
                <div id="tab-6" class="">
                    @include('hi_existingInsurance')
                </div>
                @endif
                @if($formVal == "homeInspector" || $formVal == "dayCare" ||  $formVal == "plumbing" || $formVal == "motor_truck_cargo")
                <!-- Claim History -->
                <div id="tab-7" class="">
                    @include('tab_7')
                </div>
                @endif
                @if($formVal == "homeInspector")
                <!-- OPS -->
                <div id="tab-8" class="">
                    @include('tab_8')
                </div>
                <!-- OPS -->
                <div id="tab-9" class="">
                    @include('tab_9')
                </div>
                <!-- CGL -->
                <div id="tab-10" class="">
                    @include('tab_10')
                </div>
                @elseif($formVal == "motor_truck_cargo")
                <!-- Description of Operation -->
                <div id="description_of_operation" class="">
                    @include('description')
                </div>
                <!-- coverage tab motortruck cargo -->
                <div id="tab-5" class="">
                    @include('tab_5')
                </div>
                @elseif($formVal == "dayCare")
                    {{-- do nothing --}}              
                <!-- Risk Address -->
                @else<div id="tab-3" class="">
                    @include('tab_3')
                    </div>
                    @if($formVal != "plumbing")
                    <!-- Occupance , Building Construction, Fire alarm/detectors & liability tab -->
                    <div id="tab-4" class="">
                        @include('tab_4')
                    </div>
                    @endif
                    @if($formVal == "plumbing")
                    <!-- Protection details like fire alarm/burglary Alarm tab -->
                    <div id="tab-11" class="">
                        @include('tab_11')
                    </div>
                    <!-- Liability Tab  -->
                    <div id="tab-12" class="">
                        @include('tab_12')
                    </div>
                    @endif
                    <!-- Coverage Required Tab -->
                    <div id="tab-5" class="">
                        @include('tab_5')
                    </div>  
                @endif
                @if($formVal == 'dayCare')
                <div id="tab-13" class="">
                    @include('tab_13')
                </div>
                @endif
                <!-- Final Tab -->
                <div id="result" class="">
                    @include('final')
                </div>
                
            </div>
        </div>
    </form>

    <!-- HELP WINDOW START -->
    <!-- <i class="fa fa-question-circle-o open-button" id="openHelp" data-toggle="tooltip" title="Need Help ?"></i>
    <i class="fa fa-remove" id="closeHelp" style="display: none;"></i>
        

    <div class="help-popup" id="helpBox">
        <div class="help-container">
            <div class="loaderHelp" style="display: none;"></div>
            <h5>Find meaning of question</h5>
            <div id="showMeanings" style="display: none;"></div>
        </div>
    </div> -->
    <!-- HELP WINDOW END -->

    <!-- OuiBounce Modal -->
        <div id="ouibounce-modal">
            <div class="underlay"></div>
            <div class="modal" style="display: block;">
                <div class="modal-title">
                    <h3>Are sure want to close this page ?</h3>
                </div>

                <div class="modal-body">
                    <div  style="text-align: center;">
                        <img src="{{ URL::asset('img/warning_icon.png') }}" width="100" height="100">
                    </div>
                    <div style="padding-top: 10px;text-align: center;">
                        <p style="font-size: 24px;">Once you close this page, you will loose data.</p>
                        <p>Click on close window link to succuessfully close session and reset the form.</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <div style="width: 100%;">
                        <a id="backToForm" style="float: left;">Back to Form</a>
                        <a id="closeWindow" style="float: right;">Close Window</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End OuiBounce Modal -->

    <!-- call custom javascript while rendering form data         
    <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>-->

