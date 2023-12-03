<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torta;

class TortaAjaxController extends Controller
{
    public function deleteTorta(Request $request, $id)
    {
        $torta = Torta::find($id);

        if (!$torta) {
            return response()->json(['message' => 'Torta nenalezena.'], 404);
        }

        $torta->delete();

        return response()->json(['message' => 'Torta byla úspěšně smazána.']);
    }
}
