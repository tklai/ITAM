<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">
<script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
<script type="text/javascript">
    function addActions(value, row) {
        return [
                @if(Route::currentRouteName() === 'asset.index')
                '<button id="detail" class="btn btn-info mr-1" aria-label="detail">' +
                    '<span class="fa fa-list"></span> ' +
                    '<span class="d-none d-md-inline"> Detail</span>' +
                '</button>',
                @endif
                `<button id="edit" class="btn btn-light mr-1" aria-label="edit">` +
                    '<span class="fa fa-pencil" data-glyph="pencil"></span>' +
                    '<span class="d-none d-md-inline"> Edit</span>' +
                '</button>',
                {{-- Delete button (DISABLED)
                '<button id="delete" class="btn btn-danger" aria-label="delete">' +
                    '<span class="fa fa-trash"></span> ' +
                    '<span class="d-none d-md-inline"> Delete</span>' +
                '</button>' --}}
        ].join('');
    }

    @if(Route::currentRouteName() === 'vendor.index')
    function phoneCall(value) {
        return `<a href="tel:${value}">${value}</a>`;
    }
    @endif

    window.actionEvents = {
        'click #edit': function (e, value, row) {
            window.location.assign(`/admin/@yield('category')/${row['id']}/edit`);
        },
        {{-- Delete button event (DISABLED)
        'click #delete': function (e, value, row) {
            e.preventDefault();
            $.ajax({
                url: `/admin/@yield('category')/${row['id']}`,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function () {
                    if (!confirm('Are you sure to delete the selected data?')) {
                        return false;
                    }
                },
                success: function () {
                    $('.table').bootstrapTable('refresh');
                },
                error: function () {
                    alert('Something happened wrong.');
                }
            });
        }
        --}}
    };
</script>
