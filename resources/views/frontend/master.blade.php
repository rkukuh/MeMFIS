<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        @include('layouts.include._header')


    </head>
    <!-- end::Head -->

    
    <!-- begin::Body -->
    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

        
        
    	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    
	
<!-- BEGIN: Header -->
@include('layouts.include._navbar')
<!-- END: Header -->		
		<!-- begin::Body -->
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			
<!-- BEGIN: Left Aside -->
@include('layouts.include._sidebar')
<!-- END: Left Aside -->							
		   	<div class="m-grid__item m-grid__item--fluid m-wrapper">
            @if (session('pesan_sukses'))
                <div class="alert alert-success">
                    {{ session('pesan_sukses') }}
                </div>
            @endif			    
<!-- BEGIN: Subheader -->
@yield('content')
			    		    </div>

				
		</div>
				<!-- end:: Body -->

				
<!-- begin::Footer -->
@include('layouts.include._footer')
<!-- end::Footer -->		
		

</div>
<!-- end:: Page -->

<!-- begin::Quick Sidebar -->
@include('layouts.include._control-sidebar')
<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->		    
<!-- begin::Quick Nav -->
@include('layouts.include._nav-sticky')
<!-- end::Quick Nav -->	
    	<!--begin::Base Scripts -->        
    	    	<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		    	<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
				<!--end::Base Scripts -->   

         
        <!--begin::Page Vendors Scripts -->
                <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                <!--end::Page Vendors Scripts -->
          

        
        
                    
        <!--begin::Page Snippets --> 
                <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
                <!--end::Page Snippets -->   
                @stack('footer-scripts')
            </body>
    <!-- end::Body -->
</html>