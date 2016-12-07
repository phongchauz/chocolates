<?php
$typeBanner = isset($setting['Setting']['type_banner']) ? $setting['Setting']['type_banner'] : TYPE_BANNER_PICTURE;
$listMainBanner = array();
$listMainBannerMid = array();
if($typeBanner == TYPE_BANNER_VIDEO){
	foreach($listBanner as $banner){
		if($banner['Banner']['type'] == TYPE_BANNER_VIDEO &&
			$banner['Banner']['main'] == 1){
			$listMainBanner[count($listMainBanner)] = $banner;
			break;
		}
	}
} else {
	foreach($listBanner as $banner){
		if($banner['Banner']['type'] == TYPE_BANNER_PICTURE){

			switch($banner['Banner']['location_type']) {
				case $arrLocType[0]['id']:
					$listMainBanner[count($listMainBanner)] = $banner;
        			break;
				case $arrLocType[1]['id']:
					$listMainBannerMid[count($listMainBanner)] = $banner;
					break;

			}

		}
	}
}

//pr($listMainBannerMid); die;

?>
<?php
	echo $this->Html->css('carousel');
	echo $this->Html->css('swiper.min');
	echo $this->Html->css('home');

	echo $this->Html->script('swiper.min');
	echo $this->Html->script('bcSwipe');

	if($typeBanner == TYPE_BANNER_VIDEO && count($listMainBanner) > 0){
		$idYoutube = AppHelper::getYouTubeIdFromURL($listMainBanner[0]['Banner']['link_video']);
		echo $this->Html->css('video-banner');
		echo $this->Html->script('jquery.youtubebackground');
	}

	$classBanner = $isMobile == -1 ? 'windows-banner' : 'mobile-banner';

?>



<div class="content main-content">
	<section class="site-main-wrapper <?php echo $classBanner;?>" id="top-banner">
		<?php
		?>
	<?php if(!empty($listMainBanner)){ ?>


		<div id="carousel-example-generic" class="carousel <?php echo $typeBanner == TYPE_BANNER_PICTURE ? 'slide' : '' ?>" data-ride="carousel">
		  <!-- Indicators -->
			<?php if($typeBanner == TYPE_BANNER_PICTURE){ ?>
		  <ol class="carousel-indicators">
		  <?php foreach($listMainBanner as $idx => $banner){ ?>
		    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $idx; ?>" class="<?php echo $idx == 0 ? "active" : ""; ?>"></li>
		  <?php } ?>
		  </ol>
			<?php } ?>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner test" role="listbox">
			  <?php if($typeBanner == TYPE_BANNER_PICTURE){ ?>
				<?php foreach($listMainBanner as $idx => $banner){ ?>
					<div class="item <?php echo $idx == 0 ? "active" : ""; ?>">

						<?php
							$pathImg = $isMobile == -1 ? $this->App->uploadBaseUrl('Banner/'.$banner["Banner"]["id"].'/'.$banner["Banner"]["picture"]) : $this->App->uploadBaseUrl('Banner/'.$banner["Banner"]["id"].'/Mobile/'.$banner["Banner"]["picture"]);

						?>

						<img alt="<?php echo $banner["Banner"]["picture_alt"]; ?>" title="<?php echo $banner["Banner"]["picture_title"]; ?>" src="<?php echo $pathImg; ?>" alt="">
						<div class="carousel-caption">
							<?php echo $banner["Banner"]["picture_caption"]; ?>
						</div>
					</div>
				<?php } ?>
			   <?php } else { ?>
				  <div id="video"></div>
			  <?php } ?>
		  </div>
		</div>
	<?php } ?>
	</section>
	
	<section class="site-about-wrapper">
		<div class="container">
			<div class="row nmg-lr">
				<div class="row nmg-lr text-center">
					<span class="header-style">About US</span>
				</div>
				<div class="about-caption text-center">
					<p>We've been arround since 2014.</p>
					<p>We are a global team of passionate consultants and developers</p>
					<p>who deliver result driven digital resolutions.<p>
				</div>

				<div class="row nmg-lr col-md-12 text-center">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
						<p><i class="fa fa-4x fa-trophy"></i></p>
						<p>+17</p>
						<p class="social">YEARS OF EXPERIENCE</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
						<p><i class="fa fa-4x fa-users"></i></p>
						<p>+450</p>
						<p class="social">PEOPLES</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
						<p><i class="fa fa-4x fa-map"></i></p>
						<p>9</p>
						<p class="social">OFFICES</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
						<p><i class="fa fa-4x fa-globe"></i></p>
						<p>4</p>
						<p class="social">CONTINENTS</p>
					</div>
				</div>
				<div class="rows nmg-lr text-center col-lg-12 www">
					<span class="header-style">We Work With</span>
				</div>
				<!-- Swiper -->
				<div class="row">
					<div class="swiper-button-prev swiper-button-prev-custom"></div>
				    <div class="swiper-container">
				        <div class="swiper-wrapper">
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/ogre3d_logo.png'); ?>"></div>
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/unreal_logo.png'); ?>"></div>
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/starling_logo.png'); ?>"></div>
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/unity_logo.png'); ?>"></div>
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/html5_logo.png'); ?>"></div>
				            <div class="swiper-slide"><img class="img-slider" src="<?php echo $this->App->imgBaseUrl('slider/cocos2d_logo.png'); ?>"></div>
				        </div>
					</div>
					<!-- Add Arrows -->
			        <div class="swiper-button-next swiper-button-next-custom"></div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="site-heading-wrapper jumbotron">

		<div class="container">
			<div class="headline-caption text-center">
				<p>We've been arround since 2014.</p>
				<p>We are a global team of passionate consultants and developers</p>
				<p>who deliver result driven digital resolutions.<p>
			</div>
		</div>
	</section>

	<?php $pathImgMid = ''; foreach($listMainBannerMid as $idm => $bannerMid){
		$pathImgMid = $isMobile == -1 ? 'Banner/'.$bannerMid["Banner"]["id"].'/'.$bannerMid["Banner"]["picture"] : 'Banner/'.$bannerMid["Banner"]["id"].'/Mobile/'.$bannerMid["Banner"]["picture"];
		break;
	} ?>
	<!-- Main jumbotron for a primary marketing message or call to action -->

	<section>
		<div id="mid-banner" class="jumbotron <?php echo $classBanner;?> mid-banner" style="background: url('<?php echo $this->webroot?>uploads/<?php echo $pathImgMid;?>') no-repeat 0 0 / 100% 100%;">
			<div class="container" >
				<div class="col-sm-6 col-sm-offset-6" >
					<div class="headline-with-picture-caption">
						<h2>Birdie Queue</h2>
						<p>We've been arround since 2014. We are a global team of passionate consultants and developers who deliver result driven digital resolutions.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="site-contact-wrapper">
		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<h1 class="text-center header-style">Contact Us</h1>
				<br>
				<form class="form-horizontal">
				  <div class="col-sm-6">
					  <div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
						  <input type=text class="form-control border-black" placeholder="Your name">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
						  <input type="email" class="form-control border-black" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
						  <input type="text" class="form-control border-black" placeholder="Subject">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
						  <textarea class="form-control border-black" rows="3" placeholder="Message"></textarea>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-8 col-sm-offset-4 text-right">
						  <button type="submit" class="btn btn-default btn-none-radius border-black">Submit</button>
						</div>
					  </div>
					</div>
						<div class="col-sm-6">
							<div>
								<h3 class="margin-h3">Team Information<br><small>info@teointeractive.com</small></h3>
							</div>
							<div>
								<h3>Technical Support<br><small>support@teointeractive.com</small></h3>
							</div>
							<div>
								<h3>Career Opportunities<br><small>career@teointeractive.com</small></h3>
							</div>
							<div>
								<h3>Follow Us
								<br>
								<br>
									<small>
									<ul class="list-inline">
										<li><a class="social-link text-muted" href="#"><i class="fa fa-facebook-square fa-lg"></i></a></li>
										<li><a class="social-link text-muted" href="#"><i class="fa fa fa-twitter fa-lg"></i></a></li>
										<li><a class="social-link text-muted" href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
										<li><a class="social-link text-muted" href="#"><i class="fa fa-youtube-play fa-lg"></i></a></li>
										<li><a class="social-link text-muted" href="#"><i class="fa fa-google-plus-square fa-lg"></i></a></li>
									</ul>
									</small>
								</h3>
							</div>
						</div>
				 </form>
			</div>
		</div>
	<!-- /container -->
	</section>
	
	<section class="site-footer-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 ">
					<h5 class="text-white">Products</h5>
					<ul class="list-unstyled">
			            <li class="footer-link-item"><a href="#">Games</a></li>
			            <li class="footer-link-item"><a href="#">TeoEditor</a></li>
	          		</ul>
				</div>
				<div class="col-sm-3">
					<h5 class="text-white">Developers</h5>
					<ul class="list-unstyled">
			            <li class="footer-link-item"><a href="#">Developer Center</a></li>
			            <li class="footer-link-item"><a href="#">Docs</a></li>
			            <li class="footer-link-item"><a href="#">Download</a></li>
			            <li class="footer-link-item"><a href="#">Tools</a></li>
	          		</ul>
				</div>
				<div class="col-sm-3">
					<h5 class="text-white">Team</h5>
					<ul class="list-unstyled">
			            <li class="footer-link-item"><a href="#">Blog</a></li>
			            <li class="footer-link-item"><a href="#">Careers</a></li>
			            <li class="footer-link-item"><a href="#">News</a></li>
			            <li class="footer-link-item"><a href="#">Research</a></li>
	          		</ul>
				</div>
				<div class="col-sm-3">
					<h5 class="text-white">Community</h5>
					<ul class="list-unstyled">
			            <li class="footer-link-item"><a href="#">Support</a></li>
			            <li class="footer-link-item"><a href="#">Careers</a></li>
			            <li class="footer-link-item"><a href="#">Forums</a></li>
			            <li class="footer-link-item"><a href="#">Order History</a></li>
	          		</ul>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php 

	echo $this->Html->script('page/home');

?>

<script>

	var isMobile = "<?php echo $pathImgMid;?>",
		screenWidth = window.screen.width <= 1600 ? window.screen.width - 20 : 1600
		;

	$(function(){

//		$("#top-banner").css({"min-width":screenWidth});
//		$("#mid-banner").css({"min-width":screenWidth});
//		$("#mid-banner").width(screenWidth);
//		$("#top-banner").width(screenWidth);

		var id = '<?php echo isset($idYoutube) ? $idYoutube : 0 ?>';
		if(id != 0){
			$('#video').YTPlayer({
				fitToBackground: false,
				videoId: id,
				pauseOnScroll: false,
				playerVars: {
					showinfo: 0,
					branding: 0,
					rel: 0,
					autohide: 1,
					origin: window.location.origin
				}
			});
			var widthVideo = $('#video > iframe').context.activeElement.clientWidth;
			var height = (9/16)*widthVideo;
			$('.carousel').css('min-height', height+'px');
		}
	});

	$(document).ready(function() {
		console.log(screenWidth);
	});


</script>
