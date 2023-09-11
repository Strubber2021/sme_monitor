<?php
if ( ! function_exists('json'))
{
    function json($data)
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/MSIE (9|8|7|6)/', $agent))
        {
            header('Content-Type: text/plain');
        }
        else
        {
            header('Content-type: application/json');
            header('Access-Control-Allow-Headers:Token');
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
function jsEcho($data){
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/MSIE (9|8|7|6)/', $agent))
    {
        header('Content-Type: text/plain');
    }
    else
    {
        header('Content-type: application/json');
        header('Access-Control-Allow-Headers:Token');
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
function have_permission($permission = "", $type="V"){
    $CI = &get_instance();
    $CI->load->helper('url');
    $CI->load->library('session');
    $CI->load->database();
    $CI->session->set_flashdata('message', 'test alert');
    if(isset($_SESSION["id_employee"])){
        $id_employee = $_SESSION["id_employee"];
        if($id_employee==0){
            return true;
        }else{
            $CI->db->where("ct_user_mapping.id_employee", $id_employee);
            $CI->db->where("ct_permission.p_key", $permission);
            $CI->db->join("ct_user_group", "ct_user_group.user_group_id = ct_user_mapping.user_group_id");
            $CI->db->join("ct_user_group_permissions", "ct_user_group_permissions.group_id = ct_user_group.user_group_id");
            $CI->db->JOIN("ct_permission", "ct_permission.p_id = ct_user_group_permissions.p_id");
            $query = $CI->db->get("ct_user_mapping");
            if($query->num_rows() > 0){
                return true;
            } else{
                if($type == "C") header('Location: '. base_url()."Access_denied");
                else return false;
            }
        } 
    }else{
        $_SESSION["prev_login_url"]= current_url();
        if($type == "C") header('Location: '. base_url().'Login');
        else return false;
    }
}

function my_config($key){
    $CI = &get_instance();
    $CI->load->library('session');
    $CI->load->database();
    $CI->db->where("config_key", $key);
    $query = $CI->db->get("ct_config")->result();
    if(count($query)>0){
        return $query[0]->config_value;
    }else{
        return false;
    }
}

function login_data($field){
    $CI = &get_instance();
    $CI->load->database();
    if(isset($_SESSION["id_employee"])){
        $CI->db->where("id_employee", $_SESSION["id_employee"]);
        $query = $CI->db->get("ps_employee")->result();
        if(count($query)>0){
            $data = $query[0];
            if(isset($data->$field)){
                return $data->$field;
            }
            
        }
    }
    return false;
}
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function permission_shop(){
    $CI = &get_instance();
    $CI->load->library('session');
    $CI->load->database();
    if(isset($_SESSION["id_employee"])){
        $emp = $_SESSION["id_employee"];
        if($emp == 0){
            return "(SELECT GROUP_CONCAT(ps_shop.id_shop) FROM ps_shop WHERE active = 1 AND deleted = 0)";
        }
        $CI->db->select("ct_user_mapping.*", false);
        $CI->db->where("ps_employee.id_employee", $emp);
        $CI->db->join("ct_user_mapping", "ct_user_mapping.id_employee = ps_employee.id_employee", "left");
        $query = $CI->db->get("ps_employee")->result();
        if(count($query)>0){
            $data = $query[0];
            if($data->all_shop == 1){
                return "(SELECT GROUP_CONCAT(ps_shop.id_shop) FROM ps_shop WHERE active = 1 AND deleted = 0)";
            }else{
                return "(SELECT GROUP_CONCAT(ps_shop.id_shop) FROM ps_shop 
                    LEFT JOIN ct_franchise_maping ON ct_franchise_maping.id_shop = ps_shop.id_shop
                WHERE active = 1 AND deleted = 0
                AND (FIND_IN_SET(franchise_head, '".$data->shop_permission ."') 
                    OR FIND_IN_SET(ps_shop.id_shop, '".$data->shop_permission ."'))
                )";
            }
            
        }
    }
    return "'null'";
}


function get_paging($total_row){ 
    $CI = &get_instance();
    $controller = $CI->router->fetch_class();
    ?>

        <div class="pDiv2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="pGroup p-b-35 m-r-20" style="overflow: hidden;">
                <span class="pcontrol">
                    <div class="pull-left p-r-5 p-t-5">แสดง </div>
                    <div class="form-group form-float pull-left" style="width: 70px;">
                        <div class="form-line focused">
                            <select name="perpage" id="perpage" class="per_page form-control" onchange="first_page();">
                                <option value="10" <?= !isset($_GET["perpage"]) || $_GET["perpage"] == 10 ? "selected='selected'" :"" ?>>10&nbsp;&nbsp;</option>
                                <option value="25" <?= isset($_GET["perpage"]) && $_GET["perpage"] == 25 ? "selected='selected'" :"" ?>>25&nbsp;&nbsp;</option>
                                <option value="50" <?= isset($_GET["perpage"]) && $_GET["perpage"] == 50 ? "selected='selected'" :"" ?>>50&nbsp;&nbsp;</option>
                                <option value="100" <?= isset($_GET["perpage"]) && $_GET["perpage"] == 100 ? "selected='selected'" :"" ?>>100&nbsp;&nbsp;</option>
                            </select>
                        </div>
                    </div>
                    <span class="pull-left p-l-5 p-t-5">  แถว</span>
                    <input type="hidden" name="order_by[0]" id="hidden-sorting" class="hidden-sorting" value="">
                    <input type="hidden" name="order_by[1]" id="hidden-ordering" class="hidden-ordering" value="">
                </span>
            </div>
            <div class="btnseparator"></div>
            <div class="pGroup p-t-5" style="overflow: hidden;">
                <div class="pFirst pButton first-button pull-left">
                    <a href="javascript:first_page()"><i class="material-icons">first_page</i></a>
                </div>
                <div class="pPrev pButton prev-button  pull-left">
                    <a href="javascript:prev_page()"><i class="material-icons">chevron_left</i></a>
                </div>
            </div>
            <div class="btnseparator"></div>
            <div class="pGroup ">
                <div class="form-group form-float pull-left" style="width: 70px;">
                    <div class="form-line focused">
                        <input name="page" type="text" value="<?=isset($_GET["page"]) ? $_GET["page"] : 1?>" size="4" id="crud_page" class="crud_page form-control">
                    </div>
                </div>
                <div class="p-t-5 pull-left">
                หน้า&nbsp;&nbsp;&nbsp;ของ&nbsp;<span id="last-page-number" class="last-page-number"><?= ceil($total_row/(isset($_GET["perpage"]) ? $_GET["perpage"]:10))?></span>
                </div>
            </div>
            <div class="btnseparator"></div>
            <div class="pGroup p-t-5" style="overflow: hidden;">
                <div class="pNext pButton next-button pull-left">
                    <a href="javascript:next_page()"><i class="material-icons">chevron_right</i></a>
                </div>
                <div class="pLast pButton last-button pull-left">
                    <a href="javascript:last_page()"><i class="material-icons">last_page</i></a>
                </div>
            </div>
            <div class="btnseparator">
            </div>
            <div class="pGroup">
                <div class="pReload pButton ajax_refresh_and_loading" id="ajax_refresh_and_loading">
                    <span></span>
                </div>
            </div>
            <div class="btnseparator">
            </div>
            <div class="pGroup p-t-5">
                <span class="pPageStat">แสดงจาก 
                    <span id="page-starts-from" class="page-starts-from"></span> ถึง 
                    <span id="page-ends-to" class="page-ends-to"></span> ของทั้งหมด 
                    <span id="total_items" class="total_items"><?=$total_row?></span> แถว    
                </span>
            </div>
        </div>
        <div style="clear: both;"></div>

        <script>
            $max_page = parseFloat($("#last-page-number")[0].innerHTML);
            var total_items = parseFloat($("#total_items")[0].innerHTML);
            var page = parseFloat($("#crud_page").val());
            var per_page = parseFloat($("#perpage").val());
            if(total_items == 0){
                $("#page-starts-from")[0].innerHTML = 0;
                $("#page-ends-to")[0].innerHTMl = 0;
            }else{
                $("#page-starts-from")[0].innerHTML = (per_page * (page - 1)) + 1;
                var end_row = (per_page * (page - 1)) + per_page;
                $("#page-ends-to")[0].innerHTML = end_row <= total_items ? end_row : total_items ;
            }
            
            function first_page(){
                $("#crud_page").val(1);
                $("#crud_page")[0].form.submit();
            }

            function prev_page(){
                $page = $("#crud_page").val() > 1 ? parseFloat($("#crud_page").val()) - 1 : 1;
                $("#crud_page").val($page);
                $("#crud_page")[0].form.submit();
            }

            function next_page(){
                $page = parseFloat($("#crud_page").val()) < $max_page ?  parseFloat($("#crud_page").val()) + 1 : $max_page;
                $("#crud_page").val($page);
                $("#crud_page")[0].form.submit();
            }
            function last_page(){
                $("#crud_page").val($max_page);
                $("#crud_page")[0].form.submit();
            }
            $("#search_clear").click(function(){
                $("#search_text").val("");
                $("#search_field").val("");
                $("#startdate").val("");
                $("#enddate").val("");
                this.form.submit();
            });

            function printPage(type){
                if(type == undefined){
                    type = "excel";
                }
                var url = "<?=base_url().$controller."/export/" ?>"+type+"?perpage=<?=$total_row?>&page=1&search_text="+$("#search_text").val()+"&search_field="+$("#search_field").val(); 
                window.open(url, '_blank');
            }
        </script>

<?php }