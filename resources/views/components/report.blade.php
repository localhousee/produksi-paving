<div>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#reportModal"><i class="fas fa-download fa-sm text-white-50"></i> Report</a>

    <!-- Report Modal-->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('report.store') }}" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Report {{ $type }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td>Tanggal Awal</td>
                                <td><input type="date" name="start" id="start" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Awal</td>
                                <td><input type="date" name="end" id="end" class="form-control"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
