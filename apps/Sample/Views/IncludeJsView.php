
<?php
    echo Factory::getView("sample");
?>

<p id="sample"></p>

<?php
    /*Include a simple JS from directory into Module*/
    Route::getJs(array("Sample"), "Sample", array(), FALSE);
?>