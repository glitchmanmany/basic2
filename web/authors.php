
<table class="table" >  
<tr><td>ID</th><th>ид</th><th>автор</th><th>
<?php
foreach($rows as $row) {
    echo "<tr><td>{$row['id']}<tr><td>{$row['name']}";
}
?>
</table>