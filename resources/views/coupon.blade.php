@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="columns is-mobile is-centered">
            <div class="column">
                <div class="box has-background-dark">
                    <h3 style="color:#ffd419" class="title is-warning">Coupon code</h3>
                    <p style="color: white">
                        You can receive free Cwins by "Coupon Code" which will be published on our socials and validate them
                        here.
                    </p>
                    <br>
                    <div class="columns">
                        <div class="column is-6 is-offset-3">
                            <div class="field has-addons">
                                <div class="control is-large is-expanded">
                                    <input style="background-color:grey;color:white;" class="input is-rounded" type="text"
                                        placeholder="Coupon code..." />
                                </div>
                                <div class="control">
                                    <button class="button is-warning is-rounded" href="javascript:void()"
                                        style="color:black;">
                                        <p style="font-family: bitter;">Submit</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>


                    <center>
                        <div class="columns is-vcentered">
                            <div class="column is-12">
                                <div class="wrapper2">
                                    <div class="social-links">
                                        <a style="padding-right: 20px;" href="#"><i class="fab fa-facebook"
                                                style="color:#ffd419;font-size:50px;" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fab fa-instagram" style="color:#ffd419;font-size:50px;"
                                                aria-hidden="true"></i></a>

                                        <a style="padding-left: 20px;" href="#"><i class="fab fa-youtube"
                                                style="color:#ffd419;font-size:50px;" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                            </div>
                        </div>
                    </center>
                </div>
            </div>

        </div>

    @endsection
