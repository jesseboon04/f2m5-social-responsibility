<?php $this->layout("layouts::website")?>



<h1>blog</h1>
<br>
<br>

<?php foreach($topics as $topic):?>
    <H3><?php echo $topic['title'];?></H2>
    <p  style="font-size: 20px;"><?php echo $topic['desc'];?></p><br><hr>
<?php endforeach;?>


<p>
    <a href="<?php echo url('topics/new')?>">Nieuwe post toevoegen</a>
</p>