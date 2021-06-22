@extends('items.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Chase Web App</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($items as $item)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $item->name }}</td>
        <th>{{ $item->created_at }}</th>
        <th>{{ $item->updated_at }}</th>
        <td>
            <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

<!-- {!! $items->links() !!} -->

@endsection