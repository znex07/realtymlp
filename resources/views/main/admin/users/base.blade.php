@extends('main.admin.base')


@section('styles')
    <link href='/assets/css/tabstyles.css' rel='stylesheet'/>
    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/alertify.css">
    <link rel="stylesheet" href="/assets/css/themes/default.css">

@endsection

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-10">
                    @yield('content.inner')
                </div>
            </div>
        </section>
    </section>
@endsection


@section('script')
    <script>

        $('#example').DataTable();
        oTable = $('#AttributesList-table').dataTable({
            "aoColumnDefs": [
                {
                    "aTargets": ['_all'],
                    "mRender": function (data, type, full) {
                        if (data != null) {
                            return '<div class="test" style="text-overflow:ellipsis;">' + data + '</div>';
                        }
                        else {
                            return '';
                        }
                    }
                }
            ]
        });
        $('#btnAddUser').click(function (e) {
            var lowercase = 'abcdefghijklmnopqrstuvwxyz';
            var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var numbers = '0123456789';

            var all = lowercase + uppercase + numbers;

            String.prototype.pick = function (min, max) {
                var n, chars = '';

                if (typeof max === 'undefined') {
                    n = min;
                } else {
                    n = min + Math.floor(Math.random() * (max - min));
                }

                for (var i = 0; i < n; i++) {
                    chars += this.charAt(Math.floor(Math.random() * this.length));
                }

                return chars;
            };


            // Credit to @Christoph: http://stackoverflow.com/a/962890/464744
            String.prototype.shuffle = function () {
                var array = this.split('');
                var tmp, current, top = array.length;

                if (top) while (--top) {
                    current = Math.floor(Math.random() * (top + 1));
                    tmp = array[current];
                    array[current] = array[top];
                    array[top] = tmp;
                }

                return array.join('');
            };

            var password = (lowercase.pick(1) + uppercase.pick(1) + all.pick(3, 10)).shuffle();
            $('#password').val(password);
            console.log('asd');
        });


        $('.delete_user').click(function (e) {
            var id = $(this).data('id');
            var _token = $('#_token').val();

            alertify
                    .confirm("RealtyMLP", "Are you sure you want to delete?",
                            function () {
                                $.ajax({
                                    url: '/admin/users/delete',
                                    type: 'post',
                                    data: {'_token': _token, 'id': id},

                                    success: function (success) {
                                        console.log('success ' + success);
                                        location.reload();
                                    },
                                    error: function (error) {
                                        console.log('error' + error);
                                    }

                                });
                            },
                            function () {
                                console.log('cancel');
                            }
                    );
        });

        $('.edit_user').click(function (e) {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var _token = $('#_token').val();

            console.log('edit' + id + _token);

            window.open('/admin/users/edit/' + id + '/' + name, 'mywindow', 'menubar=0,location=1,status=1,scrollbars=1,width=1000,height=500,left=0,top=0,screenX=50,screenY=100');
        });

        $('#btn-submit').click(function () {
            window.close();
        });

    </script>
@endsection
