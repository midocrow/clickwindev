@extends('layouts.app')

@section('content')
<div class="container has-text-centered ">
    <div class="column is-6 is-offset-3">

        <h3 style="color:#ffd419" class="title is-warning">Change password</h3>
        <br>
        <div class="box  has-background-black">
            <form method="POST" action="/changepassword">
                @csrf
            <div class="field">
                 <div class="control has-icons-left has-icons-right is-large">
                     <input style="background-color: grey;color:white;" name="email" type="email" autocomplete="on" placeholder="Current password" autofocus="autofocus" required="required" class="input  @error('email') is-danger  @enderror is-large"> 
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
                    <input style="background-color: grey;color:white;" name="name" type="text" autocomplete="on" placeholder="New password" autofocus="autofocus" required="required" class="input @error('email') is-danger  @enderror is-large" > 
                    <span class="icon is-left is-medium"><i class="fas fa-key"></i></span> 
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
                <input style="background-color: grey;color:white;" name="name" type="text" autocomplete="on" placeholder="Confirm new password" autofocus="autofocus" required="required" class="input @error('email') is-danger  @enderror is-large" > 
                <span class="icon is-left is-medium"><i class="fas fa-key"></i></span> 
                <span class="icon is-right has-text-danger is-medium">
                   <i class="mdi mdi-alert-circle mdi-36px"></i>
               </span> 
            </div>
     
          </div>
       </div>
           <button type="submit" style="color:black" class="button is-warning is-large is-fullwidth"> Change </button>
        </form>
        </div>
    </div>
</div>
@endsection
