<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <table align="center" style="width: 100%" cellpadding="0" cellspacing="0" bgcolor="white">
        <tbody>
            <tr>
                <td>
                    <table style="width: 100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td style="height: 600px;">


                                    <div class="main-container">

                                       

                                        <div class="container2">
                                            <div class="contian">
                                                <a href="https://kpoints.in" id="logo" class="me-auto logo">
                                                    <img src="https://kpoints.in/assets/Logo_02.png" alt="" class="img-fluid" style="height: 70px;width: 250px;">
                                                  </a>
                                            </div>
                                            <div class="info">
                                                Hi <a class="bold"><?php echo $data['student_first_name']." ".$data['student_last_name']?> / <a class="bold"><?php echo $data['guardianName']; ?></a>,
                                                <br>
                                                <br>
                                                This email is important and consists of Admission code and Login credentials for <a class="bold"><?php echo $data['student_first_name']." ".$data['student_last_name']?>'s</a><b>Microsoft Account.</b> <br>
                                             <br>Admission Code: <a class="bold"><?php echo $data['exam_code']?></a>(Keep this information for further communications)
                                             <br><br>
                                                <br>
                                                <u class='bold'>Login Credentials for Microsoft Teams:</u>
                                                <br>
                                                <br>
                                                User id: <a class="bold"><?php echo $data['user_id']?></a>
                                                <br>
                                                <br>
                                                Temporary password: <a class="bold"><?php echo $data['user_pass']?></a>
                                                <br>
                                                
                                                <br>
                                                <a href="https://login.microsoftonline.com/organizations/oauth2/v2.0/authorize?client_id=4765445b-32c6-49b0-83e6-1d93765276ca&redirect_uri=https%3A%2F%2Fwww.office.com%2Flandingv2&response_type=code%20id_token&scope=openid%20profile%20https%3A%2F%2Fwww.office.com%2Fv2%2FOfficeHome.All&response_mode=form_post&nonce=637891622631346738.Y2MyNTIzZGEtZGM4Mi00ODdmLTk1ZDAtMzQwNmEzMmYzN2I2NDVjOTAwNTUtNmNiOS00Njk2LTgyN2ItNTFjODM4YzYxOTUx&ui_locales=en-US&mkt=en-US">Click here</a> to login
                                                <br>
                                                <a href="{{ URL::to('ms_steps') }}">Click here</a> for steps to login
                                                
                                                <br>
                                                <br>
                                                <div class='bold' style="font-size:14px">
                                                    <br> Technical support: <a href="tel:+9898989763">9898989763</a>
                                                </div>
                                                <br>

                                                <br>
                                                <br>
                                                Regards,
                                                <br>
                                                <a class="bold">Admin<br>
                                                    Kpoints Pvt Ltd.
                                                    </a><br>
                                                    <a href="https://kpoints.in" id="logo" class="me-auto logo">
                                                        <img src="https://kpoints.in/assets/Logo_02.png" alt="" class="img-fluid" style="height: 50px;width: 130px;">
                                                      </a>
                                                </p>
                                            </div>

                                            <div class="col2">
                                                © 2022 KPoints. All rights reserved.
                                            </div>

                                        </div>

                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <style>
        .bold {
            font-weight: bold;
            color: black;
        }

        .main-container {
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .container {
            padding: 10px;
            margin: 0;
            width: 100%;
            align-items: center;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;

        }

        .container2 {

            padding-top: 20px;
            padding-inline: 30px;
            color: black;
        }

        .contian {
            
            padding: 25px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }

        .info {
            padding: 40px;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            line-height: 28px;
        }

        .info b {
            padding: 0px;
            font-size: 18px;
            display: flex;
            align-content: center;
            align-items: left;
        }

        .info p {
            align-items: center;
            color: black;
            font-size: 16px;
            line-height: 28px;
        }

        .col2 {
            color: rgba(0, 0, 0, 0.5);
            padding: 22px;
            text-align: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgba(80, 95, 190, .1);
            font-size: 11px;

        }
    </style>
</body>

</html>