<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
    	$(document).ready(function() {
    		$('#tabeldata').DataTable();
		});	
    </script>	
			<div class="col-lg-12 hilang">
				<div class="panel panel-default">
					<div class="panel-heading"><a class="btn btn-primary simpan">Tambahkan Data</a></div>
					<div class="panel-body">
		<table width="100%" class="table table-striped table-bordered" id="tabeldata" >
        <thead>
            <tr>
                <th width="30px" class="text-center">No</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php
 include"koneksi.php";		   
$data=$mysqli->query("select * from user  order by user_id desc");
$no=1;
while($d=$data->fetch_array()){ 
?>
<input type="hidden"  id="editriger" value="edit"/>
            <tr>
                <td><?php echo $no ?></td>
                <td>
				<span id="editmail<?php echo "$d[user_id]"; ?>" class="textnya"><?php echo "$d[user_email]"; ?></span>
                <input type="text" name="email" value="<?php echo "$d[user_email]"; ?>" class="form-control formnya" id="boxmail<?php echo "$d[user_id]"; ?>" style="display:none;"/>
				</td>
                <td>
				<span id="editpass<?php echo "$d[user_id]"; ?>" class="textnya"><?php echo "$d[user_pass]"; ?></span>				
                <input type="password" name="pass" class="form-control formnya" id="boxpass<?php echo "$d[user_id]"; ?>" style="display:none;"/>
				</td>
                <td>
				<a id="<?php echo "$d[user_id]"; ?>" class="btn btn-success editrow erow<?php echo "$d[user_id]"; ?>">Edit</a><a id="<?php echo "$d[user_id]"; ?>" class="btn btn-success updaterow urow<?php echo "$d[user_id]"; ?>" style="display:none;">Update</a>&nbsp;<a id="<?php echo "$d[user_id]"; ?>" class="btn btn-danger deleterow drow<?php echo "$d[user_id]"; ?>">Delete</a>
						<div class="alert bg-warning crow<?php echo "$d[user_id]"; ?>" role="alert" style="display:none;">
					<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> HAPUS DATA !!!
					<br /><center><button id="<?php echo "$d[user_id]"; ?>" class="btn btn-danger hapus">Hapus</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="tidak" class="btn btn-primary">Tidak</button></center>
		</div>
				</td>
            </tr>
<?php
$no++; }
?>		
        </tbody>
    </table>

					</div>
				</div>
			</div>
<!--  ############################++++++++++++++++SCRIPT AJAX DELETING ================############################  -->		
<!--  ############################++++++++++++++++SCRIPT AJAX DELETING ================############################  -->		
	<script type="text/javascript">
	$(document).ready(function(){	
	  $(".deleterow").click(function(){
	  var id = $(this).attr("id");
	  $(".erow"+id).hide('slow');
	  $(".drow"+id).hide('slow');
	  $(".crow"+id).show('slow');
	  });
	  $("#tidak").click(function(){			
			$(".alert").hide('slow');	
			$(".deleterow").show('slow');	
			});
	  $(".hapus").click(function(){
	  var id = $(this).attr("id");
	  var triger = "del";
	                $.ajax({
					type: "POST",
					url: "pros.php",
					data: 'id=' + id + '&triger=' + triger,
					success: function(html){
						$('#successpop').show('slow');
						$('.hilang').hide('slow');
						$('.timbul').load('timbul2.php');
					},	
					error: function(){
						$('#gagalpop').show('slow');
					}
					});
	    var detik = 3;	
		function hitung(){
		var to = setTimeout(hitung,1000);
		 detik --;
		 if(detik < 0){
		 clearTimeout(to);
		$("#errorpop , #gagalpop, #successpop").hide('slow');
		 }
		 }
		 hitung();
			});
		 $(document).mouseup(function(){
		 $(".formnya, .updaterow, .alert").hide('slow');
		 $(".textnya, .editrow, .deleterow").show('slow');
		 });
		 });
	</script>				
<!--  ############################++++++++++++++++SCRIPT AJAX EDITING ================############################  -->		
<!--  ############################++++++++++++++++SCRIPT AJAX EDITING ================############################  -->		
	<script type="text/javascript">
	$(document).ready(function(){	
	  $(".editrow").click(function(){
	  var id = $(this).attr("id");
	  $(".erow"+id).hide('slow');
	  $(".urow"+id).show('slow');
	  $("#editmail"+id).hide('slow');
	  $("#editpass"+id).hide('slow');
	  $("#boxmail"+id).show('slow');
	  $("#boxpass"+id).show('slow');
	  });
	  $(".updaterow").click(function(){
	  var id = $(this).attr("id");
	  var email = $("input#boxmail"+id).val();
	  var pass =  $("input#boxpass"+id).val();
	  var triger = "edit";
	  if( email == "" ){
	  $('#errorpop').show('slow');
	  }else{
	                $.ajax({
					type: "POST",
					url: "pros.php",
					dataType: 'json',
					data: 'id=' + id + '&email=' + email + '&pass=' + pass + '&triger=' + triger,
					success: function(html){
						$('#successpop').show('slow');
						$('.hilang').hide('slow');
						$('.timbul').load('timbul2.php');
					},	
					error: function(){
						$('#gagalpop').show('slow');
					}
					});
				}
	    var detik = 3;	
		function hitung(){
		var to = setTimeout(hitung,1000);
		 detik --;
		 if(detik < 0){
		 clearTimeout(to);
		$("#errorpop , #gagalpop, #successpop").hide('slow');
		 }
		 }
		 hitung();
			});
		 $(".formnya").mouseup(function(){
		 return false;
		 });
		 });
	</script>
<!--  ############################++++++++++++++++SCRIPT AJAX ADDING ================############################  -->		
<!--  ############################++++++++++++++++SCRIPT AJAX ADDING ================############################  -->	
		<script type="text/javascript">
	  $(".simpan").click(function(){
	  var triger = "tambah";
	  $.ajax({
					type: "POST",
					url: "pros.php",
					dataType: 'json',
					data: 'triger=' + triger,
					success: function(){
						$('#successpop').show('slow');
						$('.hilang').hide('slow');
						$('.timbul').load('timbul2.php');
					},	
					error: function(){
						$('#gagalpop').show('slow');
					}
					});
					var detik = 3;	
		function hitung(){
		var to = setTimeout(hitung,1000);
		 detik --;
		 if(detik < 0){
		 clearTimeout(to);
		$("#errorpop , #gagalpop, #successpop").hide('slow');
		 }
		 }
		 hitung();
				});	
	</script>		