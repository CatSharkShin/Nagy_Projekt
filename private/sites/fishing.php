<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/public/css/style.css">
        <script src="public/js/fishing.js"></script>
    </head>
    <body>
        <div class="fishing_level">Fishing level</div>
        <div class="exp_bar">Exp bar</div>
        <div class="msg_class">Messages</div>
        <button class="fishing_button">Fishing</button>
        <div class="fish_rod_button">Fishing Rod</div>
        <div class="bait_button">Bait</div>
        <table>
            <tbody>
                <tr>
                    <td>
                        <a><img src="<?=PATH_SVGS.'fish1.svg'?>"><span id="fid1">0</span></a>
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
    </body>
</html>


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