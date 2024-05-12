<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Document</title> 
</head>
<style>
    .container{
        border: 10px double black;
    }
    .container : form{
        display: flex;
        justify-content: center;
        align-items: center;
    }
   .row{
        display: flex;
        justify-content: center;
        align-items: center
   }
</style>
<body> 
    <div class="container">
                <?php
                $warehouse_code=$_REQUEST['Codes'];
                $price=$_REQUEST['Price'];
                $item_name=$_REQUEST['Items'];
                ?>
                
            
                <center><h2><?php echo $item_name?>@ ₱<?php echo $price?></h2></center>
                <center><h4></h4></center>
                <form action="../../pages/user/user_frontend.php" METHOD ="POST">
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="choose_qty">Quantity:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="number" name="choose_qty"><br>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="hidden" name="item_name" value="<?php echo $item_name?>">
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="warehouse_code" value="<?php echo $warehouse_code; ?>">
                            <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                            <a href="../../pages/user/user_frontend.php" class="btn btn-danger">Cancel</a><br>
                        </div>
                    </div>

                </form>
            
        
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
