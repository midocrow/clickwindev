@extends('layouts.app')

@section('content')
<section class="">
    <div class="">


        <div class="container has-text-centered">

            <div class="box has-background-black" id="wave" style="border-radius:50px;">

                <div class="columns">

                    <div class="column is-half is-hidden-mobile">
                        <figure class="image is-148x148">
                            <img src="/storage/undraw_press_plap.svg" style="padding:50px;" />
                        </figure>
                    </div>


                    <div class="column is-half">

                        <div class="column is-10 is-offset-2">
                            <br> <br>
                            <br>
                            <h3 class="title has-text-white-bis"> Sign up </h3>
                            <div class="">
                                <form method="POST" action="{{ route( 'register') }}">
                                    @csrf

                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="text-field-sign-design" name="name" type="text"  minlength="8" maxlength="20" autocomplete="on" placeholder="Username" autofocus="autofocus" required="required" class="input @error( 'name') is-danger @enderror is-medium" value="{{ old( 'name') }}">
                                            <span class="icon is-left is-medium"><i class="fas fa-user" style="color:#FFD419;"></i></span>
                                            <span class="icon is-right has-text-danger is-medium">
                                    <i class="mdi mdi-alert-circle mdi-36px"></i>
                                </span>
                                        </div>
                                        @error('name')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="text-field-sign-design" name="email" type="email" autocomplete="on" placeholder="Email" autofocus="autofocus" required="required" class="input @error( 'email') is-danger @enderror is-medium" value="{{ old( 'email') }}">
                                            <span class="icon is-left is-medium"><i class="fas fa-envelope-open" style="color:#FFD419;"></i></span>
                                            <span class="icon is-right has-text-danger is-medium">
                                    <i class="mdi mdi-alert-circle mdi-36px"></i>
                                </span>
                                        </div>
                                        @error('email')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                        
                                    <br>
                                    <button type="submit" style="color:black;font-family: bitter;" class="button is-rounded is-warning is-block is-medium is-fullwidth"> <p>Sign up<p> </button>
                                </form>
                            </div><br><br>
                            <a id="sign-button" href="{{route( 'login') }}">Already have an account</a> </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

@endsection

<!--
<div class="container has-text-centered">
    <div class="column is-6 is-offset-3">
        <h3 class="title has-text-white-bis"> Sign Up </h3>
        <p class="subtitle has-text-white"> Sign up to use ClickWin. </p>
        <div class="box">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <div class="control has-icons-left has-icons-right is-large">
                        <input name="name" type="text" autocomplete="on" placeholder="Your name" autofocus="autofocus" required="required" class="input  @error('name') is-danger  @enderror is-large" value="{{ old('name') }}"> 
                        <span class="icon is-left is-medium"><i class="fas fa-keyboard"></i></span> 
                        <span class="icon is-right has-text-danger is-medium">
                           <i class="mdi mdi-alert-circle mdi-36px"></i>
                       </span> 
                   </div>
                        @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
               </div>
            <div class="field">
                 <div class="control has-icons-left has-icons-right is-large">
                     <input name="email" type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required" class="input  @error('email') is-danger  @enderror is-large" value="{{ old('email') }}"> 
                     <span class="icon is-left is-medium"><i class="fas fa-at"></i></span> 
                     <span class="icon is-right has-text-danger is-medium">
                        <i class="mdi mdi-alert-circle mdi-36px"></i>
                    </span> 
                </div>
                     @error('email')
                     <p class="help is-danger">{{ $message }}</p>
                     @enderror
            </div>
            <div class="field">
                <div class="control has-icons-left has-icons-right is-large">
                    <input id="password" name="password" type="password" autocomplete="on" placeholder="Your password" autofocus="autofocus" required="required" class="input @error('email') is-danger  @enderror is-large" > 
                    <span class="icon is-left is-medium"><i class="fas fa-unlock"></i></span> 
                    <span class="icon is-right has-text-danger is-medium">
                       <i class="mdi mdi-alert-circle mdi-36px"></i>
                   </span> 
               </div>
               @error('password')
               <p class="help is-danger">{{ $message }}</p>
               @enderror
           </div>
           <button type="submit" class="button is-block is-primary is-large is-fullwidth"> Login </button>
        </form>
        </div>
        <p class="has-text-blue"><a href="/login">Log in</a> · <a href="{{route('password.request') }}">Forgot Password</a> · </p>
    </div>
</div>
<!--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
