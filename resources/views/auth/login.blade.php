<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login Admin</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                <div class="row">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                        <div class="card col-lg-4 mx-auto">
                            <div class="card-body px-5 py-5">
                             
                                <h3 class="card-title text-left mb-3">Login</h3>
                                <form method="POST">
                                    @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                    @endforeach
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>Username or email *</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control p_input">
                                    </div>
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" name="password" value="" class="form-control p_input">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                    </div>
                                    <div class="d-flex">

                                        <button class="btn btn-facebook mr-2 col">
                                            <i class="mdi mdi-facebook"></i> Facebook
                                        </button>
                                        <button class="btn btn-google col">
                                            <i class="mdi mdi-google-plus"></i> Google plus
                                        </button>
                                    </div>
                                    {{-- <p class="sign-up">Don't have an Account?<a href="/auth/register"> Sign Up</a></p>
                                    <p class="sign-up">Existing user?<a href="/auth/register/reg"> Sign Up</a></p> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/off-canvas.js"></script>
        <script src="/js/misc.js"></script>
        <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
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
