@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-10" style="padding-left:200px">
		<form action="/payments/{id}" method="post">
			@csrf
			@method('PUT')
				<label for="bt-exp-month" class="no-wrap" style="font-size: 30px">PAYMENT DETAILS</label>
				@if ($errors->any())
					<div class="alert alert-danger" id="error">
						<ul>

						@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
				@endif
				<div class="row">
					<div class="col-md-6 text-align-md-right" >

						<img src="https://static1.squarespace.com/static/5600504ae4b0dbc400a4ac20/t/58fa7ba429687fad40c97378/1492810694353/" alt="Workplace" usemap="#workmap" width="250" height="30">
					</div>
				</div>

				<div class="row " style="margin-left:2px">
					CARD NUMBER
				</div>
				<div class="row col-12">
					<input type="tel" value="" id="bt-number" name="card" 	 class=" braintree-field form-control" placeholder="Your Card Number (16-digits)" style="width:540px;">
					<div class="">
						<label for="bt-exp-month" class="no-wrap">EXPIRATION DATE (MM/YYYY)
						</label>
						<label for="bt-exp-month" class="no-wrap" style="margin-left:30px">ZIP CODE
						</label>
						<div class="row">
							<div class="col-2">
									<input type="tel" value="" id="bt-exp-month" data-field-name="expirationMonth" data-braintree-name="expiration_month" name="month" class=" braintree-field form-control" placeholder="Month">
							</div>
							<div class="col-2">
									<input type="tel" style="margin-left:-30px" value="" id="bt-exp-year" data-field-name="expirationYear" data-braintree-name="expiration_year" name="year" class=" braintree-field form-control" placeholder="Year" >
							</div>
							<div class="col-2">
									<input type="tel" style="margin-left:0px" value="" id="bt-cvv" data-field-name="cvv" data-braintree-name="cvv"  name="cvv" class=" braintree-field form-control" placeholder="123">
							</div>
						</div>
						<div class="">
							<label for="bt-exp-month" class="no-wrap">Package

							</label>
							<input class="form-control col-5" id="readOnlyInput" type="text" name="package" value="{{$object}}" readonly="">

						</div>
					</div>
				</div>
							@if (Auth::user()->level=="admin" ||
									(Auth::user()->level=="member" && $object!='daily' && $object!='weekly' && $object!='monthly') ||
									(Auth::user()->level=="parking_owner" && $object!='small' && $object!='medium' && $object!='large')
									)
									<a class=" btn btn-success disabled " id="b1" style="margin-top:20px">Confirm</a>
							@else
									<button type="submit" class=" btn btn-success" id="b1" style="margin-top:20px">Confirm</button>
							@endif
						</div>
		</form>
		</div>
	</div>
</div>

@endsection
