@extends('layouts.app')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            <h4 class="card-title">
                Adding tasks
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('task') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                        <input type="text" name="name" placeholder="Input task..." id="task-name" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-success">Add task</button>
                </div>

            </form>
        </div>
        <div class="card-footer text-muted">
            @include('errors')
        </div>
    </div>

    @if(count($tasks) > 0 )
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title">Current tasks</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task -> name }}</div>
                            </td>
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection