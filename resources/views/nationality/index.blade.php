@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | สัญชาติ')
@section('page-title', 'สัญชาติ')

@section('content')


    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col">
                            <h4>สัญชาติ</h4>
                        </div>
                        <div class="col text-end">
                            <a href="" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                เพื่มข้อมูล
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-body">
                    <table class="table table-bordered hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสัญชาติ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Thailand</td>
                                <th>
                                    <div class="row">
                                        
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
 
@endpush