@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Semua Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Passengers</th>
                        <th>Purpose</th>
                        <th>No. Phone</th>
                        <th>Day To Go</th>
                        <th>Time To Go</th>
                        <th>Day Back</th>
                        <th>Time Back</th>
                        <th>Status</th>
                        @if(Auth::user()->is_admin) <!-- Check if the user is admin -->
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->nama_lengkap }}</td>
                                <td>{{ $booking->destination }}</td>
                                <td>{{ $booking->total_penumpang }}</td>
                                <td>{{ $booking->jenis_pinjam }}</td>
                                <td>
                                    <a href="telp:{{ $booking->nomer_wa }}">{{ $booking->nomer_wa }}</a>
                                </td>
                                <td>{{ $booking->hari_berangkat }}</td>
                                <td>{{ $booking->jam_berangkat }}</td>
                                <td>{{ $booking->hari_pulang }}</td>
                                <td>{{ $booking->jam_pulang }}</td>
                                <td>{{ $booking->status }}</td>
                                
                                @if(Auth::user()->is_admin) <!-- Check if the user is admin -->
                                    <td> 
                                      <div class="btn-group btn-group-sm">
                                        <form onclick="return confirm('are you sure !')" action="{{ route('admin.bookings.destroy', $booking) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" booking="submit"><i class="fa fa-trash"></i></button>
                                        </form>

                                        <form action="{{ route('admin.bookings.checklist', $booking) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-primary" type="submit">
                                                <i class="fa fa-check"></i> F
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.bookings.checklist', $booking) }}" method="POST">
                                          @csrf
                                          <button class="btn btn-sm btn-primary" type="submit">
                                              <i class="fa fa-check"></i> R
                                          </button>
                                      </form>
                                      <form action="{{ route('admin.bookings.checklist', $booking) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-check"></i> C
                                        </button>
                                    </form>
                                      </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Kosong !</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable();
    </script>
@endpush
