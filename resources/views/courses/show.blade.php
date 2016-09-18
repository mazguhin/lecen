@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Просмотр
        <a href="{{ url('courses/' . $course->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['courses', $course->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Course',
                    'onclick'=>'return confirm("Действительно удалить?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr><th> Название </th><td> {{ $course->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
