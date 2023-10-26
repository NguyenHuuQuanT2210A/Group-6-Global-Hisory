@extends("user.layouts.app")
@section ("content")

{{--    <div class="px-4 px-lg-5 h-100 introduce mb-5" id="about">--}}
{{--        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">--}}
{{--            <div class="col-lg-8 align-self-end">--}}
{{--                <h1 class="text-white font-weight-bold mb-3">Global History</h1>--}}
{{--                <h3 class="text-white font-bold">The Global History Library</h3>--}}
{{--                <hr class="divider">--}}
{{--            </div>--}}
{{--            <div class="col-lg-8 align-self-baseline">--}}
{{--                <p class="text-white text-opacity-75 mb-5">We are here with the mission to provide a comprehensive and--}}
{{--                    diverse source--}}
{{--                    of historical information, encompassing both national history and other aspects of history, such as--}}
{{--                    landmarks, artifacts, sports, and art.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{--    start mission--}}

<main>
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>About Us</h3>
                                </div>
                            </div>
                        </div>
                      <div class="mt-5 ">
                        <p class="text-muted mb-0 text-justify" style="font-size: 1.2rem">We are to help people explore and
                            discover the
                            history of everything in the
                            world, from nations to cultures, from ancient artifacts to arts and sports.</p>
                        <p class="text-muted mb-0 text-justify" style="font-size: 1.2rem;">We respect
                            the
                            diversity and richness of history. We are committed to delivering reliable and engaging
                            information to our users. We encourage learning and interaction within the historical
                            community.</p>
                        <p class="text-muted mb-0 text-justify" style="font-size: 1.2rem">We regularly organize historical
                            exhibitions to
                            provide an exciting learning experience for everyone. Additionally, we offer opportunities for
                            readers to contribute articles on history and share their knowledge with the community.</p>
                      </div>
                 </div>
                </div>

                @include("user.layouts.sidebar")
            </div>
        </div>
    </div>
</main>

@endsection
