@extends('main.main_master')
@section('content')

<section class="single_page">						
    <div class="container-fluid">											
    <div class="row">
        <div class="col-md-12">
            <div class="single_info">
                <span>
                    <a href="#"><i class="fa fa-home" aria-hidden="true"></i> /
                    </a>  CATEGORY			
                </span>				    
            </div>
        </div>
        <div class="col-md-9 col-sm-8">				
            @foreach ($cateposts as $catepost)
				
            <div class="archive_post_sec_again">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="archive_img_again">
                            <a href="{{route('post.single',$catepost->id)}}"><img src="{{asset($catepost->image)}}" alt="Notebook"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="archive_padding_again">
                            <div class="archive_heading_01">
                                <a href="{{route('post.single',$catepost->id)}}">
                                    @if (session()->get('lang')  == 'english')
                                    {{$catepost->title_en}}
                                    @else
                                    {{$catepost->title_ar}}
                                    @endif
                                    </a>
                            </div>
                            <div class="archive_dtails">
                                @if (session()->get('lang')  == 'english')
                                {{Str::limit($catepost->details_en, 200)}}
                                @else
                                {{Str::limit($catepost->details_ar, 200)}}
                                @endif
                            </div>
                            <div class="dtails_btn"><a href="{{route('post.single',$catepost->id)}}">
                                @if (session()->get('lang')  == 'english')
                                Read More...
                                @else
                                أقرا أكثر...
                                @endif
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $cateposts->links('pagination-links') }}
        </div>		

        <div class="col-md-3 col-sm-4">
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
            <div class="tab-header">
                <!-- Nav tabs -->
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
                <!-- Tab panes -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div>
            </div>
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
        </div>			
    </div>
</div>
</section>

@endsection