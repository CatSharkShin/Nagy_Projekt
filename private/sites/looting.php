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
                //lootfinishdate = date.GetHours() + time / 60;

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
                Items
               <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <span> looted item 1</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 2</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 3</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 4</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 5</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 6</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 7</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 8</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 9</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 10</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 11</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 12</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 13</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 14</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>">
                        <span> looted item 15</span>
                        </a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="looting">
                Looting
                <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>">
                        <span> bolt 1</span>
                        </a>
                        <button id="btn_loot_1" class="btn" onclick="Time(5,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>">
                        <span> bolt 2</span>
                        </a>
                        <button id="btn_loot_2" class="btn" onclick="Time(10,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>">
                        <span> bolt 3</span>
                        </a>
                        <button id="btn_loot_3" class="btn" onclick="Time(12,this.id)">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>">
                        <span> bolt 4</span>
                        </a>
                        <button id="btn_loot_4" class="btn" onclick="Time(15,this.id)">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>">
                        <span> bolt 5</span>
                        </a>
                        <button id="btn_loot_5" class="btn" onclick="Time(18,this.id)">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>">
                        <span> bolt 6</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>">
                        <span> bolt 7</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>">
                        <span> bolt 8</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>">
                        <span> bolt 9</span>
                        </a>
                        <button class="btn">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>">
                        <span> bolt 10</span>
                        </a>
                        <button class="btn">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>">
                        <span> bolt 11</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>">
                        <span> bolt 12</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>">
                        <span> bolt 13</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>">
                        <span> bolt 14</span>
                        </a>
                        <button class="btn">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>">
                        <span> bolt 15</span>
                        </a>
                        <button class="btn">loot</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
