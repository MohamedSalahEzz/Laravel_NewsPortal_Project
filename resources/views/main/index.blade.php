@extends('main.main_master')
@section('content')
@php
    $first_section_thumbnails = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
    $first_sections = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
@endphp
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
 <div class="service-img"><a href="#"><img src="{{$first_section_thumbnails->image}}" width="800px" alt="Notebook"></a></div>
                            <div class="content">
     <h4 class="lead-heading-01"><a href="{{ route('post.single',$first_section_thumbnails->id) }}">
        @if (session()->get('lang') == 'english')
        {{$first_section_thumbnails->title_en}}
        @else
        {{$first_section_thumbnails->title_ar}}
        @endif
     </a>
     </h4>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    <div class="row">
                        @foreach ($first_sections as $first_section)
                        <div class="col-md-3 col-sm-3">
                            <div class="top-news">
                                <a href="{{ route('post.single',$first_section->id) }}"><img src="{{$first_section->image}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="{{ route('post.single',$first_section->id) }}">
                                    @if (session()->get('lang') == 'english')
                                    {{$first_section->title_en}}
                                    @else
                                    {{$first_section->title_ar}}
                                    @endif
                                </a> </h4>
                            </div>
                        </div>
                        @endforeach
                        </div>
                
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
                    </div>
                    
                </div><!-- /.add-close -->	
                
                <!-- news-start -->
                <div class="row">
                    @php
                        $first_category = DB::table('categories')->first();
                        $first_categoryBig = DB::table('posts')->where('category_id',$first_category->id)->where('bigthumbnail', 1)->first();
                        $first_categorySmall = DB::table('posts')->where('category_id',$first_category->id)->where('bigthumbnail', null)->limit(2)->get();
                    @endphp
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title"><a href="#">
                                @if (session()->get('lang') == 'english')
                                {{$first_category->category_en}}
                                @else
                                {{$first_category->category_ar}}
                                @endif
                                 <span>
                                    @if (session()->get('lang') == 'english')
                                    More
                                    @else
                                    أكثر
                                    @endif
                                 <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="{{ route('post.single',$first_categoryBig->id) }}"><img src="{{asset($first_categoryBig->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="{{ route('post.single',$first_categoryBig->id) }}">
                                            @if (session()->get('lang') == 'english')
                                            {{$first_categoryBig->title_en}}
                                            @else
                                            {{$first_categoryBig->title_ar}}
                                            @endif
                                         </a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($first_categorySmall as $item)
                                    <div class="image-title">
                                        <a href="{{ route('post.single',$item->id) }}"><img src="{{asset($item->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                            @if (session()->get('lang') == 'english')
                                            {{$item->title_en}}
                                            @else
                                            {{$item->title_ar}}
                                            @endif
                                        </a> </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $second_category = DB::table('categories')->skip(1)->first();
                    $second_categoryBig = DB::table('posts')->where('category_id',$second_category->id)->where('bigthumbnail', 1)->first();
                    $second_categorySmall = DB::table('posts')->where('category_id',$second_category->id)->where('bigthumbnail', null)->limit(2)->get();
                @endphp
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title"><a href="#">
                                @if (session()->get('lang') == 'english')
                                {{$second_category->category_en}}
                                @else
                                {{$second_category->category_ar}}
                                @endif
                                 <span>
                                    @if (session()->get('lang') == 'english')
                                    More
                                    @else
                                    أكثر
                                    @endif
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="{{ route('post.single',$second_categoryBig->id) }}"><img src="{{asset($second_categoryBig->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="{{ route('post.single',$second_categoryBig->id) }}">
                                            @if (session()->get('lang') == 'english')
                                            {{$second_categoryBig->title_en}}
                                            @else
                                            {{$second_categoryBig->title_ar}}
                                            @endif
                                         </a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($second_categorySmall as $item)
                                    <div class="image-title">
                                        <a href="{{ route('post.single',$item->id) }}"><img src="{{asset($item->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{ route('post.single',$item->id) }}">
                                            @if (session()->get('lang') == 'english')
                                            {{$item->title_en}}
                                            @else
                                            {{$item->title_ar}}
                                            @endif
                                        </a> </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>					
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.j')}}pg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->	
                
                <!-- youtube-live-start -->	
                @php
                    $livetv = DB::table('livetvs')->first();
                @endphp
                @if ($livetv->status == 1)
                <div class="cetagory-title-03">Live TV</div>
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                        {!! $livetv->embed_code !!}
                    </div>
                </div>
                @endif
<!-- /.youtube-live-close -->	
                
                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v12.0" nonce="eqDhVrqa"></script>
<div class="fb-page" data-href="https://www.facebook.com/AboSala7online/" data-tabs="" data-width="270" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
<!-- /.facebook-page-close -->	
                
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('frontend/assets/img/add_01.j')}}pg" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->	
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">International <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add-start -->	
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.j')}}pg" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.j')}}pg" alt="" /></div>
            </div>
        </div><!-- /.add-close -->	
        
    </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                </div>
                <!-- ******* -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                    </div>
                </div>
                <br>
                @php
                    $districts = DB::table('districts')->get();
                    $subdistrict = DB::table('subdistricts')->get();
                @endphp

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02"><a href="#">Search By District<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <form action="{{ route('searchDistrict') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
          <select class="form-control" id="district_id" name="district_id">
                                <option disabled="" selected="">--Select District--</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{$district->district_en}} | {{$district->district_ar}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                                    <option disabled="" selected="">--Select SubDistrict--</option>
                                    </select>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('frontend/assets/img/top-ad.j')}}pg" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->	


            </div>
            <div class="col-md-3 col-sm-3">
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                         @if (session()->get('lang')  == 'english')
                         Latest
                         @else
                         آخر الاخبار
                         @endif
                       </a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                            @if (session()->get('lang')  == 'english')
                            Popular
                            @else
                            اكتر شهرة
                            @endif
                            </a></li>
                        <li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                            @if (session()->get('lang')  == 'english')
                            highest
                            @else
                            اكتر مشاهدة
                            @endif
                            </a></li>
                    </ul>

                    <!-- Tab panes -->
                    @php
                        $Latest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
                        $Popular = DB::table('posts')->inRandomOrder()->limit(5)->get();
                        $highest = DB::table('posts')->inRandomOrder()->limit(5)->get();
                    @endphp
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($Latest as $item)
                                <div class="news-title-02">
                                 <h4 class="heading-03"><a href="#">
                                    @if (session()->get('lang')  == 'english')
                                    {{$item->title_en}}
                                    @else
                                    {{$item->title_ar}}
                                    @endif
                                    </a> </h4>
                            </div>
                                @endforeach
                        </div>
                    </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach ($Popular as $item)
                                <div class="news-title-02">
                                 <h4 class="heading-03"><a href="#">
                                    @if (session()->get('lang')  == 'english')
                                    {{$item->title_en}}
                                    @else
                                    {{$item->title_ar}}
                                    @endif
                                    </a> </h4>
                            </div> 
                            @endforeach
                        </div>
                </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab23">	
                            <div class="news-titletab">
                                @foreach ($highest as $item)
                                <div class="news-title-02">
                                 <h4 class="heading-03"><a href="#">
                                    @if (session()->get('lang')  == 'english')
                                    {{$item->title_en}}
                                    @else
                                    {{$item->title_ar}}
                                    @endif
                                    </a> </h4>
                            </div>
                            @endforeach
                            </div>						                                          
                        </div>
                    </div>
                <!-- Namaj Times -->
                @php
                    $prayers = DB::table('prayers')->first();
                @endphp
                <div class="cetagory-title-03">
                    @if (session()->get('lang') == 'english')
                    Prayer Time
                @else	
                    أوقات الصلاة	
                @endif
                 </div>
                <table class="table">
                    <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            fajr
                        @else	
                        الفجر
                        @endif
                        </th>
                        <th>{{ $prayers->fajr }}</th>
                    </tr>                   
                     <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            johor
                        @else	
                        الظهر
                        @endif
                        </th>
                        <th>{{ $prayers->johor }}</th>
                    </tr>                    
                    <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            asor
                        @else	
                        العصر
                        @endif
                        </th>
                        <th>{{ $prayers->asor }}</th>
                    </tr>                    
                    <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            magrib
                        @else	
                        المغرب
                        @endif
                        </th>
                        <th>{{ $prayers->magrib }}</th>
                    </tr>                    
                    <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            esha
                        @else	
                        العشا
                        @endif
                        </th>
                        <th>{{ $prayers->esha }}</th>
                    </tr>
                    <tr>
                        <th>
                            @if (session()->get('lang') == 'english')
                            jummah
                        @else	
                        الجمعة
                        @endif
                        </th>
                        <th>{{ $prayers->jummah }}</th>
                    </tr>
                </table>
                <!-- Namaj Times -->
                <div class="cetagory-title-03">Old News  </div>
                <form action="" method="post">
                    <div class="old-news-date">
                       <input type="text" name="from" placeholder="From Date" required="">
                       <input type="text" name="" placeholder="To Date">			
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="search ">
                    </div>
               </form>
               <!-- news -->
               <br><br><br><br><br>
               @php
                   $websites = DB::table('websites')->orderBy('id','ASC')->get();
               @endphp
               <div class="cetagory-title-04"> 
                @if (session()->get('lang') == 'english')
                Important Website
            @else	
                مواقع مهمة
            @endif

                </div>
               <div class="">
                   <div class="news-title-02">
                       @foreach ($websites as $website)
                       <h4 class="heading-03"><a href="{{ $website->website_link }}" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> {{ $website->website_name }}  </a> </h4>
                       @endforeach
                   </div>
               </div>

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->	

@php
    $photoBig = DB::table('photos')->where('type', 1)->orderBy('id','desc')->first();
    $photoSmall = DB::table('photos')->where('type', 0)->orderBy('id','desc')->limit(5)->get();
@endphp
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title">
                    @if (session()->get('lang') == 'english')
                    Photo Gallery
                    @else
                    معرض الصور
                    @endif
                      </div>

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                  <img src="{{asset($photoBig->photo)}}"  alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">
                            @foreach ($photoSmall as $item)
                            <div class="photo_img photo_border active">
                                <img src="{{asset($item->photo)}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                    {{$item->title}}
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!--=======================================
                Video Gallery clickable jquary  start
            ========================================-->

                        <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                  showDivs(slideIndex += n);
                                }

                                function currentDiv(n) {
                                  showDivs(slideIndex = n);
                                }

                                function showDivs(n) {
                                  var i;
                                  var x = document.getElementsByClassName("myPhotos");
                                  var dots = document.getElementsByClassName("demo");
                                  if (n > x.length) {slideIndex = 1}
                                  if (n < 1) {slideIndex = x.length}
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                  }
                                  x[slideIndex-1].style.display = "block";
                                  dots[slideIndex-1].className += " w3-opacity-off";
                                }
                            </script>

            <!--=======================================
                Video Gallery clickable  jquary  close
            =========================================-->
            @php
                $videoBig = DB::table('videos')->where('type', 1)->orderBy('id','desc')->first();
                $videoSmall = DB::table('videos')->where('type', 0)->orderBy('id','desc')->limit(4)->get();
            @endphp

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title"> 
                    @if (session()->get('lang') == 'english')
                    Video Gallery
                    @else
                    معرض الفديوهات
                    @endif
                 </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videoBig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="gallery_sec owl-carousel">
                            @foreach ($videoSmall as $item)
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$item->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endforeach

                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                      showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                      showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                      var i;
                      var x = document.getElementsByClassName("myVideos");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->
<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="district_id"]').on('change', function(){
              var district_id = $(this).val();
              if(district_id) {
                  $.ajax({
                      url: "{{  url('/get/subdistrict/frontend') }}/"+district_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdistrict_id").empty();
                               $.each(data,function(key,value){
                                   $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>
@endsection