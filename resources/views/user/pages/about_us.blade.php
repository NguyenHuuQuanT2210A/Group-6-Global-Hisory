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



    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"  style="background-image: url(https://www.nea.org/sites/default/files/styles/1920wide/public/legacy/2018/06/ap_world_history-1-e1529948595658.jpeg?itok=1BQ4XgqU);">
        <h2 class="tit6 t-center">
            About Us
        </h2>
    </section>


    <!-- Our Story -->
    <section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		<span class="tit2 t-center">
			Global History
		</span>

        <h3 class="tit3 t-center m-b-35 m-t-5">
            Our Story
        </h3>

        <p class="t-center size32 m-l-r-auto">
            Global History is a website dedicated to world history, offering readers the opportunity to explore and learn about the history of the world. The website provides diverse information on important events, famous figures, and the cultures and societies of countries around the globe.

            With a global perspective, Global History helps readers gain a better understanding of the development and interaction between different cultures and nations. Additionally, the website collects and analyzes historical data to provide insightful perspectives and analysis on the impact and changes brought about by history to the modern world.

            With accurate and accessible information, Global History aims to inspire readers and ignite curiosity about global history. By providing a multidimensional knowledge base, the website hopes to contribute to the dissemination of understanding and awareness of the development of humankind through different eras, and ultimately foster exchange and cooperation among nations and peoples.
        </p>
    </section>


    <!-- Video -->
    <section class="section-video parallax100" style="background-image: url(https://www.examsegg.com/wp-content/uploads/2021/10/world-history-quiz.jpg);">
        <div class="content-video t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Our Video
            </h3>

            <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
                <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                    <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>


    <!-- Delicious & Romantic-->
    <section class="bg1-pattern p-t-120 p-b-105">
        <div class="container">
            <!-- Delicious -->
            <div class="row">
                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-delicious t-center">
						<span class="tit2 t-center">
							HISTORY
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            LIBRARY
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            The history library is a treasure trove of knowledge, with books, documents, and resources that bring the past to life. It offers insights into different historical periods, allowing us to explore and learn from the experiences of those who came before us. Whether you're a student, researcher, or history enthusiast, the history library is a valuable resource for understanding our collective past and its impact on the present. It serves as a gateway to a world of information and discovery, fostering a deeper appreciation for the complexities of human history
                        </p>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Biblioth%C3%A8que_de_l%27Assembl%C3%A9e_Nationale_%28Lunon%29.jpg/1280px-Biblioth%C3%A8que_de_l%27Assembl%C3%A9e_Nationale_%28Lunon%29.jpg" alt="IMG-OUR">
                    </div>
                </div>
            </div>


            <!-- Romantic -->
            <div class="row p-t-170">
                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-romantic size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="https://ss-images.saostar.vn/wwebp700/pc/1632805934126/saostar-c9dulsf4zkhrp0x3.jpg" alt="IMG-OUR">
                    </div>
                </div>

                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-romantic t-center">
						<span class="tit2 t-center">
							Beautifull
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            Paint History
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            Fusce iaculis, quam quis volutpat cursus, tellus quam varius eros, in euismod lorem nisl in ante. Maecenas imperdiet vulputate dui sit amet vestibulum. Nulla quis suscipit nisl.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/watch?v=yLCNtf87YKw" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>



    {{--<!-- Banner -->--}}
    {{--<div class="parallax0 parallax100" style="background-image: url(https://ss-images.saostar.vn/wwebp700/pc/1632805934126/saostar-mzcwfczbo2yjcra0.jpg);">--}}
    {{--    <div class="overlay0-parallax t-center size33"></div>--}}
    {{--</div>--}}


    {{--<!-- Chef -->--}}
    {{--<section class="section-chef bgwhite p-t-115 p-b-95">--}}
    {{--    <div class="container t-center">--}}
    {{--			<span class="tit2 t-center">--}}
    {{--				Meet Our--}}
    {{--			</span>--}}

    {{--        <h3 class="tit5 t-center m-b-50 m-t-5">--}}
    {{--            Chef--}}
    {{--        </h3>--}}

    {{--        <div class="row">--}}
    {{--            <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">--}}
    {{--                <!-- -Block5 -->--}}
    {{--                <div class="blo5 pos-relative p-t-60">--}}
    {{--                    <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">--}}
    {{--                        <a href="#"><img src="images/avatar-02.jpg" alt="IGM-AVATAR"></a>--}}
    {{--                    </div>--}}

    {{--                    <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">--}}
    {{--                        <a href="#" class="txt34 dis-block p-b-6">--}}
    {{--                            Peter Hart--}}
    {{--                        </a>--}}

    {{--                        <span class="dis-block t-center txt35 p-b-25">--}}
    {{--								Chef--}}
    {{--							</span>--}}

    {{--                        <p class="t-center">--}}
    {{--                            Donec porta eleifend mauris ut effici-tur. Quisque non velit vestibulum, lob-ortis mi eget, rhoncus nunc--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">--}}
    {{--                <!-- -Block5 -->--}}
    {{--                <div class="blo5 pos-relative p-t-60">--}}
    {{--                    <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">--}}
    {{--                        <a href="#"><img src="images/avatar-03.jpg" alt="IGM-AVATAR"></a>--}}
    {{--                    </div>--}}

    {{--                    <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">--}}
    {{--                        <a href="#" class="txt34 dis-block p-b-6">--}}
    {{--                            Joyce Bowman--}}
    {{--                        </a>--}}

    {{--                        <span class="dis-block t-center txt35 p-b-25">--}}
    {{--								Chef--}}
    {{--							</span>--}}

    {{--                        <p class="t-center">--}}
    {{--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies felis a sem tempus tempus.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">--}}
    {{--                <!-- -Block5 -->--}}
    {{--                <div class="blo5 pos-relative p-t-60">--}}
    {{--                    <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">--}}
    {{--                        <a href="#"><img src="images/avatar-05.jpg" alt="IGM-AVATAR"></a>--}}
    {{--                    </div>--}}

    {{--                    <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">--}}
    {{--                        <a href="#" class="txt34 dis-block p-b-6">--}}
    {{--                            Peter Hart--}}
    {{--                        </a>--}}

    {{--                        <span class="dis-block t-center txt35 p-b-25">--}}
    {{--								Chef--}}
    {{--							</span>--}}

    {{--                        <p class="t-center">--}}
    {{--                            Phasellus aliquam libero a nisi varius, vitae placerat sem aliquet. Ut at velit nec ipsum iaculis posuere quis in sapien--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}



@endsection
