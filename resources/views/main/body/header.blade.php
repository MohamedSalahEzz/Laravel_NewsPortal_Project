   @php
	   $categories = DB::table('categories')->orderBy('id','ASC')->get();
	   $horizontal = DB::table('ads')->where('type', 1)->first();
	   $websetting = DB::table('website_settings')->first();
   @endphp
 
 
 <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href="{{ route('home') }}"><img src="{{ asset($websetting->logo) }}"></a> 
					</div>
				</div>              
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="{{ route('home') }}">HOME</a></li>
@foreach ($categories as $category)
<li class="dropdown">
<a href="{{ route('all_post',[$category->id,$category->category_en]) }}" >
		@if (session()->get('lang') == 'english')
			{{ $category->category_en }}
		@else	
			{{ $category->category_ar }}	
		@endif
	<b class="caret"></b></a>
<ul class="dropdown-menu">
	@php
	   $subcategories = DB::table('subcategories')->where('category_id',$category->id)->get();
	@endphp
	@foreach ($subcategories as $subcategory)
		<li><a href="{{ route('all_postsub',[$subcategory->id,$subcategory->subcategory_en]) }}">
			@if (session()->get('lang') == 'english')
			{{ $subcategory->subcategory_en }}
		@else	
			{{ $subcategory->subcategory_ar }}	
		@endif
			</a></li>
	@endforeach
</ul>
@endforeach

				</li>
	</div>
							</nav>											
						</div>
					</div>					
				</div> 
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- version-start -->
							@if (session()->get('lang') == 'arabic')
							<li class="version"><a href="{{ route('lang.english') }}"><B>ENGLISH</B></a></li>&nbsp;&nbsp;&nbsp;
							@else
							<li class="version"><a href="{{ route('lang.arabic') }}"><B>عربي</B></a></li>&nbsp;&nbsp;&nbsp;
							@endif
							<!-- login-start -->
						
							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
							<li>
								@php
									$socials = DB::table('socials')->first();
								@endphp
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="{{ $socials->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{ $socials->twitter }} " target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{ $socials->youtube }} " target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{ $socials->instagram }} " target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
									<a href="{{ $socials->linkedin }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> linkedin</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->
	
    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add">
						@if ($horizontal == Null)
							
						@else
							<a href="{{$horizontal->link}}" target="_blank"><img src="{{ asset($horizontal->ad) }}" alt="" /></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Dhaka </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  Monday, 19th October 2020 </li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->  

	<!-- notice-start -->
	 @php
		 $headlines = DB::table('posts')->where('posts.headline',1)->limit(3)->get();
		 $notices = DB::table('notices')->first();
	 @endphp
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
					@if (session()->get('lang') == 'english')
					Breaking News :
				@else	
					أخبار عاجلة :
				@endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
					@foreach ($headlines as $headline)
					<marquee>
						@if (session()->get('lang') == 'english')
						{{ $headline->title_en }}
					@else	
					{{ $headline->title_ar }}
					@endif
					</marquee>
					@endforeach
				</div>
			</div>
    	</div>
    </section>  
	@if ($notices->status == 1)
	<section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 " style="background-color: green">
					@if (session()->get('lang') == 'english')
					notices :
				@else	
				تنويه  :
				@endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02" style="background-color: red">
					<marquee>
						{{ $notices->notice }}
					</marquee>
				</div>
			</div>
    	</div>
    </section>   
	@endif 
