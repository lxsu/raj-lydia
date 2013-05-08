<?php

/********
 * Inkluderar CForm
 ********/
include('../CForm/CForm.php');

class CFormContact extends CForm {
    
    public function __construct(){
        parent::__construct();
        
$this->AddElement(new CFormElementText('name'))
     ->AddElement(new CFormElementText('email'))
     ->AddElement(new CFormElementText('phone'))
     ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))))
     ->AddElement(new CFormElementSubmit('submit-fail', array('callback'=>array($this, 'DoSubmitFail'))));

$this->SetValidation('name', array('not_empty'))
     ->SetValidation('email', array('not_empty', 'email_adress'))
     ->SetValidation('phone', array('not_empty', 'numeric'));
}

protected function DoSubmitFail() {
  echo "<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>";
  return false;
  }
  
protected function DoSubmit(){
    $this->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
    $this->AddOutput("<p><b>Name: " . $this->Value('name') . "</b></p>");
    $this->AddOutput("<p><b>Email: " . $this->Value('email') . "</b></p>");
    $this->AddOutput("<p><b>Phone: " . $this->Value('phone') . "</b></p>");
    $this->saveInSession = true;
    return true;
    }
}

/********
 * Startar session och ger session ett namn
 ********/

session_name('cform_example');
session_start();
    
    $form = new CFormContact();
    $status = $form->Check();
    
if($status === true){
  $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
  header("Location: " . $_SERVER['PHP_SELF']);
}
    else if($status === false){
        $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
        header("Location: " . $_SERVER['PHP_SELF']);
}
?>

<!doctype html>
<meta charset=UTF-8>
        <title>CForm exempel. Enkelt exempel på hur man kan använda CForm</title>
        <h2>CForm exempel. Enkelt exempel på hur man kan använda CForm</h2>
<?=$form->GetHTML()?>

<p>
<code>$_POST</code>
<?php 
        if(empty($_POST)) {echo '<i>is empty,</i>';}
            else {echo '<i>contains:</i><pre>' . print_r($_POST, 1) . '</pre>';}
?>
</p>
