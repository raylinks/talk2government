<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Senator</title>
        <link rel="stylesheet" href="/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/css/perfect-scrollbar.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/style.css">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="../../images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                <div class="row">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                        <div class="card col-lg-4 mx-auto">
                            <div class="card-body px-5 py-5">
                                <h3 class="card-title text-left mb-3">Setup Account</h3>
                                <form  method="POST" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    @foreach ($errors as $error)
                                        <p class="alert alert-danger">{{$error}}</p>
                                    @endforeach
                                    <div id="tab1">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select name="title">
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Dr">Dr</option>
                                            <option value="Engr">Engr</option>
                                            <option value="GCFR">GCFR</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="firstname"  placeholder="First Name" value="{{ old('firstname') }}">
                                        @if ($errors->has('firstname'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="lastname"  placeholder="Last Name" value="{{ old('lastname') }}">
                                        @if ($errors->has('lastname'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control" name="middlename" placeholder="middlename" value="{{ old('middlename') }}">
                                        @if ($errors->has('middlename'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label><span style="color:red">*</span>
                                        <input type="email" class="form-control"name="email"  value="{{ old('email') }}" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                        <label>Background Details</label>
                                        <textarea rows="5" class="form-control" name="profile" placeholder="Here can be your description" value="{{ old('profile') }}"></textarea>
                                        @if ($errors->has('profile'))
                                        <span class="alert alert-danger">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Upload your PVC <span style="color:red"> *</span></label>
                                            <input type="file" class="form-control"name="image"  value="" >
                                            @if ($errors->has('image'))
                                        <span class="alert alert-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                        </div>

                                    <a id="next2" class="btn btn-info btn-fill pull-right">NEXT</a>   
                                    </div>
                                    <div id="tab2">
                                        <div class="">
                                                <label>Position</label>
                                                <select name="aspirant_id"  id="aspirant" class="form-control">
                                                        <option>Select Option</option>
                                                        <option value="president">President</option>
                                                        <option value="state">State</option>
                                                    </select>
                                                <div class="form-group" style="display:none" id="state-dis">
                                                    <label>State</label>
                                                        <select name="state_id" id="state"  class="form-control">
                                                            <option value="0">All States</option>
                                                            @foreach( $states as $state)
                                                                <option value="{{ $state->id}}"> {{$state->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
    
                                                    <div class="form-group" id="party-dis" style="display: none">
                                                            <label>Party</label>
                                                            <select id="party-data" name="party_id" class="form-control">
                                                                    <option> All Parties</option>
                                                                    @foreach($parties as $party)
                                                                        <option value="{{$party->id}}">{{$party->name}}</option>
                                                                    @endforeach
                                                            </select>
                                                    </div>
                
                                                    <div class="form-group" style="display:none" id="cat-dis">
                                                            <select name="category" id="category" class="form-control">
                                                                    <label>Select Category</label>
                                                                    <option value="">All Categories</option>
                                                                    <option value="1">Senatorial District</option>
                                                                    <option value="2">Federal Constituency</option>
                                                                    <option value="3">Governor</option>
                                                                    <option value="4">State Assembly</option>
                                                            </select>
                                                    </div>
                
                                                    <div class="form-group" id="lcda-dis" style="display: none">
                                                            <label>Local Goverment</label>
                                                            <select id="lcda-data" name="lcda_id" class="form-control">
                                                                <option value="0">Select LGA</option>
                                                            </select>
                                                    </div>
                
                                                    <div class="form-group" id="fed-dis" style="display: none">
                                                            <label>Federal Constituency</label>
                                                            <select id="fed-data" name="fed_id" class="form-control">
                                                                <option value="0">Select Federal Constituency</option>
                                                            </select>
                                                    </div>
                
                                                    <div class="form-group" id="sen-dis" style="display: none">
                                                            <label>Senatorial District</label>
                                                            <select id="sen-data" name="sen_id" class="form-control">
                                                                <option value="0">Select Senatorial District</option>
                                                            </select>
                                                    </div>
                                
                                                </div>
                                    <a id="next3" class="btn btn-info btn-fill pull-right">NEXT</a>
                                </div>
                                    <div id="tab3">
                                    <div class="form-group">
                                        <label>Password</label> <span style="color:red">*</span>
                                        <input type="password" class="form-control" required name="password" placeholder="Password" value="">
                                        @if ($errors->has('password'))
                                        <span class=" alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label><span style="color:red">*</span>
                                        <input type="password" required class="form-control" name="password_confirmation" placeholder="Confirm Password" value="">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#" class="forgot-pass">Forgot password</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Setup Profile</button>
                                    </div>
                                    <p class="sign-up text-center">Already have an Account?<a href="/auth/login"> Login</a></p>
                                    <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(function(){
                $('#tab1').show();
                $('#emailerror').hide();
                $('#tab2').hide();
                $('#tab3').hide();
            });
            $('select#aspirant').change(function(){
				var aspirant = $('select#aspirant').val();
				if(aspirant == 'president'){
					$('#lcda-dis').hide()
					$('#fed-dis').hide()
					$('#party-dis').show()
					$('#sen-dis').hide()
					$('#state-dis').hide()
					$('#category').hide()
				}

				if(aspirant == 'state'){
					$('#lcda-dis').hide()
					$('#fed-dis').hide()
					$('#party-dis').show()
					$('#sen-dis').hide()
					$('#state-dis').show()
				}
			});

			$('select#state').change(function(){
				$('#category').show()
				$('#cat-dis').show()
				var state = $('select#state').val();
				var url = '/user/fetchDetails/'+ state;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        // console.log(data)
						// console.log(data.success.sens)
						// console.log(data.success.feds)
						// console.log(data.success.lcdas)
						// console.log(data.success.parties)

						var lcdas = data.success.lcdas
						var feds = data.success.feds
						var sens = data.success.sens
						var parties = data.success.parties

						var lcda_d = "";
						var fed_d = "";
						var sen_d = "";
						var party_d = "";

                        lcda_d += (`<option value="0">`+ 'Select LGA' +`</option>`);
						fed_d += (`<option value="0">`+ 'Select Federal Constituency' +`</option>`);
						sen_d += (`<option value="0">`+ 'Select Senatorial District' +`</option>`);
						party_d += (`<option value="0">`+ 'Select Party' +`</option>`);

                        $.each(lcdas, function (key, val) {
                            lcda_d += (`<option value="${val.id}">`+ val.name+`</option>`);
                        });
						$.each(feds, function (key, val) {
                            fed_d += (`<option value="${val.id}">`+ val.name+`</option>`);
                        });
						$.each(sens, function (key, val) {
                            sen_d += (`<option value="${val.id}">`+ val.name+`</option>`);
                        });
						$.each(parties, function (key, val) {
                            party_d += (`<option value="${val.id}">`+ val.name+`</option>`);
                        });
						
						$('#lcda-data').html(' ');
						$('#sen-data').html(' ');
						$('#fed-data').html(' ');
						$('#party-data').html(' ');

                        $('#lcda-data').append(lcda_d);
						$('#sen-data').append(sen_d);
						$('#fed-data').append(fed_d);
						$('#party-data').append(party_d);
                    },
                    dataType: 'JSON'
                });
		})

          $('#next2').click(function(){
                $('#tab1').hide();
                $('#emailerror').hide();
                $('#tab2').show();
                $('#tab3').hide();
        });
        $('#next3').click(function(){
                $('#tab1').hide();
                $('#tab2').hide();
                $('#emailerror').hide();
                $('#tab3').show();
    });

    $('select#category').change(function(){
		var cat = $('select#category').val()
                if(cat == 1)
				{
					$('#lcda-dis').hide()
					$('#fed-dis').hide()
					$('#party-dis').hide()
					$('#sen-dis').show()
				}
				if(cat == 2)
				{
					$('#lcda-dis').hide()
					$('#party-dis').hide()
					$('#sen-dis').hide()
					$('#fed-dis').show()
				}
				if(cat == 3)
				{
					$('#lcda-dis').hide()
					$('#sen-dis').hide()
					$('#fed-dis').hide()
					$('#party-dis').hide()
				}
			})
                // $('#tab1').show();
                // $('#tab2').hide();
                // $('#tab3').hide();
                
                // $('#next2').click(function(){
                //     $('#tab1').hide();
                //     $('#tab2').show();
                //     $('#tab3').hide();
                // });
                // $('#next3').click(function(){
                //     $('#tab1').hide();
                //     $('#tab2').hide();
                //     $('#tab3').show();
                // });

                // $('select#position').change(function () {
                //      var pos = $('select#position').val()
                //         // alert(pos)
                //     if(pos == 1){
                //         $('#lcda-dis').hide()
                //         $('#state-dis').hide()
                //         $('#federalConst-dis').hide()
                //         $('#senatorialDist-dis').hide()
                //         $('#party-dis').show()
                //     }
                //     else if(pos == 2)
                //     {
                //         $('#lcda-dis').hide()
                //         $('#federalConst-dis').hide()
                //         $('#senatorialDist-dis').hide()
                //         $('#state-dis').show()
                //         $('#party-dis').show()

                //     }
                //     else if(pos == 3)
                //     {
                //         $('#federalConst-dis').hide()
                //         $('#lcda-dis').hide()
                //         $('#state-dis').show()
                //         $('#senatorialDist-dis').show()
                //         $('#party-dis').show()

                //     }
                //     else if(pos == 4)
                //     {
                //         $('#senatorialDist-dis').hide()
                //         $('#lcda-dis').hide()
                //         $('#state-dis').show()
                //         $('#federalConst-dis').show()
                //         $('#party-dis').show()

                //     }
                //     else if(pos == 5)
                //     {
                //         $('#federalConst-dis').hide()
                //         $('#senatorialDist-dis').hide()
                //         $('#state-dis').show()
                //         $('#lcda-dis').show()
                //         $('#party-dis').show()

                //     }
                //     else if(pos == 6)
                //     {
                //         $('#federalConst-dis').hide()
                //         $('#senatorialDist-dis').hide()
                //         $('#state-dis').show()
                //         $('#lcda-dis').show()
                //         $('#party-dis').show()
                //     }





                // });
        </script>
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
    </body>

</html>




