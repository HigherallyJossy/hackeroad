
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
    .cart_list{padding:20px 20px 35px 20px;border:1px solid #868686;margin-top:25px;}
    .btn_pay, .btn_pay_stripe, .btn_pay_cash, .btn_pay_credit{
        width: 100%;
        background: #2ca205;
        border: 1px solid #268407;
        padding: 5px;
        font-size: 20px;
        color: #fff;
        transition:0.5s;
    }
    .btn_pay:hover, .btn_pay_stripe:hover, .btn_pay_cash:hover, .btn_pay_credit:hover{
        background:#fff;
        color:#2ca205;
    }
    #selectedform, .cash_area, .credit_area{display:none;}
    .disabled_item{cursor: not-allowed;}
    @media(max-width:470px)
    {
        .user_action {padding: 6px 0px 6px 0px;height: auto;}
        .checkround_user {left: 10px;}
    }
</style>
<body>
	<div class="container">
        <div class="ct-preloader" style="margin-top:20px;">
            <div class="ct-preloader-inner">
                <div class="ct-preloader-logo">
                <a href="{{ url('/') }}"> <img src="{{ asset('assets/images/products/logo.png') }}" alt=""
                        style="width:230px;"></a>
                                    
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
                                    <select class="form-control billing_country billiing_detail" id="user_country"  name="country">                                        
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US" selected>United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Address</label>
                                    <input type="text" class="form-control billing_address billiing_detail" name="address" require>
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">Zip Code</label>
                                    <input type="text" class="form-control billing_zip billiing_detail" id="user_zip" value="" name="zip">
                                </div>
                            </div>
                           
                            <div class="form-group">							
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">City</label>
                                    <input type="text" class="form-control billing_city billiing_detail" id="user_city" value="" name="city">
                                </div>
                                <div class="col-sm-6 mb-20">
                                    <label class="control-label" for="accountNumber">State</label>
                                    <input type="text" class="form-control billing_state" id="user_state" value="" name="state">
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
                                            <img src="./assets/images/stripe.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset="">
                                            <input type="radio" class="approved"  name="paymethod" checked value="stripe">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Paypal</span>
                                            <img src="./assets/images/paypal.jpg" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset=""> 
                                            <input type="radio" class="approved" name="paymethod" value="paypal">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Cash</span>
                                            <img src="./assets/images/westerngram.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset=""> 
                                            <input type="radio" class="approved"  name="paymethod" value="cash">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="user_action btn-approved">
                                            <span class="" style="font-size: 20px;line-height: 40px;margin-left:35px;font-family:arial;">Credit card</span>
                                            <img src="./assets/images/credit.png" style="float:right;height: 43px;margin-right: 10px;" alt="" srcset="">
                                            <input type="radio" class="approved"  name="paymethod" value="credit">
                                            <span class="checkround_user"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                            
					</div>
					<div class="col-md-6">						
						<div class="cart_list">
                            <p>
                                <span>
                                    <svg aria-hidden="true" style="height:20px;" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-3x"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z" class=""></path></svg>
                                </span>
                                <span style="font-size:24px;">Cart summary</span>
                            </p> 
                           
                                <div>
                                    <div>
                                       @for ($i = 0; $i < count($name); $i++)
                                           <p class="ct-cart__product-body"><span class="ct-cart__product-name"> {{ $name[$i] }} </span>:&nbsp; &nbsp;<span class="ct-cart__product-price">{{ $price[$i] }}</span>&nbsp;&times;&nbsp;<span class="ct-cart__product-count">{{ $count[$i] }}</span></p>              
                                       @endfor
                                                                   
                                    </div>                                   
                                </div>
                            <div>
                                <label for="" style="float:right;font-size:22px;">Total: <span class="ct-cart__product-total"> {{ $total_price }} </span> </label>
                            </div>                            
                        </div>
                        <br>
                        <div style="text-align:center;">
                            <p style="font-size:16px;">
                                <input type="checkbox" name="" id="agree_terms" checked>
                                By clicking the button, you agree to the <a href="{{ route('terms') }}" target="_blank">Terms and Condition</a>
                            </p>
                        </div>
                        <form action="{{ route('payment') }}" id="selectedform" method="post">
                        @csrf
                            <input type="hidden" class="form-control" name="total_price" value="{{ $total_price }}" >
                                                      
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
                                                <label class="col-sm-4 control-label" for="accountNumber">Payment Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="price" value="{{ $total_price }}" disabled>
                                                </div>
                                            </div>
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
                        <div class="cash_area">                           
                            <form role="form" action="{{ route('cashpayment') }}" method="post" class="" id="cash-form">
                                @csrf
                                <fieldset>
                                    <div class="row">					
                                        <div class="col-md-12">		
                                            <div class="form-group" style="padding:20px;">
                                                <p><b>Please send to: roee ben shushan</b></p>
                                                <p><b>Location: Ashkelon, israel</b></p>  
                                                <p>Thanks for the info, we will get back to you.</p>  
                                            </div>				
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="">Full name</label>
                                                <div class="col-sm-8" style="margin-bottom:20px;">
                                                    <input type="text" class="form-control cash_field" name="cash_fullname" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="">Country full address</label>
                                                <div class="col-sm-8" style="margin-bottom:20px;">
                                                    <input type="text" class="form-control cash_field" name="cash_address" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="">Tracking number</label>
                                                <div class="col-sm-8" style="margin-bottom:20px;">
                                                    <input type="text" class="form-control cash_field" name="trackingnumber" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="">Payment method</label>
                                                <div class="col-sm-8" style="margin-bottom:20px;">
                                                    <select class="form-control cash_field" name="paymentmethod">
                                                        <option value=""></option>
                                                        <option value="western union">western union</option>
                                                        <option value="money gram">money gram</option>
                                                    </select>
                                                </div>
                                            </div>     
                                            <div class="form-group">
                                                <div class="" style="text-align:center;margin-top:20px;padding:15px;">
                                                    <button type="submit" class="btn_pay_cash btn_price_type btn_get_detail">Pay Now</button>
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
                        <div class="credit_area">                           
                            {{-- <form role="form" action="{{ route('creditpayment') }}" method="post" class="" id="credit-form">
                                @csrf --}}
                                <input type="hidden" class="form-control" name="total_price" value="{{ $total_price }}" >
                                                      
                                <input type="hidden" name="email" class="user_email" value="">
                                <input type="hidden" name="user_name" class="user_name" value="">
                                <input type="hidden" name="phonenumber" class="user_phonenumber" value="">
                                <input type="hidden" name="address" class="user_address" value="">
                                <input type="hidden" name="zip" class="user_zip" value="">

                                <div class="form-group">
                                    <div class="" style="text-align:center;margin-top:20px;">
                                        {{-- <button type="button" name="pay" class="btn_pay_credit btn_get_detail">Pay Now</button> --}}
                                        <a target="_blank" style="display:block;text-decoration: none;" href="https://pay.tranzila.com/daniel1982" class="btn_pay_credit btn_get_detail">Pay Now</a>
                                    </div>							
                                </div>
                            {{-- </form>                            --}}
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
           
            $(".ct-cart__product-body").each(function(){
                var name = $(this).find(".ct-cart__product-name").html();
                var price = $(this).find(".ct-cart__product-price").html();
                var count = $(this).find(".ct-cart__product-count").html();
                
                $("#payment-form").append(`
                <input type="hidden" name="name[]" value="`+ name +`">
                `);
                $("#cash-form").append(`
                <input type="hidden" name="name[]" value="`+ name +`">
                `);
                $("#selectedform").append(`
                <input type="hidden" name="name[]" value="`+ name +`">
                `);

                $("#payment-form").append(`
                <input type="hidden" name="price[]" value="`+ price +`">
                `);
                $("#cash-form").append(`
                <input type="hidden" name="price[]" value="`+ price +`">
                `);
                $("#selectedform").append(`
                <input type="hidden" name="amount[]" value="`+ price +`">
                `);

                $("#payment-form").append(`
                <input type="hidden" name="count[]" value="`+ count +`">
                `);
                $("#cash-form").append(`
                <input type="hidden" name="count[]" value="`+ count +`">
                `);
                $("#selectedform").append(`
                <input type="hidden" name="quantity[]" value="`+ count +`">
                `);
                        
            });
            

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
                        $('.cash_area').css("display","none");
                        $('.credit_area').css("display","none");
                        
                    break;
                    case("stripe"):            
                        $("#selectedform").css("display","none");
                        $('.cash_area').css("display","none");
                        $('.stripe_area').fadeIn("slow");
                        $('.credit_area').css("display","none");
                    break;
                    case("credit"):                    
                        $("#selectedform").css("display","none"); 
                        $('.stripe_area').css("display","none");                        
                        $('.cash_area').css("display","none");
                        $('.credit_area').fadeIn("slow");
                    break;
                    case("cash"):
                        $("#selectedform").css("display","none"); 
                        $('.stripe_area').css("display","none");
                        $('.cash_area').fadeIn("slow");
                        $('.credit_area').css("display","none");
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
            $(".btn_pay_credit").on('click',function(){
                var checked = checkvalidation();
                if(checked)
                {
                    // $('#credit-form').submit();
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