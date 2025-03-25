@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <style>
        .modal-header {
            background-color: #f1f1f1;
            color: #000;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-body {
            padding: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
            padding: 10px;
        }

        .modal-footer .btn {
            padding: 5px 20px;
        }
    </style>
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Bookings</h4>
                                </div>
                            </div>
                            <div class="card-body  table-responsive">
                                <table class="responsive table table-striped table-bordered" id="table_id_events">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Service Type</th>
                                            <th>Trip Type</th>
                                            <th>Airport PickUp</th>
                                            <th>Airport Charges</th>
                                            <th>Duration</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Booking Status</th>
                                            <th>Reason For Cancellation</th>
                                            <th>Assign Chauffer</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->vehicle->name }}</td>
                                                <td>
                                                    @if ($booking->trip_type == 'by_hour')
                                                        <span>By Hour</span>
                                                    @else
                                                        <span>One Way</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($booking->airport_pickup == 'yes')
                                                        <span>Yes</span>
                                                    @else
                                                        <span>No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($booking->air_port_charges > 0)
                                                        <span>${{ $booking->air_port_charges }}</span>
                                                    @else
                                                        <span>No Charges Found!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($booking->duration_hours > 0)
                                                        <span>{{ $booking->duration_hours }} hours</span>
                                                    @else
                                                        <span>No Duration Found!</span>
                                                    @endif
                                                </td>
                                                <td>{{ $booking->first_name }}</td>
                                                <td>{{ $booking->last_name }}</td>
                                                <td>
                                                    @if ($booking->status == 'Booked')
                                                        <span class="text-success">Booked</span>
                                                    @else
                                                        <span class="text-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($booking->reason != null)
                                                        <p>{{ \Illuminate\Support\Str::words($booking->reason, 10, '...') }}
                                                        </p>
                                                    @else
                                                        <span class="text-danger">No Reason Found!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <div class="d-flex">
                                                            <select name="chauffeur_id" class="form-control me-2" required>
                                                                <option value="">Select Chauffeur</option>
                                                                @foreach ($chauffers as $data)
                                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit" class="btn btn-primary">Assign</button>
                                                        </div>
                                                    </form>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-primary booking-data mr-2"
                                                            id="{{ $booking->id }}" data-toggle="modal"
                                                            data-target=".bd-example-modal-lg">View</button>
                                                        <button type="button" class="btn btn-danger btn-flat show_confirm"
                                                            onclick="openDeleteModal({{ $booking->id }})">
                                                            Delete
                                                        </button>

                                                    </div>
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
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg scrol" id="mymodal">
            </div>

        </div>
    </div>
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Booking info!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h5>Are you sure you want to delete this Booking information?</h5>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" id="confirmDeleteSubadmin">Delete</button>
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
        function openDeleteModal(bookingId) {
            // Set the action URL dynamically for the form in the modal
            const formAction = '{{ route('destroy', ':id') }}'.replace(':id', bookingId);
            document.getElementById('deleteCategoryForm').action = formAction;

            // Show the modal
            $('#deleteCategoryModal').modal('show');
        }

        document.getElementById('confirmDeleteSubadmin').addEventListener('click', function() {
            // Submit the form when the delete button in the modal is clicked
            document.getElementById('deleteCategoryForm').submit();
        });
    </script>
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

        $(document).on('click', '.booking-data', function() {
            var id = $(this).attr('id');
            // alert('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url: "{{ url('admin/viewBooking') }}",
                data: {
                    'id': id,

                },
                success: function(response) {
                    $("#mymodal").html(response);

                }
            });
        });
    </script>
@endsection
