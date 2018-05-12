@extends('layouts.app')

@section('content')

    <div class="container spark-screen">
        <div class="row margin-top-40">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">View Inventory</div>
                    <div class="panel-body table">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/s/bs/dt-1.10.10,b-1.1.0,b-colvis-1.1.0,b-print-1.1.0,r-2.0.0,se-1.1.0/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    <script type="text/javascript">
        var oTable = $('#dataTableBuilder').DataTable();
        $('#dataTableBuilder').addClass("table-striped dt-responsive nowrap").width("100%");
    </script>
    <script type="text/javascript">
        var oTable = $('#dataTableBuilder').DataTable();
        $('#dataTableBuilder').addClass("table-striped dt-responsive nowrap").width("100%");
        LaravelDataTables['dataTableBuilder'].on('click', '#btnDel', function(e)
        {
            var href = $(this).attr('href');
            var removeIcon = $(this).find('i');
            removeIcon.removeClass('fa fa-btn fa-check-square fa-minus-square').addClass('fa fa-refresh fa-spin');
            $.ajax({url: href, success: function(result){
                oTable.ajax.reload(null,false);
            }});
            e.preventDefault();
        });
    </script>
@endpush
