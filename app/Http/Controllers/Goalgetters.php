<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Goalgetters extends Controller
{
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