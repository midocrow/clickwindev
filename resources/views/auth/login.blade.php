@extends('layouts.app') @section('content')
<section class="">
    <div class="">

        <div class="container has-text-centered">

    @if (Request::has('success'))
      <article id="xx" class="message is-warning">
         <div class="message-header">
           <p>Sign up confirmation</p>
           <button class="delete" onClick="document.getElementById('xx').style.display = 'none'"aria-label="delete"></button>
         </div>
         <div class="message-body">
            <span style="color:black;">Your account was created successfully and a confirmation email has been sent to your inbox. 

            </span>
         </div>
       </article>
          
      @endif

            <div class="box has-background-black" id="wave" style="height:100%;width:100%;border-radius:50px;">

                <div class="columns">

                    <div class="column is-half is-hidden-mobile">
                        <figure class=" image is-148x148">
                            <img src="/storage/undraw_secure.svg" style="padding:50px;" />
                        </figure>
                    </div>


                    <div class="column is-half">

                        <div class="column is-10 is-offset-1">
                            <br> 
                            <br>
                            <h3 class="title has-text-white-bis"> Log in </h3>
                            <div class="">
                                <form method="POST" action="{{ route( 'login') }}">
                                    @csrf
                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input onkeypress="return event.charCode != 32" id="text-field-sign-design" name="email" type="email" autocomplete="on" placeholder="Your email" autofocus="autofocus" required="required" class="input @error( 'email') is-danger @enderror is-medium" value="{{ old( 'email') }}">
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
                                            <input id="ps"  style="box-shadow: none;"  name="password" type="password" autocomplete="on" placeholder="Your password" autofocus="autofocus" required="required" class="input text-field-sign-design @error( 'email') is-danger
                                @enderror is-medium">
                                            <span class="icon is-left is-medium"><i class="fas fa-lock" style="color:#FFD419;"></i></span>
                                    
                                            <a style="pointer-events: initial;" onclick="function hi(){if(document.getElementById('ps').type == 'password'){ document.getElementById('ps').type = 'text'; document.getElementById('icon').classList.toggle('fa-eye-slash'); }else{ document.getElementById('ps').type = 'password'; document.getElementById('icon').classList.toggle('fa-eye'); }  } hi(); return false;" class="icon is-right is-large is-active" >
                                                <i id="icon" class="fas fa-eye" style="margin-bottom: 20%;"></i>
                                              </a>

                                        </div>
                                        @error('password')

                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <br>
                                    <button type="submit" style="color:black;font-family: bitter;" class="button is-rounded is-warning is-block is-medium is-fullwidth"> <p>Login<p> </button>
                                </form>
                            </div><br><br>
                            <a id="sign-button" href="{{route( 'password.request') }}">Forgot Password ?</a> </p>
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
        <h3 class="title has-text-white-bis"> Log in </h3>
        <p class="subtitle has-text-white"> Sign up to use ClickWin. </p>
        <div class="box">
            <form method="POST" action="{{ route( 'login') }}">
                @csrf
            <div class="field">
                 <div class="control has-icons-left has-icons-right is-large">
                     <input name="email" type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required" class="input @error( 'email') is-danger @enderror is-large" value="{{ old( 'email') }}"> 
                     <span class="icon is-left is-medium"><i class="fas fa-keyboard"></i></span> 
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
                    <input name="password" type="password" autocomplete="on" placeholder="Your password" autofocus="autofocus" required="required" class="input @error( 'email') is-danger @enderror is-large" > 
                    <span class="icon is-left is-medium"><i class="fas fa-key"></i></span> 
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
        <p class="has-text-blue"><a href="/register">Sign Up</a> · <a href="{{route( 'password.request') }}">Forgot Password</a> · </p>
    </div>
</div>
-->