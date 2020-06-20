@extends('layouts.app') @section('content')
<section class="">
    <div class="">

        <div class="container has-text-centered">


            <div class="box has-background-black"  style="margin-top:-35px;border-radius:50px;">

                <div class="columns">

                    <div class="column is-half is-hidden-mobile">
                        <figure class="image is-148x148">
                            <img src="/storage/undraw_my_password.svg"  style="padding:50px;" />
                        </figure>
                    </div>


                    <div class="column is-half">

                        <div class="column is-10 is-offset-1">
                            <br> <br>
                            <br>
                            <h3 class="title has-text-white-bis"> Change password  </h3><br>
                            <div class="">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value={{ $token }}>

                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input readonly id="text-field-sign-design" name="email" type="email" autocomplete="on" placeholder="Your email" value="{{ $email ?? old('email') }}" autofocus="autofocus" required="required" class="input is-static @error( 'email') is-danger @enderror is-medium" value="{{ old( 'email') }}">                                  
                                            <span class="icon is-left is-medium"><i class="fas fa-envelope-open" style="color:#FFD419;"></i></span>
                                            <span class="icon is-right has-text-danger is-medium">
                                    <i class="mdi mdi-alert-circle mdi-36px"></i>
                                </span>
                                        </div>
                                        @error('email')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                  

                                        <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="ps" onkeyup="myFunction()" style="box-shadow: none;" name="password" type="password" autocomplete="on" placeholder="New password"  autofocus="autofocus" required="required" class="input text-field-sign-design  @error( 'password') is-danger @enderror is-medium" value="{{ old( 'password') }}">                                  
                                            <span class="icon is-left is-medium"><i class="fas fa-lock" style="color:#FFD419;"></i></span>
                                              

                                <a style="pointer-events: initial;" onclick="function hi(){if(document.getElementById('ps').type == 'password'){ document.getElementById('ps').type = 'text'; document.getElementById('icon').classList.toggle('fa-eye-slash'); }else{ document.getElementById('ps').type = 'password'; document.getElementById('icon').classList.toggle('fa-eye'); }  } hi(); return false;" class="icon is-right is-large is-active" >
                                    <i id="icon" class="fas fa-eye" style="margin-bottom: 20%;"></i>
                                  </a>

                                  
                                        </div>
                                        @error('password')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="ps2" onkeyup="myFunction2()" style="box-shadow: none;" type="password" name="password_confirmation" autocomplete="on" placeholder="Confirm new password"  autofocus="autofocus" required="required" class="input text-field-sign-design @error( 'password') is-danger @enderror is-medium" value="{{ old( 'password') }}">                                  
                                            <span class="icon is-left is-medium"><i class="fas fa-lock" style="color:#FFD419;"></i></span>
                                     
                                            
                                <a style="pointer-events: initial;" onclick="function hi(){if(document.getElementById('ps2').type == 'password'){ document.getElementById('ps2').type = 'text'; document.getElementById('icon2').classList.toggle('fa-eye-slash'); }else{ document.getElementById('ps2').type = 'password'; document.getElementById('icon2').classList.toggle('fa-eye'); }  } hi(); return false;" class="icon is-right is-large is-active" >
                                    <i id="icon2" class="fas fa-eye" style="margin-bottom: 20%;"></i>
                                  </a>

                                    
<br>                       <br>         
                                    <button type="submit" style="color:black;font-family: bitter;" class="button is-rounded is-warning is-block is-medium is-fullwidth"> <p>{{ __('Change password') }}<p> </button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection


<!--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token ?? '' }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
-->