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
                        <img src="<?=PATH_SVGS.'tin_can.svg'?>"><span> item1</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'lootingitem2.svg'?>"><span> item1</span>
                        </a>
                        <button class="btn">loot</button>
                        </td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                    </tr>
                    <tr>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                    </tr>
                    <tr>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                        <td><button class="btn">loot</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>