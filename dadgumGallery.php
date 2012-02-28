<?php include "dadGumHeader.php";?>

<div id="galleryBody">
	
<br />
<?php
$imagefolder='.';
$thumbsfolder='.';
$pics=directory($imagefolder,"jpg,JPG,JPEG,jpeg,png,PNG");
$pics=ditchtn($pics,"tn_");
if ($pics[0]!="")
{
	foreach ($pics as $p)
	{
		createthumb($p,"tn_".$p,150,150);
	}
}

/*Function ditchtn($arr,$thumbname)
	filters out thumbnails*/
function ditchtn($arr,$thumbname)
{
	foreach ($arr as $item)
	{
		if (!preg_match("/^".$thumbname."/",$item)){$tmparr[]=$item;}
	}
	return $tmparr;
}

/*
	Function createthumb($name,$filename,$new_w,$new_h)
	creates a resized image
	variables:
	$name		Original filename
	$filename	Filename of the resized image
	$new_w		width of resized image
	$new_h		height of resized image
*/	
function createthumb($name,$filename,$new_w,$new_h)
{
	$system=explode(".",$name);
	if (preg_match("/jpg|jpeg/",$system[1])){$src_img=imagecreatefromjpeg($name);}
	if (preg_match("/png/",$system[1])){$src_img=imagecreatefrompng($name);}
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);
	if ($old_x > $old_y) 
	{
		$thumb_w=$new_w;
		$thumb_h=$old_y*($new_h/$old_x);
	}
	if ($old_x < $old_y) 
	{
		$thumb_w=$old_x*($new_w/$old_y);
		$thumb_h=$new_h;
	}
	if ($old_x == $old_y) 
	{
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	}
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
	if (preg_match("/png/",$system[1]))
	{
		imagepng($dst_img,$filename); 
	} else {
		imagejpeg($dst_img,$filename); 
	}
	imagedestroy($dst_img); 
	imagedestroy($src_img); 
}

/*
        Function directory($directory,$filters)
        reads the content of $directory, takes the files that apply to $filter 
		and returns an array of the filenames.
        You can specify which files to read, for example
        $files = directory(".","jpg,gif");
                gets all jpg and gif files in this directory.
        $files = directory(".","all");
                gets all files.
*/
function directory($dir,$filters)
{
	$handle=opendir($dir);
	$files=array();
	if ($filters == "all"){while(($file = readdir($handle))!==false){$files[] = $file;}}
	if ($filters != "all")
	{
		$filters=explode(",",$filters);
		while (($file = readdir($handle))!==false)
		{
			for ($f=0;$f<sizeof($filters);$f++):
				$system=explode(".",$file);
				if ($system[1] == $filters[$f]){$files[] = $file;}
			endfor;
		}
	}
	closedir($handle);
	return $files;
}
?>

<?php

	/* settings */
	$image_dir = 'images/';
	$per_column = 6;
	
	
	/* step one:  read directory, make array of files */
	if ($handle = opendir($image_dir)) {
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != '.' && $file != '..') 
			{
				if(strstr($file,'tn_'))
				{
					$files[] = $file;
				}
			}
		}
		closedir($handle);
	}
	
	/* step two: loop through, format gallery */
	if(count($files))
	{
		foreach($files as $file)
		{
			$count++;
			echo '<a class="photo-link" rel="one-big-group" 
			href="',$image_dir,str_replace('tn_','',$file),'">
			<img src="',$image_dir,$file,'" width="100" height="100" /></a>';
			if($count % $per_column == 0) { echo '<div class="clear"></div>'; }
		}
	}
	else
	{
		echo '<p>There are no images in this gallery.</p>';
	}
		
?>	

</div>

<?php include "dadGumFooter.php";?>
