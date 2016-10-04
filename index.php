<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 13:53
 */
declare(strict_types = 1);

?>
<!DOCTYPE html>
<html>
<head>
    <title>RSS feed</title>
    <script>
        function loadRssFeed( feedName ) {

            var domElement = document.getElementById('rss-articles');

            if( feedName.length == 0 )
            {
                domElement.innerHTML = "";
                return;
            }

            if( window.XMLHttpRequest )
            {
                xmlhttp = new XMLHttpRequest()
            }
            else{
                domElement.innerHTML = 'You shall not view this rss feed! Update je browser naar iets fatsoenlijks';
            }

            xmlhttp.onreadystatechange = function()
            {
                if ( this.readyState == 4 && this.status == 200 )
                {
                    domElement.innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET","handleRss.php?feed="+feedName,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <h1>Torvalds hooge school RSS feed</h1>
    <form>
        <select onchange="loadRssFeed(this.value)">
            <option value="">Selecteer een rss Feed</option>
            <option value="googlenews">Google news</option>
            <option value="thehackersnews">The hackers news</option>
        </select>
    </form>
    <div id="rss-articles">De rss feed word hier geladen...</div>
</body>
</html>
