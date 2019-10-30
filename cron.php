<?php
include_once 'vendor\autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$db = new mysqli( getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_DATABASE') );
$db->query('SET names UTF8');

// get teams
$x = json_decode( file_get_contents( 'https://www.openligadb.de/api/getavailableteams/bl1/'.date('Y') ) );
foreach ( $x as &$row ) {
	$sql = "INSERT INTO `blapp`.`teams` (`id`,`name`, `shortname`, `iconurl`) VALUES (
		'".$row->TeamId."', '".$row->TeamName."', '".$row->ShortName."', '".$row->TeamIconUrl."')
		ON DUPLICATE KEY UPDATE
		name = '".$row->TeamName."',
		shortname = '".$row->ShortName."',
		iconurl = '".$row->TeamIconUrl."'";
	
	$db->query( $sql );
}

// get all matches; if a match is already present, update its goals statistics
$x = json_decode( file_get_contents( 'https://www.openligadb.de/api/getmatchdata/bl1/'.date('Y').'/' ) );
foreach ( $x as &$row ) {
	$team1_goalcount = count( $row->Goals ) > 0 ? $row->Goals[ count($row->Goals)-1 ]->ScoreTeam1 : 0;
	$team2_goalcount = count( $row->Goals ) > 0 ? $row->Goals[ count($row->Goals)-1 ]->ScoreTeam2 : 0;
	
	$sql = "INSERT INTO `blapp`.`matches` (`id`, `team1_id`, `team2_id`, `team1_goalcount`, `team2_goalcount`, `match_date_time`) VALUES (
		'".$row->MatchID."', '".$row->Team1->TeamId."', '".$row->Team2->TeamId."', '".$team1_goalcount."', '".$team2_goalcount."', '".$row->MatchDateTime."')
		ON DUPLICATE KEY UPDATE
		team1_goalcount = '".$team1_goalcount."', 
		team2_goalcount = '".$team2_goalcount."'";
	
	$db->query( $sql );
}

// get goalgetters
$x = json_decode( file_get_contents( 'https://www.openligadb.de/api/getgoalgetters/bl1/'.date('Y') ) );
foreach ( $x as &$row ) {
	$sql = "INSERT INTO `blapp`.`goalgetters` (`id`, `name`, `goalcount`) VALUES (
		'".$row->GoalGetterId."', '".$row->GoalGetterName."', '".$row->GoalCount."')
		ON DUPLICATE KEY UPDATE
		goalcount = '".$row->GoalCount."'";
	
	$db->query( $sql );
}
