<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>
</head>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
</style>
<!-- หน้าเว็บ -->
<?php 
    // print_r(json_encode($this->Add));
    // echo '<br>';
    // print_r(json_encode($this->Conf));
?>
<style>
    .block-page{
        border-style: inset;
    }
        /* The container */
    .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
    background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
    background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
    display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    }
    .btnCon{
        background: tomato;
    }
    .upload,.uploadCancle{
        margin-top: 20px;
    }
    .head-position{
        font-weight: bold;
    }
  
</style>
<form id="importGenome" method="post" action="<?php echo URL ?>upload/importGenome" enctype="multipart/form-data">
        
</form>
<div class="card">
    <div class="card-body">
    <!-- start row -->
        <div class="row">
            <div class="block-page col-md-6">
                <h4>Ready</h4>
                <?php 
                    $importData = $this->Add;       
                    foreach ($importData as $key => $value) {
                        if($value['readyData'] == "Current"){
                            echo '<label class="container">'.$key.' : Current data 
                                <input type="checkbox" disabled>
                                <span class="checkmark"></span>
                                </label>';
                            echo '<hr>'; 
                        }
                        else {
                            echo '<label class="container">'.$key.' : Import data
                                <input type="checkbox" id="'.$key.'" name="addCheckbox" value="'.$value['readyData'].'" checked="checked" >
                                <span class="checkmark"></span>
                                </label>';
                            echo '<hr>'; 
                        }
                    }         
                ?>
            </div>
            <div class="block-page col-md-6">

                <h4>Conflict</h4>
                <?php 
                    //print_r(json_encode($this->Conf));
                    $importDataCon = $this->Conf;
                    
                    foreach ($importDataCon as $key => $value) {
                        echo '  <div class="row">
                                    <div class="col-md-6 checkBoxLabel">
                                        <label class="container ">'.$key.'  
                                            <input type="checkbox" id="'.$key.'" name="addCheckbox" value="'.$value['dataConflict'].'" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btnCon" id="myBtn" data="'.$key.'">Show position </button>
                                    </div>
                                </div>'; 
                        echo '<hr style="margin-top: 0.5rem;margin-bottom: 0.5rem;">';  
                    }     
                ?>
            </div>
        </div>
    <!-- end row -->
    <!-- start modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="appendModal"> 
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- end modal -->
    <button type="button" class="btn btn-success upload" ">Upload</button>
    <input type="button" class="btn btn-default uploadCancle" onclick="location.href='<?php echo URL ?>upload';" value="Back" />
    </div>
</div>
<!-- ASREE ADD -->
<script>

var dataRe = <?php echo json_encode($this->Add); ?>;
var dataCon = <?php echo json_encode($this->Conf); ?>;
var dataPosition = <?php echo json_encode($this->dataPosition); ?>;
console.log(dataPosition);
$(document).ready(function(){
    $(".btnCon").click(function(){
        $('#DataApp').empty();
        let attr =  $(".btnCon").attr('data');
        
        $.each(dataCon, function (i, elem) {
            if(i == attr){
                console.log(elem['conflict']);
                $.each(elem['conflict'], function (i, elem) {
                    $('#appendModal').append('\
                        <div class="row">\
                            <div class="col-md-8">\
                                <h6> <span class="head-position" >Position</span> :'+dataPosition[i-1]['position']+' ,  <span class="head-position" >ATCG :</span> '+dataPosition[i-1]['ATCG']+'<br><span class="head-position" >Allele :</span> '+dataPosition[i-1]['allele_rs']+'</h6> \
                            </div>\
                            <div class="col-md-4">\
                                <h6> <span class="head-position" >Import :</span> '+elem+'</h6>\
                            </div>\
                        </div>\
                        <hr>\
                    ');
                });
            }
        });
        $("#myModal").modal();
    });
    $(".upload").click(function(){
        var favorite = [];
        $.each($("input[name='addCheckbox']:checked"), function(){  
            $("#importGenome").append(`<input type="hidden" name="`+ $(this)[0].id+`" value="`+$(this).val()+`">`);     
        });
        var x =$("#importGenome input").val();
        $("#importGenome").submit();
    });
});


</script>