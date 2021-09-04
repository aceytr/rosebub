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
	
	function helperI18n_getEmojisForCountries(){
		
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
	function helperI18n_getCountries(){
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
	
	
if (! function_exists('helperI18n_getTimezones'))
{

	function helperI18n_getTimezones(){
	
			$timezones = array(
			'America/Adak' => '(GMT-10:00) America/Adak (Hawaii-Aleutian Standard Time)',
			'America/Atka' => '(GMT-10:00) America/Atka (Hawaii-Aleutian Standard Time)',
			'America/Anchorage' => '(GMT-9:00) America/Anchorage (Alaska Standard Time)',
			'America/Juneau' => '(GMT-9:00) America/Juneau (Alaska Standard Time)',
			'America/Nome' => '(GMT-9:00) America/Nome (Alaska Standard Time)',
			'America/Yakutat' => '(GMT-9:00) America/Yakutat (Alaska Standard Time)',
			'America/Dawson' => '(GMT-8:00) America/Dawson (Pacific Standard Time)',
			'America/Ensenada' => '(GMT-8:00) America/Ensenada (Pacific Standard Time)',
			'America/Los_Angeles' => '(GMT-8:00) America/Los_Angeles (Pacific Standard Time)',
			'America/Tijuana' => '(GMT-8:00) America/Tijuana (Pacific Standard Time)',
			'America/Vancouver' => '(GMT-8:00) America/Vancouver (Pacific Standard Time)',
			'America/Whitehorse' => '(GMT-8:00) America/Whitehorse (Pacific Standard Time)',
			'Canada/Pacific' => '(GMT-8:00) Canada/Pacific (Pacific Standard Time)',
			'Canada/Yukon' => '(GMT-8:00) Canada/Yukon (Pacific Standard Time)',
			'Mexico/BajaNorte' => '(GMT-8:00) Mexico/BajaNorte (Pacific Standard Time)',
			'America/Boise' => '(GMT-7:00) America/Boise (Mountain Standard Time)',
			'America/Cambridge_Bay' => '(GMT-7:00) America/Cambridge_Bay (Mountain Standard Time)',
			'America/Chihuahua' => '(GMT-7:00) America/Chihuahua (Mountain Standard Time)',
			'America/Dawson_Creek' => '(GMT-7:00) America/Dawson_Creek (Mountain Standard Time)',
			'America/Denver' => '(GMT-7:00) America/Denver (Mountain Standard Time)',
			'America/Edmonton' => '(GMT-7:00) America/Edmonton (Mountain Standard Time)',
			'America/Hermosillo' => '(GMT-7:00) America/Hermosillo (Mountain Standard Time)',
			'America/Inuvik' => '(GMT-7:00) America/Inuvik (Mountain Standard Time)',
			'America/Mazatlan' => '(GMT-7:00) America/Mazatlan (Mountain Standard Time)',
			'America/Phoenix' => '(GMT-7:00) America/Phoenix (Mountain Standard Time)',
			'America/Shiprock' => '(GMT-7:00) America/Shiprock (Mountain Standard Time)',
			'America/Yellowknife' => '(GMT-7:00) America/Yellowknife (Mountain Standard Time)',
			'Canada/Mountain' => '(GMT-7:00) Canada/Mountain (Mountain Standard Time)',
			'Mexico/BajaSur' => '(GMT-7:00) Mexico/BajaSur (Mountain Standard Time)',
			'America/Belize' => '(GMT-6:00) America/Belize (Central Standard Time)',
			'America/Cancun' => '(GMT-6:00) America/Cancun (Central Standard Time)',
			'America/Chicago' => '(GMT-6:00) America/Chicago (Central Standard Time)',
			'America/Costa_Rica' => '(GMT-6:00) America/Costa_Rica (Central Standard Time)',
			'America/El_Salvador' => '(GMT-6:00) America/El_Salvador (Central Standard Time)',
			'America/Guatemala' => '(GMT-6:00) America/Guatemala (Central Standard Time)',
			'America/Knox_IN' => '(GMT-6:00) America/Knox_IN (Central Standard Time)',
			'America/Managua' => '(GMT-6:00) America/Managua (Central Standard Time)',
			'America/Menominee' => '(GMT-6:00) America/Menominee (Central Standard Time)',
			'America/Merida' => '(GMT-6:00) America/Merida (Central Standard Time)',
			'America/Mexico_City' => '(GMT-6:00) America/Mexico_City (Central Standard Time)',
			'America/Monterrey' => '(GMT-6:00) America/Monterrey (Central Standard Time)',
			'America/Rainy_River' => '(GMT-6:00) America/Rainy_River (Central Standard Time)',
			'America/Rankin_Inlet' => '(GMT-6:00) America/Rankin_Inlet (Central Standard Time)',
			'America/Regina' => '(GMT-6:00) America/Regina (Central Standard Time)',
			'America/Swift_Current' => '(GMT-6:00) America/Swift_Current (Central Standard Time)',
			'America/Tegucigalpa' => '(GMT-6:00) America/Tegucigalpa (Central Standard Time)',
			'America/Winnipeg' => '(GMT-6:00) America/Winnipeg (Central Standard Time)',
			'Canada/Central' => '(GMT-6:00) Canada/Central (Central Standard Time)',
			'Canada/East-Saskatchewan' => '(GMT-6:00) Canada/East-Saskatchewan (Central Standard Time)',
			'Canada/Saskatchewan' => '(GMT-6:00) Canada/Saskatchewan (Central Standard Time)',
			'Chile/EasterIsland' => '(GMT-6:00) Chile/EasterIsland (Easter Is. Time)',
			'Mexico/General' => '(GMT-6:00) Mexico/General (Central Standard Time)',
			'America/Atikokan' => '(GMT-5:00) America/Atikokan (Eastern Standard Time)',
			'America/Bogota' => '(GMT-5:00) America/Bogota (Colombia Time)',
			'America/Cayman' => '(GMT-5:00) America/Cayman (Eastern Standard Time)',
			'America/Coral_Harbour' => '(GMT-5:00) America/Coral_Harbour (Eastern Standard Time)',
			'America/Detroit' => '(GMT-5:00) America/Detroit (Eastern Standard Time)',
			'America/Fort_Wayne' => '(GMT-5:00) America/Fort_Wayne (Eastern Standard Time)',
			'America/Grand_Turk' => '(GMT-5:00) America/Grand_Turk (Eastern Standard Time)',
			'America/Guayaquil' => '(GMT-5:00) America/Guayaquil (Ecuador Time)',
			'America/Havana' => '(GMT-5:00) America/Havana (Cuba Standard Time)',
			'America/Indianapolis' => '(GMT-5:00) America/Indianapolis (Eastern Standard Time)',
			'America/Iqaluit' => '(GMT-5:00) America/Iqaluit (Eastern Standard Time)',
			'America/Jamaica' => '(GMT-5:00) America/Jamaica (Eastern Standard Time)',
			'America/Lima' => '(GMT-5:00) America/Lima (Peru Time)',
			'America/Louisville' => '(GMT-5:00) America/Louisville (Eastern Standard Time)',
			'America/Montreal' => '(GMT-5:00) America/Montreal (Eastern Standard Time)',
			'America/Nassau' => '(GMT-5:00) America/Nassau (Eastern Standard Time)',
			'America/New_York' => '(GMT-5:00) America/New_York (Eastern Standard Time)',
			'America/Nipigon' => '(GMT-5:00) America/Nipigon (Eastern Standard Time)',
			'America/Panama' => '(GMT-5:00) America/Panama (Eastern Standard Time)',
			'America/Pangnirtung' => '(GMT-5:00) America/Pangnirtung (Eastern Standard Time)',
			'America/Port-au-Prince' => '(GMT-5:00) America/Port-au-Prince (Eastern Standard Time)',
			'America/Resolute' => '(GMT-5:00) America/Resolute (Eastern Standard Time)',
			'America/Thunder_Bay' => '(GMT-5:00) America/Thunder_Bay (Eastern Standard Time)',
			'America/Toronto' => '(GMT-5:00) America/Toronto (Eastern Standard Time)',
			'Canada/Eastern' => '(GMT-5:00) Canada/Eastern (Eastern Standard Time)',
			'America/Caracas' => '(GMT-4:-30) America/Caracas (Venezuela Time)',
			'America/Anguilla' => '(GMT-4:00) America/Anguilla (Atlantic Standard Time)',
			'America/Antigua' => '(GMT-4:00) America/Antigua (Atlantic Standard Time)',
			'America/Aruba' => '(GMT-4:00) America/Aruba (Atlantic Standard Time)',
			'America/Asuncion' => '(GMT-4:00) America/Asuncion (Paraguay Time)',
			'America/Barbados' => '(GMT-4:00) America/Barbados (Atlantic Standard Time)',
			'America/Blanc-Sablon' => '(GMT-4:00) America/Blanc-Sablon (Atlantic Standard Time)',
			'America/Boa_Vista' => '(GMT-4:00) America/Boa_Vista (Amazon Time)',
			'America/Campo_Grande' => '(GMT-4:00) America/Campo_Grande (Amazon Time)',
			'America/Cuiaba' => '(GMT-4:00) America/Cuiaba (Amazon Time)',
			'America/Curacao' => '(GMT-4:00) America/Curacao (Atlantic Standard Time)',
			'America/Dominica' => '(GMT-4:00) America/Dominica (Atlantic Standard Time)',
			'America/Eirunepe' => '(GMT-4:00) America/Eirunepe (Amazon Time)',
			'America/Glace_Bay' => '(GMT-4:00) America/Glace_Bay (Atlantic Standard Time)',
			'America/Goose_Bay' => '(GMT-4:00) America/Goose_Bay (Atlantic Standard Time)',
			'America/Grenada' => '(GMT-4:00) America/Grenada (Atlantic Standard Time)',
			'America/Guadeloupe' => '(GMT-4:00) America/Guadeloupe (Atlantic Standard Time)',
			'America/Guyana' => '(GMT-4:00) America/Guyana (Guyana Time)',
			'America/Halifax' => '(GMT-4:00) America/Halifax (Atlantic Standard Time)',
			'America/La_Paz' => '(GMT-4:00) America/La_Paz (Bolivia Time)',
			'America/Manaus' => '(GMT-4:00) America/Manaus (Amazon Time)',
			'America/Marigot' => '(GMT-4:00) America/Marigot (Atlantic Standard Time)',
			'America/Martinique' => '(GMT-4:00) America/Martinique (Atlantic Standard Time)',
			'America/Moncton' => '(GMT-4:00) America/Moncton (Atlantic Standard Time)',
			'America/Montserrat' => '(GMT-4:00) America/Montserrat (Atlantic Standard Time)',
			'America/Port_of_Spain' => '(GMT-4:00) America/Port_of_Spain (Atlantic Standard Time)',
			'America/Porto_Acre' => '(GMT-4:00) America/Porto_Acre (Amazon Time)',
			'America/Porto_Velho' => '(GMT-4:00) America/Porto_Velho (Amazon Time)',
			'America/Puerto_Rico' => '(GMT-4:00) America/Puerto_Rico (Atlantic Standard Time)',
			'America/Rio_Branco' => '(GMT-4:00) America/Rio_Branco (Amazon Time)',
			'America/Santiago' => '(GMT-4:00) America/Santiago (Chile Time)',
			'America/Santo_Domingo' => '(GMT-4:00) America/Santo_Domingo (Atlantic Standard Time)',
			'America/St_Barthelemy' => '(GMT-4:00) America/St_Barthelemy (Atlantic Standard Time)',
			'America/St_Kitts' => '(GMT-4:00) America/St_Kitts (Atlantic Standard Time)',
			'America/St_Lucia' => '(GMT-4:00) America/St_Lucia (Atlantic Standard Time)',
			'America/St_Thomas' => '(GMT-4:00) America/St_Thomas (Atlantic Standard Time)',
			'America/St_Vincent' => '(GMT-4:00) America/St_Vincent (Atlantic Standard Time)',
			'America/Thule' => '(GMT-4:00) America/Thule (Atlantic Standard Time)',
			'America/Tortola' => '(GMT-4:00) America/Tortola (Atlantic Standard Time)',
			'America/Virgin' => '(GMT-4:00) America/Virgin (Atlantic Standard Time)',
			'Antarctica/Palmer' => '(GMT-4:00) Antarctica/Palmer (Chile Time)',
			'Atlantic/Bermuda' => '(GMT-4:00) Atlantic/Bermuda (Atlantic Standard Time)',
			'Atlantic/Stanley' => '(GMT-4:00) Atlantic/Stanley (Falkland Is. Time)',
			'Brazil/Acre' => '(GMT-4:00) Brazil/Acre (Amazon Time)',
			'Brazil/West' => '(GMT-4:00) Brazil/West (Amazon Time)',
			'Canada/Atlantic' => '(GMT-4:00) Canada/Atlantic (Atlantic Standard Time)',
			'Chile/Continental' => '(GMT-4:00) Chile/Continental (Chile Time)',
			'America/St_Johns' => '(GMT-3:-30) America/St_Johns (Newfoundland Standard Time)',
			'Canada/Newfoundland' => '(GMT-3:-30) Canada/Newfoundland (Newfoundland Standard Time)',
			'America/Araguaina' => '(GMT-3:00) America/Araguaina (Brasilia Time)',
			'America/Bahia' => '(GMT-3:00) America/Bahia (Brasilia Time)',
			'America/Belem' => '(GMT-3:00) America/Belem (Brasilia Time)',
			'America/Buenos_Aires' => '(GMT-3:00) America/Buenos_Aires (Argentine Time)',
			'America/Catamarca' => '(GMT-3:00) America/Catamarca (Argentine Time)',
			'America/Cayenne' => '(GMT-3:00) America/Cayenne (French Guiana Time)',
			'America/Cordoba' => '(GMT-3:00) America/Cordoba (Argentine Time)',
			'America/Fortaleza' => '(GMT-3:00) America/Fortaleza (Brasilia Time)',
			'America/Godthab' => '(GMT-3:00) America/Godthab (Western Greenland Time)',
			'America/Jujuy' => '(GMT-3:00) America/Jujuy (Argentine Time)',
			'America/Maceio' => '(GMT-3:00) America/Maceio (Brasilia Time)',
			'America/Mendoza' => '(GMT-3:00) America/Mendoza (Argentine Time)',
			'America/Miquelon' => '(GMT-3:00) America/Miquelon (Pierre & Miquelon Standard Time)',
			'America/Montevideo' => '(GMT-3:00) America/Montevideo (Uruguay Time)',
			'America/Paramaribo' => '(GMT-3:00) America/Paramaribo (Suriname Time)',
			'America/Recife' => '(GMT-3:00) America/Recife (Brasilia Time)',
			'America/Rosario' => '(GMT-3:00) America/Rosario (Argentine Time)',
			'America/Santarem' => '(GMT-3:00) America/Santarem (Brasilia Time)',
			'America/Sao_Paulo' => '(GMT-3:00) America/Sao_Paulo (Brasilia Time)',
			'Antarctica/Rothera' => '(GMT-3:00) Antarctica/Rothera (Rothera Time)',
			'Brazil/East' => '(GMT-3:00) Brazil/East (Brasilia Time)',
			'America/Noronha' => '(GMT-2:00) America/Noronha (Fernando de Noronha Time)',
			'Atlantic/South_Georgia' => '(GMT-2:00) Atlantic/South_Georgia (South Georgia Standard Time)',
			'Brazil/DeNoronha' => '(GMT-2:00) Brazil/DeNoronha (Fernando de Noronha Time)',
			'America/Scoresbysund' => '(GMT-1:00) America/Scoresbysund (Eastern Greenland Time)',
			'Atlantic/Azores' => '(GMT-1:00) Atlantic/Azores (Azores Time)',
			'Atlantic/Cape_Verde' => '(GMT-1:00) Atlantic/Cape_Verde (Cape Verde Time)',
			'Africa/Abidjan' => '(GMT+0:00) Africa/Abidjan (Greenwich Mean Time)',
			'Africa/Accra' => '(GMT+0:00) Africa/Accra (Ghana Mean Time)',
			'Africa/Bamako' => '(GMT+0:00) Africa/Bamako (Greenwich Mean Time)',
			'Africa/Banjul' => '(GMT+0:00) Africa/Banjul (Greenwich Mean Time)',
			'Africa/Bissau' => '(GMT+0:00) Africa/Bissau (Greenwich Mean Time)',
			'Africa/Casablanca' => '(GMT+0:00) Africa/Casablanca (Western European Time)',
			'Africa/Conakry' => '(GMT+0:00) Africa/Conakry (Greenwich Mean Time)',
			'Africa/Dakar' => '(GMT+0:00) Africa/Dakar (Greenwich Mean Time)',
			'Africa/El_Aaiun' => '(GMT+0:00) Africa/El_Aaiun (Western European Time)',
			'Africa/Freetown' => '(GMT+0:00) Africa/Freetown (Greenwich Mean Time)',
			'Africa/Lome' => '(GMT+0:00) Africa/Lome (Greenwich Mean Time)',
			'Africa/Monrovia' => '(GMT+0:00) Africa/Monrovia (Greenwich Mean Time)',
			'Africa/Nouakchott' => '(GMT+0:00) Africa/Nouakchott (Greenwich Mean Time)',
			'Africa/Ouagadougou' => '(GMT+0:00) Africa/Ouagadougou (Greenwich Mean Time)',
			'Africa/Sao_Tome' => '(GMT+0:00) Africa/Sao_Tome (Greenwich Mean Time)',
			'Africa/Timbuktu' => '(GMT+0:00) Africa/Timbuktu (Greenwich Mean Time)',
			'America/Danmarkshavn' => '(GMT+0:00) America/Danmarkshavn (Greenwich Mean Time)',
			'Atlantic/Canary' => '(GMT+0:00) Atlantic/Canary (Western European Time)',
			'Atlantic/Faeroe' => '(GMT+0:00) Atlantic/Faeroe (Western European Time)',
			'Atlantic/Faroe' => '(GMT+0:00) Atlantic/Faroe (Western European Time)',
			'Atlantic/Madeira' => '(GMT+0:00) Atlantic/Madeira (Western European Time)',
			'Atlantic/Reykjavik' => '(GMT+0:00) Atlantic/Reykjavik (Greenwich Mean Time)',
			'Atlantic/St_Helena' => '(GMT+0:00) Atlantic/St_Helena (Greenwich Mean Time)',
			'Europe/Belfast' => '(GMT+0:00) Europe/Belfast (Greenwich Mean Time)',
			'Europe/Dublin' => '(GMT+0:00) Europe/Dublin (Greenwich Mean Time)',
			'Europe/Guernsey' => '(GMT+0:00) Europe/Guernsey (Greenwich Mean Time)',
			'Europe/Isle_of_Man' => '(GMT+0:00) Europe/Isle_of_Man (Greenwich Mean Time)',
			'Europe/Jersey' => '(GMT+0:00) Europe/Jersey (Greenwich Mean Time)',
			'Europe/Lisbon' => '(GMT+0:00) Europe/Lisbon (Western European Time)',
			'Europe/London' => '(GMT+0:00) Europe/London (Greenwich Mean Time)',
			'Africa/Algiers' => '(GMT+1:00) Africa/Algiers (Central European Time)',
			'Africa/Bangui' => '(GMT+1:00) Africa/Bangui (Western African Time)',
			'Africa/Brazzaville' => '(GMT+1:00) Africa/Brazzaville (Western African Time)',
			'Africa/Ceuta' => '(GMT+1:00) Africa/Ceuta (Central European Time)',
			'Africa/Douala' => '(GMT+1:00) Africa/Douala (Western African Time)',
			'Africa/Kinshasa' => '(GMT+1:00) Africa/Kinshasa (Western African Time)',
			'Africa/Lagos' => '(GMT+1:00) Africa/Lagos (Western African Time)',
			'Africa/Libreville' => '(GMT+1:00) Africa/Libreville (Western African Time)',
			'Africa/Luanda' => '(GMT+1:00) Africa/Luanda (Western African Time)',
			'Africa/Malabo' => '(GMT+1:00) Africa/Malabo (Western African Time)',
			'Africa/Ndjamena' => '(GMT+1:00) Africa/Ndjamena (Western African Time)',
			'Africa/Niamey' => '(GMT+1:00) Africa/Niamey (Western African Time)',
			'Africa/Porto-Novo' => '(GMT+1:00) Africa/Porto-Novo (Western African Time)',
			'Africa/Tunis' => '(GMT+1:00) Africa/Tunis (Central European Time)',
			'Africa/Windhoek' => '(GMT+1:00) Africa/Windhoek (Western African Time)',
			'Arctic/Longyearbyen' => '(GMT+1:00) Arctic/Longyearbyen (Central European Time)',
			'Atlantic/Jan_Mayen' => '(GMT+1:00) Atlantic/Jan_Mayen (Central European Time)',
			'Europe/Amsterdam' => '(GMT+1:00) Europe/Amsterdam (Central European Time)',
			'Europe/Andorra' => '(GMT+1:00) Europe/Andorra (Central European Time)',
			'Europe/Belgrade' => '(GMT+1:00) Europe/Belgrade (Central European Time)',
			'Europe/Berlin' => '(GMT+1:00) Europe/Berlin (Central European Time)',
			'Europe/Bratislava' => '(GMT+1:00) Europe/Bratislava (Central European Time)',
			'Europe/Brussels' => '(GMT+1:00) Europe/Brussels (Central European Time)',
			'Europe/Budapest' => '(GMT+1:00) Europe/Budapest (Central European Time)',
			'Europe/Copenhagen' => '(GMT+1:00) Europe/Copenhagen (Central European Time)',
			'Europe/Gibraltar' => '(GMT+1:00) Europe/Gibraltar (Central European Time)',
			'Europe/Ljubljana' => '(GMT+1:00) Europe/Ljubljana (Central European Time)',
			'Europe/Luxembourg' => '(GMT+1:00) Europe/Luxembourg (Central European Time)',
			'Europe/Madrid' => '(GMT+1:00) Europe/Madrid (Central European Time)',
			'Europe/Malta' => '(GMT+1:00) Europe/Malta (Central European Time)',
			'Europe/Monaco' => '(GMT+1:00) Europe/Monaco (Central European Time)',
			'Europe/Oslo' => '(GMT+1:00) Europe/Oslo (Central European Time)',
			'Europe/Paris' => '(GMT+1:00) Europe/Paris (Central European Time)',
			'Europe/Podgorica' => '(GMT+1:00) Europe/Podgorica (Central European Time)',
			'Europe/Prague' => '(GMT+1:00) Europe/Prague (Central European Time)',
			'Europe/Rome' => '(GMT+1:00) Europe/Rome (Central European Time)',
			'Europe/San_Marino' => '(GMT+1:00) Europe/San_Marino (Central European Time)',
			'Europe/Sarajevo' => '(GMT+1:00) Europe/Sarajevo (Central European Time)',
			'Europe/Skopje' => '(GMT+1:00) Europe/Skopje (Central European Time)',
			'Europe/Stockholm' => '(GMT+1:00) Europe/Stockholm (Central European Time)',
			'Europe/Tirane' => '(GMT+1:00) Europe/Tirane (Central European Time)',
			'Europe/Vaduz' => '(GMT+1:00) Europe/Vaduz (Central European Time)',
			'Europe/Vatican' => '(GMT+1:00) Europe/Vatican (Central European Time)',
			'Europe/Vienna' => '(GMT+1:00) Europe/Vienna (Central European Time)',
			'Europe/Warsaw' => '(GMT+1:00) Europe/Warsaw (Central European Time)',
			'Europe/Zagreb' => '(GMT+1:00) Europe/Zagreb (Central European Time)',
			'Europe/Zurich' => '(GMT+1:00) Europe/Zurich (Central European Time)',
			'Africa/Blantyre' => '(GMT+2:00) Africa/Blantyre (Central African Time)',
			'Africa/Bujumbura' => '(GMT+2:00) Africa/Bujumbura (Central African Time)',
			'Africa/Cairo' => '(GMT+2:00) Africa/Cairo (Eastern European Time)',
			'Africa/Gaborone' => '(GMT+2:00) Africa/Gaborone (Central African Time)',
			'Africa/Harare' => '(GMT+2:00) Africa/Harare (Central African Time)',
			'Africa/Johannesburg' => '(GMT+2:00) Africa/Johannesburg (South Africa Standard Time)',
			'Africa/Kigali' => '(GMT+2:00) Africa/Kigali (Central African Time)',
			'Africa/Lubumbashi' => '(GMT+2:00) Africa/Lubumbashi (Central African Time)',
			'Africa/Lusaka' => '(GMT+2:00) Africa/Lusaka (Central African Time)',
			'Africa/Maputo' => '(GMT+2:00) Africa/Maputo (Central African Time)',
			'Africa/Maseru' => '(GMT+2:00) Africa/Maseru (South Africa Standard Time)',
			'Africa/Mbabane' => '(GMT+2:00) Africa/Mbabane (South Africa Standard Time)',
			'Africa/Tripoli' => '(GMT+2:00) Africa/Tripoli (Eastern European Time)',
			'Asia/Amman' => '(GMT+2:00) Asia/Amman (Eastern European Time)',
			'Asia/Beirut' => '(GMT+2:00) Asia/Beirut (Eastern European Time)',
			'Asia/Damascus' => '(GMT+2:00) Asia/Damascus (Eastern European Time)',
			'Asia/Gaza' => '(GMT+2:00) Asia/Gaza (Eastern European Time)',
			'Asia/Istanbul' => '(GMT+2:00) Asia/Istanbul (Eastern European Time)',
			'Asia/Jerusalem' => '(GMT+2:00) Asia/Jerusalem (Israel Standard Time)',
			'Asia/Nicosia' => '(GMT+2:00) Asia/Nicosia (Eastern European Time)',
			'Asia/Tel_Aviv' => '(GMT+2:00) Asia/Tel_Aviv (Israel Standard Time)',
			'Europe/Athens' => '(GMT+2:00) Europe/Athens (Eastern European Time)',
			'Europe/Bucharest' => '(GMT+2:00) Europe/Bucharest (Eastern European Time)',
			'Europe/Chisinau' => '(GMT+2:00) Europe/Chisinau (Eastern European Time)',
			'Europe/Helsinki' => '(GMT+2:00) Europe/Helsinki (Eastern European Time)',
			'Europe/Istanbul' => '(GMT+2:00) Europe/Istanbul (Eastern European Time)',
			'Europe/Kaliningrad' => '(GMT+2:00) Europe/Kaliningrad (Eastern European Time)',
			'Europe/Kiev' => '(GMT+2:00) Europe/Kiev (Eastern European Time)',
			'Europe/Mariehamn' => '(GMT+2:00) Europe/Mariehamn (Eastern European Time)',
			'Europe/Minsk' => '(GMT+2:00) Europe/Minsk (Eastern European Time)',
			'Europe/Nicosia' => '(GMT+2:00) Europe/Nicosia (Eastern European Time)',
			'Europe/Riga' => '(GMT+2:00) Europe/Riga (Eastern European Time)',
			'Europe/Simferopol' => '(GMT+2:00) Europe/Simferopol (Eastern European Time)',
			'Europe/Sofia' => '(GMT+2:00) Europe/Sofia (Eastern European Time)',
			'Europe/Tallinn' => '(GMT+2:00) Europe/Tallinn (Eastern European Time)',
			'Europe/Tiraspol' => '(GMT+2:00) Europe/Tiraspol (Eastern European Time)',
			'Europe/Uzhgorod' => '(GMT+2:00) Europe/Uzhgorod (Eastern European Time)',
			'Europe/Vilnius' => '(GMT+2:00) Europe/Vilnius (Eastern European Time)',
			'Europe/Zaporozhye' => '(GMT+2:00) Europe/Zaporozhye (Eastern European Time)',
			'Africa/Addis_Ababa' => '(GMT+3:00) Africa/Addis_Ababa (Eastern African Time)',
			'Africa/Asmara' => '(GMT+3:00) Africa/Asmara (Eastern African Time)',
			'Africa/Asmera' => '(GMT+3:00) Africa/Asmera (Eastern African Time)',
			'Africa/Dar_es_Salaam' => '(GMT+3:00) Africa/Dar_es_Salaam (Eastern African Time)',
			'Africa/Djibouti' => '(GMT+3:00) Africa/Djibouti (Eastern African Time)',
			'Africa/Kampala' => '(GMT+3:00) Africa/Kampala (Eastern African Time)',
			'Africa/Khartoum' => '(GMT+3:00) Africa/Khartoum (Eastern African Time)',
			'Africa/Mogadishu' => '(GMT+3:00) Africa/Mogadishu (Eastern African Time)',
			'Africa/Nairobi' => '(GMT+3:00) Africa/Nairobi (Eastern African Time)',
			'Antarctica/Syowa' => '(GMT+3:00) Antarctica/Syowa (Syowa Time)',
			'Asia/Aden' => '(GMT+3:00) Asia/Aden (Arabia Standard Time)',
			'Asia/Baghdad' => '(GMT+3:00) Asia/Baghdad (Arabia Standard Time)',
			'Asia/Bahrain' => '(GMT+3:00) Asia/Bahrain (Arabia Standard Time)',
			'Asia/Kuwait' => '(GMT+3:00) Asia/Kuwait (Arabia Standard Time)',
			'Asia/Qatar' => '(GMT+3:00) Asia/Qatar (Arabia Standard Time)',
			'Europe/Moscow' => '(GMT+3:00) Europe/Moscow (Moscow Standard Time)',
			'Europe/Volgograd' => '(GMT+3:00) Europe/Volgograd (Volgograd Time)',
			'Indian/Antananarivo' => '(GMT+3:00) Indian/Antananarivo (Eastern African Time)',
			'Indian/Comoro' => '(GMT+3:00) Indian/Comoro (Eastern African Time)',
			'Indian/Mayotte' => '(GMT+3:00) Indian/Mayotte (Eastern African Time)',
			'Asia/Tehran' => '(GMT+3:30) Asia/Tehran (Iran Standard Time)',
			'Asia/Baku' => '(GMT+4:00) Asia/Baku (Azerbaijan Time)',
			'Asia/Dubai' => '(GMT+4:00) Asia/Dubai (Gulf Standard Time)',
			'Asia/Muscat' => '(GMT+4:00) Asia/Muscat (Gulf Standard Time)',
			'Asia/Tbilisi' => '(GMT+4:00) Asia/Tbilisi (Georgia Time)',
			'Asia/Yerevan' => '(GMT+4:00) Asia/Yerevan (Armenia Time)',
			'Europe/Samara' => '(GMT+4:00) Europe/Samara (Samara Time)',
			'Indian/Mahe' => '(GMT+4:00) Indian/Mahe (Seychelles Time)',
			'Indian/Mauritius' => '(GMT+4:00) Indian/Mauritius (Mauritius Time)',
			'Indian/Reunion' => '(GMT+4:00) Indian/Reunion (Reunion Time)',
			'Asia/Kabul' => '(GMT+4:30) Asia/Kabul (Afghanistan Time)',
			'Asia/Aqtau' => '(GMT+5:00) Asia/Aqtau (Aqtau Time)',
			'Asia/Aqtobe' => '(GMT+5:00) Asia/Aqtobe (Aqtobe Time)',
			'Asia/Ashgabat' => '(GMT+5:00) Asia/Ashgabat (Turkmenistan Time)',
			'Asia/Ashkhabad' => '(GMT+5:00) Asia/Ashkhabad (Turkmenistan Time)',
			'Asia/Dushanbe' => '(GMT+5:00) Asia/Dushanbe (Tajikistan Time)',
			'Asia/Karachi' => '(GMT+5:00) Asia/Karachi (Pakistan Time)',
			'Asia/Oral' => '(GMT+5:00) Asia/Oral (Oral Time)',
			'Asia/Samarkand' => '(GMT+5:00) Asia/Samarkand (Uzbekistan Time)',
			'Asia/Tashkent' => '(GMT+5:00) Asia/Tashkent (Uzbekistan Time)',
			'Asia/Yekaterinburg' => '(GMT+5:00) Asia/Yekaterinburg (Yekaterinburg Time)',
			'Indian/Kerguelen' => '(GMT+5:00) Indian/Kerguelen (French Southern & Antarctic Lands Time)',
			'Indian/Maldives' => '(GMT+5:00) Indian/Maldives (Maldives Time)',
			'Asia/Calcutta' => '(GMT+5:30) Asia/Calcutta (India Standard Time)',
			'Asia/Colombo' => '(GMT+5:30) Asia/Colombo (India Standard Time)',
			'Asia/Kolkata' => '(GMT+5:30) Asia/Kolkata (India Standard Time)',
			'Asia/Katmandu' => '(GMT+5:45) Asia/Katmandu (Nepal Time)',
			'Antarctica/Mawson' => '(GMT+6:00) Antarctica/Mawson (Mawson Time)',
			'Antarctica/Vostok' => '(GMT+6:00) Antarctica/Vostok (Vostok Time)',
			'Asia/Almaty' => '(GMT+6:00) Asia/Almaty (Alma-Ata Time)',
			'Asia/Bishkek' => '(GMT+6:00) Asia/Bishkek (Kirgizstan Time)',
			'Asia/Dacca' => '(GMT+6:00) Asia/Dacca (Bangladesh Time)',
			'Asia/Dhaka' => '(GMT+6:00) Asia/Dhaka (Bangladesh Time)',
			'Asia/Novosibirsk' => '(GMT+6:00) Asia/Novosibirsk (Novosibirsk Time)',
			'Asia/Omsk' => '(GMT+6:00) Asia/Omsk (Omsk Time)',
			'Asia/Qyzylorda' => '(GMT+6:00) Asia/Qyzylorda (Qyzylorda Time)',
			'Asia/Thimbu' => '(GMT+6:00) Asia/Thimbu (Bhutan Time)',
			'Asia/Thimphu' => '(GMT+6:00) Asia/Thimphu (Bhutan Time)',
			'Indian/Chagos' => '(GMT+6:00) Indian/Chagos (Indian Ocean Territory Time)',
			'Asia/Rangoon' => '(GMT+6:30) Asia/Rangoon (Myanmar Time)',
			'Indian/Cocos' => '(GMT+6:30) Indian/Cocos (Cocos Islands Time)',
			'Antarctica/Davis' => '(GMT+7:00) Antarctica/Davis (Davis Time)',
			'Asia/Bangkok' => '(GMT+7:00) Asia/Bangkok (Indochina Time)',
			'Asia/Ho_Chi_Minh' => '(GMT+7:00) Asia/Ho_Chi_Minh (Indochina Time)',
			'Asia/Hovd' => '(GMT+7:00) Asia/Hovd (Hovd Time)',
			'Asia/Jakarta' => '(GMT+7:00) Asia/Jakarta (West Indonesia Time)',
			'Asia/Krasnoyarsk' => '(GMT+7:00) Asia/Krasnoyarsk (Krasnoyarsk Time)',
			'Asia/Phnom_Penh' => '(GMT+7:00) Asia/Phnom_Penh (Indochina Time)',
			'Asia/Pontianak' => '(GMT+7:00) Asia/Pontianak (West Indonesia Time)',
			'Asia/Saigon' => '(GMT+7:00) Asia/Saigon (Indochina Time)',
			'Asia/Vientiane' => '(GMT+7:00) Asia/Vientiane (Indochina Time)',
			'Indian/Christmas' => '(GMT+7:00) Indian/Christmas (Christmas Island Time)',
			'Antarctica/Casey' => '(GMT+8:00) Antarctica/Casey (Western Standard Time (Australia))',
			'Asia/Brunei' => '(GMT+8:00) Asia/Brunei (Brunei Time)',
			'Asia/Choibalsan' => '(GMT+8:00) Asia/Choibalsan (Choibalsan Time)',
			'Asia/Chongqing' => '(GMT+8:00) Asia/Chongqing (China Standard Time)',
			'Asia/Chungking' => '(GMT+8:00) Asia/Chungking (China Standard Time)',
			'Asia/Harbin' => '(GMT+8:00) Asia/Harbin (China Standard Time)',
			'Asia/Hong_Kong' => '(GMT+8:00) Asia/Hong_Kong (Hong Kong Time)',
			'Asia/Irkutsk' => '(GMT+8:00) Asia/Irkutsk (Irkutsk Time)',
			'Asia/Kashgar' => '(GMT+8:00) Asia/Kashgar (China Standard Time)',
			'Asia/Kuala_Lumpur' => '(GMT+8:00) Asia/Kuala_Lumpur (Malaysia Time)',
			'Asia/Kuching' => '(GMT+8:00) Asia/Kuching (Malaysia Time)',
			'Asia/Macao' => '(GMT+8:00) Asia/Macao (China Standard Time)',
			'Asia/Macau' => '(GMT+8:00) Asia/Macau (China Standard Time)',
			'Asia/Makassar' => '(GMT+8:00) Asia/Makassar (Central Indonesia Time)',
			'Asia/Manila' => '(GMT+8:00) Asia/Manila (Philippines Time)',
			'Asia/Shanghai' => '(GMT+8:00) Asia/Shanghai (China Standard Time)',
			'Asia/Singapore' => '(GMT+8:00) Asia/Singapore (Singapore Time)',
			'Asia/Taipei' => '(GMT+8:00) Asia/Taipei (China Standard Time)',
			'Asia/Ujung_Pandang' => '(GMT+8:00) Asia/Ujung_Pandang (Central Indonesia Time)',
			'Asia/Ulaanbaatar' => '(GMT+8:00) Asia/Ulaanbaatar (Ulaanbaatar Time)',
			'Asia/Ulan_Bator' => '(GMT+8:00) Asia/Ulan_Bator (Ulaanbaatar Time)',
			'Asia/Urumqi' => '(GMT+8:00) Asia/Urumqi (China Standard Time)',
			'Australia/Perth' => '(GMT+8:00) Australia/Perth (Western Standard Time (Australia))',
			'Australia/West' => '(GMT+8:00) Australia/West (Western Standard Time (Australia))',
			'Australia/Eucla' => '(GMT+8:45) Australia/Eucla (Central Western Standard Time (Australia))',
			'Asia/Dili' => '(GMT+9:00) Asia/Dili (Timor-Leste Time)',
			'Asia/Jayapura' => '(GMT+9:00) Asia/Jayapura (East Indonesia Time)',
			'Asia/Pyongyang' => '(GMT+9:00) Asia/Pyongyang (Korea Standard Time)',
			'Asia/Seoul' => '(GMT+9:00) Asia/Seoul (Korea Standard Time)',
			'Asia/Tokyo' => '(GMT+9:00) Asia/Tokyo (Japan Standard Time)',
			'Asia/Yakutsk' => '(GMT+9:00) Asia/Yakutsk (Yakutsk Time)',
			'Australia/Adelaide' => '(GMT+9:30) Australia/Adelaide (Central Standard Time (South Australia))',
			'Australia/Broken_Hill' => '(GMT+9:30) Australia/Broken_Hill (Central Standard Time (South Australia/New South Wales))',
			'Australia/Darwin' => '(GMT+9:30) Australia/Darwin (Central Standard Time (Northern Territory))',
			'Australia/North' => '(GMT+9:30) Australia/North (Central Standard Time (Northern Territory))',
			'Australia/South' => '(GMT+9:30) Australia/South (Central Standard Time (South Australia))',
			'Australia/Yancowinna' => '(GMT+9:30) Australia/Yancowinna (Central Standard Time (South Australia/New South Wales))',
			'Antarctica/DumontDUrville' => '(GMT+10:00) Antarctica/DumontDUrville (Dumont-d\'Urville Time)',
			'Asia/Sakhalin' => '(GMT+10:00) Asia/Sakhalin (Sakhalin Time)',
			'Asia/Vladivostok' => '(GMT+10:00) Asia/Vladivostok (Vladivostok Time)',
			'Australia/ACT' => '(GMT+10:00) Australia/ACT (Eastern Standard Time (New South Wales))',
			'Australia/Brisbane' => '(GMT+10:00) Australia/Brisbane (Eastern Standard Time (Queensland))',
			'Australia/Canberra' => '(GMT+10:00) Australia/Canberra (Eastern Standard Time (New South Wales))',
			'Australia/Currie' => '(GMT+10:00) Australia/Currie (Eastern Standard Time (New South Wales))',
			'Australia/Hobart' => '(GMT+10:00) Australia/Hobart (Eastern Standard Time (Tasmania))',
			'Australia/Lindeman' => '(GMT+10:00) Australia/Lindeman (Eastern Standard Time (Queensland))',
			'Australia/Melbourne' => '(GMT+10:00) Australia/Melbourne (Eastern Standard Time (Victoria))',
			'Australia/NSW' => '(GMT+10:00) Australia/NSW (Eastern Standard Time (New South Wales))',
			'Australia/Queensland' => '(GMT+10:00) Australia/Queensland (Eastern Standard Time (Queensland))',
			'Australia/Sydney' => '(GMT+10:00) Australia/Sydney (Eastern Standard Time (New South Wales))',
			'Australia/Tasmania' => '(GMT+10:00) Australia/Tasmania (Eastern Standard Time (Tasmania))',
			'Australia/Victoria' => '(GMT+10:00) Australia/Victoria (Eastern Standard Time (Victoria))',
			'Australia/LHI' => '(GMT+10:30) Australia/LHI (Lord Howe Standard Time)',
			'Australia/Lord_Howe' => '(GMT+10:30) Australia/Lord_Howe (Lord Howe Standard Time)',
			'Asia/Magadan' => '(GMT+11:00) Asia/Magadan (Magadan Time)',
			'Antarctica/McMurdo' => '(GMT+12:00) Antarctica/McMurdo (New Zealand Standard Time)',
			'Antarctica/South_Pole' => '(GMT+12:00) Antarctica/South_Pole (New Zealand Standard Time)',
			'Asia/Anadyr' => '(GMT+12:00) Asia/Anadyr (Anadyr Time)',
			'Asia/Kamchatka' => '(GMT+12:00) Asia/Kamchatka (Petropavlovsk-Kamchatski Time)'
		);
		
		return($timezones);
	
	}
}


if (! function_exists('helperI18n_getTimezonesByContinent'))
{

	function helperI18n_getTimezonesByContinent()
	{
		// for HTML select element
		$timezones = array (
			'America' => array (
				'America/Adak' => 'Adak -10:00',
				'America/Atka' => 'Atka -10:00',
				'America/Anchorage' => 'Anchorage -9:00',
				'America/Juneau' => 'Juneau -9:00',
				'America/Nome' => 'Nome -9:00',
				'America/Yakutat' => 'Yakutat -9:00',
				'America/Dawson' => 'Dawson -8:00',
				'America/Ensenada' => 'Ensenada -8:00',
				'America/Los_Angeles' => 'Los_Angeles -8:00',
				'America/Tijuana' => 'Tijuana -8:00',
				'America/Vancouver' => 'Vancouver -8:00',
				'America/Whitehorse' => 'Whitehorse -8:00',
				'America/Boise' => 'Boise -7:00',
				'America/Cambridge_Bay' => 'Cambridge_Bay -7:00',
				'America/Chihuahua' => 'Chihuahua -7:00',
				'America/Dawson_Creek' => 'Dawson_Creek -7:00',
				'America/Denver' => 'Denver -7:00',
				'America/Edmonton' => 'Edmonton -7:00',
				'America/Hermosillo' => 'Hermosillo -7:00',
				'America/Inuvik' => 'Inuvik -7:00',
				'America/Mazatlan' => 'Mazatlan -7:00',
				'America/Phoenix' => 'Phoenix -7:00',
				'America/Shiprock' => 'Shiprock -7:00',
				'America/Yellowknife' => 'Yellowknife -7:00',
				'America/Belize' => 'Belize -6:00',
				'America/Cancun' => 'Cancun -6:00',
				'America/Chicago' => 'Chicago -6:00',
				'America/Costa_Rica' => 'Costa_Rica -6:00',
				'America/El_Salvador' => 'El_Salvador -6:00',
				'America/Guatemala' => 'Guatemala -6:00',
				'America/Knox_IN' => 'Knox_IN -6:00',
				'America/Managua' => 'Managua -6:00',
				'America/Menominee' => 'Menominee -6:00',
				'America/Merida' => 'Merida -6:00',
				'America/Mexico_City' => 'Mexico_City -6:00',
				'America/Monterrey' => 'Monterrey -6:00',
				'America/Rainy_River' => 'Rainy_River -6:00',
				'America/Rankin_Inlet' => 'Rankin_Inlet -6:00',
				'America/Regina' => 'Regina -6:00',
				'America/Swift_Current' => 'Swift_Current -6:00',
				'America/Tegucigalpa' => 'Tegucigalpa -6:00',
				'America/Winnipeg' => 'Winnipeg -6:00',
				'America/Atikokan' => 'Atikokan -5:00',
				'America/Bogota' => 'Bogota -5:00',
				'America/Cayman' => 'Cayman -5:00',
				'America/Coral_Harbour' => 'Coral_Harbour -5:00',
				'America/Detroit' => 'Detroit -5:00',
				'America/Fort_Wayne' => 'Fort_Wayne -5:00',
				'America/Grand_Turk' => 'Grand_Turk -5:00',
				'America/Guayaquil' => 'Guayaquil -5:00',
				'America/Havana' => 'Havana -5:00',
				'America/Indianapolis' => 'Indianapolis -5:00',
				'America/Iqaluit' => 'Iqaluit -5:00',
				'America/Jamaica' => 'Jamaica -5:00',
				'America/Lima' => 'Lima -5:00',
				'America/Louisville' => 'Louisville -5:00',
				'America/Montreal' => 'Montreal -5:00',
				'America/Nassau' => 'Nassau -5:00',
				'America/New_York' => 'New_York -5:00',
				'America/Nipigon' => 'Nipigon -5:00',
				'America/Panama' => 'Panama -5:00',
				'America/Pangnirtung' => 'Pangnirtung -5:00',
				'America/Port-au-Prince' => 'Port-au-Prince -5:00',
				'America/Resolute' => 'Resolute -5:00',
				'America/Thunder_Bay' => 'Thunder_Bay -5:00',
				'America/Toronto' => 'Toronto -5:00',
				'America/Caracas' => 'Caracas -4:-30',
				'America/Anguilla' => 'Anguilla -4:00',
				'America/Antigua' => 'Antigua -4:00',
				'America/Aruba' => 'Aruba -4:00',
				'America/Asuncion' => 'Asuncion -4:00',
				'America/Barbados' => 'Barbados -4:00',
				'America/Blanc-Sablon' => 'Blanc-Sablon -4:00',
				'America/Boa_Vista' => 'Boa_Vista -4:00',
				'America/Campo_Grande' => 'Campo_Grande -4:00',
				'America/Cuiaba' => 'Cuiaba -4:00',
				'America/Curacao' => 'Curacao -4:00',
				'America/Dominica' => 'Dominica -4:00',
				'America/Eirunepe' => 'Eirunepe -4:00',
				'America/Glace_Bay' => 'Glace_Bay -4:00',
				'America/Goose_Bay' => 'Goose_Bay -4:00',
				'America/Grenada' => 'Grenada -4:00',
				'America/Guadeloupe' => 'Guadeloupe -4:00',
				'America/Guyana' => 'Guyana -4:00',
				'America/Halifax' => 'Halifax -4:00',
				'America/La_Paz' => 'La_Paz -4:00',
				'America/Manaus' => 'Manaus -4:00',
				'America/Marigot' => 'Marigot -4:00',
				'America/Martinique' => 'Martinique -4:00',
				'America/Moncton' => 'Moncton -4:00',
				'America/Montserrat' => 'Montserrat -4:00',
				'America/Port_of_Spain' => 'Port_of_Spain -4:00',
				'America/Porto_Acre' => 'Porto_Acre -4:00',
				'America/Porto_Velho' => 'Porto_Velho -4:00',
				'America/Puerto_Rico' => 'Puerto_Rico -4:00',
				'America/Rio_Branco' => 'Rio_Branco -4:00',
				'America/Santiago' => 'Santiago -4:00',
				'America/Santo_Domingo' => 'Santo_Domingo -4:00',
				'America/St_Barthelemy' => 'St_Barthelemy -4:00',
				'America/St_Kitts' => 'St_Kitts -4:00',
				'America/St_Lucia' => 'St_Lucia -4:00',
				'America/St_Thomas' => 'St_Thomas -4:00',
				'America/St_Vincent' => 'St_Vincent -4:00',
				'America/Thule' => 'Thule -4:00',
				'America/Tortola' => 'Tortola -4:00',
				'America/Virgin' => 'Virgin -4:00',
				'America/St_Johns' => 'St_Johns -3:-30',
				'America/Araguaina' => 'Araguaina -3:00',
				'America/Bahia' => 'Bahia -3:00',
				'America/Belem' => 'Belem -3:00',
				'America/Buenos_Aires' => 'Buenos_Aires -3:00',
				'America/Catamarca' => 'Catamarca -3:00',
				'America/Cayenne' => 'Cayenne -3:00',
				'America/Cordoba' => 'Cordoba -3:00',
				'America/Fortaleza' => 'Fortaleza -3:00',
				'America/Godthab' => 'Godthab -3:00',
				'America/Jujuy' => 'Jujuy -3:00',
				'America/Maceio' => 'Maceio -3:00',
				'America/Mendoza' => 'Mendoza -3:00',
				'America/Miquelon' => 'Miquelon -3:00',
				'America/Montevideo' => 'Montevideo -3:00',
				'America/Paramaribo' => 'Paramaribo -3:00',
				'America/Recife' => 'Recife -3:00',
				'America/Rosario' => 'Rosario -3:00',
				'America/Santarem' => 'Santarem -3:00',
				'America/Sao_Paulo' => 'Sao_Paulo -3:00',
				'America/Noronha' => 'Noronha -2:00',
				'America/Scoresbysund' => 'Scoresbysund -1:00',
				'America/Danmarkshavn' => 'Danmarkshavn +0:00',
			),
			'Canada' => array (
				'Canada/Pacific' => 'Pacific -8:00',
				'Canada/Yukon' => 'Yukon -8:00',
				'Canada/Mountain' => 'Mountain -7:00',
				'Canada/Central' => 'Central -6:00',
				'Canada/East-Saskatchewan' => 'East-Saskatchewan -6:00',
				'Canada/Saskatchewan' => 'Saskatchewan -6:00',
				'Canada/Eastern' => 'Eastern -5:00',
				'Canada/Atlantic' => 'Atlantic -4:00',
				'Canada/Newfoundland' => 'Newfoundland -3:-30',
			),
			'Mexico' => array (
				'Mexico/BajaNorte' => 'BajaNorte -8:00',
				'Mexico/BajaSur' => 'BajaSur -7:00',
				'Mexico/General' => 'General -6:00',
			),
			'Chile' => array (
				'Chile/EasterIsland' => 'EasterIsland -6:00',
				'Chile/Continental' => 'Continental -4:00',
			),
			'Antarctica' => array (
				'Antarctica/Palmer' => 'Palmer -4:00',
				'Antarctica/Rothera' => 'Rothera -3:00',
				'Antarctica/Syowa' => 'Syowa +3:00',
				'Antarctica/Mawson' => 'Mawson +6:00',
				'Antarctica/Vostok' => 'Vostok +6:00',
				'Antarctica/Davis' => 'Davis +7:00',
				'Antarctica/Casey' => 'Casey +8:00',
				'Antarctica/DumontDUrville' => 'DumontDUrville +10:00',
				'Antarctica/McMurdo' => 'McMurdo +12:00',
				'Antarctica/South_Pole' => 'South_Pole +12:00',
			),
			'Atlantic' => array (
				'Atlantic/Bermuda' => 'Bermuda -4:00',
				'Atlantic/Stanley' => 'Stanley -4:00',
				'Atlantic/South_Georgia' => 'South_Georgia -2:00',
				'Atlantic/Azores' => 'Azores -1:00',
				'Atlantic/Cape_Verde' => 'Cape_Verde -1:00',
				'Atlantic/Canary' => 'Canary +0:00',
				'Atlantic/Faeroe' => 'Faeroe +0:00',
				'Atlantic/Faroe' => 'Faroe +0:00',
				'Atlantic/Madeira' => 'Madeira +0:00',
				'Atlantic/Reykjavik' => 'Reykjavik +0:00',
				'Atlantic/St_Helena' => 'St_Helena +0:00',
				'Atlantic/Jan_Mayen' => 'Jan_Mayen +1:00',
			),
			'Brazil' => array (
				'Brazil/Acre' => 'Acre -4:00',
				'Brazil/West' => 'West -4:00',
				'Brazil/East' => 'East -3:00',
				'Brazil/DeNoronha' => 'DeNoronha -2:00',
			),
			'Africa' => array (
				'Africa/Abidjan' => 'Abidjan +0:00',
				'Africa/Accra' => 'Accra +0:00',
				'Africa/Bamako' => 'Bamako +0:00',
				'Africa/Banjul' => 'Banjul +0:00',
				'Africa/Bissau' => 'Bissau +0:00',
				'Africa/Casablanca' => 'Casablanca +0:00',
				'Africa/Conakry' => 'Conakry +0:00',
				'Africa/Dakar' => 'Dakar +0:00',
				'Africa/El_Aaiun' => 'El_Aaiun +0:00',
				'Africa/Freetown' => 'Freetown +0:00',
				'Africa/Lome' => 'Lome +0:00',
				'Africa/Monrovia' => 'Monrovia +0:00',
				'Africa/Nouakchott' => 'Nouakchott +0:00',
				'Africa/Ouagadougou' => 'Ouagadougou +0:00',
				'Africa/Sao_Tome' => 'Sao_Tome +0:00',
				'Africa/Timbuktu' => 'Timbuktu +0:00',
				'Africa/Algiers' => 'Algiers +1:00',
				'Africa/Bangui' => 'Bangui +1:00',
				'Africa/Brazzaville' => 'Brazzaville +1:00',
				'Africa/Ceuta' => 'Ceuta +1:00',
				'Africa/Douala' => 'Douala +1:00',
				'Africa/Kinshasa' => 'Kinshasa +1:00',
				'Africa/Lagos' => 'Lagos +1:00',
				'Africa/Libreville' => 'Libreville +1:00',
				'Africa/Luanda' => 'Luanda +1:00',
				'Africa/Malabo' => 'Malabo +1:00',
				'Africa/Ndjamena' => 'Ndjamena +1:00',
				'Africa/Niamey' => 'Niamey +1:00',
				'Africa/Porto-Novo' => 'Porto-Novo +1:00',
				'Africa/Tunis' => 'Tunis +1:00',
				'Africa/Windhoek' => 'Windhoek +1:00',
				'Africa/Blantyre' => 'Blantyre +2:00',
				'Africa/Bujumbura' => 'Bujumbura +2:00',
				'Africa/Cairo' => 'Cairo +2:00',
				'Africa/Gaborone' => 'Gaborone +2:00',
				'Africa/Harare' => 'Harare +2:00',
				'Africa/Johannesburg' => 'Johannesburg +2:00',
				'Africa/Kigali' => 'Kigali +2:00',
				'Africa/Lubumbashi' => 'Lubumbashi +2:00',
				'Africa/Lusaka' => 'Lusaka +2:00',
				'Africa/Maputo' => 'Maputo +2:00',
				'Africa/Maseru' => 'Maseru +2:00',
				'Africa/Mbabane' => 'Mbabane +2:00',
				'Africa/Tripoli' => 'Tripoli +2:00',
				'Africa/Addis_Ababa' => 'Addis_Ababa +3:00',
				'Africa/Asmara' => 'Asmara +3:00',
				'Africa/Asmera' => 'Asmera +3:00',
				'Africa/Dar_es_Salaam' => 'Dar_es_Salaam +3:00',
				'Africa/Djibouti' => 'Djibouti +3:00',
				'Africa/Kampala' => 'Kampala +3:00',
				'Africa/Khartoum' => 'Khartoum +3:00',
				'Africa/Mogadishu' => 'Mogadishu +3:00',
				'Africa/Nairobi' => 'Nairobi +3:00',
			),
			'Europe' => array (
				'Europe/Belfast' => 'Belfast +0:00',
				'Europe/Dublin' => 'Dublin +0:00',
				'Europe/Guernsey' => 'Guernsey +0:00',
				'Europe/Isle_of_Man' => 'Isle_of_Man +0:00',
				'Europe/Jersey' => 'Jersey +0:00',
				'Europe/Lisbon' => 'Lisbon +0:00',
				'Europe/London' => 'London +0:00',
				'Europe/Amsterdam' => 'Amsterdam +1:00',
				'Europe/Andorra' => 'Andorra +1:00',
				'Europe/Belgrade' => 'Belgrade +1:00',
				'Europe/Berlin' => 'Berlin +1:00',
				'Europe/Bratislava' => 'Bratislava +1:00',
				'Europe/Brussels' => 'Brussels +1:00',
				'Europe/Budapest' => 'Budapest +1:00',
				'Europe/Copenhagen' => 'Copenhagen +1:00',
				'Europe/Gibraltar' => 'Gibraltar +1:00',
				'Europe/Ljubljana' => 'Ljubljana +1:00',
				'Europe/Luxembourg' => 'Luxembourg +1:00',
				'Europe/Madrid' => 'Madrid +1:00',
				'Europe/Malta' => 'Malta +1:00',
				'Europe/Monaco' => 'Monaco +1:00',
				'Europe/Oslo' => 'Oslo +1:00',
				'Europe/Paris' => 'Paris +1:00',
				'Europe/Podgorica' => 'Podgorica +1:00',
				'Europe/Prague' => 'Prague +1:00',
				'Europe/Rome' => 'Rome +1:00',
				'Europe/San_Marino' => 'San_Marino +1:00',
				'Europe/Sarajevo' => 'Sarajevo +1:00',
				'Europe/Skopje' => 'Skopje +1:00',
				'Europe/Stockholm' => 'Stockholm +1:00',
				'Europe/Tirane' => 'Tirane +1:00',
				'Europe/Vaduz' => 'Vaduz +1:00',
				'Europe/Vatican' => 'Vatican +1:00',
				'Europe/Vienna' => 'Vienna +1:00',
				'Europe/Warsaw' => 'Warsaw +1:00',
				'Europe/Zagreb' => 'Zagreb +1:00',
				'Europe/Zurich' => 'Zurich +1:00',
				'Europe/Athens' => 'Athens +2:00',
				'Europe/Bucharest' => 'Bucharest +2:00',
				'Europe/Chisinau' => 'Chisinau +2:00',
				'Europe/Helsinki' => 'Helsinki +2:00',
				'Europe/Istanbul' => 'Istanbul +2:00',
				'Europe/Kaliningrad' => 'Kaliningrad +2:00',
				'Europe/Kiev' => 'Kiev +2:00',
				'Europe/Mariehamn' => 'Mariehamn +2:00',
				'Europe/Minsk' => 'Minsk +2:00',
				'Europe/Nicosia' => 'Nicosia +2:00',
				'Europe/Riga' => 'Riga +2:00',
				'Europe/Simferopol' => 'Simferopol +2:00',
				'Europe/Sofia' => 'Sofia +2:00',
				'Europe/Tallinn' => 'Tallinn +2:00',
				'Europe/Tiraspol' => 'Tiraspol +2:00',
				'Europe/Uzhgorod' => 'Uzhgorod +2:00',
				'Europe/Vilnius' => 'Vilnius +2:00',
				'Europe/Zaporozhye' => 'Zaporozhye +2:00',
				'Europe/Moscow' => 'Moscow +3:00',
				'Europe/Volgograd' => 'Volgograd +3:00',
				'Europe/Samara' => 'Samara +4:00',
			),
			'Arctic' => array (
				'Arctic/Longyearbyen' => 'Longyearbyen +1:00',
			),
			'Asia' => array (
				'Asia/Amman' => 'Amman +2:00',
				'Asia/Beirut' => 'Beirut +2:00',
				'Asia/Damascus' => 'Damascus +2:00',
				'Asia/Gaza' => 'Gaza +2:00',
				'Asia/Istanbul' => 'Istanbul +2:00',
				'Asia/Jerusalem' => 'Jerusalem +2:00',
				'Asia/Nicosia' => 'Nicosia +2:00',
				'Asia/Tel_Aviv' => 'Tel_Aviv +2:00',
				'Asia/Aden' => 'Aden +3:00',
				'Asia/Baghdad' => 'Baghdad +3:00',
				'Asia/Bahrain' => 'Bahrain +3:00',
				'Asia/Kuwait' => 'Kuwait +3:00',
				'Asia/Qatar' => 'Qatar +3:00',
				'Asia/Tehran' => 'Tehran +3:30',
				'Asia/Baku' => 'Baku +4:00',
				'Asia/Dubai' => 'Dubai +4:00',
				'Asia/Muscat' => 'Muscat +4:00',
				'Asia/Tbilisi' => 'Tbilisi +4:00',
				'Asia/Yerevan' => 'Yerevan +4:00',
				'Asia/Kabul' => 'Kabul +4:30',
				'Asia/Aqtau' => 'Aqtau +5:00',
				'Asia/Aqtobe' => 'Aqtobe +5:00',
				'Asia/Ashgabat' => 'Ashgabat +5:00',
				'Asia/Ashkhabad' => 'Ashkhabad +5:00',
				'Asia/Dushanbe' => 'Dushanbe +5:00',
				'Asia/Karachi' => 'Karachi +5:00',
				'Asia/Oral' => 'Oral +5:00',
				'Asia/Samarkand' => 'Samarkand +5:00',
				'Asia/Tashkent' => 'Tashkent +5:00',
				'Asia/Yekaterinburg' => 'Yekaterinburg +5:00',
				'Asia/Calcutta' => 'Calcutta +5:30',
				'Asia/Colombo' => 'Colombo +5:30',
				'Asia/Kolkata' => 'Kolkata +5:30',
				'Asia/Katmandu' => 'Katmandu +5:45',
				'Asia/Almaty' => 'Almaty +6:00',
				'Asia/Bishkek' => 'Bishkek +6:00',
				'Asia/Dacca' => 'Dacca +6:00',
				'Asia/Dhaka' => 'Dhaka +6:00',
				'Asia/Novosibirsk' => 'Novosibirsk +6:00',
				'Asia/Omsk' => 'Omsk +6:00',
				'Asia/Qyzylorda' => 'Qyzylorda +6:00',
				'Asia/Thimbu' => 'Thimbu +6:00',
				'Asia/Thimphu' => 'Thimphu +6:00',
				'Asia/Rangoon' => 'Rangoon +6:30',
				'Asia/Bangkok' => 'Bangkok +7:00',
				'Asia/Ho_Chi_Minh' => 'Ho_Chi_Minh +7:00',
				'Asia/Hovd' => 'Hovd +7:00',
				'Asia/Jakarta' => 'Jakarta +7:00',
				'Asia/Krasnoyarsk' => 'Krasnoyarsk +7:00',
				'Asia/Phnom_Penh' => 'Phnom_Penh +7:00',
				'Asia/Pontianak' => 'Pontianak +7:00',
				'Asia/Saigon' => 'Saigon +7:00',
				'Asia/Vientiane' => 'Vientiane +7:00',
				'Asia/Brunei' => 'Brunei +8:00',
				'Asia/Choibalsan' => 'Choibalsan +8:00',
				'Asia/Chongqing' => 'Chongqing +8:00',
				'Asia/Chungking' => 'Chungking +8:00',
				'Asia/Harbin' => 'Harbin +8:00',
				'Asia/Hong_Kong' => 'Hong_Kong +8:00',
				'Asia/Irkutsk' => 'Irkutsk +8:00',
				'Asia/Kashgar' => 'Kashgar +8:00',
				'Asia/Kuala_Lumpur' => 'Kuala_Lumpur +8:00',
				'Asia/Kuching' => 'Kuching +8:00',
				'Asia/Macao' => 'Macao +8:00',
				'Asia/Macau' => 'Macau +8:00',
				'Asia/Makassar' => 'Makassar +8:00',
				'Asia/Manila' => 'Manila +8:00',
				'Asia/Shanghai' => 'Shanghai +8:00',
				'Asia/Singapore' => 'Singapore +8:00',
				'Asia/Taipei' => 'Taipei +8:00',
				'Asia/Ujung_Pandang' => 'Ujung_Pandang +8:00',
				'Asia/Ulaanbaatar' => 'Ulaanbaatar +8:00',
				'Asia/Ulan_Bator' => 'Ulan_Bator +8:00',
				'Asia/Urumqi' => 'Urumqi +8:00',
				'Asia/Dili' => 'Dili +9:00',
				'Asia/Jayapura' => 'Jayapura +9:00',
				'Asia/Pyongyang' => 'Pyongyang +9:00',
				'Asia/Seoul' => 'Seoul +9:00',
				'Asia/Tokyo' => 'Tokyo +9:00',
				'Asia/Yakutsk' => 'Yakutsk +9:00',
				'Asia/Sakhalin' => 'Sakhalin +10:00',
				'Asia/Vladivostok' => 'Vladivostok +10:00',
				'Asia/Magadan' => 'Magadan +11:00',
				'Asia/Anadyr' => 'Anadyr +12:00',
				'Asia/Kamchatka' => 'Kamchatka +12:00',
			),
			'Indian' => array (
				'Indian/Antananarivo' => 'Antananarivo +3:00',
				'Indian/Comoro' => 'Comoro +3:00',
				'Indian/Mayotte' => 'Mayotte +3:00',
				'Indian/Mahe' => 'Mahe +4:00',
				'Indian/Mauritius' => 'Mauritius +4:00',
				'Indian/Reunion' => 'Reunion +4:00',
				'Indian/Kerguelen' => 'Kerguelen +5:00',
				'Indian/Maldives' => 'Maldives +5:00',
				'Indian/Chagos' => 'Chagos +6:00',
				'Indian/Cocos' => 'Cocos +6:30',
				'Indian/Christmas' => 'Christmas +7:00',
			),
			'Australia' => array (
				'Australia/Perth' => 'Perth +8:00',
				'Australia/West' => 'West +8:00',
				'Australia/Eucla' => 'Eucla +8:45',
				'Australia/Adelaide' => 'Adelaide +9:30',
				'Australia/Broken_Hill' => 'Broken_Hill +9:30',
				'Australia/Darwin' => 'Darwin +9:30',
				'Australia/North' => 'North +9:30',
				'Australia/South' => 'South +9:30',
				'Australia/Yancowinna' => 'Yancowinna +9:30',
				'Australia/ACT' => 'ACT +10:00',
				'Australia/Brisbane' => 'Brisbane +10:00',
				'Australia/Canberra' => 'Canberra +10:00',
				'Australia/Currie' => 'Currie +10:00',
				'Australia/Hobart' => 'Hobart +10:00',
				'Australia/Lindeman' => 'Lindeman +10:00',
				'Australia/Melbourne' => 'Melbourne +10:00',
				'Australia/NSW' => 'NSW +10:00',
				'Australia/Queensland' => 'Queensland +10:00',
				'Australia/Sydney' => 'Sydney +10:00',
				'Australia/Tasmania' => 'Tasmania +10:00',
				'Australia/Victoria' => 'Victoria +10:00',
				'Australia/LHI' => 'LHI +10:30',
				'Australia/Lord_Howe' => 'Lord_Howe +10:30',
			),
		);

		return($timezones);	
	}
}
}