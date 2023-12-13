<?php
namespace App\Validator;

use Illuminate\Http\Request;

// PenerbitValidation.php
class PenerbitValidation
{
    public static function validatePenerbit(Request $request)
    {
        return $request->validate([
            'perusahaan' => 'required',
            'alamat' => 'required',
            'no_handphone' => 'required',
            'email' => 'required|email',
        ]);
    }
}
