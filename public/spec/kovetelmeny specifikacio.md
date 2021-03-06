

# Követelmény specifikáció

##  Áttekintés
Egy olyan webalkalmazást fejlesztünk melyben a felhasználó több mesterséget próbálhat ki egy virtuális világban, 
tárgyakat szerezhet melyekkel kereskedhet, vagy felhasználhatja azokat új tárgyak létrehozásához. A webalkalmazás 
egy virtuális világon alapuló játék lesz, melyben a cél a felhasználótól függ, lehet az pénz szerzés, vagy a 
mesterségek fejlesztése. A mesterségek fejlesztésével egyre ügyesebb lesz a felhasználó, és egyre jobb tárgyakat 
tud szerezni és használni. A felhasználónak szükséges lesz a regisztráció a játék eléréséhez. A felhasználó a 
bejelentkezés után bal oldalt választhat, hogy melyik mesterséggel szeretne éppen foglalkozni, felül pedig elérheti 
a boltot, a saját profilját, emellett láthatja a vagyonát, és ki is tud jelentkezni.
A felhasználónak lehetősége lesz horgászni, ahol horgászbotot és csalit kell használnia, hogy kifogjon halakat. 
A kifogott halakat fel lehet a játék más területein használni, vagy el lehet adni. A horgászáskor lesz esély a 
hal sikertelen kifogására is, emellett a felhasználó tapasztalatot gyűjt a horgászás közben, így növelve mesterségét. 
A horgászbotok minősége a halak kifogásának esélyét növelik, míg a csalik minősége.
## Jelenlegi helyzet
A mai világban túlbonyolított szerepjátékok léteznek csak, ahol a felhasználó rá van kényszerítve, 
hogy minden nap játsszon, ne maradjon le dolgokról, és lehetőségei le vannak korlátozva az éppen 
legeffektívebb stratégiákra, hogy élvezze a játékát. Legtöbb játék a monetizáció miatt kényszeríti 
a játékost napi kötelező pár óra játékra, hogy ezt egy habitussá tegye, így függő legyen és a cégnek 
minél stabilabb jövedelme legyen. Ezek a stratégiák a felhasználó pénztárcáját célozzák, és így nem 
az élvezetre fókuszálnak. 

## Vágyálom rendszer
	Egy olyan webes alapú játékot szeretnénk létrehozni mely visszahozza a régi RPG stílusú játékok hangulatát, saját megvalósításunkkal egy posztapokaliptikus környezetben. 
	A program ideális esetben különböző felhasználókra lebontva lehet majd játszani. Így bárki akár otthonról vagy épp szünetében a munkahelyről, vagy útközben is tud játszani. 
	Ennek másik nagy előnye, hogy egy felhasználó több profilt is tud csinálni és egy-egy profilon más más tevékenységek felé tud specializálódni. 
	Bejelentkezést követően az ilyen játékokhoz hasonlóan lehet majd különböző tevékenységeket végezni. Ezekkel lehet fejlődni szinteket és pénzt szerezni. 
	Hangulatos színvilágú felülettel rendelkezik az oldal, hogy a felhasználókat beszippantsa egy valódi kaland élményébe. 
	A tevékenységek között lehetnek a halászat kertészet vadászat és egyéb kevésbé hétköznapi de annál szórakoztatóbb dolgok melyeknek csak a kreativitásunk szab határt. 
	Egy példán keresztül bemutatjuk az egyes részek funkcióit. De ezek minden részhez mások és mások lesznek, hogy a felhasználó változatos keretek között azzal töltse az idejét amivel igazán ki tud kapcsolódni. 
	A halászatnál lesznek különböző halfajták melyek kifogása fajtól függően egyre nehezebb azaz hosszabb idejig tart. 
	Ezen halakat kifogva megkapja a felhasználó magát a halat melyet fajtától függően egyre több pénzért tud eladni, és egy úgynevezett xp pontot mely a halászási tapasztalatát mutatja.
	Egyre tapasztaltabb horgász egyre nagyobb halakat fog tudni kifogni, és egyre több pénzt tud így kifogni. 
	A looting vagy fosztogatás a játék egy fontos eleme lesz mellyel bármilyen nyersanyagot, fémet, pénzt vagy ételt tud szerezni. 
	De ezeket az utcán, boltokból kell másoktól elvennie. A szerzett dolgokat felhasználhatja eladásra vagy egyéb máshogy nem megszerezhető dolgok elkészítésére mert a túlélésért mindent meg kell tennie. 
	A szerzett pénzzel tudja fejleszteni a felhasználó a tárgyait melyekkel a horgászós példánál maradva egyre gyorsabban ttudja kifogni a számára kívánt halakat.
	Szeretnénk a rendszerbe építeni egy felhasználói profilt is melyben a játékos láthatja eddig elért teljesítményeit és adott területen elért fejlődését is, a pénzét és tapasztalati pontjait.

## Funkcionális követelmények
	
### Profil rendszer: 
- Megtekinthetőek a felhasználók adatai. 
- Játékban eltöltött ideje.
- Adott tevékenységekben elért szintjei, eszközei. 
- A játékos rendelkezésre álló pénze.

### Piac rendszer: 
- Egy-egy tevékenységhez a megfelelő tárgyak vásárlása, fejlesztése. 
- Saját megszerzett tárgyak eladása. 

### Halászat rendszere: 
- Adott halak folyamatos megjelenítése. 
- Kifogásuk szinthez kötése. 
- Fejlődés jelzése.
- Sikeres kifogás jelzése.

### Pálinkafőzés rendszer:
		
#### 3 féle pálinka elkészítése:
- Barack
- Körte
- Szilva
- Sikeres pálinkafőzés jelzése
- Hangeffektusok főzés közben
- Főzési idő szinthez kötése

### Looting rendszere:
- Lehetséges nyersanyag szerő helyek megjelenítése: 
- Bolt, mások házai, emberek az utcán, szupermarket, közintézmények.
- Sikeres fosztogatás jelzése.
- Adott dolgok adott helyen való megtalálhatósága. 
- (így a játékos csak egy adott helyről adott nyersanyagot tud megszerezni)


## Rendszerre vonatkozó törvények, szabványok, ajánlás
### Rendszerszabványok:

#### Kommunikáció és feladatkövetés
- Trello
- Discord
- Messenger

#### Verziókövetés
- Git
- Github
- Github Desktop
- Gitkraken

#### Kódszerkesztők
- Sublime text
- Visual studio code
- Atom
- Notepad++

#### Szerver
- xampp 3.2.4
- wamp

#### Nyelvek és könyvtárak
- PHP 7.4.10
- Javascript
- Jquery
- Noje.js
- HTML
- CSS
- Javascript

#### Adatbázis
- php.MyAdmin

## Jelenlegi üzleti folyamatok modellje
### Feliratkozás alapú rendszerek
- A felhasználó fizet egy meghatározott játékidőért -> Játszik a játékkal -> A játékmodell miatt egyfajta napi szokássá fejlődik a játék -> A fizetett játékidő lejár
- A szokás erőssége miatt nagy eséllyel megújítja a feliratkozást
- **Előny:** Általában játékon belüli valutával beváltható a feliratkozás. Folytonos támogatottsága van a játéknak míg a cég reputációja megfelelő.
- **Hátrány:** Nagyon drága lehet hosszú távon ha nem fektet bele elég időt a felhasználó. Egyfajta dependenciát válthat ki a játékmodell, mely kényszeríti a minden napos játékra.

### Megvétel alapú rendszerek
- A felhasználó fizet az alap játékért -> Annyi ideig játszik vele ameddig kíván
- Általában plusz tartalmat szoktak ezek a játékokhoz gyártani, melyet újabb fizetés után érhet el a felhasználó
- **Előny:** Megadott ár egyszeri fizetése, előre tudjuk miért fizetünk.
- **Hátrány:** A játék támogatottsága nem hosszú idejű.

###  Ingyenes rendszerek
- A felhasználó ingyen elérheti a játékot.
- Monetizációra három lehetőség gyakori: kinézetek eladása, gambling, pay-to-win elemek.
- **Előny:** A felhasználótól függ a költött összeg. Hosszú támogatottság a jó monetizáció miatt.
- **Hátrány:** Ha pay-to-win elemekkel rendelkezik a játék költekezés nélkül nem olyan élvezetes. Gambling függőséget okozhat ami komoly probléma.

## Igényelt üzleti folyamatok

### Célok
- Átlátható felhasználói felület készítése a játékhoz
- Élvezetes játékmenet megvalósítása
- Az aktivitás általános felpezsdítése az ügyfél website-ján
- Nagyob, közösségre alapuló projektek lehetőségeinek megteremtése (pl.: fórum)

### Előnyök
- Új játékosbázis
- Régi játékosok visszacsábítása a platformra
- Új promóciós lehetőségek
- A játék jellegéből adódóan: népszerűség internetes tartalomgyártók körében

## Követelménylista

### Funkcionális követelmények
- Navigáció: fontos egy praktikusan használható navigációs szegmens kialakítása, melyen keresztül a felhasználó egyszerűen és gyorsan tud váltani az applikáció funkciói között. A tervek szerint a profilt, boltot, admin panelt és hasonló funkciókat egy felső navigációs szegmensből, a tényleges játékmenetet magába foglaló kisebb alkalmazásokat pedig egy oldalt elhelyezkedő navigációs szegmensen keresztül lehet majd elérni.
- Admin panel: csak az "admin" szintű felhasználó számára jelenik meg ez a fül, a lényege, hogy az admin be tud állítani magának bizonyos szinteket és értékeket a játékon belül (pl.: pecázási szint, pénzmennyiség). Ennek a funkciónak az elsődleges célja az applikáció többrétűen történő demonstrálásának az elősegítése.
- Bolt: a felhasználó itt tud kereskedni az általa megszerzett vagy előállított erőforrásokkal, továbbá bizonyos játékokhoz itt tud felszerelést vásárolni. A játékmenetet elősegítő dolgokat is tud vásárolni, pl.: az eladási árnál drágábban tud halat venni. Az árukészlet bizonyos időközönként frissül.
- Profil: a felhasználó itt a felhasználói fiókkal kapcsolatos beállításokat végezheti el.
- Játékmenet: az erőforrások beszerzését, azok hasznosítását, illetve a játékos szintjének növelését a játék ehhez kapcsolódó alfunkcióiban lehetséges kivitelezni, például pecázni a pecázós appban lehet, pálinkát főzni pedig a pálinkafőzdében. Ezen-appokhoz fűződnek a készségi szintek is.

### Nem funkcionális követelmények
- Ikonok használata az egyes erőforrások leltárban és boltban való reprezentálására.
- Felhasználóbarát grafikus interface kialakítása, melyet könnyű átlátni és kezelni.
- Poszt-apokaliptikus hangulat megteremtése a design egyes elemeit illetően, illetve egyedi, játékelemmel kapcsolatos kinézet kialakítása al-applikációnként.
- Reszponzív megjelenítés.

## Riportok
- Kivitelező: Kérem, mondja el mit szeretne!
- Megrendelő: Néha azon gondolkodom, hogyan lehetne a magyar szokásokat és jellegzetességeket megismertetni a fiatalokkal is.
- Kivitelező: Miért szeretné ezt?
- Megrendelő: Mert úgy gondolom, fontos, hogy tisztában legyünk a mivoltunkkal.
- Kivitelező: Vannak tervei a megvalósítást illetően?
- Megrendelő: Igen, egy szerepjátékot szeretnék a magyar emberekről, jellegzetességeikről és szokásaikról.
- Kivitelező: Mindezt egy webalkalmazással lenne a legjobb elkészíteni, ahol több játékos is játszhatna.
- Megrendelő: Igen, ez talán megkönnyíthetné a játék elterjedését.
- Megrendelő: Azt szeretném, ha az eddigi játékfejlesztésből eredő tapasztalatainak a legjobbjait használná fel az applikáció elkészítése során.
- Kivitelező: Rendben, a legjobb tudásunk szerint fogunk cselekedni.

## Fogalomtár

### Fogalmak:
 - RPG: Role Playing Game Egy adott stílusú szerepjáték meghatározására használt kifejezés.
 - Monetizáció: A mostani játékokba beépített pénzorientáltság. Mely nem a játék élményre fúkuszál,
 				hanem a játékos pénzköltésére.
 - Looting: Az ilyen típusú játékok egyik eleme, a közből vagy másoktól erőszakkal elvett dolgokat jelenti.
	
