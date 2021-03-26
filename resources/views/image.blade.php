<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Upload</title>
</head>
<body>
<?php
echo Form::open(array('action' => 'ImagesController@store','enctype'=>'multipart/form-data')) ;
echo Form::label('nume', 'Nume: ');
echo Form::text('nume')."<br><br>";

echo Form::label('image', 'Image: ');
echo Form::file('image')."<br><br>";

echo Form::submit('Upload');
echo Form::close();
?>

</body>
</html>
