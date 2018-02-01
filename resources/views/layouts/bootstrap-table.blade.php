<script type="text/javascript">
    // Add control buttons for list page
    function addActions(value, row) {
        return [
                '<button id="detail" class="btn btn-info mr-1" aria-label="detail">' +
                    '<span class="fa fa-list"></span> ' +
                    '<span class="d-none d-md-inline"> Detail</span>' +
                '</button>',
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

    window.actionEvents = {
        'click #detail': function (e, value, row) {
            window.location.assign(`/@yield('category')/${row['id']}`);
        },
        'click #edit': function (e, value, row) {
            window.location.assign(`/@yield('category')/${row['id']}/edit`);
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

    // Format the cell and allow user to make call from mobile devices
    function phoneCall(value) {
        return `<a href="tel:${value}">${value}</a>`;
    }

    function modelDetail(value, row) {
        return `<a href="/models/${row['asset_model_id']}">${value}</a>`;
    }

    function locationDetail(value, row) {
        return `<a href="/locations/${row['location_id']}">${value}</a>`;
    }

    function vendorDetail(value, row) {
        return `<a href="/vendors/${row['vendor_id']}">${value}</a>`;
    }

    // Format the cell and highlight the asset that
    function warrantyCell(value) {
        var warrantyDate = new Date(value);
        var today = new Date();
        var diff = Math.round((warrantyDate - today)/86400000);
        switch (true) {
            case (diff < 365 && diff >= 180):
                return {css: {"background-color": "#daffb3"}};
            case (diff < 180 && diff >= 90):
                return {css: {"background-color": "#ffffbb"}};
            case (diff < 90):
                return {css: {"background-color": "#ffad99", "color": "white"}};
            default:
                return {};
        }
    }
</script>
