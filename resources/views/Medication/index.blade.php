@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stock List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('meds.create') }}" title="Add new Medication"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Batch Num</th>
            <th>Expiry Date</th>
            <th>Location</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($meds as $med)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $med->med_name }}</td>
                <td>{{ $med->batch_no }}</td>
                <td>{{ $med->expiry_date }}</td>
                <td>{{ $med->status }}</td>
                <td>
                    <form action="{{ route('meds.destroy', $med->medicine_id) }}" method="POST">

                        <a href="{{ route('meds.show', $med->medicine_id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('meds.edit', $med->medicine_id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $meds->links() !!}

@endsection
