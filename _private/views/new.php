<?php $this->layout("layouts::website")?>

<h1>Post toevoegen</h1>
<form action="<?php echo url('topics/new')?>" method="POST">

    <div>
        <label for="title">Title</label><br>
        <input type="text" name="title" value="<?php echo input('title')?>" class="form-controller" id="title">
        <?php if (isset( $errors['title'])):?>
            <span class="error"><?php echo $errors['title'] ?></span>
        <?php endif; ?>
    </div>

    <div>
        <label for="title">Discription</label>
        <textarea name="desc" id="desc" class="form-control">
            <?php echo input('desc')?>
        </textarea>
        <?php if (isset( $errors['desc'])):?>
            <span class="error"><?php echo $errors['desc'] ?></span>
        <?php endif; ?>
    </div><br>
    <button type="submit">Opslaan</button>  
</form>

<p>
    <a href="<?php echo url('topics')?>">terug naar overzicht</a>
</p>