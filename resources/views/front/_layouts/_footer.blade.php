<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyrights">{{__('front.footer.copyrights')}}</p>
            </div>
            <div class="col-md-6">
                <div class="footer-social-icons">

                    @if(config('setting.social')['facebook'])
                    <a href="{{config('setting.social')['facebook']}}"
                        target="_blank">

                        <i class="fab fa-facebook footer-icon"></i>
                    </a>
                    @endif
                    @if(config('setting.social')['twitter'])
                    <a href="{{config('setting.social')['twitter']}}"
                        target="_blank">
                        <i class="fab fa-twitter footer-icon"></i>
                    </a>
                    @endif
                    @if(config('setting.social')['instagram'])
                    <a href="{{config('setting.social')['instagram']}}"
                        target="_blank">
                        <i class="fab fa-instagram footer-icon"></i>
                    </a>
                    @endif
                    @if(config('setting.social')['youtube'])
                    <a href="{{config('setting.social')['youtube']}}"
                        target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                    @endif
                    @if(config('setting.social')['linkedin'])
                    <a href="{{config('setting.social')['linkedin']}}"
                        target="_blank">
                        <i class="fab fa-linkedin footer-icon"></i>
                    </a>
                    @endif

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="copyrights">{{__('front.footer.by')}}
                    <a href="https://www.tocaan.com/ar">Tocaan</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!--WhatsApp-->
<div id="wmobile"
    class="d-sm-none">
    <!-- Mobile -->
    <a href="https://wa.me/{{Setting::get('social.whatsapp')}}"><img src="{{url('uploads/whatspulse.gif')}}"
            alt=""
            style="    height: 120px;"></a>
</div>

<div id="wdesktop"
    class="d-none d-sm-block">
    <!-- Desktop only-->
    <a href="https://wa.me/{{Setting::get('social.whatsapp')}}"><img src="{{url('uploads/whatspulse.gif')}}"
            alt=""
            style="    height: 120px;" /></a>
</div>

<style>
    #wmobile {
        position: fixed;
        bottom: 10px;
        right: 15px;
        height: 60px;

    }

    #wdesktop {
        position: fixed;
        bottom: 10px;
        right: 15px;
    }

    #wmobile img,
    #wdesktop img {
        height: 60px;
    }


    .footer-icon {
        font-size: 23px;
    }

</style>
