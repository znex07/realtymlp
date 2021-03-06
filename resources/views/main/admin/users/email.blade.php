@extends('main.admin.users.base')
@section('content')

    <table width="600" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff">
        <tbody>
        <tr>
            <td width="600" style="font-family:Helvetica,Arial,sans-serif;color:#4e4e4e;font-size:16px;line-height:24px;padding:0px 50px">

                <p style="margin-bottom:25px;margin-top:40px">Hello!</p>
                <p>Thank you for showing interest in <strong>Realty MLP!</strong></p>
                <p>You are one-step closer to accessing your exclusive
                    account. We simply need your verification to continue.</p>

                <p style="margin-bottom:25px;margin-top:40px">. Use the
                    following details to log in to your account:</p>
                <ul>

                    <li>your temporary password:
                        <strong>{{ $password }}</strong>
                        <br>
                        (you should change it in 'Your profile' section inside your RealtyMLP account)
                    </li>
                </ul>
                <ul style="list-style: none">
                    <li>Please click on this link below </li>
                    <li><a href="#" target="_blank">http://www.link/?=!#$%^&*~!#$%^&*()_+.com</a></li>
                </ul>
                <p style="margin-bottom:40px;text-align:center;margin-top:40px">
                    <span style="background:#2ecc71;padding:15px;font-weight:bold;border-radius:4px;border:1px solid #2ecc71;border-bottom:1px solid #209251"><a style="color:#ffffff;text-decoration:none;font-size:18px" href="http://www.realtymlp.com/login.php" target="_blank">&nbsp;&nbsp;&nbsp;Log
                            in now&nbsp;&nbsp;&nbsp;</a></span></p>
                <p>
                    Thank you!
                </p>
                <p style="color: #ad1b22">
                    * link expires in 72 hours
                </p>
                <p style="margin-bottom:40px;font-size:13px"><em>This message was
                        generated by RealtyMLP. If you believe you got it by
                        mistake, please let us know at
                        <a href="mailto:joramaquinosalinas@gmail.com" target="_blank">joramaquinosalinas@gmail.com</a>.</em>
                </p>

            </td>
        </tr>
        </tbody>
    </table>
@endsection
