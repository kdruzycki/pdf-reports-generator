<?php
require('auth.php');
?>
<form action="image_resizer.php" method="post" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit" />
</form>