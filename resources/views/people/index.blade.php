@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> People
            <a class="btn btn-success pull-right" href="{{ route('people.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
<form action="{{route('people.index')}}" method="GET">
        <table class="table table-condensed">
        <tr>
            <td>
                <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}">
                <input
                    type="text"
                    id="search-field"
                    name="search"
                    class="form-control"/>
            </td>
            <td>
                <button
                    type="submit"
                    class="btn btn-primary">Search
                </button>
            </td>
        </tr>
        </table>
    </form>


    <div class="row">
        <div class="col-md-12">
            @if($people->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FIRST</th>
                        <th>LAST</th>
                        <th>PHONE</th>
                            <th>Email</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($people as $person)
                            <tr>
                            <td>{{$person->id}}</td>
                            <td>{{$person->first}}</td>
                            <td>{{$person->last}}</td>
                            <td>{{$person->phone}}</td>
                            <th>{{$person->email}}</th>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('people.show', $person->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('people.edit', $person->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $people->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection