<!DOCTYPE html>
<html lang="en">
    <head>
        <title>File Upload</title>
    </head>
    <body>
<?php
echo Form::model($image,array('url' => 'update/'.$image->id,'enctype'=>'multipart/form-data'));
echo Form::hidden('id')."<br><br>";
echo Form::label('title', 'Nume: ');
echo Form::text('title')."<br><br>";
echo Form::label('image', 'Image: ');
echo Form::file('image')."<br><br>";
echo Form::submit('Upload');
echo Form::close();
?>

</body>
</html>
