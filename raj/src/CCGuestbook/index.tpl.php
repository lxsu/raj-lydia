<h1>Gästboks exempel</h1>
<p>Visar implementerad gästbok i RaJ</p>

<form action="<?=$form_action?>" method='post'>
  <p>
    <label>Meddelande: <br/>
    <textarea name='newEntry'></textarea></label>
    <input type='hidden' name='email' />
  </p>
  <p>
    <input type='submit' name='doAdd' value='Skicka meddelande' />
    <input type='submit' name='doClear' value='Ta bort allt' />
    <input type='submit' name='doCreate' value='Skapa databastabell' />
  </p>
</form>

<h2>Meddelanden</h2>

<?php foreach($entries as $val):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <p>At: <?=$val['created']?></p>
  <p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;?>