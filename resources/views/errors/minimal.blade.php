
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="map_api_key" content="">
    <meta name="description" content="AdnList is the largest classifieds website where you can post your ad and get response.">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" type="text/css">
    
    
    <link href="{{ asset('assets/css/util.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
	
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>	
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>   
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            #error_page_banner{
                background-image: url(assets/images/demo-content/smartwatch/section-background-8.jpg);
                min-height: 920px;
                background-position: 50% 4.02612px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                /* display: flex; */
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
            .error_page{
               margin:150px 200px auto;
               text-align: center;
            }
            .error_title{
                font-size: 38px;
                color: #1b48c7;
            }
            .error_content{
                font-size: 40px;
                color: #000;
                margin-top: 70px;                
                font-weight: 600;
            }
            @media(max-width:767px)
            {
                .error_page {margin-top: 100px;margin-left: 0px;text-align: center;}
                .error_content {
                    font-size: 25px;
                    color: #000;
                    margin-top: 40px;
                    margin-left: 0px;
                    font-weight: 600;
                    text-align: center;
                }
                .error_title {
                    font-size: 28px;
                    color: #1b48c7;
                }
                #error_page_banner {
                    background-size: contain;
                    width: 100%;
                }
                .full-height {height: 65vh;}
            }
        </style>
</head>

<body>    
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="10">
            <div class="container">
                <div class="navbar-header">
					<div class="logo"> <a href="{{ url('/') }}"><img src="{{ asset('assets/images/products/logo.png') }}" style="height:60px;" alt="image" /></a> </div>
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
              
            </div>
        </nav>
    </header>
    
    
    <section id="error_page_banner">
        <div class="flex-center position-ref full-height">           
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
            <div class="error_page">
                @yield('page_custom')
            </div>
        </div>
    </section>   
    
   
    
</body>

</html>
