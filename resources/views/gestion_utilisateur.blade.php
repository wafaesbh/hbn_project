@extends("menu")
@section('css')
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
@endsection
@section("body")
    <table id="utilisateur" class="table table-bordered table-hover">
                            <thead>

                            </thead>

                        </table>


@endsection
@section("js")
<!-- page script -->
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
<script src="{{ asset('js/gestion_utilisateur.js') }}" charset="utf-8"></script>
@endsection