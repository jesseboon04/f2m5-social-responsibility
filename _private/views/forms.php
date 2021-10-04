<?php $this->layout("layouts::website")?>

<h2>HTML Forms</h2>

<form action="<?php echo url('verwerktregistratie')?>" method="POST">
    <div class ="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="" class="form-control" id="email" aria-describedat="emailhelp"> 
        <small id="emailhelp" class="form-text text-muted" >Hier u mail</small>
    </div>
    <div class="form-group">
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
    </div>
    <button type="submit" class="btn btn-primary">Regristeren</button>
</form> 

