@extends('layouts.app')

@section('content')
<div class="container">


    <form method="POST" enctype="multipart/form-data" action="/img">
        @csrf
        <button type="submit" class="button has-background-grey-light is-medium is-rounded is-outlined" style="color:white">Edit</button>
        <input type="file" name="image" style="background-color:white;">
        
    </form>

    <div class="container">

    <div class="columns is-multiline">


        <div class="column is-6 is-offset-3 is-full"> 
               <center>
                <figure class="image is-96x96 is-rounded">
                    <img src="storage/{{ Auth::user()->avatar }}" style="clip-path: circle(45px at center)"/>
                </figure>
                <br>
                <button type="submit" class="button has-background-grey-light is-medium is-rounded is-outlined" style="color:white">Edit</button>  
            </center>
        </div>


        <div class="column is-half">

            <div class="box has-background-dark">

                    <div class="field">
                        <label class="label is-medium" style="color:white">E-mail</label>
                        <div class="control has-icons-left has-icons-right is-medium">
                            <input disabled style="color:white" name="email" type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required" class="input has-background-grey @error('email') is-danger  @enderror is-medium" value=" @auth {{  Auth::user()->email }} @endauth @guest {{ old('email') ?? ''}} @endguest">
                            <span class="icon is-left has-text-warning is-medium"><i class="fas fa-envelope-open"></i></span>
                            <span class="icon is-right has-text-danger is-medium">
                            <i class="mdi mdi-alert-circle mdi-36px"></i>
                        </span>
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

            </div>

        </div>
   

        <div class="column is-half">

          <div class="box has-background-dark">
                <div class="field">
                    <label class="label is-medium" style="color:white">Username</label>
                    <div class="control has-icons-left has-icons-right is-medium">
                        <input disabled style="color:white" value="{{  Auth::user()->name }}" name="name" type="text" autocomplete="on" placeholder="Your name" autofocus="autofocus" required="required" class="input has-background-grey @error('email') is-danger  @enderror is-medium">
                        <span class="icon is-left has-text-warning is-medium"><i class="fas fa-user-cog"></i></span>
                        <span class="icon is-right has-text-danger is-medium">
                           <i class="mdi mdi-alert-circle mdi-36px"></i>
                       </span>
                    </div>
                    @error('name')

                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
           
          </div>
       
        </div>

        <div class="column is-half">

            <div class="box has-background-dark">

                    <div class="field ">
                        <label class="label is-medium" style="color:white">Fullname</label>
                        <div class="control has-icons-left has-icons-right is-medium">
                            <input style="color:white" name="email" type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required" class="input has-background-grey @error('email') is-danger  @enderror is-medium" value=" @auth {{  Auth::user()->email }} @endauth @guest {{ old('email') ?? ''}} @endguest">
                            <span class="icon is-left has-text-warning is-medium"><i class="fas fa-user"></i></span>
                            <span class="icon is-right has-text-danger is-medium">
                            <i class="mdi mdi-alert-circle mdi-36px"></i>
                        </span>
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

            </div>

        </div>
   

        <div class="column is-half">

          <div class="box has-background-dark">
                <div class="field">
                    <label class="label is-medium" style="color:white">Phone</label>
                    <div class="control has-icons-left has-icons-right is-medium">
                        <input style="color:white" value="{{  Auth::user()->name }}" name="name" type="text" autocomplete="on" placeholder="Your name" autofocus="autofocus" required="required" class="input has-background-grey @error('email') is-danger  @enderror is-medium">
                        <span class="icon is-left has-text-warning is-medium"><i class="fas fa-mobile"></i></span>
                        <span class="icon is-right has-text-danger is-medium">
                           <i class="mdi mdi-alert-circle mdi-36px"></i>
                       </span>
                    </div>
                    @error('name')

                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
           
          </div>
       
        </div>

        <div class="column is-half">

            <div class="box has-background-dark">

                    <div class="field ">
                        <label class="label is-medium" style="color:white">Age</label>
                        <div class="control has-icons-left has-icons-right is-medium">
                            
                            <center>
                                <div class="select is-medium">
                                    <select style="background-color: grey;color:white;">
                                     @foreach (range(14,100) as $item)
                                         <option>{{$item}}</option>
                                     @endforeach
                                    </select>
                                    <span class="icon has-text-warning is-left is-medium">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                </div>
                                
                            </center>

                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

            </div>

        </div>
   

        <div class="column is-half">

          <div class="box has-background-dark">
                <div class="field">
                    <label class="label is-medium" style="color:white">Gender</label>
                    <div class="control has-icons-left has-icons-right is-medium">
                       
                        <center>
                        <div class="select is-medium">
                            <select style="background-color: grey;color:white;">
                            <option selected>Gender</option>
                            <option>Female</option>
                            <option>Male</option>
                            </select>
                            <span class="icon has-text-warning is-left is-medium">
                                <i class="fas fa-venus-mars"></i>
                            </span>
                        </div>
                        </center>

                    </div>
                    @error('name')

                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
           
          </div>
       
        </div>

        <div class="column is-half">

            <div class="box has-background-dark">

                    <div class="field ">
                        <label class="label is-medium" style="color:white">Country</label>
                        <div class="control has-icons-left has-icons-right is-medium">
                            
                            <center>
                                <div class="select is-medium">
                                    <select  style="background-color: grey;color:white;" onchange="window.open('profile?c='+this.value,'_self')">
                                     @foreach ($cs as $item)
                                         <option>{{$item['name']}}</option>
                                     @endforeach
                                    </select>
                                    <span class="icon has-text-warning is-left is-medium">
                                        <i class="fas fa-globe"></i>
                                    </span>
                                </div>
                                
                            </center>

                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

            </div>

        </div>
   

        <div class="column is-half">

          <div class="box has-background-dark">
                <div class="field">
                    <label class="label is-medium" style="color:white">City</label>
                    <div class="control has-icons-left has-icons-right is-medium">
                       
                        <center>
                            <div class="select is-medium">
                                <select style="background-color: grey;color:white;">
                                 @foreach ($cities as $item)
                                     <option>{{$item['name']}}</option>
                                 @endforeach
                                </select>
                                <span class="icon has-text-warning is-left is-medium">
                                    <i class="fas fa-city"></i>
                                </span>
                            </div>
                            
                        </center>

                    </div>
                    @error('name')

                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
           
          </div>
       
        </div>

   </div>

    </div>
   
</div>

@endsection