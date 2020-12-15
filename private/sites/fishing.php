<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
         <div id="fishing_level">Fishing level</div>
        <div id="exp_bar">Exp bar</div>
        <div id="msg">Messages</div>
        <button class="btn" id="fishing_button">Fishing</button>
        <div>Fishing Rod lvl:</div>
        <div id="fish_rod">0</div>
        <div>Bait lvl:</div>
        <div id="bait">0</div>
        <table>
            <tbody>
                <tr>
                    <td>
                        <a><img src="<?=PATH_SVGS.'fish.svg'?>"><span id="fid1">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'fish2.svg'?>"><span id="fid2">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'clown_fish.svg'?>"><span id="fid3">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'ballfish.svg'?>"><span id="fid4">0</span></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a><img src="<?=PATH_SVGS.'koi.svg'?>"><span id="fid5">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'angler_fish.svg'?>"><span id="fid6">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'catfish.svg'?>"><span id="fid7">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'catshark.svg'?>"><span id="fid8">0</span></a>
                    </td>
                </tr>
                <tr>
                     <td>
                        <a><img src="<?=PATH_SVGS.'swordfish.svg'?>"><span id="fid9">0</span></a>
                    </td>
                    <td>
                        <a><img src="<?=PATH_SVGS.'shark.svg'?>"><span id="fid10">0</span></a>
                    </td>
                     <td>
                        <a><img src="<?=PATH_SVGS.'old_boots.svg'?>"><span id="fid11">0</span></a>
                    </td>
                     <td>
                        <a><img src="<?=PATH_SVGS.'tin_can.svg'?>"><span id="fid12">0</span></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Korábbi HTML struktúra:
        <div class="fishing-container">
            <div class="exp-bar">
                <div class="exp-fill" id="exp-fill">
                Experience bar</div>
            </div>
            <div class="fishing">
                <div style="margin: auto;">
                    Fishing stuff
                </div>
            </div>
            <div class="fishing-inventory">
                Inventory
            </div>
        </div>
        -->

        <script>
            // Szükséges html elemek eltárolása változóban:
            let exp_bar = document.getElementById("exp_bar");
            let fishing_level = document.getElementById("fishing_level");
            let fishing_button = document.getElementById("fishing_button"); 
            let fish_rod = document.getElementById("fish_rod");
            let bait = document.getElementById("bait");

            // Segédváltozók:
            let fishingExp = 28000;
            let fishingLevel = 0;
            let expBarSegments = 0;
            let expGainedCurrentLevel = 0;
            let currentFishingRod = 0;
            let currentBait = 0;
            
            // Setup:
            displayExpBarAndLevel(fishingExp);
            currentFishingRod = fishingLevel;
            currentBait = fishingLevel;
            displayItems();

            // Ha fel van szerelve a horgászbot és a csali akkor kattintásra elindul a pecázás:
            fishing_button.addEventListener('click', function() {
                fishingProcedure();
            });

            // Itt zajlik le a pecázás az elejétől a végéig (csali bedobásától a hal kifogásáig):
            function fishingProcedure() {
                serverMessage("gray", "msg", "Csali bedobva...");
                isCurrentlyFishing(true);
                let fishLevel = decidingHookedFishLevel(fishingLevel, currentBait);
                let waitingTime = waitingForFish(fishLevel);
                sleep(3 * (waitingTime / 4)).then(() => {
                    serverMessage("gray", "msg", "Valami horogra akadt...");
                    sleep(waitingTime / 4).then(() => {
                        catchingFish(currentFishingRod, fishLevel);
                        isCurrentlyFishing(false);
                    });
                });
            }

            // Grafikus interface megfelelő megjelenítése attól függően, hogy épp be van-e dobva a csali:
            function isCurrentlyFishing(isFishing) {
                if (isFishing) {
                    fishing_button.disabled = true;
                } else {
                    fishing_button.disabled = false;
                }
            }

            // Itt dől el, mekkora szintű hal akad majd horogra -- utóbbi értékkel tér vissza:
            function decidingHookedFishLevel(fishingLevel, bait) {
                
                // Megegyező csali és pecázási szintél halak horogra akadása kisebbtől nagyobb szintűig: (37%, 29%, 22%, 8%, 4%)
                let rnd = Math.floor(Math.random() * 1001);
                let lvlDiff = bait - fishingLevel;
                let fishLevel = 0; 

                // Kisebb szintű csalinál esélyek változása szintkülönbségekként (+3%, +2%, +1%, -4%, -2%) -- vice versa
                if ((630 + lvlDiff * 30) < rnd && rnd < 1000) {
                    fishLevel = fishingLevel - 2;
                } else if ((340 + lvlDiff * 50) < rnd && rnd < (630 + lvlDiff * 30)) {
                    fishLevel = fishingLevel - 1;
                } else if ((120 + lvlDiff * 60) < rnd && rnd < (340 + lvlDiff * 50)) {
                    fishLevel = fishingLevel;
                } else if ((40 + lvlDiff * 20) < rnd && rnd < (120 + lvlDiff * 60)) {
                    fishLevel = fishingLevel + 1;
                } else {
                    fishLevel = fishingLevel + 2;
                }

                return fishLevel;
            }

            // Minél nagyobb szintű hal akad majd horogra, annál több mp-et kell rá várni:
            function waitingForFish(fishLevel) {
                
                let rnd = 0;

                if (fishLevel < 0) {
                    rnd = Math.floor(Math.random() * (9 - 5) ) + 5;
                } else if (fishLevel == 0) {
                    rnd = Math.floor(Math.random() * (16 - 10) ) + 10;
                } else {
                    rnd = Math.floor(Math.random() * (26 - 18) ) + 18;
                }

                return rnd * 1000;
            }

            // sleep time expects milliseconds
            function sleep (time) {
                return new Promise((resolve) => setTimeout(resolve, time));
            }

            // Hal kifogása:
            function catchingFish(fishingRod, fishLevel) {
                 // Horogra akadt halak kifogási esélyei a legkissebtől a legnagyobb szintűig (90%, 70%, 50%, 20%, 10%)

                let rnd = Math.floor(Math.random() * 101);
                let catchChance = 0;

                // Kisebb esélytől a nagyobbig (az első ág pl.: 100-90 = 10% esély, a második ág 100-70 = 30% esély...):
                if (fishLevel + 2 == fishingLevel) {
                    catchChance = 90;
                } else if (fishLevel + 1 == fishingLevel) {
                    catchChance = 70;
                } else if (fishLevel == fishingLevel) {
                    catchChance = 50;
                } else if (fishLevel - 1 == fishingLevel) {
                    catchChance = 20;
                } else {
                    catchChance = 10;
                }
                
                // Pecabot szintentként +5%:
                if (rnd <= (catchChance + fishingRod * 5)) {
                    // let fishName = "valami"; - Adatbázisból lekéri a hal nevét, ahol egyezik az itteni fishLevel-el a szint
                    // addPlusOneItem(fishLevel);
                    // displayItems();
                    serverMessage("green", "msg", fishLevel + " szintű kifogva!");
                    gainFishingExp(fishLevel);
                } else {
                    serverMessage("gray", "msg", "Couldn't catch the fish...");
                }
            }

            // Exp szerzése hal szintje alapján:
            function gainFishingExp(fishLevel) {
                
                // Szükséges exp kövi szinthez: mindig 2x annyi, mint az előzőhöz, első szint: 1000 (kb. 1 óra); uccsó: 512000
                let expToGain = 0;

                if (fishLevel + 2 == fishingLevel) {
                    expToGain = 20;
                } else if (fishLevel + 1 == fishingLevel) {
                    expToGain = 30;
                } else if (fishLevel == fishingLevel) {
                    expToGain = 50;
                } else if (fishLevel - 1 == fishingLevel) {
                    expToGain = 150;
                } else {
                    expToGain = 350;
                }

                fishingExp += expToGain;
                displayExpBarAndLevel(fishingExp);
            }

            // Exp bar megjelenítése és fishing level beállítása:
            function displayExpBarAndLevel(fishingExp) {
                
                let min = 0;
                let max = 1000;
                let diff = 1000;
                fishingLevel = 1;

                // 511000 a maximum elérhető exp
                if (!(fishingExp > 511000)) {
                    while(fishingExp > max) {
                        min = max;
                        max += diff * 2; // Az exp bar intervalluma mindig az előző kétszerese
                        diff = max - min;
                        fishingLevel++;
                    }
                } else {
                    fishingLevel = 10;
                    diff = 1;
                }

                expBarSegments = diff;
                expGainedCurrentLvl = fishingExp - min;
                exp_bar.innerHTML = "Segments: " + diff.toString() + " Exp to next level: " + max.toString() + "/" + expGainedCurrentLvl;
                fishing_level.innerHTML = "Pecázási szint: " + fishingLevel.toString();
            }

            // Szerver üzenetek a felhasználó számára:
            function serverMessage(color, elementId, message) {
                htmlElement = document.getElementById(elementId);
                htmlElement.style.color = color;
                htmlElement.innerHTML = message.toString();
            }

            // Itemek számának megjelenítése:
            function displayItems() {
                fish_rod.innerHTML = currentFishingRod;
                bait.innerHTML = currentBait;
            }
        </script>
    </body>
</html>