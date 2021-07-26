@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <h2 class="title-dashboard-tab">Products</h2>
        <br/>

        <form id="import_products" method="post" enctype="multipart/form-data" action="{{route('import_products')}}">
            {{ csrf_field() }}
            <div style="display: inline-flex; margin-bottom: 20px;">
                <label>Import Products:</label>
                <input type="file" name="csv_file" id="csv_file" style="margin-left:10px;" />
                <input type="submit" id="upload" value="Upload" style="margin-top:-5px;" class="btn submit-import" />
            </div>
        </form>

        @if(count($products) > 0)
            <div class="table-responsive products-table-wrapp">
                <table class="table table-fixed" id="products-table">
                    <thead>
                        <tr>
                            <th style="width: 45px;">ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Subtype</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Stock Status</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Product URL</th>
                            <th style="width: 140px;">Import Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="width: 45px;">ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Subtype</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Stock Status</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Product URL</th>
                        <th style="width: 140px;">Import Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach( $products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->picture ? $product->picture : '-'}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category ? $product->category : '-'}}</td>
                                <td>{{$product->subcategory ? $product->subcategory : '-'}}</td>
                                <td>{{$product->subtype ? $product->subtype : '-'}}</td>
                                <td>{{$product->price != 0 ? $product->price : '-'}}</td>
                                <td>{{$product->discount ? $product->discount : '-'}}</td>
                                <td>{{$product->stock_status ? $product->stock_status : '-'}}</td>
                                <td>{{$product->description ? $product->description : '-'}}</td>
                                <td>{{$product->rating ? $product->rating : '-'}}</td>
                                <td>{{$product->product_url}}</td>
                                <td>{{$product->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        //Append dropdown in the top of column
         function cbDropdown(column) {
                return $('<ul>', {
                    'class': 'cb-dropdown'
                }).appendTo($('<div>', {
                    'class': 'cb-dropdown-wrap'
                }).appendTo(column));
            }

        //Initialization of DataTable
        var table = $('#products-table').DataTable({
            ordering: true,
            order: [[12, 'desc']],
            columnDefs: [
                {
                    "type": "date",
                    "targets": 12
                }
            ],
            lengthChange: false,
            responsive: true,
            language: {
                search: '',
                searchPlaceholder: 'Search'
            },
            bLengthChange: false,
            pageLength: 15,
            stateSave: true,
            orderCellsTop: true,
            fixedHeader: true,

            //Filter in dropdown select
            initComplete: function() {
                var index = 0;

                //list columns without filter select dropdown
                var arrayNotFilters = [0,1];
                this.api().columns().every(function() {
                    var column = this;
                    var ddmenu = cbDropdown($(column.header()))
                        .on('change', ':checkbox', function () {
                            var vals = $(':checked', ddmenu).map(function (index, element) {
                                return $.fn.dataTable.util.escapeRegex($(element).val());
                            }).toArray().join('|');

                            column
                                .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                                .draw();
                            if (vals === "") {
                                $(this).parent().removeClass("factive");
                            } else {
                                $(this).parent().addClass("factive");
                            }
                        });

                    //Append attributes to dropdown selects
                    if(jQuery.inArray(index, arrayNotFilters) === -1) {
                        column.data().unique().sort().each(function (d, j) {
                            var // wrapped
                                $label = $('<label>'),
                                $text = $('<span>', {
                                    text: d
                                }),
                                $cb = $('<input>', {
                                    type: 'checkbox',
                                    value: d
                                });
                            if(d && d !== '-') {
                                $text.appendTo($label);
                                $cb.appendTo($label);
                                ddmenu.append($('<li>').append($label));
                            }
                        });
                    }
                    index += 1;
                });

                $(".cb-dropdown-wrap").each(function(){
                    var $filters = $(this).find('li');
                    if($filters.length === 0)
                        $(this).css('display', 'none');
                    else
                        $(this).width($(this).parent().width());
                });
            }
        });

         $(document).ready(function() {
             // Select one single attribute in dropdown (the bottom of the column - footer datatable)
             $("#products-table tfoot th").each( function ( i ) {
                 var select = $('<select><option value="">All</option></select>')
                     .appendTo( $(this).empty() )
                     .on( 'change', function () {
                         table.column( i )
                             .search( $(this).val() )
                             .draw();
                     } );
                 table.column( i ).data().unique().sort().each( function ( d, j ) {
                     if(d && d !== '-')
                         select.append( '<option value="'+d+'">'+d+'</option>' )
                 } );
             } );
         });
    </script>

@endsection
