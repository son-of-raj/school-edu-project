

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

                                        <div class="container">
                                            <div><b></b></div>
                                          </div>
                                     
                                        <div class="container2">
                                            <div class="contian">
                                                <b>KPoints</b>
                                            </div>
                                            <div class="info">
                                             <u>Feedback has been sent by the user:</u> 
                                              <br> <br>
                                                Name:
                                                <a class="bold"><?php echo $data['firstname']. "".$data['lastname'];  ?></a>
                                                <br> <br>
                                      
                                                Contact No:
                                                <a class="bold"> <?php echo $data['phone']; ?></a>
                                                <br> <br>
                                      
                                                Email id:
                                                <a class="bold"><?php echo $data['email']; ?></a>
                                                <br> <br>
                                      
                                                Class and Board:
                                                <a class="bold"><?php echo $data['class']; ?></a>
                                                <br> <br>
                                      
                                                Exams:
                                                <a class="bold"><?php echo $data['exams']; ?></a>
                                                <br> <br>
                                      
                                                Subject:
                                                <a class="bold"><?php echo $data['subject']; ?></a>
                                                <br> <br>
                                      
                                                Percent/Rank:
                                                <a class="bold"><?php echo $data['percent']; ?></a>
                                                <br> <br>
                                      
                                                Rating:
                                                <a class="bold"><?php echo $data['rating']; ?></a>
                                                <br> <br>
                                      
                                                Message:
                                                <a class="bold"><?php echo $data['message']; ?></a>
                                                <br> <br>
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
        .bold{
            font-weight: bold;
            color:black;
        }
        .main-container{
            padding: 0;
            margin: 0;
            width:100%;
        }
        .container{
            padding:10px;
            margin:0;
            width: 100%;
            align-items: center;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
           
        }
        .container2{
            
            padding-top: 20px;
            padding-inline: 30px;
            color: black;
        }
        .contian{
            background-color:rgba(80,95,179,.1);
            padding: 25px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }
        .info{
          padding:40px;
                      
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            line-height: 28px;
        }
        .info b{
          padding:0px;
          font-size:18px;
          display:flex;
          align-content:center;
          align-items:left;
        }
        .info p{
            align-items:center;
            color: black;
            font-size: 16px;
            line-height: 28px;
        }
        .col2{
            color:rgba(0,0,0,0.5);
            padding: 22px;
            text-align: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgba(80,95,190,.1);
            font-size: 11px;
            
        }
      
    </style>
</body>
</html>