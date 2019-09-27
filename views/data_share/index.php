<style>
    .card.item {
        border: 1px solid #ff0017;

    }

    .accordion.basic-accordion .card .card-header a[aria-expanded="true"],
    .accordion.basic-accordion .card .card-header a[aria-expanded="false"] {
        background: none;

    }

    .tab-simple-styled .nav-item .nav-link.active {
        color: #ff0017;
    }

    .nav-tabs .nav-item .nav-link {
        font-size: 1rem;
        line-height: 2;
    }

    table.dataTable {
        margin-top: 0px !important;
        margin-bottom: 0px !important;
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
    }

    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: 0px;
    }
    img {
        max-height: 200px;
    }

    .image {
        max-height: 160px;
        max-width: 160px;
        width: 100%;
        height: 100%;
    }

    .margin0 {
        margin-bottom: 0;
    }

    .card .card-body.unpad {
        padding: 0px;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 0px;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        background: #ff6258;
    }

    .tab-simple-styled .nav-item .nav-link.active {

        border-top: 1px solid #f12222;
        border-right: 1px solid #f12222;
        border-left: 1px solid #f12222;
        border-bottom: none;
        color: red;
    }

    .tab-simple-styled .nav-item .nav-link,
    .tab-simple-styled .nav-item .nav-link.active {
        color: #f12222;
        padding: 10px;

    }

    .tab-simple-styled {
        border-bottom: none;
        margin-bottom: -15px;
    }

    .tab-simple-styled .nav-item {
        margin-right: 5px;
    }

    a,
    a:hover {
        text-decoration: none;
        color: #f12222;
    }

    .red {
        color: #f12222;
    }

    .breadcrumb {
        margin-bottom: 0rem;
    }

    .card .card-body.top {
        padding: 0rem;
    }

    .right {
        text-align: right;
    }

    table tr td {
        height: 30px !important;
    }

    table.dataTable tbody td {
        padding: 5px 5px 5px 10px;
    }

    .table td img {
        border-radius: 100%;
        max-height: 100px;
        max-width: 100px;
        width: 100%;
        height: 100%;
    }

    table tr td img,
    table tr td.imge {
        height: 100px !important;
        width: 100px !important;
        text-align: center !important;
    }
    .table-bordered {
        border: 3px solid #63624e;
    }

    @media (min-width: 992px) {
        .sidebar-icon-only .main-panel {
            width: calc(100% - 75px);
        }
    }

    .accordion.accordion-body-filled .card .card-header a {
        padding: 0.56rem 1.375rem;
        font-weight: 300;
    }

    .accordion .card .card-header a {
        display: block;
        padding: 0.1rem 1.00rem 0.1rem 1.00rem;
        color: #424964;
        text-decoration: none;
        font-size: 0.875rem;
        position: relative;
        font-weight: 600;
        transition-property: border-color, background;
        -webkit-transition-property: border-color, background;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 100%;
        white-space: nowrap;
    }

    .addB.collapsed {
        width: 264px;
    }

    table {
        width: 800px;

    }
    .border-re{
        border-radius: 5px 5px 5px 5px;
         /* background: #3fcade;  */
        padding-left: 20px; 
    }
    
    .accordion.accordion-body-filled .card .card-header a:before {
        top: unset;
        font-size: 15px;
    }

    .table td img.mo {
        max-height: 60px;
        max-width: 60px;
    }

    .p-4 {
        padding: 0rem !important;
    }
    .card-title {
        margin-bottom: 14px;
        font-size: 20px;
    }
    .float_right{
        /* position: relative;
        float: right; */
        margin-bottom: 24px;
        text-align:right;
    }
    .modal_unshared{
        background: #c4e6ff;
    }
    #owner,#owner_shareMe ,.modal-acc{
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #owner td, #owner th, #owner_shareMe td ,#owner_shareMe th,.modal-acc td,.modal-acc th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #owner tr:nth-child(even){background-color: #f2f2f2;}
    #owner_shareMe tr:nth-child(even){background-color: #f2f2f2;}
    .modal-acc tr:nth-child(even){background-color: #f2f2f2;}

    #owner tr:hover,#owner_shareMe tr:hover,.modal-acc tr:hover{background-color: #ddd;}

    #owner th ,#owner_shareMe th,.modal-acc th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #ff6258;


        color: white;
    }
    .TH{

        background-color: #ff6258;
    }
    .text-center{
        text-align: center;
    }
    .button_center{
        text-align: center;
        margin-top: 5%;
    }
    .font-weight,select.form-control{
        font-weight: 500;
    }
    .accordion .card .card-header a {
        display: block;
        padding: 0.75rem 1.70rem 0.75rem 1.25rem;
        color: #252C46;
        text-decoration: none;
        font-size: 0.875rem;
        position: relative;
        font-weight: 600;
        transition-property: border-color, background;
        -webkit-transition-property: border-color, background;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 100%;
        white-space: nowrap;
    }
    .bg-light {
            background-color:  #c4e6ff;
    }
    .card-member{
        background-color: #ff6347ad;
        border: 1px solid #ec0a0a;
        box-shadow: 5px 5px #ea101073;
    }
   
}
</style>

<div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
        

                <table id="owner" class="table ajax_append table-striped table-bordered">
                    <thead >
                        <tr>
                            <th class = 'text-center '>Accession number</th>
                            <th class = 'text-center '>Status</th>
                            <th class = 'text-center '>Share</th>
                            <th class = 'text-center '>
                                <i class="mdi mdi-account-plus" data-name="mdi-account-plus" style ="padding-right :2%"></i>Add &nbsp/
                                <i class="mdi mdi-account-minus" data-name="mdi-account-minus" style ="padding-right :2%; "></i>Remove</th>
                            <th class = 'text-center '>Plant descriptors</th>
                        </tr>
                    </thead>
                    <tbody class = "content_tr0">
                        <?php 
                    
                    $asses = $this->search_acc; //search qurey ว่า ผู้ใช้คนที่ล็อกอิน มึขณะนั้นเป็นเจ้าของสายพันธุ์ไหนบ้าง
                    echo'<script>console.log('.json_encode($asses).');</script>';
                    $temp_acc = "test";
                        foreach($asses as $key=>$value)
                        {  
                            ?>
                        <tr class = "content_tr_d">
                            <?php
                                echo "<td>".$value['accession_number']."</td>";

                            
                            if($value['status_ow']== "Public"){
                                    echo "<td>
                                    <select class='form-control font-weight shared_pub' id='chang_PrPu".$value['accession_number']."'  disabled>";
                                        echo "
                                            <option class = 'font-weight' value=1>Private</option>
                                            <option class = 'font-weight' value=0 selected>Public</option> 
                                            <option hidden  value=-1 >0</option>    
                                        </select>
                                    </td>"; 
                                    }
                            else{
                                    echo "<td>
                                    
                                    <select class='form-control font-weight shared_pub' data-acc=".$value['accession_number']." id='chang_PrPu".$value['accession_number']."' >";                                          
                                        echo "
                                            <option class = 'font-weight' value=0>Public</option>
                                            <option class = 'font-weight' value=1 selected>Private</option> 
                                            <option hidden  value=-1 >1</option>     
                                    </select>
                                    </td>"; 
                                    }
                            if($value['status_sh']=="shared" || $value['status_ow']== "Public"){ 
                                        echo " <td>
                                        <p class = 'text-center' id='status_sh".$value['accession_number']."' value = 'xxx'>Yes</p>
                                        <p hidden>All</p>
                                    </td>";
                            } 
                            else{
                                        echo " <td>
                                        <p class = 'text-center' id='status_sh".$value['accession_number']."' value = 'xxx'>No</p>
                                        <p hidden>All</p>
                                    </td>";
                            }
                            ?>
                                <td>
                                    <div class="form-group row ">
                                        <div class='col-md-12 button_center'>
                                        
                                        <?php
                                            if($value['status_ow']== "Public")
                                            {
                                                ?>
                                                    <button class=" static btn btn btn-rounded btn-fw" id="<?php echo $value['accession_number']?>" data-fact="<?php echo $value['id_fact_tomato']?>" data-id-owner="<?php echo $value['id_member']?>" data-fact="<?php echo $value['id_fact_tomato']?>" data-a="<?php echo $value['accession_number']?>" type="button"  disabled>
                                                    <i class="mdi mdi-share-variant" data-name="mdi-share-variant"></i>Share</button>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <button class=" static btn btn-success btn-rounded btn-fw" id="<?php echo $value['accession_number']?>" data-fact="<?php echo $value['id_fact_tomato']?>" data-id-owner="<?php echo $value['id_member']?>"  data-a="<?php echo $value['accession_number']?>" type="button"  >
                                                    <i class="mdi mdi-share-variant" data-name="mdi-share-variant"></i>Share</button>
                                                <?php
                                            }
                                        ?>   
                                        </div>
                                    </div>  
                                </td>
                                <td>
                                    <div class="form-group row ">
                                        <div class='col-md-12 button_center'>
                                            <button class="detail_acc btn btn-info btn-rounded" id="detail_<?php echo $value['accession_number']?>" data-id-owner="<?php echo $value['id_member']?>"  data-a="<?php echo $value['accession_number']?>" type="button"  >
                                            <i class="menu-icon mdi mdi-leaf" data-name="mdi-share-variant"></i>Click here</button>
                                        </div>
                                    </div>
                                </td>
                        </tr>

                        <?php
                            
                        }  

                ?>

                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th class = 'text-center'>Accession number</th>
                            <th class = 'text-center'>Status</th>
                            <th class = 'text-center'>Share</th>
                        </tr>
                    </tfoot> -->
                    <tfoot>
                        <tr>
                            <th class = 'text-center'>Accession number</th>
                            <th class = 'text-center'>Status</th>
                            <th class = 'text-center'>Share</th>
                            <th class = 'text-center'>
                                <i class="mdi mdi-account-plus" data-name="mdi-account-plus" style ="padding-right :2%"></i>Add &nbsp/
                                <i class="mdi mdi-account-minus" data-name="mdi-account-minus" style ="padding-right :2%; "></i>Remove</th>
                            <th class = 'text-center'>Plant descriptors</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <label>Shared with me</label>

                <table id="owner_shareMe" class="table  table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Accession number</th>
                                    <th>Data Owner</th>
                                    <th>Share date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $asses2 = $this->get_share;
                                echo'<script>console.log('.json_encode($asses2).');</script>';
                                if($asses2 != false)
                                {

                                        
                                    foreach($asses2 as $key2=>$value2)
                                    {  
                            ?>
                                        <tr>
                                            <?php
                                            echo "<td>".$value2['accession_number']."</td>";
                                            echo "<td>".$value2['firstname']."</td>";
                                            echo "<td>".$value2['date_shared']."</td>";
                                            ?>
                                        </tr>   
                                        <?php      
                                    } 
                                }
                                else
                                {
                                    
                                }
                                    ?>            
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</div>
                    <!-- modal start detail accession-->
                    <div id="accession_detail" class="modal fade">
                        <div class="modal-dialog modal-acc">
                            <div class="modal-content" style="width: 100%;">
                                <div class="modal-body">
                                    <div class ="row">
                                        <div class ="col-lg-12 ">
                                            <h4 class="card-title"> Plant descriptors</h4>
                                            <p class="card-description"></p>
                                            <div class="accordion basic-accordion text-center" id="accordion" role="tablist">
                                                <div class="rm-acc"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>                                                                            
                    <!-- modal End detail accession-->
                    <!-- Start modal  share -->
<div id="static_modal2" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width:100% ">
            <div class="modal-body " >
                <h6 id = "acc_n"></h6>

                    <div class="row"><!-- start row -->
                        <div class="col-lg-6">
                            <div class="card " >
                                <div class="card-body modal_unshared"  >
                                    <div class="row">
                                        <div class="col-md-6 h-100">
                                            <!-- <div class="bg-light p-4"> -->
                                                <p class="card-title">Shared</p>
                                                <div id="profile-list-left1" class = "py-2" style="background:  #c4e6ff;"></div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-lg-6 h-100" >
                                            <!-- <div class="bg-light p-4"> -->
                                                <p class ="float_right"> Shared : <span  id = "shared_num"></span> person</p>
                                                <div id="profile-list-left2" class = "py-2" style="background:  #c4e6ff;"></div> 
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="card">
                                <div class="card-body modal_unshared">
                                    <div class="row h-100">
                                        <div class="col-lg-6 h-100">
                                            <!-- <div class="bg-light p-4"> -->
                                                <h2 class="card-title">Unshared</h2>
                                                <div id="profile-list-right1" class = "py-2"  style="background:  #c4e6ff;"></div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-lg-6 h-100" >
                                            <!-- <div class="bg-light p-4"> -->
                                                <p class ="float_right"> Unshare : <span  id = "unshared_num" ></span> person</p> 
                                                <div id="profile-list-right2" class = "py-2" style="background:  #c4e6ff;"></div>       
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end row -->
            </div>
        </div>
    </div>

<!--End modal share  -->
                    
                    
<?php               
    $member = Session::get('member');
?>
<script>
             var base_url = "<?php echo URL; ?>";
             var member = "<?php echo $member['id_member']; ?>";
</script>
<script src="<?php echo URL ?>public/js/data_share.js"></script>
<script src="theme/assets/js/shared/tooltips.js"></script>
<script src="theme/assets/js/shared/popover.js"></script>

