@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Vehicles</h4>
                                </div>
                            </div>
                            <div class="card-body  table-responsive">
                                <a class="btn btn-success mb-3" href="{{ route('vehicle.create') }}">Add Vehicle</a>
                                <table class="responsive table table-striped table-bordered" id="table_id_events">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Model</th>
                                            <th>Number</th>
                                            <th>Base Price</th>
                                            <th>Price Per Kilometer</th>
                                            <th >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vehicles as $vehicle)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $vehicle->name }}</td>
                                                <td>
                                                    <img src="{{ asset($vehicle->image) }}" alt="" height="50"
                                                        width="50" class="image">
                                                </td>
                                                <td>{{ $vehicle->model }}</td>
                                                <td>{{ $vehicle->number_plate }}</td>
                                                <td>{{ $vehicle->base_price }}</td>
                                                <td>{{ $vehicle->price_per_kilometer }}</td>
                                                <td>

                                                    <a class="btn btn-info mb-1"
                                                        href="{{ route('vehicle.edit', $vehicle->id) }}">Edit</a>
                                                    <form method="post"
                                                        action="{{ route('vehicle.destroy', $vehicle->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                            data-toggle="tooltip">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table_id_events').DataTable()

        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
