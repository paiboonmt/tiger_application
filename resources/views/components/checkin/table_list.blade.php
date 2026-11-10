<table class="table table-bordered mt-1" id="checkin-table">
    <thead>
        <tr>
            <th>หมายเลขสมาชิก</th>
            <th>ชื่อ-นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>วันที่สมัครสมาชิก</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            
            @if ($row['group'] == 'A' )
                @include('components/checkin/customer')
            @elseif ($row['group'] == 'B')
                @include('components/checkin/fighter')
            @endif
                
        @endforeach
    </tbody>
</table>

