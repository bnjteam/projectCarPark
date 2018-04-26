@extends('layouts.app')
@push('style')
<style >
	.block{
	margin: 100px;
	}
	.blockpayment{
	margin: 10px 290px 10px 290px;
	}
	.flex-container {
  display: flex;
  
}

.flex-container > div {
  background-color: #f1f1f1;
  	
  margin-left:30px; 
  width: px;
  font-size: 30px;
}
</style>
@endpush

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<form action="/payments" method="post">
	<div class="block">

<div class="blockpayment">
	<div class="">
		<label for="bt-exp-month" class="no-wrap" style="font-size: 30px">PAYMENT DETAILS
					
				</label>
	
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
					<input type="tel" value="" id="bt-exp-month" data-field-name="expirationMonth" data-braintree-name="expiration_month" class=" braintree-field form-control" placeholder="Month" style="width:150px;">

				</div>
			</div>
			<div class="col-xs-6 col-md-4 form-group bt-exp-year-wrap">
				<label for="bt-exp-year">&nbsp;
					
				</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-exp-year" data-field-name="expirationYear" data-braintree-name="expiration_year" class=" braintree-field form-control" placeholder="Year" style="width:150px; margin-left: -100px">
				</div>
			</div>
			<div class="col-xs-5 col-md-3 col-md-offset-1 form-group cvv-label" style=" margin-left: -150px" >
				<label for="bt-cvv">CVV:&nbsp;
					
				</label>
				<div class="form-field-container">
					<input type="tel" value="" id="bt-cvv" data-field-name="cvv" data-braintree-name="cvv" class=" braintree-field form-control" placeholder="123">
				</div>
			</div>
			<div class="col-xs-7 col-md-5 form-group" style=" margin-left: -15px">
				<label for="bt-postal-code">ZIP CODE
					
				</label>
				<div class="form-field-container">
					<input type="text" value="" id="bt-postal-code" data-field-name="postalCode" class=" braintree-field form-control" placeholder="Your Zip">
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class=" btn btn col-md-2">Confirm</button>
	
	</div>
</div>

</div>

</form>
@endsection