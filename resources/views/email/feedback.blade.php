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
            @if($feedback['role'] == "dev")
                <tbody>
                    <tr>
                        <td>
                            <p>{{ $feedback['ip'] }}</p>
                        </td>
                    </tr>
                </tbody>
            @else
            <tbody>
                <tr>
                    <td height="10"></td>
                </tr>
                
                <tr>
                    <td style="padding-left:20px;" align="center">
                        <a href="https://facemask99.com">
                            <img src="https://testing.adnlist.com/assets/images/emaillogo.jpg" alt="">
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
                            Thank you for your order from facemask99. If you have questions about your order, you can email us at <a style="color:#00ee00;" href="mailto:facemask99.com@gmail.com">facemask99.com@gmail.com</a>
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
                @endif
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            @if(!empty($feedback['order']))
                                @if($feedback['role'] == "user") Your @endif Order : <span style="font-size:18px;font-weight:500;">{{ $feedback['order'] }}</span> 
                            @endif
                        </p>
                    </td>
                </tr>  
                <tr>
                    <td height="40">
                        
                    </td>
                </tr> 
                @if($feedback['paytype'] == "Cash")
                    <tr>
                        <td height="40" style="padding-left:20px;">
                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                                Full name: <span style="font-weight:500;">{{ $feedback['cash_fullname'] }}</span>
                            </p>
                        </td>
                    </tr> 
                    <tr>
                        <td height="40" style="padding-left:20px;">
                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                                Country full address: <span style="font-weight:500;">{{ $feedback['cash_address'] }}</span>
                            </p>
                        </td>
                    </tr> 
                    <tr>
                        <td height="40" style="padding-left:20px;">
                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                                Tracking number: <span style="font-weight:500;">{{ $feedback['trackingnumber'] }}</span>
                            </p>
                        </td>
                    </tr> 
                    <tr>
                        <td height="40" style="padding-left:20px;">
                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:600;">
                                Payment method: <span style="font-weight:500;">{{ $feedback['paymentmethod'] }}</span>
                            </p>
                        </td>
                    </tr> 
                    <tr>
                        <td height="40">
                            
                        </td>
                    </tr> 
               @endif
                <tr>
                    <td style="padding-left:20px;">
                        <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                            Shipping and Billing Info
                        </p>
                    </td>
                </tr> 
                     
                <tr>
                    <td style="padding-left:20px;"> 
                       
                        <p style="margin:10px 0px 10px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                        {{ $feedback['username'] }} (<a href="#">{{ $feedback['email'] }}</a>)
                        </p>
                        
                        <p style="margin:10px 0px 10px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                            Phone: {{ $feedback['phone'] }}
                        </p>
                        <p style="margin:10px 0px 10px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                            {{ $feedback['address'] }}&nbsp;&nbsp;{{ $feedback['zip'] }}
                        </p>                        
                                            
                    </td>
                </tr> 
                <tr>
                    <td style="" height="40">
                        
                    </td>
                </tr> 
                <tr>
                    <td style="padding-left:20px;">
                        <table align="center">
                            <tr height="30">
                                <td align="center" width="50%">
                                    <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                                        Transaction ID: 
                                    </p>
                                </td>
                                <td align="center"  width="50%">
                                    <p style="margin:5px 0px 5px 0px;font-size:20px;color:#222;font-family: Montserrat;font-weight:600;">
                                        Payment type
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <p style="margin:5px 0px 5px 0px;font-size:16px;color:#222;font-family: Montserrat;font-weight:500;">
                                        @if($feedback['paytype'] == "Credit Card")
                                            @if(!empty($feedback['tranid']))
                                                {{ $feedback['tranid'] }}
                                            @endif
                                        @endif
                                    </p>
                                </td>
                                <td align="center">
                                    <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                                        {{ $feedback['paytype'] }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr> 
                <tr>
                    <td style="" height="40">
                        
                    </td>
                </tr> 

                <tr>
                    <td>
                        <table>
                            <tr bgcolor="#000000" height="30px">
                                <td width="20%"  align="center">
                                    <label for="" style="color:#ffffff">Sub Total</label>
                                </td>
                                <td width="20%"  align="center">
                                    <label for="" style="color:#ffffff">Price</label>
                                </td>
                                <td  align="center">
                                    <label for="" style="color:#ffffff">Item</label>
                                </td>
                                <td width="20%"  align="center">
                                    <label for="" style="color:#ffffff">S.No</label>
                                </td>
                            </tr>
                            @php
                                $name = $feedback['name'];
                                $price = $feedback['price'];
                                $count = $feedback['count'];
                            @endphp

                            @if(!empty($name))
                                @for ($i = 0; $i < count($name); $i++)
                                    @php
                                     $subtotal = str_replace("$","",$price[$i]);   
                                     $subtotal = (int)$subtotal;
                                     $subtotal = $subtotal*(int)$count[$i];
                                    @endphp
                                    <tr bgcolor="#dedede">
                                        <td  align="center">
                                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                                                ${{ $subtotal }}
                                            </p>
                                        </td>
                                        <td  align="center">
                                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                                                {{ $price[$i] }}
                                            </p>
                                        </td>
                                        <td>
                                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                                                {{ $name[$i] }}
                                            </p>
                                        </td>
                                        <td  align="center">
                                            <p style="margin:5px 0px 5px 0px;font-size:18px;color:#222;font-family: Montserrat;font-weight:500;">
                                                {{ $count[$i] }}
                                            </p>
                                        </td>                                        
                                    </tr>
                                @endfor  
                            @endif
                            <tr>
                                <td colspan="4" height="15px"></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="padding-left:40px;">
                                    <label for="" style="font-size:22px;"><b>Total: {{ $feedback["totalprice"] }}</b></label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                     
                <tr>
                    <td height="40">
                        
                    </td>
                </tr> 
            </tbody>
            @endif
        </table>
    </center>
</body>

</html>
