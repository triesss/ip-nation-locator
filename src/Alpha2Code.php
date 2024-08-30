<?php

namespace Triesss\IpNationLocator;

use ReflectionClass;

/**
 * Country Iso3166 Alpha2 codes
 */
interface Alpha2Code
{
    const AFGHANISTAN = 'AF';

    const ALAND_ISLANDS = 'AX';

    const ALBANIA = 'AL';

    const ALGERIA = 'DZ';

    const AMERICAN_SAMOA = 'AS';

    const ANDORRA = 'AD';

    const ANGOLA = 'AO';

    const ANGUILLA = 'AI';

    const ANTARCTICA = 'AQ';

    const ANTIGUA_AND_BARBUDA = 'AG';

    const ARGENTINA = 'AR';

    const ARMENIA = 'AM';

    const ARUBA = 'AW';

    const AUSTRALIA = 'AU';

    const AUSTRIA = 'AT';

    const AZERBAIJAN = 'AZ';

    const BAHAMAS_THE = 'BS';

    const BAHRAIN = 'BH';

    const BANGLADESH = 'BD';

    const BARBADOS = 'BB';

    const BELARUS = 'BY';

    const BELGIUM = 'BE';

    const BELIZE = 'BZ';

    const BENIN = 'BJ';

    const BERMUDA = 'BM';

    const BHUTAN = 'BT';

    const BOLIVIA_PLURINATIONAL_STATE_OF = 'BO';

    const BONAIRE_SINT_EUSTATIUS_AND_SABA = 'BQ';

    const BOSNIA_AND_HERZEGOVINA = 'BA';

    const BOTSWANA = 'BW';

    const BOUVET_ISLAND = 'BV';

    const BRAZIL = 'BR';

    const BRITISH_INDIAN_OCEAN_TERRITORY_THE = 'IO';

    const BRUNEI_DARUSSALAM = 'BN';

    const BULGARIA = 'BG';

    const BURKINA_FASO = 'BF';

    const BURUNDI = 'BI';

    const CABO_VERDE = 'CV';

    const CAMBODIA = 'KH';

    const CAMEROON = 'CM';

    const CANADA = 'CA';

    const CAYMAN_ISLANDS_THE = 'KY';

    const CENTRAL_AFRICAN_REPUBLIC_THE = 'CF';

    const CHAD = 'TD';

    const CHILE = 'CL';

    const CHINA = 'CN';

    const CHRISTMAS_ISLAND = 'CX';

    const COCOS_KEELING_ISLANDS_THE = 'CC';

    const COLOMBIA = 'CO';

    const COMOROS_THE = 'KM';

    const CONGO_THE_DEMOCRATIC_REPUBLIC_OF_THE = 'CD';

    const CONGO_THE = 'CG';

    const COOK_ISLANDS_THE = 'CK';

    const COSTA_RICA = 'CR';

    const CROATIA = 'HR';

    const CUBA = 'CU';

    const CURACAO = 'CW';

    const CYPRUS = 'CY';

    const CZECHIA = 'CZ';

    const COTE_D_IVOIRE = 'CI';

    const DENMARK = 'DK';

    const DJIBOUTI = 'DJ';

    const DOMINICA = 'DM';

    const DOMINICAN_REPUBLIC_THE = 'DO';

    const ECUADOR = 'EC';

    const EGYPT = 'EG';

    const EL_SALVADOR = 'SV';

    const EQUATORIAL_GUINEA = 'GQ';

    const ERITREA = 'ER';

    const ESTONIA = 'EE';

    const ESWATINI = 'SZ';

    const ETHIOPIA = 'ET';

    const FALKLAND_ISLANDS_THE = 'FK';

    const FAROE_ISLANDS_THE = 'FO';

    const FIJI = 'FJ';

    const FINLAND = 'FI';

    const FRANCE = 'FR';

    const FRENCH_GUYANA = 'GF';

    const FRENCH_POLYNESIA = 'PF';

    const FRENCH_SOUTHERN_TERRITORIES_THE = 'TF';

    const GABON = 'GA';

    const GAMBIA_THE = 'GM';

    const GEORGIA = 'GE';

    const GERMANY = 'DE';

    const GHANA = 'GH';

    const GIBRALTAR = 'GI';

    const GREECE = 'GR';

    const GREENLAND = 'GL';

    const GRENADA = 'GD';

    const GUADELOUPE = 'GP';

    const GUAM = 'GU';

    const GUATEMALA = 'GT';

    const GUERNSEY = 'GG';

    const GUINEA = 'GN';

    const GUINEA_BISSAU = 'GW';

    const GUYANA = 'GY';

    const HAITI = 'HT';

    const HEARD_ISLAND_AND_MCDONALD_ISLANDS = 'HM';

    const HOLY_SEE_THE = 'VA';

    const HONDURAS = 'HN';

    const HONG_KONG = 'HK';

    const HUNGARY = 'HU';

    const ICELAND = 'IS';

    const INDIA = 'IN';

    const INDONESIA = 'ID';

    const IRAN_ISLAMIC_REPUBLIC_OF = 'IR';

    const IRAQ = 'IQ';

    const IRELAND = 'IE';

    const ISLE_OF_MAN = 'IM';

    const ISRAEL = 'IL';

    const ITALY = 'IT';

    const JAMAICA = 'JM';

    const JAPAN = 'JP';

    const JORDAN = 'JO';

    const KAZAKHSTAN = 'KZ';

    const KENYA = 'KE';

    const KIRIBATI = 'KI';

    const KOREA_THE_DEMOCRATIC_PEOPLE_S_REPUBLIC_OF = 'KP';

    const KOREA_THE_REPUBLIC_OF = 'KR';

    const KUWAIT = 'KW';

    const KYRGYZSTAN = 'KG';

    const LAO_PEOPLE_S_DEMOCRATIC_REPUBLIC_THE = 'LA';

    const LATVIA = 'LV';

    const LEBANON = 'LB';

    const LESOTHO = 'LS';

    const LIBERIA = 'LR';

    const LIBYA = 'LY';

    const LIECHTENSTEIN = 'LI';

    const LITHUANIA = 'LT';

    const LUXEMBOURG = 'LU';

    const MACAO = 'MO';

    const MADAGASCAR = 'MG';

    const MALAWI = 'MW';

    const MALAYSIA = 'MY';

    const MALDIVES = 'MV';

    const MALI = 'ML';

    const MALTA = 'MT';

    const MARSHALL_ISLANDS_THE = 'MH';

    const MARTINIQUE = 'MQ';

    const MAURITANIA = 'MR';

    const MAURITIUS = 'MU';

    const MAYOTTE = 'YT';

    const MEXICO = 'MX';

    const MICRONESIA_FEDERATED_STATES_OF = 'FM';

    const MOLDOVA_THE_REPUBLIC_OF = 'MD';

    const MONACO = 'MC';

    const MONGOLIA = 'MN';

    const MONTENEGRO = 'ME';

    const MONTSERRAT = 'MS';

    const MOROCCO = 'MA';

    const MOZAMBIQUE = 'MZ';

    const MYANMAR = 'MM';

    const NAMIBIA = 'NA';

    const NAURU = 'NR';

    const NEPAL = 'NP';

    const NETHERLANDS_THE = 'NL';

    const NEW_CALEDONIA = 'NC';

    const NEW_ZEALAND = 'NZ';

    const NICARAGUA = 'NI';

    const NIGER_THE = 'NE';

    const NIGERIA = 'NG';

    const NIUE = 'NU';

    const NORFOLK_ISLAND = 'NF';

    const NORTHERN_MARIANA_ISLANDS_THE = 'MP';

    const NORTH_MACEDONIA = 'MK';

    const NORWAY = 'NO';

    const OMAN = 'OM';

    const PAKISTAN = 'PK';

    const PALAU = 'PW';

    const PALESTINE_STATE_OF = 'PS';

    const PANAMA = 'PA';

    const PAPUA_NEW_GUINEA = 'PG';

    const PARAGUAY = 'PY';

    const PERU = 'PE';

    const PHILIPPINES_THE = 'PH';

    const PITCAIRN = 'PN';

    const POLAND = 'PL';

    const PORTUGAL = 'PT';

    const PUERTO_RICO = 'PR';

    const QATAR = 'QA';

    const ROMANIA = 'RO';

    const RUSSIAN_FEDERATION_THE = 'RU';

    const RWANDA = 'RW';

    const REUNION = 'RE';

    const SAINT_BARTHELEMY = 'BL';

    const SAINT_HELENA_ASCENSION_AND_TRISTAN_DA_CUNHA = 'SH';

    const SAINT_KITTS_AND_NEVIS = 'KN';

    const SAINT_LUCIA = 'LC';

    const SAINT_MARTIN_FRENCH_PART = 'MF';

    const SAINT_PIERRE_AND_MIQUELON = 'PM';

    const SAINT_VINCENT_AND_THE_GRENADINES = 'VC';

    const SAMOA = 'WS';

    const SAN_MARINO = 'SM';

    const SAO_TOME_AND_PRINCIPE = 'ST';

    const SAUDIA_ARABIA = 'SA';

    const SENEGAL = 'SN';

    const SERBIA = 'RS';

    const SEYCHELLES = 'SC';

    const SIERRA_LEONE = 'SL';

    const SINGAPORE = 'SG';

    const SINT_MAARTEN_DUTCH_PART = 'SX';

    const SLOVAKIA = 'SK';

    const SLOVENIA = 'SI';

    const SOLOMON_ISLANDS = 'SB';

    const SOMALIA = 'SO';

    const SOUTH_AFRICA = 'ZA';

    const SOUTH_GEORGIA_AND_THE_SOUTH_SANDWICH_ISLANDS = 'GS';

    const SOUTH_SUDAN = 'SS';

    const SPAIN = 'ES';

    const SRI_LANKA = 'LK';

    const SUDAN_THE = 'SD';

    const SURINAME = 'SR';

    const SVALBARD_AND_JAN_MAYEN = 'SJ';

    const SWEDEN = 'SE';

    const SWITZERLAND = 'CH';

    const SYRIAN_ARAB_REPUBLIC_THE = 'SY';

    const TAIWAN_PROVINCE_OF_CHINA = 'TW';

    const TAJIKISTAN = 'TJ';

    const TANZANIA_THE_UNITED_REPUBLIC_OF = 'TZ';

    const THAILAND = 'TH';

    const TIMOR_LESTE = 'TL';

    const TOGO = 'TG';

    const TOKELAU = 'TK';

    const TONGA = 'TO';

    const TRINIDAD_AND_TOBAGO = 'TT';

    const TUNISIA = 'TN';

    const TURKEY = 'TR';

    const TURKMENISTAN = 'TM';

    const TUVALU = 'TV';

    const UGANDA = 'UG';

    const UKRAINE = 'UA';

    const UNITED_ARAB_EMIRATES_THE = 'AE';

    const UNITED_KINGDOM_OF_GREAT_BRITAIN_AND_NORTHERN_IRELAND_THE = 'GB';

    const UNITED_STATES_MINOR_OUTLYING_ISLANDS_THE = 'UM';

    const UNITED_SATES_OF_AMERICA_THE = 'US';

    const URUGUAY = 'UY';

    const UZBEKISTAN = 'UZ';

    const VANUATU = 'VU';

    const VENEZUELA_BOLIVARIAN_REPUBLIC_OF = 'VE';

    const VIET_NAM = 'VN';

    const VIRGIN_ISLANDS_BRITISH = 'VG';

    const WALLIS_AND_FUTUNA = 'WF';

    const WESTERN_SAHARA = 'EH';

    const YEMEN = 'YE';

    const ZAMBIA = 'ZM';

    const ZIMBABWE = 'ZW';
}