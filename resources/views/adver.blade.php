@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <store></store>-->
        <h3 style="color:#ffd419" class="title is-warning">Request advertising</h3>

        <div class="box has-background-dark" style="margin-right:50px;">
            <p style="color: white;text-shadow:0px 0px 0px white;font-family:Arial, Helvetica, sans-serif;">
                @auth
                    You have an online business (Youtube channel, Instagram page, Facebook page, Application,
                    Website,…) this area will make it so big with too much visitors. Take advantage from our best offers
                    and be a part of our <span style="color:#f9c963;"> VIP
                        community</span> .
                    Your ad will be posted by our team work in VIP Zone without <br>pop-ups with direct access and will gain
                    a lot of visitors.
                @endauth
                @guest Take advantage from our best offers and be a part of our <span style="color:#f9c963;"> VIP
                        community</span>
                    .Your link will be posted by our team work in VIP Zone without ads or pop-ups with direct access and with a
                lot of visitors.@endguest
            </p>
        </div>

        <div class="pricing-table">

            <div class="pricing-plan is-active is-danger" style="margin-right:50px;">
                <div class="plan-header" style="color:white">7 Days</div>
                <div class="plan-price">
                    <span class="plan-price-amount" style="color: #f9c963">
                        <span class="plan-price-currency"></span>
                        10</span>
                    <div style="color:grey;display:inline-block;font-size:25px;">$</div>
                </div>
                <div class="plan-items">
                    <div class="plan-item">7 days in VIP Zone
                    </div>

                    <div class="plan-item">Big trafic network
                    </div>

                    <div class="plan-item">
                        Improving your online business
                    </div>
                    <div class="plan-item">Personalized ads</div>
                </div>
                <div class="plan-footer" style="background-color: black">
                    <button onClick="window.plan=10;document.getElementById('modal').classList.toggle('is-active')"
                        class="button is-fullwidth" style="background-color: #f9c963;color:black;">Choose</button>
                </div>
            </div>

            <div class="pricing-plan is-active is-danger" style="margin-right:50px;">
                <div class="plan-header" style="color:white">15 Days</div>
                <div class="plan-price">
                    <span class="plan-price-amount" style="color: #f9c963">
                        <span class="plan-price-currency"></span>
                        15</span>
                    <div style="color:grey;display:inline-block;font-size:25px;">$</div>
                </div>
                <div class="plan-items">
                    <div class="plan-item">15 days in VIP Zone
                    </div>

                    <div class="plan-item">Big trafic network
                    </div>

                    <div class="plan-item">
                        Improving your online business
                    </div>
                    <div class="plan-item">Personalized ads</div>
                </div>
                <div class="plan-footer" style="background-color: black">
                    <button onClick="window.plan=10;document.getElementById('modal').classList.toggle('is-active')"
                        class="button is-fullwidth" style="background-color: #f9c963;color:black;">Choose</button>
                </div>
            </div>

            <div class="pricing-plan is-active is-danger" style="margin-right:50px;">
                <div class="plan-header" style="color:white">30 Days</div>
                <div class="plan-price">
                    <span class="plan-price-amount" style="color: #f9c963">
                        <span class="plan-price-currency"></span>
                        20</span>
                    <div style="color:grey;display:inline-block;font-size:25px;">$</div>
                </div>
                <div class="plan-items">
                    <div class="plan-item">30 days in VIP Zone
                    </div>

                    <div class="plan-item">Big trafic network

                    </div>

                    <div class="plan-item">
                        Improving your online business
                    </div>
                    <div class="plan-item">Personalized ads</div>
                </div>
                <div class="plan-footer" style="background-color: black">
                    <button onClick="window.plan=10;document.getElementById('modal').classList.toggle('is-active')"
                        class="button is-fullwidth" style="background-color: #f9c963;color:black;">Choose</button>
                </div>


            </div>
            <br><br>
            <article class="message is-danger">

                <div class="message-header">
                    <p>Keep in mind</p>
                </div>
                <div class="message-body"
                    style="text-align: start;
                                                                                                                            text-shadow: 0px 0px 0px rgba(17, 17, 17, 0.72);
                                                                                                                            color: black;">
                    <div class="columns">
                        <div class="column is-three-quarters">
                            <p id="war" align="justify" style="font-size:12px;">
                                - If you wish to add another subscription and your first subscription has not expired, there
                                is
                                no problem. Your new subscription will be added to the old one which is close to be expired.
                                <br><br>- It is recommended to take a new subscription before the end of the old one so that
                                your account is not transferred to normal zone after the end of the subscription.
                                <br> <br>- All the feedbacks, subscriptions and payments request or payments release will be
                                received in your email that you have communicated to our team.
                            </p>
                            <p id="more"
                                style="margin-left: 60%;
                                                                                                                                        margin-top: 2%;color:red;">
                                <a href="#">Read
                                    more</a>
                            </p>
                        </div>
                        <div class="column is-hidden-touch">
                            <img id="img" style="margin-top: 26%;margin-left: 26%" src="/storage/warning-sign.png"
                                width="85px" />
                        </div>
                    </div>
                </div>
            </article>

            <div class="modal" id="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head" style="background-color: black">
                        <p class="modal-card-title" style="color:#ffd419;text-shadow:0px 0px 0px white;">Complete your
                            subscription</p>
                        <button onClick="document.getElementById('modal').classList.toggle('is-active')" class="delete"
                            aria-label="close"></button>
                    </header>
                    <section class="modal-card-body" style="background-color: black">
                        <!-- Content ... -->
                        <form method="POST" action="/sendContactMail">
                            @csrf



                            <div class="field">
                                <label class="label is-medium" style="color:white;text-align:left;">Offer</label>
                                <div class="control has-icons-left has-icons-right is-medium">

                                    <div class="select is-medium is-fullwidth">
                                        <select style="background-color: grey;color:white;">
                                            <option>7 Days / 10$</option>
                                            <option>15 Days / 15$</option>
                                            <option>30 Days / 20$</option>
                                        </select>
                                        <span class="icon has-text-warning is-left is-medium">
                                            <i class="fas fa-box-open"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label is-large" style="color:white;text-align:left;">Business name</label>
                                <div class="control has-icons-left has-icons-right is-large">
                                    <input style="background-color: grey;color:white;" name="email" type="email"
                                        autocomplete="on" placeholder="Your business name" autofocus="autofocus"
                                        required="required" class="input  @error('email') is-danger  @enderror is-medium"
                                        value=" @auth {{ Auth::user()->name }} @endauth @guest {{ old('email') ?? '' }} @endguest">
                                    <span class="icon is-left is-medium has-text-warning"><i
                                            class="fas fa-user-tie"></i></span>
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
                                        <select style="background-color: grey;color:white;">
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

                                <br>
                                <label class="checkbox">
                                    <input type="checkbox">
                                    I agree to the <a href="#" style="color:white;text-decoration: underline">terms and
                                        conditions</a>
                                </label>
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
