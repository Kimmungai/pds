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
                                            Hello {{ $bidder->first_name }} {{ $bidder->last_name }},
                                        </h1>

                                        <!-- Intro -->

                                            <p style="{{ $style['paragraph'] }}">
                                                Bidding on  <strong>{{$project->title}}</strong> project has been closed! The details of the project are as shown below.
                                            </p>

                                            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                                              <tr>
                                                <td align="center" valign="top">
                                                  <table border="1" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                                                    <tr>
                                                     <td>Project title:</td><td><strong>{{$project->title}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Bid winner:</td><td><strong>{{$winner['company']->company_name}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Winning Price:</td><td><strong>{{$project->final_price}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Project type:</td><td><strong><?php if($project['projectType']->category==0){?>Unspecified<?php }?><?php if($project['projectType']->category==1){?>Mobile App<?php }?><?php if($project['projectType']->category==2){?>E-commerce<?php }?><?php if($project['projectType']->category==3){?>Blog<?php }?><?php if($project['projectType']->category==4){?>Website<?php }?></strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Project description:</td><td><strong>{{$project->description}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Project schedule:</td><td><strong>Start: {{$project->start_date}} - End: {{$project->end_date}}</strong></td>
                                                    </tr>
                                                    @if($project->desired_price != '')
                                                    <tr>
                                                     <td>Target price:</td><td><strong>Ksh. {{$project->desired_price}}</strong></td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                     <td>Front-end basic requirements:</td><td><?php if($project['projectType']->feature1){?>Shopping cart <br><?php }?> <?php if($project['projectType']->feature2){?>Responsive design <br><?php }?><?php if($project['projectType']->feature3){?>Membership <br><?php }?> <?php if($project['projectType']->feature4){?>User Notifications <?php }?></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Back-end basic requirements:</td><td><?php if($project['projectType']->feature5){?>Cloud hosting <br><?php }?> <?php if($project['projectType']->feature6){?>Admin panel <br><?php }?><?php if($project['projectType']->feature7){?>Back up <br><?php }?> <?php if($project['projectType']->feature8){?>Bulk sms <?php }?></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Other features:</td><td><strong>{{$project['projectType']->other_features}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Posting date:</td><td><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['created_at']))->diffForHumans()}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>No of bids now:</td><td><strong>{{count($project['bid'])}}</strong></td>
                                                    </tr>
                                                    @if($project->avg_price!='')
                                                    <tr>
                                                     <td>Average price:</td><td><strong style="color:red;">Ksh. {{$project->avg_price}}</strong></td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                     <td>Average price:</td><td><strong style="color:red;">Ksh. 0</strong></td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                     <td>Client:</td><td><strong>{{$client->first_name}} {{$client->last_name}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Client rating:</td><td><strong>{{$client->rating}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Client profile:</td><td><strong><a href="{{ url('client-public-profile/'.$client->id) }}">view</a></strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Bid winner profile:</td><td><strong><a href="{{$winner['company']->company_website}}">view</a></strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Bid winner website:</td><td><strong><a href="{{$winner['company']->company_website}}">visit</a></strong></td>
                                                    </tr>
                                                    <tr>
                                                     <td>Message to bidders:</td><td><strong>{{$project->message_to_bidders}}</strong></td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                            </table>
                                        <!-- Action Button -->
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
