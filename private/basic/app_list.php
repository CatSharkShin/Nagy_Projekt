<?php if(IsUserLoggedIn()):?>

<a href="?p=fishing" class="app-item">
    <img src="<?=PATH_SVGS.'catfish.svg'?>"><span> Horgászat</span>
</a>
<?php  else: ?>
    <a href="?p=login" style="">A játék eléréséhez be kell lépni</a>
<?php endif; ?>