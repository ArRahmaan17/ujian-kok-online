@extends('templates.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/alertify.min.css') }}" />
@endsection
@section('content')
    <div id="class-upload"
        class="dropzone rounded-xl dark:bg-dark dark:text-indigo-400 border-2 border-slate-300 dark:border-indigo-800 ">
    </div>
    <button id="process-upload" disabled
        class="mt-3 inline-block rounded bg-orange-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
        Upload
    </button>
@endsection
@section('script')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            let myDropzone = new Dropzone("#class-upload", {
                url: `{{ route('classroom.execute') }}`,
                headers: {
                    "X-CSRF-TOKEN": `{{ csrf_token() }}`
                },
                uploadMultiple: false,
                acceptedFiles: '.xls,.xlsx',
                autoProcessQueue: false,
                addRemoveLinks: true,
                accept(file, done) {
                    $('.dz-remove').html('Hapus File');
                    let count = 0;
                    this.files.forEach((allfile, index) => {
                        if (file.name == allfile.name) {
                            if (file.name == allfile.name) {
                                count++;
                            }
                        }
                    });
                    if (count > 1) {
                        alertify.error('1 File Dihapus Karna Terindikasi Duplikasi').dismissOthers();
                        this.removeFile(file)
                    }
                    $('#process-upload').removeAttr('disabled');
                    return done();
                },
                success(file) {
                    this.removeFile(file);
                    alertify.error('uploaded successfully!');
                },
                error(file, message) {
                    alertify.error(message);
                    this.removeFile(file)
                }
            });
            $('#process-upload').click(function() {
                myDropzone.processQueue();
            });
            $('.dz-button').html('Click atau tarik file untuk upload');
        });
    </script>
@endsection
