<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
  <style>
    body {
    
    line-height: 1.8;
	color: black;
	background: black;
    
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
 	height: 70vh;
    background-image: url(./assets/imge/homebackground.jpg);
    background-repeat: no-repeat;
    background-position-x: center;
    background-size: 100% 100%;
    background-color: #555;
    color: #ffffff;
  }
  .login_body{
	width: 500px;
    margin: 0 auto;   
    height: 80vh;
  }
  .bg-4 { 
    background-color: #2f2f2f; 
    color: #fff;
  }  
  .center{
      text-align: center;
      background-color: black;
  }
  .logo{
    width: 100%;   
    background-color: #555;
    
  }
  .input-group{
      margin:0 auto;
      width: 75%; 
      padding:1%;
      height: 50px;        
  }
  .btn-default {
    color: #fff;
    background-color: #fff;   
    border: 2px solid #ff0000;
}
 .form-controls, .input-group-addon{
    background: transparent;
    border:2px solid red;   
    color: rgb(167, 7, 7); 
	height: 50px;	
	border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  }
  .form-controls{
	font-size: 30px;  
	position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;  
  }
  .input-group-addon{
    color: #a91313; 
  }
  .logo_img{width:150px;}
  .verify {
    margin-top:10%;
  }
  .price{
	  margin-top: 5%;
  }
  .switch {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;	
	margin: auto 1%;
  }
  
  .switch input { 
	opacity: 0;
	width: 0;
	height: 0;
  }
  
  .slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color:black;
	-webkit-transition: .4s;
	transition: .4s;
  }
  
  .slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
  }
  
  
  
  input:focus + .slider {
	box-shadow: 0 0 1px rgb(3, 3, 3);
  }
  
  input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
  }
  
 
  .slider.round {
	border-radius: 34px;
  }
  
  .slider.round:before {
	border-radius: 50%;
  }
  input {outline: none;box-shadow: none;}
    .btn {
    background-color: red;
     height: 50px;
	width: 73%;}
	
	.btn-submit{
		margin-top:15px;
      color: #f5f5f5;
      text-decoration: none;
	  font-size: 30px;
	  transition: 0.6s;
	  border:2px solid #ff0000;
	}
	.btn-submit:hover{background: transparent;color:red;}
    ::placeholder {
  color: red;
}
.lang{
  background-color: black;
    display: inline-flex;
    width: 100%;
    text-align: center;
    padding-top: 3%;
    padding-bottom: 3%;
}
.en{
  padding-right: 32%;
    width: 47%;
  color: red;
  
}
.img{
  width: 30%;
}
@media screen and (max-width: 520px) {
  .input-group {
    width: 80%;
  }
  .btn {
    width:77% ;
  }
  .en{ 
    width: 41%;  
  }
  
}

@media screen and (max-width:650px){
  .img{
  width: 50%;
}
.verify {
    margin-top:30%;
  }
 .login_body{
	 width:100%;
 }
  
}
@media screen and (min-width: 1150px) {
  .bg-1 {
   
  }
}
@media screen and (max-height: 600px) {
  .bg-1 {
    
  }
}

   
  </style>
</head>
<body>
 
<div class="lang">
  
  <h3 class="en"  >English</h3>
  
  <!-- Default switch -->
 
  <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
  </label>
</div>
<section class="login_body">
	<div class="logo"><div class="center"><img class="logo_img" src="./assets/imge/logo.jpg"    /></div></div>
	<!-- First Container -->
	<div class="container-fluid bg-1 text-center">
		<div class="verify">
			@if(!empty(session('success')))
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> {{ session('success') }}
			</div>
			@endif
			<form action="{{ route('user.login') }}">
				@csrf
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o"style="font-size:30px"></i></span>
					<input id="email" type="text" class="form-controls" name="email" placeholder="Email" style="border-left: none;">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"style="font-size:30px;padding: 0 5px;"></i></span>
					<input id="password" type="password" class="form-controls" name="password" placeholder="Password"style="border-left: none;">
				</div>
				<button type="submit" class="btn btn-submit">SUBMIT</button>
			</form>
		</div>  
		<div ><div class="price"><img src="./assets/imge/price.png"    width="30%"/></div></div>
	</div>
</section>
	
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  
</footer>
</body>
</html>
