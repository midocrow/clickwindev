@extends('layouts.app')


@section('content')
    <div class="container">
        <h3 style="color:#ffd419" class="title is-warning">Advertising</h3>
        <br>

        <div class="box has-background-dark">
            <p style="color: white;text-shadow:0px 0px 0px white;" align="justify">
                You have an online business (Youtube channel, Instagram page, Facebook page, Application, Website,…) this
                area will make it so big with too much visitors.<br><br>
                In the First option, you have to fill an information form by clicking on « <span style="color:#ffd419;">Make
                    Advertising for us</span> » button to send it to our team for verification and you have to make
                after Feedback an advertising for our Website in your Social Media with some benefits in return. <br><br>
                In the Second one, it’s the same thing but the difference is that we make for your online business after
                positif Feedback (your link is allowed for access and without
                inappropriate content) an advertising in our Website, what you have to do it's to choose one of the
                available offers that will be viewed when you click on « <span style="color:#ffd419;">Request Advertising
                    from us</span> »
                button + offer subscription and we will do the hard part.
            </p>
            <br>
            <div class="columns is-centered">
                <div class="column">
                    <a onClick="document.getElementById('modal').classList.toggle('is-active')"
                        class="button is-large is-fullwidth is-warning">Make advertising for us</a>
                </div>
                <div class="column">
                    <a class="button is-large is-fullwidth is-warning" href="/adver">Request advertising from us</a>
                </div>
            </div>

        </div>



        <div id="modal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head" style="background-color: black">
                    <p class="modal-card-title" style="color:#ffd419;text-shadow:0px 0px 0px white;">Make advertising</p>
                    <button onClick="document.getElementById('modal').classList.toggle('is-active')" class="delete"
                        aria-label="close"></button>
                </header>
                <section class="modal-card-body" style="background-color: black">
                    <!-- Content ... -->
                    <form method="POST" action="/sendContactMail">
                        @csrf

                        <div class="field">
                            <label class="label is-large" style="color:white;text-align:left;">Business name</label>
                            <div class="control has-icons-left has-icons-right is-large">
                                <input style="background-color: grey;color:white;" name="email" type="email"
                                    autocomplete="on" placeholder="Your business name" autofocus="autofocus"
                                    required="required" class="input  @error('email') is-danger  @enderror is-medium"
                                    value=" @auth {{ Auth::user()->name }} @endauth @guest {{ old('email') ?? '' }} @endguest">
                                <span class="icon is-left is-medium has-text-warning"><i class="fas fa-user-tie"></i></span>
                                <span class="icon is-right has-text-danger is-medium">
                                    <i class="mdi mdi-alert-circle mdi-36px"></i>
                                </span>
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label is-large" style="color:white;text-align:left;">Email</label>
                            <div class="control has-icons-left has-icons-right is-large">
                                <input style="background-color: grey;color:white;" name="email" type="email"
                                    autocomplete="on" placeholder="Your Email" autofocus="autofocus" required="required"
                                    class="input  @error('email') is-danger  @enderror is-large"
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

                        <div class="field ">
                            <label class="label is-medium" style="color:white;text-align:left;">Online business</label>
                            <div class="control has-icons-left has-icons-right is-medium">

                                <div class="select is-medium is-fullwidth">
                                    <select style="background-color: grey;color:white;"
                                        onchange="window.open('profile?c='+this.value,'_self')">
                                        <option>Youtube channel</option>
                                        <option>Instagram page</option>
                                        <option>Facebook page</option>
                                    </select>
                                    <span class="icon has-text-warning is-left is-medium">
                                        <i class="fas fa-laptop"></i>
                                    </span>
                                </div>
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="field ">
                            <label class="label is-medium" style="color:white;text-align:left;">Subscriber</label>
                            <div class="control has-icons-left has-icons-right is-medium">

                                <div class="select is-medium is-fullwidth">
                                    <select style="background-color: grey;color:white;"
                                        onchange="window.open('profile?c='+this.value,'_self')">
                                        <option>+10 000</option>
                                        <option>+50 000</option>
                                        <option>+100 000</option>
                                        <option>+500 000</option>
                                    </select>
                                    <span class="icon has-text-warning is-left is-medium">
                                        <i class="fas fa-users"></i>
                                    </span>
                                </div>
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label is-large" style="color:white;text-align:left;">Link</label>
                            <div class="control has-icons-left has-icons-right is-large">
                                <input style="background-color: grey;color:white;" name="email" type="email"
                                    autocomplete="on" placeholder="Your page link..." autofocus="autofocus"
                                    required="required" class="input  @error('email') is-danger  @enderror is-large">
                                <span class="icon is-left is-medium has-text-warning"><i class="fas fa-link"></i></span>
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
                                <textarea style="background-color: grey;color:white;font-size:18px" id="message"
                                    name="message" class="textarea"
                                    placeholder="You can ask us anything you want, we'll get back to you soon by email..."></textarea>
                            </div>
                            @error('message')


                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </form>
                    <!-- End Content ... -->


                </section>
                <footer class="modal-card-foot" style="background-color: black">
                    <button class="button is-warning">Send</button>
                    <button onClick="document.getElementById('modal').classList.toggle('is-active')"
                        class="button is-grey">Cancel</button>
                </footer>
            </div>
        </div>

    </div>
@endsection
