@extends('layouts.app')

@section('content')
<div class="container">
    <!--
    <transition name="slide-fade" mode="out-in">
        <router-view />
    </transition>-->
    <gameplace></gameplace>
        @auth
        <top rankall="{{ Auth::user()->rankall }}"></top>
        @endauth
</div>
@endsection
