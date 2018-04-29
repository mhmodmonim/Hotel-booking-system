@extends('layouts.app')

@section('content')
    <body class="animsition">


    @include('layouts.side')


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{asset('ui/images/slide1-02.jpg')}});">
        <h2 class="tit6 t-center">
            Checkout
        </h2>
    </section>

<section class="checout">
    <div class="container">
    <div class="row mt-5">
        <div class="col-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0hyxfcFGxMKKgSZ7XtdxymG5AMBnwNdgetg9YZCaZ3EFl3oCqKA" class="img-thumbnail" alt="">
        </div>
        <div class="col-6">
            <b>Price: </b> <h3>{{ (float) $room->price * 100 }}$</h3>
            <b>Capacity: </b> <h3>{{$room->capacity}}</h3>
        </div>
    </div>

        <h2 class="mt-3 jumbotron"> Kindly , continue your booking , choose your number of accompanies and verify your payment </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('failure'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <p> enter the value again</p>
            </div>
        @endif

        <form action="{{route('payment', $room->id)}}" method="POST" class="mt-5">
            {{csrf_field()}}
            <div class="form-group">
                <input type="number" class="form-control" name="accompany" placeholder="enter the number of your accompanies" max="3">
            </div>
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_u4z63tALQEHdpxzfSthBLiPu"
                    data-amount="{{ (float)$room->price * 100 * 100}}"
                    data-name="Stripe.com"
                    data-description="Example charge"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-zip-code="true">
            </script>
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>



    <!-- Footer -->
    <footer class="bg1">
        <div class="container p-t-40 p-b-70">
            <div class="row">
                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-33">
                        Contact Us
                    </h4>

                    <ul class="m-b-70">
                        <li class="txt14 m-b-14">
                            <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            8th floor, 379 Hudson St, New York, NY 10018
                        </li>

                        <li class="txt14 m-b-14">
                            <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            (+1) 96 716 6879
                        </li>

                        <li class="txt14 m-b-14">
                            <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                            contact@site.com
                        </li>
                    </ul>

                    <!-- - -->
                    <h4 class="txt13 m-b-32">
                        Opening Times
                    </h4>

                    <ul>
                        <li class="txt14">
                            09:30 AM – 11:00 PM
                        </li>

                        <li class="txt14">
                            Every Day
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-33">
                        Latest twitter
                    </h4>

                    <div class="m-b-25">
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
                        <a href="#" class="txt15">
                            @colorlib
                        </a>

                        <p class="txt14 m-b-18">
                            Activello is a good option. It has a slider built into that displays the featured image in the slider.
                            <a href="#" class="txt15">
                                https://buff.ly/2zaSfAQ
                            </a>
                        </p>

                        <span class="txt16">
							21 Dec 2017
						</span>
                    </div>

                    <div>
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
                        <a href="#" class="txt15">
                            @colorlib
                        </a>

                        <p class="txt14 m-b-18">
                            Activello is a good option. It has a slider built into that displays
                            <a href="#" class="txt15">
                                https://buff.ly/2zaSfAQ
                            </a>
                        </p>

                        <span class="txt16">
							21 Dec 2017
						</span>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-38">
                        Gallery
                    </h4>

                    <!-- Gallery footer -->
                    <div class="wrap-gallery-footer flex-w">
                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
                            <img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="end-footer bg2">
            <div class="container">
                <div class="flex-sb-m flex-w p-t-22 p-b-22">
                    <div class="p-t-5 p-b-5">
                        <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                    </div>

                    <div class="txt17 p-r-20 p-t-5 p-b-5">
                        Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>
@endsection