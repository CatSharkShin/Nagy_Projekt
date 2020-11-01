<div class="message">
    <h1>Ez itt a home page</h1>
    <?php if(isset($_SESSION['uid'])): ?>
        <h2>Üdv <?=$_SESSION['uname']?></h2>
    <?php endif; ?>
</div>