<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Handles all matches requests
 */
class Matches extends Controller
{
    /**
     * Displays the plays for the next Bundesliga Spieltag
     */
    public function next()
    {
        $x = json_decode( file_get_contents( 'https://www.openligadb.de/api/getmatchdata/bl1' ) );
        foreach ( $x as &$row ) {
            $row->mdt = date( "d.m.Y H:i", strtotime( $row->MatchDateTime ) );
        }

        return view( 'next', ['matches' => $x ] );
    }

    /**
     * Displays all games for the season. This includes games already played and those to be played.
     */
    public function all()
    {
        $sql = '
            SELECT 
                t.name team1, 
                t2.name team2, 
                IF ( m.match_date_time > CURDATE(), "-", CONCAT_WS( "-", m.team1_goalcount, m.team2_goalcount) ) score, 
                DATE_FORMAT(m.match_date_time, "%d.%m.%Y %H:%i %W") date
            FROM matches m
            LEFT JOIN teams t ON m.team1_id = t.id
            LEFT JOIN teams t2 ON m.team2_id = t2.id
            ORDER BY m.match_date_time ASC';
        
        return view( 'all', ['matches' => \DB::select( $sql ) ] );
    }

    /**
     * Displays the win/loss quote for every team in the Bundesliga
     */
    public function winloss()
    {
        $sql = '
        SELECT 
            t.name,
            ( 
                ( SELECT COUNT(*)
                FROM matches m
                WHERE m.match_date_time < CURDATE()
                AND m.team1_id=t.id
                AND m.team1_goalcount > m.team2_goalcount ) +
                ( SELECT COUNT(*)
                FROM matches m
                WHERE m.match_date_time < CURDATE()
                AND m.team2_id=t.id
                AND m.team1_goalcount < m.team2_goalcount ) 
            ) wins,
            ( 
                ( SELECT COUNT(*)
                FROM matches m
                WHERE m.match_date_time < CURDATE()
                AND m.team1_id=t.id
                AND m.team1_goalcount < m.team2_goalcount ) +
                ( SELECT COUNT(*)
                FROM matches m
                WHERE m.match_date_time < CURDATE()
                AND m.team2_id=t.id
                AND m.team1_goalcount > m.team2_goalcount )
            ) losses
        FROM teams t';

        return view( 'winloss', ['matches' => \DB::select( $sql ) ] );
    }
}
