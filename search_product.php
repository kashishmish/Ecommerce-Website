<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <br>
        <h2 align="center"> Search product</h2>
        <form action="productdetails.php" method="post" enctype="multipart/form-data" class="form-group">
        <input type="text" name="search_text" id="search_text" placeholder="search here" class="form-control">
        <input type="submit" name="submit" class="btn btn-info ">
        </form>
    <div class="col-md-5" atyle="position:relative;margin-top:-38px;margin-left:215px;">
        <div id="result" class="list-group">
        
        </div>
    </div>
    
</body>
</html>
<script>
$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt=$(this).val();
        if(txt!='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt},
                datType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
            
        }
        else
        {
            $('#result').html('');
        }
    });
    $(document).on('click','a',function(){
        $('#search_text').val($(this).text());
        $('#result').html('');
    });
});

</script>