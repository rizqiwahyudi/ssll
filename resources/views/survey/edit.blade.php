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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit Survey</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="survei-form" enctype="multipart/form-data">
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
        var count_yes = [];
        var count_que = [];
        // var count_no[] = 0;
        // var que = $('.soal').length;
        // var total = que / 2;
        var que = 0;
        var total = 0;
        var kategori_count = "{{ $kategori_count }}";

        $(document).ready(function() {

            $('#survei-form').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                for (const pair of formData.entries()) {
                    if (pair[0] != "by" && pair[0] != "sekolah" && pair[0] != "_token") {
                        count_que.push(pair[0])
                    }
                }
                console.log(count_que);

                for (const pair of formData.entries()) {
                    // console.log(`${pair[0]}, ${pair[1]}`);
                    if (pair[1] == "yes") {
                        count_yes.push(pair[1])
                    }

                }
                var tot_que = count_que.length / 2;
                if (count_yes.length > tot_que) {
                    // console.log("berhasil");
                    formData.append("hasil","sekolah sadar lalu lintas")
                    $.ajax({
                        url: "{{ route('survey.store') }}",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                } else {
                    // console.log("Sekolah Tidak Sadar Lalu Lintas");
                    formData.append("hasil","sekolah tidak sadar lalu lintas")
                    $.ajax({
                        url: "{{ route('survey.store') }}",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
            });
            // $("input[type=radio]").on('change',function(){
            //     changedRadio(this);
            // });

            // function changedRadio(clickedEle)
            // {
            //     if($(clickedEle).val() == "yes")
            //     {

            //     }

            //     if($(clickedEle).val() == "no")
            //     {

            //     }
            //     console.log(count_yes, count_no);
            //     if(count >= total){
            //         alert('Sadar Lalu Lintas')
            //     }
            //     if(count < total) {
            //         alert('Tidak Sadar Lalu Lintas')
            //     }
            // }

            function divModifier(item = kategori_count, mod = 1) {
                for (let i = 1; i <= item; i++) {
                    if (i === mod) {
                        $('#section-' + i).show();
                    }
                }
            }
            divModifier();
        });
    </script>
@endsection
@endsection
