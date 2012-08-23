<?php include "DGS_header.php";?>

<div id="mainFrame">
<div id="video" >
	<object style="width: 640px;height: 368px;" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
		<param name="src" value="multimedia/videos/dadgumStillMovie.m4v" />
		<param name="controller" value="true" />
		<param name="autoplay" value="false" />
		<!-- Code For Older Browsers -->
		<embed src="multimedia/videos/dadgumStillMovie.m4v" class="video-post"
		 autoplay="false"
		 controller="true"
		 pluginspage="http://www.apple.com/quicktime/download/">
		</embed>
	</object>
</div>
<!-- <a href="http://www.google.com">
<img id="frontImage" src="resources/DGSbell.png" alt="Dad Gum Salsa Pepper" />
</a> -->
</div>

<?php include "DGS_footer.php";?>