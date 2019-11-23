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
<script src="plugins/jquery/jquery.min.js"></script>
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
    include('header.php');
    ?>

    <?php 
    include('sidebar.php');
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
            <div id="createFloor" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                Create New Floor 
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="addfloor.php" >
                                <p><b> Create New Floor for Each Building/Site. </b></p>
                                <div class="form-group">
                                     <label for="name"> Site:</label>
                                     <select name="parent_id" id="parent_id">
                                        <?php
                                            $link = mysqli_connect('localhost', 'root', '') or die("Koneksi gagal"); 
                                            mysqli_select_db($link, 'users') or die("Database tidak bisa dibuka");
                                            $result = mysqli_query($link,"SELECT * FROM menu WHERE parent_id =0");
                                            while ($row = mysqli_fetch_object($result)) {
                                                
                                                echo "<option value=$row->id>$row->title</option>";
                                                
                                            }
                                        ?>
                                    </select>

                                </div>    
                                
                                <div class="form-group">
                                    <label for="name"> Name Of Floor:</label>
                                    <input type="text" class="form-control" id="floor_name" name="floor_name" required maxlength="50" placeholder="e.g 1st Floor">
                                </div>
                                <div class="form-group">
                                    <label for="name"> Note:</label>
                                    <textarea class="form-control" type="textarea" name="floor_more" id="floor_more" placeholder="Type Your Note Here" maxlength="6000" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-block btn-success" id="btnContactUs">Submit </button>
                                
                            </form>
                            <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Sent your message successfully!</h3> </div>
                            <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="createDevice" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                Create New Device
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="adddevice.php">
                                <p> Create New Device for Each Floor on Building/Site. </p>
                                <div class="form-group">
                                     <label for="name"> Site:</label>
                                    <select name="parent" id="parent">
                                        <option value="">- Pilih Tempat -</option>
        
                                        <?php 
                                            $link = mysqli_connect('localhost', 'root', '') or die("Koneksi gagal"); 
                                                mysqli_select_db($link, 'users') or die("Database tidak bisa dibuka");
                                                $result = mysqli_query($link,"SELECT * FROM menu WHERE parent_id =0");
                                                    while ($row = mysqli_fetch_object($result)) {
                                            
                                                        echo "<option value=$row->id>$row->title</option>";
                                            
                                                }
                                        ?>
                                    </select>
                                    <label for="name"> Floor:</label>
                                    <select name="parent2" id="parent2">
                                            
                                    </select>

                                </div> 
                                <div class="form-group">
                                    <label for="name"> Name Of Device:</label>
                                    <input type="text" class="form-control" id="device_name" name="device_name" required maxlength="50" placeholder="e.g ACPDB-1">
                                </div>
                                <div class="form-group">
                                    <label for="name"> URL :</label>
                                    <input class="form-control" type="textarea" name="device_url" id="device_url" placeholder="http://192.168.0.1" maxlength="6000" rows="7"></input>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Note:</label>
                                    <textarea class="form-control" type="textarea" name="device_more" id="device_more" placeholder="Type Your Note Here" maxlength="6000" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Submit</button>
                            </form>
                            <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Sent your message successfully!</h3> </div>
                            <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</section>
    
<?php 
    include('script.php');
?>
    
</body>

<script>
    
    $("#parent").change(function(){
    
        // variabel dari nilai combo box provinsi
        var id_provinsi = $("#parent").val();
        
        // tampilkan image load
        $("#imgLoad").show("");
        
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari.php",
            data: "site="+id_provinsi,
            success: function(msg){
                
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
                
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#parent2").html(msg);                                                      
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

    // $('#reused_form').submit(function(e)
    //   {
    //     e.preventDefault();

    //     $form = $(this);
    //     //show some response on the button
    //     $('button[type="submit"]', $form).each(function()
    //     {
    //         $btn = $(this);
    //         $btn.prop('type','button' ); 
    //         $btn.prop('orig_label',$btn.text());
    //         $btn.text('Sending ...');
    //     });
        

    //                 $.ajax({
    //             type: "POST",
    //             url: 'addfloor.php',
    //             data: $form.serialize(),
    //             success: after_form_submitted,
    //             dataType: 'json' 
    //         });        
        
    //   });   
});

</script>


</html>




