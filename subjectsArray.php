<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
require("dbconn.php");
$class = $_POST['theOption'];
if($class == '9')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="ENGLISH" style="background-color:#9CF">ENGLISH</option>
    <option value="MATHEMATICS" style="background-color:#9CF">MATHEMATICS</option>
    <option value="SCIENCE" style="background-color:#9CF">SCIENCE</option>
    <option value="SOCIAL SCIENCES" style="background-color:#9CF">SOCIAL SCIENCES</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
	<optgroup style="background-color:#30C" label="-----Sixth Subject-----"></optgroup>
    <!--<option value="fit" style="background-color:#999">FIT</option>
    <option value="ms" style="background-color:#999">MUSIC</option>
    <option value="hs" style="background-color:#999">HOME SCIENCE</option>
    <option value="bk" style="background-color:#999">BK & ACCOUNTANCY</option>
    <option value="iv" style="background-color:#999">IT(VOCATIONAL)</option>
    <option value="ee" style="background-color:#999">ENVIRONMENTAL EDUCATION</option>
    <option value="tt" style="background-color:#999">TOURISM & HOSPITALITY</option>
    <option value="hc" style="background-color:#999">HEALTH CARE</option>
    <option value="rt" style="background-color:#999">RETAIL</option>
    <option value="et" style="background-color:#999">ELECTRICAL TECHNOLOGY</option>
    <option value="bw" style="background-color:#999">BEAUTY & WELLNESS</option>
    <option value="mc" style="background-color:#999">MULTISKILL FOUNDATION COURSE</option>
    <option value="av" style="background-color:#999">AGRICULTURE</option>
    -->
    </select>
    <?php 
}
if($class == '10')
{?>
    <b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="ENGLISH" style="background-color:#9CF">ENGLISH</option>
    <option value="MATHEMATICS A" style="background-color:#9CF">MATHEMATICS A</option>
    <option value="MATHEMATICS B" style="background-color:#9CF">MATHEMATICS B</option>
    <option value="SCIENCE" style="background-color:#9CF">SCIENCE</option>
    
    <option value="SOCIAL SCIENCES" style="background-color:#9CF">SOCIAL SCIENCES</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
 	<optgroup style="background-color:#30C" label="-----Sixth Subject-----"></optgroup>
    <option value="fit" style="background-color:#999">FIT</option>
    <option value="ms" style="background-color:#999">MUSIC</option>
    <option value="hs" style="background-color:#999">HOME SCIENCE</option>
    <option value="bk" style="background-color:#999">BK & ACCOUNTANCY</option>
    <option value="iv" style="background-color:#999">IT</option>
    <option value="ee" style="background-color:#999">ENVIRONMENTAL EDUCATION</option>
    <option value="tt" style="background-color:#999">TOURISM & HOSPITALITY</option>
    <option value="hv" style="background-color:#999">HEALTH CARE</option>
    <option value="rv" style="background-color:#999">RETAIL</option>
    <option value="ev" style="background-color:#999">ELECTRONICS</option>
    <option value="bv" style="background-color:#999">BEAUTY & WELLNESS</option>
    <option value="mv" style="background-color:#999">MULTISKILL FOUNDATION COURSE</option>
    <option value="av" style="background-color:#999">AGRICULTURE</option>
    <option value="at" style="background-color:#999">AUTOMOTIVE</option>
    <option value="pv" style="background-color:#999">PLUMBING</option>
    <option value="mm" style="background-color:#999">MUSIC MANUSCRIPT</option>
    <option value="graph" style="background-color:#999">GRAPH</option>
    </select>
    <?php
}
if($class == '11a')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    <option value="edn" style="background-color:#9CF">Education</option>
    <option value="psy" style="background-color:#9CF">Psychology</option>
    <option value="geo" style="background-color:#9CF">Geography</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="msc" style="background-color:#9CF">Music</option>
    <option value="his" style="background-color:#9CF">History</option>
    <option value="eco" style="background-color:#9CF">Economics</option>
    <option value="sgy" style="background-color:#9CF">Sociology</option>
    <option value="psc" style="background-color:#9CF">Political Science</option>
    <option value="ffm" style="background-color:#9CF">Financial Markets Management</option>
    <option value="phi" style="background-color:#9CF">Philosophy</option>
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
    <option value="rtv" style="background-color:#9CF">Retail</option>
    <option value="hcv" style="background-color:#9CF">Health Care</option>
    <option value="ehv" style="background-color:#9CF">ELECTRONICS & HARDWARE</option>
    <option value="btv" style="background-color:#9CF">BEAUTY & WELLNESS</option>
    <option value="msv" style="background-color:#9CF">MULTISKILL FOUNDATION COURSE</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}

if($class == '12a')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    <option value="edn" style="background-color:#9CF">Education</option>
    <option value="psy" style="background-color:#9CF">Psychology</option>
    <option value="geo" style="background-color:#9CF">Geography</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="fmm" style="background-color:#9CF">Financial Markets Management</option>
    <option value="mat" style="background-color:#9CF">Mathematics</option>
    <option value="msc" style="background-color:#9CF">Music</option>
    <option value="his" style="background-color:#9CF">History</option>
    <option value="eco" style="background-color:#9CF">Economics</option>
    <option value="sgy" style="background-color:#9CF">Sociology</option>
    <option value="psc" style="background-color:#9CF">Political Science</option>
    <option value="phi" style="background-color:#9CF">Philosophy</option>
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
    <option value="hcv" style="background-color:#9CF">Healthcare</option>
    <option value="rtv" style="background-color:#9CF">Retail</option>
     <option value="btv" style="background-color:#9CF">Beauty & Wellness</option>
      <option value="ehv" style="background-color:#9CF">Electronics</option>
	<option value="agv" style="background-color:#9CF">Agriculture</option>
<option value="atv" style="background-color:#9CF">Automotive</option>
    <option value="mm" style="background-color:#9CF">Music Manuscript</option>
    <option value="graph" style="background-color:#9CF">Graph</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}
if($class == '11c')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    <option value="ffm" style="background-color:#9CF">Financial Markets Management</option>
    <option value="ent" style="background-color:#9CF">Entrepreneurship</option>
    <option value="bus" style="background-color:#9CF">Business Studies</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="fbm" style="background-color:#9CF">Fundamentals of Business Mathematics</option>
    <option value="acc" style="background-color:#9CF">Accountancy</option>
    <option value="eco" style="background-color:#9CF">Economics</option>
    <option value="muf" style="background-color:#9CF">Mutual Funds</option>
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
    <option value="rtv" style="background-color:#9CF">Retail</option>
    <option value="hcv" style="background-color:#9CF">Health Care</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}
if($class == '12c')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    
    <option value="ent" style="background-color:#9CF">Entrepreneurship</option>
    <option value="bus" style="background-color:#9CF">Business Studies</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="fbm" style="background-color:#9CF">Fundamentals of Business Mathematics</option>
    <option value="fmm" style="background-color:#9CF">Financial Markets Management</option>
    <option value="grp" style="background-color:#9CF">(FBM)Graph</option>
    <option value="acc" style="background-color:#9CF">Accountancy</option>
    <option value="eco" style="background-color:#9CF">Economics</option>
    
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
<option value="agv" style="background-color:#9CF">Agriculture</option>
<option value="atv" style="background-color:#9CF">Automotive</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}

if($class == '11s')
{?>
	<b>Subject:</b>
    <select name="sub" class="form-control">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    <option value="phy" style="background-color:#9CF">Physics</option>
    <option value="che" style="background-color:#9CF">Chemistry</option>
    <option value="mat" style="background-color:#9CF">Mathematics</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="bio" style="background-color:#9CF">Biology</option>
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
    <option value="rtv" style="background-color:#9CF">Retail</option>
    <option value="hcv" style="background-color:#9CF">Health Care</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}

if($class == '12s')
{?>
	<b>Subject:</b>
    <select class="form-control" name="sub">
    <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="eng" style="background-color:#9CF">English</option>
    <option value="phy" style="background-color:#9CF">Physics</option>
    <option value="che" style="background-color:#9CF">Chemistry</option>
    <option value="mat" style="background-color:#9CF">Mathematics</option>
    <option value="grp" style="background-color:#9CF">Maths(Graph)</option>
    <option value="evs" style="background-color:#9CF">Environmental Education</option>
    <option value="bio" style="background-color:#9CF">Biology</option>
    <option value="csc" style="background-color:#9CF">Computer Science</option>
    <option value="inf" style="background-color:#9CF">Informatics Practices</option>
    <option value="itv" style="background-color:#9CF">Information Technology</option>
    <option value="ttv" style="background-color:#9CF">Tourism & Hospitality</option>
<option value="agv" style="background-color:#9CF">Agriculture</option>
<option value="atv" style="background-color:#9CF">Automotive</option>
<option value="hcv" style="background-color:#9CF">Healthcare</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI(SÜTSAH)</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
    </select>
<?php
}

