<?php


require_once 'vendor/autoload.php';

use App\HumanReader;

$statistics=new HumanReader('chat.csv','r');
$records=$statistics->getRecords();

$name= $_POST['name'];

$comments = $_POST['comments'];

$fp = fopen("chat.csv","a");
$cvsData = $name . ";" .  $comments ."\n";
if($fp) {
    fwrite($fp, $cvsData);
    fclose($fp);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Chats</title>
</head>
<body background="https://previews.123rf.com/images/bentchang/bentchang1803/bentchang180301747/97308761-chat-it-information-technology-conceptual-word-cloud-for-for-design-wallpaper-texture-or-background.jpg">



<header> Pļāpātava par neko </header>
<div class="container">
    <table class="table" id="myTable">
        <tbody>




        <?php foreach($records as $record):?>
            <tr>
                <th scope ="row"><?php echo $record['name'];?></th>
                <td><?php echo $record['comments'];?></td>


            </tr>
        <?php endforeach;?>


        </tbody>



    </table>
</div>

<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <table class="formatTblClass">

            <tr>
                <td ><span>Vārds</span></td>
                <td ><label for="name"></label><input class="" type="text" name="name" id="name" /></td>

                <td ><span>Text</td>
                <td><label for="comments"></label><textarea name="comments" id="comments"></textarea></td>


            </tr>

        </table>
        <input type="submit" name="Submit" id="Submit" value="Submit" />

    </form>


</div>


</body>
</html>
