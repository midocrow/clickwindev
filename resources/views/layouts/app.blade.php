<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/storage/ClickWinPetitLogo.png" />
    <title>ClickWin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://fonts.googleapis.com/css?family=Bangers|Bitter:700|Crete+Round|Titillium+Web|Anton"
        rel="stylesheet" data-n-head="true">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<style>
    .headline-features {
        background-image: linear-gradient(164deg, #1b293a 44%, #4592a0 110%);
        border-top: 25px solid #3b4b64;
        padding-bottom: 0
    }

    .hero {
        font-family: Bitter, serif;
        height: 100%;
        min-height: 100vh;
    }

    #flip-card-day {
        display: none;
    }

    .plan-items {
        font-size: 12px;
        text-align: center;
    }

    ::-moz-placeholder {
        font-size: 20px;
        opacity: 0.5;
    }

    ::placeholder {
        font-size: 20px;
        opacity: 0.5;
    }

    #sign-button:hover {
        color: #ffd419;
        text-decoration: underline;
    }

    #sign-button {
        text-decoration: underline;
    }

    #wave {
        background-image: url("/storage/wave.png");
        background-size: contain;
        background-repeat: no-repeat;

    }

    #text-field-sign-design {
        border-color: red;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom-width: 2px;
        border-bottom-color: white;
        background-color: transparent;
        border-color: none;
        color: white;
        box-shadow: none;
    }

    .text-field-sign-design {
        border-color: red;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom-width: 2px;
        border-bottom-color: white;
        background-color: transparent;
        border-color: none;
        color: white;
        box-shadow: none;
    }

    #text-field-sign-design:focus:hover {
        border-bottom-color: #ffd419;
    }

    #text-field-sign-design:hover {
        border-bottom-color: #ffd419;
    }

    .switch[type=checkbox].is-warning:checked+label::before,
    .switch[type=checkbox].is-warning:checked+label:before {
        background: #ffd419
    }

    .wrapper {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
    }

    .wrapper2 {
        width: 100%;
        height: 100%;
        align-items: center;
    }

    .social {
        display: flex;
        align-items: center;
        position: relative;
        width: 200px;
        height: 50px;
        font-size: 18px;
        font-weight: 700;
        border-radius: 50px;
        color: black;
        background: #ffd419;
        overflow: hidden;
        margin: auto;
        transition: box-shadow .2s ease-out;
    }

    .social span,
    .social div {
        margin: auto;
    }

    .social .social-links {
        display: flex;
        align-items: center;
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(62, 130, 251, 0);
        width: 100%;
        height: 100%;
        padding: 0 30px;
        transition: all .25s ease;
    }

    .social .social-links a {
        margin: auto;
        background: #ffd419;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 20px;
        line-height: 40px;
        font-size: 15px;
        transform: translate3d(0, 60px, 0);
        transition: all .2s;
    }

    .social .social-links a:hover {
        background: #ffd419;
        color: #fff;
    }

    .social:hover {
        background-color: black;
    }

    .social:hover .social-links {
        background: black;
    }

    .social:hover .social-links>a {
        animation: elastic .5s ease-out forwards 0s;
    }

    .social:hover .social-links>a:nth-child(2) {
        animation-delay: 0.05s;
    }

    .social:hover .social-links>a:nth-child(3) {
        animation-delay: 0.1s;
    }

    .social:hover .social-links>a:nth-child(4) {
        animation-delay: 0.15s;
    }

    .social:hover .social-links>a:nth-child(5) {
        animation-delay: 0.2s;
    }

    @keyframes elastic {
        0% {
            transform: translate3d(0, 60px, 0);
        }

        40% {
            transform: translate3d(0, -5px, 0);
        }

        70% {
            transform: translate3d(0, 5px, 0);
        }

        100% {
            transform: translate3d(0, 0, 0);
        }
    }

    #notifi:hover {
        color: #ffd419;
        cursor: pointer;
    }

    [data-badge].has-badge-outlined.has-badge-danger::after {
        background: #ff3860;
        box-shadow: none;
        border: 1px solid #ff3860;
        color: white;
    }

    p {
        font-family: Arial, Helvetica, sans-serif;
    }

</style>

<body class="has-navbar-fixed-top">

    <div class="pageloader is-active is-dark loader-figure-dark" style="z-index: 100000000">
        <span class="title">
        </span>
    </div>

    <div id="app">


        <section class="hero is-dark is-fullheight">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                @guest
                    <navbar logged="{{ false }}"></navbar>
                @endguest
                @auth
                    <navbar logged="{{ true }}" rank="{{ Auth::user()->rank }}"
                        zone="{{ App\Link::where('user_id', Auth::id())->first()->zone }}"
                        notifs="{{ Auth::user()->notifications }}" avatar="{{ Auth::user()->avatar }}">
                        {{ csrf_field() }}
                    </navbar>
                @endauth
            </div>

            <!-- Hero content: will be in the middle -->

            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="container">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>


            @include('footer')

    </div>

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        async function paste() {
            const text = await navigator.clipboard.readText();
            if (text.length <= 17 && text.includes('click.') && text.includes('.win'))
                document.getElementById(window.value).value = text;
        }

        window.onfocus = function() {
            paste();
        }



        function copy() {

            let CodeToCopy = document.querySelector('#code');
            CodeToCopy.setAttribute('type', 'text'); // 不是 hidden 才能複製
            CodeToCopy.select();
            try {
                var successful = document.execCommand('copy');

            } catch (err) {
                alert('Oops, unable to copy');
            }
            window.getSelection().removeAllRanges();
        }

        window.onload = function() {
            document.getElementsByClassName('pageloader')[0].setAttribute('class', 'pageloader is-dark');
            document.getElementById('video').play();
        }


        function myFunction() {
            // alert(document.getElementById('ps').value);
            var x = document.getElementById('ps').value;
            if (x.length == 0) {
                var x = document.getElementById('ps').style.borderBottomColor = "";
            } else if (x.length < 8) {
                var x = document.getElementById('ps').style.borderBottomColor = "red";
            } else {
                var x = document.getElementById('ps').style.borderBottomColor = "green";

            }
        }


        function myFunction2() {
            // alert(document.getElementById('ps').value);
            var x1 = document.getElementById('ps').value;
            var x = document.getElementById('ps2').value;

            if (x.length == 0) {
                document.getElementById('ps2').style.borderBottomColor = "";
            } else if (x.length < 8) {
                document.getElementById('ps2').style.borderBottomColor = "red";
            } else {
                if (x == x1)
                    document.getElementById('ps2').style.borderBottomColor = "green";
                else
                    document.getElementById('ps2').style.borderBottomColor = "red";

            }

        }

        function myFunction3() {
            // alert(document.getElementById('ps').value);
            var x = document.getElementById('name3').value;
            if (x.length == 0) {
                var x = document.getElementById('name3').style.borderBottomColor = "";
            } else if (x.length < 8) {
                var x = document.getElementById('name3').style.borderBottomColor = "red";
            } else {
                var x = document.getElementById('name3').style.borderBottomColor = "green";

            }
        }

    </script>

</body>

</html>
