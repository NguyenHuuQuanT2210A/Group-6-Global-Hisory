@extends("user.layouts.app")
@section("after_css")
    <style>
        .submit-post{
            float: right;
            margin: 0 20px;
            padding: 12px 25px;
            border-radius: 3px;
        }
        .payment{
            padding-left: 8px;
        }
    </style>
@endsection
@section("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(https://assets-global.website-files.com/6048aaba41858510b17e1809/607474d55c073509225d156e_6048aaba418585fbbf7e1d13_forums.jpeg);">
        <h2 class="tit6 t-center">
            Donate
        </h2>
    </section>
    <div class="container-fluid pb-4 pt-4 paddding" style="position: relative">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <form action="{{url("payment/pay")}}" method="get" >
                        <div style="padding: 1.25rem 1.25rem 0 1.25rem;" >
                            <div class="form-group">
                                <label class="payment" for="name">Name</label>
                                <input  type="text" name="name" value="{{old("name")}}" class="form-control"  placeholder="Enter Name" required>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="payment" for="email">Email</label>
                                <input type="text" name="email" value="{{old("email")}}" class="form-control"  placeholder="Enter Email" required>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="payment" for="exampleInputPassword1">Amount of money</label>
                                <input type="number" value="{{old("amount")}}" name="amount" class="form-control"  placeholder="Amount of money">
                                @error("amount")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input__checkbox">
                                <label  class="payment" for="payment">
                                    COD
                                    <input style="box-shadow: 0 0 0 2px transparent;" name="payment_method" @if(old("payment_method") == "COD") checked @endif value="COD" type="radio" id="cod">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label class="payment" for="paypal">
                                    Paypal
                                    <input style="box-shadow: 0 0 0 2px transparent;" name="payment_method" @if(old("payment_method") == "Paypal") checked @endif value="Paypal" type="radio" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label class="payment" for="paypal">
                                    Momo
                                    <input style="box-shadow: 0 0 0 2px transparent;" name="payment_method" @if(old("payment_method") == "Momo") checked @endif value="Momo" type="radio" id="momo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error("payment_method")
                            <p class="text-danger"><i>{{ $message }}</i></p>
                            @enderror

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary submit-post" >Pay</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

