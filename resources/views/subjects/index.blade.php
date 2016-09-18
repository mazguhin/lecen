@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Дисциплины <a href="{{ url('/subjects/create') }}" class="btn btn-primary btn-xs" title="Add New Subject"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th> Имя </th><th> Часы </th><th> Стоимость </th><th>Курс</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($subjects as $item)
                <tr>
                    <td>{{ $item->name }}</td><td>{{ $item->hours }}</td><td>{{ $item->cost }}</td><td>{{ $item->course->name }}</td>
                    <td>
                        <a href="{{ url('/subjects/' . $item->id) }}" class="btn btn-success btn-xs" title="View Subject"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/subjects/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Subject"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/subjects', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Subject" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Subject',
                                    'onclick'=>'return confirm("Действительно удалить?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $subjects->render() !!} </div>
    </div>

</div>
@endsection
