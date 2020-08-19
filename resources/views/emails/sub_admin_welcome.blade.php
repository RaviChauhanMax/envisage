<!DOCTYPE html>
<html>
    <head>
        <title>Scamper Skills</title>
        <style type="text/css">
            body{font-family: 'open-sans', sans-serif;color: #77798c;font-size: 14px;}
        </style>
    </head>
    <body>        
        <table cellspacing="0" cellpadding="0" width="100%" style="padding: 0;">
            <tbody>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" width="500px" style="margin: 0px auto 0px; text-align: center; box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1); border-radius: 4px; background-image:url({{ url(systemImgPath.'/ptrn1.jpg') }}); background-size: cover; background-position: center center; padding: 40px;" >
                            <tbody>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="margin: 0 auto; text-align: center; box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1); border-radius: 4px;" bgcolor="#fff" >
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" style="background-color: #eee; padding: 40px;border-radius: 4px 4px 0 0;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align:center;">
                                                                       <!--  <img src="{{ url(systemImgPath.'/logo.png') }}" width="250px" /> -->
                                                                       <h1 style="color:white;">Logo Here</h1>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" style="margin:0 auto;padding:10px;"> 
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                       <h4 style="text-align:left;"> Hello {{ $name }}, </h4>
                                                                       <p style="letter-spacing:1px;line-height:30px;text-align:left;">
                                                                       This email is to inform you that your account has been created successfully. Please click on the button below to set your password.
                                                                        </p>
                                                                        <a href="{{ $set_password_url }}" style="padding:12px 25px;background-color: #0094de;border: none;color: #fff;border-radius: 2px;cursor:pointer;margin-top:15px; text-decoration: none;box-shadow: 0 3px 6px -1px rgba(0,0,0,.25)">SET PASSWORD
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" style="border-top:1px solid #ddd; margin-top:10px;border-radius:0 0 4px 4px;"> 
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p style="line-height:30px;">Copyright &copy; <?php echo date('Y');?> BucketList List. All rights reserved. </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>