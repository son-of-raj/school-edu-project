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
                                                Hi <a class="bold"><?php echo $data['fatherName']; ?></a>,
                                                <br>
                                                <br>
                                                Welcome to Kpoints E – learning platform, this is confirmation mail to reception of your admission fee for the <a class="bold"> <?php echo $data['course']?> </a> <form action="" method="post"></form>for subjects <a class="bold"> <?php echo $data['subjects']?></a> of class <a class="bold"><?php echo $data['class']?></a>.
                                                <br>
                                                <br>
                                                Admission code of Student:<a class="bold"> <?php echo $data['exam_code']?></a>(Keep this information for further communications)
                                                <br>
                                                <br>
                                                Admission fee Received: ₹ <a class="bold"> <?php echo $data['advance']?></a><br>
                                                Total pending fee: ₹<a class="bold"> <?php echo $data['total_fee']?></a>
                                                <br>
                                                <br>
                                                @if ($data['total_fee'] == 0)
                                                <a class="bold">Already paid</a>
                                                @else
                                                <table class="tab"  >
                                                    <thead>
                                                      <tr>
                                                          <th class="tabh">Sl.no</th>
                                                          <th class="tabh">Months</th>
                                                          <th class="tabh">Amount</th>
                                                      </tr>
                                                    </thead>
                                                    <?php foreach ($data['months'] as $key => $data_month){
                                                     ?>
                                                    <tr>
                                                        <td class="tabd">
                                                            {{ ++$key }}
                                                        </td>
                                                          <td class="tabd">
                                                            <?php echo $data_month['month']; ?>
                                                              </td>
                                                          <td class="tabd">
                                                            ₹ <?php echo $data['months_fee']; ?>
                                                              </td>
                                                      </tr>
                                                    
                                                    <?php } ?>
                                                      
  
                                                </table>
                                                  @endif
                                                <br>
                                                <br>
                                                <br>
                                                    <br>
                                                   
                                                <div class="bold" style="font-size: 14px" >
                                                    *You’ll receive an Email with Login credentials shortly.
                                                   
                                                    <br>

                                                    <br>
                                                    <a style="color:red">Payment should be made before 5th of every month.</a>
                                                     <br>
                                                    <br>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <td>Sales support:</td>
                                                            <td><a href="tel:+9898989763">9898989763</a></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Billing support:</td>
                                                            <td><a href="tel:+9898989763">9898989763</a></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Technical support:</td>
                                                            <td><a href="tel:+9898989763">9898989763</a></td>
                                                            
                                                        </tr>
                                                    </thead>                                    
                                                </table> 
                                                </div>
                                                
                                                <br>
                                                Regards,
                                                <br>
                                                <a class="bold">Billing desk </a>
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