<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class InvoiceController extends Controller
{
    private $statusList = ['paga', 'aberta', 'atrasada'];
    private $errors = ['error' => []];
    private $makeHidden = ['id', 'user_id', 'updated_at', 'created_at'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLogin = auth::user();
        $user = User::where('id', $userLogin['id'])->first();

        return response()->json(['result' => $user->invoices()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $this->validateStatus($request->status, $this->statusList, $this->errors);
        $expiration = $this->validateExpiration($request->expiration, $this->errors);
        $url = $this->validateUrl($request->url, $this->errors);

        if (count($this->errors['error'])) {
            return response()->json($this->errors, 400);
        }

        $invoice = new Invoice();
        $userLogin = auth::user();

        $invoice->status = $status;
        $invoice->expiration = $expiration;
        $invoice->user_id = $userLogin['id'];
        $invoice->url = $url;
        $invoice->save();

        return response()->json(
            ['success' =>
                [
                    'message' => 'Invoice successfully registered.',
                    'result' => [$invoice->makeHidden($this->makeHidden)]
                ]
            ]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = new Invoice();
        $userLogin = auth::user();
        $result = $invoice->where('id', $id)->where('user_id', $userLogin['id'])->first();

        if ($result) {
            return response()->json([
                'success' => true,
                'result' => [$result->makeHidden($this->makeHidden)]
            ], 200);
        } else {
            return response()->json(['error' => 'Invoice not found'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {

        $invoice = new Invoice();
        $userLogin = auth::user();
        $result = $invoice->where('id', $id)->where('user_id', $userLogin['id'])->first();

        if ($result) {

            $status = $this->validateStatus($request->status, $this->statusList, $this->errors);
            $expiration = $this->validateExpiration($request->expiration, $this->errors);
            $url = $this->validateUrl($request->url, $this->errors);

            if (count($this->errors['error'])) {
                return response()->json($this->errors, 400);
            }


            $result->status = $status;
            $result->expiration = $expiration;
            $result->url = $url;
            $result->save();

            return response()->json([
                'success' => 'Invoice update success',
                'result' => [$result->makeHidden($this->makeHidden)]
            ], 200);
        } else {
            return response()->json(['error' => 'Invoice not found'], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $userLogin = auth::user();
        $invoice = new Invoice();

        $result = $invoice->where('id', $id)->where('user_id', $userLogin['id'])->first();
        if ($result) {
            $isDeleted = Invoice::destroy($id);
            if ($isDeleted) {
                return response()->json([
                    'success' => 'Invoice successfully deleted',
                    'result' => true
                ], 200);
            }
        } else {
            return response()->json(['error' => 'Invoice not found'], 404);

        }

    }


    private function validateStatus($status, $statusList, &$errors)
    {
        if (!is_null($status)) {
            if (is_numeric($status)) {
                if ($status >= 0 && $status <= count($statusList) - 1) {
                    return $statusList[$status];
                } else {
                    $errors['error']['status'] = 'Enter a valid value for the status field, the allowed values are between 0 and 2 .If in doubt, check the documentation.';
                    return;
                }
            } else {
                if (in_array(strtolower($status), $statusList)) {
                    return $status;
                } else {
                    $errors['error']['status'] = 'Enter a valid value for the status field, the allowed values : ' . implode(' or ', $statusList) . '  . If in doubt, check the documentation.';
                    return;
                }
            }
        } else {
            $errors['error']['status'] = 'The status field is required.';
        }
    }

    private function validateExpiration($expiration, &$errors)
    {
        if (!is_null($expiration)) {
            try {
                return \Carbon\Carbon::parse($expiration)->format('Y-m-d');
            } catch (\Exception $e) {
                $errors['error']['expiration'] = 'insert a valid date.';
            }
        } else {
            $errors['error']['expiration'] = 'The expiration field is required.';
        }
    }

    private function validateUrl($url, &$errors)
    {
        if (!is_null($url)) {
            return $url;
        } else {
            $errors['error']['url'] = 'The url field is required.';
        }
    }
}
