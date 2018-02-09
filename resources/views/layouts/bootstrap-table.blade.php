<script type="text/javascript">
    // Add control buttons for list page
    function addActions(value, row) {
        return [
                '<button id="edit" class="btn btn-outline-dark mr-1" aria-label="detail">' +
                    '<span class="fa fa-pencil" data-glyph="pencil"></span> Edit' +
                '</button>',
                {{-- Detail button (DISABLED)
                `<button id="detail" class="btn btn-info mr-1" aria-label="edit">` +
                    '<span class="fa fa-list"></span> ' +
                    '<span class="d-none d-md-inline"> Detail</span>' +
                '</button>', --}}
                {{-- Delete button (DISABLED)
                '<button id="delete" class="btn btn-danger" aria-label="delete">' +
                    '<span class="fa fa-trash"></span> ' +
                    '<span class="d-none d-md-inline"> Delete</span>' +
                '</button>' --}}
        ].join('');
    }

    window.actionEvents = {
        'click #edit': function (e, value, row) {
            window.location.assign(`/@yield('category')/${row['id']}/edit`);
        },
        {{-- Detail button event (DISABLED)
        'click #detail': function (e, value, row) {
            window.location.assign(`/@yield('category')/${row['id']}`);
        },
        --}}
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

        function phoneCall(value) {
            return `<a href="tel:${value}">${value}</a>`;
        }

        function vendorDetail(value, row) {
            return `<a href="/vendors/${row['id']}">${value}</a>`;
        }

        function modelDetail(value, row) {
            return `<a href="/models/${row['id']}">${value}</a>`;
        }

        function locationDetail(value, row) {
            return `<a href="/locations/${row['id']}">${value}</a>`;
        }

        function assetDetail(value, row) {
            return `<a href="/assets/${row['id']}">${value}</a>`;
        }

    @if(Route::currentRouteName() === 'assets.index')
        // Format the cell for Asset Management

        function assetModelDetail(value, row) {
            return `<a href="/models/${row['asset_model_id']}">${value}</a>`;
        }

        function assetLocationDetail(value, row) {
            return `<a href="/locations/${row['location_id']}">${value}</a>`;
        }

        function assetVendorDetail(value, row) {
            return `<a href="/vendors/${row['vendor_id']}">${value}</a>`;
        }

        // Format the cell and highlight the asset
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
    @endif
</script>
