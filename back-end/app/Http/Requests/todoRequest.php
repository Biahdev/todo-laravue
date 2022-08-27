<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class todoRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return [
      'required' => 'O campo :attribute é obrigatório',
      'min' => 'O campo :attribute precisa ter pelo menos :min caracteres',
      'max' => 'O campo :attribute precisa ter no máximo :max caracteres',
      'boolean' => 'Informe um valor de 0 ou 1 para o :attribute da tarefa ',
      'string' => 'O campo :attribute precisa ser uma string ',
    ];
  }

  public function attributes()
  {
    return [
      'task' => 'tarefas',
    ];
  }

  public function rules()
  {
    return [
      'task' => 'string|min:3',
      'status' => 'boolean'
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(
      response()->json([
      'errors' => $validator->errors(),
      'hasError' => true
    ], 422));
  }
}
