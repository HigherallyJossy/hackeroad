<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>facemask99</title>    
</head>

<body style="background:#f1f1f1;padding-top:20px;padding-bottom:20px;">
    <center>
        <table class="" border="0" cellspacing="0" cellpadding="0" width="600"
            style="width:6.25in;background:#ffffff;border-collapse:collapse">
            
            <tbody>
                <tr>
                    <td height="10"></td>
                </tr>
                
                <tr>
                    <td style="padding-left:20px;" align="center">
                        <a href="{{ route('welcome') }}">
                            <img src="https://testing.adnlist.com/assets/imge/emaillogo.png" alt="">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td height="40"></td>
                </tr>
                @if($feedback['role'] == "user")
                <tr>
                    <td style="padding:0px 20px 0px 20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                            Hi
                        </p>
                        <br>
                        <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                            Thank you for your order from hackerode. If you have questions about your order, you can email us at <a style="color:#00ee00;" href="mailto:dsniper812@gmail.com">dsniper812@gmail.com</a>
                            Our hours are 24/7.
                        </p>
                        <br>
                        <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                            Your shipping confirmation is below. Thank you again for your business.
                        </p>
                    </td>
                </tr>                  
                <tr>
                    <td height="20">
                        
                    </td>
                </tr> 
                @else
                <tr>
                    <td style="padding:0px 20px 0px 20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                            Hi, admin!
                        </p>
                       
                    </td>
                </tr>                  
                @endif
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Name: {{ $feedback['name'] }}
                        </p>
                    </td>
                </tr>  
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Address: {{ $feedback['address'] }}
                        </p>
                    </td>
                </tr>  
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Phone number: {{ $feedback['phone'] }}
                        </p>
                    </td>
                </tr>  
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Amount: {{ $feedback['unit'] }} {{ $feedback['amount'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Mail: {{ $feedback['mail'] }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
