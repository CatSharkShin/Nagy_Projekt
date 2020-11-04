<?php if(IsUserLoggedIn()):?>

<a href="?p=svgs" class="app-item">
    <img src="<?=PATH_SVGS.'koi.svg'?>"><span> Ikonok</span>
</a>
<a href="?p=svgs" class="app-item">
    <img src="<?=PATH_SVGS.'catfish.svg'?>"><span> Ikonok</span>
</a>
<a href="?p=svgs" class="app-item">
    <img src="<?=PATH_SVGS.'catshark.svg'?>"><span> Ikonok</span>
</a>

<?php  else: ?>
    <a href="?p=login" style="">A játék eléréséhez be kell lépni</a>
<?php endif; ?>