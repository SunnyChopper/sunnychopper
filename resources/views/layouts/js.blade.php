<script src="{{ URL::asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ URL::asset('js/easing.min.js') }}"></script>			
<script src="{{ URL::asset('js/hoverIntent.js') }}"></script>
<script src="{{ URL::asset('js/superfish.min.js') }}"></script>	
<script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>	
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>						
<script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>							
<script src="{{ URL::asset('js/mail-script.js') }}"></script>	
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>
<script src="{{ URL::asset('js/service-worker.js') }}"></script>

@if(!Auth::guest())
    @include('layouts.push-notification-js')
@endif

@yield('page_js')