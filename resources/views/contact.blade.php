@extends('layouts.app')

@section('content')
    <div class="container has-text-centered">
        <div class="column is-6 is-offset-3">

            @if (session('sent') ?? '')
                <article class="message is-dark">
                    <div class="message-header">
                        <p>Message sent</p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                    <div class="message-body">
                        Your massage was sent succesfully, we'll get back to you soon, enjoy!
                    </div>
                </article>

            @endif

            <h3 class="title" style="color:#ffd419"> Contact Us</h3>
            <div class="box has-background-dark">
                <form method="POST" action="/sendContactMail">
                    @csrf


                    <div class="field">
                        <label class="label is-large" style="color:white;text-align:left;">@auth Username @endauth @guest
                        Name @endguest</label>
                    <div class="control has-icons-left has-icons-right is-large">
                        <input placeholder="Your name" @auth disabled @endauth
                            style="background-color: grey;color:white;" type="email" name="name" autocomplete="on"
                            autofocus="autofocus" required="required"
                            class="input  @error('email') is-danger  @enderror is-medium"
                            value=" @auth {{ Auth::user()->name }} @endauth @guest {{ old('name') ?? '' }} @endguest">
                        <span class="icon is-left is-medium has-text-warning"><i
                                class="fas fa-user @auth fa-user-cog @endauth"></i></span>
                        <span class="icon is-right has-text-danger is-medium">
                            <i class="mdi mdi-alert-circle mdi-36px"></i>
                        </span>
                    </div>
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="field">
                    <label class="label is-large" style="color:white;text-align:left;">Email</label>
                    <div class="control has-icons-left has-icons-right is-large">
                        <input @auth disabled @endauth style="background-color: grey;color:white;" name="email"
                            type="email" autocomplete="on" placeholder="Your Email" autofocus="autofocus"
                            required="required" class="input  @error('email') is-danger  @enderror is-medium"
                            value=" @auth {{ Auth::user()->email }} @endauth @guest {{ old('email') ?? '' }} @endguest">
                        <span class="icon is-left is-medium has-text-warning"><i
                                class="fas fa-envelope-open"></i></span>
                        <span class="icon is-right has-text-danger is-medium">
                            <i class="mdi mdi-alert-circle mdi-36px"></i>
                        </span>
                    </div>
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="field">
                    <label class="label is-large" style="color:white;text-align:left;">Subject</label>
                    <div class="control has-icons-left has-icons-right is-large">
                        <input style="background-color: grey;color:white;" name="" type="text" autocomplete="on"
                            placeholder="Enter your subject..." autofocus="autofocus" required="required"
                            class="input  @error('email') is-danger  @enderror is-large">
                        <span class="icon is-left is-medium has-text-warning"><i class="fas fa-keyboard"></i></span>
                        <span class="icon is-right has-text-danger is-medium">
                            <i class="mdi mdi-alert-circle mdi-36px"></i>
                        </span>
                    </div>
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label is-large" style="color:white;text-align:left;">Message</label>
                    <div class="control is-large">
                        <textarea style="background-color: grey;color:white;font-size:18px" id="message" name="message"
                            class="textarea"
                            placeholder="You can ask us anything you want, we'll get back to you soon by email..."></textarea>
                    </div>
                    @error('message')


                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" style="color:black;font-family: bitter;"
                    class="button is-block is-warning is-large is-fullwidth">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
