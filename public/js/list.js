$(document).ready(function () {
    $('#dtBasicExample').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
        }
    );
    $('.dataTables_length').addClass('bs-select');
    });