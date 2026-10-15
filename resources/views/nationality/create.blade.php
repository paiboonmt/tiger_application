@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | เพิ่มสัญชาติ')
@section('page-title', 'เพิ่มสัญชาติ')

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card">

                <div class="card-header bg-dark">
                    <div class="card-title">
                        เพิ่มสัญชาติ ( ประเทศ )
                    </div>
                    <div class="card-tools">
                        <a href="{{ route('nationality.index') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-arrow-left"></i>
                            กลับ
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('nationality.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">ชื่อสัญชาติ</label>
                                    <input type="text" name="n_name" class="form-control" autofocus required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    บันทึก
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: @json(session('success')),
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location = "{{ route('nationality.index') }}";
            });
        </script>
    @endif
@endpush
