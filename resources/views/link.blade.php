@extends('layouts.app')

@section('content')
<div class="container">
    <user_link currentlink="{{ Auth::user()->link->link }}" edit_time="{{ Auth::user()->ExpiredDate }}" expired="{{ Auth::user()->Expired }}"></user_link>
</div>
@endsection
