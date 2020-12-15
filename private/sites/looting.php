<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div class="looting-container">
            <div class="items">
                Items
               <!--
                itt szeretném megjeleníteni az adott itemeket 
                amiket a karakter kap a looting során
               -->
               <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>"><span> looted item 1</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>"><span> looted item 2</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>"><span> looted item 3</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>"><span> looted item 4</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'looteditem.svg'?>"><span> looted item 5</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
                    </tr>
                    <tr>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
                        <td>item</td>
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
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>"><span> bolt 1</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>"><span> bolt 2</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>"><span> bolt 3</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>"><span> bolt 4</span>
                        </a>
                        <button class="btn">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>"><span> bolt 5</span>
                        </a>
                        <button class="btn">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>"><span> bolt 6</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>"><span> bolt 7</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>"><span> bolt 8</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>"><span> bolt 9</span>
                        </a>
                        <button class="btn">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>"><span> bolt 10</span>
                        </a>
                        <button class="btn">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>"><span> bolt 11</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop2.svg'?>"><span> bolt 12</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop3.svg'?>"><span> bolt 13</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop4.svg'?>"><span> bolt 14</span>
                        </a>
                        <button class="btn">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingshop5.svg'?>"><span> bolt 15</span>
                        </a>
                        <button class="btn">loot</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>