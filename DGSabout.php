<?php include "DGS_header.php";?>

<div id="mainFrame">
	<img id="orderImg" src="images/DGS_04.png" alt="Dad Gum Salsa Title" />
	<div id="video" >
		<center><h2>About Dad Gum Salsa</h2></center>
<!-- 		<p>This is some text that is placed in the transparent box.
		I've been making salsa for quite some time now, working on 
		perfecting my recipes and discovering new types of salsa too. 
		Ever since I returned from Alaska, I've been trying to think 
		of what I would really love to do. The one thing I know for 
		certain, is my love for salsa, it's a passion, 
		I could do it everyday happily! 
		</p> -->
		<object style="width: 640px;height: 368px;" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
			<param name="src" value="multimedia/videos/dadgumStillMovie.m4v" />
			<param name="controller" value="true" />
			<param name="autoplay" value="false" />
			<!-- Code For Older Browsers -->
			<embed id="video" src="multimedia/videos/dadgumStillMovie.m4v" class="video-post"
			 autoplay="false"
			 controller="true"
			 pluginspage="http://www.apple.com/quicktime/download/">
			</embed>
		</object>
	</div>
</div>

<?php include "DGS_footer.php";?>