@extends('dashboard._layouts.master')
@section('title',__('dashboard.leasons.title'))
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url(route('dashboard')) }}">
                            {{ __('dashboard.home.home') }}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('dashboard.leasons.title')}}</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">

                        <div id="embedBox" style="width:1280px;max-width:100%;height:auto;"></div>
                        <script>
                            (function(v,i,d,e,o){v[o]=v[o]||{}; v[o].add = v[o].add || function V(a){
                                (v[o].d=v[o].d||[]).push(a);};if(!v[o].l) { v[o].l=1*new Date();
                                a=i.createElement(d); m=i.getElementsByTagName(d)[0]; a.async=1; a.src=e;
                                m.parentNode.insertBefore(a,m);}})(window,document,"script",
                                "https://player.vdocipher.com/playerAssets/1.6.10/vdo.js","vdo");
                            vdo.add({
                                otp: "{{$otp}}",
                                playbackInfo: "{{$playbackInfo}}",
                                theme: "9ae8bbe8dd964ddc9bdb932cca1cb59a",
                                container: document.querySelector( "#embedBox" ),
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

