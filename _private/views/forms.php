<?php $this->layout("layouts::website")?>

<h2>HTML Forms</h2>

<form action="<?php echo url('verwerktregistratie')?>" method="POST">
    <div class ="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo input('email')?>" class="form-control" id="email" aria-describedat="emailhelp"> 
        <small id="emailhelp" class="form-text text-muted" >Hier u mail</small>
        <?php if ( isset ($errors['email'])):?>
            <?php echo  $errors["email"]?>
        <?php endif;?>        
    </div>
    <div class="form-group">
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
        <?php if ( isset ($errors['wachtwoord'] ) ):?>
            <?php echo $errors['wachtwoord'] ?>
        <?php endif;?>  
    </div>
    <button type="submit" class="btn btn-primary">Regristeren</button>
</form> 

