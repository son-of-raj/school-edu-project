<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
Hello <?php echo $data['student_first_name']." ".$data['student_last_name']?>,<br>

You have choosen the course <?php echo $data['course']?> for the class of <?php echo $data['class']?>
    <br>
    and the fee details are as follows:
    <table border="0">
        <tr>
        <th>Selected Subjects:</th>
        <td><?php echo $data['subjects']?></td>
        </tr>
        <tr>
        <th>Monthly Fee</th>
        <td><?php echo $data['monthly']; ?></td>
        </tr>
        <tr>
        <th>Annual Fee</th>
        <td><?php echo $data['annually']; ?></td>
        </tr>
    </table>
</body>
</html>