Kmom05 - Laddningstid
=======================

Man ska i detta moment mäta olika sidors laddningstid och kolla upp deras användbarhet.

Urval
-----------------------

Jag valde att gå efter föregående webbplatser, då det kan vara bättre att hålla sig till samma sidor för att mer grundligt försöka analysera allting, från topp till botten. Det känns som det kan ge en bättre inblick över hela sidan generellt än att välja ut olika sidor.

Metod
-----------------------

Jag har använt mig av Googles PageSpeed Insights och Chromes dev tools. Jag tog betygen ifrån pagespeed för mobil och desktop användare sedan kollade jag olika resultat ifrån network fliken, såsom laddningstid, resurser och storleken.

Resultat
-----------------------

### Microsoft

1. [<img src="img/microsoft.png" width="400" height="225" alt="Microsft" />](img/microsoft.png)

2. [Se excel arket.](https://docs.google.com/spreadsheets/d/1j83AatHxFnsV-O6P5t5VLT7fMIiGzc2AGy1Adl8nsQE/edit?usp=sharing)

3. Se excel arket.

4. Webbplatsen kan förbättras genom att förbättra för användare med mobil enhet. Det fick väldigt dåligt resultat. Laddningstiden verkar för hög också, i snitt ett värde från 9s till 22s. Storleken verkar för hög också. Resurserna kan jag inte svara på men enligt pagespeed ska det vara för högt värde på tex. surface sidan, som hade högsta värdet ang. resurser.

### IBM

1. [<img src="img/ibm-developer.png" width="400" height="189" alt="IBM developer" />](img/ibm-developer.png)

2. [Se excel arket.](https://docs.google.com/spreadsheets/d/1j83AatHxFnsV-O6P5t5VLT7fMIiGzc2AGy1Adl8nsQE/edit?usp=sharing)

3. Se excel arket.

4. Även denna sida hade dåliga värden för mobila användare. Research sidan hade högsta laddningstid. Sidan borde förbättras i att koda (encode) bilderna i nyare förbättrade format, som JPEG 2000, JPEG XR, och WebP. Detta var vad Googles verktyg klagade mest på.

### Intel

1. [<img src="img/intel.png" width="400" height="189" alt="Intel" />](img/intel.png)

2. [Se excel arket.](https://docs.google.com/spreadsheets/d/1j83AatHxFnsV-O6P5t5VLT7fMIiGzc2AGy1Adl8nsQE/edit?usp=sharing)

3. Se excel arket.

4. Intel har bra värden för desktop användare. Dem har ganska bra laddningstider också. Även låg filstorlek jämfört med de andra sidorna. Google klagar på "Render-Blocking Resources" som ändå har mindre än en sekund. Jag förmodar sidan inte kan laddas fullt innan andra skript är klara.

Analys
-----------------------

Om man tittar på nätverksaktiviteten för de olika webbplatsernas sidor så verkar laddningstiden vara högst för Ms och IBM. Ms fick för sina tre sidor totalt 40s, IBM fick 35s, Intel 22s. I resurser fick Intel högst värde med 269, Ms 241, IBM 204. I storlek fick Ms högst på 13900kb, IBM 9933kb och Intel fick 5000kb.

Alla webbplatser kan förbättra deras mobila struktur, då de alla fått ett dåligt resultat, Intel lite bättre dock. Komprimering av text, förbättra bildstandarden som jag nämnde om i IBM artikeln. Vad alla hade gemensamt för åtminstone en utvald sida av dessa tre för varje webbplats var antalet resurser, som kan då vara bra att försöka minska på.

Rangordning
------------------

Jag rangordnar från bäst till sämst.

* Mobil: Intel, IBM, Ms.
* Desktop: Intel, Ms, IBM.
* Laddningstid: Intel, IBM, Ms.
* Resurser: IBM, Ms, Intel.
* Storlek: Intel, IBM, Ms.

Utan tivel toppar Intel listan för bästa resultat. Utöver Intels dåliga resultat för användare med mobil, och högre värde än andra i resurser, så hade Intel lägre laddningstid och nästan hälften så mindre i storlek jämfört med sidan på andra plats. Det betyder att Intel verkar mycket snabbare än de två andra webbplatserna.

Laddningstid
--------------------

Jag tror personligen om man lyckas hålla under 5s, max 5, om inte max 4s, så ska det gå bra. Utöver detta kan ta på tålamodet för större webbplatser. Rent generellt skulle jag vilja försöka hålla mig runt eller under den gränsen. Jag tycker dock inte att dessa webbplatser jag valt klarar av testet för bra laddningstid. De verkar använda sig av för mycket bilder som gör att läsaren tuggar hela tiden. Sektioner renderas i taget vilket om man skrollar snabbare neråt när sidan laddas får man vänta på bilderna. Detta ger en slags amatörkänsla om man redan inväntat ett par sekunder.

Övrigt
-----------------------

Rapporten är skriven av Krystian Manczak.
