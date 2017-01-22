
<!-- footer file -->
<hr>
<footer>
<div class="row">
    <div class="col-lg-12">
        <p>Copyright &copy; 
        <?php 
        	$copyYear = 2016; 
        	$curYear = date('Y'); 
        	echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : ''); 
        ?> Movie Tickets System ● Written By Vince Luo</p>
    </div>
</div>
</footer>
</body>
</html>

<script type="text/javascript" src="js/superplaceholder.min.js" ></script>