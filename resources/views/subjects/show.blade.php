@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Просмотр
        <a href="{{ url('subjects/' . $subject->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Subject"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['subjects', $subject->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Subject',
                    'onclick'=>'return confirm("Действительно удалить?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr><th> Название </th><td> {{ $subject->name }} </td></tr><tr><th> Часы </th><td> {{ $subject->hours }} </td></tr><tr><th> Стоимость </th><td> {{ $subject->cost }} </td></tr>
                <tr><th> Курс </th><td> {{ $subject->course->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
