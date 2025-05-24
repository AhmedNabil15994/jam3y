@if (is_rtl() == 'rtl')

	<script src="/front/ar/assets/js/jquery.min.js"></script>
	<script src="/front/ar/assets/js/bootstrap.min.js"></script>
	<script src="/front/ar/assets/js/wow.min.js"></script>
	<script src="/front/ar/assets/js/owl.carousel.min.js"></script>
	<script src="/front/ar/assets/js/jquery.counterup.min.js"></script>
	<script src="/front/ar/assets/js/jquery.waypoints.min.js"></script>
	<script src="/front/ar/assets/js/jquery.webui-popover.min.js"></script>
	<script src="/front/ar/assets/js/main.js"></script>

@else

	<script src="/front/en/assets/js/jquery.min.js"></script>
	<script src="/front/en/assets/js/bootstrap.min.js"></script>
	<script src="/front/en/assets/js/wow.min.js"></script>
	<script src="/front/en/assets/js/owl.carousel.min.js"></script>
	<script src="/front/en/assets/js/jquery.counterup.min.js"></script>
	<script src="/front/en/assets/js/jquery.waypoints.min.js"></script>
	<script src="/front/en/assets/js/jquery.webui-popover.min.js"></script>
	<script src="/front/en/assets/js/main.js"></script>

@endif

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147661117-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-147661117-1');
</script>

@yield('scripts')
