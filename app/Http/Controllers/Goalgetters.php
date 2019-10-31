<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Handles all goalgetters requests
 */
class Goalgetters extends Controller
{
	/**
     * Handles all search requests for a player name and displays the results
     */
	public function search(Request $request)
    {
		$q = $request->get('playername');
		$res = '';

		// exclude meta characters
		if ( $q == '%' || $q == '_' ) {
			$q = '';
		}

		if ( $q ) {
			$res = \DB::table('goalgetters')->where('name', 'like', '%'.$q.'%')->get();
		}

		return view( 'search', ['res' => $res ] );
	}
}