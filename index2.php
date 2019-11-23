<script src="plugins/jquery/jquery.min.js"></script>
Provinsi : 
<select name="provinsi" id="provinsi">
    <option value="">- Pilih Tempat -</option>
    
    <!-- looping data provinsi -->
    <?php 
    $link = mysqli_connect('localhost', 'root', '') or die("Koneksi gagal"); 
    mysqli_select_db($link, 'users') or die("Database tidak bisa dibuka");
    $result = mysqli_query($link,"SELECT * FROM menu WHERE parent_id =0");
        while ($row = mysqli_fetch_object($result)) {
                                        
            echo "<option value=$row->id>$row->title</option>";
                                        
       }
    ?>
</select>

    &nbsp;&nbsp;&nbsp;<img src="loader.gif" width="10px" height="10px" id="imgLoad" style="display:none">
    <br>
    <br>
Kota : <select name="kota" id="kota">
    <!-- hasil data dari cari_kota.php akan ditampilkan disini -->
</select>

<script>
    
    $("#provinsi").change(function(){
    
        // variabel dari nilai combo box provinsi
        var id_provinsi = $("#provinsi").val();
        
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
                    $("#kota").html(msg);                                                      
                }
                
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });     
    });
</script>