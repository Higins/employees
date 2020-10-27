var rows_per_page = 20;
var total_rows;

$(document).ready(function () {
    $('table').tablesort();
    //Set up the page number links
    initPageNumbers();

    //Set the default page number
    var page_num = 1;

    //If there's a hash fragment specifying a page number
    if (window.location.hash !== '') {
        //Get the hash fragment as an integer
        var hash_num = parseInt(window.location.hash.substring(1));

        //If the hash fragment integer is valid
        if (hash_num > 0) {
            //Overwrite the default page number with the user supplied number
            page_num = hash_num;
        }
    }
    //Load the first page
    getPage(page_num);
    //light table filter
    var LightTableFilter = (function (Arr) {

        var _input;
        //input
        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function (table) {
                Arr.forEach.call(table.tBodies, function (tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }
        //
        function _filter(row) {
            var text = row.textContent.toLowerCase(),
                val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function () {
                var inputs = document.getElementsByClassName('search-data-table');
                Arr.forEach.call(inputs, function (input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function () {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });
});

function initPageNumbers() {
    //Get total rows number...
    // just like that.... :)
    total_rows = 500;

    //Loop through every available page and output a page link
    var count = 1;
    for (var x = 0; x < total_rows; x += rows_per_page) {
        $('#page-numbers').append('<li class="page-item"  >' +
            '<a class="page-link" href="#' + count + '" onclick="getPage(' + count + ');">' + count + '</a>' +
            '</li>'
        );
        count++;
    }
}

function getPage(page_num) {
    //Clear the existing data view
    $('#rows').html('');

    //Get subset of data
    $.get('api/page.php?pageNumber=' + page_num, function (data) {
        $.each(JSON.parse(data), function (EmployeesDataKey, EmployeesDataValue) {
            $.each(EmployeesDataValue, function (EmployeesKey, EmployeesValue) {
                $('#rows').append(
                    '<tr>' +
                    '<th scope="row">' + EmployeesValue.emp_no + '</th>' +
                    '<td>' + EmployeesValue.first_name + ' ' + EmployeesValue.last_name + '</td>' +
                    ' <td>' + EmployeesValue.position + '</td>' +
                    '<td>' + EmployeesValue.salary + '</td>' +
                    '<td>' + EmployeesValue.class + '</td>' +
                    '<td><a href="api/employees.php?delete=' + EmployeesValue.emp_no + '" type="button" class="btn btn-danger">Delete</a><a href="update.php?emp_no=' + EmployeesValue.emp_no + '" class="btn btn-warning">Update</a></td>' +
                    '</tr>'
                );

            });
        });

    });
}