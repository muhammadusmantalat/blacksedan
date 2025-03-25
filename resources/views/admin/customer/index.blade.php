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
                                    <h4>Customers</h4>
                                </div>
                            </div>
                            <div class="card-body  table-responsive">
                                {{-- <a class="btn btn-success mb-3" href="{{ route('vehicle.create') }}">Add data</a> --}}
                                <table class="responsive table table-striped table-bordered" id="table_id_events">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->fname }}</td>
                                                <td>{{ $data->lname }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->phone }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('customer.status', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <select name="status" class="form-control"
                                                            onchange="handleStatusChange(this, '{{ $data->id }}')">
                                                            <option value="0"
                                                                {{ $data->is_active == 0 ? 'selected' : '' }} disabled>
                                                                Pending</option>
                                                            <option value="1"
                                                                {{ $data->is_active == 1 ? 'selected' : '' }}>Activated
                                                            </option>
                                                            <option value="2"
                                                                {{ $data->is_active == 2 ? 'selected' : '' }}>De-Activated
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td class="d-flex ml-4">
                                                    <a class="btn btn-info mb-1"
                                                    href="{{ route('customer.edit', $data->id) }}">Edit</a>
                                                <form method="post"
                                                    action="{{ route('customer.destroy', $data->id) }}">
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
<!-- Deactivation Modal -->
<div class="modal fade" id="deactivationModal" tabindex="-1" role="dialog" aria-labelledby="deactivationModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="deactivationForm" action="" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="deactivationModalLabel">Reason for De-Activation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="reason">Please provide the reason for rejecting this:</label>
                    <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                </div>
                <input type="hidden" name="status" value="2">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
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
    
    function handleStatusChange(selectElement, productId) {
                if (selectElement.value == 2) {
                    selectElement.form.submit();

                    // $('#deactivationForm').attr('action', '{{ url('admin/customer/status/') }}/' + productId);
                    // $('#deactivationModal').modal('show');
                } else {
                    selectElement.form.submit();
                }
            }
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
