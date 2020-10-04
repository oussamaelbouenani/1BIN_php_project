
</body>
<div class="m-5"></div>
<footer class="container-fluid text-center footer">
	<div class="row p-2 text-light">
		<div class="col-sm">
			<strong>Excellente journée qu'aujourd'hui le <?php echo DATEDUJOUR ?></strong>
		</div>
		<div class="col-sm">
			<strong> :: Nous sommes joignables à ces adresses :: </strong>
		</div>
		<div class="col-sm">
			<!-- ! adresse email non cryptée : spam possible -->
			<span class="glyphicon glyphicon-send"></span> <a href="mailto:<?php echo EMAIL ?>" class="link"><?php echo EMAIL ?></a> /<br>
			<a href="mailto:<?php echo EMAIL2 ?>"><?php echo EMAIL2 ?></a> <span class="glyphicon glyphicon-send"></span>
		</div>
	</div>
</footer>
</html>