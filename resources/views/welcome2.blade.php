@extends('layouts.ap')
@section('content')
    <div class="home" style="background-image: linear-gradient(160deg, rgba(0,0,0,1) 0%, rgba(255,212,25,1) 100%);">
        <section id="home" class="hero is-large">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-vcentered">
                        <div class="column is-6">

                            <center>
                                <figure class="image is-rounded is-96x96">
                                    <img src="/storage/logo.png" class="is-rounded" />
                                </figure>
                                <div aligned="center">
                                    <h1 style="font-family: calibri;letter-spacing: 8px;"
                                        class="is-size-5 is-black is-size-4-mobile has-text-white has-font-weight-bold">
                                        {{ __('YOUR PATH TO', [], Session::get('locale')) }}
                                    </h1>
                                    <div class="aos-animate" data-aos="fade-down">
                                        <h1 style="font-family: calibri;font-size:80px;margin-top:-30px;"
                                            class=" has-text-light has-font-weight-bold">
                                            {{ __('SUCCESS', [], Session::get('locale')) }}</h1>
                                    </div>
                                    <br>
                                </div>


                                <div data-aos="fade-in">
                                    <div class="links"> <a href="/login"
                                            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                            class="button is-warning is-medium">
                                            {{ __('Join ClickWin now', [], Session::get('locale')) }}
                                        </a></div>
                                </div>
                            </center>
                        </div>
                        <div class="column is-5 has-text-centered">
                            <figure class="image">
                                <video id="video" src="/storage/cw-intro.mp4x" controls></video>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="hero has-background-white-terrrr">
            <div class="hero-body">

                <div class="content-wrapper">


                    <div class="columns is-vcentered has-padding-top-50 has-padding-bottom-50">
                        <div class="column is-10 is-offset-1 columns has-background-whiterr features-box is-hidden-mobile">
                            <div class="column is-5 is-offset-1">

                                <figure class="image ">
                                    <img src="storage/undraw_performance.svg"
                                        alt="get analytics and optimize your  performance">
                                </figure>
                            </div>
                            <div class="column is-4 is-offset-1 has-margin-top-auto has-margin-bottom-auto">

                                <h1 justify="center" style="margin-top:4%;"
                                    class="is-size-2 is-size-4-mobile has-text-light has-font-weight-bold">
                                    Normal User ? Easy money <br>
                                    Adver User ? More visitors.
                                </h1><br>
                                <div data-aos="fade-in">

                                    <div class="links"> <a href="/login"
                                            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                            class="button is-warning is-medium">
                                            Discover more
                                        </a></div>
                                </div>

                            </div>
                        </div>

                        <div class="column features-box has-background-whiterr columns is-hidden-tablet is-hidden-desktop ">

                            <div class="column is-4 is-offset-1 has-margin-top-auto has-margin-bottom-auto">

                                <h1 justify="center" style="margin-top:4%;"
                                    class="is-size-2 is-size-4-mobile has-text-light has-font-weight-bold">
                                    Normal User ? Easy money <br>
                                    Adver User ? More visitors.
                                </h1><br>
                                <div data-aos="fade-in">

                                    <div class="links"> <a href="/login"
                                            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                            class="button is-warning is-medium">
                                            Discover more
                                        </a></div>
                                </div>

                            </div>
                            <div class="column is-5 is-offset-1">

                                <figure class="image ">
                                    <img src="storage/undraw_performance.svg"
                                        alt="get analytics and optimize your  performance">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <div class="columns is-vcentered has-padding-top-50 has-padding-bottom-50 ">
                        <div class="column features-box has-background-whiterr columns is-hidden-tablet is-hidden-desktop">

                            <div class="column is-4 is-offset-1 has-margin-top-auto has-margin-bottom-auto">

                                <h1 style="margin-top:10%;"
                                    class="is-size-2 is-size-4-mobile has-text-light has-font-weight-bold">
                                    Click, Copy, Paste <br>& Earn easy money.
                                </h1><br>
                                <div data-aos="fade-in">

                                    <div class="links"> <a href="/login"
                                            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                            class="button is-warning is-medium">
                                            How it works ?
                                        </a></div>
                                </div>

                            </div>
                            <div class="column is-5 is-offset-1">

                                <figure class="image ">
                                    <img src="/storage/undraw_pitching.svg" alt="Analyze any profile with tiktok analytics">
                                </figure>
                            </div>
                        </div>

                        <div class="column is-10 is-offset-1 columns has-background-whiterr features-box is-hidden-mobile ">

                            <div class="column is-4 is-offset-1 has-margin-top-auto has-margin-bottom-auto">

                                <h1 style="margin-top:10%;"
                                    class="is-size-2 is-size-4-mobile has-text-light has-font-weight-bold">
                                    Click, Copy, Paste <br>& Earn easy money.
                                </h1><br>
                                <div data-aos="fade-in">

                                    <div class="links"> <a href="/login"
                                            style="background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                            class="button is-warning is-medium">
                                            How it works ?
                                        </a></div>
                                </div>

                            </div>
                            <div class="column is-5 is-offset-1">

                                <figure class="image ">
                                    <img src="/storage/undraw_pitching.svg" alt="Analyze any profile with tiktok analytics">
                                </figure>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </section>

        <section id="more" class="hero is-section-secondary is-bold ">

            <div class="hero-body padding-bottom-hp has-text-centered">
                <div class="container">
                    <div class="title-wrapper has-text-centered has-padding-20 has-margin-bottom-20">
                        <h2 class="subtitle is-3 has-text-weight-semi-bold">More features:</h2>
                    </div>
                    <div class="columns is-multiline has-padding-10">


                        <div class="column is-6">

                            <span class="">
                                <img style="height: 100px;" src="/storage/undraw_real_time.svg" width="25%">
                            </span>

                            <h3 class="title is-size-5 has-text-weight-semi-bold">
                                Community collaboration

                            </h3>
                            <div class="is-size-6">
                            </div>

                        </div>


                        <div class="column is-6">

                            <span class="">
                                <img style="height: 100px;" src="/storage/undraw_confirmed.svg" width="25%">
                            </span>

                            <h3 class="title is-size-5 has-text-weight-semi-bold">
                                Pure content

                            </h3>
                            <div class="is-size-6">
                            </div>

                        </div>


                        <div class="column is-6 ">

                            <span class="">
                                <img style="height: 100px;" src="/storage/undraw_accept_terms.svg" width="25%">
                            </span>

                            <h3 class="title is-size-5 has-text-weight-semi-bold">
                                Following instructions

                            </h3>
                            <div class="is-size-6">
                            </div>

                        </div>


                        <div class="column is-6">

                            <span class="">
                                <img style="height: 100px;" src="/storage/undraw_working.svg" width="25%">
                            </span>

                            <h3 class="title is-size-5 has-text-weight-semi-bold">
                                Daily work

                            </h3>
                            <div class="is-size-6">
                            </div>

                        </div>




                    </div>
                </div>
            </div>
        </section>


        <section class="section" style="min-height: 0vh;">
            <div class="hero-bodyhas-text-centered ">
                <div class=" has-text-centered">

                    <h1 align="center" class="is-size-2 is-size-4-mobile has-text-black has-font-weight-bold">Apply now and
                        try it for free </h1><br>
                    <br>
                    <div class="columns">
                        <div class="column is-6">
                            <div data-aos="fade-in">

                                <div class="links" style="float:right;"> <a href="/register"
                                        style="width:250px;background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                        class="button is-warning is-medium">
                                        Join ClickWin now
                                    </a></div>
                            </div>
                        </div>
                        <br><br><br>

                        <div class="column is-6">
                            <div data-aos="fade-in">

                                <div class="links" style="float:left;"> <a href="/ads"
                                        style="width:250px;background-image: linear-gradient(to right, #f3a121 0%, #fee140 100%);"
                                        class="button is-warning is-medium">
                                        For advertising
                                    </a></div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <br><br><br>
        </section>
    </div>
@endsection
