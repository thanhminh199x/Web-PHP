@extends('layout.frontendE.master')
@section('content')
<div class="row margin0">
        <div id="ctl00_DefaultZone">
            <div class="container text-center">
                    <div class="container content">
                            <div class="box">
                                <div class="title-SubPage">
                                    <div class="title" style="font-size:25px; font-weight: bold; padding-top:10px; padding-bottom:40px;">
                                    
                                        HOW TO USE POSTCODE<span style="position: absolute;
                                        height: 2px; background-color: #F90; display: block; width: 30%; top:200px;">
                                    </span>
                                    <span style="position: absolute;
                                        height: 2px; background-color: #14B9D5; display: block; width: 58%; top:200px; right:10%;">
                                    </span>
                                    </div>
                                    <div class="middlepage"> 
                                        <div>
                                            <div class="title-news">
                                                <span id="ctl00_ctl06_lblTitle" class="Detail_Title"></span>
                                            </div>
                                            <table border="0" cellpadding="0" cellspacing="0"   width="100%">
                                                <tr>
                                                    <td valign="top" class="News_Detail_Summary">
                                                        <span id="ctl00_ctl06_lblSummary"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="5">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="News_Content"  valign="top">
                                                        <span id="ctl00_ctl06_lblContent"><p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff; text-align: justify;"><span style="font-family: Tahoma; font-size: 18px;"><strong>1. Search on the website</strong></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px;"><strong>&nbsp; &nbsp; &nbsp;&nbsp;</strong>- http://mabuuchinh.vn</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px;"><strong style="text-align: justify;">&nbsp; &nbsp; &nbsp;&nbsp;</strong><span style="text-align: justify; font-family: Tahoma; color: #414042;">- http://postcode.vn</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-size: large; text-align: justify; font-family: Tahoma; color: #414042;">&nbsp; &nbsp; &nbsp; - The Ministry of Information and Communication's electronic portal: http://mic.gov.vn</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-size: large; text-align: justify; font-family: Tahoma; color: #414042;">&nbsp; &nbsp; &nbsp; Example guide on the site: http://mabuuchinh.vn</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-size: large; text-align: justify; font-family: Tahoma; color: #414042;">&nbsp; &nbsp;a)&nbsp;</span><span style="text-align: justify; font-family: Tahoma; font-size: 18px;">Lookup postcode
                        with the name of the object assigned code (wards / communes and equivalent
                        administrative units, points of service in the public post network, postal
                        network serving the Communist Party of Vietnam, Vietnamese agencies, mass
                        organizations, diplomatic missions and international organizations in Vietnam.</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="text-align: justify; line-height: 115%; font-family: Tahoma; font-size: 18px; color: #414042;" class="shorttext">&nbsp; &nbsp; &nbsp; In
                        the "Search" box, enter the name "Object code assignment"</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-size: large; text-align: justify; font-family: Tahoma; color: #414042;">&nbsp; &nbsp; &nbsp; Example 1:&nbsp;</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="text-align: justify; font-family: Tahoma; color: #414042;"><span style="font-size: 18px;">&nbsp; &nbsp; &nbsp; +&nbsp;</span><span style="line-height: 115%; font-family: Tahoma; font-size: 18px;">In
                        the "Search" box, enter "Lieu Giai Ward", the result is the
                        postcode of Lieu Giai Ward, Ba Dinh District, Hanoi is 11106</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="text-align: justify; font-family: Tahoma; color: #414042;"><span style="font-size: 18px;">+ </span><span style="line-height: 115%; font-family: Tahoma; font-size: 18px;">In
                        the "Search" box, enter "Swiss Consulate General", the
                        postcode of the Consulate General of Switzerland is 70222.</span></span></p>
                        <p style="color: #414042; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px;"><strong>&nbsp; &nbsp;</strong>b) <span style="line-height: 115%; font-family: Tahoma;">Lookup
                        to identify the object assigned in the case of postcode</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px;">&nbsp; &nbsp; &nbsp; Example 2:&nbsp;</span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px;">&nbsp; &nbsp; &nbsp; + <span style="line-height: 115%; font-family: Tahoma;">In
                        the "Search" box, enter "10046", the result of the code
                        object is assigned Ministry of Information and Communication</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="font-family: Tahoma;"><span style="font-size: 18px;">+ </span><span style="line-height: 115%; font-family: Tahoma; font-size: 18px;">In
                        the "Search" box, enter "90251", the result of the object
                        is assigned code is My Luong Post Office, Cho Moi district, An Giang province</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff; text-align: justify;"><span style="font-family: Tahoma; font-size: 18px;"><strong>2. <span style="line-height: 115%; font-family: Tahoma;">How
                        to write postcode</span></strong></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff; text-align: justify;"><span style="font-family: Tahoma; font-size: 18px;"><strong><span style="line-height: 115%; font-family: Tahoma;">&nbsp; &nbsp;&nbsp;</span></strong></span><em style="font-family: Tahoma; text-align: left;">&nbsp;</em><span style="font-family: Tahoma; text-align: left; font-size: 18px;">1. <span style="line-height: 115%; font-family: Tahoma;">Address
                        of postal service users (senders and recipients) must be clearly displayed on
                        postal items (letter envelopes, packages or packet of good) on relevant
                        documentation.</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px; color: #414042;">&nbsp; &nbsp; &nbsp; 2.&nbsp;<span style="line-height: 115%; font-family: Tahoma;">Postcode
                        is an indispensable element in the address of the postal service user (sender
                        and receiver), followed by the name of the province / city and separated from
                        the name of the province / city&nbsp; at least
                        one blank character.</span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px; color: #414042;">&nbsp; &nbsp; &nbsp; 3<span style="font-family: Tahoma; color: #414042;">. <span style="line-height: 115%; font-family: Tahoma;">Postcode
                        must be clearly printed or hand-written.</span></span></span></p>
                        <p style="color: #414042; font-family: Roboto-Regular; background-color: #ffffff;"><span style="font-family: Tahoma; font-size: 18px; color: #414042;">&nbsp; &nbsp; &nbsp; 4<span style="font-family: Tahoma; color: #414042;">.&nbsp;<span style="line-height: 115%; font-family: Tahoma;">For
                        postal items which have a dedicated cell for postcode at the address of the
                        sender, the recipient shall specify the postcode, in which each cell should
                        only contain one digit and the digits must be clearly written to be readable
                        and not be stripped.</span></span></span></p>
                        <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><em style="mso-bidi-font-style:normal;"><span style="font-family: Tahoma; font-size: 13px;">&nbsp;</span></em></p>
                        <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><em style="mso-bidi-font-style:normal;"><span style="font-family: Tahoma; font-size: 13px;">Form 1: Postal items<span style="mso-spacerun:yes;">&nbsp; </span>have not a dedicated cell for postcode</span></em></p>
                        <p style="margin: 0cm 0cm 0.0001pt; text-align: center;"><em style="mso-bidi-font-style:normal;"><span style="font-family: Tahoma; font-size: 13px;">&nbsp;</span></em></p>
                        <p style="text-align: center;"><em style="color: #414042; font-family: Tahoma; font-size: small; background-color: #ffffff;"><img alt="" src="imgs/b.jpg" style="width: 800px; height: 497px;" /></em></p>
                        <p style="text-align: center;"><em style="text-align: justify;"><span style="font-family: Tahoma; font-size: 13px;">&nbsp;</span></em></p>
                        <p style="text-align: center;"><em style="text-align: justify;"><span style="font-family: Tahoma; font-size: 13px;">Form 2: Postal items&nbsp; have dedicated cell for postcode</span></em></p>
                        <p style="text-align: center;"><em style="text-align: justify;"><span style="font-family: Tahoma; font-size: 13px;">&nbsp;</span></em></p>
                        <div style="text-align: center;"><em style="color: #414042; font-family: Tahoma; font-size: small; background-color: #ffffff;"><img alt="" src="imgs/c.jpg" style="width: 800px; height: 492px;" /><br />
                        </em></div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                            </div>
                        
@endsection