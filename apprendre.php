<?php
//find values of formulaire
    $fname=$_POST["fname"]?? "";
    $lname=$_POST["lname"]?? "";
    $date=$_POST["date"]?? "";
    $pas=$_POST["pas"]?? "";
    $cpas=$_POST["cpas"]?? "";
    $status="";
//insert into mysql using pdo
    $pdo=new PDO("mysql:dbname=dbsign;host=127.0.0.1;","root","");
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        if(empty($lname) || empty($fname) || empty($date) || empty($pas) || empty($cpas))
        {
            $status='<span class="badge bg-danger">*</span>';
        }
        else
        {
            if($pdo!=null)
            {
                $sql="INSERT INTO logine(fname,lname,daten,pas,cpas) values(:fr, :ln, :dt, :ps, :cp)";
                $req=$pdo->prepare($sql);
                $req->execute([
                    ":fr"=>$fname,
                    ":ln"=>$lname,
                    ":dt"=>$date,
                    ":ps"=>$pas,
                    ":cp"=>$cpas
                ]);
                $sql=null;
$pdo=null;
    header('location:./apprendre.php');
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<form action="./apprendre.php" method="Post">
    <input type="text" name="fname" placeholder="enter firstname"><label for="fname"><?php echo $status ; ?></label><br/>
    <input type="text" name="lname" placeholder="enter lastname"><label for="lname"><?php echo $status ; ?></label><br/>
    <input type="text" name="date" placeholder="enter datepirth"><label for="date"><?php echo $status ; ?></label><br/>
    <input type="text" name="pas" placeholder="enter password"><label for="pas"><?php echo $status ; ?></label><br/>
    <input type="text" name="cpas" placeholder="enter password"><label for="cpas"><?php echo $status ; ?></label><br/>
    <input type="submit" name="btn" value="validate">
</form>
   
</body>
</html>
