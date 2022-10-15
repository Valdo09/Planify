<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'identifiant' => 'required',
            'password' => 'required'
        ];
    }
    public function getCredentials()
    {
        // The form field for providing identifiant or password
        // have name of "identifiant", however, in order to support
        // logging users in with both (identifiant and email)
        // we have to check if user has entered one or another
        $identifiant = $this->get('identifiant');

        if ($this->isEmail($identifiant)) {
            return [
                'email' => $identifiant,
                'password' => $this->get('password')
            ];
        }

        return $this->only('identifiant', 'password');
    }
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['identifiant' => $param],
            ['identifiant' => 'email']
        )->fails();
    }

}
