<div class="row">
    <div class="col-md-12">
        <div class="card p-1">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                
                        <th>เลขสมาชิก</th>
                        <th>ชื่อสมาชิก</th>
                        <th>เลขวิซ่า</th>
                        <th>สัญชาติ</th>
                        <th>ประเพศการฝึกซ้อม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsor as $s)
                        <tr>
                            <td>{{ $s->m_card }}</td>
                            <td>{{ $s->fname }}</td>
                            <td>{{ $s->p_visa }}</td>
                            <td>{{ $s->nationalty }}</td>
                            <td>{{ $s->type_training }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>