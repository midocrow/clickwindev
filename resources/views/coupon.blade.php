@extends('layouts.app')


@section('content')
<div class="container">
    <div class="columns is-mobile is-centered">
      <div class="column">
        <div class="box has-background-dark">
         <h3 style="color:#ffd419" class="title is-warning">Coupon code</h3>
          <p style="color: white">
            You can receive 50 free Cwins <img style="width:45px;display:inline-block;margin-bottom:-0.8%;margin-left:-1.3%;margin-right:-1%;" src="/storage/cwin.png" />
             via « Coupon Code » that will be published on our 
            social media and you must copy them before they expire in 1 hour left and validate them here.
          </p>
<br>
        <div class="columns">
          <div class="column is-6 is-offset-3">
            <div class="field has-addons">
                <div class="control is-large is-expanded">
                  <input
                    style="background-color:grey;color:white;"
                    class="input is-rounded"
                    type="text"
                    placeholder="Coupon code..."
                  />
                </div>
                <div class="control">
                  <button
                    class="button is-warning is-rounded"
                    href="javascript:void()"
                    style="color:black;"
                  >
                Submit
                </button>
           </div>
          </div>
        </div>

        </div>
        <div class="column is-2 is-offset-4">
         <center>
            <div class="columns"  style="margin-left:5%;">
                <div class="column" >
                    <figure class="image is-96x96" >
                        <img src="/storage/pub/facebook.png" :style="{ 'margin-left': '0%' }" />
                       </figure> 
                </div>
                <div class="column">
                    <figure class="image is-96x96" >
                        <img src="/storage/pub/youtube.png" :style="{ 'margin-left': '0%' }" />
                       </figure> 
                </div>
            </div>
         </center>

        </div>
      </div>
    </div>
  </div>
@endsection

