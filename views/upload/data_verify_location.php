<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>
</head>
<style>
    table.dataTable {
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .dataTables_filter {
        display: none;
    }

    #data_info {
        display: none;
    }

    .DTFC_LeftBodyLiner {
        overflow-y: hidden !important;
    }

    .dataTables_wrapper .dataTable .btn {
        padding: 0.5rem 0.81rem;

    }

    .table-bordered th,
    .table-bordered td {
        border: 0px;
    }

    table.dataTable thead th,
    table.dataTable tfoot th {
        font-weight: normal;
        padding: 10px 10px 20px 10px;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: 0px;
    }

    .new {
        color: blue;
    }

    .button-left {
        text-align: right;
    }

    .button-left .btn {
        margin-top: 10px;
    }

    .bg-danger,
    .bg-danger-add {
        background-color: #ff6258 !important;
    }

    .table-danger,
    .table-danger-add {
        background-color: #ffd3d0;
    }

    .btn-success-add {
        color: #ffffff;
        background-color: #19d895;
        border-color: #19d895;
    }
    .bg-red{
        background-color: #ff6258;
    }
</style>

<?php include("libs/PHPExcel-1.8/Classes/PHPExcel.php") ?>
<?php include("views/upload/helper_location.php") ?>

<!-- หน้าเว็บ -->
<?php
function utf8ize($d)
{
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}

$table_value = json_encode(utf8ize($this->table_value)); ?>

<div class="card">
    <div class="card-body">
        <div id="form_check">
            <form id="form_upload" method="POST" action="<?php echo URL ?>upload/location_upload">
                <table id="data" class="table table-bordered dataTable no-footer DTFC_Cloned" style="width:100%">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="button-left">
                    <button type="button" id="btn-sub" class="btn btn-success btn-sub">Upload</button>
                    <input type="button" class="btn btn-default" onclick="location.href='<?php echo URL ?>upload';" value="Cancel" />
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_edit" data-target-value=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group select-form">
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-modal-add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_edit-add" data-target-value="" data-target-html=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group select-form-add">
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success-add">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
 
    $(document).ready(function() {
        $('#data').DataTable({
            fixedColumns: {
                leftColumns: 1
            },
            scrollY: "400px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            ordering: false,
            columnDefs: [{
                searchable: false,
                targets: 0
            }]
        });
        $(".NO_All").click(function() {
            var s = $(this).attr("data-colum");
            var x = $(this).prop("checked");
            if (x) {
                $("input[name='" + s + "[]']").prop("checked", true);
            } else {
                $("input[name='" + s + "[]']").prop("checked", false);
            }
        });
    });
</script>
<script>
var ex_list = <?php echo json_encode($data_arr); ?>;
    var table_value = <?php echo $table_value; ?>;
    let wrong_i = "";
    let wrong_j = "";
    let a = ex_list;
    console.log(table_value);
    var acc = [];
    var id = [];
    var check_add = 0;
    var chkLength = 0;
    var check_not_found = [];
    var base_url = "<?php echo URL; ?>";
    $("#data").on("click", "td.table-danger,td.bg-danger", function() {
      
        var str = $(this).find('input[type="checkbox"]').val();
        var res = str.split("@");
       console.log("click");
        wrong_i = $(this).attr('data_i');
        wrong_j = $(this).attr('data_j');
        var id = $(this)[0].id;
        $("#title_edit").empty();
        $(".select-form").empty();
        $("#title_edit").append(res[0].replace(/_/g, " "));
        $("#title_edit").attr("data-target-value", id);
        if (int_value.indexOf(res[0]) != -1) {
            $(".select-form").append(`<input type="text" data-col= "` + res[0] + `" value="` + res[1] + `" class="form-control select-modal">`);
        } else if (res[0] == "collection_date") {
            var date = res[1].split("/");
            $(".select-form").append(`<input type="date" data-col= "` + res[0] + `" value="` + date[2] + `-` + date[1] + `-` + date[0] + `" class="form-control select-modal">`);
        } else {
            $(".select-form").append(`<select class="form-control select-modal" data-col= "` + res[0] + `">`);
            for (var x in table_value[res[0]]) {
                if (table_value[res[0]][x] == res[1]) {
                    $(".select-modal").append(`<option selected value="` + table_value[res[0]][x] + `"> ` + table_value[res[0]][x] + `</option>`);
                } else {
                    $(".select-modal").append(`<option value="` + table_value[res[0]][x] + `"> ` + table_value[res[0]][x] + `</option>`);
                }
            }
            $(".select-form").append("</select>");
        }
        $("#edit-modal").modal();
    });
    $("#data").on("click", "td.bg-danger-add,td.table-danger-add", function() {
        wrong_i = $(this).attr('data_i');
        wrong_j = $(this).attr('data_j');
        var str = $(this).attr("data-dataval");
        var val_data = $("#" + str).val();
        var res = val_data.split("@");
        $("#title_edit-add").empty();
        $(".select-form-add").empty();
        $("#title_edit-add").append(res[0].replace(/_/g, " "));
        $("#title_edit-add").attr("data-target-value", str);
        $("#title_edit-add").attr("data-target-html", "add-" + str);
        if (int_value.indexOf(res[0]) != -1) {
            $(".select-form-add").append(`<input type="text" data-col= "` + res[0] + `" value="` + res[1] + `" class="form-control select-modal-add">`);
        } else if (res[0] == "collection_date") {
            var date = res[1].split("/");
            $(".select-form-add").append(`<input type="date" data-col= "` + res[0] + `" value="` + date[2] + `-` + date[1] + `-` + date[0] + `" class="form-control select-modal">`);
        } else {
            $(".select-form-add").append(`<select class="form-control select-modal-add" data-col= "` + res[0] + `">`);
            for (var x in table_value[res[0]]) {
                if (table_value[res[0]][x] == res[1]) {
                    $(".select-modal-add").append(`<option selected value="` + table_value[res[0]][x] + `"> ` + table_value[res[0]][x] + `</option>`);
                } else {
                    $(".select-modal-add").append(`<option value="` + table_value[res[0]][x] + `"> ` + table_value[res[0]][x] + `</option>`);
                }
            }
            $(".select-form-add").append("</select>");
        }
        $("#edit-modal-add").modal();
    });
    $("#edit-modal").on("click", ".btn-success", function() {
        var value = $(".select-modal").val();
       
        console.log( "befor"+a[wrong_j][wrong_i]);
        a[wrong_j][wrong_i] = value;
        console.log("i = ",wrong_i+" j = "+wrong_j)
        console.log(a);
        console.log( a[wrong_j][wrong_i]);
        var colum = $(".select-modal").attr("data-col");
        var target = $("#title_edit").attr("data-target-value");
        var value2 = value;
        $(".check_input_edit").remove();
        if (value && value2.toString().replace("-", "").trim().length > 0) {
            if (int_value.indexOf(colum) != -1 && !($.isNumeric(value))) {
                $(".select-modal").after(`<span class="text-danger check_input_edit mt-1" style="font-size:0.75rem;"> <br> Please enter value number,Value can't be space or - </span>`);
            } else {
                if (colum == "collection_date") {
                    var date = value.split("-");
                    value = date[2] + "/" + date[1] + "/" + date[0];
                }
                $("#" + target).addClass("table-danger");
                $("#" + target).removeClass("bg-danger");
                $("#" + target).find('lable[class="new"]').html(value);
                $("#" + target).find('input[type="checkbox"]').val(colum + "@" + value);

                $("#" + target).find('div').find('span[class="new"]').html(value);
                $("#" + target).tooltip("dispose");
                $("#edit-modal").modal('hide');
            }

        } else {
            $(".select-modal").after(`<span class="text-danger check_input_edit mt-1" style="font-size:0.75rem;"> value can't be space or - </span>`)
        }

    });
    $("#edit-modal-add").on("click", ".btn-success-add", function() {
        var value = $(".select-modal-add").val();
        a[wrong_j][wrong_i] = value;
        var colum = $(".select-modal-add").attr("data-col");
        var target = $("#title_edit-add").attr("data-target-value");
        var target2 = $("#title_edit-add").attr("data-target-html");
        var value2 = value;
        $(".check_input_edit").remove();
        if (value && value2.toString().replace("-", "").trim().length > 0) {
            if (int_value.indexOf(colum) != -1 && colum != "address" && !($.isNumeric(value))) {
                $(".select-modal-add").after(`<span class="text-danger check_input_edit mt-1" style="font-size:0.75rem;"> Please enter value number,Value can't be space or - </span>`);
            } else {
                if (colum == "collection_date") {
                    var date = value.split("-");
                    value = date[2] + "/" + date[1] + "/" + date[0];
                }
                $("#" + target2).addClass("table-danger-add");
                $("#" + target2).removeClass("bg-danger-add");
                $("#" + target).val(colum + "@" + value);
                $("#" + target2).html(value);
                $("#" + target2).tooltip("dispose");
                $("#edit-modal-add").modal('hide');
            }

        } else {
            $(".select-modal-add").after(`<span class="text-danger check_input_edit mt-1" style="font-size:0.75rem;"> value can't be space or - </span>`);
        }

    });

    function search_id(item, list) {
        var chk = false;
        for (var i = 0; i < list.length; i++) {
            if (list[i]['accession_number'] == item) {
                chk = true;
                break;
            }

        }
        return chk;

    }

    function prepare_data(data) {

        if (data)
            return data;
        else
            return "";

    }

    function toFixed(num, pre) {
        num *= Math.pow(10, pre);
        num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
        return num.toFixed(pre);
    }

    function check_accession(item) {
        var item_data;
        $.ajax({
            url: base_url + "/upload/check_accession",
            method: "POST",
            async: false,
            data: {
                accession_number: item
            },
            success: function(data) {
                item_data = data;
                //console.log(data);
            },
            error: function(data) {
                //console.log("error");
               // console.log(data);
            }
        });
        return item_data;
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    function To_DMY(date) {
        var date1 = date;
        var d = date1.split("-");
        return d[2] + "/" + d[1] + "/" + d[0];
    }

    function searchdata(item) {
        var item_data;
        $.ajax({
            url: base_url + "/upload/search_id_passport",
            method: "POST",
            async: false,
            data: {
                accession_number: item
            },
            success: function(data) {
                item_data = data;
                //console.log(data);
            },
            error: function(data) {
                console.log("error");
               // console.log(data);
            }
        });
        return item_data;
    }

    function check_format(array, header, index_accession) {
        if (array[0].length == header.length) {

            var check = true;
            for (var i = 0; i < array[0].length; i++) {
                if (array[0][i] != header[i]) {
                    check = false;
                    break;
                }
            }
            if (check) {
                var duplicate = [];

                for (var i = 0; i < array.length; i++) {
                    for (var j = 0; j < array.length; j++) {
                        if (array[i][index_accession] == array[j][index_accession] && i != j) {
                            if (duplicate.indexOf(array[i][index_accession]) == -1 || duplicate.length == 0)
                                duplicate.push(array[i][index_accession]);
                        }
                    }
                }

                if (duplicate.length != 0) {
                    return [false, duplicate];
                } else {
                    return [true, ""];
                }

            } else {
                return [false, "Invalid excel template.Please download example file and upload again"];
            }

        } else {
            return [false, "Invalid excel template.Please download example file and upload again"];
        }
    }
   
    var format = ["Accession number", "TM Group", "Temporary number", "Other number", "Collector number", "Collector", "Crop collection", "Variety", "Seed amount_g", "Genus", "Species", "Collection date", "Grower name", "Donor name", "Address", "Sub district", "District", "Province", "Country", "Institute", "Usage", "Latitude", "Longitude", "Collection source", "Genetict status", "Sample type", "Material", "Photograpy", "Topography", "Soil texure", "Remark"];
    var int_value = ["seed_amount_g", "address", "latitude", "longitude"];
    var input_check = check_format(ex_list, format, 0);
    if (input_check[0]) {
        for (var i = 0; i < ex_list[0].length; i++) {
            if (i == 0) {
                $("thead").append("<tr id='col_" + i + "'>");
                for (var j = 0; j < ex_list.length; j++) {
                    ex_list[j][i] = prepare_data(ex_list[j][i]);
                    var temp = searchdata(ex_list[j][i]);
                    acc.push(temp);
                    if (j == 0) {
                        $("#col_" + i).append("<th>" + ex_list[j][i] + "</th>");

                    } else if (temp.length > 0) {
                        id.push(ex_list[j][i]);
                        $("#col_" + i).append(`<th>` + ex_list[j][i] + `<lable style="font-weight:normal">  Replace All</lable> <input data-colum="NO` + j + `"class="NO_All NO_All` + j + `_check" type="checkbox" checked/></th>`);

                    } else if (check_accession(ex_list[j][i])) {
                        $("#col_" + i).append(`<th>` + ex_list[j][i] + `<lable style="font-weight:normal">  Add </lable> <input data-colum="NO` + j + `" class="NO` + j + `_INSERT NO_All` + j + `_check" type="checkbox" checked/></th>`);
                    } else {
                        check_not_found.push(ex_list[j][i]);
                        $("#col_" + i).append(`<th class="bg-red">` + ex_list[j][i] + `<lable style="font-weight:normal">  NOT FOUND </lable></th>`);
                    }

                }
            } else {
                $("tbody").append("<tr id='col_" + i + "'>");
                for (var j = 0; j < ex_list.length; j++) {
                    ex_list[j][i] = prepare_data(ex_list[j][i]);
                    if (j == 0) {
                        $("#col_" + i).append("<td>" + ex_list[j][i] + "</td>");
                    } else if (acc[j].length > 0) {
                        var lower_head = ex_list[0][i].toLowerCase();
                        var head = lower_head.replace(" ", "_");
                        if (head == "usage") {
                            head = "tb_usage";
                        }
                        var data1 = acc[j][0][head];
                        var data2 = ex_list[j][i];
                        if (head != "latitude" || head != "longitude") {
                            if ($.isNumeric(acc[j][0][head]))
                                data1 = toFixed(acc[j][0][head], 2);
                            if ($.isNumeric(ex_list[j][i]))
                                data2 = toFixed(ex_list[j][i], 2);
                        }
                        if (head == "collection_date") {
                            var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                timeZone: "Asia/Bangkok"
                            });
                            var date1 = formatDate(day);
                            data2 = To_DMY(date1);
                            data1 = To_DMY(data1);
                        }
                        if (data1 !== data2) {
                            var oob = null;
                            var check_value_table = true;
                            if (table_value[head]) {
                                oob = Object.values(table_value[head]);

                                if (oob.indexOf(data2) == -1) {
                                    check_value_table = false;

                                }


                            }
                            if (chkLength == 0) {
                                chkLength++;
                                $("#col_" + i).append(`<input type='hidden' name='length' value='` + (ex_list.length) + `'>`);
                            }
                            if (!check_value_table) {
                                console.log("case !check_value_table i = "+i+" j = "+j);
                                $("#col_" + i).append(`<td data_i = '2' class='bg-danger'  data_i = ${i} data_j =${j}   id='` + head + `-` + ex_list[j][0] + `'>                       
                            <input type='hidden' name="NO` + j + `[]" value="update">
                            <input type='hidden' name="NO` + j + `[]" value="` + ex_list[j][0] + `">                           
                            <input type='checkbox' name="NO` + j + `[]" value="` + head + `@` + data2 + `" checked><lable style="font-weight:normal" class='new'>` + data2 + `</lable>
                            <div>` + data1 + `,<span class='new'>` + data2 + `</span>
                            </div></td>`);

                            } else {
                                if ($.isNumeric(data2) && data2.toString().trim().length != 0 && int_value.indexOf(head) != -1) {
                                    console.log("case numberric i = "+i+" j = "+j);
                                    $("#col_" + i).append(`<td class='table-danger 'data_i = ${i} data_j =${j} id='` + head + `-` + ex_list[j][0] + `'>                       
                            <input type='hidden' name="NO` + j + `[]" value="update">
                            <input type='hidden' name="NO` + j + `[]" value="` + ex_list[j][0] + `">                           
                            <input type='checkbox' name="NO` + j + `[]" value="` + head + `@` + data2 + `" checked><lable style="font-weight:normal" class='new'>` + data2 + `</lable>
                            <div>` + data1 + `,<span class='new'>` + data2 + `</span>
                            </div></td>`);
                                } else if (int_value.indexOf(head) == -1) {
                                    console.log("case indexOf i = "+i+" j = "+j);
                                    $("#col_" + i).append(`<td class='table-danger ' data_i = ${i} data_j =${j} id='` + head + `-` + ex_list[j][0] + `'>                       
                            <input type='hidden' name="NO` + j + `[]" value="update">
                            <input type='hidden' name="NO` + j + `[]" value="` + ex_list[j][0] + `">                           
                            <input type='checkbox' name="NO` + j + `[]" value="` + head + `@` + data2 + `" checked><lable style="font-weight:normal" class='new'>` + data2 + `</lable>
                            <div>` + data1 + `,<span class='new'>` + data2 + `</span>
                            </div></td>`);
                                } else {
                                    console.log("case else i = "+i+" j = "+j);
                                    $("#col_" + i).append(`<td class='bg-danger ' data_i = ${i} data_j =${j} id='` + head + `-` + ex_list[j][0] + `'>                       
                            <input type='hidden' name="NO` + j + `[]" value="update">
                            <input type='hidden' name="NO` + j + `[]" value="` + ex_list[j][0] + `">                           
                            <input type='checkbox' name="NO` + j + `[]" value="` + head + `@` + data2 + `" checked><lable style="font-weight:normal" class='new'>` + data2 + `</lable>
                            <div>` + data1 + `,<span class='new'>` + data2 + `</span>
                            </div></td>`);
                                }
                            }
                        } else if (data1 == null && data2 == '') {
                            $("#col_" + i).append(`<td></td>`);
                        } else if (data1 == null && data2 != '') {
                            $("#col_" + i).append(`<td class='table-danger' id='` + head + `-` + ex_list[j][0] + `'>                       
                            <input type='hidden' name="NO` + j + `[]" value="update">
                            <input type='hidden' name="NO` + j + `[]" value="` + ex_list[j][0] + `">                           
                            <input type='checkbox' name="NO` + j + `[]" value="` + head + `@` + data2 + `" checked><lable style="font-weight:normal" class='new'>` + data2 + `</lable>
                            <div> ,<span class='new'>` + data2 + `</span>
                            </div></td>`);
                            if (chkLength == 0) {
                                chkLength++;
                                $("#col_" + i).append(`<input type='hidden' name='length' value='` + (ex_list.length) + `'>`);
                            }
                        } else {
                            $("#col_" + i).append(`<td>` + data1 + `</td>`);
                        }
                    } else if (check_not_found.indexOf(ex_list[j][0]) != -1) {
                        var lower_head = ex_list[0][i].toLowerCase();
                        var head = lower_head.replace(" ", "_");
                        if (head == "usage") {
                            head = "tb_usage";
                        }
                        if (head != "collection_date") {
                            $("#col_" + i).append(`<td class='bg-dark'>` + ex_list[j][i] + `</td>`);
                        } else {
                            var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                timeZone: "Asia/Bangkok"
                            });
                            var date1 = formatDate(day);
                            $("#col_" + i).append("<td class='bg-dark'>" + To_DMY(date1) + "</td>");
                        }
                    } else {
                        var lower_head = ex_list[0][i].toLowerCase();
                        var head = lower_head.replace(" ", "_");
                        if (head == "usage") {
                            head = "tb_usage";
                        }
                        var oob = null;
                        var check_value_table = true;
                        if (table_value[head[i]]) {
                            oob = Object.values(table_value[head[i]]);
                            if (oob.indexOf(ex_list[j][i]) == -1) {
                                check_value_table = false;
                            }
                        }
                        if (i == 1) {
                            $("#col_" + i).append(`<input type='hidden' name="NO` + j + `[]" value="insert">`);
                            $("#col_" + i).append(`<input type='hidden' name="NO` + j + `[]" value="accession@` + ex_list[j][0] + `">`);


                        }
                        if (chkLength == 0) {
                            chkLength++;
                            $("#col_" + i).append(`<input type='hidden' name='length' value='` + (ex_list.length) + `'>`);
                        }

                        $("#col_" + i).append(`<input type='hidden' name="NO` + j + `[]" value="insert">`);
                        if (!check_value_table) {
                            if (head != "collection_date") {
                                $("#col_" + i).append(`<input type='hidden' id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + ex_list[j][i] + `">`);
                                $("#col_" + i).append(`<td class='bg-danger-add data_i = ${i} data_j'>` + ex_list[j][i] + `</td>`);
                            } else {
                                var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                    timeZone: "Asia/Bangkok"
                                });
                                var date1 = formatDate(day);
                                $("#col_" + i).append(`<input type='hidden' id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + To_DMY(date1) + `">`);
                                $("#col_" + i).append(`<td class='bg-danger-add' data_i = ${i} data_j id="add-` + ex_list[j][0] + `-` + head + `" data-dataval="` + ex_list[j][0] + `-` + head + `">` + To_DMY(date1) + `</td>`);
                            }
                        } else {
                            if ($.isNumeric(ex_list[j][i]) && ex_list[j][i].toString().trim().length != 0 && int_value.indexOf(head) != -1) {

                                if (head != "collection_date") {
                                    $("#col_" + i).append(`<input type='hidden' id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + ex_list[j][i] + `">`);
                                    $("#col_" + i).append(`<td class='table-primary' >` + ex_list[j][i] + `</td>`);
                                } else {
                                    var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                        timeZone: "Asia/Bangkok"
                                    });
                                    var date1 = formatDate(day);
                                    $("#col_" + i).append(`<input type='hidden'  id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + To_DMY(date1) + `">`);
                                    $("#col_" + i).append("<td class='table-primary'>" + To_DMY(date1) + "</td>");
                                }
                            } else if (int_value.indexOf(head) == -1) {
                                if (head != "collection_date") {
                                    $("#col_" + i).append(`<input type='hidden' name="NO` + j + `[]" value="` + head + `@` + ex_list[j][i] + `">`);
                                    $("#col_" + i).append(`<td class='table-primary'>` + ex_list[j][i] + `</td>`);
                                } else {
                                    var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                        timeZone: "Asia/Bangkok"
                                    });
                                    var date1 = formatDate(day);
                                    $("#col_" + i).append(`<input type='hidden'  name="NO` + j + `[]" value="` + head + `@` + To_DMY(date1) + `">`);
                                    $("#col_" + i).append("<td class='table-primary'>" + To_DMY(date1) + "</td>");
                                }
                            } else {
                                if (head != "collection_date") {
                                    $("#col_" + i).append(`<input type='hidden' id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + ex_list[j][i] + `">`);
                                    $("#col_" + i).append(`<td class='bg-danger-add' data_i = ${i} data_j id="add-` + ex_list[j][0] + `-` + head + `" data-dataval="` + ex_list[j][0] + `-` + head + `">` + ex_list[j][i] + `</td>`);
                                } else {
                                    var day = new Date((ex_list[j][i] - (25567 + 1)) * 86400 * 1000).toLocaleString({
                                        timeZone: "Asia/Bangkok"
                                    });
                                    var date1 = formatDate(day);
                                    $("#col_" + i).append(`<input type='hidden' id="` + ex_list[j][0] + `-` + head + `" name="NO` + j + `[]" value="` + head + `@` + To_DMY(date1) + `">`);
                                    $("#col_" + i).append(`<td class='bg-danger-add' data_i = ${i} data_j id="add-` + ex_list[j][0] + `-` + head + `" data-dataval="` + ex_list[j][0] + `-` + head + `">` + To_DMY(date1) + `</td>`);
                                }
                            }
                        }


                    }
                }
            }
        }
    } else {
        $("#form_check").empty();
        if (Array.isArray(input_check[1])) {
            $("#form_check").append(` <div class="alert alert-danger" role="alert"> <i class="mdi mdi-close-circle-outline"></i>  Accession is duplicate. Please edit and upload again.</div> `);
            $("#form_check").append(`<div class="alert alert-light" id="detail-accession">`);
            input_check[1].forEach(function(element, index) {
                $("#detail-accession").append(`<span class="text-danger">` + element + "</span>");
                if (index != input_check[1].length - 1)
                    $("#detail-accession").append(`<span> , </span>`);
            });
        } else {
            $("#form_check").append(`  <div class="alert alert-danger" role="alert"> <i class="mdi mdi-close-circle-outline"></i> ` + input_check[1] + `</div>
            <div class="button-left">
                    <input type="button" class="btn btn-success" onclick="location.href='<?php echo URL ?>upload';" value="Back" />
                </div>`);
        }


    }
</script>

<script>
    $("#form_upload").on("click", ".btn-sub", function() {
        var num = 0;
        var num2 = 0;
        for (var j = 0; j < ex_list.length; j++) {
            var x = $(".NO_All" + j + "_check").prop("checked");
            if (x == false) {
                $("input[name*=NO" + j + "]").remove();
                num++;
                num2++;
            } else if (x) {
                num2++;
            }
        }
        if (num == num2) {
            $("input[name='length']").remove();
        }
        var array_config = $(".bg-danger,.bg-danger-add");
        console.log(array_config);
        if (array_config.length > 0) {
            for (var x = 0; x < array_config.length; x++) {
                var id = array_config[x].id;
                $("#" + id).attr("title", "Please change value !");
                $("#" + id).find("input[type='checkbox']").focus();
                $("#" + id).tooltip('show');
                break;
            }
        } else {
            console.log(a);
            // $("#form_upload").submit();
        }
    });
</script>