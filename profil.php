<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog - Profile</title>

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
				<h1 class="page-header">My Profile @_@</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row timbul">
			<div class="col-lg-12 hilang">
				<div class="panel panel-default">
					
					<div class="panel-body">
						Hallo... Welcome Dude ^_^
						Namaku Juni dan asalku dari Riau. Sekarang aku duduk di bangku kuliah jurusan Sistem Informasi di Universitas Sriwijaya, Sumatera Selatan. Hobby?? Menyanyi, main musik, dan main badmintoon (still beginner ^_^). Segitu dulu ya perkenalannya. Mohon maaf kalau blog ini masih belum sempurna. Trimakasih sudah berkunjung. Semoga harimu menyenangkan :)
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
