<?php
namespace App\Http\Controllers\Api\SMS;
use App\CodeGenerator\MobileCodeGenerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyMobileStore;
use App\Notifications\VerifyMobile;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
/**
 * Class VerifyMobileController.
 *
 * @package App\Http\Controllers\Tenant\Api\SMS
 */
class VerifyMobileController extends Controller
{
    public function store(VerifyMobileStore $request, User $user)
    {
        if ($request->code === $user->mobile_verification_code) {
            $user->mobile_verified_at = Carbon::now();
            $user->mobile_verification_code = null;
            $user->save();
        }
        else abort(422,'El codi proporcionat no és correcte');
    }
    public function send(Request $request, User $user)
    {
        $code = MobileCodeGenerator::generate();
        $user->mobile_verification_code = $code;
        $user->save();
        $user->notify(new VerifyMobile($code));
    }
}
