<?php if(IsUserLoggedIn()):?>

<a href="?p=fishing" class="app-item">
    <img src="<?=PATH_SVGS.'catfish.svg'?>"><span> Horgászat</span>
</a>
<a href="?p=brewing" class="app-item">
    <img src="<?=PATH_SVGS.'brandy.svg'?>"><span> Pálinkafőzés</span>
</a>
<a href="?p=looting" class="app-item">
    <img src="<?=PATH_SVGS.'market.svg'?>"><span> Zsákmányolás</span>
</a>
<?php  else: ?>
    <a href="?p=login" style="">A játék eléréséhez be kell lépni</a>
<?php endif; ?>