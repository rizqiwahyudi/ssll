@extends('layouts.app3')

@section('title', '| Survey')
@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-3">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Add New Survey</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="survei-form" method="post" action="{{route('survey.store')}}" enctype="multipart/form-data">
                            @csrf
                            @include('survey.formCreate')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@section('script')
    <script type="text/javascript">
        // var count_yes = [];
        // var count_que = [];
        // var set_cookie = [];
        // var mod = 1;
        // var que = 0;
        // var total = 0;
        // var kategori_count = "{{ $kategori_count }}";

        // $(document).ready(function() {

        //     $('#survei-form').on('submit', function(e) {
        //         e.preventDefault();

        //         var formData = new FormData(this);

        //         for (const pair of formData.entries()) {
        //             if (pair[0] != "by" && pair[0] != "sekolah" && pair[0] != "_token") {
        //                 count_que.push(pair[0])
        //             }
        //         }
        //         // console.log(count_que);

        //         for (const pair of formData.entries()) {
        //             // console.log(`${pair[0]}, ${pair[1]}`);
        //             if (pair[1] == "yes") {
        //                 count_yes.push(pair[1])
        //             }

        //         }
        //         // console.log(count_yes);

        //         // for (const pair of formData.entries()) {
        //         //     if(pair[0] != "by" && pair[0] != "sekolah" && pair[0] != "_token")
        //         //     {
        //         //         set_cookie.push(pair[0],pair[1])
        //         //     }
        //         // }
        //         var tot_que = count_que.length / 2;
        //         if (count_yes.length > tot_que) {
        //             console.log("sekolah sadar lalu lintas");
        //             tmp_mod = mod;
        //             mod = mod+1;
        //             divModifier(kategori_count, mod);
        //             // document.cookie = `history=${set_cookie}`;
        //             formData.append("hasil","sekolah sadar lalu lintas")
        //             // $.ajax({
        //             //     url: "{{ route('survey.store') }}",
        //             //     type: "POST",
        //             //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             //     data: formData,
        //             //     cache: false,
        //             //     contentType: false,
        //             //     processData: false
        //             // });
        //         } else {
        //             console.log("sekolah tidak sadar lalu lintas");
        //             // document.cookie = `history=${set_cookie}`;
        //             formData.append("hasil","sekolah tidak sadar lalu lintas")
        //             // $.ajax({
        //             //     url: "{{ route('survey.store') }}",
        //             //     type: "POST",
        //             //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             //     data: formData,
        //             //     cache: false,
        //             //     contentType: false,
        //             //     processData: false
        //             // });
        //         }
        //     });

        //     function divModifier(item = kategori_count, mod = 1) {
        //         for (let i = 1; i <= item; i++) {
        //             if (mod <= item) {
        //                 if (i === mod) {
        //                     $('#section-' + i).show();
        //                 }else{
        //                     $('#section-'+i).hide();
        //                 }
        //             }
        //         }
        //     }
        //     divModifier();
        // });
    </script>
@endsection
@endsection
