<h1>Blogg</h1>
<p>Läs mina inlägg</p>

<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
    <h2><?=esc($val['title'])?></h2>
    <p class='smaller-text'><em>Postad <?=$val['created']?> by <?=$val['owner']?></em></p>
    <p><?=filter_data($val['data'], $val['filter'])?></p>
    <p class='smaller-text silent'><a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a></p>
  <?php endforeach; ?>
<?php else:?>
  <p>Tomt. Här finns inga poster.</p>
<?php endif;?>

