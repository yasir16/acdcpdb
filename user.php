<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username']; 
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Monitoring Website</title>
    
<?php 
    include('link.php');
    ?>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <?php 
    include('header2.php');
    ?>

    <?php 
    include('sidebar2.php');
    ?>

<section class="content">
        <div class="container-fluid">
   	<?php
           
            if (!isset($_GET['p'])) {
                include ('content/map.php');
                //include ('coba.php');
            } else {
                $page = $_GET['p'];
                $modul = $_GET['m'];
                include $modul . '/data center/jnb-1/1st/' . $page . ".php";
            }
            ?>
            <div id="createSite" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    
                </div>
            </div>
        </div>

</section>
    
<?php 
    include('script.php');
    ?>
    
</body>


<script>
    
    $("#site").change(function(){
    
        // variabel dari nilai combo box provinsi
        var site_id = $("#site").val();
        
        // tampilkan image load
        $("#imgLoad").show("");
        
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            data: "site="+site_id,
            success: function(msg){
                
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data floor');
                }
                
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#kota").html(msg);                                                      
                }
                
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });     
    });
</script>




<script type="text/javascript">
$(function()
{
    function after_form_submitted(data) 
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' ); 
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });
            
        }//else
    }

    $('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' ); 
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });
        

                    $.ajax({
                type: "POST",
                url: 'addfloor.php',
                data: $form.serialize(),
                success: after_form_submitted,
                dataType: 'json' 
            });        
        
      });   
});

</script>


</html>




