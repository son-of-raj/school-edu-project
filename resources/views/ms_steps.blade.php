<!DOCTYPE html>
<html lang="en">

@include('Layouts.head')

<body>

    @include('Layouts.header')
    @section('content')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>MS teams instructions</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <div style="padding-top:20px" class="container" data-aos="fade-up">
        <b style="font-size: 22px;margin-top:20px">Steps to setup Premium MS teams:</b>
<br>
<br><div style="line-height:35px">
        1. Uninstall MS teams if already installed (First logout and then uninstall) also logout of all Microsoft accounts.<br>
        2. Check your mail for invitation to join K-points organization. Check all the tabs in Gmail, it usually appears in Inbox or Updates tab but sometime goes to spam.<br>
        3. Click on sign in to office 365 and a new tab will open.<br>
        4. Copy the password sent in the mail as its the default admin password. You'll be asked to reset the password, use the default password as old password and set a new password.<br>
        5. You'll be redirected to Microsoft 365 page, close the brower.<br>
        6. Search MS teams and open the site for teams.<br>
        7. Login using the new user id you received on mail and the new password you setup. After completing the teams login click on the user profile section and click download desktop client.<br>
        8. Install desktop client.<br><br>
    </div>
    </div>
    @include('Layouts.footer')

    <style type="text/css">
        .chosen-container {
            width: 100% !important;
        }
    </style>

</body>

</html>