<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\QueryException;
use App\Http\Requests\todoRequest;

class TaskController extends Controller
{

  public function index()
  {
    $tasks = Task::all();
    if (empty($tasks) || $tasks == '[]') {
      return $this->messageJson("Nenhuma tarefa criada", 400);
    }
    return response()->json($tasks, 200);
  }

  public function store(todoRequest $request)
  {
    try {
      $task = Task::create([
        'title' => $request['title'],
        'completed' => false
      ]);
      return $this->messageJson("Tarefa criada com sucesso!", 202,$task);
    }
    catch (QueryException $e) {
      return $this->messageJson("Houve algum erro!", 400, $e);
    }
  }

  public function updateStatus(todoRequest $request, int $id)
  {

    if (is_null($request['completed']) || !is_null($request['title'])) {
      return $this->messageJson("Informe apenas o status da tarefa", 400);
    }
    else if (!is_bool($request['completed'])) {
      return $this->messageJson("Informe uma valor boleano(true, false)", 400);
    }
    return $this->update($request, $id);
  }

  public function updateTask(todoRequest $request, int $id)
  {
    if (!is_null($request['completed']) || is_null($request['title'])) {
      return $this->messageJson("Informe o novo nome da tarefa!", 400);
    }
    return $this->update($request, $id);
  }

  public function update(todoRequest $request, int $id)
  {
    try {
      $task = Task::find($id);
      if (empty($task)) {
        return $this->messageJson("Tarefa não encontrada!", 400);
      }

      $task->update([
        'title' => !is_null($request['title']) ? $request['title'] : $task->title,
        'completed' => !is_null($request['completed']) ? $request['completed'] :$task->completed
      ]);

      return $this->messageJson("Tarefa atualizada com sucesso !", 202,$task);
      }
      catch (QueryException $e) {
        return $this->messageJson("Houve algum erro!", 400, $e);
    }
  }


  public function destroy(int $id)
  {
    try {
      $task = Task::find($id);
      if (empty($task)) {
        return $this->messageJson("Tarefa não encontrada!", 400);
      }

      $task->delete();
      return $this->messageJson("Tarefa deletada com sucesso!", 202, $task);
    }
    catch (QueryException $e) {
      return $this->messageJson("Houve algum erro!", 400, $e);
    }
  }

  public function messageJson($message, $httpCode, $obj = false)
  {
    if (!$obj) {
      return response()->json(['message' => $message],$httpCode);
    }
    return response()->json([
      'data'=> $obj,
      'message' => $message, 
    ],$httpCode);
  }
}
