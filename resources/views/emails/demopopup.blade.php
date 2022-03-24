<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<h4>Demo Request sent by user</h4>
    <table border="0">
        <tr>
        <th>Name:</th>
        <td><?php echo $data['name']; ?></td>
        </tr>
        <tr>
        <th>Contact No:</th>
        <td><?php echo $data['contact']; ?></td>
        </tr>
        <tr>
        <th>Email id:</th>
        <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
        <th>Class:</th>
        <td><?php echo $data['class']; ?></td>
        </tr>
        <tr>
        <th>Course:</th>
        <td><?php echo $data['course']; ?></td>
        </tr>
        <tr>
        <th>Subject:</th>
        <td><?php echo $data['subjects']; ?></td>
        </tr>
        
        <tr>
        <th>Message:</th>
        <td><?php echo $data['message']; ?></td>
        </tr>
    </table>
</body>
</html>