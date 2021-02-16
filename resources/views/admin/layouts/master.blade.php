<!doctype html>
<html lang="en">

<head>
    <title>| Rizkia Tour & Travel |</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('/private/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/private/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/private/assets/vendor/linearicons/style.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('/private/assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('/private/assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/image/logo3.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/image/logo_saja.png') }}">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">

        {{-- Navbar start --}}
        @include('admin.layouts._includes.navbar')
        {{-- Navbar End --}}

        {{-- Sidebar Start --}}
        @include('admin.layouts._includes.sidebar')
        {{-- Sidebar End --}}


        {{-- Content Start --}}
        @yield('content')
        {{-- Content End --}}


        <div class="clearfix"></div>

        {{-- Footer Start --}}
        @include('admin.layouts._includes.footer')
        {{-- Footer End --}}

    </div>
    <!--END WRAPPER-- >
    < !--Javascript-->
    <script src="{{ asset('/private/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/private/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/private/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/private/assets/scripts/klorofil-common.js') }}"></script>

    <script>
        var tablesToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                tmplWorkbookXML =
                '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">' +
                '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>' +
                '<Styles>' +
                '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>' +
                '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>' +
                '</Styles>' +
                '{worksheets}</Workbook>',
                tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>',
                tmplCellXML =
                '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>',
                base64 = function(s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function(s, c) {
                    return s.replace(/{(\w+)}/g, function(m, p) {
                        return c[p];
                    })
                }
            return function(tables, wsnames, wbname, appname) {
                var ctx = "";
                var workbookXML = "";
                var worksheetsXML = "";
                var rowsXML = "";

                for (var i = 0; i < tables.length; i++) {
                    if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
                    for (var j = 0; j < tables[i].rows.length; j++) {
                        rowsXML += '<Row>'
                        for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
                            var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
                            var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
                            var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
                            dataValue = (dataValue) ? dataValue : tables[i].rows[j].cells[k].innerHTML;
                            var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
                            dataFormula = (dataFormula) ? dataFormula : (appname == 'Calc' &&
                                dataType == 'DateTime') ? dataValue : null;
                            ctx = {
                                attributeStyleID: (dataStyle == 'Currency' || dataStyle == 'Date') ?
                                    ' ss:StyleID="' + dataStyle + '"' : '',
                                nameType: (dataType == 'Number' || dataType == 'DateTime' ||
                                        dataType == 'Boolean' || dataType == 'Error') ? dataType :
                                    'String',
                                data: (dataFormula) ? '' : dataValue,
                                attributeFormula: (dataFormula) ? ' ss:Formula="' + dataFormula +
                                    '"' : ''
                            };
                            rowsXML += format(tmplCellXML, ctx);
                        }
                        rowsXML += '</Row>'
                    }
                    ctx = {
                        rows: rowsXML,
                        nameWS: wsnames[i] || 'Sheet' + i
                    };
                    worksheetsXML += format(tmplWorksheetXML, ctx);
                    rowsXML = "";
                }

                ctx = {
                    created: (new Date()).getTime(),
                    worksheets: worksheetsXML
                };
                workbookXML = format(tmplWorkbookXML, ctx);

                console.log(workbookXML);

                var link = document.createElement("A");
                link.href = uri + base64(workbookXML);
                link.download = wbname || 'Workbook.xls';
                link.target = '_blank';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        })();

    </script>

</body>

</html>
