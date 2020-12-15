<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <script>
            var date = new Date();
            var lootfinishdate = new Date();

            var hours = 0;
            var minutes = 0;
            var seconds = 0;

            function Time(time, btnid) {

                distance = time * 60;

                if(time > 60){
                    hours = time / 60;
                }
                else hours = 0;

                if(hours == 0 && time <= 59){
                    minutes = time;
                }
                else minutes = 0;
                
                if (minutes == 0 && distance < 59){
                    seconds = distance;
                }
                else seconds = 0;

               var x = setInterval(function() {
    
                 seconds--;
                    if (seconds <= 0){
                        seconds = 59;
                        minutes--;
                       if (minutes <= 0) {
                           minutes = 59;
                           hours--;
                       }
                   }
                   distance--;

                   document.getElementById(btnid).innerHTML = hours + ":" + minutes + ":" + seconds;
    
                   if (distance <= 0) {
                     clearInterval(x);
                     document.getElementById(btnid).innerHTML = "Kész!";
                   }
              }, 1000);

             document.getElementById(btnid).setAttribute('disabled','disabled');
            }

            if (date.getHours >= lootfinishdate){
               document.getElementById(btnid).setAttribute('enabled','enabled');
            }
            
    </script>
        <div class="looting-container">
            <div class="items">
                <br>
                Items
               <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 1</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 2</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 3</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 4</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 5</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 6</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 7</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 8</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 9</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 10</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 11</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 12</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 13</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 14</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> looted item 15</span>
                        </a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="looting">
                <br>
                Looting
                <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 1</span>
                        <br>
                        </a>
                        <button id="btn_loot_1" class="btn" onclick="Time(5,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 2</span>
                        <br>
                        </a>
                        <button id="btn_loot_2" class="btn" onclick="Time(10,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 3</span>
                        <br>
                        </a>
                        <button id="btn_loot_3" class="btn" onclick="Time(12,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span>bolt 4</span>
                        <br>
                        </a>
                        <button id="btn_loot_4" class="btn" onclick="Time(15,this.id)">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 5</span>
                        <br>
                        </a>
                        <button id="btn_loot_5" class="btn" onclick="Time(18,this.id)">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 6</span>
                        <br>
                        </a>
                        <button id="btn_loot_6" class="btn" onclick="Time(20,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 7</span>
                        <br>
                        </a>
                        <button id="btn_loot_7" class="btn" onclick="Time(22,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 8</span>
                        <br>
                        </a>
                        <button id="btn_loot_8" class="btn" onclick="Time(25,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 9</span>
                        <br>
                        </a>
                        <button id="btn_loot_9" class="btn" onclick="Time(28,this.id)">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 10</span>
                        <br>
                        </a>
                        <button id="btn_loot_10" class="btn" onclick="Time(30,this.id)">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 11</span>
                        <br>
                        </a>
                        <button id="btn_loot_11" class="btn" onclick="Time(33,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 12</span>
                        <br>
                        </a>
                        <button id="btn_loot_12" class="btn" onclick="Time(35,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 13</span>
                        <br>
                        </a>
                        <button id="btn_loot_13" class="btn" onclick="Time(40,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 14</span>
                        <br>
                        </a>
                        <button id="btn_loot_14" class="btn" onclick="Time(45,this.id)">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <br>
                        <span> bolt 15</span>
                        <br>
                        </a>
                        <button id="btn_loot_15" class="btn" onclick="Time(50,this.id)">loot</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
