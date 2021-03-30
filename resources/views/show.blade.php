<!DOCTYPE html>
<html lang="en">
<head><title>show all</title></head>
<body>
<table>
    <tr>
        <td><?php echo $image->title;?></td>
        <td><img src="{{ asset("/images/".$image->name)}}" width="100" height="100"> </td>
    </tr>
</table>
<a href="../">Back</a>
</body>
</html>
