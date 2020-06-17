@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <div class="column is-6 is-offset-3">
        <h3 class="title has-text-white-bis"> Reset password </h3>
        <p class="subtitle has-text-white"> Sign up to use Pentos. </p>
        <div class="box">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
            <div class="field">
                 <div class="control has-icons-left has-icons-right is-large">
                     <input name="email" type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required" class="input  @error('email') is-danger  @enderror is-large" value="{{ old('email') }}"> 
                     <span class="icon is-left is-medium"><i class="fas fa-keyboard"></i></span> 
                     <span class="icon is-right has-text-danger is-medium">
                        <i class="mdi mdi-alert-circle mdi-36px"></i>
                    </span> 
                </div>
                     @error('email')
                     <p class="help is-danger">{{ $message }}</p>
                     @enderror
            </div>
           <button type="submit" class="button is-block is-primary is-large is-fullwidth"> Send password reset link </button>
        </form>
        </div>
    </div>
</div>
@endsection

