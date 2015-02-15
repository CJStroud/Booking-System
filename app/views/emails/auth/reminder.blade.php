<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">

        <style>
            body {
                font-family: 'Open Sans', sans-serif;
                margin: 0;
                padding: 0;
            }

            h2 {
                margin: 0;
                padding: 0;
                color: #222;
                padding: 20px 0;
                padding-left: 10px;
                margin-bottom: 20px;
                background-color: #34495e;
                color: #fff;
                font-size: 20px;
            }

            div {
                color: #444;
                margin: 10px;
                padding: 10px 0;
                font-size: 14px;
            }

            div a[href] {
                text-decoration: none;
            }

            div a:hover {
                text-decoration: underline;
                color: #34495e;
            }

        </style>

    </head>
    <body>
        <h2>Password Reset</h2>
        <div>
            This email has been automatically generated, please do not reply to it.
        </div>

        <div>
            All you need to do is click the link below and enter your email and new password which will then allow you to log in using the new password.
        </div>

        <div>
            {{ link_to_route('password.get.reset', 'Reset password', array($token)) }}
        </div>

        <div>
            This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
        </div>
    </body>
</html>
