<?php include "DGS_header.php";?>

<div id="mainFrame">
	<img id="orderImg" src="images/DGS_04.png" alt="Dad Gum Salsa Title" />
	<div id="video" >
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