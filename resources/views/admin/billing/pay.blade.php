<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Applicator - Admin Dashboard Template</title>
    <link rel="apple-touch-icon" href="/admincss/images/logo/apple-touch-icon.html">
    <link rel="shortcut icon" href="/admincss/images/logo/favicon.png">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/bootstrap/dist/css/bootstrap.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/PACE/themes/blue/pace-theme-minimal.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')!!}" />
    <link href="{!!asset('css/admincss/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/themify-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/materialdesignicons.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/app.css')!!}" rel="stylesheet">
</head>

<body>
    <div class="app header-default side-nav-dark">
        <div class="layout">
            <div class="header navbar">
                <div class="header-container">
                    <div class="nav-logo">
                        <a href="index-2.html">
                            <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                            <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-container">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Plan Payment</h4>
                                        <div class="card-toolbar">
                                        </div>
                                    </div>
                                    <div class="table-overflow">
                                            <div class="col-md-4 mb-3">
                                                    <input class="due-text" style="display: none" id="firstname" value="{{$user->userDetail->firstname}}">
                                                    <input class="due-text" style="display: none" id="lastname" value="{{$user->userDetail->lastname}}">
                                                    <input class="due-text" style="display: none" id="email" value="{{$user->userDetail->email}}">
                                                    <input class="due-text" style="display: none" id="amount" value="{{$plan->price}}">
                                            </div>

                                            <h2>{{ $plan->name }}</h2>
                                            <p class="due-text">{{ $plan->price }}</p>
                                            <p class="due-session">{{$plan->duration}} (days)</p>

                                            <form >
                                                    <script src="https://js.paystack.co/v1/inline.js"></script>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="payWithPaystack()"> Pay Now</button>
                                            </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{!! asset('css/admincss/js/vendor.js')!!}"></script>
    <script src="{!!asset ('css/admincss/js/app.min.js')!!}"></script>
    <script src="{!!asset('css/admincss/vendor/chart.js/dist/Chart.min.js')!!}"></script>
    <script src="{!!asset ('css/admincss/vendor/jquery.sparkline/jquery.sparkline.min.js')!!}"></script>
    <script src="{!!asset ('css/admincss/js/dashboard/default.js')!!}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")

        @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")

        @elseif(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")

        @endif
    </script>
     <script>
            function payWithPaystack(){
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var amount = $('#amount').val();
                    amount = amount * 100;
                var handler = PaystackPop.setup({
                    key: 'pk_test_2290789cd99a94f5c07a3621f36eb74dd7fc7229',
                    // subaccount: 'ACCT_z2mt1uq2r3yaw8d',
                    // bearer:'subaccount',
                    email: email,
                    amount: amount,
                    // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    firstname: firstname,
                    lastname: lastname,
                    metadata: {
                        custom_fields: [
                            {
                                // display_name: "Mobile Number",
                                // variable_name: "mobile_number",
                                // value: phone
                            }
                        ]
                    },
                    callback: function(response){
                        afterResponse(response.reference)
                    },
                    onClose: function(){

                    }
                });
                handler.openIframe();
            }
    
            function afterResponse(reference){
                var url = 'https://api.paystack.co/transaction/verify/'+reference;
                var key = 'Bearer sk_test_747644d7d69c96503375541dcd436818273a5e56';
                $.ajax({
                    url: url,
                    headers: {
                        Authorization: key
                    },
                    data: {
                        format: 'json'
                    },
                    error: function(data) {
                        console.log(data);
                    },
                    dataType: 'json',
                    success: function(response) {
                        if(response.data.status == 'error'){
                            alert('Error making payment.kidly try again!!')
                            window.location.href =  window.location.origin+'/';
                        }
                        saveFeedback(response.data.reference,response.data.status,response.data.transaction_date)
                    },
                    beforeSend: function(){
                        $('#whole').hide();
                        $('.loader').show();
                    },
                    complete: function(data)
                    {

                    },
                    type: 'GET'
                });
            }
    
            function saveFeedback(reference, status, time)
            {
                var url = '/admin/user/savePayment';
                var token = $('meta[name="csrf-token"]').attr('content')
                var data = {
                    "_method": 'POST',
                    "_token": token,
                    transact_id: reference,
                    status: status,
                    user_id: {{ $user->id }},
                    plan_id: {{ $plan->id }},
                    payin_time: time,
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(data) {
                        console.log(data)
                        alert('Paymeny made successfully, It might take up to 24hours to activate.')
                    window.location.href =  window.location.origin+'/';
                    },
                    dataType: 'JSON'
                });
            }
        </script>
</body>
</html>