<?php
/**
 * Template Name: Create talent profile page
 *
 * A page to create talent profile
 *
 *
 * @package WordPress
 * @subpackage workscout
 * @since workscout 1.0
 */
get_header(); ?>
<!-- Start --> 
<div class="container">
   <div class="row">
      <div class="col-md-12">
        <div class="create-profile">
         <div class="vc_col-sm-8">
         <h3>CREATE TALENT PROFILE</h3>
         <div class="profile-details-left">
         <div class="col-left">
          <div class="form-group">
           <label>FIRST NAME</label>
           <input id="firstname" class="w265" tabindex="1">
         </div>
         <div class="form-group">
           <label>LAST NAME</label>
           <input id="firstname" class="w265" tabindex="1">
         </div>
          <div class="form-group">
           <label>PHONE</label>
           <input id="firstname" class="w265" tabindex="1">
         </div>
         
         <h5>MAILING ADDRESS</h5>
          <div class="form-group">
           <label>STREET ADDRESS</label>
           <input id="firstname" class="w265" tabindex="1">
         </div>
          <div class="form-group">
            <div class="col-three">
             <label>City</label>
           <input id="firstname" class="w265" tabindex="1">
            </div>
            <div class="col-three">
             <label>STATE</label>
             <select name="mail-state" class="mt5" id="mail-state" tabindex="19">
  <option value="--">--</option>
  <option value="AL">AL</option>
  <option value="AK">AK</option>
  <option value="AZ">AZ</option>
  <option value="AR">AR</option>
  <option value="CA">CA</option>
  <option value="CO">CO</option>
  <option value="CT">CT</option>
  <option value="DE">DE</option>
  <option value="DC">DC</option>
  <option value="FL">FL</option>
  <option value="GA">GA</option>
  <option value="HI">HI</option>
  <option value="ID">ID</option>
  <option value="IL">IL</option>
  <option value="IN">IN</option>
  <option value="IA">IA</option>
  <option value="KS">KS</option>
  <option value="KY">KY</option>
  <option value="LA">LA</option>
  <option value="ME">ME</option>
  <option value="MD">MD</option>
  <option value="MA">MA</option>
  <option value="MI">MI</option>
  <option value="MN">MN</option>
  <option value="MS">MS</option>
  <option value="MO">MO</option>
  <option value="MT">MT</option>
  <option value="NE">NE</option>
  <option value="NV">NV</option>
  <option value="NH">NH</option>
  <option value="NJ">NJ</option>
  <option value="NM">NM</option>
  <option value="NY">NY</option>
  <option value="NC">NC</option>
  <option value="ND">ND</option>
  <option value="OH">OH</option>
  <option value="OK">OK</option>
  <option value="OR">OR</option>
  <option value="PA">PA</option>
  <option value="RI">RI</option>
  <option value="SC">SC</option>
  <option value="SD">SD</option>
  <option value="TN">TN</option>
  <option value="TX">TX</option>
  <option value="UT">UT</option>
  <option value="VT">VT</option>
  <option value="VA">VA</option>
  <option value="WA">WA</option>
  <option value="WV">WV</option>
  <option value="WI">WI</option>
  <option value="WY">WY</option>
</select>
            </div>
            
            <div class="col-three">
              <label>Zip</label>
          <input id="mail-zip" class="w50" tabindex="20">
           </div>
            
         </div>
         
         <h5>SHIPPING ADDRESS</h5>
         <div class="form-group">
           <label>STREET ADDRESS</label>
           <input id="firstname" class="w265" tabindex="1">
         </div>
         <div class="form-group">
            <div class="col-three">
             <label>City</label>
           <input id="firstname" class="w265" tabindex="1">
            </div>
            <div class="col-three">
             <label>STATE</label>
             <select name="mail-state" class="mt5" id="mail-state" tabindex="19">
  <option value="--">--</option>
  <option value="AL">AL</option>
  <option value="AK">AK</option>
  <option value="AZ">AZ</option>
  <option value="AR">AR</option>
  <option value="CA">CA</option>
  <option value="CO">CO</option>
  <option value="CT">CT</option>
  <option value="DE">DE</option>
  <option value="DC">DC</option>
  <option value="FL">FL</option>
  <option value="GA">GA</option>
  <option value="HI">HI</option>
  <option value="ID">ID</option>
  <option value="IL">IL</option>
  <option value="IN">IN</option>
  <option value="IA">IA</option>
  <option value="KS">KS</option>
  <option value="KY">KY</option>
  <option value="LA">LA</option>
  <option value="ME">ME</option>
  <option value="MD">MD</option>
  <option value="MA">MA</option>
  <option value="MI">MI</option>
  <option value="MN">MN</option>
  <option value="MS">MS</option>
  <option value="MO">MO</option>
  <option value="MT">MT</option>
  <option value="NE">NE</option>
  <option value="NV">NV</option>
  <option value="NH">NH</option>
  <option value="NJ">NJ</option>
  <option value="NM">NM</option>
  <option value="NY">NY</option>
  <option value="NC">NC</option>
  <option value="ND">ND</option>
  <option value="OH">OH</option>
  <option value="OK">OK</option>
  <option value="OR">OR</option>
  <option value="PA">PA</option>
  <option value="RI">RI</option>
  <option value="SC">SC</option>
  <option value="SD">SD</option>
  <option value="TN">TN</option>
  <option value="TX">TX</option>
  <option value="UT">UT</option>
  <option value="VT">VT</option>
  <option value="VA">VA</option>
  <option value="WA">WA</option>
  <option value="WV">WV</option>
  <option value="WI">WI</option>
  <option value="WY">WY</option>
</select>
            </div>
            
            <div class="col-three">
              <label>Zip</label>
          <input id="mail-zip" class="w50" tabindex="20">
           </div>
            
         </div>
         
         <h5> LANGUAGES SPOKEN - (CHECK ALL THAT APPLY) </h5> 
         <div class="form-group checkbox-list">
              <div class="col-three">
              <div class="roundedOne">
                <input id="english-1" tabindex="39" type="checkbox">
                <label for="english-1"><span>ENGLISH</span></label>
              </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-2" tabindex="39" type="checkbox">
               <label for="english-2"><span>SPANISH</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-3" tabindex="39" type="checkbox">
               <label for="english-3"><span>MANDARIN</span></label>
               </div>
              </div>
              
               <div class="col-three">
                <div class="roundedOne">
               <input id="english-4" tabindex="39" type="checkbox">
               <label for="english-4"><span>JAPANESE</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-5" tabindex="39" type="checkbox">
               <label for="english-5"><span>RUSSIAN</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-6" tabindex="39" type="checkbox">
               <label for="english-6"><span>ARABIC</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-7" tabindex="39" type="checkbox">
               <label for="english-7"><span>HEBREW</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-8" tabindex="39" type="checkbox">
               <label for="english-8"><span>FRENCH</span></label>
               </div>
              </div>
              
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-9" tabindex="39" type="checkbox">
               <label for="english-9"><span>GERMAN</span></label>
               </div>
              </div>
              
         </div>
         
         <h5>SOCIAL NETWORKING
           <span>(Please copy & paste the full URL (link) to your profile page, ex: http://www.website.com/profile-here )</span>
         </h5> 
         <div class="form-group checkbox-list">
            <div class="col-two">
             <label>FACEBOOK LINK</label>
             <input type="text">
            </div>
            <div class="col-two">
             <label>TWITTER LINK</label>
             <input type="text">
            </div>
             <div class="col-two">
             <label>TWITTER LINK</label>
             <input type="text">
            </div>
            <div class="col-two">
             <label>MODEL MAYHEM LINK</label>
             <input type="text">
            </div>
             <div class="col-two">
             <label>PORTFOLIO LINK</label>
             <input type="text">
            </div>
            
             <div class="col-two">
             <label>OTHER LINK</label>
             <input type="text">
            </div> 
            
        </div>
         
         
                   
       </div>
         <div class="col-right">
          <div class="form-group ">
            <div class="col-five">
             <label>AGE</label>
             <input type="text">
            </div>
            <div class="col-gender">
             <label>GENDER</label>
             <select id="gender" class="mt5 mr5" tabindex="6">
    <option value="male">Male</option>
    <option value="female" selected="">Female</option>
  </select>
            </div>
            
            <div class="col-birth">
             <label>DATE OF BIRTH</label>
            <select id="month" class="mr5 mt5" tabindex="7">
        <option value="1">Jan</option>
        <option value="2">Feb</option>
        <option value="3">Mar</option>
        <option value="4">Apr</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">Aug</option>
        <option value="9">Sept</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>
    </select>
    
    <select id="day" class="mr5 mt5" tabindex="8">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>
    
    <select id="year" class="mt5" tabindex="9">
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
    <option value="1920">1920</option>
    <option value="1919">1919</option>
    <option value="1918">1918</option>
    <option value="1917">1917</option>
    <option value="1916">1916</option>
    <option value="1915">1915</option>
    <option value="1914">1914</option>
    <option value="1913">1913</option>
    <option value="1912">1912</option>
    <option value="1911">1911</option>
    <option value="1910">1910</option>
    <option value="1909">1909</option>
    <option value="1908">1908</option>
    <option value="1907">1907</option>
    <option value="1906">1906</option>
    <option value="1905">1905</option>
    <option value="1904">1904</option>
    <option value="1903">1903</option>
    <option value="1902">1902</option>
    <option value="1901">1901</option>
    <option value="1900">1900</option>
</select>
            </div>  
         </div>
         
          <div class="form-group ">
            <div class="col-three">
              <label>HEIGHT</label>
            <select class="mt5 mr5" id="height-feet" tabindex="10" style="width:47%;  display:inline-block;">
	<option value="3">3'</option>
	<option value="4">4'</option>
	<option value="5" selected="">5'</option>
	<option value="6">6'</option>
	<option value="7">7'</option>
</select>
<select class="mt5" id="height-inches" tabindex="11" style="width:47%; display:inline-block;">
	<option value="0" selected="">0"</option>
	<option value="1">1"</option>
	<option value="2">2"</option>
	<option value="3">3"</option>
	<option value="4">4"</option>
	<option value="5">5"</option>
	<option value="6">6"</option>
	<option value="7">7"</option>
	<option value="8">8"</option>
	<option value="9">9"</option>
	<option value="10">10"</option>
	<option value="11">11"</option>
</select>
            </div>  
            
            <div class="col-three">
              <label>WEIGHT</label>
            <input id="weight" class="w30" tabindex="12" style=" width:65%; margin-right:4px;"><span>lbs</span>

            </div>  
            <div class="col-three">
              <label>ETHNICITY</label>
            <select class="mt5" id="ethnicity" tabindex="13">
	<option value="caucasian">Caucasian</option>
	<option value="hispanic">Hispanic</option>
	<option value="african">African</option>
	<option value="asian">Asian</option>
	<option value="native american">Native American</option>
	<option value="indian">Indian</option>
	<option value="middle eastern">Middle Eastern</option>
	<option value="mixed">Mixed</option>
	<option value="other">Other</option>
</select>

            </div> 
              
          </div>
          
          <div class="form-group ">
            <div class="col-three">
              <label>EYE COLOR</label>
           <select class="mt5" id="eye-color" tabindex="14">
	<option value="blue">Blue</option>
	<option value="green">Green</option>
	<option value="brown">Brown</option>
	<option value="hazel">Hazel</option>
	<option value="amber">Amber</option>
</select>            </div>  
            
            <div class="col-three">
              <label>HAIR LENGTH</label>
            <select class="mt5" id="hair-length" tabindex="15">
	<option value="very short">Very Short</option>
	<option value="short">Short</option>
	<option value="shoulder length">Shoulder Length</option>
	<option value="long" selected="">Long</option>
	<option value="very long">Very Long</option>
</select>

            </div>  
            <div class="col-three">
              <label>HAIR COLOR</label>
            <select class="mt5" id="hair-color" tabindex="16">
	<option value="blonde">Blonde</option>
	<option value="brown">Brown</option>
	<option value="black">Black</option>
	<option value="red">Red</option>
	<option value="other">Other</option>
</select>

            </div> 
              
          </div>
          
          <h5>MEASUREMENTS</h5>
          <div class="form-group ">
             <div class="col-four">
               <label>BUST</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             <div class="col-four">
               <label>CUP</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
              <div class="col-four">
               <label>WAIST</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             <div class="col-four">
               <label>HIPS</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             
             <div class="col-four">
               <label>SHOE</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             
             <div class="col-four">
               <label>DRESS</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             
             <div class="col-four">
               <label>SHIRT</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             
            <div class="col-four">
               <label>INSEAM</label>
               <input id="bust" class="w30" tabindex="26">
             </div> 
             
           </div>
         
          <h5>BODY MODIFICATION</h5>
         <div class="form-group ">
             <div class="body-modify-col">
               <label>BUST</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             <div class="col-four">
             <div class="roundedOne">
               <input id="english-20" tabindex="39" autocomplete="off" type="checkbox">
                <label for="english-20" > <span>NONE</span></label>
                </div>
             </div>
             
           </div>
           
           <div class="form-group ">
             <div class="body-modify-col">
               <label>PIERCINGS</label>
               <input id="bust" class="w30" tabindex="26">
             </div>
             <div class="col-four">
              <div class="roundedOne">
               <input id="bust-1" tabindex="39" autocomplete="off" type="checkbox">
                <label for="bust-1"> <span>NONE</span></label>
                </div>
             </div>
             
           </div>
           
           
          <h5>EXPERIENCE - (CHECK ALL THAT APPLY)</h5> 
         <div class="form-group checkbox-list">
              <div class="col-three">
               <div class="roundedOne">
               <input id="english-10" tabindex="39" type="checkbox">
               <label for="english-10"><span>TRADE SHOWS</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-11" tabindex="39" type="checkbox">
               <label for="english-11"><span>PRINT</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-12" tabindex="39" type="checkbox">
               <label for="english-12"><span>SINGING</span></label>
               </div>
              </div>
              
               <div class="col-three">
               <div class="roundedOne">
               <input id="english-13" tabindex="39" type="checkbox">
               <label for="english-13"><span>PROMOTIONS</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-14" tabindex="39" type="checkbox">
               <label for="english-14" ><span>RUNWAY</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-15" tabindex="39" type="checkbox">
               <label for="english-15"><span>DANCE</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-16" tabindex="39" type="checkbox">
               <label for="english-16" ><span>STREET TEAMS</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-17" tabindex="39" type="checkbox">
               <label for="english-17"><span>MANAGER</span></label>
               </div>
              </div>
              
              <div class="col-three">
              <div class="roundedOne">
               <input id="english-18" tabindex="39" type="checkbox">
               <label for="english-18" ><span>TEAM LEAD</span></label>
               </div>
              </div>
              
         </div>
         
         
          <h5>ABOUT YOU
<span>(This information will appear on your profile. Please use full sentences, correct grammar, punctuation, and spelling.)</span></h5> 
         
         <div class="form-group">
         <textarea id="about"  rows="7"></textarea>
         </div>
         
         
       </div>
       <div class="event-row">
        <div class="note">PLEASE LIST YOUR 3 MOST RECENT EVENTS<br />
(This information will appear on your profile. Please use full sentences, correct grammar, punctuation, and spelling.)</div>
<div class="event-col">
<div class="form-group">
   <div class="col-four">
      <label> EVENT NAME</label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="col-four">
      <label>LOCATION </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
             
 <div class="col-four">
      <label>DATE(S) </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
     <div class="col-four">
      <label>HOURS </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="des-col">
    
      <label> DESCRIPTION OF WORK </label>
      <input id="bust" class="w30" tabindex="26">
    </div> 
</div>
</div>

<div class="event-col">
<div class="form-group">
   <div class="col-four">
      <label> EVENT NAME</label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="col-four">
      <label>LOCATION </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
             
 <div class="col-four">
      <label>DATE(S) </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
     <div class="col-four">
      <label>HOURS </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="des-col">
    
      <label> DESCRIPTION OF WORK </label>
      <input id="bust" class="w30" tabindex="26">
    </div>

</div>
</div>

<div class="event-col">
<div class="form-group">
   <div class="col-four">
      <label> EVENT NAME</label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="col-four">
      <label>LOCATION </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
             
 <div class="col-four">
      <label>DATE(S) </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
     <div class="col-four">
      <label>HOURS </label>
      <input id="bust" class="w30" tabindex="26">
    </div>
    <div class="des-col">
    
      <label> DESCRIPTION OF WORK </label>
      <input id="bust" class="w30" tabindex="26">
    </div>

</div>
</div>

       
       </div>
    <div class="upload-details">
    

<div class="container">
  <div class="row">
     <div class="vc_col-sm-6">
      <div class="note"> PLEASE UPLOAD 5 CURRENT IMAGES - (SNAPSHOT, HEADSHOT, FULL BODY, AND SMILE)<br />
<em>(ONLY UPLOAD JPG, PNG, OR GIF FILES)</em></div>     
        <form  name="upload" class="upload-f upload" method="post" action="http://gaming-fe.stpi.com/account/identity/upload/utility" enctype="multipart/form-data">
			  		<input name="_token" id="csrf-token" value="wGc56EXl6BntTtC8yrUtYtawLp9dme9Y3vBpIAlY" type="hidden">
					<div  class="drop-wapper drop">Drop Here<br>
						<a>Browse Files</a>
						<input name="file_to_upload" type="file">
					</div>
					<ul>
					<!-- The file uploads will be shown here -->
					</ul>
				</form>
     </div>
     <div class="vc_col-sm-6">
      <div class="note" style="margin-top:36px;">PLEASE UPLOAD AN UP-TO-DATE RESUME</div>    
        <form  name="upload" method="post" class="upload-f upload"  enctype="multipart/form-data">
			  		<input name="_token" id="csrf-token" value="svpI6TNufDbyTsymqMG9pQ8C6YHHWTJwKNhJY3XP" type="hidden">
					<div class="drop-wapper drop">
						Drop Here<br>
						<a>Browse Files</a>
						<input name="file_to_upload" type="file">
					</div>
					<ul>
					</ul>
				</form>
     </div>
     
      <div class="vc_col-sm-12">
        <div class="form-footer">
          <p><input id="english" tabindex="39" type="checkbox"> I have read and agree to the <a href="#">Terms & Conditions</a></p>
          <input name="" class="btn" value="SUBMIT" type="button">
         </div>
      </div>
  </div>
  
</div>
    
    </div>    
     
         
            </div>
         
         </div>
         
         <div class="vc_col-sm-4">
          <div class="profile-details-right">
            <h4>Creating your Profile
               <span> CEA Staffing Submission Form Guidlines</span>
            </h4>
          <p>CEA Staffing reviews each submitted profile for quality and accuracy before approval. Please take the following tips into consideration when creating your profile, as it may help your chances of being approved and receiving work.</p>
          <ul>
             <li>Unfortunately, this website is not Safari friendly. When creating profiles, please use Google Chrome or Fire Fox. This will help solve many issues right off the bat.</li>
             <li>Please do not include your full name or any contact information in the "about you" section. This should be a short pararaph that lets us know a little more about your experience in the industry and any additional info you would like to provide about yourself.</li>
             <li>If you attempt to add more pictures than allowed, your pictures may not save properly. If you want to add new pictures, please make sure to delete the old images you no longer wish to feature.</li>
             <li>DO NOT paste your resume in the about me section. This should be a short paragraph about your self.</li>
             <li>Please fill out your name completely. Your full last name will only be seen by our administrators.</li>
             <li>Please include your area code with your telephone number, and check the "TXT" box if you are able to receive text messages.</li>
             <li>Please include the entire link to your social networking profiles, for example: http://twitter.com/UsernameHere</li>
             <li>The "About You" section should include any experience, skills, training, or interests that are relevant to employment as event staff.</li>
             <li>When listing your three most recent events, please accurately describe what your responsibilities were for the event. If you do not have any experience, or do not have 3 events to list, please fill out "N/A" or "none" for the empty boxes.</li>
             <li>Please submit 5 of your most professional, most recent photos as a .jpg, .png, or .gif file. Other filetypes are not permitted. Files must be less than 1mb.</li>
             <li>Please submit single photos, no collages, and only photos of yourself, by yourself are acceptable.</li>
             <li>Please upload your resume in the appropriate location.</li>
             <li>Please upload your resume in Word (.doc or .docx) or PDF format.</li>
             <li>Deleting photos: To delete a photo simply scroll over image and hit the X symbol. Then make sure to refresh the page each time you delete a photo.</li>
 
          </ul>
          <p>If you have any issues creating your profile, please contact our support by clicking here.</p>
          </div>
         </div>
         
        </div>
      </div>
   </div>

</div>

<!-- End -->
<script>
jQuery(function(){
var ul = jQuery('.upload ul');

jQuery('.drop a').click(function(){
    // Simulate a click on the file input button
    // to show the file browser dialog
    jQuery(this).parent().find('input').click();
});

// Initialize the jQuery File upload1 plugin
jQuery('.upload').fileupload({

    // This element will accept file drag/drop upload1ing
    dropZone: jQuery('drop'),

    // This function is called when a file is added to the queue;
    // either via the browse button, or via drag/drop:
    add: function (e, data) {

        var tpl =jQuery('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
            ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

        // Append the file name and file size
        tpl.find('p').text(data.files[0].name)
                     .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

        // Add the HTML to the UL element
        data.context = tpl.appendTo(ul);

        // Initialize the knob plugin
        tpl.find('input').knob();

        // Listen for clicks on the cancel icon
        tpl.find('span').click(function(){

            if(tpl.hasClass('working')){
                jqXHR.abort();
            }

            tpl.fadeOut(function(){
                tpl.remove();
            });

        });

        // Automatically upload1 the file once it is added to the queue
        var jqXHR = data.submit();
    },

    progress: function(e, data){

        // Calculate the completion percentage of the upload1
        var progress = parseInt(data.loaded / data.total * 100, 10);

        // Update the hidden input field and trigger a change
        // so that the jQuery knob plugin knows to update the dial
        data.context.find('input').val(progress).change();

        if(progress == 100){
            jQuery('.drop').css('display','none');
            data.context.removeClass('working');
        }
    },

    fail:function(e, data){
        // Something has gone wrong!
        data.context.addClass('error');
    }

});


// Prevent the default action when a file is dropped on the window
jQuery(document).on('drop dragover', function (e) {
    e.preventDefault();
});

// Helper function that formats the file sizes
function formatFileSize(bytes) {
    if (typeof bytes !== 'number') {
        return '';
    }

    if (bytes >= 1000000000) {
        return (bytes / 1000000000).toFixed(2) + ' GB';
    }

    if (bytes >= 1000000) {
        return (bytes / 1000000).toFixed(2) + ' MB';
    }

    return (bytes / 1000).toFixed(2) + ' KB';
}

});

</script>

<?php get_footer(); ?>