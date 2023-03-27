<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\Controller;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/login",
     * operationId="authLogin",
     * tags={"Login"},
     * summary="User Login",
     * description="Login User Here",
     *
     *     @OA\RequestBody(
     *
     *         @OA\JsonContent(),
     *
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *
     *            @OA\Schema(
     *               type="object",
     *               required={"email", "password"},
     *
     *               @OA\Property(property="email", type="email"),
     *               @OA\Property(property="password", type="password")
     *            ),
     *        ),
     *    ),
     *
     *     @OA\Response(
     *        response=201,
     *        description="Wrong credentials response",
     *
     *        @OA\JsonContent(
     *
     *            @OA\Property(property="name", type="string", example="admin"),
     *            @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmVhNDFmZmQ2YzA0OTNiOTAxZjkwZmYxMTJiNWQxM2JkZjE0MjBkYjUzN2FlMDBkZGZmMmIxMjQwMjk2N2ZiZTM4MTk3NTM4ZmJkNDM3MWUiLCJpYXQiOjE2NzQwMjA0NzMuNjQxNywibmJmIjoxNjc0MDIwNDczLjY0MTcwNSwiZXhwIjoxNzA1NTU2NDczLjU4ODc0LCJzdWIiOiI1NDUzIiwic2NvcGVzIjpbXX0.eR-7ChIK-aFtyzWKk6gBTVLBInC45XOLOyKhRkRWv-EITFxZ9QasRkTkWnG2ECDbfb0pO5iYsyx3kADUeMRld2PSNWvq-rzE4q4IWwzLR9GaBwI-BdMW901SI3BXOpnlaPPbRPyLA2HOprJ_hWeG9kJ7euUXxvq1TwjmkfvY7TvLx6oMTxB6gTWvxcvm_IAe4J6e4xyeWpD1wlFz6GQmWie6WycBrHMCzpiLCuTbrJwHkiqoTLTjRhaiWfZzrms7OYALXnW8oS1DR3Up1iJSfK13SMLVTbqONGhn7y0xUfjkkw4MCv1cj0QJSf_D3D2DmURo9aqYWjydYu3jGyxM_8bvnTN6QNBHOrJCOddCJTP50B0TW6k6VZPLqLl6_tkm0nUXS0qj9Xg9WE9HARXymuvkktBxK6ZdDrh3xFYwjlO2NfYvLHPUtkZ5ByFN8W91FJnKf8-sUGniIowdevTc97cU7oPjPsGw7WhNZcO1WeRei2LT5lXY4dVw0FcUq_SXXO2Jo8ptVYMghm3S2XyrgCEj3ZNrj550n5WZeDHiKNCdkh7EC7R2B6SIb-L8DxLPUw-_mdEPAyRFxJFOGCtoojTYehDdWh4B9KpnnFHjd4ejeu7oBKvcDeArsrdS0VpL_qRApdRqL4V_u25_pe-wZ1k0Lyf4wleIB7rmxjCfrpk"),
     *            @OA\Property(property="email", type="string", example="teacher@test.com.eyJhdWQiOiIxIiwianRpIjoiYmVhNDFmZmQ2YzA0OTNiOTAxZjkwZmYxMTJiNWQxM2JkZjE0MjBkYjUzN2FlMDBkZGZmMmIxMjQwMjk2N2ZiZTM4MTk3NTM4ZmJkNDM3MWUiLCJpYXQiOjE2NzQwMjA0NzMuNjQxNywibmJmIjoxNjc0MDIwNDczLjY0MTcwNSwiZXhwIjoxNzA1NTU2NDczLjU4ODc0LCJzdWIiOiI1NDUzIiwic2NvcGVzIjpbXX0.eR-7ChIK-aFtyzWKk6gBTVLBInC45XOLOyKhRkRWv-EITFxZ9QasRkTkWnG2ECDbfb0pO5iYsyx3kADUeMRld2PSNWvq-rzE4q4IWwzLR9GaBwI-BdMW901SI3BXOpnlaPPbRPyLA2HOprJ_hWeG9kJ7euUXxvq1TwjmkfvY7TvLx6oMTxB6gTWvxcvm_IAe4J6e4xyeWpD1wlFz6GQmWie6WycBrHMCzpiLCuTbrJwHkiqoTLTjRhaiWfZzrms7OYALXnW8oS1DR3Up1iJSfK13SMLVTbqONGhn7y0xUfjkkw4MCv1cj0QJSf_D3D2DmURo9aqYWjydYu3jGyxM_8bvnTN6QNBHOrJCOddCJTP50B0TW6k6VZPLqLl6_tkm0nUXS0qj9Xg9WE9HARXymuvkktBxK6ZdDrh3xFYwjlO2NfYvLHPUtkZ5ByFN8W91FJnKf8-sUGniIowdevTc97cU7oPjPsGw7WhNZcO1WeRei2LT5lXY4dVw0FcUq_SXXO2Jo8ptVYMghm3S2XyrgCEj3ZNrj550n5WZeDHiKNCdkh7EC7R2B6SIb-L8DxLPUw-_mdEPAyRFxJFOGCtoojTYehDdWh4B9KpnnFHjd4ejeu7oBKvcDeArsrdS0VpL_qRApdRqL4V_u25_pe-wZ1k0Lyf4wleIB7rmxjCfrpk"),
     *            @OA\Property(property="remember_token", type="string", example="eyJ0eXAiOsdiJKV1LCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmVhNDFmZmQ2YzA0OTNiOTAxZjkwZmYxMTJiNWQxM2JkZjE0MjBkYjUzN2FlMDBkZGZmMmIxMjQwMjk2N2ZiZTM4MTk3NTM4ZmJkNDM3MWUiLCJpYXQiOjE2NzQwMjA0NzMuNjQxNywibmJmIjoxNjc0MDIwNDczLjY0MTcwNSwiZXhwIjoxNzA1NTU2NDczLjU4ODc0LCJzdWIiOiI1NDUzIiwic2NvcGVzIjpbXX0.eR-7ChIK-aFtyzWKk6gBTVLBInC45XOLOyKhRkRWv-EITFxZ9QasRkTkWnG2ECDbfb0pO5iYsyx3kADUeMRld2PSNWvq-rzE4q4IWwzLR9GaBwI-BdMW901SI3BXOpnlaPPbRPyLA2HOprJ_hWeG9kJ7euUXxvq1TwjmkfvY7TvLx6oMTxB6gTWvxcvm_IAe4J6e4xyeWpD1wlFz6GQmWie6WycBrHMCzpiLCuTbrJwHkiqoTLTjRhaiWfZzrms7OYALXnW8oS1DR3Up1iJSfK13SMLVTbqONGhn7y0xUfjkkw4MCv1cj0QJSf_D3D2DmURo9aqYWjydYu3jGyxM_8bvnTN6QNBHOrJCOddCJTP50B0TW6k6VZPLqLl6_tkm0nUXS0qj9Xg9WE9HARXymuvkktBxK6ZdDrh3xFYwjlO2NfYvLHPUtkZ5ByFN8W91FJnKf8-sUGniIowdevTc97cU7oPjPsGw7WhNZcO1WeRei2LT5lXY4dVw0FcUq_SXXO2Jo8ptVYMghm3S2XyrgCEj3ZNrj550n5WZeDHiKNCdkh7EC7R2B6SIb-L8DxLPUw-_mdEPAyRFxJFOGCtoojTYehDdWh4B9KpnnFHjd4ejeu7oBKvcDeArsrdS0VpL_qRApdRqL4V_u25_pe-wZ1k0Lyf4wleIB7rmxjCfrpk"),
     *         )
     *       ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *
     *          @OA\JsonContent()
     *       ),
     *
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $app = [
                'system_name' => env('APP_NAME', 'MEROGRADE'),
                'version' => version(),
                'academy' => [
                    'name' => title(),
                    'description' => description(),
                    'address' => address(),
                    'phone' => phone(),
                    'email' => email(),
                    'favicon' => url(favicon()),
                    'logo' => url(logo()),
                    'banner' => url(banner()),
                    'domain' => url('/'),
                ],
            ];

            $payload = [
                'token' => $user->createToken('UserToken')->accessToken,
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'remember_token' => $user->remember_token,
                'app' => $app,
                'data' => [
                    'profile' => $user->profile,
                    'roles' => Role::with('permissions')->whereIn('id', $user->roles->pluck('id')->toArray())->get(),
                ],
            ];

            return $this->sendResponse($payload, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
