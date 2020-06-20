@extends('layouts.app') @section('content')
<section class="">
    <div class="">

        <div class="container has-text-centered">

            @if (session('success'))              
                <article id="xx" class="message is-warning">
                    <div class="message-header">
                      <p>Sign up confirmation</p>
                      <button class="delete" onClick="document.getElementById('xx').style.display = 'none'"aria-label="delete"></button>
                    </div>
                    <div class="message-body">
                       <span style="color:black;">  {{ session('success') }} 
                       </span>
                    </div>
                  </article>
            @endif

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
                                <form method="POST" action="{{ route('changePassword') }}">
                                    @csrf


                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="ps0" name="current-password" type="password" style="box-shadow: none;" autocomplete="on" placeholder="Current password" value="{{ $email ?? old('email') }}" autofocus="autofocus" required="required" class="input text-field-sign-design @error( 'email') is-danger @enderror is-medium" value="{{ old( 'email') }}">                                  
                                            <span class="icon is-left is-medium"><i class="fas fa-lock" style="color:#FFD419;"></i></span>
                                         

                                            <a style="pointer-events: initial;" onclick="function hi(){if(document.getElementById('ps0').type == 'password'){ document.getElementById('ps0').type = 'text'; document.getElementById('icon0').classList.toggle('fa-eye-slash'); }else{ document.getElementById('ps0').type = 'password'; document.getElementById('icon0').classList.toggle('fa-eye'); }  } hi(); return false;" class="icon is-right is-large is-active" >
                                                <i id="icon0" class="fas fa-eye" style="margin-bottom: 20%;"></i>
                                              </a>

                                        </div>
                          

                                        @if (session('error'))
                           
                            <p class="help is-danger"> {{ session('error') }}</p>

                    @endif
        

                                    </div>

                                  

                                        <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="ps" onkeyup="myFunction()" style="box-shadow: none;" name="new-password" type="password" autocomplete="on" placeholder="New password"  autofocus="autofocus" required="required" class="input text-field-sign-design  @error( 'password') is-danger @enderror is-medium" value="{{ old( 'password') }}">                                  
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

