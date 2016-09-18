@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Курсы <a href="{{ url('/courses/create') }}" class="btn btn-primary btn-xs" title="Add New Course"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th> Название </th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($courses as $item)
                <tr>                    
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/courses/' . $item->id) }}" class="btn btn-success btn-xs" title="View Course"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/courses/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/courses', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Course" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Course',
                                    'onclick'=>'return confirm("Действительно удалить?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $courses->render() !!} </div>
    </div>

</div>
@endsection
