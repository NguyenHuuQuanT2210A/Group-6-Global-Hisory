@extends("user.layouts.app")
@section("before_css")
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
@endsection
@section ("content")

<section class="section-intro">
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/events/13.jpg);">
        <h2 class="tit6 t-center">
            Exhibition
        </h2>
    </section>

    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="row">
                @foreach($events as $item)
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->

                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                            <a href="{{ url("event/single",['event'=>$item->slug]) }}"><img src="{{ $item->thumbnail }}" style="width: 370px;height: 247px" alt="IMG-INTRO"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">

                            <a href="{{ url("event/single",['event'=>$item->slug]) }}">
                                <h4 class="txt5 color0-hov trans-0-4 m-b-13" style="font-family: Roboto, sans-serif;">
                                    {{ $item->name }}
                                </h4></a>
                            <p>
                                Date From: {{ date('d-M-Y H:i:s', strtotime($item->date_from)) }}
                            </p>
                            <p>
                                Date To: {{ date('d-M-Y H:i:s', strtotime($item->date_to)) }}
                            </p>
                            <p>
                                Number of people participated: {{ $item->qty_registered }}/{{ $item->qty }}
                            </p>
                            <p class="m-b-20">
                                {{\Illuminate\Support\Str::limit($item->description , 100 ,'...') }}
                            </p>
                            <a href="{{ url("event/single",['event'=>$item->slug]) }}" class="txt4">
                                Learn More
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div>
                    {!! $events->links("pagination::bootstrap-4") !!}
                </div>
            </div>

        </div>
    </div>

</section>

@endsection
