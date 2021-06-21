<?php

use App\Location;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $brgy = [];
        $provinces = [
            'Metro Manila'=>['Valenzuela City','Taguig','San Juan','Quezon City','Pateros','Pasig City','Pasay City','Paranaque City','Navotas','Muntinlupa City','Marikina City','Manila','Mandaluyong City','Malabon City','Makati City','Las Pinas City','Caloocan City'],

            'Ilocos Norte'=>['Vintar','Solsona','Sarrat','San Nicolas','Pinili','Piddig','Pasuquin','Paoay','Pagudpud','Nueva Era','Marcos','Laoag City','Dumalneg','Dingras','Currimao','Carasi','Burgos','Batac','Banna (Espiritu)','Bangui','Badoc','Bacarra','Adams'],
            'Ilocos Sur'=>['Vigan City','Tagudin','Suyo','Sugpon','Sinait','Sigay','Santo Domingo','Santiago','Santa Maria','Santa Lucia','Santa Cruz','Santa Catalina','Santa','San Vicente','San Juan (Lapog)','San Ildefonso','San Esteban','San Emilio','Salcedo (Baugen)','Quirino (Angkaki)','Narvacan','Nagbukel','Magsingal','Lidlidda','Gregorio Del Pilar (Concepcion)','Galimuyod','Cervantes','Caoayan','Candon City','Cabugao','Burgos','Bantay','Banayoyo','Alilem'],
            'La Union'=>['Tubao','Pugo','Sudipen','Santol','Santo Tomas','San Juan','San Gabriel','San Fernando City','Rosario','Naguilian','Luna','Caba','Burgos','Bauang','Bangar','Balaoan','Bagulin','Bacnotan','Aringay','Agoo'],
            'Pangasinan'=>['Villasis','Urdaneta City','Urbiztondo','Umingan','Tayug','Sual','Sison','Santo Tomas','Santa Maria','Santa Barbara','San Quintin','San Nicolas','San Manuel','San jacinto','San Fabian','San Carlos City','Pozorrubio','Natividad','Mapandan','Mangatarem','Mangaldan','Manaoag','Malasiqui','Mabini','Lingayen','Laoac','Labrador','Infanta','Dasol','Dagupan City','Calasiao','Burgos','Bugallon','Bolinao','Binmaley','Binalonan','Bayambang','Bautista','Basista','Bani','Asingan','Anda','Alcala','Alaminos City','Aguilar','Agno','Rosales','Balungao'],

            'Batanes'=>['Uyugan','Sabtang','Mahatao','Ivana','Itbayat','Basco'],
            'Cagayan'=>['Tuguegarao City','Tuao','Solana','Santo Nino (Faire)','Santa Teresita','Santa Praxedes','Santa Ana','Sanchez-Mira','Rizal','Piat','Penablanca','Pamplona','Lasam','Lal-Lo','Iguig','Gonzaga','Gattaran','Enrile','Claveria','Camalaniugan','Calayan','Buguey','Ballesteros','Baggao','Aparri','Amulung','Allacapan','Alcala','Abulug'],
            'Isabela'=>['Tumauini','Santo Tomas','Santiago City','Santa Maria','San Pablo','San Mateo','San Mariano','San Manuel','San Isidro','San Guillermo','San Agustin','Roxas','Reina Mercedes','Ramon','Quirino','Quezon','Palanan','Naguilian','Mallig','Maconacon','Luna','Jones','Ilagan','Gamu','Echague','Divilican','Dinapigue','Delfin Albano (Magsaysay)','Cordon','Cauayan City','Cabatuan','Cabagan','Burgos','Benito Soliven','Aurora','Angadanan','Alicia'],
            'Nueva Vizcaya'=>['Kasibu ','Alfonso Castañeda ','Villaverde ','Solano ','Santa Fe ','Quezon ','Kayapa ','Dupax Del Sur ','Dupax Del Norte ','Diadi ','Bayombong ','Bambang ','Bagabag ','Aritao ','Ambaguio '],
            'Quirino'=>['Saguday ','Nagtipunan ','Maddela ','Diffun ','Cabarroguis ','Aglipay '],

            'Aurora'=>['San Luis ','Maria Aurora ','Dipaculao ','Dingalan ','Dinalungan ','Dilasag ','Casiguran ','Baler '],
            'Bataan' =>['Samal ','Pilar ','Orion ','Orani ','Morong ','Mariveles ','Limay ','Hermosa ','Dinalupihan ','Balanga City ','Bagac ','Abucay '],
            'Bulacan'=>['Santa Maria ','San Rafael ','San Miguel ','San Jose Del Monte ','San Ildefonso ','Pulilan ','Plaridel ','Paombong ','Pandi ','Obando ','Norzagaray ','Meycauayan ','Marilao ','Malolos ','Hagonoy ','Guiguinto ','Dona Remedios Trinidad ','Calumpit ','Bustos ','Bulacan ','Bocaue ','Baliuag ','Balagtas ','Angat '],
            'Nueva Ecija'=>['Zaragosa ','Talugtog ','Talavera ','Santo Domingo ','Santa Rosa ','San Leonardo ','San Jose City ','San Isidro ','San Esteban ','San Antonio ','Rizal ','Quezon ','Penaranda ','Pantabangan ','Palayan City ','Nampicuan ','Munoz ','Lupao ','Llanera ','Licab ','Laur ','Jaen ','Guimba ','General Tinio ','General Mamerto Natividad ','Gapan ','Gabaldon ','Cuyapo ','Carranglan ','Cabiao ','Cabanatuan City ','Bongabon ','Aliaga '],
            'Pampanga'=>['Sasmoan (Sexmoan) ','Santo Tomas ','Santa Rita ','Santa Ana ','San Simon ','San Luis ','San Fernando City ','Porac ','Minalin ','Mexico ','Masantol ','Magalang ','Macabebe ','Mabalacat ','Lubao ','Guagua ','Floridablanca ','Candaba ','Bacolor ','Arayat ','Apalit ','Angeles City '],
            'Tarlac'=>['Moncada ','Victoria ','Tarlac City ','Santa Ignacia ','San Manuel ','San Jose ','San Clemente ','Ramos ','Pura ','Paniqui ','Mayantoc ','Lapaz ','Gerona ','Concepcion ','Capas ','Camiling ','Bamban ','Anao '],
            'Zambales'=>['Subic ','Santa Cruz ','San Narciso ','San Marcelino ','San Felipe ','San Antonio ','Palauig ','Olonggapo City ','Masinloc ','Iba ','Castillejos ','Candelaria ','Cabangan ','Botolan '],

            'Batangas'=>['Rosario ','Tuy ','Tingloy ','Taysan ','Tanauan City ','Talisay ','Taal ','Santo Tomas ','Santa Teresita ','San Pascual ','San Nicolas ','San Luis ','San Juan ','San Jose ','Padre Garcia ','Nasugbu ','Mataas Na Kahoy ','Malvar ','Mabini ','Lobo ','Lipa City ','Lian ','Lemery ','Laurel ','Ibaan ','Cuenca ','Calatagan ','Calaca ','Bauan ','Batangas City ','Balete ','Balayan ','Alitagtag ','Agoncillo '],
            'Cavite'=>['Trece Martires City ','Ternate ','Tanza ','Tagaytay City ','Silang ','Rosario ','Noveleta ','Naic ','Mendez (Mendez-Nunez) ','Maragondon ','Magallanes ','Kawit ','Indang ','Imus ','General Trias ','General Emilio Aguinaldo ','Gen. Mariano Alvarez ','Dasmarinas ','Cavite City ','Carmona ','Bacoor ','Amadeo ','Alfonso '],
            'Laguna'=>['Victoria ','Siniloan ','Santa Rosa ','Santa Maria ','Santa Cruz ','San Pedro ','San Pablo City ','Rizal ','Pila ','Pangil ','Pakil ','Pagsanjan ','Paete ','Nagcarlan ','Majayjay ','Magdalena ','Mabitac ','Lumban ','Luisiana ','Los Banos ','Liliw ','Kalayaan ','Famy ','Cavinti ','Calauan ','Calamba City ','Cabuyao ','Binan ','Bay ','Alaminos '],
            'Quezon'=>['Unisan ','Tiaong ','Tayabas ','Tagkawayan ','Sariaya ','San Narciso ','San Francisco (Aurora) ','San Antonio ','San Andres ','Sampaloc ','Real ','Quezon ','Polillo ','Plaridel ','Pitogo ','Perez ','Patnanungan ','Panukulan ','Pagbilao ','Padre Burgos ','Mulanay ','Mauban ','Macalelon ','Lucena City ','Lucban ','Lopez ','Jomalig ','Infanta ','Gumaca ','Guinayangan ','General Nakar ','General Luna ','Dolores ','Catanauan ','Candelaria ','Calauag ','Burdeos ','Buenavista ','Atimonan ','Alabat ','Agdangan '],
            'Rizal'=>['Teresa ','Taytay ','Tanay ','San Mateo ','Rodriguez (Montalban) ','Pililla ','Morong ','Jala-Jala ','Cardona ','Cainta ','Binangonan ','Baras ','Antipolo City ','Angono '],

            'Marinduque'=>['Torrijos ','Santa Cruz ','Mogpog ','Gasan ','Buenavista ','Boac '],
            'Occidental Mindoro'=>['Santa Cruz ','San Jose ','Sablayan ','Rizal ','Paluan ','Mamburao ','Magsaysay ','Lubang ','Looc ','Calintaan ','Abra de Ilog '],
            'Oriental Mindoro'=>['Victoria ','Socorro ','San Teodoro ','Roxas ','Puerto Galera ','Pola ','Pinamalayan ','Naujan ','Mansalay ','Gloria ','Calapan City ','Bulalacao (San Pedro) ','Bongabong ','Bansud ','Baco '],
            'Palawan'=>['Taytay ','Sofronio Espanola ','San Vicente ','Roxas ','Rizal (Marcos) ','Quezon ','Puerto Princesa City ','Narra ','Magsaysay ','Linapacan ','Kalayaan ','El Nido (Bacuit) ','Dumaran ','Cuyo ','Culion ','Coron ','Cagayancillo ','Busuanga ','Brookes Point ','Bataraza ','Balabac ','Araceli ','Agutaya ','Aborlan '],
            'Romblon'=>['Santa Maria ','Santa Fe ','San Jose ','San Andres ','San Agustin ','San Fernando ','Romblon ','Odiongan ','Magdiwang ','Looc ','Ferrol ','Corcuera ','Concepcion ','Calatrava ','Cajidiocan ','Banton ','Alcantara '],

            'Albay'=>['Tiwi ','Tabaco City ','Santo Domingo (Libog) ','Rapu-Rapu ','Polangui ','Pio Duran ','Oas ','Manito ','Malinao ','Malilipot ','Ligao City ','Libon ','Legazpi City ','Jovellar ','Guinobatan ','Daraga ','Camalig ','Bacacay '],
            'Camarines Norte'=>['Vinzons ','Talisay ','Santa Elena ','San Vicente ','San Lorenzo Ruiz (Imelda) ','Paracale ','Mercedes ','Labo ','Jose Panganiban ','Daet ','Capalonga ','Basud '],
            'Camarines Sur'=>['Cabusao ','Garchitorena ','Caramoan ','Calabanga ','Bombon ','Tinambac ','Tigaon ','Siruma ','Sipocot ','San Jose ','San Fernando ','Sagnay ','Ragay ','Presentacion (Parubcan) ','Pili ','Pasacao ','Pamplona ','Ocampo ','Naga City ','Nabua ','Minalabac ','Milaor ','Magarao ','Lupi ','Libmanan ','Lagonoy ','Iriga City ','Goa ','Gainza ','Del Gallego ','Canaman ','Camaligan ','Bula ','Buhi ','Bato ','Balatan ','Baao '],
            'Catanduanes'=>['Virac ','Viga ','San Miguel ','San Andres (Calolbon) ','Panganiban ','Pandan ','Gigmoto ','Caramoran ','Bato ','Baras ','Bagamanoc '],
            'Masbate'=>['Uson ','San Pascual ','San Jacinto ','San Fernando ','Placer ','Pio V. Corpuz (Limbuhan) ','Palanas ','Monreal ','Mobo ','Milagros ','Masbate City (Capital) ','Mandaon ','Esperanza ','Dimasalang ','Claveria ','Cawayan ','Cataingan ','Batuan ','Balud ','Baleno ','Aroroy '],
            'Sorsogon'=>['Barcelona ','Sorsogon City ','Santa Magdalena ','Prieto Diaz ','Pilar ','Matnog ','Magallanes ','Juban ','Irosin ','Gubat ','Donsol ','Castilla ','Casiguran ','Bulusan ','Bulan '],

            'Aklan'=>['Tangalan ','Numancia ','New Washington ','Nabas ','Malinao ','Malay ','Makato ','Madalag ','Libacao ','Lezo ','Ibajay ','Buruanga ','Batan ','Banga ','Balete ','Altavas ','Kalibo '],
            'Antique'=>['Valderrama ','Tobias Fornier (Dao) ','Tibiao ','Sibalom ','Sebaste ','San Remigio ','San Jose ','Patnongon ','Pandan ','Libertad ','Laua-An ','Hamtic ','Culasi ','Caluya ','Bugasong ','Belison ','Barbaza ','Anini-Y '],
            'Capiz'=>['Tapaz ','Sigma ','Sapi-An ','Roxas City (Capital) ','President Roxas ','Pontevedra ','Pilar ','Panitan ','Panay ','Mambusao ','Ma-Ayon ','Jamindan ','Ivisan ','Dumarao ','Dumalag ','Dao ','Cuartero '],
            'Guimaras'=>['Sibunag ','San Lorenzo ','Nueva Valencia ','Jordan ','Buenavista '],
            'IloIlo'=>['Zarraga ','Tubungan ','Tigbauan ','Sara ','Santa Barbara ','San Rafael ','San Miguel ','San Joaquin ','San Enrique ','San Dionisio ','Pototan ','Pavia ','Passi City ','Oton ','New Lucena ','Mina ','Miagao ','Maasin ','Leon ','Lemery ','Leganes ','Lambunao ','Janiuay ','Iloilo City ','Igbaras ','Guimbal ','Estancia ','Dumangas ','Duenas ','Dingle ','Concepcion ','Carles ','Calinog ','Cabatuan ','Bingawan ','Batad ','Barotac Viejo ','Barotac Nuevo ','Banate ','Balasan ','Badiangan ','Anilao ','Alimodian ','Ajuy '],
            'Negros Occidental'=>['Sipalay ','Victorias City ','Valladolid ','Toboso ','Talisay City ','Silay City ','San Enrique ','San Carlos City ','Salvador Benedicto ','Sagay City ','Pulupandan ','Pontevedra ','Murcia ','Moises Padilla (Magallon) ','Manapla ','La Castellana ','La Carlota City ','Kabankalan City ','Isabela ','Ilog ','Hinoba-An ','Hinigaran ','Himamaylan City ','Escalante City ','Enrique B. Magalona (Saravia) ','Cauayan ','Candoni ','Calatrava ','Cadiz City ','Binalbagan ','Bago City ','Bacolod City '],

            'Bohol'=>['Valencia ','Ubay ','Tubigon ','Trinidad ','Talibon ','Tagbilaran City ','Sikatuna ','Sierra Bullones ','Sevilla ','San Miguel ','San Isidro ','Sagbayan (Borja) ','Pres. Carlos P. Garcia ','Pilar ','Panglao ','Maribojoc ','Mabini ','Loon ','Loboc ','Loay ','Lila ','Jetafe ','Jagna ','Inabanga ','Guindulman ','Garcia Hernandez ','Duero ','Dimiao ','Dauis ','Danao ','Dagohoy ','Cortes ','Corella ','Clarin ','Catigbian ','Carmen ','Candijay ','Calape ','Buenavista ','Bilar ','Bien Unido ','Batuan ','Balilihan ','Baclayon ','Antequera ','Anda ','Alicia ','Albuquerque '],
            'Cebu'=>['Toledo City ','Tudela ','Tuburan ','Talisay City ','Tabuelan ','Tabogon ','Sogod ','Sibonga ','Santander ','Santa Fe ','San Remigio ','San Francisco ','San Fernando ','Samboan ','Ronda ','Poro ','Pinamungahan ','Pilar ','Oslob ','Naga ','Moalboal ','Minglanilla ','Medellin ','Mandaue City ','Malabuyoc ','Madridejos ','Liloan ','Lapu-Lapu City ','Ginatilan ','Dumanjug ','Danao City ','Dalaguete ','Daanbantayan ','Cordova ','Consolacion ','Compostela ','Catmon ','Carmen ','Carcar ','Borbon ','Boljoon ','Bogo ','Barili ','Bantayan ','Balamban ','Badian ','Asturias ','Argao ','Aloguinsan ','Alegria ','Alcoy ','Alcantara ','Cebu City '],
            'Negros Oriental'=>['Tanjay City ','Dumaguete City ','Canlaon City ','Bais City ','Zamboanguita ','Vallehermoso ','Valencia (Luzurrizga) ','Tayasan ','Sibulan ','Siaton ','Santa Catalina ','San Jose ','Pamplona ','Manjuyod ','Mabinay ','La Libertad ','Jimalalud ','Guihulngan ','Dauin ','Bindoy (Payabon) ','Bayawan City (Tulong) ','Basay ','Bacong ','Ayungon ','Amlan (Ayuquitan) '],
            'Siquijor'=>['Siquijor ','San Juan ','Maria ','Lazi ','Larena ','Enrique Villanueva '],

            'Biliran'=>['Naval ','Maripipi ','Kawayan ','Culaba ','Caibiran ','Cabucgayan ','Biliran ','Almeria '],
            'Eastern Samar'=>['Taft ','Sulat ','San Policarpo ','San Julian ','Salcedo ','Quinapondan ','Oras ','Mercedes ','Maydolong ','Maslog ','Llorente ','Lawaan ','Jipapad ','Hernani ','Guiuan ','Giporlos ','General Mac Arthur ','Dolores ','Can-Avid ','Borongan (Capital) ','Balangkayan ','Balangiga ','Arteche '],
            'Leyte'=>['Villaba ','Tunga ','Tolosa ','Tanauan ','Tacloban City ','Tabontabon ','Tabango ','Santa Fe ','San Miguel ','San Isidro ','Pastrana ','Palompon ','Palo ','Ormoc City ','Merida ','Mayorga ','Matalom ','Matag-Ob ','Mahaplag ','Macarthur ','Leyte ','La Paz ','Kananga ','Julita ','Javier (Bugho) ','Jaro ','Isabel ','Inopacan ','Hindang ','Hilongos ','Dulag ','Dagami ','Carigara ','Capoocan ','Calubian ','Burauen ','Baybay ','Bato ','Barugo ','Babatngon ','Albuera ','Alangalang ','Abuyog '],
            'Northern Samar'=>['Victoria ','Silvino Lobos ','San Vicente ','San Roque ','San Jose ','San Isidro ','San Antonio ','Rosario ','Pambujan ','Palapag ','Mondragon ','Mapanas ','Lope De Vega ','Lavezares ','Las Navas ','Lapinig ','Laoang ','Gamay ','Catubig ','Catarman ','Capul ','Bobon ','Biri ','Allen '],
            'Samar'=>['Calbayog ','Catbalogan ','Zumarraga ','Villareal ','Tarangnan ','Talalora ','Tagapul-an ','Santo Niño ','Santa Rita ','Santa Margarita ','San Sebastian ','San Jose De Buan ','San Jorge ','Pinabacdao ','Paranas (Wright) ','Pagsanghan ','Motiong ','Matuguinao ','Marabut ','Jiabong ','Hinabangan ','Gandara ','Daram ','Calbiga ','Basey ','Almagro '],
            'Southern Leyte'=>['Tomas Oppus ','Sogod ','Silago ','San Ricardo ','San Juan (Cabalian) ','San Francisco ','Saint Bernard ','Pintuyan ','Padre Burgos ','Malitbog ','Macrohon ','Maasin City ','Limasawa ','Liloan ','Libagon ','Hinundayan ','Hinunangan ','Bontoc ','Anahawan '],

            'Zamboanga del Norte'=>['Tampilisan ','Sirawai ','Siocon ','Sindangan ','Sibutad ','Sibuco ','Siayan ','Sergio Osmena Sr. ','Salug ','Rizal ','Pres. Manuel A. Roxas ','Polanco ','Pinan (New Pinan) ','Mutia ','Manukan ','Liloy ','Labason ','La Libertad ','Katipunan ','Kalawit ','Jose Dalman (Ponot) ','Gutalac ','Godod ','Dipolog City (Capital) ','Dapitan City ','Baliguian ','Bacungan '],
            'Zamboanga del Sur'=>['Dumalinao ','Zamboanga City ','Vincenzo A. Sagun ','Tukuran ','Tigbao ','Tambulig ','Tabina ','Sominot (Don Mariano Marcos) ','San Pablo ','San Miguel ','Ramon Magsaysay (Liargo) ','Pitogo ','Pagadian City (Capital) ','Molave ','Midsalip ','Margosatubig ','Mahayag ','Lapuyan ','Lakewood ','Labangan ','Kumalarang ','Josefina ','Guipos ','Dumingag ','Dinas ','Dimataling ','Bayog ','Aurora '],
            'Zamboanga Sibugay'=>['Tungawan ','Titay ','Talusan ','Siay ','Roseller Lim ','Payao ','Olutanga ','Naga ','Malangas ','Mabuhay ','Kabasalan ','Ipil ','Imelda ','Diplahan ','Buug ','Alicia '],

            'Bukidnon'=>['Valencia City ','Talakag ','Sumilao ','San Fernando ','Quezon ','Pangantucan ','Maramag ','Manolo Fortich ','Malitbog ','Malaybalay City (Capital) ','Libona ','Lantapan ','Kitaotao ','Kibawe ','Kalilangan ','Kadingilan ','Impasug-Ong ','Don Carlos ','Dangcagan ','Damulog ','Cabanglasan ','Baungon '],
            'Camiguin'=>['Sagay ','Mambajao ','Mahinog ','Guinsiliban ','Catarman '],
            'Lanao del Norte'=>['Tubod ','Tangcal ','Tagoloan ','Sultan Naga Dimaporo (Karomata) ','Sapad ','Salvador ','Poona Piagapo ','Pantar ','Pantao Ragat ','Nunungan ','Munai ','Matungao ','Maigo ','Magsaysay ','Linamon ','Lala ','Kolambugan ','Kauswagan ','Kapatagan ','Iligan City ','Baroy ','Baloi ','Bacolod '],
            'Misamis Occidental'=>['Tudela ','Tangub City ','Sinacaban ','Sapang Dalaga ','Plaridel ','Panaon ','Ozamis City ','Oroquieta City (Capital) ','Lopez Jaena ','Jimenez ','Don Victoriano Chiongbian ','Concepcion ','Clarin ','Calamba ','Bonifacio ','Baliangao ','Aloran '],
            'Misamis Orriental'=>['Villanueva ','Talisayan ','Tagoloan ','Sugbongcogon ','Salay ','Opol ','Naawan ','Medina ','Manticao ','Magsaysay (Linugos) ','Lugait ','Libertad ','Laguindingan ','Lagonglong ','Kinoguitan ','Jasaan ','Initao ','Gitagum ','Gingoog City ','El Salvador ','Claveria ','Cagayan De Oro City (Capital) ','Binuangan ','Balingoan ','Balingasag ','Alubijid '],

            'Compostella Valley'=>['Pantukan ','New Bataan ','Nabunturan ','Montevista ','Monkayo ','Mawab ','Maragusan (San Mariano) ','Maco ','Mabini (Dona Alicia) ','Laak (San Vicente) ','Compostela '],
            'Davao del Norte'=>['Talaingod ','Tagum City (Capital) ','Santo Tomas ','Samal Island Garden City ','Panabo City ','New Corella ','Kapalong ','Carmen ','Braulio E. Dujali ','Asuncion (Saug) '],
            'Davao del Sur'=>['Sulop ','Sarangani ','Santa Maria ','Santa Cruz ','Padada ','Matanao ','Malita ','Malalag ','Magsaysay ','Kiblawan ','Jose Abad Santos (Trinidad) ','Hagonoy ','Don Marcelino ','Digos City (Capital) ','Davao City ','Bansalan'],
            'Davao Oriental'=>['Tarragona ','San Isidro ','Manay ','Lupon ','Cateel ','Caraga ','Boston ','Banaybanay ','Baganga '],

            'North Cotabato'=>['Tulunan ','President Roxas ','Pikit ','Pigkawayan ','Mlang ','Midsayap ','Matalam ','Makilala ','Magpet ','Libungan ','Kidapawan City (Capital) ','Kabacan ','Carmen ','Banisilan ','Arakan ','Antipas ','Aleosan ','Alamada '],
            'Sarangani'=>['Malungon ','Malapatan ','Maitum ','Maasim ','Kiamba ','Glan ','Alabel (Capital) '],
            'South Cotabato'=>['Tupi ','Tboli ','Tantangan ','Tampakan ','Surallah ','Santo Nino ','Polomolok ','Norala ','Lake Sebu ','Koronadal City (Capital) ','General Santos City ','Banga '],
            'Sultan Kudarat'=>['Tacurong City ','Sen. Ninoy Aquino ','President Quirino ','Palimbang ','Lutayan ','Lebak ','Lambayong (Mariano Marcos) ','Kalamansig ','Isulan ','Esperanza ','Columbio ','Bagumbayan '],

            'Agusan del Norte'=>['Tubay ','Santiago ','Remedios T. Romualdez ','Nasipit ','Magallanes ','Las Nieves ','Kitcharao ','Jabonga ','Carmen ','Cabadbaran ','Butuan City (Capital) ','Buenavista '],
            'Agusan del Sur'=>['Veruela ','Trento ','Talacogon ','Sibagat ','Santa Josefa ','San Luis ','San Francisco ','Rosario ','Prosperidad (Capital) ','Loreto ','La Paz ','Esperanza ','Bunawan ','Bayugan '],
            'Surigao del Norte'=>['Tubod ','Tubajon ','Tagana-An ','Surigao City (Capital) ','Socorro ','Sison ','Santa Monica ','San Jose ','San Isidro ','San Francisco (Anao-Aon) ','San Benito ','Placer ','Pilar ','Malimono ','Mainit ','Loreto ','Libjo (Albor) ','Gigaquit ','General Luna ','Dinagat ','Del Carmen ','Dapa ','Claver ','Cagdianao ','Burgos ','Basilisa (Rizal) ','Bacuag ','Alegria '],
            'Surigao del Sur'=>['Tandag ','Tago ','Tagbina ','San Miguel ','San Agustin ','Marihatag ','Madrid ','Lingig ','Lianga ','Lanuza ','Hinatuan ','Cortes ','Carrascal ','Carmen ','Cantilan ','Cagwait ','Bislig City ','Bayabas ','Barobo '],

            'Basilan'=>['Ungkaya Pukan ','Tabuan Lasa ','Isabela City ','Hadji Muhtamad ','Hadji Muhammad Ajul ','Akbar ','Al Barka ','Tuburan ','Tipo-Tipo ','Sumisip ','Maluso ','Lantawan ','Lamitan '],
            'Lanao del Sur'=>['Marawi City ','Bayang ','Malabang ','Maguing ','Madamba ','Lumba-Bayabao ','Kapai ','Ganassi ','Butig ','Bumbaran ','Buadiposo-Buntong ','Balindong (Watu) ','Balabagan ','Bacolod-Kawali (Bacolod-Grande) ','Tubaran ','Tamparan ','Poona Bayabao (Gata) ','Piagapo ','Pagayawan (Tatarikan) ','Marogong ','Marantao ','Madalum ','Lumbayanague ','Lumbatan ','Calanogas ','Bubong ','Binidayan '],
            'Maguindanao'=>['Cotabato City ','Datu Abdullah Sanki ','Upi ','Talitay ','Talayan ','Sultan Sa Barongis ','Sultan Mastura ','Sultan Kudarat ','South Upi ','Shariff Aguak ','Parang ','Paglat ','Pagalungan ','Pagagawan ','Matanog ','Mamasapano ','Kabuntalan ','Guindulungan ','Gen. S. K. Pendatun ','Datu Unsay ','Datu Saudi Ampatuan ','Datu Piang ','Datu Paglas ','Datu Odin Sinsuat ','Buluan ','Buldon ','Barira ','Ampatuan '],
            'Sulu'=>['Hadji Panglima Tahil ','Tongkil ','Tapul ','Talipao ','Siasi ','Patikul ','Pata ','Parang ','Pangutaran ','Panglima Estino (New Panamao) ','Pandami ','Old Panamao ','Maimbung ','Luuk ','Lugus ','Kalingalan Caluang ','Jolo (Capital) ','Indanan '],
            'Tawi-Tawi'=>['Sibutu ','Turtle Islands ','Tandubas ','South Ubian ','Sitangkai ','Simunul ','Sapa-Sapa ','Panglima Sugala (Balimbing) ','Mapun (Cagayan De Tawi-Tawi) ','Languyan ','Bongao '],

            'Abra'=>['Villaviciosa ','Tubo ','Tineg ','Tayum ','San Quintin ','San Juan ','San Isidro ','Sallapadan ','Pilar ','Pidigan ','Penarubia ','Manabo ','Malibcong ','Luba ','Langiden ','Lagayan ','Lagangilang ','Lacub ','La Paz ','Dolores ','Danglas ','Daguioman ','Bucloc ','Bucay ','Boliney ','Bangued ','Baay-Licuan (Licuan) '],
            'Apayao'=>['Santa Marcela ','Pudtol ','Luna ','Kabugao ','Flora ','Conner ','Calanasan (Bayag) '],
            'Benguet'=>['Itogon ','Tublay ','Tuba ','Sablan ','Mankayan ','La Trinidad ','Kibungan ','Kapangan ','Kabayan ','Buguias ','Bokod ','Bakun ','Baguio City ','Atok '],
            'Ifugao'=>['Tinoc ','Mayoyao ','Lamut ','Lagawe ','Kiangan ','Hungduan ','Hingyon ','Banaue ','Asipulo ','Alfonso Lista (Potia) ','Aguinaldo '],
            'Kalinga'=>['Lubuagan ','Tinglayan ','Tanudan ','Tabuk (Capital) ','Rizal (Liwan) ','Pinukpuk ','Pasil ','Balbalan '],
            'Mountain Province'=>['Tadian ','Sagada ','Sadanga ','Sabangan ','Paracelis ','Natonin ','Bontoc ','Besao ','Bauko ','Barlig ']

        ];
//        $locations = [
//            'National Capital Region (NCR)'=>
//                [
//                    'Metro Manila'=>['Valenzuela City','Taguig','San Juan','Quezon City','Pateros','Pasig City','Pasay City','Paranaque City','Navotas','Muntinlupa City','Marikina City','Manila','Mandaluyong City','Malabon City','Makati City','Las Pinas City','Caloocan City']
//                ],
//            'Ilocos Region'=>
//                [
//                    'Ilocos Norte'=>['Vintar','Solsona','Sarrat','San Nicolas','Pinili','Piddig','Pasuquin','Paoay','Pagudpud','Nueva Era','Marcos','Laoag City','Dumalneg','Dingras','Currimao','Carasi','Burgos','Batac','Banna (Espiritu)','Bangui','Badoc','Bacarra','Adams'],
//                    'Ilocos Sur'=>['Vigan City','Tagudin','Suyo','Sugpon','Sinait','Sigay','Santo Domingo','Santiago','Santa Maria','Santa Lucia','Santa Cruz','Santa Catalina','Santa','San Vicente','San Juan (Lapog)','San Ildefonso','San Esteban','San Emilio','Salcedo (Baugen)','Quirino (Angkaki)','Narvacan','Nagbukel','Magsingal','Lidlidda','Gregorio Del Pilar (Concepcion)','Galimuyod','Cervantes','Caoayan','Candon City','Cabugao','Burgos','Bantay','Banayoyo','Alilem'],
//                    'La Union'=>['Tubao','Pugo','Sudipen','Santol','Santo Tomas','San Juan','San Gabriel','San Fernando City','Rosario','Naguilian','Luna','Caba','Burgos','Bauang','Bangar','Balaoan','Bagulin','Bacnotan','Aringay','Agoo'],
//                    'Pangasinan'=>['Villasis','Urdaneta City','Urbiztondo','Umingan','Tayug','Sual','Sison','Santo Tomas','Santa Maria','Santa Barbara','San Quintin','San Nicolas','San Manuel','San jacinto','San Fabian','San Carlos City','Pozorrubio','Natividad','Mapandan','Mangatarem','Mangaldan','Manaoag','Malasiqui','Mabini','Lingayen','Laoac','Labrador','Infanta','Dasol','Dagupan City','Calasiao','Burgos','Bugallon','Bolinao','Binmaley','Binalonan','Bayambang','Bautista','Basista','Bani','Asingan','Anda','Alcala','Alaminos City','Aguilar','Agno','Rosales','Balungao']
//                ],
//            'Cagayan Valley'=>
//                [
//                    'Batanes'=>['Uyugan','Sabtang','Mahatao','Ivana','Itbayat','Basco'],
//                    'Cagayan'=>['Tuguegarao City','Tuao','Solana','Santo Nino (Faire)','Santa Teresita','Santa Praxedes','Santa Ana','Sanchez-Mira','Rizal','Piat','Penablanca','Pamplona','Lasam','Lal-Lo','Iguig','Gonzaga','Gattaran','Enrile','Claveria','Camalaniugan','Calayan','Buguey','Ballesteros','Baggao','Aparri','Amulung','Allacapan','Alcala','Abulug'],
//                    'Isabela'=>['Tumauini','Santo Tomas','Santiago City','Santa Maria','San Pablo','San Mateo','San Mariano','San Manuel','San Isidro','San Guillermo','San Agustin','Roxas','Reina Mercedes','Ramon','Quirino','Quezon','Palanan','Naguilian','Mallig','Maconacon','Luna','Jones','Ilagan','Gamu','Echague','Divilican','Dinapigue','Delfin Albano (Magsaysay)','Cordon','Cauayan City','Cabatuan','Cabagan','Burgos','Benito Soliven','Aurora','Angadanan','Alicia'],
//                    'Nueva Vizcaya'=>['Kasibu ','Alfonso Castañeda ','Villaverde ','Solano ','Santa Fe ','Quezon ','Kayapa ','Dupax Del Sur ','Dupax Del Norte ','Diadi ','Bayombong ','Bambang ','Bagabag ','Aritao ','Ambaguio '],
//                    'Quirino'=>['Saguday ','Nagtipunan ','Maddela ','Diffun ','Cabarroguis ','Aglipay ']
//                ],
//            'Central Luzon'=>
//                [
//                    'Aurora'=>['San Luis ','Maria Aurora ','Dipaculao ','Dingalan ','Dinalungan ','Dilasag ','Casiguran ','Baler '],
//                    'Bataan'=>['Samal ','Pilar ','Orion ','Orani ','Morong ','Mariveles ','Limay ','Hermosa ','Dinalupihan ','Balanga City ','Bagac ','Abucay '],
//                    'Bulacan'=>['Santa Maria ','San Rafael ','San Miguel ','San Jose Del Monte ','San Ildefonso ','Pulilan ','Plaridel ','Paombong ','Pandi ','Obando ','Norzagaray ','Meycauayan ','Marilao ','Malolos ','Hagonoy ','Guiguinto ','Dona Remedios Trinidad ','Calumpit ','Bustos ','Bulacan ','Bocaue ','Baliuag ','Balagtas ','Angat '],
//                    'Nueva Ecija'=>['Zaragosa ','Talugtog ','Talavera ','Santo Domingo ','Santa Rosa ','San Leonardo ','San Jose City ','San Isidro ','San Esteban ','San Antonio ','Rizal ','Quezon ','Penaranda ','Pantabangan ','Palayan City ','Nampicuan ','Munoz ','Lupao ','Llanera ','Licab ','Laur ','Jaen ','Guimba ','General Tinio ','General Mamerto Natividad ','Gapan ','Gabaldon ','Cuyapo ','Carranglan ','Cabiao ','Cabanatuan City ','Bongabon ','Aliaga '],
//                    'Pampanga'=>['Sasmoan (Sexmoan) ','Santo Tomas ','Santa Rita ','Santa Ana ','San Simon ','San Luis ','San Fernando City ','Porac ','Minalin ','Mexico ','Masantol ','Magalang ','Macabebe ','Mabalacat ','Lubao ','Guagua ','Floridablanca ','Candaba ','Bacolor ','Arayat ','Apalit ','Angeles City '],
//                    'Tarlac'=>['Moncada ','Victoria ','Tarlac City ','Santa Ignacia ','San Manuel ','San Jose ','San Clemente ','Ramos ','Pura ','Paniqui ','Mayantoc ','Lapaz ','Gerona ','Concepcion ','Capas ','Camiling ','Bamban ','Anao '],
//                    'Zambales'=>['Subic ','Santa Cruz ','San Narciso ','San Marcelino ','San Felipe ','San Antonio ','Palauig ','Olonggapo City ','Masinloc ','Iba ','Castillejos ','Candelaria ','Cabangan ','Botolan ']
//                ],
//            'CALABARZON'=>
//                [
//                    'Batangas'=>['Rosario ','Tuy ','Tingloy ','Taysan ','Tanauan City ','Talisay ','Taal ','Santo Tomas ','Santa Teresita ','San Pascual ','San Nicolas ','San Luis ','San Juan ','San Jose ','Padre Garcia ','Nasugbu ','Mataas Na Kahoy ','Malvar ','Mabini ','Lobo ','Lipa City ','Lian ','Lemery ','Laurel ','Ibaan ','Cuenca ','Calatagan ','Calaca ','Bauan ','Batangas City ','Balete ','Balayan ','Alitagtag ','Agoncillo '],
//                    'Cavite'=>['Trece Martires City ','Ternate ','Tanza ','Tagaytay City ','Silang ','Rosario ','Noveleta ','Naic ','Mendez (Mendez-Nunez) ','Maragondon ','Magallanes ','Kawit ','Indang ','Imus ','General Trias ','General Emilio Aguinaldo ','Gen. Mariano Alvarez ','Dasmarinas ','Cavite City ','Carmona ','Bacoor ','Amadeo ','Alfonso '],
//                    'Laguna'=>['Victoria ','Siniloan ','Santa Rosa ','Santa Maria ','Santa Cruz ','San Pedro ','San Pablo City ','Rizal ','Pila ','Pangil ','Pakil ','Pagsanjan ','Paete ','Nagcarlan ','Majayjay ','Magdalena ','Mabitac ','Lumban ','Luisiana ','Los Banos ','Liliw ','Kalayaan ','Famy ','Cavinti ','Calauan ','Calamba City ','Cabuyao ','Binan ','Bay ','Alaminos '],
//                    'Quezon'=>['Unisan ','Tiaong ','Tayabas ','Tagkawayan ','Sariaya ','San Narciso ','San Francisco (Aurora) ','San Antonio ','San Andres ','Sampaloc ','Real ','Quezon ','Polillo ','Plaridel ','Pitogo ','Perez ','Patnanungan ','Panukulan ','Pagbilao ','Padre Burgos ','Mulanay ','Mauban ','Macalelon ','Lucena City ','Lucban ','Lopez ','Jomalig ','Infanta ','Gumaca ','Guinayangan ','General Nakar ','General Luna ','Dolores ','Catanauan ','Candelaria ','Calauag ','Burdeos ','Buenavista ','Atimonan ','Alabat ','Agdangan '],
//                    'Rizal'=>['Teresa ','Taytay ','Tanay ','San Mateo ','Rodriguez (Montalban) ','Pililla ','Morong ','Jala-Jala ','Cardona ','Cainta ','Binangonan ','Baras ','Antipolo City ','Angono ']
//                ],
//            'MIMAROPA'=>
//                [
//                    'Marinduque'=>['Torrijos ','Santa Cruz ','Mogpog ','Gasan ','Buenavista ','Boac '],
//                    'Occidental Mindoro'=>['Santa Cruz ','San Jose ','Sablayan ','Rizal ','Paluan ','Mamburao ','Magsaysay ','Lubang ','Looc ','Calintaan ','Abra de Ilog '],
//                    'Oriental Mindoro'=>['Victoria ','Socorro ','San Teodoro ','Roxas ','Puerto Galera ','Pola ','Pinamalayan ','Naujan ','Mansalay ','Gloria ','Calapan City ','Bulalacao (San Pedro) ','Bongabong ','Bansud ','Baco '],
//                    'Palawan'=>['Taytay ','Sofronio Espanola ','San Vicente ','Roxas ','Rizal (Marcos) ','Quezon ','Puerto Princesa City ','Narra ','Magsaysay ','Linapacan ','Kalayaan ','El Nido (Bacuit) ','Dumaran ','Cuyo ','Culion ','Coron ','Cagayancillo ','Busuanga ','Brookes Point ','Bataraza ','Balabac ','Araceli ','Agutaya ','Aborlan '],
//                    'Romblon'=>['Santa Maria ','Santa Fe ','San Jose ','San Andres ','San Agustin ','San Fernando ','Romblon ','Odiongan ','Magdiwang ','Looc ','Ferrol ','Corcuera ','Concepcion ','Calatrava ','Cajidiocan ','Banton ','Alcantara ']
//                ],
//            'Bicol Region'=>
//                [
//                    'Albay'=>['Tiwi ','Tabaco City ','Santo Domingo (Libog) ','Rapu-Rapu ','Polangui ','Pio Duran ','Oas ','Manito ','Malinao ','Malilipot ','Ligao City ','Libon ','Legazpi City ','Jovellar ','Guinobatan ','Daraga ','Camalig ','Bacacay '],
//                    'Camarines Norte'=>['Vinzons ','Talisay ','Santa Elena ','San Vicente ','San Lorenzo Ruiz (Imelda) ','Paracale ','Mercedes ','Labo ','Jose Panganiban ','Daet ','Capalonga ','Basud '],
//                    'Camarines Sur'=>['Cabusao ','Garchitorena ','Caramoan ','Calabanga ','Bombon ','Tinambac ','Tigaon ','Siruma ','Sipocot ','San Jose ','San Fernando ','Sagnay ','Ragay ','Presentacion (Parubcan) ','Pili ','Pasacao ','Pamplona ','Ocampo ','Naga City ','Nabua ','Minalabac ','Milaor ','Magarao ','Lupi ','Libmanan ','Lagonoy ','Iriga City ','Goa ','Gainza ','Del Gallego ','Canaman ','Camaligan ','Bula ','Buhi ','Bato ','Balatan ','Baao '],
//                    'Catanduanes'=>['Virac ','Viga ','San Miguel ','San Andres (Calolbon) ','Panganiban ','Pandan ','Gigmoto ','Caramoran ','Bato ','Baras ','Bagamanoc '],
//                    'Masbate'=>['Uson ','San Pascual ','San Jacinto ','San Fernando ','Placer ','Pio V. Corpuz (Limbuhan) ','Palanas ','Monreal ','Mobo ','Milagros ','Masbate City (Capital) ','Mandaon ','Esperanza ','Dimasalang ','Claveria ','Cawayan ','Cataingan ','Batuan ','Balud ','Baleno ','Aroroy '],
//                    'Sorsogon'=>['Barcelona ','Sorsogon City ','Santa Magdalena ','Prieto Diaz ','Pilar ','Matnog ','Magallanes ','Juban ','Irosin ','Gubat ','Donsol ','Castilla ','Casiguran ','Bulusan ','Bulan ']
//                ],
//            'Western Visayas'=>
//                [
//                    'Aklan'=>['Tangalan ','Numancia ','New Washington ','Nabas ','Malinao ','Malay ','Makato ','Madalag ','Libacao ','Lezo ','Ibajay ','Buruanga ','Batan ','Banga ','Balete ','Altavas ','Kalibo '],
//                    'Antique'=>['Valderrama ','Tobias Fornier (Dao) ','Tibiao ','Sibalom ','Sebaste ','San Remigio ','San Jose ','Patnongon ','Pandan ','Libertad ','Laua-An ','Hamtic ','Culasi ','Caluya ','Bugasong ','Belison ','Barbaza ','Anini-Y '],
//                    'Capiz'=>['Tapaz ','Sigma ','Sapi-An ','Roxas City (Capital) ','President Roxas ','Pontevedra ','Pilar ','Panitan ','Panay ','Mambusao ','Ma-Ayon ','Jamindan ','Ivisan ','Dumarao ','Dumalag ','Dao ','Cuartero '],
//                    'Guimaras'=>['Sibunag ','San Lorenzo ','Nueva Valencia ','Jordan ','Buenavista '],
//                    'IloIlo'=>['Zarraga ','Tubungan ','Tigbauan ','Sara ','Santa Barbara ','San Rafael ','San Miguel ','San Joaquin ','San Enrique ','San Dionisio ','Pototan ','Pavia ','Passi City ','Oton ','New Lucena ','Mina ','Miagao ','Maasin ','Leon ','Lemery ','Leganes ','Lambunao ','Janiuay ','Iloilo City ','Igbaras ','Guimbal ','Estancia ','Dumangas ','Duenas ','Dingle ','Concepcion ','Carles ','Calinog ','Cabatuan ','Bingawan ','Batad ','Barotac Viejo ','Barotac Nuevo ','Banate ','Balasan ','Badiangan ','Anilao ','Alimodian ','Ajuy '],
//                    'Negros Occidental'=>['Sipalay ','Victorias City ','Valladolid ','Toboso ','Talisay City ','Silay City ','San Enrique ','San Carlos City ','Salvador Benedicto ','Sagay City ','Pulupandan ','Pontevedra ','Murcia ','Moises Padilla (Magallon) ','Manapla ','La Castellana ','La Carlota City ','Kabankalan City ','Isabela ','Ilog ','Hinoba-An ','Hinigaran ','Himamaylan City ','Escalante City ','Enrique B. Magalona (Saravia) ','Cauayan ','Candoni ','Calatrava ','Cadiz City ','Binalbagan ','Bago City ','Bacolod City ']
//                ],
//            'Central Visayas'=>
//                [
//                    'Bohol'=>['Valencia ','Ubay ','Tubigon ','Trinidad ','Talibon ','Tagbilaran City ','Sikatuna ','Sierra Bullones ','Sevilla ','San Miguel ','San Isidro ','Sagbayan (Borja) ','Pres. Carlos P. Garcia ','Pilar ','Panglao ','Maribojoc ','Mabini ','Loon ','Loboc ','Loay ','Lila ','Jetafe ','Jagna ','Inabanga ','Guindulman ','Garcia Hernandez ','Duero ','Dimiao ','Dauis ','Danao ','Dagohoy ','Cortes ','Corella ','Clarin ','Catigbian ','Carmen ','Candijay ','Calape ','Buenavista ','Bilar ','Bien Unido ','Batuan ','Balilihan ','Baclayon ','Antequera ','Anda ','Alicia ','Albuquerque '],
//                    'Cebu'=>['Toledo City ','Tudela ','Tuburan ','Talisay City ','Tabuelan ','Tabogon ','Sogod ','Sibonga ','Santander ','Santa Fe ','San Remigio ','San Francisco ','San Fernando ','Samboan ','Ronda ','Poro ','Pinamungahan ','Pilar ','Oslob ','Naga ','Moalboal ','Minglanilla ','Medellin ','Mandaue City ','Malabuyoc ','Madridejos ','Liloan ','Lapu-Lapu City ','Ginatilan ','Dumanjug ','Danao City ','Dalaguete ','Daanbantayan ','Cordova ','Consolacion ','Compostela ','Catmon ','Carmen ','Carcar ','Borbon ','Boljoon ','Bogo ','Barili ','Bantayan ','Balamban ','Badian ','Asturias ','Argao ','Aloguinsan ','Alegria ','Alcoy ','Alcantara ','Cebu City '],
//                    'Negros Oriental'=>['Tanjay City ','Dumaguete City ','Canlaon City ','Bais City ','Zamboanguita ','Vallehermoso ','Valencia (Luzurrizga) ','Tayasan ','Sibulan ','Siaton ','Santa Catalina ','San Jose ','Pamplona ','Manjuyod ','Mabinay ','La Libertad ','Jimalalud ','Guihulngan ','Dauin ','Bindoy (Payabon) ','Bayawan City (Tulong) ','Basay ','Bacong ','Ayungon ','Amlan (Ayuquitan) '],
//                    'Siquijor'=>['Siquijor ','San Juan ','Maria ','Lazi ','Larena ','Enrique Villanueva ']
//                ],
//            'Eastern Visayas'=>
//                [
//                    'Biliran'=>['Naval ','Maripipi ','Kawayan ','Culaba ','Caibiran ','Cabucgayan ','Biliran ','Almeria '],
//                    'Eastern Samar'=>['Taft ','Sulat ','San Policarpo ','San Julian ','Salcedo ','Quinapondan ','Oras ','Mercedes ','Maydolong ','Maslog ','Llorente ','Lawaan ','Jipapad ','Hernani ','Guiuan ','Giporlos ','General Mac Arthur ','Dolores ','Can-Avid ','Borongan (Capital) ','Balangkayan ','Balangiga ','Arteche '],
//                    'Leyte'=>['Villaba ','Tunga ','Tolosa ','Tanauan ','Tacloban City ','Tabontabon ','Tabango ','Santa Fe ','San Miguel ','San Isidro ','Pastrana ','Palompon ','Palo ','Ormoc City ','Merida ','Mayorga ','Matalom ','Matag-Ob ','Mahaplag ','Macarthur ','Leyte ','La Paz ','Kananga ','Julita ','Javier (Bugho) ','Jaro ','Isabel ','Inopacan ','Hindang ','Hilongos ','Dulag ','Dagami ','Carigara ','Capoocan ','Calubian ','Burauen ','Baybay ','Bato ','Barugo ','Babatngon ','Albuera ','Alangalang ','Abuyog '],
//                    'Northern Samar'=>['Victoria ','Silvino Lobos ','San Vicente ','San Roque ','San Jose ','San Isidro ','San Antonio ','Rosario ','Pambujan ','Palapag ','Mondragon ','Mapanas ','Lope De Vega ','Lavezares ','Las Navas ','Lapinig ','Laoang ','Gamay ','Catubig ','Catarman ','Capul ','Bobon ','Biri ','Allen '],
//                    'Samar'=>['Calbayog ','Catbalogan ','Zumarraga ','Villareal ','Tarangnan ','Talalora ','Tagapul-an ','Santo Niño ','Santa Rita ','Santa Margarita ','San Sebastian ','San Jose De Buan ','San Jorge ','Pinabacdao ','Paranas (Wright) ','Pagsanghan ','Motiong ','Matuguinao ','Marabut ','Jiabong ','Hinabangan ','Gandara ','Daram ','Calbiga ','Basey ','Almagro '],
//                    'Southern Leyte'=>['Tomas Oppus ','Sogod ','Silago ','San Ricardo ','San Juan (Cabalian) ','San Francisco ','Saint Bernard ','Pintuyan ','Padre Burgos ','Malitbog ','Macrohon ','Maasin City ','Limasawa ','Liloan ','Libagon ','Hinundayan ','Hinunangan ','Bontoc ','Anahawan ']
//                ],
//            'Zamboanga Peninsula'=>
//                [
//                    'Zamboanga del Norte'=>['Tampilisan ','Sirawai ','Siocon ','Sindangan ','Sibutad ','Sibuco ','Siayan ','Sergio Osmena Sr. ','Salug ','Rizal ','Pres. Manuel A. Roxas ','Polanco ','Pinan (New Pinan) ','Mutia ','Manukan ','Liloy ','Labason ','La Libertad ','Katipunan ','Kalawit ','Jose Dalman (Ponot) ','Gutalac ','Godod ','Dipolog City (Capital) ','Dapitan City ','Baliguian ','Bacungan '],
//                    'Zamboanga del Sur'=>['Dumalinao ','Zamboanga City ','Vincenzo A. Sagun ','Tukuran ','Tigbao ','Tambulig ','Tabina ','Sominot (Don Mariano Marcos) ','San Pablo ','San Miguel ','Ramon Magsaysay (Liargo) ','Pitogo ','Pagadian City (Capital) ','Molave ','Midsalip ','Margosatubig ','Mahayag ','Lapuyan ','Lakewood ','Labangan ','Kumalarang ','Josefina ','Guipos ','Dumingag ','Dinas ','Dimataling ','Bayog ','Aurora '],
//                    'Zamboanga Sibugay'=>['Tungawan ','Titay ','Talusan ','Siay ','Roseller Lim ','Payao ','Olutanga ','Naga ','Malangas ','Mabuhay ','Kabasalan ','Ipil ','Imelda ','Diplahan ','Buug ','Alicia ']
//                ],
//            'Northern Mindanao'=>
//                [
//                    'Bukidnon'=>['Valencia City ','Talakag ','Sumilao ','San Fernando ','Quezon ','Pangantucan ','Maramag ','Manolo Fortich ','Malitbog ','Malaybalay City (Capital) ','Libona ','Lantapan ','Kitaotao ','Kibawe ','Kalilangan ','Kadingilan ','Impasug-Ong ','Don Carlos ','Dangcagan ','Damulog ','Cabanglasan ','Baungon '],
//                    'Camiguin'=>['Sagay ','Mambajao ','Mahinog ','Guinsiliban ','Catarman '],
//                    'Lanao del Norte'=>['Tubod ','Tangcal ','Tagoloan ','Sultan Naga Dimaporo (Karomata) ','Sapad ','Salvador ','Poona Piagapo ','Pantar ','Pantao Ragat ','Nunungan ','Munai ','Matungao ','Maigo ','Magsaysay ','Linamon ','Lala ','Kolambugan ','Kauswagan ','Kapatagan ','Iligan City ','Baroy ','Baloi ','Bacolod '],
//                    'Misamis Occidental'=>['Tudela ','Tangub City ','Sinacaban ','Sapang Dalaga ','Plaridel ','Panaon ','Ozamis City ','Oroquieta City (Capital) ','Lopez Jaena ','Jimenez ','Don Victoriano Chiongbian ','Concepcion ','Clarin ','Calamba ','Bonifacio ','Baliangao ','Aloran '],
//                    'Misamis Orriental'=>['Villanueva ','Talisayan ','Tagoloan ','Sugbongcogon ','Salay ','Opol ','Naawan ','Medina ','Manticao ','Magsaysay (Linugos) ','Lugait ','Libertad ','Laguindingan ','Lagonglong ','Kinoguitan ','Jasaan ','Initao ','Gitagum ','Gingoog City ','El Salvador ','Claveria ','Cagayan De Oro City (Capital) ','Binuangan ','Balingoan ','Balingasag ','Alubijid ']
//                ],
//            'Davao Region'=>
//                [
//                    'Compostella Valley'=>['Pantukan ','New Bataan ','Nabunturan ','Montevista ','Monkayo ','Mawab ','Maragusan (San Mariano) ','Maco ','Mabini (Dona Alicia) ','Laak (San Vicente) ','Compostela '],
//                    'Davao del Norte'=>['Talaingod ','Tagum City (Capital) ','Santo Tomas ','Samal Island Garden City ','Panabo City ','New Corella ','Kapalong ','Carmen ','Braulio E. Dujali ','Asuncion (Saug) '],
//                    'Davao del Sur'=>['Sulop ','Sarangani ','Santa Maria ','Santa Cruz ','Padada ','Matanao ','Malita ','Malalag ','Magsaysay ','Kiblawan ','Jose Abad Santos (Trinidad) ','Hagonoy ','Don Marcelino ','Digos City (Capital) ','Davao City ','Bansalan'],
//                    'Davao Oriental'=>['Tarragona ','San Isidro ','Manay ','Lupon ','Cateel ','Caraga ','Boston ','Banaybanay ','Baganga ']
//                ],
//            'SOCCSKSARGEN'=>
//                [
//                    'North Cotabato'=>['Tulunan ','President Roxas ','Pikit ','Pigkawayan ','Mlang ','Midsayap ','Matalam ','Makilala ','Magpet ','Libungan ','Kidapawan City (Capital) ','Kabacan ','Carmen ','Banisilan ','Arakan ','Antipas ','Aleosan ','Alamada '],
//                    'Sarangani'=>['Malungon ','Malapatan ','Maitum ','Maasim ','Kiamba ','Glan ','Alabel (Capital) '],
//                    'South Cotabato'=>['Tupi ','Tboli ','Tantangan ','Tampakan ','Surallah ','Santo Nino ','Polomolok ','Norala ','Lake Sebu ','Koronadal City (Capital) ','General Santos City ','Banga '],
//                    'Sultan Kudarat'=>['Tacurong City ','Sen. Ninoy Aquino ','President Quirino ','Palimbang ','Lutayan ','Lebak ','Lambayong (Mariano Marcos) ','Kalamansig ','Isulan ','Esperanza ','Columbio ','Bagumbayan ']
//                ],
//            'Caraga'=>
//                [
//                    'Agusan del Norte'=>['Tubay ','Santiago ','Remedios T. Romualdez ','Nasipit ','Magallanes ','Las Nieves ','Kitcharao ','Jabonga ','Carmen ','Cabadbaran ','Butuan City (Capital) ','Buenavista '],
//                    'Agusan del Sur'=>['Veruela ','Trento ','Talacogon ','Sibagat ','Santa Josefa ','San Luis ','San Francisco ','Rosario ','Prosperidad (Capital) ','Loreto ','La Paz ','Esperanza ','Bunawan ','Bayugan '],
//                    'Surigao del Norte'=>['Tubod ','Tubajon ','Tagana-An ','Surigao City (Capital) ','Socorro ','Sison ','Santa Monica ','San Jose ','San Isidro ','San Francisco (Anao-Aon) ','San Benito ','Placer ','Pilar ','Malimono ','Mainit ','Loreto ','Libjo (Albor) ','Gigaquit ','General Luna ','Dinagat ','Del Carmen ','Dapa ','Claver ','Cagdianao ','Burgos ','Basilisa (Rizal) ','Bacuag ','Alegria '],
//                    'Surigao del Sur'=>['Tandag ','Tago ','Tagbina ','San Miguel ','San Agustin ','Marihatag ','Madrid ','Lingig ','Lianga ','Lanuza ','Hinatuan ','Cortes ','Carrascal ','Carmen ','Cantilan ','Cagwait ','Bislig City ','Bayabas ','Barobo ']
//                ],
//            'ARMM'=>
//                [
//                    'Basilan'=>['Ungkaya Pukan ','Tabuan Lasa ','Isabela City ','Hadji Muhtamad ','Hadji Muhammad Ajul ','Akbar ','Al Barka ','Tuburan ','Tipo-Tipo ','Sumisip ','Maluso ','Lantawan ','Lamitan '],
//                    'Lanao del Sur'=>['Marawi City ','Bayang ','Malabang ','Maguing ','Madamba ','Lumba-Bayabao ','Kapai ','Ganassi ','Butig ','Bumbaran ','Buadiposo-Buntong ','Balindong (Watu) ','Balabagan ','Bacolod-Kawali (Bacolod-Grande) ','Tubaran ','Tamparan ','Poona Bayabao (Gata) ','Piagapo ','Pagayawan (Tatarikan) ','Marogong ','Marantao ','Madalum ','Lumbayanague ','Lumbatan ','Calanogas ','Bubong ','Binidayan '],
//                    'Maguindanao'=>['Cotabato City ','Datu Abdullah Sanki ','Upi ','Talitay ','Talayan ','Sultan Sa Barongis ','Sultan Mastura ','Sultan Kudarat ','South Upi ','Shariff Aguak ','Parang ','Paglat ','Pagalungan ','Pagagawan ','Matanog ','Mamasapano ','Kabuntalan ','Guindulungan ','Gen. S. K. Pendatun ','Datu Unsay ','Datu Saudi Ampatuan ','Datu Piang ','Datu Paglas ','Datu Odin Sinsuat ','Buluan ','Buldon ','Barira ','Ampatuan '],
//                    'Sulu'=>['Hadji Panglima Tahil ','Tongkil ','Tapul ','Talipao ','Siasi ','Patikul ','Pata ','Parang ','Pangutaran ','Panglima Estino (New Panamao) ','Pandami ','Old Panamao ','Maimbung ','Luuk ','Lugus ','Kalingalan Caluang ','Jolo (Capital) ','Indanan '],
//                    'Tawi-Tawi'=>['Sibutu ','Turtle Islands ','Tandubas ','South Ubian ','Sitangkai ','Simunul ','Sapa-Sapa ','Panglima Sugala (Balimbing) ','Mapun (Cagayan De Tawi-Tawi) ','Languyan ','Bongao ']
//                ],
//            'Cordillera Administrative Region'=>
//                [
//                    'Abra'=>['Villaviciosa ','Tubo ','Tineg ','Tayum ','San Quintin ','San Juan ','San Isidro ','Sallapadan ','Pilar ','Pidigan ','Penarubia ','Manabo ','Malibcong ','Luba ','Langiden ','Lagayan ','Lagangilang ','Lacub ','La Paz ','Dolores ','Danglas ','Daguioman ','Bucloc ','Bucay ','Boliney ','Bangued ','Baay-Licuan (Licuan) '],
//                    'Apayao'=>['Santa Marcela ','Pudtol ','Luna ','Kabugao ','Flora ','Conner ','Calanasan (Bayag) '],
//                    'Benguet'=>['Itogon ','Tublay ','Tuba ','Sablan ','Mankayan ','La Trinidad ','Kibungan ','Kapangan ','Kabayan ','Buguias ','Bokod ','Bakun ','Baguio City ','Atok '],
//                    'Ifugao'=>['Tinoc ','Mayoyao ','Lamut ','Lagawe ','Kiangan ','Hungduan ','Hingyon ','Banaue ','Asipulo ','Alfonso Lista (Potia) ','Aguinaldo '],
//                    'Kalinga'=>['Lubuagan ','Tinglayan ','Tanudan ','Tabuk (Capital) ','Rizal (Liwan) ','Pinukpuk ','Pasil ','Balbalan '],
//                    'Mountain Province'=>['Tadian ','Sagada ','Sadanga ','Sabangan ','Paracelis ','Natonin ','Bontoc ','Besao ','Bauko ','Barlig ']
//                ]
//        ];
        $x = 0;
        $i =0;
        foreach($provinces as $pk=>$pv){
            ++$i;
            Location::create([
                'type'=>1,
                'parent_id' => 0,
                'name' => $pk,
                'desc' => '-'
            ]);

            foreach($pv as $p){
                Location::create([
                    'type'=>2,
                    'parent_id' => $i+$x,
                    'name' => $p,
                    'desc' => '-'
                ]);

            }
            $x += count($pv);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
