@extends('layouts.backend.frontend.app')

@section('title','Magazine')

@push('css')
@endpush

@section('content')
<div id="container">
		<nav>
			<ul>
				<li><a id='first'     href="#" title='goto first page'   >First page</a></li>
				<li><a id='back'      href="#" title='go back one page'  >Back</a></li>
				<li><a id='next'      href="#" title='go foward one page'>Next</a></li>
				<li><a id='last'      href="#" title='goto last page'    >last page</a></li>
				<li><a id='zoomin'    href="#" title='zoom in'           >Zoom In</a></li>
				<li><a id='zoomout'   href="#" title='zoom out'          >Zoom Out</a></li>
				<li><a id='slideshow' href="#" title='start slideshow'   >Slide Show</a></li>
				<li><a id='flipsound' href="#" title='flip sound on/off' >Flip sound</a></li>
				<li><a id='fullscreen'href="#" title='fullscreen on/off' >Fullscreen</a></li>
				<li><a id='thumbs'    href="#" title='thumbnails on/off' >Thumbs</a></li>
				<li><a id='backissue' href="archive/index.html" title='back issue' >Back Issue</a></li>
			</ul>
		</nav>
	<div id="main">
		<img id='click_to_open' src="images/image01.png" alt='click to open' />
	
  		<div id='features'>
			<div id='cover'><img src="images/image01.png" width="100%" height="100%" /></div>
			
			<div data-image="/images/image01.png"></div> 
			<div data-image="images/image02.png"></div> 
		
			<div class='last_cover'>
				<img src="images/2022-02/154.jpg" width="110%" height="100%" />
			</div>

		</div> <!-- features -->

	</div>
	<div id='thumbs_holder'>
	</div>
	<footer>

	</footer>
	</div> <!--! end of #container -->
</div>
@endsection

<script type="text/javascript">
		$(document).ready(function() {
			$('#features').wowBook({
				 height : 500
				,width  : 800
				,centeredWhenClosed : true
				,hardcovers : true
				,turnPageDuration : 1000
				,numberedPages : [1,-2]
				,controls : {
						zoomIn    : '#zoomin',
						zoomOut   : '#zoomout',
						next      : '#next',
						back      : '#back',
						first     : '#first',
						last      : '#last',
						slideShow : '#slideshow',
						flipSound : '#flipsound',
						thumbnails : '#thumbs',
						fullscreen : '#fullscreen'
			        }
				,scaleToFit: "#container"
				,thumbnailsPosition : 'bottom'
				,onFullscreenError : function(){
					var msg="Fullscreen failed.";
					if (self!=top) msg="The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
					alert(msg);
				}
			}).css({'display':'none', 'margin':'auto'}).fadeIn(1000);

			$("#cover").click(function(){
				$.wowBook("#features").advance();
				$("#click_to_open").fadeOut();
			});

			var book = $.wowBook("#features");

			function rebuildThumbnails(){
				book.destroyThumbnails()
				book.showThumbnails()
				$("#thumbs_holder").css("marginTop", -$("#thumbs_holder").height()/2)
			}
			$("#thumbs_position button").on("click", function(){
				var position = $(this).text().toLowerCase()
				if ($(this).data("customized")) {
					position = "top"
					book.opts.thumbnailsParent = "#thumbs_holder";
				} else {
					book.opts.thumbnailsParent = "body";
				}
				book.opts.thumbnailsPosition = position
				rebuildThumbnails();
			})
			$("#thumb_automatic").click(function(){
				book.opts.thumbnailsSprite = null
				book.opts.thumbnailWidth = null
				rebuildThumbnails();
			})
			$("#thumb_sprite").click(function(){
				book.opts.thumbnailsSprite = "images/thumbs.jpg"
				book.opts.thumbnailWidth = 136
				rebuildThumbnails();
			})
			$("#thumbs_size button").click(function(){
				var factor = 0.02*( $(this).index() ? -1 : 1 );
				book.opts.thumbnailScale = book.opts.thumbnailScale + factor;
				rebuildThumbnails();
			}) 
		});
	</script>
	<!-- scripts concatenated and minified via ant build script-->
    <script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

@push('js')
@endpush

