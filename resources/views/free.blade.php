@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="columns is-mobile is-centered">
            <div class="column">
                <div class="box has-background-dark">
                    <p style="color: white">
                        Invite your friends to join ClikWin by sharing your referral link and win

                        20% from the total Cwins collected by every referral you add
                    </p>

                    <br>
                    <div class="columns">
                        <div class="column is-6 is-offset-3">
                            <div class="field is-centred">
                                <label class="label is-large" style="color: #ffd419">Your referral link</label>
                                <div class="control has-icons-right">
                                    <input class="input is-static is-large is-rounded" readonly
                                        style="background-color: grey;color:white;padding-left:5px;font-size:20px;"
                                        id="code" value="{{ Auth::user()->referral_link }}" type="text"
                                        placeholder="..." />
                                    <a style="pointer-events: initial;" onclick="copy()"
                                        class="icon is-right is-large is-active">
                                        <i class="fas fa-copy" style="margin-bottom: 20%;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column is-6 is-offset-3">

                            <div class="wrapper">


                                <div class="social">
                                    <span>Share</span>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-instagram" style="color:black;font-size:20px;"
                                                aria-hidden="true"></i></a>
                                        <a href="#"><i class="fab fa-facebook" style="color:black;font-size:20px;"
                                                aria-hidden="true"></i></a>
                                        <a href="#"><i class="fab fa-whatsapp" style="color:black;font-size:20px;"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>





                </div>
                <div class="box has-background-dark">

                    <div class="column is-6 is-offset-3">

                        <label class="label is-large" style="color: #ffd419">Your referrals</label>

                        <div class="box has-background-black">
                            <table class="table is-fullwidth has-background-black" style="color:white;">
                                <thead>
                                    <tr>
                                        <th style="color:white;"></th>
                                        <th style="color:white;">Username</th>
                                        <th style="color:white;">Date</th>
                                        <th style="color:white;">Cwins </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->referrals as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ str_pad($item->created_at->day, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($item->created_at->month, 2, '0', STR_PAD_LEFT) }}-{{ $item->created_at->year }}
                                            </td>

                                            <td>
                                                <span class="tag is-black is-medium" id="points-menu-item">
                                                    {{ $item->null ?? '+30' }}
                                                    <span class="icon is-right is-large" id="points-menu-item">
                                                        <img style="width:22px;margin-bottom:0px;"
                                                            src="/storage/cwin.png" />
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
