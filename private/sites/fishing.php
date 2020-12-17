<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>

        <!-- Alapstruktúra: -->

        <!-- Inventory: -->
        

        
        <div class="fishing-container">
            <div class="exp-bar">
                <div class="exp-fill" id="exp-fill">
                
                </div>
            </div>
            <div class="fishing fishing-grid-container">
                <div class="levels_area">
                    <div>
                        Pecabot szint: 
                        <span id="fish_rod">0</span>
                    </div>
                    <div>
                        Csali szint: 
                        <span id="bait">0</span>
                    </div>
                    <div id="fishing_level">Horgászási szint</div>
                </div>
                <div class="msgs_area">
                    <div id="msg">Üzenetek</div>
                </div>
                <div class="fishing_area">
                    <button class="btn" id="fishing_button">Horgászat</button>
                </div>
            </div>
            <div id="fishing-inventory" class="fishing-inventory">
                <?php 
                    generateInventory('fishing-inventory',getItems());
                 ?>
                <!--<table>
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
        </table>-->
            </div>
        </div>

        <script>
            // Szükséges html elemek eltárolása változóban:
            let exp_bar = document.getElementById("exp_bar");
            let fishing_level = document.getElementById("fishing_level");
            let fishing_button = document.getElementById("fishing_button"); 
            let fish_rod = document.getElementById("fish_rod");
            let bait = document.getElementById("bait");
            let exp_fill = document.getElementById("exp-fill");

            // Segédváltozók:
            let fishingExp = 7200; // ezt a session-ből kell majd lekérni, teszt jellegű szám
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

            // Kattintásra elindul a pecázás:
            fishing_button.addEventListener('click', function() {
                fishingProcedure();
            });

            // Itt zajlik le a pecázás az elejétől a végéig (csali bedobásától a hal kifogásáig):
            function fishingProcedure() {
                isCurrentlyFishing(true);
                serverMessage("gray", "msg", "Csali bedobva...");
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
                if (fishingLevel == 1) {
                    fishLevel = 1;
                } else if (fishingLevel == 2) {
                    fishLevel = 2;
                } else {
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

            // Várakozás function (ms):
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
                    // Kifogott szintű hal számának növelése 1-el az adatbázis inventoryban
                    gainFishingExp(fishLevel);
                    displayItems();
                    serverMessage("green", "msg", fishLevel + ". szintű kifogva!");
                    addFish(fishLevel);
                } else {
                    serverMessage("gray", "msg", "Couldn't catch the fish...");
                }
            }
            function addFish(fishLevel){
                var uid = getCookie("uid");
                $.ajax({
                    type: "POST",
                    url: 'private/actions/async.php',
                    dataType: 'json', // type of response data
                    data: {
                            action: 'fishing',
                            id: uid,
                            fish_level: fishLevel,
                        },
                    success: function (data,status,xhr) {
                        $(document).ready(function () {
                            console.log(data);
                        }
                        )
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        var parsedErrorMEssage = $.parseJSON(errorMessage); 
                        console.log('Error: ' + parsedErrorMEssage);
                    },
                });
            }

            // Exp szerzése hal szintje alapján:
            function gainFishingExp(fishLevel) {
                
                // Szükséges exp kövi szinthez: mindig 2x annyi, mint az előzőhöz, első szint: 1000 (kb. 1 óra); uccsó: 512000
                let expToGain = 0;

                if (fishLevel + 2 == fishingLevel) {
                    expToGain = 22;
                } else if (fishLevel + 1 == fishingLevel) {
                    expToGain = 33;
                } else if (fishLevel == fishingLevel) {
                    expToGain = 55;
                } else if (fishLevel - 1 == fishingLevel) {
                    expToGain = 155;
                } else {
                    expToGain = 355;
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
                expPerCent = (expGainedCurrentLvl / expBarSegments) * 100;
                exp_fill.innerHTML = "Exp to next level: " + max.toString() + "/" + expGainedCurrentLvl;
                fishing_level.innerHTML = "Pecázási szint: " + fishingLevel.toString();
                
                exp_fill.style.width = `${expPerCent}%`;
            }

            // Szerver üzenetek a felhasználó számára:
            function serverMessage(color, elementId, message) {
                htmlElement = document.getElementById(elementId);
                htmlElement.style.color = color;
                htmlElement.innerHTML = message.toString();
            }

            // Itemek számának megjelenítése:
            function displayItems() {
                currentFishingRod = fishingLevel;
                currentBait = fishingLevel;
                fish_rod.innerHTML = currentFishingRod;
                bait.innerHTML = currentBait;

                // Minden td elementnek van külön id-je, amikbe bele lehet tölteni az adatbázisból a számokat (simán id.innerHTML = sessionszám mindre)
            }
        </script>
    </body>
</html>