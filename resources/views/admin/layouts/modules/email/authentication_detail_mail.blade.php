<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"
        href="{{ asset(isset($setting->favicon) ? 'storage/' . $setting->favicon : config('adminetic.favicon', 'static/favicon.png')) }}"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="{{ asset(isset($setting->favicon) ? 'storage/' . $setting->favicon : config('adminetic.favicon', 'static/favicon.png')) }}"
        type="image/x-icon">
    <title>Authentication Detail Email</title>
    <style type="text/css">
        body {
            width: 650px;
            font-family: work-Sans, sans-serif;
            background-color: #f6f7fb;
            display: block;
        }

        a {
            text-decoration: none;
        }

        span {
            font-size: 14px;
        }

        p {
            font-size: 13px;
            line-height: 1.7;
            letter-spacing: 0.7px;
            margin-top: 0;
        }

        .text-center {
            text-align: center
        }

        h6 {
            font-size: 16px;
            margin: 0 0 18px 0;
        }

    </style>
</head>

<body style="margin: 30px auto;">
    <table style="width: 100%">
        <tbody>
            <tr>
                <td>
                    <table style="background-color: #f6f7fb; width: 100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img class="img-fluid"
                                                        src="{{ asset(setting('logo') ? 'storage/' . setting('logo') : 'static/logo.png') }}"
                                                        alt="Logo">
                                                </td>
                                                <td style="text-align: right; color:#999"><span>Welcome
                                                        Notfication</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                        <tbody>
                            <tr>
                                <td style="padding: 30px">
                                    <h6 style="font-weight: 600">Welcome {{ $name ?? 'N/A' }},</h6>
                                    <p>{{ config('adminetic.title', 'Adminetic') }} welcomes you to this application.
                                    </p>
                                    <p style="text-align: center">
                                        <b class="text-danger">Caution ! Please do not share this information to
                                            others.</b> <br>
                                        <b><u>Login Credential</u></b><br>
                                        <b>Email : </b> {{ $email ?? 'N/A' }} <br>
                                        <b>Password : </b> {{ $password ?? 'N/A, Please contact admininstration.' }}
                                        <br>
                                        <hr>
                                        <a href="{{ route('login') }}" target="_blank"
                                            style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Login</a>
                                    </p>
                                    <p>If you have remember your password you can safely ignore and delete this email.
                                    </p>
                                    <p>Good luck! Hope it works.</p>
                                    <p style="margin-bottom: 0">
                                        Regards,<br>{{ config('adminetic.title', 'Adminetic') }}</p>
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
