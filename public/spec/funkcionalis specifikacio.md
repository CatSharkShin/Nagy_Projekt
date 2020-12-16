
# Funkcionális specifikáció

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

## Követelmény lista

### Jogosultság: 

#### 1.1 Regisztrációs felület: 
- A felhasználó a nevének és jelszavának megadásával regisztrálja
magát. Ha valamelyik adat ezek közül hiányzik vagy nem
felel meg a követelményeknek, akkor a rendszer értesítét küld.

#### 1.2  Bejelentkezési felület: 
- A felhasználó az email címe és a jelszava
segítségével bejelentkezhet.
Ha a megadott email cím vagy jelszó nem
egyezik a felhasználóéval, akkor hibaüzenet jelenik meg.
#### 1.3 Jogosultsági szintek:
- Admin: Bejelentkezés regisztráció. 
Felhasználók módósítása törlése felülírása. 
Játék és minden funkciójának tesztelése.
Játékos/Alap felhasználó: Bejelentkezés regisztráció.
Teljes játékélmény minden funkciója.

### Modifikáció:
    
#### Admin modifikációk:
- Az admin módosítani tudja a felhasználók nevét jelszavát.
Valamint minden játékban szerzett eredményét. Ez egyaránt használható 
büntetésre és jutalmazásra is.

### Felület:

#### Pénz: 
- Megmutatja a játékos pénzét, hogy mire használhatja fel.

#### Profil:
- Megmutatja a játékos profilját és minden eddig elért mesterségét és eredményét.

#### Szint:
- Megmutatja a játékos szintjét és az ezzel járó bónuszokat.

#### Kijelentkezés:
- Kijelentkezik a felhasználó profiljából

#### Egyes játékszekciók:
- A játék egy egy funkciójához vezető oldalra lép.

#### Admin panel:
- csak az admin szintű felhasználó számára jelenik meg ez a fül, a lényege, hogy az admin be tud állítani magának bizonyos szinteket és értékeket a játékon belül

## Jelenlegi üzleti folyamatok modellje

### Az alábbi üzleti folyamatmodellt kell átalakítani az Igényelt üzleti folyamatok modellje c. fejezet alapján:
- A megrendelő olyan weboldalt üzemeltet, amelyen különféle játékokat lehet játszani
- A játékokban szerzett pénzt valós ajándékokra lehet beváltani
- A pénz a felhasználói fiókon gyűlik
- Az ajándékokat promóciókból, reklámokból biztosítják
- Az ügyfél nem elégedett az aktív felhasználók számával és a profittal
- Az iménti probléma a játékok elavultságából ered -- már nincs ezekre a műfajokra akkora kereslet
- A játékoshiány kiküszöbölése érdekében szeretne megcélozni egy új csoportot egy úgy játékkal

## Igényelt üzleti folyamatok modellje

A játékokkal kapcsolatos elvárások és igények kielégítésére az ügyfél website-ja már kevésbé alkalmas, mint korábban, 
aminek következtében csökkent az aktív felhasználóinak száma. Az emberek manapság sokkal inkább érdeklődnek az RPG
jellegű játékok felé, épp ezért a cél egy ilyen jellegű játék létrehozása, mely alkalmazkodik az eddigi üzleti folyamatokhoz: 
van benne pénzszerzési lehetőség, illetve a régi felhasználók fiókjaiból is lehet használni a játékot, ezáltal egy újabb,
szórakoztatóbb lehetőséget teremtve az ajándékok megszerzésére.
### Célok
- Átlátható felhasználói felület készítése a játékhoz
- Élvezetes játékmenet megvalósítása
- Az aktivitás általános felpezsdítése az ügyfél website-ján
- Nagyob, közösségre alapuló projektek lehetőségeinek megteremtése (pl.: fórum)
- Többféle eszközről is játszható játék, ami növeli a népszerűséget
- Kizárólag regisztrált fiókok támogatása az ajándékok beváltását illetően, ami növeli a nyilvántarthatóságot
- Korábbi felhasználói fiókokkal való kompatibilitás
### Előnyök
- Új játékosbázis
- Régi játékosok visszacsábítása a platformra
- Új promóciós lehetőségek
- Új ajándékok
- Nagyobb profit
- A játék jellegéből adódóan: népszerűség internetes tartalomgyártók körében

## Használati esetek

### Ábra
- A felhasználó a bejelentkezést követően eljut a kezdőképernyőre
- Adminként szintű felhasználóként hozzáférhet az admin panelhez
- Normál szintű felhasználóként hozzáférhet a bolthoz és a profiljához
- Normál szintű felhasználóként hozzáférhet a játékmenet appjaihoz
- Ha be van jelentkezve, akkor megjelenik a kijelentkezés fül
![Használati esetek](../images/hasznalati_esetek.png)

## Megfeleltetés

## Képernyő tervek

### Horgászós app
![Használati esetek](../images/FishingScreen.png)

### Pálinkafőző app
![Használati esetek](../images/palinkafozo_kepernyoterv.png)

## Forgatókönyv

## Funkció - követelmény megfeleltetés
    Jelenlegi követelményeinket megfeleltető funkciók:
    A felhasználói regisztráció funkció.
    A felhasználói bejelentkezés funkció.
    A jogusultsági rendszer funkciói.
    A halászat mint játék szekció funkciói.
    Pálinkafőzés játék szekció funkciói.
    Looting játék szekció funkciói.

## Fogalomszótár
  - Admin:
     A felhasználók fölött álló vezető profil
  - Platform:
     A felület szakkifejezésére használt szakszó.
  - Website:
     A felület neve ahol az aplikáció futni fog.
  - Profil:
     A felhasználó adatlapja.
  - RPG:
    Role Playing Game Egy adott stílusú szerepjáték meghatározására használt kifejezés.
 - Monetizáció:
    A mostani játékokba beépített pénzorientáltság. Mely nem a játék élményre fúkuszál,
 				hanem a játékos pénzköltésére.
 - Looting:
    Az ilyen típusú játékok egyik eleme, a közből vagy másoktól erőszakkal elvett dolgokat jelenti.
