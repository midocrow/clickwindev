@extends('layouts.app') @section('content')
<section class="">
    <div class="">

        <div class="container has-text-centered">


            <div class="box has-background-black"  style="margin-top:-30px;border-radius:50px;">

                <div class="columns">

                    <div class="column is-half is-hidden-mobile">
                        <figure class="image is-148x148">
                            <img src="/storage/undraw_my_password.svg"  style="padding:50px;" />
                        </figure>
                    </div>


                    <div class="column is-half">

                        <div class="column is-10 is-offset-1">
                            <br> <br>
                            <br><br>
                            <h3 class="title has-text-white-bis"> Reset password  </h3><br>
                            <div class="">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf


                                    <div class="field">
                                        <div class="control has-icons-left has-icons-right is-medium">
                                            <input id="text-field-sign-design" name="email" type="email" autocomplete="on" placeholder="Your email" autofocus="autofocus" required="required" class="input @error( 'email') is-danger @enderror is-medium" value="{{ old( 'email') }}">
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
                                    
                                    <button type="submit" style="color:black;font-family: bitter;" class="button is-rounded is-warning is-block is-medium is-fullwidth"> <p>Send password reset link<p> </button>
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