<?php
$genmul=$_SERVER['DOCUMENT_ROOT'];
require_once("$genmul/wp-config.php");
?>
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package consultup
 */

?>

<?php
/**
* Template Name: Registration
*
* @package WordPress
* @subpackage Consultup
* @since Consultup 1.0
*/ ?>
<?php
session_start();
get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<head>

    <style type="text/css">
        #resulttable {

            border-collapse: collapse;
            
        }

        #resultth {

            height: 50px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            padding-left: 15px;
            padding-right: 15px;
            background-color: cornflowerblue;
            color: white;
            width: 140px;

        }

        #resulttr {
            height: 50px;
        }

        #resulttd {
            height: 50px;
            padding-left: 50px;
            padding-right: 15px;
        }

        #resulttr:hover {
            background-color: #f5f5f5
        }
    </style>

</head>

<main id="content">
  <div class="container">
        <!--insert school registration infor to db -->
        
        <form action="/wp-content/themes/consultup-child/insertSchool.php" method="post" enctype="multipart/form-data">
            <h2> Registration Here </h2>
            <?php 
if(!empty($_GET['error'])){
    $error=$_GET['error'];
    If($error==1){
        Echo "<font color ='red'>Insert error!</font>";
    }elseif ($error==2){
        Echo "<font color ='red'>Please input all fields!</font>";
    }elseif ($error==3){
        Echo "<font color ='red'>Please input correct phone number!</font>";
    }else{
        Echo "<font color ='red'>An account is found under this email!</font>";
    }
}
?>
            <h3>School Contact</h3>
            <table id="resulttable">
               <tr id="resulttr">
                <th id="resultth">Name</th>
                <td id="resulttd"><input type="text" name="firstName" placeholder="Firstname" value="<?php echo $_SESSION['firstName'];?>" required>&nbsp;&nbsp;
                    <input type="text" name="lastName"  placeholder="Lastname" value="<?php echo $_SESSION['lastName'];?>"  required></td>
               </tr>
              
                <tr id="resulttr">
                <th id="resultth">Password</th>
                <td id="resulttd"><input type="password" name="password" required></td>
           
                </tr>
                
                <tr id="resulttr">
                <th id="resultth">Email</th>
                <td id="resulttd"><input type="email" name="email" value="<?php echo $_SESSION['email'];?>"  required></td>
                </tr> 
                
                <tr id="resulttr">
                <th id="resultth">Phone No.</th>
                <td id="resulttd">
                    <select name="countryCode" placeholder="countryCode" required>
                        <!-- country codes (ISO 3166) and Dial codes. -->
                        <option data-countryCode="AU" value="61" Selected>Australia (+61)</option>
                        
                        <optgroup label="Other countries">
                            <option data-countryCode="CA" value="1">Canada (+1)</option>
                            <option data-countryCode="CN" value="86">China (+86)</option>
                            <option data-countryCode="SG" value="65">Singapore (+65)</option>
                            <option data-countryCode="GB" value="44">UK (+44)</option>
                            <option data-countryCode="US" value="1">USA (+1)</option>
                            
                            
                            
 <!--                       
                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                        
                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                        
                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                        
                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                        <option data-countryCode="FR" value="33">France (+33)</option>
                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
                        <option data-countryCode="IN" value="91">India (+91)</option>
                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                        
                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                       <option data-countryCode="GB" value="44">UK (+44)</option> 
                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                         <option data-countryCode="US" value="1">USA (+1)</option> 
                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option> -->
                    </optgroup>
                    </select>
                    <input type="text" name="phone" value="<?php echo $_SESSION['phone'];?>"  required></td>
               </tr>
               
                <tr id="resulttr">
                    <th id="resultth">Department</th>
                    <td id="resulttd"><input type="text" name="department" value="<?php echo $_SESSION['department'];?>"  required>&nbsp;&nbsp;
                        <input type="text" name="position" placeholder="Position" value="<?php echo $_SESSION['position'];?>"  required></td>
                </tr>
                <tr id="resulttr">
                    <th id="resultth">CV</th>
                    <td id="resulttd"><input type="file" name="file" id="file">
                        </td>
                </tr>
            </table>
               
            
            <tr><h3>School Details</h3></tr>
            <table id="resulttable">
                <tr id="resulttr">
                    <th id="resultth">School Name</th>
                    <td id="resulttd"><input type="text" name="schoolName" value="<?php echo $_SESSION['schoolName'];?>"  required></td>
                </tr>
                
                <tr id="resulttr">
                    <th id="resultth">School Address</th>
                    <td id="resulttd"><input type="text" name="schoolAddress" value="<?php echo $_SESSION['schoolAddress'];?>" required></td>
                </tr>

                <tr><th id="resultth">Country</th>
                <td id="resulttd"><table>
                    <tr>
                        <td> <select name="country" required>
                            <option value="AU" selected>Australia</option>
                            <option value="CA">Canada</option>
                            <option value="CN">China</option>           
                            <option value="SG">Singapore</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
	<!--<option value="AF">Afghanistan</option>
	<option value="AX">Åland Islands</option>
	<option value="AL">Albania</option>
	<option value="DZ">Algeria</option>
	<option value="AS">American Samoa</option>
	<option value="AD">Andorra</option>
	<option value="AO">Angola</option>
	<option value="AI">Anguilla</option>
	<option value="AQ">Antarctica</option>
	<option value="AG">Antigua and Barbuda</option>
	<option value="AR">Argentina</option>
	<option value="AM">Armenia</option>
	<option value="AW">Aruba</option>
	
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
	<option value="BO">Bolivia, Plurinational State of</option>
	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	<option value="BA">Bosnia and Herzegovina</option>
	<option value="BW">Botswana</option>
	<option value="BV">Bouvet Island</option>
	<option value="BR">Brazil</option>
	<option value="IO">British Indian Ocean Territory</option>
	<option value="BN">Brunei Darussalam</option>
	<option value="BG">Bulgaria</option>
	<option value="BF">Burkina Faso</option>
	<option value="BI">Burundi</option>
	<option value="KH">Cambodia</option>
	<option value="CM">Cameroon</option>
	
	<option value="CV">Cape Verde</option>
	<option value="KY">Cayman Islands</option>
	<option value="CF">Central African Republic</option>
	<option value="TD">Chad</option>
	<option value="CL">Chile</option>
	
	<option value="CX">Christmas Island</option>
	<option value="CC">Cocos (Keeling) Islands</option>
	<option value="CO">Colombia</option>
	<option value="KM">Comoros</option>
	<option value="CG">Congo</option>
	<option value="CD">Congo, the Democratic Republic of the</option>
	<option value="CK">Cook Islands</option>
	<option value="CR">Costa Rica</option>
	<option value="CI">Côte d'Ivoire</option>
	<option value="HR">Croatia</option>
	<option value="CU">Cuba</option>
	<option value="CW">Curaçao</option>
	<option value="CY">Cyprus</option>
	<option value="CZ">Czech Republic</option>
	<option value="DK">Denmark</option>
	<option value="DJ">Djibouti</option>
	<option value="DM">Dominica</option>
	<option value="DO">Dominican Republic</option>
	<option value="EC">Ecuador</option>
	<option value="EG">Egypt</option>
	<option value="SV">El Salvador</option>
	<option value="GQ">Equatorial Guinea</option>
	<option value="ER">Eritrea</option>
	<option value="EE">Estonia</option>
	<option value="ET">Ethiopia</option>
	<option value="FK">Falkland Islands (Malvinas)</option>
	<option value="FO">Faroe Islands</option>
	<option value="FJ">Fiji</option>
	<option value="FI">Finland</option>
	<option value="FR">France</option>
	<option value="GF">French Guiana</option>
	<option value="PF">French Polynesia</option>
	<option value="TF">French Southern Territories</option>
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
	<option value="HM">Heard Island and McDonald Islands</option>
	<option value="VA">Holy See (Vatican City State)</option>
	<option value="HN">Honduras</option>
	<option value="HK">Hong Kong</option>
	<option value="HU">Hungary</option>
	<option value="IS">Iceland</option>
	<option value="IN">India</option>
	<option value="ID">Indonesia</option>
	<option value="IR">Iran, Islamic Republic of</option>
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
	<option value="KP">Korea, Democratic People's Republic of</option>
	<option value="KR">Korea, Republic of</option>
	<option value="KW">Kuwait</option>
	<option value="KG">Kyrgyzstan</option>
	<option value="LA">Lao People's Democratic Republic</option>
	<option value="LV">Latvia</option>
	<option value="LB">Lebanon</option>
	<option value="LS">Lesotho</option>
	<option value="LR">Liberia</option>
	<option value="LY">Libya</option>
	<option value="LI">Liechtenstein</option>
	<option value="LT">Lithuania</option>
	<option value="LU">Luxembourg</option>
	<option value="MO">Macao</option>
	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
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
	<option value="FM">Micronesia, Federated States of</option>
	<option value="MD">Moldova, Republic of</option>
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
	<option value="NC">New Caledonia</option>
	<option value="NZ">New Zealand</option>
	<option value="NI">Nicaragua</option>
	<option value="NE">Niger</option>
	<option value="NG">Nigeria</option>
	<option value="NU">Niue</option>
	<option value="NF">Norfolk Island</option>
	<option value="MP">Northern Mariana Islands</option>
	<option value="NO">Norway</option>
	<option value="OM">Oman</option>
	<option value="PK">Pakistan</option>
	<option value="PW">Palau</option>
	<option value="PS">Palestinian Territory, Occupied</option>
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
	<option value="BL">Saint Barthélemy</option>
	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KN">Saint Kitts and Nevis</option>
	<option value="LC">Saint Lucia</option>
	<option value="MF">Saint Martin (French part)</option>
	<option value="PM">Saint Pierre and Miquelon</option>
	<option value="VC">Saint Vincent and the Grenadines</option>
	<option value="WS">Samoa</option>
	<option value="SM">San Marino</option>
	<option value="ST">Sao Tome and Principe</option>
	<option value="SA">Saudi Arabia</option>
	<option value="SN">Senegal</option>
	<option value="RS">Serbia</option>
	<option value="SC">Seychelles</option>
	<option value="SL">Sierra Leone</option>
	
	<option value="SX">Sint Maarten (Dutch part)</option>
	<option value="SK">Slovakia</option>
	<option value="SI">Slovenia</option>
	<option value="SB">Solomon Islands</option>
	<option value="SO">Somalia</option>
	<option value="ZA">South Africa</option>
	<option value="GS">South Georgia and the South Sandwich Islands</option>
	<option value="SS">South Sudan</option>
	<option value="ES">Spain</option>
	<option value="LK">Sri Lanka</option>
	<option value="SD">Sudan</option>
	<option value="SR">Suriname</option>
	<option value="SJ">Svalbard and Jan Mayen</option>
	<option value="SZ">Swaziland</option>
	<option value="SE">Sweden</option>
	<option value="CH">Switzerland</option>
	<option value="SY">Syrian Arab Republic</option>
	<option value="TW">Taiwan, Province of China</option>
	<option value="TJ">Tajikistan</option>
	<option value="TZ">Tanzania, United Republic of</option>
	<option value="TH">Thailand</option>
	<option value="TL">Timor-Leste</option>
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
	
	
	<option value="UM">United States Minor Outlying Islands</option>
	<option value="UY">Uruguay</option>
	<option value="UZ">Uzbekistan</option>
	<option value="VU">Vanuatu</option>
	<option value="VE">Venezuela, Bolivarian Republic of</option>
	<option value="VN">Viet Nam</option>
	<option value="VG">Virgin Islands, British</option>
	<option value="VI">Virgin Islands, U.S.</option>
	<option value="WF">Wallis and Futuna</option>
	<option value="EH">Western Sahara</option>
	<option value="YE">Yemen</option>
	<option value="ZM">Zambia</option>
	<option value="ZW">Zimbabwe</option> -->
</select>
                        <input type="text" name="state" placeholder="State" value="<?php echo $_SESSION['state'];?>" required>
                        &nbsp;&nbsp;<input type="text" name="city" placeholder="City" value="<?php echo $_SESSION['city'];?>" required>
                    </td></tr>
                   
                    
                    
                    </table></td>
               </tr>
                
                <tr id="resulttr">
                    <th id="resultth">School Level</th>
                    <td id="resulttd">
                     <select name="schoolLevel" required>
                         <?php
                         if($_SESSION['schoolLevel']==""){?>
                         <option selected hidden value="">Select School Type</option>
                              <option value="1">Early Year</option>
                         <option value="2">Primary</option>
                         <option value="3">Secondary</option>
                         <option value="4">Senior</option>
                         <option value="5">Tertiary</option>
                           <?php  
                         }else{
                         if($_SESSION['schoolLevel']==1){?>
                              <option value="1" selected>Early Year</option>
                           <?php  
                         }else{?>
                             <option value="1">Early Year</option>
                        <?php }
                         ?>
                          <?php
                         if($_SESSION['schoolLevel']==2){?>
                              <option value="2" selected>Primary</option>
                           <?php  
                         }else{?>
                             <option value="2">Primary</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['schoolLevel']==3){?>
                              <option value="3" selected>Secondary</option>
                           <?php  
                         }else{?>
                             <option value="3">Secondary</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['schoolLevel']==4){?>
                              <option value="4" selected>Senior</option>
                           <?php  
                         }else{?>
                             <option value="4">Senior</option>
                        <?php }
                         ?><?php
                         if($_SESSION['schoolLevel']==5){?>
                              <option value="5" selected>Tertiary</option>
                           <?php  
                         }else{?>
                             <option value="5">Tertiary</option>
                        <?php }
                         }
                         ?>

                      
                     </select>
                    </td>
                   </tr>
                
                
                
                <tr id="resulttr">
                    <th id="resultth">School Type</th>
                    <td id="resulttd">
                     <select name="schoolType" required>
     
                      <?php
                         if($_SESSION['schoolType']==""){?>
                              <option selected hidden value="">Select School Type</option>
                      <option value="1">School</option>
                      <option value="2">College</option>
                      <option value="3">University</option>
                      <option value="4">Institution</option>
                           <?php  
                         }else{
                         if($_SESSION['schoolType']==1){?>
                              <option value="1" selected>School</option>
                           <?php  
                         }else{?>
                             <option value="1">School</option>
                        <?php }
                         ?>
                          <?php
                         if($_SESSION['schoolType']==2){?>
                              <option value="2" selected>College</option>
                           <?php  
                         }else{?>
                             <option value="2">College</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['schoolType']==3){?>
                              <option value="3" selected>University</option>
                           <?php  
                         }else{?>
                             <option value="3">University</option>
                        <?php }?><?php
                         if($_SESSION['schoolType']==4){?>
                              <option value="4" selected>Institution</option>
                           <?php  
                         }else{?>
                             <option value="4">Institution</option>
                        <?php }
                         }
                         ?>
                     </select>
                    </td>
                   </tr>
                <tr id="resulttr">
                    <th id="resultth">School Size</th>
                    <td id="resulttd">
                     <select name="schoolSize">

                         <?php
                         if($_SESSION['schoolSize']==""){?>
                         <option selected hidden value="">Select School Size</option>
                          <option value="1">Small</option>
                          <option value="2">Medium</option>
                          <option value="3">Large</option>
                         <?php  
                         }else{
                         if($_SESSION['schoolSize']==1){?>
                         <option value="1" selected>Small</option>
                         <?php  
                         }else{?>
                         <option value="1">Small</option>
                         <?php }
                         ?>
                         <?php
                         if($_SESSION['schoolSize']==2){?>
                         <option value="2" selected>Medium</option>
                         <?php  
                         }else{?>
                         <option value="2">Medium</option>
                         <?php }
                         ?> <?php
                         if($_SESSION['schoolSize']==3){?>
                         <option value="3" selected>Large</option>
                         <?php  
                         }else{?>
                         <option value="3">Large</option>
                         <?php }
                         }
                         ?>



                     </select>
                    </td>
                </tr>
                
                
                
                </table>
                <table>
                    
                    <tr id="resulttr">
                   <fieldset> 
                   <table width="500" length="100" >
                       <tr> <legend>Who would you like to host?</legend>  </tr>
                       <tr>
                        <?php
                    if($_SESSION['hostVisiting']==""){?>
                    <td>&nbsp;<input type="checkbox" name="hostVisiting[]" value="1" onclick="return ValidatePetSelection();">  I would like to host visiting teachers</td>
                    <td><input type="checkbox" name="hostVisiting[]" value="2" onclick="return ValidatePetSelection();">  I would like to host visiting students</td>
                  <?php  }else{
          if($_SESSION['hostVisiting']=="1"){?>
              <td> <input type="checkbox" name="hostVisiting[]" value="1" checked="true" onclick="return ValidatePetSelection();">I would like to host visiting teachers</td>
              <td><input type="checkbox" name="hostVisiting[]" value="2" onclick="return ValidatePetSelection();">I would like to host visiting students</td> 
             <?php }   ?>
                
                    <?php
                    
                    
          if($_SESSION['hostVisiting']=="2"){?>
              <td> <input type="checkbox" name="hostVisiting[]" value="1" onclick="return ValidatePetSelection();">I would like to host visiting teachers</td>
              <td><input type="checkbox" name="hostVisiting[]" value="2" checked="true" onclick="return ValidatePetSelection();">I would like to host visiting students</td>
             <?php }   ?>
                <?php
                    
                    
          if($_SESSION['hostVisiting']=="1,2"){?>
              <td> <input type="checkbox" name="hostVisiting[]" value="1" checked="true" onclick="return ValidatePetSelection();">I would like to host visiting teachers</td>
              <td><input type="checkbox" name="hostVisiting[]" value="2" checked="true" onclick="return ValidatePetSelection();">I would like to host visiting students</td>  
             <?php }  
                    }?>
                       
                    </tr>   
                       
                       
                       
                   </table>
                   </fieldset>
               </tr>
                    
                    
                    
                <br>
                <tr id="resulttr">
                <fieldset>  
                   <table width="500" length="100" >
                        
                       <tr> <legend>Which months in the year are you able to accommodate exchange visitors?</legend>  </tr>
                       <tr> <td> &nbsp;<input type="checkbox" name="accommodateMonths[]" value="1" onclick="return ValidatePetSelection();">  January</td>
                        <td><input type="checkbox" name="accommodateMonths[]" value="2" onclick="return ValidatePetSelection();">  February</td>
                       <td> <input type="checkbox" name="accommodateMonths[]" value="3" onclick="return ValidatePetSelection();">  March </td></tr>
                        <tr><td>&nbsp;<input type="checkbox" name="accommodateMonths[]" value="4" onclick="return ValidatePetSelection();">  April</td>
                        <td><input type="checkbox" name="accommodateMonths[]" value="5" onclick="return ValidatePetSelection();">  May</td>
                        <td><input type="checkbox" name="accommodateMonths[]" value="6" onclick="return ValidatePetSelection();">  June </td></tr>
                        <tr><td>&nbsp;<input type="checkbox" name="accommodateMonths[]" value="7" onclick="return ValidatePetSelection();">  July</td>
                        <td><input type="checkbox" name="accommodateMonths[]" value="8" onclick="return ValidatePetSelection();">  August</td>
                       <td> <input type="checkbox" name="accommodateMonths[]" value="9" onclick="return ValidatePetSelection();">  September</td></tr>
                        <tr><td>&nbsp;<input type="checkbox" name="accommodateMonths[]" value="10" onclick="return ValidatePetSelection();">  October</td>
                       <td> <input type="checkbox" name="accommodateMonths[]" value="11" onclick="return ValidatePetSelection();">  November</td>
                       <td> <input type="checkbox" name="accommodateMonths[]" value="12" onclick="return ValidatePetSelection();">  December</td>
                    </table>
                </fieldset>
                
                </tr>
                <br>
                    
                     <tr id="resulttr">
                  
                    <table width="500" length="100" >
                        
                       <legend>Which specialisations do you offer?</legend>  
                        <?php
                        if($_SESSION['specialisations']==""){?>
                            <tr> <td>&nbsp;<input type="checkbox" name="specialisations[]" value="1" onclick="return ValidatePetSelection();">  Advanced</td>
                        <td><input type="checkbox" name="specialisations[]" value="2" onclick="return ValidatePetSelection();">  Primary</td></tr>
                       <?php }else{
                    
                    
          if($_SESSION['specialisations']=="1"){?>
              <tr> <td> <input type="checkbox" name="specialisations[]" value="1" checked="true" onclick="return ValidatePetSelection();">  Advanced</td>
                        <td><input type="checkbox" name="specialisations[]" value="2" onclick="return ValidatePetSelection();">  Primary</td></tr> 
             <?php }   ?>
                          <?php
                    
                    
          if($_SESSION['specialisations']=="2"){?>
              <tr> <td> <input type="checkbox" name="specialisations[]" value="1" onclick="return ValidatePetSelection();">  Advanced</td>
                        <td><input type="checkbox" name="specialisations[]" value="2" checked="true" onclick="return ValidatePetSelection();">  Primary</td></tr> 
             <?php }   ?>
                        
                          <?php
                    
                    
          if($_SESSION['specialisations']=="1,2"){?>
              <tr> <td> <input type="checkbox" name="specialisations[]" value="1" checked="true" onclick="return ValidatePetSelection();">  Advanced</td>
                        <td><input type="checkbox" name="specialisations[]" value="2" checked="true" onclick="return ValidatePetSelection();">  Primary</td></tr> 
             <?php } 
                        }?>
                        
                       
                       
                    </table>
            <br>
                
                </tr>
                    
                    
              
                <tr id="resulttr"></tr>
                  <tr id="resulttr"></tr>
                  <tr id="resulttr"></tr>
               
               <tr id="resulttr">
                <td id="resulttd">&nbsp;<input type="submit" value="Submit"></td>
               </tr>
              </table>
            
            
            
            
      
    
        
        
        </form>
      

  </div>
 </main>

<?php
session_destroy();
get_footer();
?>