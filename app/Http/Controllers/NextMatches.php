<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NextMatches extends Controller
{
    public function __invoke()
    {
        return view( 'next', ['matches' => json_decode( file_get_contents( 'https://www.openligadb.de/api/getmatchdata/bl1' ) ) ] );
    }
}
