@extends("app")

@section("css")
.hero-wrap{
height:380px;
display:flex;
justify-content:center;
align-items:center;
width:100%;
}

h1{
font-size: 6vw !important;
}

.pt-5 p{
font-size: 3.5vw !important;
}


.row {
  display: flex;
  justify-content: center;
} 

.last-vistores, .top-countries {
  align-items: center;
  width: 100%; 
}
 
.last-vistores tr, .top-countries tr {
  display: flex;
  width: 100%;
  justify-content: space-between;
  padding: 5px 0;
}

.last-vistores th, .last-vistores td,
.top-countries th, .top-countries td {
  width: 25%;
  text-align: center;
}



.fas{
font-size:40px;
color:#fff;
}
@endsection

@section("header")
<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
  
	        <center><div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text text-center pt-5 mt-md-5">
	   
	            <h1 class="mb-5">{{env('APP_URL')}}/{{$link->slug}}</h1>
	            <p class="mb-4">{{$link->url}}</p>
							<div class="ftco-counter ftco-no-pt ftco-no-pb">
			        	<div class="row">
				          
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<i class="fas fa-chart-bar"></i>
				              	</div>
				              	<div class="desc text-left">
					                <strong class="number" data-number="{{$clicks_count}}">0</strong>
					                <span>{{ __('Clicks') }}</span>
					              </div>
				              </div>
				            </div>
				          </div>
				          
				        </div>
			        </div>
	          </div>
	        </div>
	    	</div>
@endsection

@section("content")

{{-- LAST visitors --}}
	<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
         
            <h2 class="mb-0">{{ __('Last 5 visitors') }}</h2>
          </div>
        </div>
        
        <div class="row">
                  	<div class="col-md-7 ftco-animate">
                  	  <ul class="category text-center">
                  	    <table class="last-vistores">
                  	   
                  	      <th>Ip</th>
                  	      <th>{{ __('country') }}</th>
                  	      <th>{{__('Time')}}</th>
                  	    @foreach($lastClicks as $l)
                  	    <tr>
                  	     
                  	      <td>
                  	        {{$l->ip}}
                  	      </td>
                  	      <td>
                  	        {{$l->country}}
                  	      </td>
                  	      <td>{{$l->created_at->diffForHumans()}}</td>
                  	      </tr>
                  	  @endforeach
                  	  </table>
                  	  </ul>
                  	</div>
        </div>

{{-- Popular countries --}}
<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
         
            <h2 class="mb-0">{{ __('Top countries') }}</h2>
          </div>
        </div>
        
        <div class="row">
                  	<div class="col-md-7 ftco-animate">
                  	  <ul class="category text-center">
                  	    <table class="last-vistores">
                  	      <th>#</th>
                  	      <th>{{ __('country') }}</th>
                  	      <th>{{ __('Clicks') }}</th>
                  	      
                  	    @foreach($topCountries as $i => $t)
                  	    <tr>
                  	      <td>{{$i+1}}</td>
                  	      <td>
                  	        {{$t->country}}
                  	      </td>
                  	      <td>
                  	        {{$t->total}}
                  	      </td>
                  	      
                  	      </tr>
                  	  @endforeach
                  	  </table>
                  	  </ul>
                  	</div>
        </div>
@endsection