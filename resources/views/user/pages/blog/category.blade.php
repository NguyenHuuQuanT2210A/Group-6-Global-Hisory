@extends("user.layouts.app")
@section("before_css")
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
@endsection
@section ("content")
    <main>
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        @if($category == null)
                                            <h3> Category </h3>
                                        @else
                                            <h3> {{$category->name}} </h3>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                @foreach($posts as $item)
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{ $item->thumbnail }}" style="width: 320px; height: 209px" alt="">
                                                            </div>
                                                            <div class="whates-caption whates-caption2">
                                                                <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                <span>by {{ $item->User->name }}   -   {{ $item->created_at->toDateString() }}</span>
                                                                <p>{{\Illuminate\Support\Str::limit($item->body , 100 ,'...') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>
                        {!! $posts->links("pagination::bootstrap-5") !!}
                    </div>

                    @include("user.layouts.sidebar")
                </div>
            </div>
        </div>
    </main>
@endsection
