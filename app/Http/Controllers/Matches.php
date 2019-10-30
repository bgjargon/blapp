<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Matches extends Controller
{
    public function next()
    {
        return view( 'next', ['matches' => json_decode( file_get_contents( 'https://www.openligadb.de/api/getmatchdata/bl1' ) ) ] );
    }

    public function all()
    {
        $sql = '
            SELECT 
                t.name team1, 
                t2.name team2, 
                IF ( m.match_date_time > CURDATE(), "-", CONCAT_WS( "-", m.team1_goalcount, m.team2_goalcount) ) score, 
                DATE_FORMAT(m.match_date_time, "%d.%m.%Y %H:%i") date
            FROM matches m
            LEFT JOIN teams t ON m.team1_id = t.id
            LEFT JOIN teams t2 ON m.team2_id = t2.id
            ORDER BY m.id ASC';
        
        return view( 'all', ['matches' => \DB::select( $sql ) ] );
    }
}
