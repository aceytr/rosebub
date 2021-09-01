<?php


if (! function_exists('helperI18n_convertDateFromTimezone'))
{

	function helperI18n_convertDateFromTimezone($date,$timezone,$timezone_to,$format){
		$date = new DateTime($date,new DateTimeZone($timezone));
		$date->setTimezone( new DateTimeZone($timezone_to) );
		return $date->format($format);
	}

}



if (! function_exists('helperI18n_getPrefixPhoneForCountries'))
{

	function helperI18n_getPrefixPhoneForCountries()
	{
		
		$countryArray = array(
			'AD'=>array('name'=>'ANDORRA','code'=>'376'),
			'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),
			'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
			'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
			'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
			'AL'=>array('name'=>'ALBANIA','code'=>'355'),
			'AM'=>array('name'=>'ARMENIA','code'=>'374'),
			'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
			'AO'=>array('name'=>'ANGOLA','code'=>'244'),
			'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
			'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
			'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
			'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
			'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
			'AW'=>array('name'=>'ARUBA','code'=>'297'),
			'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
			'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
			'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
			'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
			'BE'=>array('name'=>'BELGIUM','code'=>'32'),
			'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
			'BG'=>array('name'=>'BULGARIA','code'=>'359'),
			'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
			'BI'=>array('name'=>'BURUNDI','code'=>'257'),
			'BJ'=>array('name'=>'BENIN','code'=>'229'),
			'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
			'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
			'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
			'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
			'BR'=>array('name'=>'BRAZIL','code'=>'55'),
			'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
			'BT'=>array('name'=>'BHUTAN','code'=>'975'),
			'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
			'BY'=>array('name'=>'BELARUS','code'=>'375'),
			'BZ'=>array('name'=>'BELIZE','code'=>'501'),
			'CA'=>array('name'=>'CANADA','code'=>'1'),
			'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
			'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
			'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
			'CG'=>array('name'=>'CONGO','code'=>'242'),
			'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
			'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
			'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
			'CL'=>array('name'=>'CHILE','code'=>'56'),
			'CM'=>array('name'=>'CAMEROON','code'=>'237'),
			'CN'=>array('name'=>'CHINA','code'=>'86'),
			'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
			'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
			'CU'=>array('name'=>'CUBA','code'=>'53'),
			'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
			'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
			'CY'=>array('name'=>'CYPRUS','code'=>'357'),
			'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
			'DE'=>array('name'=>'GERMANY','code'=>'49'),
			'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
			'DK'=>array('name'=>'DENMARK','code'=>'45'),
			'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
			'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
			'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
			'EC'=>array('name'=>'ECUADOR','code'=>'593'),
			'EE'=>array('name'=>'ESTONIA','code'=>'372'),
			'EG'=>array('name'=>'EGYPT','code'=>'20'),
			'ER'=>array('name'=>'ERITREA','code'=>'291'),
			'ES'=>array('name'=>'SPAIN','code'=>'34'),
			'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
			'FI'=>array('name'=>'FINLAND','code'=>'358'),
			'FJ'=>array('name'=>'FIJI','code'=>'679'),
			'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
			'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
			'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
			'FR'=>array('name'=>'FRANCE','code'=>'33'),
			'GA'=>array('name'=>'GABON','code'=>'241'),
			'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
			'GD'=>array('name'=>'GRENADA','code'=>'1473'),
			'GE'=>array('name'=>'GEORGIA','code'=>'995'),
			'GH'=>array('name'=>'GHANA','code'=>'233'),
			'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
			'GL'=>array('name'=>'GREENLAND','code'=>'299'),
			'GM'=>array('name'=>'GAMBIA','code'=>'220'),
			'GN'=>array('name'=>'GUINEA','code'=>'224'),
			'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
			'GR'=>array('name'=>'GREECE','code'=>'30'),
			'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
			'GU'=>array('name'=>'GUAM','code'=>'1671'),
			'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
			'GY'=>array('name'=>'GUYANA','code'=>'592'),
			'HK'=>array('name'=>'HONG KONG','code'=>'852'),
			'HN'=>array('name'=>'HONDURAS','code'=>'504'),
			'HR'=>array('name'=>'CROATIA','code'=>'385'),
			'HT'=>array('name'=>'HAITI','code'=>'509'),
			'HU'=>array('name'=>'HUNGARY','code'=>'36'),
			'ID'=>array('name'=>'INDONESIA','code'=>'62'),
			'IE'=>array('name'=>'IRELAND','code'=>'353'),
			'IL'=>array('name'=>'ISRAEL','code'=>'972'),
			'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
			'IN'=>array('name'=>'INDIA','code'=>'91'),
			'IQ'=>array('name'=>'IRAQ','code'=>'964'),
			'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
			'IS'=>array('name'=>'ICELAND','code'=>'354'),
			'IT'=>array('name'=>'ITALY','code'=>'39'),
			'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
			'JO'=>array('name'=>'JORDAN','code'=>'962'),
			'JP'=>array('name'=>'JAPAN','code'=>'81'),
			'KE'=>array('name'=>'KENYA','code'=>'254'),
			'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
			'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
			'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
			'KM'=>array('name'=>'COMOROS','code'=>'269'),
			'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
			'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
			'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
			'KW'=>array('name'=>'KUWAIT','code'=>'965'),
			'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
			'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
			'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
			'LB'=>array('name'=>'LEBANON','code'=>'961'),
			'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
			'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
			'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
			'LR'=>array('name'=>'LIBERIA','code'=>'231'),
			'LS'=>array('name'=>'LESOTHO','code'=>'266'),
			'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
			'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
			'LV'=>array('name'=>'LATVIA','code'=>'371'),
			'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
			'MA'=>array('name'=>'MOROCCO','code'=>'212'),
			'MC'=>array('name'=>'MONACO','code'=>'377'),
			'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
			'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
			'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
			'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
			'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
			'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
			'ML'=>array('name'=>'MALI','code'=>'223'),
			'MM'=>array('name'=>'MYANMAR','code'=>'95'),
			'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
			'MO'=>array('name'=>'MACAU','code'=>'853'),
			'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
			'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
			'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
			'MT'=>array('name'=>'MALTA','code'=>'356'),
			'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
			'MV'=>array('name'=>'MALDIVES','code'=>'960'),
			'MW'=>array('name'=>'MALAWI','code'=>'265'),
			'MX'=>array('name'=>'MEXICO','code'=>'52'),
			'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
			'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
			'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
			'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
			'NE'=>array('name'=>'NIGER','code'=>'227'),
			'NG'=>array('name'=>'NIGERIA','code'=>'234'),
			'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
			'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
			'NO'=>array('name'=>'NORWAY','code'=>'47'),
			'NP'=>array('name'=>'NEPAL','code'=>'977'),
			'NR'=>array('name'=>'NAURU','code'=>'674'),
			'NU'=>array('name'=>'NIUE','code'=>'683'),
			'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
			'OM'=>array('name'=>'OMAN','code'=>'968'),
			'PA'=>array('name'=>'PANAMA','code'=>'507'),
			'PE'=>array('name'=>'PERU','code'=>'51'),
			'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
			'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
			'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
			'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
			'PL'=>array('name'=>'POLAND','code'=>'48'),
			'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
			'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
			'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
			'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
			'PW'=>array('name'=>'PALAU','code'=>'680'),
			'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
			'QA'=>array('name'=>'QATAR','code'=>'974'),
			'RO'=>array('name'=>'ROMANIA','code'=>'40'),
			'RS'=>array('name'=>'SERBIA','code'=>'381'),
			'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
			'RW'=>array('name'=>'RWANDA','code'=>'250'),
			'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
			'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
			'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
			'SD'=>array('name'=>'SUDAN','code'=>'249'),
			'SE'=>array('name'=>'SWEDEN','code'=>'46'),
			'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
			'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
			'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
			'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
			'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
			'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
			'SN'=>array('name'=>'SENEGAL','code'=>'221'),
			'SO'=>array('name'=>'SOMALIA','code'=>'252'),
			'SR'=>array('name'=>'SURINAME','code'=>'597'),
			'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
			'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
			'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
			'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
			'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
			'TD'=>array('name'=>'CHAD','code'=>'235'),
			'TG'=>array('name'=>'TOGO','code'=>'228'),
			'TH'=>array('name'=>'THAILAND','code'=>'66'),
			'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
			'TK'=>array('name'=>'TOKELAU','code'=>'690'),
			'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
			'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
			'TN'=>array('name'=>'TUNISIA','code'=>'216'),
			'TO'=>array('name'=>'TONGA','code'=>'676'),
			'TR'=>array('name'=>'TURKEY','code'=>'90'),
			'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
			'TV'=>array('name'=>'TUVALU','code'=>'688'),
			'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
			'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
			'UA'=>array('name'=>'UKRAINE','code'=>'380'),
			'UG'=>array('name'=>'UGANDA','code'=>'256'),
			'US'=>array('name'=>'UNITED STATES','code'=>'1'),
			'UY'=>array('name'=>'URUGUAY','code'=>'598'),
			'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
			'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
			'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
			'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
			'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
			'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
			'VN'=>array('name'=>'VIET NAM','code'=>'84'),
			'VU'=>array('name'=>'VANUATU','code'=>'678'),
			'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
			'WS'=>array('name'=>'SAMOA','code'=>'685'),
			'XK'=>array('name'=>'KOSOVO','code'=>'381'),
			'YE'=>array('name'=>'YEMEN','code'=>'967'),
			'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
			'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
			'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
			'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')
			);
			
			
			return($countryArray);
	}

}
	
	
	
	
if (! function_exists('helperI18n_getEmojisForCountries'))
{
	
	function appHelperI18n_getEmojisForCountries(){
		
		$emoji_flags = array();
		$emoji_flags["AD"] = "\u{1F1E6}\u{1F1E9}";
		$emoji_flags["AE"] = "\u{1F1E6}\u{1F1EA}";
		$emoji_flags["AF"] = "\u{1F1E6}\u{1F1EB}";
		$emoji_flags["AG"] = "\u{1F1E6}\u{1F1EC}";
		$emoji_flags["AI"] = "\u{1F1E6}\u{1F1EE}";
		$emoji_flags["AL"] = "\u{1F1E6}\u{1F1F1}";
		$emoji_flags["AM"] = "\u{1F1E6}\u{1F1F2}";
		$emoji_flags["AO"] = "\u{1F1E6}\u{1F1F4}";
		$emoji_flags["AQ"] = "\u{1F1E6}\u{1F1F6}";
		$emoji_flags["AR"] = "\u{1F1E6}\u{1F1F7}";
		$emoji_flags["AS"] = "\u{1F1E6}\u{1F1F8}";
		$emoji_flags["AT"] = "\u{1F1E6}\u{1F1F9}";
		$emoji_flags["AU"] = "\u{1F1E6}\u{1F1FA}";
		$emoji_flags["AW"] = "\u{1F1E6}\u{1F1FC}";
		$emoji_flags["AX"] = "\u{1F1E6}\u{1F1FD}";
		$emoji_flags["AZ"] = "\u{1F1E6}\u{1F1FF}";
		$emoji_flags["BA"] = "\u{1F1E7}\u{1F1E6}";
		$emoji_flags["BB"] = "\u{1F1E7}\u{1F1E7}";
		$emoji_flags["BD"] = "\u{1F1E7}\u{1F1E9}";
		$emoji_flags["BE"] = "\u{1F1E7}\u{1F1EA}";
		$emoji_flags["BF"] = "\u{1F1E7}\u{1F1EB}";
		$emoji_flags["BG"] = "\u{1F1E7}\u{1F1EC}";
		$emoji_flags["BH"] = "\u{1F1E7}\u{1F1ED}";
		$emoji_flags["BI"] = "\u{1F1E7}\u{1F1EE}";
		$emoji_flags["BJ"] = "\u{1F1E7}\u{1F1EF}";
		$emoji_flags["BL"] = "\u{1F1E7}\u{1F1F1}";
		$emoji_flags["BM"] = "\u{1F1E7}\u{1F1F2}";
		$emoji_flags["BN"] = "\u{1F1E7}\u{1F1F3}";
		$emoji_flags["BO"] = "\u{1F1E7}\u{1F1F4}";
		$emoji_flags["BQ"] = "\u{1F1E7}\u{1F1F6}";
		$emoji_flags["BR"] = "\u{1F1E7}\u{1F1F7}";
		$emoji_flags["BS"] = "\u{1F1E7}\u{1F1F8}";
		$emoji_flags["BT"] = "\u{1F1E7}\u{1F1F9}";
		$emoji_flags["BV"] = "\u{1F1E7}\u{1F1FB}";
		$emoji_flags["BW"] = "\u{1F1E7}\u{1F1FC}";
		$emoji_flags["BY"] = "\u{1F1E7}\u{1F1FE}";
		$emoji_flags["BZ"] = "\u{1F1E7}\u{1F1FF}";
		$emoji_flags["CA"] = "\u{1F1E8}\u{1F1E6}";
		$emoji_flags["CC"] = "\u{1F1E8}\u{1F1E8}";
		$emoji_flags["CD"] = "\u{1F1E8}\u{1F1E9}";
		$emoji_flags["CF"] = "\u{1F1E8}\u{1F1EB}";
		$emoji_flags["CG"] = "\u{1F1E8}\u{1F1EC}";
		$emoji_flags["CH"] = "\u{1F1E8}\u{1F1ED}";
		$emoji_flags["CI"] = "\u{1F1E8}\u{1F1EE}";
		$emoji_flags["CK"] = "\u{1F1E8}\u{1F1F0}";
		$emoji_flags["CL"] = "\u{1F1E8}\u{1F1F1}";
		$emoji_flags["CM"] = "\u{1F1E8}\u{1F1F2}";
		$emoji_flags["CN"] = "\u{1F1E8}\u{1F1F3}";
		$emoji_flags["CO"] = "\u{1F1E8}\u{1F1F4}";
		$emoji_flags["CR"] = "\u{1F1E8}\u{1F1F7}";
		$emoji_flags["CU"] = "\u{1F1E8}\u{1F1FA}";
		$emoji_flags["CV"] = "\u{1F1E8}\u{1F1FB}";
		$emoji_flags["CW"] = "\u{1F1E8}\u{1F1FC}";
		$emoji_flags["CX"] = "\u{1F1E8}\u{1F1FD}";
		$emoji_flags["CY"] = "\u{1F1E8}\u{1F1FE}";
		$emoji_flags["CZ"] = "\u{1F1E8}\u{1F1FF}";
		$emoji_flags["DE"] = "\u{1F1E9}\u{1F1EA}";
		$emoji_flags["DG"] = "\u{1F1E9}\u{1F1EC}";
		$emoji_flags["DJ"] = "\u{1F1E9}\u{1F1EF}";
		$emoji_flags["DK"] = "\u{1F1E9}\u{1F1F0}";
		$emoji_flags["DM"] = "\u{1F1E9}\u{1F1F2}";
		$emoji_flags["DO"] = "\u{1F1E9}\u{1F1F4}";
		$emoji_flags["DZ"] = "\u{1F1E9}\u{1F1FF}";
		$emoji_flags["EC"] = "\u{1F1EA}\u{1F1E8}";
		$emoji_flags["EE"] = "\u{1F1EA}\u{1F1EA}";
		$emoji_flags["EG"] = "\u{1F1EA}\u{1F1EC}";
		$emoji_flags["EH"] = "\u{1F1EA}\u{1F1ED}";
		$emoji_flags["ER"] = "\u{1F1EA}\u{1F1F7}";
		$emoji_flags["ES"] = "\u{1F1EA}\u{1F1F8}";
		$emoji_flags["ET"] = "\u{1F1EA}\u{1F1F9}";
		$emoji_flags["FI"] = "\u{1F1EB}\u{1F1EE}";
		$emoji_flags["FJ"] = "\u{1F1EB}\u{1F1EF}";
		$emoji_flags["FK"] = "\u{1F1EB}\u{1F1F0}";
		$emoji_flags["FM"] = "\u{1F1EB}\u{1F1F2}";
		$emoji_flags["FO"] = "\u{1F1EB}\u{1F1F4}";
		$emoji_flags["FR"] = "\u{1F1EB}\u{1F1F7}";
		$emoji_flags["GA"] = "\u{1F1EC}\u{1F1E6}";
		$emoji_flags["GB"] = "\u{1F1EC}\u{1F1E7}";
		$emoji_flags["GD"] = "\u{1F1EC}\u{1F1E9}";
		$emoji_flags["GE"] = "\u{1F1EC}\u{1F1EA}";
		$emoji_flags["GF"] = "\u{1F1EC}\u{1F1EB}";
		$emoji_flags["GG"] = "\u{1F1EC}\u{1F1EC}";
		$emoji_flags["GH"] = "\u{1F1EC}\u{1F1ED}";
		$emoji_flags["GI"] = "\u{1F1EC}\u{1F1EE}";
		$emoji_flags["GL"] = "\u{1F1EC}\u{1F1F1}";
		$emoji_flags["GM"] = "\u{1F1EC}\u{1F1F2}";
		$emoji_flags["GN"] = "\u{1F1EC}\u{1F1F3}";
		$emoji_flags["GP"] = "\u{1F1EC}\u{1F1F5}";
		$emoji_flags["GQ"] = "\u{1F1EC}\u{1F1F6}";
		$emoji_flags["GR"] = "\u{1F1EC}\u{1F1F7}";
		$emoji_flags["GS"] = "\u{1F1EC}\u{1F1F8}";
		$emoji_flags["GT"] = "\u{1F1EC}\u{1F1F9}";
		$emoji_flags["GU"] = "\u{1F1EC}\u{1F1FA}";
		$emoji_flags["GW"] = "\u{1F1EC}\u{1F1FC}";
		$emoji_flags["GY"] = "\u{1F1EC}\u{1F1FE}";
		$emoji_flags["HK"] = "\u{1F1ED}\u{1F1F0}";
		$emoji_flags["HM"] = "\u{1F1ED}\u{1F1F2}";
		$emoji_flags["HN"] = "\u{1F1ED}\u{1F1F3}";
		$emoji_flags["HR"] = "\u{1F1ED}\u{1F1F7}";
		$emoji_flags["HT"] = "\u{1F1ED}\u{1F1F9}";
		$emoji_flags["HU"] = "\u{1F1ED}\u{1F1FA}";
		$emoji_flags["ID"] = "\u{1F1EE}\u{1F1E9}";
		$emoji_flags["IE"] = "\u{1F1EE}\u{1F1EA}";
		$emoji_flags["IL"] = "\u{1F1EE}\u{1F1F1}";
		$emoji_flags["IM"] = "\u{1F1EE}\u{1F1F2}";
		$emoji_flags["IN"] = "\u{1F1EE}\u{1F1F3}";
		$emoji_flags["IO"] = "\u{1F1EE}\u{1F1F4}";
		$emoji_flags["IQ"] = "\u{1F1EE}\u{1F1F6}";
		$emoji_flags["IR"] = "\u{1F1EE}\u{1F1F7}";
		$emoji_flags["IS"] = "\u{1F1EE}\u{1F1F8}";
		$emoji_flags["IT"] = "\u{1F1EE}\u{1F1F9}";
		$emoji_flags["JE"] = "\u{1F1EF}\u{1F1EA}";
		$emoji_flags["JM"] = "\u{1F1EF}\u{1F1F2}";
		$emoji_flags["JO"] = "\u{1F1EF}\u{1F1F4}";
		$emoji_flags["JP"] = "\u{1F1EF}\u{1F1F5}";
		$emoji_flags["KE"] = "\u{1F1F0}\u{1F1EA}";
		$emoji_flags["KG"] = "\u{1F1F0}\u{1F1EC}";
		$emoji_flags["KH"] = "\u{1F1F0}\u{1F1ED}";
		$emoji_flags["KI"] = "\u{1F1F0}\u{1F1EE}";
		$emoji_flags["KM"] = "\u{1F1F0}\u{1F1F2}";
		$emoji_flags["KN"] = "\u{1F1F0}\u{1F1F3}";
		$emoji_flags["KP"] = "\u{1F1F0}\u{1F1F5}";
		$emoji_flags["KR"] = "\u{1F1F0}\u{1F1F7}";
		$emoji_flags["KW"] = "\u{1F1F0}\u{1F1FC}";
		$emoji_flags["KY"] = "\u{1F1F0}\u{1F1FE}";
		$emoji_flags["KZ"] = "\u{1F1F0}\u{1F1FF}";
		$emoji_flags["LA"] = "\u{1F1F1}\u{1F1E6}";
		$emoji_flags["LB"] = "\u{1F1F1}\u{1F1E7}";
		$emoji_flags["LC"] = "\u{1F1F1}\u{1F1E8}";
		$emoji_flags["LI"] = "\u{1F1F1}\u{1F1EE}";
		$emoji_flags["LK"] = "\u{1F1F1}\u{1F1F0}";
		$emoji_flags["LR"] = "\u{1F1F1}\u{1F1F7}";
		$emoji_flags["LS"] = "\u{1F1F1}\u{1F1F8}";
		$emoji_flags["LT"] = "\u{1F1F1}\u{1F1F9}";
		$emoji_flags["LU"] = "\u{1F1F1}\u{1F1FA}";
		$emoji_flags["LV"] = "\u{1F1F1}\u{1F1FB}";
		$emoji_flags["LY"] = "\u{1F1F1}\u{1F1FE}";
		$emoji_flags["MA"] = "\u{1F1F2}\u{1F1E6}";
		$emoji_flags["MC"] = "\u{1F1F2}\u{1F1E8}";
		$emoji_flags["MD"] = "\u{1F1F2}\u{1F1E9}";
		$emoji_flags["ME"] = "\u{1F1F2}\u{1F1EA}";
		$emoji_flags["MF"] = "\u{1F1F2}\u{1F1EB}";
		$emoji_flags["MG"] = "\u{1F1F2}\u{1F1EC}";
		$emoji_flags["MH"] = "\u{1F1F2}\u{1F1ED}";
		$emoji_flags["MK"] = "\u{1F1F2}\u{1F1F0}";
		$emoji_flags["ML"] = "\u{1F1F2}\u{1F1F1}";
		$emoji_flags["MM"] = "\u{1F1F2}\u{1F1F2}";
		$emoji_flags["MN"] = "\u{1F1F2}\u{1F1F3}";
		$emoji_flags["MO"] = "\u{1F1F2}\u{1F1F4}";
		$emoji_flags["MP"] = "\u{1F1F2}\u{1F1F5}";
		$emoji_flags["MQ"] = "\u{1F1F2}\u{1F1F6}";
		$emoji_flags["MR"] = "\u{1F1F2}\u{1F1F7}";
		$emoji_flags["MS"] = "\u{1F1F2}\u{1F1F8}";
		$emoji_flags["MT"] = "\u{1F1F2}\u{1F1F9}";
		$emoji_flags["MU"] = "\u{1F1F2}\u{1F1FA}";
		$emoji_flags["MV"] = "\u{1F1F2}\u{1F1FB}";
		$emoji_flags["MW"] = "\u{1F1F2}\u{1F1FC}";
		$emoji_flags["MX"] = "\u{1F1F2}\u{1F1FD}";
		$emoji_flags["MY"] = "\u{1F1F2}\u{1F1FE}";
		$emoji_flags["MZ"] = "\u{1F1F2}\u{1F1FF}";
		$emoji_flags["NA"] = "\u{1F1F3}\u{1F1E6}";
		$emoji_flags["NC"] = "\u{1F1F3}\u{1F1E8}";
		$emoji_flags["NE"] = "\u{1F1F3}\u{1F1EA}";
		$emoji_flags["NF"] = "\u{1F1F3}\u{1F1EB}";
		$emoji_flags["NG"] = "\u{1F1F3}\u{1F1EC}";
		$emoji_flags["NI"] = "\u{1F1F3}\u{1F1EE}";
		$emoji_flags["NL"] = "\u{1F1F3}\u{1F1F1}";
		$emoji_flags["NO"] = "\u{1F1F3}\u{1F1F4}";
		$emoji_flags["NP"] = "\u{1F1F3}\u{1F1F5}";
		$emoji_flags["NR"] = "\u{1F1F3}\u{1F1F7}";
		$emoji_flags["NU"] = "\u{1F1F3}\u{1F1FA}";
		$emoji_flags["NZ"] = "\u{1F1F3}\u{1F1FF}";
		$emoji_flags["OM"] = "\u{1F1F4}\u{1F1F2}";
		$emoji_flags["PA"] = "\u{1F1F5}\u{1F1E6}";
		$emoji_flags["PE"] = "\u{1F1F5}\u{1F1EA}";
		$emoji_flags["PF"] = "\u{1F1F5}\u{1F1EB}";
		$emoji_flags["PG"] = "\u{1F1F5}\u{1F1EC}";
		$emoji_flags["PH"] = "\u{1F1F5}\u{1F1ED}";
		$emoji_flags["PK"] = "\u{1F1F5}\u{1F1F0}";
		$emoji_flags["PL"] = "\u{1F1F5}\u{1F1F1}";
		$emoji_flags["PM"] = "\u{1F1F5}\u{1F1F2}";
		$emoji_flags["PN"] = "\u{1F1F5}\u{1F1F3}";
		$emoji_flags["PR"] = "\u{1F1F5}\u{1F1F7}";
		$emoji_flags["PS"] = "\u{1F1F5}\u{1F1F8}";
		$emoji_flags["PT"] = "\u{1F1F5}\u{1F1F9}";
		$emoji_flags["PW"] = "\u{1F1F5}\u{1F1FC}";
		$emoji_flags["PY"] = "\u{1F1F5}\u{1F1FE}";
		$emoji_flags["QA"] = "\u{1F1F6}\u{1F1E6}";
		$emoji_flags["RE"] = "\u{1F1F7}\u{1F1EA}";
		$emoji_flags["RO"] = "\u{1F1F7}\u{1F1F4}";
		$emoji_flags["RS"] = "\u{1F1F7}\u{1F1F8}";
		$emoji_flags["RU"] = "\u{1F1F7}\u{1F1FA}";
		$emoji_flags["RW"] = "\u{1F1F7}\u{1F1FC}";
		$emoji_flags["SA"] = "\u{1F1F8}\u{1F1E6}";
		$emoji_flags["SB"] = "\u{1F1F8}\u{1F1E7}";
		$emoji_flags["SC"] = "\u{1F1F8}\u{1F1E8}";
		$emoji_flags["SD"] = "\u{1F1F8}\u{1F1E9}";
		$emoji_flags["SE"] = "\u{1F1F8}\u{1F1EA}";
		$emoji_flags["SG"] = "\u{1F1F8}\u{1F1EC}";
		$emoji_flags["SH"] = "\u{1F1F8}\u{1F1ED}";
		$emoji_flags["SI"] = "\u{1F1F8}\u{1F1EE}";
		$emoji_flags["SJ"] = "\u{1F1F8}\u{1F1EF}";
		$emoji_flags["SK"] = "\u{1F1F8}\u{1F1F0}";
		$emoji_flags["SL"] = "\u{1F1F8}\u{1F1F1}";
		$emoji_flags["SM"] = "\u{1F1F8}\u{1F1F2}";
		$emoji_flags["SN"] = "\u{1F1F8}\u{1F1F3}";
		$emoji_flags["SO"] = "\u{1F1F8}\u{1F1F4}";
		$emoji_flags["SR"] = "\u{1F1F8}\u{1F1F7}";
		$emoji_flags["SS"] = "\u{1F1F8}\u{1F1F8}";
		$emoji_flags["ST"] = "\u{1F1F8}\u{1F1F9}";
		$emoji_flags["SV"] = "\u{1F1F8}\u{1F1FB}";
		$emoji_flags["SX"] = "\u{1F1F8}\u{1F1FD}";
		$emoji_flags["SY"] = "\u{1F1F8}\u{1F1FE}";
		$emoji_flags["SZ"] = "\u{1F1F8}\u{1F1FF}";
		$emoji_flags["TC"] = "\u{1F1F9}\u{1F1E8}";
		$emoji_flags["TD"] = "\u{1F1F9}\u{1F1E9}";
		$emoji_flags["TF"] = "\u{1F1F9}\u{1F1EB}";
		$emoji_flags["TG"] = "\u{1F1F9}\u{1F1EC}";
		$emoji_flags["TH"] = "\u{1F1F9}\u{1F1ED}";
		$emoji_flags["TJ"] = "\u{1F1F9}\u{1F1EF}";
		$emoji_flags["TK"] = "\u{1F1F9}\u{1F1F0}";
		$emoji_flags["TL"] = "\u{1F1F9}\u{1F1F1}";
		$emoji_flags["TM"] = "\u{1F1F9}\u{1F1F2}";
		$emoji_flags["TN"] = "\u{1F1F9}\u{1F1F3}";
		$emoji_flags["TO"] = "\u{1F1F9}\u{1F1F4}";
		$emoji_flags["TR"] = "\u{1F1F9}\u{1F1F7}";
		$emoji_flags["TT"] = "\u{1F1F9}\u{1F1F9}";
		$emoji_flags["TV"] = "\u{1F1F9}\u{1F1FB}";
		$emoji_flags["TW"] = "\u{1F1F9}\u{1F1FC}";
		$emoji_flags["TZ"] = "\u{1F1F9}\u{1F1FF}";
		$emoji_flags["UA"] = "\u{1F1FA}\u{1F1E6}";
		$emoji_flags["UG"] = "\u{1F1FA}\u{1F1EC}";
		$emoji_flags["UM"] = "\u{1F1FA}\u{1F1F2}";
		$emoji_flags["US"] = "\u{1F1FA}\u{1F1F8}";
		$emoji_flags["UY"] = "\u{1F1FA}\u{1F1FE}";
		$emoji_flags["UZ"] = "\u{1F1FA}\u{1F1FF}";
		$emoji_flags["VA"] = "\u{1F1FB}\u{1F1E6}";
		$emoji_flags["VC"] = "\u{1F1FB}\u{1F1E8}";
		$emoji_flags["VE"] = "\u{1F1FB}\u{1F1EA}";
		$emoji_flags["VG"] = "\u{1F1FB}\u{1F1EC}";
		$emoji_flags["VI"] = "\u{1F1FB}\u{1F1EE}";
		$emoji_flags["VN"] = "\u{1F1FB}\u{1F1F3}";
		$emoji_flags["VU"] = "\u{1F1FB}\u{1F1FA}";
		$emoji_flags["WF"] = "\u{1F1FC}\u{1F1EB}";
		$emoji_flags["WS"] = "\u{1F1FC}\u{1F1F8}";
		$emoji_flags["XK"] = "\u{1F1FD}\u{1F1F0}";
		$emoji_flags["YE"] = "\u{1F1FE}\u{1F1EA}";
		$emoji_flags["YT"] = "\u{1F1FE}\u{1F1F9}";
		$emoji_flags["ZA"] = "\u{1F1FF}\u{1F1E6}";
		$emoji_flags["ZM"] = "\u{1F1FF}\u{1F1F2}";
		$emoji_flags["ZW"] = "\u{1F1FF}\u{1F1FC}";
		$emoji_flags["CS"] = "\u{1F1F7}\u{1F1F8}";
		$emoji_flags["AN"] = "\u{1F1F3}\u{1F1F1}";

		return $emoji_flags;
	}
}




if (! function_exists('helperI18n_getCountries'))
{
	function appHelperI18n_getCountries(){
		$countries = array(
			"AF" => "Afghanistan",
			"AL" => "Albania",
			"DZ" => "Algeria",
			"AS" => "American Samoa",
			"AD" => "Andorra",
			"AO" => "Angola",
			"AI" => "Anguilla",
			"AQ" => "Antarctica",
			"AG" => "Antigua and Barbuda",
			"AR" => "Argentina",
			"AM" => "Armenia",
			"AW" => "Aruba",
			"AU" => "Australia",
			"AT" => "Austria",
			"AZ" => "Azerbaijan",
			"BS" => "Bahamas",
			"BH" => "Bahrain",
			"BD" => "Bangladesh",
			"BB" => "Barbados",
			"BY" => "Belarus",
			"BE" => "Belgium",
			"BZ" => "Belize",
			"BJ" => "Benin",
			"BM" => "Bermuda",
			"BT" => "Bhutan",
			"BO" => "Bolivia",
			"BA" => "Bosnia and Herzegovina",
			"BW" => "Botswana",
			"BV" => "Bouvet Island",
			"BR" => "Brazil",
			"IO" => "British Indian Ocean Territory",
			"BN" => "Brunei Darussalam",
			"BG" => "Bulgaria",
			"BF" => "Burkina Faso",
			"BI" => "Burundi",
			"KH" => "Cambodia",
			"CM" => "Cameroon",
			"CA" => "Canada",
			"CV" => "Cape Verde",
			"KY" => "Cayman Islands",
			"CF" => "Central African Republic",
			"TD" => "Chad",
			"CL" => "Chile",
			"CN" => "China",
			"CX" => "Christmas Island",
			"CC" => "Cocos (Keeling) Islands",
			"CO" => "Colombia",
			"KM" => "Comoros",
			"CG" => "Congo",
			"CD" => "Congo, the Democratic Republic of the",
			"CK" => "Cook Islands",
			"CR" => "Costa Rica",
			"CI" => "Cote D'Ivoire",
			"HR" => "Croatia",
			"CU" => "Cuba",
			"CY" => "Cyprus",
			"CZ" => "Czech Republic",
			"DK" => "Denmark",
			"DJ" => "Djibouti",
			"DM" => "Dominica",
			"DO" => "Dominican Republic",
			"EC" => "Ecuador",
			"EG" => "Egypt",
			"SV" => "El Salvador",
			"GQ" => "Equatorial Guinea",
			"ER" => "Eritrea",
			"EE" => "Estonia",
			"ET" => "Ethiopia",
			"FK" => "Falkland Islands (Malvinas)",
			"FO" => "Faroe Islands",
			"FJ" => "Fiji",
			"FI" => "Finland",
			"FR" => "France",
			"GF" => "French Guiana",
			"PF" => "French Polynesia",
			"TF" => "French Southern Territories",
			"GA" => "Gabon",
			"GM" => "Gambia",
			"GE" => "Georgia",
			"DE" => "Germany",
			"GH" => "Ghana",
			"GI" => "Gibraltar",
			"GR" => "Greece",
			"GL" => "Greenland",
			"GD" => "Grenada",
			"GP" => "Guadeloupe",
			"GU" => "Guam",
			"GT" => "Guatemala",
			"GN" => "Guinea",
			"GW" => "Guinea-Bissau",
			"GY" => "Guyana",
			"HT" => "Haiti",
			"HM" => "Heard Island and Mcdonald Islands",
			"VA" => "Holy See (Vatican City State)",
			"HN" => "Honduras",
			"HK" => "Hong Kong",
			"HU" => "Hungary",
			"IS" => "Iceland",
			"IN" => "India",
			"ID" => "Indonesia",
			"IR" => "Iran, Islamic Republic of",
			"IQ" => "Iraq",
			"IE" => "Ireland",
			"IL" => "Israel",
			"IT" => "Italy",
			"JM" => "Jamaica",
			"JP" => "Japan",
			"JO" => "Jordan",
			"KZ" => "Kazakhstan",
			"KE" => "Kenya",
			"KI" => "Kiribati",
			"KP" => "Korea, Democratic People's Republic of",
			"KR" => "Korea, Republic of",
			"KW" => "Kuwait",
			"KG" => "Kyrgyzstan",
			"LA" => "Lao People's Democratic Republic",
			"LV" => "Latvia",
			"LB" => "Lebanon",
			"LS" => "Lesotho",
			"LR" => "Liberia",
			"LY" => "Libyan Arab Jamahiriya",
			"LI" => "Liechtenstein",
			"LT" => "Lithuania",
			"LU" => "Luxembourg",
			"MO" => "Macao",
			"MK" => "Macedonia, the Former Yugoslav Republic of",
			"MG" => "Madagascar",
			"MW" => "Malawi",
			"MY" => "Malaysia",
			"MV" => "Maldives",
			"ML" => "Mali",
			"MT" => "Malta",
			"MH" => "Marshall Islands",
			"MQ" => "Martinique",
			"MR" => "Mauritania",
			"MU" => "Mauritius",
			"YT" => "Mayotte",
			"MX" => "Mexico",
			"FM" => "Micronesia, Federated States of",
			"MD" => "Moldova, Republic of",
			"MC" => "Monaco",
			"MN" => "Mongolia",
			"MS" => "Montserrat",
			"MA" => "Morocco",
			"MZ" => "Mozambique",
			"MM" => "Myanmar",
			"NA" => "Namibia",
			"NR" => "Nauru",
			"NP" => "Nepal",
			"NL" => "Netherlands",
			"AN" => "Netherlands Antilles",
			"NC" => "New Caledonia",
			"NZ" => "New Zealand",
			"NI" => "Nicaragua",
			"NE" => "Niger",
			"NG" => "Nigeria",
			"NU" => "Niue",
			"NF" => "Norfolk Island",
			"MP" => "Northern Mariana Islands",
			"NO" => "Norway",
			"OM" => "Oman",
			"PK" => "Pakistan",
			"PW" => "Palau",
			"PS" => "Palestinian Territory, Occupied",
			"PA" => "Panama",
			"PG" => "Papua New Guinea",
			"PY" => "Paraguay",
			"PE" => "Peru",
			"PH" => "Philippines",
			"PN" => "Pitcairn",
			"PL" => "Poland",
			"PT" => "Portugal",
			"PR" => "Puerto Rico",
			"QA" => "Qatar",
			"RE" => "Reunion",
			"RO" => "Romania",
			"RU" => "Russian Federation",
			"RW" => "Rwanda",
			"SH" => "Saint Helena",
			"KN" => "Saint Kitts and Nevis",
			"LC" => "Saint Lucia",
			"PM" => "Saint Pierre and Miquelon",
			"VC" => "Saint Vincent and the Grenadines",
			"WS" => "Samoa",
			"SM" => "San Marino",
			"ST" => "Sao Tome and Principe",
			"SA" => "Saudi Arabia",
			"SN" => "Senegal",
			"CS" => "Serbia and Montenegro",
			"SC" => "Seychelles",
			"SL" => "Sierra Leone",
			"SG" => "Singapore",
			"SK" => "Slovakia",
			"SI" => "Slovenia",
			"SB" => "Solomon Islands",
			"SO" => "Somalia",
			"ZA" => "South Africa",
			"GS" => "South Georgia and the South Sandwich Islands",
			"ES" => "Spain",
			"LK" => "Sri Lanka",
			"SD" => "Sudan",
			"SR" => "Suriname",
			"SJ" => "Svalbard and Jan Mayen",
			"SZ" => "Swaziland",
			"SE" => "Sweden",
			"CH" => "Switzerland",
			"SY" => "Syrian Arab Republic",
			"TW" => "Taiwan, Province of China",
			"TJ" => "Tajikistan",
			"TZ" => "Tanzania, United Republic of",
			"TH" => "Thailand",
			"TL" => "Timor-Leste",
			"TG" => "Togo",
			"TK" => "Tokelau",
			"TO" => "Tonga",
			"TT" => "Trinidad and Tobago",
			"TN" => "Tunisia",
			"TR" => "Turkey",
			"TM" => "Turkmenistan",
			"TC" => "Turks and Caicos Islands",
			"TV" => "Tuvalu",
			"UG" => "Uganda",
			"UA" => "Ukraine",
			"AE" => "United Arab Emirates",
			"GB" => "United Kingdom",
			"US" => "United States",
			"UM" => "United States Minor Outlying Islands",
			"UY" => "Uruguay",
			"UZ" => "Uzbekistan",
			"VU" => "Vanuatu",
			"VE" => "Venezuela",
			"VN" => "Viet Nam",
			"VG" => "Virgin Islands, British",
			"VI" => "Virgin Islands, U.s.",
			"WF" => "Wallis and Futuna",
			"EH" => "Western Sahara",
			"YE" => "Yemen",
			"ZM" => "Zambia",
			"ZW" => "Zimbabwe"
		);
		
		return $countries;		
	}
}