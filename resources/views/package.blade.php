@extends('layouts.app')
@push('style')

<style >

.flex-container {
  display: flex;
  
}

.flex-container > div {
  background-color: #CCCCCC;
  	
  margin-left:30px; 
  width: 345px;
  font-size: 30px;
  margin-bottom: 170px;
}
.block{
	text-align: center;
}
.price{
	text-align: center;
	background-color:#778899 ; 
}
#button{
	width: 320px;
	height: 45px;
}
.head{
	font-size: 50px;
	margin-left: 40px;
}
.font{
	font-size: 20px;
}
</style>
@endpush
@section('content')
<div class="head">
	<label>Package</label>
</div>
<div class="flex-container">

  <div>
  	<table class="table">
    <thead>
      <tr>
        <th class="block">None</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="price">20 Bath/Hour</td>
        </tr>
      <tr>
        <td class="font">Time :  9:00AM -8:30 PM </td>
        
      </tr>
      <td class="font">ไม่สามารถจองได้</td>

      
      <tr>
        {{--<td><button  id='button' class="btn btn-success" type="submit">เลือก</button></td>--}}
        
       
      </tr>
    </tbody>
  </table>
  			
  		</div>
  	
  

  <div>
  	<table class="table">
    <thead>
      <tr>
        <th class="block">Daily</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="price">100 Bath/Day</td>
        
      </tr>
      <tr>
        <td class="font">Time : 9:00AM -8:30 PM</td>
        
      </tr>
      <tr>
        @if(Auth::user()->type =='daily' )
        <td class="font">สามารถจองได้</td>
        @else
        <td class="font">ไม่สามารถจองได้</td>
        @endif


        
      </tr>
      
      <tr>
        @if(Auth::user()->type =='daily' )
        <td><a href="#"><button  id='button' class="btn btn-success" type="submit" >Now package</button></a></td>
        @else
        <td><a href="/payments/daily"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        

        

       @endif
       
      </tr>
    </tbody>
  </table>
  	</div>
  <div>
  	<table class="table">
    <thead>
      <tr>
        <th class="block">Weekly</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="price">500 Bath/Week</td>
        
      </tr>
      <tr>
        <td class="font">Time : 24 hour</td>
        
      </tr>
      <tr>
         @if(Auth::user()->type =='weekly' )
        <td class="font">สามารถจองได้</td>
        @else
        <td class="font">ไม่สามารถจองได้</td>
        @endif
        
      </tr>
      <tr>
        @if(Auth::user()->type =='weekly' )
        <td><a href="#"><button  id='button' class="btn btn-success" type="submit" >Now package</button></a></td>
        @elseif(Auth::user()->type =='none' )
        <td><a href="/payments/weekly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        @elseif(Auth::user()->type =='monthly' )
        <td><a href="/payments/weekly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        @elseif(Auth::user()->type =='daily' )
        <td><a href="/payments/weekly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>

        

       @endif
       
      </tr>
    </tbody>
  </table>
  </div>
  <div>
  	<table class="table">
    <thead>
      <tr>
        <th  class="block">Monthly</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="price">1500 Bath/Month</td>
        
      </tr>
      <tr>
        <td class="font">Time :24 hour</td>
        
      </tr>
      <tr>
         @if(Auth::user()->type =='monthly' )
        <td class="font">สามารถจองได้</td>
        @else
        <td class="font">ไม่สามารถจองได้</td>
        @endif
        
      </tr>
      <tr>
      	@if(Auth::user()->type =='monthly' )
        <td><a href="#"><button  id='button' class="btn btn-success" type="submit" >Now package</button></a></td>
        @elseif(Auth::user()->type =='none' )
        <td><a href="/payments/monthly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        @elseif(Auth::user()->type =='daily' )
        <td><a href="/payments/monthly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        @elseif(Auth::user()->type =='weekly' )
        <td><a href="/payments/monthly"><button  id='button' class="btn btn-success" type="submit" >Buy Package</button></a></td>
        
        

       @endif
      </tr>
    </tbody>
  </table>
  </div>
</div>


@endsection