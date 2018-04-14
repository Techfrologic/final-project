<?php
	// Adds new song 
	if(!function_exists('AddSong'))
	{
		function AddSong($query, $db, $artistID, $songLength, $songTitle, $songYear)
		{
			// run query 
			if (!$query)
				die($db->error);
			
			if($query->num_rows > 0)
				echo "duplicate song title\n";
			else
			{
				$query = $db->query("INSERT IGNORE INTO song(ArtistID, SongID, SongLength, SongTitle, SongYear)".
				"VALUES(".$artistID.", '', '".$songLength."', '".$songTitle."', ".$songYear.")");
				
				if ($query === false)
					echo "SQL error:".$db->error;
			}
		}
	}
	
	if(!function_exists('AddArtist'))
	{
		// Adds new artist
		function AddArtist($query, $db, $artistName)
		{
			// run query 
				if (!$query)
					die($db->error);
				
				if($query->num_rows > 0)
					echo "duplicate artist name\n";
				else
				{
					$query = $db->query("INSERT IGNORE INTO artist(ArtistID, ArtistName)".
					"VALUES('', '".$artistName."')");
					
					if ($query === false)
						echo "SQL error:".$db->error;
				}
		}
	}
	
	if(!function_exists('AddAlbum'))
	{			
		// Adds new album
		function AddAlbum($query, $db, $albumTitle, $artistID)
		{
			// run query 
				if (!$query)
					die($db->error);
				
				if($query->num_rows > 0)
					echo "duplicate album title\n";
				else
				{
					
					$query = $db->query("INSERT IGNORE INTO album(AlbumID, AlbumTitle, ArtistID) ".
					"VALUES('', '".$albumTitle."', ".$artistID.")");
					
					if ($query === false)
						echo "SQL error:".$db->error;
				}
		}
	}
	
	if(!function_exists('displayNewSong'))
	{			
		// Displays new song addition 
		function displayNewSong($db, $songTitle)
		{
			$sqlString = "SELECT SongID, ArtistID, SongTitle, SongLength, SongYear ".
				"FROM song ".
				"WHERE SongTitle LIKE '$songTitle%'; ";
			
			$result = mysqli_query($db, $sqlString);
			if(!$result)
				die("displayNewSong Query Failed");
			
			echo "<p>Successfully added new song:</p>";
			while($row=mysqli_fetch_assoc($result)) // While fetching each table row
			{
				foreach($row as $key=>$val) // For each row
				
					if($val == "") // If there's no value, list as "NULL"
					{
						echo("{$key}: " . "NULL<br>");
					}
						
					else
						echo("{$key}: " . "{$val}<br>");
				// Making space for the next row
				echo("<br/><hr/><br/>");
			}
		}
	}
	
	if(!function_exists('displayNewArtist'))
	{
		function displayNewArtist($db, $artistName)
		{
			$sqlString = "SELECT ArtistID, ArtistName ".
				"FROM artist ".
				"WHERE ArtistName LIKE '$artistName%'; ";
			
			$result = mysqli_query($db, $sqlString);
			if(!$result)
				die("Query Failed");

			echo "<p>Successfully added new artist:</p>";
			while($row=mysqli_fetch_assoc($result)) // While fetching each table row
			{
				foreach($row as $key=>$val) // For each row
				
					if($val == "") // If there's no value, list as "NULL"
					{
						echo("{$key}: " . "NULL<br>");
					}
					else
						echo("{$key}: " . "{$val}<br>");
				// Making space for the next row
				echo("<br/><hr/><br/>");
			}
		}
	}

	if(!function_exists('displayNewAlbum'))
	{
		function displayNewAlbum($db, $albumTitle)
		{
			$sqlString = "SELECT AlbumID, AlbumTitle ".
				"FROM album ".
				"WHERE AlbumTitle LIKE '$albumTitle%' ";
			
			$result = mysqli_query($db, $sqlString);
			if(!$result)
				die("Query Failed");

			echo "<p>Successfully added new album:</p>";
			while($row=mysqli_fetch_assoc($result)) // While fetching each table row
			{
				foreach($row as $key=>$val) // For each row
				
					if($val == "") // If there's no value, list as "NULL"
					{
						echo("{$key}: " . "NULL<br>");
					}
					else
						echo("{$key}: " . "{$val}<br>");
				// Making space for the next row
				echo("<br/><hr/><br/>");
			}
		}
	}
?>