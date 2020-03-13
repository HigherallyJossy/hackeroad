<!DOCTYPE html>
<html lang="en">
    <head>
        <title>productpage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            body{
                padding: 60px 0;
            }
            .container-fluid{
	                max-width: 1140px;
	                margin: 0 auto;
                }
        </style>
    </head>
    <body>
        <section>
            <div class="content-wrapper"
            <div class="item-container">	
		    	<div class="container">	
		    		<div class="col-md-6">
		    			<div class="product col-md-3 service-image-left">
		    				<center>
		    					<img id="item-display" src="{{ asset('assets/imge/logo.jpg') }}" width="300px"height="300px"alt="">
		    				</center>
		    			</div>
		    		</div>
                
		    		<div class="col-md-7">
		    			<div class="product-title">Corsair GS600 600 Watt PSU</div>
		    			<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
		    			<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
		    			<hr>
		    			<div class="product-price">$ 45</div>
		    			<div class="product-stock">In Stock</div>
		    			<hr>
		    			<div class="btn-group cart">
                            <form action="{{ route('paymentlist') }}" method="post">
                                @csrf
                                {{-- <input type="hidden" value="45" name="price"> --}}
                                <button type="submit" class="btn btn-success">								
                                    Add to cart 
                                </button>
                            </form>		    				
		    			</div>		    			
		    		</div>
		    	</div> 
                </div>
            </div>
            <div class="container-fluid">		
			<div class="col-md-12 product-info">
				<ul id="myTab" class="nav nav-tabs nav_tabs">						
					<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="service-one">
						<section class="container product-info">
							The Corsair Gaming Series 
						</section>
					</div>					
				</div>
				<hr>
			</div>
		    </div>
        </section>
        <section>
            <div class="content-wrapper"
            <div class="item-container">	
		    	<div class="container">	
		    		<div class="col-md-6">
		    			<div class="product col-md-3 service-image-left">
		    				<center>
		    					<img id="item-display" src="{{ asset('assets/imge/logo.jpg') }}"width="300px"height="300px" alt="">
		    				</center>
		    			</div>
		    		</div>
                
		    		<div class="col-md-7">
		    			<div class="product-title">Corsair GS600 600 Watt PSU</div>
		    			<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
		    			<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
		    			<hr>
		    			<div class="product-price">$ 200</div>
		    			<div class="product-stock">In Stock</div>
		    			<hr>
		    			<div class="btn-group cart">
		    				<form action="{{ route('paymentlist') }}" method="post">
                                @csrf
                                <input type="hidden" value="200" name="price">
                                <button type="submit" class="btn btn-success">								
                                    Add to cart 
                                </button>
                            </form>		    			
		    			</div>		    			
		    		</div>
		    	</div> 
                </div>
            </div>
            <div class="container-fluid">		
			<div class="col-md-12 product-info">
				<ul id="myTab" class="nav nav-tabs nav_tabs">						
					<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="service-one">
						<section class="container product-info">
							The Corsair Gaming Series 
						</section>
					</div>					
				</div>
				<hr>
			</div>
		    </div>
        </section>   
        <section>
            <div class="content-wrapper"
            <div class="item-container">	
		    	<div class="container">	
		    		<div class="col-md-6">
		    			<div class="product col-md-3 service-image-left">
		    				<center>
		    					<img id="item-display" src="{{ asset('assets/imge/logo.jpg') }}" width="300px"height="300px" alt="">
		    				</center>
		    			</div>
		    		</div>
                
		    		<div class="col-md-7">
		    			<div class="product-title">Corsair GS600 600 Watt PSU</div>
		    			<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
		    			<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
		    			<hr>
		    			<div class="product-price">$ 300</div>
		    			<div class="product-stock">In Stock</div>
		    			<hr>
		    			<div class="btn-group cart">
		    				<form action="{{ route('paymentlist') }}" method="post">
                                @csrf
                                <input type="hidden" value="300" name="price">
                                <button type="submit" class="btn btn-success">								
                                    Add to cart 
                                </button>
                            </form>		    			
		    			</div>		    			
		    		</div>
		    	</div> 
                </div>
            </div>
            <div class="container-fluid">		
			<div class="col-md-12 product-info">
				<ul id="myTab" class="nav nav-tabs nav_tabs">						
					<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="service-one">
						<section class="container product-info">
							The Corsair Gaming Series 
						</section>
					</div>					
				</div>
				<hr>
			</div>
		    </div>
        </section> 
    </body>
</html>