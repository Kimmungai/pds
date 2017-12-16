<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                                {{ config('app.name') }}
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Greeting -->
                                        <h1 style="{{ $style['header-1'] }}">
                                            Hello {{ $user['user']->first_name }} {{ $user['user']->last_name }},
                                        </h1>

                                        <!-- Intro -->

                                            <p style="{{ $style['paragraph'] }}">
                                                Your
                                                @if($user->type==1)
                                                <?php $membership_plan='Promotional';?>
                                                <strong>Promotional</strong>
                                                @elseif($user->type==2)
                                                <?php $membership_plan='Basic';?>
                                                <strong>Basic</strong>
                                                @elseif($user->type==3)
                                                <?php $membership_plan='Silver';?>
                                                <strong>Silver</strong>
                                                @elseif($user->type==4)
                                                <?php $membership_plan='Gold';?>
                                                <strong>Gold</strong>
                                                @endif
                                                membership plan will expire in
                                               <strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($user['end_date']))->diffForHumans(null,true)}}</strong>.
                                               <a href="{{url('/provider-membership')}}" target="_blank"> Click here to renew.</a>
                                            </p>

                                            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                                              <tr>
                                                <td align="center" valign="top">
                                                  <table border="1" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                                                    <tr>
                                                     <td>Service provider:</td><td><strong>{{$user['user']->first_name}} {{$user['user']->middle_name}} {{$user['user']->last_name}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Membership Plan:</td><td><strong>{{$membership_plan}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Start Date:</td><td><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($user['start_date']))->diffForHumans()}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>End date:</td><td><strong style="color:#f00;">In {{\Carbon\Carbon::createFromTimeStamp(strtotime($user['end_date']))->diffForHumans(null, true)}}</strong></td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                            </table>
                                        <!-- Action Button -->
                                        <p style="{{ $style['paragraph'] }}">
                                            Click on the button below to renew your membership.
                                        </p>

                                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="center">
                                                        <?php
                                                            $actionColor = 'button--blue';
                                                        ?>

                                                        <a href="{{url('/provider-membership')}}"
                                                            style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                            class="button"
                                                            target="_blank">
                                                            Renew Membership
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>


                                        <!-- Outro -->

                                            <p style="{{ $style['paragraph'] }}">
                                                Thank you
                                            </p>


                                        <!-- Salutation -->
                                        <p style="{{ $style['paragraph'] }}">
                                            Regards,<br>{{ config('app.name') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved.
                                        </p>
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
