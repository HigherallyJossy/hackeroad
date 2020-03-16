
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<title>Payment List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"
		id="bootstrap-css">    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	
	
</head>
<style>
    body{background: #000000;color:#dedede;}
    .form-control{background:transparent;}
    .mb-20{margin-bottom:10px;}
    .paymethodlist li{list-style-type:none;}
    .user_action {
        position: relative;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 20px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        font-family: Poppins-Regular;
        font-size: 0.9rem;
        padding: 6px 0px 6px 20px;
        width: 100%;
        border: 2px solid #868686;
        border-radius: 5px;
        height:60px;
    }
    .input[type=checkbox], input[type=radio] {
        box-sizing: border-box;
        padding: 0;
    }
    .user_action input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .user_action input:checked ~ .checkround_user {
        background-color: #40c229;
        border-color: #32aa1d;
        transition: 0.8s;
    }
    .alert_billing{
        display: none;
        padding:20px;
    }
    .checkround_user {
        position: absolute;
        top: 18px;
        left: 30px;
        height: 15px;
        width: 15px;
        background-color: #dedede;
        border-color: #d0d0d0;
        border-style: solid;
        border-width: 2px;
        border-radius: 50%;
        }
    .has-error{border-color: #ee0000;}
    .paymethodlist{padding:0px;}
    .cart_list{padding:20px 20px 45px 20px;border:1px solid #868686;margin-top:25px;}
    .btn_pay, .btn_pay_stripe, .btn_pay_cash, .btn_pay_paytm{
        width: 100%;
        background: #2ca205;
        border: 1px solid #268407;
        padding: 5px;
        font-size: 20px;
        color: #fff;
        transition:0.5s;
    }
    .btn_pay:hover, .btn_pay_stripe:hover, .btn_pay_cash:hover, .btn_pay_paytm:hover{
        background:transparent;
        color:#2ca205;
    }
    #selectedform, .cash_area, .paytm_area{display:none;}
    .disabled_item{cursor: not-allowed;}
    .ct-preloader-logo{border-bottom: 1px solid #dedede;padding: 10px;}
    @media(max-width:470px)
    {
        .user_action {padding: 6px 0px 6px 0px;height: auto;}
        .checkround_user {left: 10px;}
    }
</style>
<body>
	<div class="container">
        <div class="ct-preloader">
            <div class="ct-preloader-inner">
                <div class="ct-preloader-logo">
                <a href="{{ url('/') }}"> <img src="{{ asset('assets/imge/logo.png') }}" alt=""
                        style="height:60px;"></a>
                                    
            </div>
        </div>
		<div style="margin-top:20px;"></div>
       
		
			<fieldset>
				<div class="row">
                    <div class="col-md-12">
                        <h3>Billing details</h3>
                    </div>
					<div class="col-md-6">
                        <div>                            
                            <div class="form-group">                                
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Full Name</label>
                                    <input type="text" class="form-control billing_name billiing_detail" name="name" require>
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Phone number</label>
                                    <input type="text" class="form-control billing_phonenumber billiing_detail" name="phonenumber" require>
                                </div>
                            </div>
                            <div class="form-group">                                
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Email</label>
                                    <input type="email" class="form-control billing_email billiing_detail" name="email" require>
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Country</label>                                   
                                    <input class="form-control billing_country billiing_detail" id="user_country" value="@if(!empty(session('country'))){{ session('country') }} @endif" require name="country">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Address</label>
                                    <input type="text" class="form-control billing_address billiing_detail" name="address" require>
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Zip Code</label>
                                <input type="text" class="form-control billing_zip billiing_detail" id="user_zip" value="@if(!empty(session('zipcode'))){{ session('zipcode') }} @endif" name="zip">
                                </div>
                            </div>
                           
                            <div class="form-group">							
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">City</label>
                                    <input type="text" class="form-control billing_city billiing_detail" id="user_city" value="@if(!empty(session('city'))){{ session('city') }} @endif" name="city">
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">State</label>
                                    <input type="text" class="form-control billing_state" id="user_state" value="@if(!empty(session('state'))){{ session('state') }} @endif" name="state">
                                </div>
                            </div>	
                        </div>
                            
                        <div>
                            <h3 style="margin-top:20px;">Payment method</h3>
                            <div style="padding:15px;">
                                <ul class="paymethodlist">
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Credit card</span>
                                            <img src="./assets/imge/stripe.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset="">
                                            <input type="radio" class="approved"  name="paymethod" checked value="stripe">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Paypal</span>
                                            <img src="./assets/imge/paypal.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset=""> 
                                            <input type="radio" class="approved" name="paymethod" value="paypal">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>                                   
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Paytm</span>
                                            <img src="./assets/imge/paytm.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset="">
                                            <input type="radio" class="approved" name="paymethod" value="paytm">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                            
					</div>
					<div class="col-md-6">						
						<div class="cart_list">                            
                            <div>
                                <label for="" style="float:right;font-size:22px;">Total: <span class="ct-cart__product-total">$ {{ $total_price }} </span> </label>
                            </div>                            
                        </div>
                        <br>
                        
                        <form action="{!! URL::to('paypal') !!}" id="selectedform" method="post">
                        @csrf
                            <input type="hidden" class="form-control" name="amount" value="{{ $total_price }}" >
                                                      
                            <input type="hidden" name="email" class="user_email" value="">
                            <input type="hidden" name="user_name" class="user_name" value="">
                            <input type="hidden" name="phonenumber" class="user_phonenumber" value="">
                            <input type="hidden" name="address" class="user_address" value="">
                            <input type="hidden" name="zip" class="user_zip" value="">

                            <div class="form-group">
                                <div class="" style="text-align:center;margin-top:20px;">
                                    <button type="button" name="pay" id="btn_pay" class="btn_pay btn_get_detail" disabled>Pay Now</button>
                                </div>							
                            </div>
                        </form> 
                        <div class="stripe_area">                           
                            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation form-horizontal" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf
                                <fieldset>
                                    <div class="row">					
                                        <div class="col-md-12">					
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="accountNumber">Card Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control card-number" size="20" placeholder="Your card number" data-stripe="number" value=""
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="expirationMonth">Expiration Date</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <select class="form-control col-sm-3 card-expiry-month" data-stripe="exp_month" required>
                                                                <option>Month</option>
                                                                <option value="01">Jan (01)</option>
                                                                <option value="02">Feb (02)</option>
                                                                <option value="03">Mar (03)</option>
                                                                <option value="04">Apr (04)</option>
                                                                <option value="05">May (05)</option>
                                                                <option value="06">June (06)</option>
                                                                <option value="07">July (07)</option>
                                                                <option value="08">Aug (08)</option>
                                                                <option value="09">Sep (09)</option>
                                                                <option value="10">Oct (10)</option>
                                                                <option value="11">Nov (11)</option>
                                                                <option value="12" selected="">Dec (12)</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <select class="form-control card-expiry-year" data-stripe="exp_year">         
                                                                <option value="2020" selected="">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="cvNumber">Card CVV</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control card-cvc" placeholder="ex.311" data-stripe="cvc" value="">
                                                </div>
                                            </div>	
                                            <div class="form-group">
                                                <div class="" style="text-align:center;margin-top:20px;padding:15px;">
                                                    <button type="submit" class="btn_pay_stripe btn_price_type btn_get_detail">Pay Now</button>
                                                </div>
                                                <div class="" style="text-align:center;margin-top:20px;">
                                                <?php if(isset($response)){echo $response;} ?> <div
                                                    class='col-sm-offset-3 col-sm-9  text-danger payment-errors'></div>
                                                </div>
                                            </div>					
                                        </div>					
                                    </div>				
                                        
                                </fieldset>
                                <input type="hidden" name="total_price" value="{{ $total_price }}">
                                <input type="hidden" name="email" class="user_email" value="">
                                <input type="hidden" name="user_name" class="user_name" value="">
                                <input type="hidden" name="phonenumber" class="user_phonenumber" value="">
                                <input type="hidden" name="address" class="user_address" value="">
                                <input type="hidden" name="zip" class="user_zip" value="">
                            </form>
                           
                        </div> 
                        
                        <div class="paytm_area"> 
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Something went wrong<br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif    
                                                  
                            <form role="form" action="{{ route('paytm_payment') }}" method="post" class="" id="paytm-form">
                                @csrf
                                <input type="hidden" class="form-control paytm_price" name="total_price" value="{{ $total_price }}" >
                                          
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Name</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Mobile Number</strong>
                                            <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Email Id</strong>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email id">
                                        </div>
                                    </div>                                                      
                                </div>

                                <input type="hidden" name="user_email" class="user_email" value="">
                                <input type="hidden" name="user_name" class="user_name" value="">
                                <input type="hidden" name="phonenumber" class="user_phonenumber" value="">
                                <input type="hidden" name="address" class="user_address" value="">
                                <input type="hidden" name="zip" class="user_zip" value="">

                                <div class="form-group">
                                    <div class="" style="text-align:center;margin-top:20px;">
                                        <button type="button" name="pay" class="btn_pay_paytm btn_get_detail">Pay Now</button>
                                       
                                    </div>							
                                </div>
                            </form>                           
                        </div>   
                        
                        <div class="alert_billing">
                            <div style="border: 1px solid #da1212;padding: 10px;">
                                <p style="margin:0px;text-align:center;">Billing details are require. Please input them.</p>
                            </div>
                        </div>
					</div>					
				</div>			
					
			</fieldset>
			
	</div>
	<script>
        $(document).ready(function(){
            var rate_inr=0;
            var price_usd = $(".paytm_price").val();
            var price_inr = 0;
            app_id="{{ env('EX_ID') }}"; 
           

            try { 
                    uri=encodeURI("http://openexchangerates.org/latest.json?app_id="+app_id);
                    $.get(uri,function(json) {                        
                        rate_inr=json.rates.INR;                        
                        price_inr = Math.ceil(rate_inr*price_usd);
                    },"jsonp");
                }
                catch(err) {  
                    alert("Something is wrong your connection.");
                    location.reload();
                }

            $(".paytm_price").val(price_inr);

            function checkvalidation()
            {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test($(".billing_email").val()))
                {
                    $(".billing_email").addClass("has-error");
                    $(".billing_email").focus();
                    return false;
                }
                
                $(".user_email").val($(".billing_email").val());
                $(".user_name").val($(".billing_name").val());
                $(".user_zip").val($(".billing_zip").val());
                $(".user_phonenumber").val($(".billing_phonenumber").val());
                $(".user_address").val($(".billing_address").val() + " "  + $(".billing_city").val()+ " " + $(".billing_state").val() + " " + $(".billing_country").val()); 
                var check = 0;  
                $(".billiing_detail").each(function(){                
                    if($(this).val() == "")
                    {
                        $(this).addClass("has-error"); 
                        check++;                  
                    }  
                });
                if(check > 0)
                {
                    return false;
                }
                return true;
            }
              

            $(".billiing_detail").bind("keyup change", function(e) {
                $(".alert_billing").fadeOut('slow');
                if($(this).hasClass("has-error"))
                {
                    $(this).removeClass("has-error");
                }
            })

                           
            $(".paymethodlist li label input").on('change',function(){
                var selected = $('input[name=paymethod]:checked').val();
                switch(selected){
                    case("paypal"):  
                        $('.btn_pay').removeAttr("disabled");                
                        $("#selectedform").fadeIn("slow");
                        $('.stripe_area').css("display","none");
                        $('.paytm_area').css("display","none");
                        $('.credit_area').css("display","none");
                        $(".ct-cart__product-total").html("$ "+price_usd);
                        
                    break;
                    case("stripe"):            
                        $("#selectedform").css("display","none");
                        $('.paytm_area').css("display","none");
                        $('.stripe_area').fadeIn("slow");
                        $('.credit_area').css("display","none");
                        $(".ct-cart__product-total").html("$ "+price_usd);
                    break;                   
                    case("paytm"):  
                        $("#selectedform").css("display","none"); 
                        $('.stripe_area').css("display","none");
                        $('.paytm_area').fadeIn("slow");
                        $('.credit_area').css("display","none");
                        $(".ct-cart__product-total").html("₹ "+price_inr);
                    break;
                }
            });
            $(".btn_pay").on('click',function(){
                var checked = checkvalidation();
                if(checked)
                {
                    $('#selectedform').submit();
                }
                else
                {
                    $(".alert_billing").fadeIn('slow');
                    return false;
                }
            });
            $(".btn_pay_cash").on('click',function(){
                var checked = checkvalidation();
                if(checked)
                {
                    var checkcash = 0;
                    $(".cash_field").each(function(){
                        if($(this).val() == "")
                        {
                            $(this).addClass('has-error');
                            checkcash++;                            
                        }
                    });
                    if(checkcash < 1)
                    {
                        $('#cash-form').submit();
                    }
                    else
                    {                        
                        return false;
                    }
                }
                else
                {
                    $(".alert_billing").fadeIn('slow');
                    return false;
                }
            });
            $(".btn_pay_paytm").on('click',function(){
                var checked = checkvalidation();
                if(checked)
                {
                    $('#paytm-form').submit();
                    return true;
                }
                else
                {
                    $(".alert_billing").fadeIn('slow');
                    return false;
                }
            });
            $("#agree_terms").on('change',function(){                
                if(!this.checked) {
                    $('.btn_get_detail').prop('disabled', true);
                }
                else
                {
                    $('.btn_get_detail').prop('disabled', false);
                }               
            });
            $(document).on("click",'.btn_pay_stripe',function(){              
                
            });
        });
    </script>    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
        $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required_plan').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');
         
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test($(".billing_email").val()))
            {
                $(".billing_email").addClass("has-error");
                $(".billing_email").focus();
                return false;
            }
            $(".user_email").val($(".billing_email").val());
            $(".user_name").val($(".billing_name").val());
            $(".user_phonenumber").val($(".billing_phonenumber").val());
            $(".user_zip").val($(".billing_zip").val());
            $(".user_address").val($(".billing_address").val() + " "  + $(".billing_city").val()+ " " + $(".billing_state").val() + " " + $(".billing_country").val()); 
            var check = 0;  
            $(".billiing_detail").each(function(){                
                if($(this).val() == "")
                {
                    $(this).addClass("has-error"); 
                    check++;                  
                }  
            });
            if(check > 0)
            {
                $(".alert_billing").fadeIn('slow');
                return false;
            }

            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
          
          });
          
          function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
          
        });
    </script>
</body>

</html>