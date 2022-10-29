@extends('mail.template.main')


    @section('body')

        <tr style="text-align:center;">
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
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr>
            <td style="padding:30px;background:#d2e5f2;">


                <h1>Scheduled Events</h1>
                <div>
                    {!! $event->text !!}
                </div>
                <img alt="" width='500' src="{{$img_url}}"/>

            </td>
        </tr>
@endsection

