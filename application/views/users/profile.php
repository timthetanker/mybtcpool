<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

<style>
    .tab-heading {
        color: #337AB7
    }
</style>
<div class="container">
    <div class="page">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-col">
                    <ul class="tabs chooser hide-mobile side-chooser">

                        <!--user details-->
                        <li onclick="" class="tab-control active">
                            <a href="#" rel="#tab_1_contents" class="tab">
                                <div class="item-inner">
                                    <div class="icon-holder">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                    </div>
                                    <div class="text no-title">
                                        Details
                                    </div>
                                </div>
                            </a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </li>


                        <!--profile pic-->
                        <a href="#" rel="#tab_2_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-camera" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Photo
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>

                        <!--Pword-->
                        <a href="#" rel="#tab_3_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Password
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>

                        <!--Email PReferences-->
                        <a href="#" rel="#tab_4_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Email preferences
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>


                        <!-- entered tournaments -->
                        <a href="#" rel="#tab_5_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-trophy" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Tournaments
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>


                        <a href="#" rel="#tab_6_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Transaction History
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>

                        <a href="#" rel="#tab_7_contents" class="tab">
                            <li class="tab-control">
                                <div class="item-inner">
                                    <div class="icon-holder"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                                    <div class="text no-title">
                                        Payment details
                                    </div>
                                </div>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </li>
                        </a>
                    </ul>
                </div>
            </div><!--./left col-->

            <!--RIGHT COLL-->
            <div class="col-md-9 col-xs-12">
                <!--user details-->
                <div id="tab_1_contents" class="tab_content tab_contents_active">

                    <h1 class="tab-heading">Your Details</h1>
                    <div class="form">
                        <?php /**
                         * example:
                         * <a href ="<?php echo base_url(); ?>controller/method<?php echo $row->id ?></a>"
                         * In above example ID is bound as param
                         **/ ?>
                        <?php echo form_open('users/update_info'); ?>
                        <input type="hidden" name="submitted" value="true">
                        <input type="hidden" name="task" value="details">
                        <section>
                            <?php foreach ($userInfo as $info){ ?>
                            <h2>Name and email</h2>
                            <div class="dataEntry">
                                <div class="group">
                                    <label for="firstname">First name</label>
                                    <input type="text" id="firstname" name="firstname" maxlength="50"
                                           value="<?php echo $info->firstname ?>" class="max" required="" style="">
                                </div>
                                <div class="group">
                                    <label for="lastname">Last name</label>
                                    <div class="entry">
                                        <input type="text" id="lastname" name="lastname" maxlength="50"
                                               value="<?php echo $info->lastname ?>" class="max" required="">
                                    </div>
                                </div>
                                <div class="group">
                                    <label for="email">Email address</label>
                                    <input type="email" id="email" name="email" maxlength="50"
                                           value="<?php echo $info->email ?>" class="max"></div>
                                <div class="group">
                                    <label for="user_name">Nickname</label>
                                    <input type="text" id="user_name" name="username" maxlength="22"
                                           value="<?php echo $info->username ?>" class="max">
                                    <label for="phone">PHONE</label>
                                    <input type="text" id="phone" name="phone" maxlength="22"
                                           value="<?php echo $info->phone ?>" class="max">
                                    <div class="info-below-input">The name by which you are known in the game.
                                        Please make it short, clean and simple. Nicknames are unique (i.e. No two
                                        people can have the same username).
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h2>Location</h2>
                            <div class="group">
                                <label for="country">Where do you live?</label>
                                <select name="country" id="country" onchange="">
                                    <option value="<?php echo $info->country ?>"
                                            selected><?php echo $info->country ?></option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Sint Eustatius Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Terr.</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo DRC</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote D'Ivoire (Ivory Cst)</option>
                                    <option value="HR">Croatia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="tl">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="EN">England</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="EU">European Union</option>
                                    <option value="FK">Falkland Isls (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Terr.</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard &amp; McDonald Isls</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea (North)</option>
                                    <option value="KR">Korea (South)</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="ND">Northern Ireland</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestine</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="GS">S.Georgia and S.Sandwich Ils</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin (French)</option>
                                    <option value="VC">Saint Vincent and Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SS">Scotland</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten (Dutch)</option>
                                    <option value="SK">Slovak Republic</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="SU">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SH">St. Helena</option>
                                    <option value="PM">St. Pierre and Miquelon</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen Isls</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">US Minor Outlying Isls</option>
                                    <option value="US">USA</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="VI">Virgin Islands (U.S.)</option>
                                    <option value="WA">Wales</option>
                                    <option value="WF">Wallis and Futuna Isls</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="group">
                                <label for="state">What is your province/state/county?</label>
                                <div id="region">
                                    <input type="text" class="text" id="state" name="state" maxlength="50" value=""
                                           style="width:250px"></div>
                            </div>
                            <div class="group">
                                <label for="timeZone">In what time zone would you like to see fixtures?</label>
                                <select name="timeZone" id="timeZone" onchange="">
                                    <option value="<?php echo $info->timeZone ?>"
                                            selected><?php echo $info->timeZone ?></option>
                                    <option value="Africa/Johannesburg">Africa: Central East - South Africa, Zim
                                    </option>
                                    <option value="Africa/Lagos">Africa: Central West - Nigeria</option>
                                    <option value="Africa/Nairobi">Africa: East - Kenya, Tanzania</option>
                                    <option value="Africa/Windhoek">Africa: Namibia</option>
                                    <option value="Africa/Accra">Africa: West - Ghana, Morocco</option>
                                    <option value="Asia/Kabul">Asia: Afghanistan</option>
                                    <option value="Asia/Bahrain">Asia: Bahrain</option>
                                    <option value="Asia/Shanghai">Asia: China</option>
                                    <option value="Asia/Dhaka">Asia: Dhaka</option>
                                    <option value="Asia/Calcutta">Asia: India</option>
                                    <option value="Asia/Tehran">Asia: Iran</option>
                                    <option value="Asia/Tokyo">Asia: Japan, Korea</option>
                                    <option value="Asia/Kuala_Lumpur">Asia: Kuala Lumpur</option>
                                    <option value="Asia/Kyrgyzstan">Asia: Kyrgyzstan</option>
                                    <option value="Asia/Kathmandu">Asia: Nepal</option>
                                    <option value="Asia/Karachi">Asia: Pakistan</option>
                                    <option value="Pacific/Samoa">Asia: Samoa</option>
                                    <option value="Asia/Seoul">Asia: Seoul</option>
                                    <option value="Asia/Singapore">Asia: Singapore</option>
                                    <option value="Asia/Tbilisi">Asia: Tblisi</option>
                                    <option value="Asia/Bangkok">Asia: Thailand, Vietnam, Indonesia
                                    </option>
                                    <option value="Australia/North">Australia: Northern Territories</option>
                                    <option value="Australia/NSW">Australia: NSW / ACT</option>
                                    <option value="Australia/Queensland">Australia: Queensland</option>
                                    <option value="Australia/South">Australia: South Australia</option>
                                    <option value="Australia/Victoria">Australia: Victoria</option>
                                    <option value="Australia/West">Australia: Western Australia</option>
                                    <option value="Canada/Atlantic">Canada: Atlantic</option>
                                    <option value="Canada/Central">Canada: Central</option>
                                    <option value="Canada/Eastern">Canada: Eastern</option>
                                    <option value="Canada/East-Saskatchewan">Canada: East-Saskatchewan</option>
                                    <option value="Canada/Mountain">Canada: Mountain</option>
                                    <option value="Canada/Newfoundland">Canada: Newfoundland</option>
                                    <option value="Canada/Pacific">Canada: Pacific</option>
                                    <option value="Canada/Saskatchewan">Canada: Saskatchewan</option>
                                    <option value="Canada/Yukon">Canada: Yukon</option>
                                    <option value="America/Barbados">Central America: Dominica, Barbados</option>
                                    <option value="America/Tegucigalpa">Central America: Honduras, Costa Rica
                                    </option>
                                    <option value="Mexico/BajaNorte">Central America: Mexico - Baja Norte</option>
                                    <option value="Mexico/BajaSur">Central America: Mexico - Baja Sur</option>
                                    <option value="Mexico/General">Central America: Mexico - General</option>
                                    <option value="America/Panama">Central America: Panama, Jamaica</option>
                                    <option value="Europe/Eastern">Europe: Bucharest, Istanbul</option>
                                    <option value="Europe/Budapest">Europe: Budapest</option>
                                    <option value="Asia/Istanbul">Europe: Eastern, Greece, Turkey</option>
                                    <option value="Iceland">Europe: Iceland</option>
                                    <option value="Europe/Moscow">Europe: Moscow</option>
                                    <option value="Europe/London">Europe: United Kingdom, Portugal</option>
                                    <option value="Europe/Paris">Europe: Western Europe</option>
                                    <option value="Africa/Cairo">Mid-East: Egypt, Israel, Syria</option>
                                    <option value="Asia/Baghdad">Mid-East: Iraq</option>
                                    <option value="Asia/Riyadh">Mid-East: Saudi Arabia</option>
                                    <option value="Asia/Dubai">Mid-East: Yemen, UAE</option>
                                    <option value="NZ">New Zealand: New Zealand</option>
                                    <option value="Pacific/Fiji">Pacific: Fiji</option>
                                    <option value="America/Argentina/Buenos_Aires">S America: Central - Argentina,
                                        NE Brazil
                                    </option>
                                    <option value="America/Asuncion">S America: Central - Paraguay</option>
                                    <option value="America/Caracas">S America: Central - Venezuala, Bolivia</option>
                                    <option value="America/Sao_Paulo">S America: East - Rio, Uruguay</option>
                                    <option value="America/Lima">S America: West - Equador, Peru</option>
                                    <option value="Chile/Continental">South America: Chile</option>
                                    <option value="US/Alaska">USA: Alaska</option>
                                    <option value="US/Arizona">USA: Arizona</option>
                                    <option value="US/Central">USA: Central</option>
                                    <option value="US/Eastern">USA: Eastern</option>
                                    <option value="US/Hawaii">USA: Hawaii</option>
                                    <option value="US/Michigan">USA: Michigan</option>
                                    <option value="US/Mountain">USA: Mountain</option>
                                    <option value="US/Pacific">USA: Pacific</option>
                                </select>
                            </div>
                            <div class="group">
                                <label for="nationality">What is your nationality?</label>
                                <select name="nationality" id="nationality" onchange="">
                                    <option value="<?php echo $info->country ?>"
                                            selected><?php echo $info->country ?></option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Sint Eustatius Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Terr.</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo DRC</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote D'Ivoire (Ivory Cst)</option>
                                    <option value="HR">Croatia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="tl">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="EN">England</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="EU">European Union</option>
                                    <option value="FK">Falkland Isls (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Terr.</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard &amp; McDonald Isls</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea (North)</option>
                                    <option value="KR">Korea (South)</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="ND">Northern Ireland</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestine</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="GS">S.Georgia and S.Sandwich Ils</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin (French)</option>
                                    <option value="VC">Saint Vincent and Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SS">Scotland</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten (Dutch)</option>
                                    <option value="SK">Slovak Republic</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="SU">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SH">St. Helena</option>
                                    <option value="PM">St. Pierre and Miquelon</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen Isls</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">US Minor Outlying Isls</option>
                                    <option value="US">USA</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="VI">Virgin Islands (U.S.)</option>
                                    <option value="WA">Wales</option>
                                    <option value="WF">Wallis and Futuna Isls</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                        </section>
                        <section>
                            <h2>Fixture presentation</h2>
                            <p>How would you like your fixtures to be presented?</p>
                            <div class="group check-group slim-margin">
                                <label>
                                    <input type="radio" name="fixture_mode" id="fixture_mode0" value="row"
                                           checked="checked">Home Team v Away Team</label>
                            </div>
                            <div class="group check-group">
                                <label>
                                    <input type="radio" name="fixture_mode" id="fixture_mode1" value="us">Away Team
                                    @ Home Team (US style)</label>
                            </div>
                        </section>
                        <section>
                            <h2>Optional Information</h2>
                            <div class="group">
                                <label for="birthYear">When were you born?</label>
                                <select name="DOB" id="birthYear">
                                    <option value="<?php echo $info->DOB ?>"><?php echo $info->DOB ?></option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                </select>
                                <div class="info-below-input">From time to time we have prizes available only to
                                    over-18s, such as alcohol. If you do not enter your birth year you will not be
                                    eligible for any such prizes.
                                </div>
                            </div>
                            <div class="group">
                                <label for="occupation">What is your day job?</label>
                                <input type="text" id="occupation" name="occupation" class="max" maxlength="50"
                                       value=""></div>
                            <div class="group">
                                <label for="autobiography">Autobiography: would you like to tell the community
                                    something about yourself?</label>
                                <textarea id="autobiography" name="autobiography"></textarea>
                                <div class="textarea-counter">500 characters left</div>
                            </div>
                        </section>
                        <section>
                            <h2>Team allegiances</h2>
                            <p>Which team do you support in each of the tournaments you are playing?</p>
                            <table cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="padding:5px 21px 5px 0px;font-size:110%">June Internationals</td>
                                    <td style="padding:5px 0px 5px 0px">
                                        <input type="hidden" name="tournament1" value="571">
                                        <select name="allegiance1" style="width:250px;">
                                            <option value="0">** No allegiance **</option>
                                            <option value="330">Argentina</option>
                                            <option value="350">Australia</option>
                                            <option value="332">Canada</option>
                                            <option value="15">England</option>
                                            <option value="333">Fiji</option>
                                            <option value="16">France</option>
                                            <option value="334">Georgia</option>
                                            <option value="17">Ireland</option>
                                            <option value="18">Italy</option>
                                            <option value="335">Japan</option>
                                            <option value="351">New Zealand</option>
                                            <option value="339">Romania</option>
                                            <option value="683">Russia</option>
                                            <option value="19">Scotland</option>
                                            <option value="352" selected="">South Africa</option>
                                            <option value="342">Tonga</option>
                                            <option value="343">USA</option>
                                            <option value="20">Wales</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 21px 5px 0px;font-size:110%">World Cup Predictor</td>
                                    <td style="padding:5px 0px 5px 0px">
                                        <input type="hidden" name="tournament2" value="565">
                                        <select name="allegiance2" style="width:250px;">
                                            <option value="0">** No allegiance **</option>
                                            <option value="39" selected="">Argentina</option>
                                            <option value="40">Australia</option>
                                            <option value="2205">Belgium</option>
                                            <option value="41">Brazil</option>
                                            <option value="2202">Colombia</option>
                                            <option value="42">Costa Rica</option>
                                            <option value="43">Croatia</option>
                                            <option value="623">Denmark</option>
                                            <option value="466">Egypt</option>
                                            <option value="46">England</option>
                                            <option value="47">France</option>
                                            <option value="48">Germany</option>
                                            <option value="2506">Iceland</option>
                                            <option value="51">Iran</option>
                                            <option value="54">Japan</option>
                                            <option value="55">Mexico</option>
                                            <option value="734">Morocco</option>
                                            <option value="627">Nigeria</option>
                                            <option value="2513">Panama</option>
                                            <option value="2390">Peru</option>
                                            <option value="57">Poland</option>
                                            <option value="58">Portugal</option>
                                            <option value="2026">Russia</option>
                                            <option value="59">Saudi Arabia</option>
                                            <option value="728">Senegal</option>
                                            <option value="60">Serbia</option>
                                            <option value="61">South Korea</option>
                                            <option value="62">Spain</option>
                                            <option value="63">Sweden</option>
                                            <option value="64">Switzerland</option>
                                            <option value="67">Tunisia</option>
                                            <option value="630">Uruguay</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="totalAllegiances" value="2" id="totalAllegiances"></section>
                        <section>
                            <h1>ENTER ACTIVE TOURNAMENTS HERE</h1><!-- TODO INSERT ACTIVE TOURNAMENTS HERE --> <p>
                                When you log into
                            <div style="width: 100%; color:red; font-size: 18px; background-color: lightgray; height: 100px"
                                 class="" id="formMsg">

                            </div>
                            <div class="form-group">
                                <input type="hidden" name="hidden_id" value="<?php echo $info->userID ?>"/>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="submitHolder"><a href="" class="button">Save changes</a></div>

                            <button type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn">CHANGE
                            </button>
                        </section>
                        .
                        <?php echo form_close(); ?>
                    </div>


                </div><!--./user details-->

                <!--profile pic-->
                <div id="tab_2_contents" class="tab_content">
                    Option 2 stuff
                </div>

                <div id="tab_3_contents" class="tab_content">
                    Option 3 stuff
                </div>

                <div id="tab_4_contents" class="tab_content">
                    Option 4 stuff
                </div>

                <div id="tab_5_contents" class="tab_content">
                    Option 5 stuff
                </div>

                <div id="tab_6_contents" class="tab_content">
                    Option 6 stuff
                </div>

                <div id="tab_7_contents" class="tab_content">
                    Option 7 stuff
                </div>


            </div><!--/.col right-->
        </div><!--./row-->
    </div><!--./Page-->
</div><!--./container-->
<script type=text/javascript>
    /*
     $(function () {
     var form = $('#updateUserInfo');
     var formMessages = $('#formMsg');

     // Set up an event listener for the contact form.
     $(form).submit(function (e) {
     // Stop the browser from submitting the form.
     e.preventDefault();

     //do the validation here
     if (!validateTabReg()) {
     return;
     }
     /*
     // Serialize the form data.
     var formData = $(form).serialize();

     // Submit the form using AJAX.
     $.ajax({
     type: 'POST',
     url: $(form).attr('action'),
     data: formData
     }).done(function (response) {
     // Make sure that the formMessages div has the 'success' class.
     $(formMessages).removeClass('error').addClass('success');

     // Set the message text.
     $(formMessages).html(response); // < html();
     /*
     // Clear the form.
     $('').val('')
     }).fail(function (data) {
     // Make sure that the formMessages div has the 'error' class.
     $(formMessages).removeClass('success').addClass('error');

     // Set the message text.
     var messageHtml = data.responseText !== '' ? data.responseText : 'Oops! An error occured and your message could not be sent.';
     $(formMessages).html(messageHtml); // < html()
     });

     });

     function validateTabReg() {
     var valid = true;


     return valid;
     }
     })*/

    $('.tab_content').hide(); //typo here!
    $('.tab').click(function () {
        $('.tab_content').hide();
        var target = $(this.rel);
        if ($(this).parent().hasClass('tabActive')) {
            target.hide();
            $(this).parent().removeClass('tabActive');
        } else {
            $('.tabs li').removeClass('tabActive');
            target.show();
            $(this).parent().addClass('tabActive');
        }
    });
</script>
