<?php
include_once 'inc/db_connect.php';
include_once 'inc/func.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="http://getbootstrap.com/favicon.ico">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
   <link href="ui/jquery-ui.css" rel="stylesheet">
   <link rel="stylesheet" href="upload/css/jquery.fileupload.css">
   <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
   <link rel="stylesheet" href="gallery/css/bootstrap-image-gallery.css">
   <link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
   <link href="css/carousel.css" rel="stylesheet">
   <script src="./Narrow Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>
  <title>Joel McCauley - Demo Portfolio</title>
   
  </head>
  <?php if (login_check($mysqli) == true) : ?>
  
  
  <body>
  <div class="container">
     <div class="header">
			<nav>
			<ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="./index.php">Home</a></li>
            <li role="presentation"><a href="./inc/logout.php">Logout</a></li>
			</ul>
			</nav>
			<img src="img/logo_login.png" alt="...">
      </div>
      <br>
	  
      <div class="jumbotron">
        <h1>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</h1>
        <p class="lead">Thanks for checking out my portfolio.</p>
        <p>I've compiled samples of some of the things I've worked with in the past. This is a small PHP/SQL login with a HTML5, Javascript and CSS based frontend. If you have any questions, please contact me. Thanks again for the opportunity. </p>
		<br>
		<p>I also created the landing page for <a href="http://mansmannlaw.com">Mansmann Law</a>.
	  </div>

	  
	  
      <div class="row information">
        <div class="col-lg-6">
		<h2>jQuery - Plugins</h2>
		<br>
			<h4>Upload Files (Supports Drag and Drop)</h4>
				<span class="btn btn-success fileinput-button">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Select files...</span>
					<input id="fileupload" type="file" name="files[]" multiple>
				</span>
				<br>
				<br>
				<div id="progress" class="progress">
				<div class="progress-bar progress-bar-success"></div>
				</div>
				<div id="files" class="files"></div>
				<br>
				<br>
			<h4>FancyBox</h4>
				<a class="various fancybox.iframe" href="http://www.youtube.com/embed/b7YUnM5apXc?autoplay=1">
				<span class="btn btn-primary">
					<i class="glyphicon glyphicon-film"></i>
					<span>Load youtube video</span>
				</span></a>
				<br>
				<br>
				<br>
				<br>
			<h4>SQL Data to Bootstrap Table</h4>
			<?php LoadDB() ?>

		</div>

		
        <div class="col-lg-6">
        <h2>jQuery UI</h2>
		<br>
			<h4>Accordion</h4>
			<div id="accordion">
				<h3>1</h3>
				<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec pulvinar urna.</div>
				<h3>2</h3>
				<div>Nulla nulla nulla, tempus non bibendum et, feugiat at enim. Donec eget dui et nunc maximus eleifend.</div>
				<h3>3</h3>
				<div>bibendum vitae facilisis nec, hendrerit ornare nisl. Nam aliquam sapien ac dolor lacinia, vel tempor dolor suscipit.</div>
			</div>
				<br>
				<br>
			<h4>Datepicker</h4>
			<div id="datepicker"></div>
				<br>
				<br>
				<br>
				<br>			

        </div>
		<br>
		<br>
		<div class="">
	  			<h1>Bootstrap Image Gallery</h1>
				<form class="form-inline">
					<div class="form-group">
						<button id="video-gallery-button" type="button" class="btn btn-success btn-lg">
							<i class="glyphicon glyphicon-film"></i>
							Launch Video Gallery
						</button>
					</div>
					<div class="form-group">
						<button id="image-gallery-button" type="button" class="btn btn-primary btn-lg">
							<i class="glyphicon glyphicon-picture"></i>
							Launch Image Gallery
						</button>
					</div>
					<div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-success btn-lg">
						<i class="glyphicon glyphicon-leaf"></i>
						<input id="borderless-checkbox" type="checkbox"> Borderless
					  </label>
					  <label class="btn btn-primary btn-lg">
						<i class="glyphicon glyphicon-fullscreen"></i>
						<input id="fullscreen-checkbox" type="checkbox"> Fullscreen
					  </label>
					</div>
				</form>
				<br>
				<div id="links"></div>
				<br>
					<div id="blueimp-gallery" class="blueimp-gallery">
						<div class="slides"></div>
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
						<div class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-hidden="true">&times;</button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body next"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left prev">
											<i class="glyphicon glyphicon-chevron-left"></i>
											Previous
										</button>
										<button type="button" class="btn btn-primary next">
											Next
											<i class="glyphicon glyphicon-chevron-right"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
      </div>

  </div>
<div class="container-fluid">
<br>
<br>
<h2>Carousel</h2>
<br>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/green.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Green</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/blue.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Blue</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/red.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Red</h3>
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->


      <footer class="footer">
        <p>© Joel 2014</p>
      </footer>
</div>

        <?php else : ?>
            <p>
				<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Please <a href="index.php">login to continue</a>.
</div>
            </p>
        <?php endif; ?>


<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script src="ui/jquery-ui.js"></script>
<script src="upload/js/vendor/jquery.ui.widget.js"></script>
<script src="upload/js/jquery.iframe-transport.js"></script>
<script src="upload/js/jquery.fileupload.js"></script>
<script src="gallery/js/bootstrap-image-gallery.js"></script>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="gallery/js/demo.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
<script>
$( "#accordion" ).accordion();
$( "#datepicker" ).datepicker({
	inline: true
});
$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
$(function () {
    'use strict';
    var url = window.location.hostname === 'joel.comeze.com' ?
                '//joel.comeze.com/' : 'upload/server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>

</body></html>