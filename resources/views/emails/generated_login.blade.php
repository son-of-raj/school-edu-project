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
                <td >
                    <table style="width: 100%"  border="0" align="center" cellpadding="0" 
                           cellspacing="0"  >
                        <tbody>
                            <tr>
                                <td  style="height: 600px;">
                                    <div class="main-container">
                                        <div class="container2">
                                            <div class="contian">
                                                <a href="https://kpoints.in" id="logo" class="me-auto logo">
                                                    <img src="https://kpoints.in/assets/Logo_02.png" alt="" class="img-fluid" style="height: 70px;width: 250px;">
                                                  </a>
                                            </div>
                                            <div class="info">
                                                Hi <a class="bold"><?php echo $data['firstName']. " ".$data['lastName']; ?></a>,
                                                <br>
                                                <br>
                                                
                                                These are your Login credentials for payment:
                                                <br>
                                                <br>
                                                Email: <a class="bold"> <?php echo $data['email']; ?></a>
                                                
                                                <br>
                                               Password: <a class="bold"> <?php echo $data['random_password']; ?></a>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                Regards,
                                                <br>
                                                <a class="bold">Payment desk </a>
                                                <br>
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
        .tab , .tabh , .tabd{
            border: .5px solid black;
            border-collapse: collapse;
        }

        .tabd ,.tabh{
            padding: 10px;
        }


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