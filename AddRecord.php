<!DOCTYPE html>
<HTML>
<HEAD>
</HEAD>
<STYLE>
	LABEL {
		display: inline-block;
		width: 100px;
	}
</STYLE>
<BODY>

<?php
	
	$dbName = "songs";
	$showForm = false;
	
	// Connect to the database
	$dbConnect = mysqli_connect("localhost", "root", "!root", $dbName);
	if($dbConnect === false) // If it can't connect
		echo "<p>Connect error: " . mysqli_error() . "</p>\n";
	else
	{
		
		// Submission of new artist
		if(isset($_POST['SubmitArtist']))
		{
			// Add the new artist and display 
			$artistName = stripcslashes($_POST['ArtistName']);
			$artistName = trim($artistName);
			global $showForm;
			
			include_once("addFunctions.php");
			// Build query for artist Table
			$addArtist = $dbConnect->query("SELECT * FROM artist WHERE ArtistName = '$artistName'");
			
			// Add the new artist
			AddArtist($addArtist, $dbConnect, $artistName);
			
			// Display the new artist
			displayNewArtist($dbConnect, $artistName);
			
			// Close the database
			mysqli_close($dbConnect);

		}
		else
			$showForm = true;
		
		// Submission of new song
		if(isset($_POST['SubmitSong']))
		{
			// Add the new artist and display 
			$artistID = (int)$_POST['ArtistID'];
			$songTitle = $_POST['SongTitle'];
			$songLength = $_POST['SongLength'];
			$songYear = (int)$_POST['SongYear'];
			global $showForm;
			
			include_once("addFunctions.php");
			// Build query for artist Table
			$addSong = $dbConnect->query("SELECT * FROM song ".
				"WHERE ArtistID = $artistID AND ".
				"SongTitle = '$songTitle' AND ".
				"SongLength= '$songLength' AND ".
				"SongYear= '$songYear'");
			
			// Add the new artist
			AddSong($addSong, $dbConnect, $artistID,$songLength, $songTitle, $songYear);
			
			// Display the new artist
			displayNewSong($dbConnect, $artistID, $songTitle);
			
			// Close the database
			mysqli_close($dbConnect);
		}
		else
			$showForm = true;	
	
		// Submit new Album
		if(isset($_POST['SubmitAlbum']))
		{
			global $showForm;
			include_once("addFunctions.php");
			//Add the new album and display
			$artistID =(int)$_POST['ArtistID'];
			$albumTitle = $_POST['AlbumTitle'];

			// Build query for album Table
			$addAlbum = $dbConnect->query("SELECT * FROM album ".
				"WHERE ArtistID = $artistID AND ".
				"AlbumTitle = '$albumTitle' ");

			// Add the New Album
			AddAlbum($addAlbum, $dbConnect, $albumTitle, $artistID);

			// Display the new Album
			displayNewAlbum($dbConnect, $albumTitle, $artistID);

			// Close the database
			mysqli_close($dbConnect);
			

		}
		else
			$showForm = true;
	}
	if ($showForm)
	{
		?>
			<!-- Submit New Artist-->
			<FORM METHOD="POST" ACTION="AddRecord.php">
				<fieldset style= width:25%>
					<legend><u><b>Add New Artist</b></u></legend>
					<P>
					<LABEL>Artist Name</LABEL>
					<INPUT TYPE="text" name="ArtistName">
					</P>
					<INPUT type="submit" name="SubmitArtist">
					<input type="reset">
				</fieldset>
			</FORM>
			<br>
			<!-- Submit New Song-->
			<form method="post" action="AddRecord.php">
				<fieldset style= width:25%>
					<legend><b><u>Add New Song</u></b></legend>
					<p>
						<LABEL>Song Title</Label>
						<INPUT type="text" name="SongTitle">
					</p>
					<p>
						<LABEL>Song Duration (i.e. hh:mm:ss)</Label>
						<INPUT type="text" name="SongLength">
					</p>
					<p>
						<LABEL>Song Year</Label>
						<INPUT type="text" name="SongYear">
					</p>
					<p>
						<LABEL>Artist ID (Which artist?)</Label>
						<INPUT type="text" name="ArtistID">
					</p>
					<input type="submit" name="SubmitSong">
					<input type="reset"><br>
				</fieldset>
			</form>
			<br>
			
			<!-- Submit New Album-->
			<form method="post" action="AddRecord.php">
				<fieldset style= width:25%>
					<legend><b><u>Add New Album </u></b></legend>
					<p>
						<LABEL>Album Title</Label>
						<INPUT type="text" name="AlbumTitle">
					</p>
					<p>
						<LABEL>ArtistID (Which artist?)</Label>
						<INPUT type="text" name="ArtistID">
					</p>
					<input type="submit" name="SubmitAlbum">
					<input type="reset">
				</fieldset>
			</form>

		<?php	
	}
?>
</BODY>
</HTML>