<?php


// echo "<pre>";
// print_r($film);
// echo "</pre>";

/*[film_id] => 10
            [title] => ALADDIN CALENDAR
            [description] => A Action-Packed Tale of a Man And a Lumberjack who must Reach a Feminist in Ancient China
            [release_year] => 2006
            [language_id] => 1
            [original_language_id] => 
            [rental_duration] => 6
            [rental_rate] => 4.99
            [length] => 63
            [replacement_cost] => 24.99
            [rating] => NC-17
            [special_features] => Trailers,Deleted Scenes
            [last_update] => 2006-02-15 05:03:42*/

$templatetable=array('table_open'=>'<table class="table table-striped" id="filmtable">');


$this->table->set_template($templatetable);

$this->table->set_heading('Title','Description','Release Year');

foreach ($film as $row) {
	$this->table->add_row($row->title,
		$row->description,
		$row->release_year);

}



echo $this->table->generate();
?>
<script type="text/javascript">
$(document).ready(function(){
    $('#filmtable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyFlash',
            'csvFlash',
            'excelFlash',
            'pdfFlash'
        ]
    });
});

</script>