<html>

    <head>
        <meta charset="utf-8" />
        <title>Devoir THYP 14/15</title>
		<center><h1> Hajbelgacem Mahmoud</h1></center>
    </head>
    <body>
		<center>
		<h2> Etudiant THYP 14/15 </h2>
		<?php
			//charge le flux rss dans un objet PHP
			$xml = simplexml_load_file('http://picasaweb.google.com/data/feed/base/user/107401320610499259896/albumid/6065229773950541889?alt=rss&kind=photo&authkey=Gv1sRgCNak7e60l-7VlgE&hl=fr');
			foreach ($xml->channel->item as $tof) {
				echo "<img src='".$tof->enclosure["url"]."' />";
				echo $tof->title;
			}
		?>
		<center>
	</body>
</html>