<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnose.ai</title>

 <!-- Header Files -->
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
    
<?php include_once('header.php') ?>

<div class="container" style="margin-top:20px; margin-bottom:20px">

<div class="row">
<div class="col-md-12 text-center">
<h3>Get your predictions Now</h3>
</div>
</div>

<div class="row " style="height:60vh">

<div class="col-md-6 border border-primary text-center" >


<input style="margin-left:130px; margin-top:30px" type='file' onchange="previewImg(this);" />
<hr/>
<div id="myDiv" style="display:none;" class="bg-info center" >Original Image</div>
<hr/>
<img id="viewImg" style="display:none;" class=" text-center" alt="your image" />

</div>


<div class="col-md-6 border border-primary">
 2nd div




</div>
</div>

</div>


<?php include_once('footer.html') ?>

</body>

<style>
img{
  max-width:180px;
}
input[type=file]{

background:#ccc ;}</style>


<script>
     function previewImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                document.getElementById('viewImg').style.display = "";
                reader.onload = function (e) {
                    $('#viewImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); 
                 showDiv();
            }


          
        }


        function showDiv() {
   document.getElementById('myDiv').style.display = "block";
}

</script>



</html>



