@extends("user.layouts.app")
@section ("content")

    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl">
                                <div class="section-tittle mb-30">
                                    <h3>Event </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="row" style="display: block">
                                            @foreach($events as $item)
                                                <div>
                                                    <div class="whats-news-single mb-40 mb-40"
                                                         style="display: flex; margin-bottom: 18px">
                                                        <div class="whates-img" style="overflow: unset">
                                                            <img src="{{ $item->thumbnail }}"
                                                                 style="width: 250px; height: 180px; border-radius: 4px"
                                                                 alt="">
                                                        </div>
                                                        <div class="whates-caption whates-caption2"
                                                             style="margin-left: 20px">
                                                            <h4>
                                                                <a href="{{ url("blog_event",['event'=>$item->slug]) }}">{{ $item->name }}</a>
                                                            </h4>
                                                            {{--                                                            <span>by {{ $item->User->name }}   -   {{ $item->created_at->toDateString() }}</span>--}}
                                                            <span>Date: {{$item->date_from}} - {{$item->date_to}}</span>
                                                            <span>Number of people participated: 0/{{ $item->qty }} </span>
                                                            <p>{{\Illuminate\Support\Str::limit($item->description , 100 ,'...') }}</p>
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
                    {!! $events->links("pagination::bootstrap-5") !!}
                </div>
                @include("user.layouts.sidebar_event")
            </div>
        </div>
    </div>
@endsection

