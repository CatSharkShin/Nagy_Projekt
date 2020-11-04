<?php if(IsUserLoggedIn()):?>
    <a href=""><img src="<?=PATH_SVGS.'fish.svg'?>"> Horgászat</a>
<?php  else: ?>
    <a href="?p=login" style="">A játék eléréséhez be kell lépni</a>
<?php endif; ?>