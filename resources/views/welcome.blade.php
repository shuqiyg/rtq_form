<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <noscript><meta http-equiv="refresh" content="1;url={{ url('error')}}"></noscript>

        <title>Real Time Quote - Forms</title>
        <link rel="shortcut icon" href="{{ URL::asset('img/amf25logo.png') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/css/smart_wizard_theme_arrows.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ouibounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/ouibounce.js') }}"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/form-validate.js') }}"></script>-->
    </head>
    <body>
        <?php
        
        if(isset($_SESSION['abs']) && !empty(($_SESSION['abs']))){
            if($_SESSION['abs'] == "wc"){ ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="false">X</span></button>
                    <?php
                        echo  "Form has been reset.";
                        // now empty session message
                        $_SESSION['abs'] = '';
                    ?>
                </div>
            <?php 
            }
        }
        ?>
        <h1 style="text-align: center;"> Real Time Quote - Forms  </h1>
        <!-- Show selection of form here -->
        <div class="row">
            <div class="col-md-12">
                <select id="rtq_forms" name="rtq_forms" class="col-md-4 form-control" style="margin: 0 auto;">
                    <option value="">-Select form-</option>
                    <option value="rentedDwelling">Rented Dwelling</option>
                    <option value="ownerOccupied">Owner Occupied</option>
                </select>
            </div>
            <p id="rtqSelectedForm" style="text-decoration: underline;"></p>
        
        </div>
        <!-- END -->

        <!-- Show selected form here -->
        <div id="showForm"></div>
        <!-- END -->

        <!-- footer -->
        <footer>
            <hr>
            <p style="text-align: center;">&copy; Copyright <?php echo date('Y');?> - Present  <a href="https://www.amfredericks.com/" target="_blank" data-toggle="tooltip" title="<img src='{{URL::asset('img/amfsite.png')}}' width='150' height='100'>"> <b style="color: blue;"> A.M.Fredericks Underwriting Management Ltd.</b> </a></p>
        </footer>
        <!-- End footer -->
    
        <script type="text/javascript">
            
            $(document).ready(function(){
                //activate bootstrap tooltip
                $('[data-toggle="tooltip"]').tooltip({
                    html:true,
                    placement : 'top'
                });

                // when form select
                $("#rtq_forms").on('change',function(){
                    var formVal  = $("#rtq_forms").val();
                    console.log(formVal);
                    if(formVal != '' && formVal != null){
                        // first check if showForm div has form then give alert before show form to avoid loosing data
                        if($("#showForm").text().length > 0){
                            //swal('Are you sure want to change form ?','You can loose data filled up in form','warning');
                            swal({
                              title: "Are you sure want to change form?",
                              text: "You can loose data filled up in form",
                              icon: "warning",
                              buttons: true,
                              dangerMode: true,
                            })
                            .then(function(willDelete) {
                              if (willDelete) {
                                // empty show form div area & show new form
                                  showForm(formVal);
                              } else {
                                return false;//swal("Your imaginary file is safe!");
                              }
                            });
                        }else{
                            showForm(formVal);
                        }
                    }
                });

                //function show form
                function showForm(formVal){
                    $("#showForm").empty();
                    $.ajax({
                        url:'loadForm',
                        data:{formVal:formVal,_token:$('meta[name="csrf-token"]').attr('content')},
                        type:'post',
                        success: function(data){
                            $("#rtqSelectedForm").text($("#rtq_forms option:selected").text()+' form has been selected :');
                            $('#showForm').html(data);
                        }
                    });
                }
            });
        </script>
    </body>
</html>
