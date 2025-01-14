<?php 
/* 
 * dic.inc.php
 *                                       __       HZKnight free PHP Scripts    _    vs 5.1
 *                                      / _| __ _ _ __   /\ /\___  _   _ _ __ | |_ ___ _ __
 *                                     | |_ / _` | '_ \ / //_/ _ \| | | | '_ \| __/ _ \ '__|
 *                                     |  _| (_| | | | / __ \ (_) | |_| | | | | ||  __/ |
 *                                     |_|  \__,_|_| |_\/  \/\___/ \__,_|_| |_|\__\___|_|
 *
 *                                           lucliscio <lucliscio@h0model.org>, ITALY
 *
 * -------------------------------------------------------------------------------------------
 * Documentazione di riferimento
 * -------------------------------------------------------------------------------------------
 * license.txt - le condizioni di utilizzo, modifica e redistribuzione per l'utente finale
 *  manual.txt - la guida alla configurazione, all'installazione e all'uso dello script
 *    faqs.txt - le risposte alle domande più comuni, sui problemi e sulle funzionalità
 * history.txt - la progressione delle versioni, i miglioramenti apportati e i bugs eliminati
 *
 * -------------------------------------------------------------------------------------------
 * Licence
 * -------------------------------------------------------------------------------------------
 * Copyright (C)2022  HZKnight
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/agpl-3.0.html>.
 */

/**
 * Modulo importato per il riconoscimento delle proprietà di un visitatore.
 * 
 *  @author  lucliscio <lucliscio@h0model.org>
 *  @version v 5.1
 *  @copyright Copyright 2022 HZKnight
 *  @copyright Copyright 2003 Fanatiko 
 *  @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
 *   
 *  @package fanKounter
 *  @filesource
 */

############################################################################################
# BROWSER
############################################################################################

$inf__browser = array(
 "/^.*amaya\/(\d+)\..*$/i"                              => "Amaya \\1.x",
 "/^.*aol\/(\d+)\..*$/i"                                => "AOL \\1.x",
 "/^.*amiga(-aweb|voyager)\/(\d+)\..*$/i"               => "AWeb \\2.x",
 "/^.*crazy browser (\d+)\..*$/i"                       => "Crazy Browser \\1.x",
 "/^.*emacs\/w3\/(\d+)\..*$/i"                          => "Emacs/W3 \\1.x",
 "/^.*frontpage( express)? (\d+)\..*$/i"                => "FrontPage \\2.x",
 "/^.*galeon\/(\d+)\..*$/i"                             => "Galeon \\1.x",
 "/^.*ibrowse\/(\d+)\..*$/i"                            => "IBrowse \\1.x",
 "/^.*icab[\/ ](\d+)\..*$/i"                            => "iCab \\1.x",
 "/^.*mozilla\/5\.0.*firefox\/(\d+)\..*$/i"             => "Mozilla Firefox \\1.x",
 "/^.*opera[\/ ](\d+)\..*$/i"                           => "Opera \\1.x",
 "/^.*microsoft pocket internet explorer\/(\d+)\..*$/i" => "Pocket IE \\1.x",
 "/^.*mspie (\d+)\..*$/i"                               => "Pocket IE \\1.x",
 "/^.*msie (\d+)\..*win(dows)? ?ce.*$/i"                => "Pocket IE \\1.x",
 "/^.*msie (\d+)\..*$/i"                                => "Internet Explorer \\1.x",
 "/^.*konqueror\/(\d+)\..*$/i"                          => "Konqueror \\1.x",
 "/^.*liberate DTV (\d+)\..*$/i"                        => "Liberate TV Nav. \\1.x",
 "/^.*multizilla\/v(\d+)\..*$/i"                        => "MultiZilla \\1.x",
 "/^.*netscape6?\/(\d+)\..*$/i"                         => "Netscape \\1.x",
 "/^.*omniweb\/(\d+)\..*$/i"                            => "OmniWeb \\1.x",
 "/^.*webtv\/(\d+)\..*$/i"                              => "WebTV \\1.x"
);

############################################################################################
# OS
############################################################################################

$inf__os = array(
 "/^.*win(dows)? ?nt ?6.1.*$/i"                  => "Windows 7",
 "/^.*win(dows)? ?nt ?6.2.*$/i"                  => "Windows 8",
 "/^.*win(dows)? ?nt ?6.3.*$/i"                  => "Windows 8.1",
 "/^.*win(dows)? ?nt ?10.0.*$/i"                 => "Windows 10",
 "/^.*android.*$/i"                              => "Android",
 "/^.*win(dows)? ?(16|3\.1).*$/i"                => "Windows (16-bit)",
 "/^.*win(dows)? ?95.*$/i"                       => "Windows 95",
 "/^.*win(dows)? ?(me|9x ?4\.90).*$/i"           => "Windows ME",
 "/^.*win(dows)? ?98.*$/i"                       => "Windows 98",
 "/^.*win(dows)? ?ce.*$/i"                       => "Windows CE",
 "/^.*microsoft pocket internet explorer\/.*$/i" => "Windows CE",
 "/^.*win(dows)? ?(2000|5\.0|nt ?5\.0).*$/i"     => "Windows 2000",
 "/^.*win(dows)? ?(xp|5\.1|nt ?5\.1).*$/i"       => "Windows XP",
 "/^.*win(dows)? ?(5\.2|nt ?5\.2).*$/i"          => "Windows 2003 Server",
 "/^.*win(dows)? ?nt ?6\.0.*$/i"                 => "Windows Vista",
 "/^.*win(dows)? ?(nt|4\.0|nt ?4\.0).*$/i"       => "Windows NT",
 "/^.*(ppc)? ?mac[_ ]?os ?x.*$/i"                => "MacOS PPC",
 "/^.*mac.*(ppc|power ?pc).*$/i"                 => "MacOS PPC",
 "/^.*mac.*(68k|68000).*$/i"                     => "MacOS 68K",
 "/^.*os\/2.*$/i"                                => "OS/2",
 "/^.*linux.*$/i"                                => "Linux",
 "/^.*unix.*$/i"                                 => "Unix",
 "/^.*amiga.*$/i"                                => "AmigaOS",
 "/^.*ibrowse\/.*$/i"                            => "AmigaOS",
 "/^.*liberate DTV.*$/i"                         => "Liberate TV Nav.",
 "/^.*webtv\/.*$/i"                              => "WebTV",
 "/^.*emacs\/w3\/.*unix.*$/i"                    => "Unix",
 "/^.*emacs\/w3\/.*x11.*$/i"                     => "Linux",
 "/^.*galeon\/.*x11.*$/i"                        => "Linux",
 "/^.*konqueror.*(linux|x11).*$/i"               => "Linux",
 "/^.*konqueror.*$/i"                            => "Unix"
);

############################################################################################
# MOTORI DI RICERCA
############################################################################################

$inf__engine = array(
 "abacho"      => "(q)",
 "abcitaly"    => "(look_for)",
 "altavista"   => "(q|aqa|aqp|aqo)",
 "aol"         => "(query)",
 "clarence"    => "(q)",
 "excite"      => "(q|qkw)",
 "godado"      => "(keywords)",
 "google"      => "(q|as_q|as_epq|as_oq)",
 "iltrovatore" => "(q|iq|xq)",
 "italyseek"   => "(query)",
 "hotbot"      => "(query)",
 "ilmotore"    => "(query)",
 "jumpy"       => "(searchword)",
 "kataweb"     => "(q)",
 "libero"      => "(query|testo_and|testo_or)",
 "lycos"       => "(query|ps1|ps2)",
 "msn"         => "(q|mt)",
 "netscape"    => "(query)",
 "sharelook"   => "(keyword)",
 "simpatico"   => "(search|text)",
 "supereva"    => "(q)",
 "tiscali"     => "(key)",
 "tuttogratis" => "(keywords)",
 "virgilio"    => "(qs)",
 "yahoo"       => "(p|va|vp|vo)"
);

############################################################################################
# CHIAVI DI RICERCA
############################################################################################

define("KEYLEN", 2);

$inf__keyban = array(
 "gli",
 "uno","una",
 "del","dell","dello","della","dei","degli","delle",
 "all","allo","alla","agli","alle",
 "dal","dall","dallo","dalla","dai","dagli","dalle",
 "nel","nell","nello","nella","nei","negli","nelle",
 "con","col","coll","coi",
 "sul","sull","sullo","sulla","sui","sugli","sulle",
 "per",
 "tra",
 "fra",
 "and","for","not","the"
);

############################################################################################
# STATI
############################################################################################

$inf__country = array(
 "ac" => "Isola dell'Ascensione",
 "ad" => "Andorra",
 "ae" => "Emirati Arabi Uniti",
 "af" => "Afghanistan",
 "ag" => "Antigua e Barbuda",
 "ai" => "Anguilla",
 "al" => "Albania",
 "am" => "Armenia",
 "an" => "Antille Olandesi",
 "ao" => "Angola",
 "aq" => "Antartide",
 "ar" => "Argentina",
 "as" => "Isole Samoa Americane",
 "at" => "Austria",
 "au" => "Australia",
 "aw" => "Aruba",
 "az" => "Azerbaigian",
 "ba" => "Bosnia Erzegovina",
 "bb" => "Isole Barbados",
 "bd" => "Bangladesh",
 "be" => "Belgio",
 "bf" => "Burkina Faso",
 "bg" => "Bulgaria",
 "bh" => "Bahrein",
 "bi" => "Burundi",
 "bj" => "Benin",
 "bm" => "Isole Bermuda",
 "bn" => "Brunei Darussalam",
 "bo" => "Bolivia",
 "br" => "Brasile",
 "bs" => "Isole Bahamas ",
 "bt" => "Bhutan",
 "bv" => "Isola Bouvet",
 "bw" => "Botswana",
 "by" => "Bielorussia",
 "bz" => "Belize",
 "ca" => "Canada",
 "cc" => "Isole Cocos",
 "cd" => "Repubblica Democratica del Congo",
 "cf" => "Repubblica Centrafricana",
 "cg" => "Repubblica del Congo",
 "ch" => "Svizzera",
 "ci" => "Costa d'Avorio",
 "ck" => "Isole Cook",
 "cl" => "Cile",
 "cm" => "Camerun",
 "cn" => "Cina",
 "co" => "Colombia",
 "cr" => "Costa Rica",
 "cu" => "Cuba",
 "cv" => "Capo Verde",
 "cx" => "Christmas Island",
 "cy" => "Cipro",
 "cz" => "Repubblica Ceca",
 "de" => "Germania",
 "dj" => "Gibuti",
 "dk" => "Danimarca",
 "dm" => "Dominica",
 "do" => "Repubblica Dominicana",
 "dz" => "Algeria",
 "ec" => "Ecuador",
 "ee" => "Estonia",
 "eg" => "Egitto",
 "eh" => "Sahara Occidentale",
 "er" => "Eritrea",
 "es" => "Spagna",
 "et" => "Etiopia",
 "fi" => "Finlandia",
 "fj" => "Isole Figi",
 "fk" => "Isole Falkland",
 "fm" => "Micronesia",
 "fo" => "Isole Faroer",
 "fr" => "Francia",
 "ga" => "Gabon",
 "gd" => "Grenada",
 "ge" => "Georgia",
 "gf" => "Guyana Francese",
 "gg" => "Guernsey",
 "gh" => "Ghana",
 "gi" => "Gibilterra",
 "gl" => "Groenlandia",
 "gm" => "Gambia",
 "gn" => "Guinea",
 "gp" => "Guadalupa",
 "gq" => "Guinea Equatoriale",
 "gr" => "Grecia",
 "gs" => "Isole Georgia Meridionale e Sandwich Meridionale",
 "gt" => "Guatemala",
 "gu" => "Guam",
 "gw" => "Guinea Bissau",
 "gy" => "Guyana",
 "hk" => "Hong Kong",
 "hm" => "Isole Heard e McDonald",
 "hn" => "Honduras",
 "hr" => "Croazia",
 "ht" => "Haiti",
 "hu" => "Ungheria",
 "id" => "Indonesia",
 "ie" => "Irlanda",
 "il" => "Israele",
 "im" => "Isola di Man",
 "in" => "India",
 "io" => "Territori Britannici nell'Oceano Indiano",
 "iq" => "Iraq",
 "ir" => "Iran",
 "is" => "Islanda",
 "it" => "Italia",
 "je" => "Jersey",
 "jm" => "Giamaica",
 "jo" => "Giordania",
 "jp" => "Giappone",
 "ke" => "Kenya",
 "kg" => "Kirghistan",
 "kh" => "Cambogia",
 "ki" => "Kiribati",
 "km" => "Comoros",
 "kn" => "Saint Kitts e Nevis",
 "kp" => "Corea del Nord",
 "kr" => "Corea del Sud",
 "kw" => "Kuwait",
 "ky" => "Isole Caiman",
 "kz" => "Kazakistan",
 "la" => "Laos",
 "lb" => "Libano",
 "lc" => "Saint Lucia",
 "li" => "Liechtenstein",
 "lk" => "Sri Lanka",
 "lr" => "Liberia",
 "ls" => "Lesotho",
 "lt" => "Lituania",
 "lu" => "Lussemburgo",
 "lv" => "Lettonia",
 "ly" => "Libia",
 "ma" => "Morocco",
 "mc" => "Monaco",
 "dm" => "Moldavia",
 "mg" => "Madagascar",
 "mh" => "Isole Marshall",
 "mk" => "Macedonia",
 "ml" => "Mali",
 "mm" => "Myanmar",
 "mn" => "Mongolia",
 "mo" => "Macao",
 "mp" => "Isole Marianne settentrionali",
 "mq" => "Martinica",
 "mr" => "Mauritania",
 "ms" => "Montserrat",
 "mt" => "Malta",
 "mu" => "Isole Mauritius",
 "mv" => "Isole Maldive",
 "mw" => "Malawi",
 "mx" => "Messico",
 "my" => "Malaysia",
 "mz" => "Mozambico",
 "na" => "Namibia",
 "nc" => "Nuova Caledonia",
 "ne" => "Niger",
 "nf" => "Isole Norfolk",
 "ng" => "Nigeria",
 "ni" => "Nicaragua",
 "nl" => "Olanda",
 "no" => "Norvegia",
 "np" => "Nepal",
 "nr" => "Nauru",
 "nu" => "Isola Niue",
 "nz" => "Nuova Zelanda",
 "om" => "Oman",
 "pa" => "Panama",
 "pe" => "Per&ugrave;",
 "pf" => "Polinesia Francese",
 "pg" => "Papua - Nuova Guinea",
 "ph" => "Filippine",
 "pk" => "Pakistan",
 "pl" => "Polonia",
 "pm" => "Saint Pierre e Miquelon",
 "pn" => "Isola Pitcairn",
 "pr" => "Portorico",
 "ps" => "Territori Palestinesi",
 "pt" => "Portogallo",
 "pw" => "Palau",
 "py" => "Paraguay",
 "qa" => "Qatar",
 "re" => "Isole Reunion",
 "ro" => "Romania",
 "ru" => "Russia",
 "rw" => "Ruanda",
 "sa" => "Arabia Saudita",
 "sb" => "Isole Salomone",
 "sc" => "Isole Seychelles",
 "sd" => "Sudan",
 "se" => "Svezia",
 "sg" => "Singapore",
 "sh" => "Saint Helena",
 "si" => "Slovenia",
 "sj" => "Isole Svalbard e Jan Mayen",
 "sk" => "Slovacchia",
 "sl" => "Sierra Leone",
 "sm" => "San Marino",
 "sn" => "Senegal",
 "so" => "Somalia",
 "sr" => "Suriname",
 "st" => "Sao Tom&egrave; e Principe",
 "sv" => "El Salvador",
 "sy" => "Siria",
 "sz" => "Swaziland",
 "tc" => "Isole Turks e Caicos",
 "td" => "Ciad",
 "tf" => "Territorio Meridionale Francese",
 "tg" => "Togo",
 "th" => "Thailandia",
 "tj" => "Tagikistan",
 "tk" => "Isole Tokelau",
 "tm" => "Turkmenistan",
 "tn" => "Tunisia",
 "to" => "Isole Tonga",
 "tp" => "Timor Orientale",
 "tr" => "Turchia",
 "tt" => "Trinidad e Tobago",
 "tv" => "Tuvalu",
 "tw" => "Taiwan",
 "tz" => "Tanzania",
 "ua" => "Ucraina",
 "ug" => "Uganda",
 "uk" => "Regno Unito",
 "um" => "Isole Minori degli Stati Uniti",
 "us" => "Stati Uniti",
 "uy" => "Uruguay",
 "uz" => "Uzbekistan",
 "va" => "Citt&agrave; del Vaticano",
 "vc" => "Saint Vincent e Grenadine",
 "ve" => "Venezuela",
 "vg" => "Isole Vergini Britanniche",
 "vi" => "Isole Vergini Statunitensi",
 "vn" => "Vietnam",
 "vu" => "Vanuatu",
 "wf" => "Isole Wallis e Futuna",
 "ws" => "Samoa",
 "ye" => "Yemen",
 "yt" => "Mayotte",
 "yu" => "Yugoslavia",
 "za" => "Sud Africa",
 "zm" => "Zambia",
 "zw" => "Zimbabwe"
);

############################################################################################

?>