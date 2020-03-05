    
        <?php
            // get us-canada state/province name list
            $canState = json_decode(file_get_contents(public_path().'/json/canStateList.json'), true);
            $usState = json_decode(file_get_contents(public_path().'/json/usStateList.json'), true);

            // use formVal value coming from controller to use to select fields according to it.
        ?>

    <form id="rtq_form">
        <div id="smartwizard" class="sw-main sw-theme-arrows">
            <ul class="nav nav-tabs step-anchor">
                <li><a href="#legal">Legal<br /><small>T&C</small></a></li>
                <li><a href="#tab-1">Broker<br /><small>Broker Info</small></a></li>
                <li><a href="#tab-2">Insured<br /><small>Insured Info</small></a></li>
                <li><a href="#tab-3">Risk Address<br /><small>Risk Address</small></a></li>
                <li><a href="#tab-4">Occupancy<br /><small>Building details</small></a></li>
                <li><a href="#tab-5">Coverage<br /><small>Coverage Required</small></a></li>
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
                    @include('tab_2')
                </div>
                <!-- Risk Address -->
                <div id="tab-3" class="">
                    @include('tab_3')
                </div>
                <!-- Occupance , Building Construction, Fire alarm/detectors & liability tab -->
                <div id="tab-4" class="">
                    @include('tab_4')
                </div>
                <!-- Coverage Required Tab -->
                <div id="tab-5" class="">
                    @include('tab_5')
                </div>  
                <!-- Final Tab -->
                <div id="result" class="">
                    @include('final')
                </div>
            </div>
        </div>
    </form>
<!-- call custom javascript while rendering form data -->        
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>