<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog - Tables</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php  include"nav.php"; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				
				<li class="active"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> <a href=""><?php echo $_SERVER['PHP_SELF']; ?></a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tables Dengan Json Data</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row timbul">
			<div class="col-lg-12 hilang">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="#popup" class="btn btn-primary">Tambahkan Data</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data_test.php"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">USER ID</th>
						        <th data-field="name"  data-sortable="true">USER EMAIL</th>
						        <th data-field="price" data-sortable="true">USER PASSWORD</th>
						        <th data-field="edit" data-sortable="true">ACTION</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
<?php include"koneksi.php"; if(!empty($_GET['id'])){ $edit=$mysqli->query("select * from user where user_id='$_GET[id]' ");$r=$edit->fetch_array(); }  ?>		
					<div class="box box-info" id="popup">
            <form class="form-horizontal  popup-container" method="post" id="form_daftar">
			<?php if(!empty($_GET['id'])){ ?>
			<input type="hidden" name="triger" id="triger" value="edit" />
			<input type="hidden" name="id"  value="<?php echo $r['user_id']; ?>" />
			<?php }else{ ?>
			<input type="hidden" name="triger" id="triger" value="daftar" />
			<?php } ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" <?php if(!empty($_GET['id'])){ ?>value="<?php echo $r['user_email']; ?>"<?php } ?> >
                  </div>
                </div>
                <div class="form-group">
                  <label id="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control"  id="pass" name="pass"  placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">					
						<?php if(!empty($_GET['id'])){ ?><a  id="edit" class="btn btn-success">Update</a><?php }else{ ?><a  id="simpan" class="btn btn-primary">Submit</a><?php } ?>
                    </div>
                  </div>
                </div>
              </div>			
			<?php if(!empty($_GET['id'])){ ?><a href="#closed" class="popup-close" onclick="history.back(-1)">X</a><?php }else{ ?><a class="popup-close" href="#closed">X</a><?php } ?>
            </form>
          </div>
		<div class="alert bg-warning" role="alert" id="dialogpop">
					<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Yakin akan menghapus data !!!
					<br /><center><button id="hapus" class="btn btn-danger">Hapus</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="tidak" class="btn btn-primary">Tidak</button></center>
		</div>
		<div class="alert bg-danger" role="alert" id="errorpop">
					<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Email Tidak Boleh Kosong !!!
		</div>		
		<div class="alert bg-danger" role="alert" id="gagalpop">
					<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Email Sudah Terdaftar !!!
		</div>
		<div class="alert bg-success" role="alert" id="successpop">
					<svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></use></svg> Operation Success !!!					
		</div>
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
		<script type="text/javascript">
	  $(document).on('click', '.del', function(){
	  var del_id = $(this).attr("id");
	  var del_triger = $(this).attr("triger");
	  $("#dialogpop").show(function(){
	  $("#hapus").click(function(){
	  $.ajax({
					type: "POST",
					url: "pros.php",
					data: 'id=' + del_id + '&triger=' + del_triger,
					success: function(){
						$('#successpop').show('slow');
						$('#dialogpop').hide('slow');
						$('.hilang').hide('slow');
						$('.timbul').load('timbul.php');
					},	
					error: function(){
						$('#gagalpop').show('slow');
					}
					});
					});
		$("#tidak").click(function(){			
				$('#dialogpop').hide('slow');	
					});
					});
	    var detik = 3;	
		function hitung(){
		var to = setTimeout(hitung,1000);
		 detik --;
		 if(detik < 0){
		 clearTimeout(to);
		$("#gagalpop, #successpop").hide('slow');
		 }
		 }
		 hitung();
			});
	</script>	
		<script type="text/javascript">
	  $("#edit").click(function(){
	  var email = $("input#email").val();
	  var daftar = $("#form_daftar").serialize();
	  if(email == "" ){
	  $('#errorpop').show('slow');
	  }else{
	  $.ajax({
					type: "POST",
					url: "pros.php",
					dataType: 'json',
					data: daftar,
					success: function(){
						$('#successpop').show('slow');
						$('#popup').hide('slow');
						$('.hilang').hide('slow');
						$('.timbul').load('timbul.php');
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
		$('#popup').show('slow');
		 }
		 }
		 hitung();
			});
	</script>	
		<script type="text/javascript">
	  $("#simpan").click(function(){
	  var email = $("input#email").val();
	  var daftar = $("#form_daftar").serialize();
	  if(email == "" ){	  
	  $('#errorpop').show('slow');
	  }else{
	  $.ajax({
					type: "POST",
					url: "pros.php",
					dataType: 'json',
					data: daftar,
					success: function(){
						$('#successpop').show('slow');
						$('#popup').hide('slow');
						$('.hilang').hide('slow');
						$('#email').val('');
						$('#pass').val('');
						$('.timbul').load('timbul.php');
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
		$('#popup').show('slow');
		 }
		 }
		 hitung();
			});
	</script>	
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
		<script>
	$(function(){
	$("a[rel='tab']").click(function(e){
	pageurl = $(this).attr('href');
	
	$.ajax({url:pageurl+'?rel=tab', success: function(data){
		$('.main').html(data);
	}});
	if(pageurl!=window.location){
		window.history.pushState({path:pageurl},'',pageurl);
	}
	return false;
	});
	)};
	</script>
</body>

</html>
