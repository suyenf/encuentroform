<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {
            font-family: Arial, sans-serif;
        }
        /*table, td {*/
        /*    border: 1px solid #000000 !important;*/
        /*}*/
    </style>
</head>
<body style="margin:0;padding:0;">
<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
        <td align="center" style="padding:0;">
            <table role="presentation"
                   style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:center;">
                <tr>
                    <td align="center" style="padding:40px 0 30px 0;background:#d2e5f2;">
                        <h2>Schoenstatt Houston Family Encounter</h2>
                        <img src="{{URL::asset('images/logo.png')}}"/>
{{--                        <img src="images/logo.png" alt="" width="130" style="height:auto;display:block;"/>--}}
                    </td>
                </tr>
                <tr>
                    <td style="padding:36px 30px 42px 30px;">
                        <table role="presentation"
                               style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                            <tr>
                                <td style="padding:0;">
                                    <h1>Registration Successful</h1>
                                    <p>This is a copy of your Registration</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0;">
                                    <table role="presentation"
                                           style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                        <tr>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                Family Name

                                            </td>
                                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                {{$record->family_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                Group Name
                                            </td>
                                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                {{$record->group}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                Assistant Number
                                            </td>
                                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                {{$record->qty}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                Phone
                                            </td>
                                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                {{$record->phone}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                Email
                                            </td>
                                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                            <td style="width:260px;padding:0;vertical-align:top;">
                                                {{$record->email}}
                                            </td>
                                        </tr>
                                    </table>
                                    <table role="presentation"
                                           style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                        <tr>
                                            <td style="background-color: #e4e4e4; text-align: center; padding: 0">Name
                                            </td>
                                            <td style="background-color: #e4e4e4; text-align: center; padding: 0">Gender
                                            </td>
                                            {{--        <td>Dob</td>--}}
                                            <td style="background-color: #e4e4e4; text-align: center; padding: 0">Age</td>
                                        </tr>
                                        @foreach($record->people as $person)
                                            <tr>
                                                <td style="width:260px;padding:0;vertical-align:top;"> {{$person->name}}</td>
                                                <td style="width:260px;padding:0;vertical-align:top;"> {{$person->gender}}</td>
                                                {{--            <td style="width:260px;padding:0;vertical-align:top;"> {{$person->dob->format('m/d/Y')}}</td>--}}
                                                <td style="width:260px;padding:0;vertical-align:top;"> {{$person->dob->diffInYears()}}</td>
                                            </tr>
                                            @endforeach
                                            </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:30px;background:#f7dede;">
                        <table role="presentation"
                               style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                            <tr>
                                <td style="padding:0;width:50%;" align="left">
                                    <p>&reg; Nazca Copyright 2022. <br/></p>
                                </td>
                                <td style="padding:0;width:50%;" align="right">
                                    <p>Designed & Powered by<br/><a href="https://itnazca.com/">Nazca Tech &
                                            Consulting</a></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
