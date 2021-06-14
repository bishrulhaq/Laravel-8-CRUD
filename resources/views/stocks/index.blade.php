    @extends('stocks.layout')

    @section('content')

        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Simple Stock Management Application | BH</h2>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                <a class="btn btn-success " href="{{ route('stocks.create') }}"> Add Stock</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if(sizeof($stocks) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Qty.</th>
                    <th width="280px">More</th>
                </tr>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $stock->product_name }}</td>
                        <td>{{ $stock->product_desc }}</td>
                        <td>{{ $stock->product_qty }}</td>
                        <td>
                            <form action="{{ route('stocks.destroy',$stock->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('stocks.show',$stock->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('stocks.edit',$stock->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-alert">Start Adding to the Database.</div>
        @endif

        {!! $stocks->links() !!}

    @endsection