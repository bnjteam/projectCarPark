@extends('layouts.app')
@push('style')


<style >
	.block{
	margin: 100px;
	margin-top: 40PX;
	}
	.blockpayment{
	margin: 10px 110px 10px 110px;
	margin-left:35%;
		}
	#b1{
		width: 510px;
	}
	#error{
		width: 500px;
	}
	.spin
{
  background: #444; /* outline */
  > *
  {
    background: #EEE; /* hand */
  }
}


	
</style>
@endpush

@section('content')

<form action="/payments/{id}" method="post">
	@csrf
	@method('PUT')
	<div class="block">


<div class="blockpayment">
	
	<div class="">
		<label for="bt-exp-month" class="no-wrap" style="font-size: 30px">PAYMENT DETAILS
					
				</label>
				@if ($errors->any())
    <div class="alert alert-danger" id="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
</div>
<div class="form-group">
	
</div>
<div class="row">
	<div class="col-md-6 text-align-md-right" style="display:inline-block;"> 
		<img src="https://static1.squarespace.com/static/5600504ae4b0dbc400a4ac20/t/58fa7ba429687fad40c97378/1492810694353/" alt="Workplace" usemap="#workmap" width="250" height="30">
		
		<div class="form-group">
			</div>
	</div>
</div>
	<div id="credit-card-fields" class="non-paypal">
	<div>
		<div class="row">
			<div class="col-xs-12 form-group">
				<label for="bt-number">  CARD NUMBER
					</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-number" name="card" 	 class=" braintree-field form-control" placeholder="Your Card Number" style="width:540px;">
					{{$errors->first('card')}}
				</div>
			</div>
			<div class="col-xs-6 col-md-4 form-group" style=" margin-left: -15px">
				<label for="bt-exp-month" class="no-wrap">EXPIRATION DATE (MM/YYYY)
					
				</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-exp-month" data-field-name="expirationMonth" data-braintree-name="expiration_month" name="month" class=" braintree-field form-control" placeholder="Month" style="width:150px;">
					{{$errors->first('month')}}
					{{$errors->first('year')}}

				</div>
			</div>
			<div class="col-xs-6 col-md-4 form-group bt-exp-year-wrap">
				<label for="bt-exp-year">&nbsp;
					
				</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-exp-year" data-field-name="expirationYear" data-braintree-name="expiration_year" name="year" class=" braintree-field form-control" placeholder="Year" style="width:150px; margin-left: -100px">
					
				</div>
			</div>
			<div class="col-xs-5 col-md-3 col-md-offset-1 form-group cvv-label" style=" margin-left: -150px" >
				<label for="bt-cvv">CVV:&nbsp;
					
				</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-cvv" data-field-name="cvv" data-braintree-name="cvv"  name="cvv" class=" braintree-field form-control" placeholder="123">
					{{$errors->first('cvv')}}
				</div>
			</div>
			{{--<div class="col-xs-7 col-md-5 form-group" style=" margin-left: -15px">
				<label for="bt-postal-code">ZIP CODE
					
				</label>
				<div class="form-field-container">
					<input type="text" value="" id="bt-postal-code" data-field-name="postalCode" class=" braintree-field form-control" placeholder="Your Zip">
				</div>
			</div>--}}
			
		</div>
		<div class="col-xs-5 col-md-3 col-md-offset-1 form-group cvv-label" style=" margin-left: -30px" >
		<label for="bt-cvv">Package</label>
		<input class="form-control" id="readOnlyInput" type="text" name="package" value="{{$object}}" readonly="">

	</div>
	</div>


	
	
		<button type="submit" class=" btn btn-success" id="b1">Confirm</button>
	
	
		
	
	
	
	</div>
</div>

</div>


</form>

@endsection