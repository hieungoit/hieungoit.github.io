function edit_class($id){
    $("#updatemodal").modal('show')
   
    $.ajax({
    type:'POST',
    url:'server/admin/selectid_lop_hoc.php', 
    data : {
        id:$id,
    },  
      
    dataType:'json'
    }).done(function(ketqua){
        console.log(ketqua);
        $("[name = ten_lop_hoc_u]").val(ketqua.ten_lop_hoc);
        $("[name = mon_hoc_u]").val(ketqua.mon_hoc);
        $("[name = id_lop_hoc]").val(ketqua.id_lop_hoc);

    })
};

function edittk($id){
    $("#updatetk").modal('show')
   
    $.ajax({
    type:'POST',
    url:'./../server/admin/selectid_dang_nhap.php', 
    data : {
        id:$id,
    },  
      
    dataType:'json'
    }).done(function(ketqua){
        $("[name = id_dang_nhap]").val(ketqua.id_dang_nhap);

        $("[name = ten_dang_nhap]").val(ketqua.ten_dang_nhap);
        $("[name = mat_khau]").val(ketqua.mat_khau);
        $("[name = ho_ten]").val(ketqua.ho_ten);
        $("[name = ngay_sinh]").val(ketqua.ngay_sinh);
        $("[name = email]").val(ketqua.email);
        $("[name = so_dien_thoai]").val(ketqua.so_dien_thoai);
        $("[name = loai_tai_khoan]").val(ketqua.loai_tai_khoan);
        
    })
};
function edittt($id){
    $("#updatett").modal('show')
   
    $.ajax({
    type:'POST',
    url:'./../server/admin/selectid_baitap.php', 
    data : {
        id:$id,
    },  
      
    dataType:'json'
    }).done(function(ketqua){
        console.log(ketqua);
        $("[name = id_bai_tap1]").val(ketqua.id_bai_tap);

        $("[name = ten_bai_tap1]").val(ketqua.ten_bai_tap);
        $("[name = mo_ta1]").val(ketqua.mo_ta);
        
    })
};
function editbt($id){
    $("#updatebt").modal('show')
    $.ajax({
    type:'POST',
    url:'./../server/admin/selectid_baitap.php', 
    data : {
        id:$id,
    },  
      
    dataType:'json'
    }).done(function(ketqua){
        $("[name = id_bai_tap1]").val(ketqua.id_bai_tap);

        $("[name = ten_bai_tap1]").val(ketqua.ten_bai_tap);
        $("[name = mo_ta1]").val(ketqua.mo_ta);

        $("[name = ngay_bat_dau1 ]").val(ketqua.ngay_bat_dau.replace(' ','T'));
        $("[name = ngay_ket_thuc1]").val(ketqua.ngay_ket_thuc.replace(' ','T'));

        
    })
};

function delete_class($id)
{
    var alert = confirm("Do you want to continue?");
 
    if(alert)  {
        $.ajax({
            type:'POST',
            url:'server/delete_lop_hoc.php', 
            data : {
                id_lop_hoc:$id,               
            },               
            dataType:'json'
            }).done(function(ketqua){
               
                if(ketqua=='1'){                    
                    window.location.href = "";
                }else
                {
                    alert('Xóa dữ liệu không thành công');
                }
            })    } else {
       
    }
    
   
};
function deletetk($id)
{
    var alert = confirm("Do you want to continue?");
 
    if(alert)  {
        $.ajax({
            type:'POST',
            url:'./../server/delete_dang_nhap.php', 
            data : {
                id_dang_nhap:$id,               
            },               
            dataType:'text'
            }).done(function(ketqua){
                if(ketqua=='1'){                    
                    window.location.href = "";
                }else
                {
                    alert("khong thanh cong");
                }
            })
        } 
            else {
       
    }
    
   
};

function deletett($id)
{
    
    var alert = confirm("Do you want to continue?");
 
    if(alert)  {
        $.ajax({
            type:'POST',
            url:'./../server/delete_bai_tap.php', 
            data : {
                id_bai_tap:$id,               
            },               
            dataType:'text'
            }).done(function(ketqua){
                if(ketqua=='1'){                    
                    window.location.href = "";
                }else
                {
                    alert("khong thanh cong");
                }
            })
        } 
            else {
       
    }
    
   
};
function getqr($id)
{
    $.ajax({
        type:'POST',
        url:'server/checkauth.php', 
        data : {
           id:$id,            
        },               
        dataType:'json'
        }).done(function(ketqua){
            if(ketqua=='1'){                    
                window.location.href="views/thongbao.php?id="+$id;
            }else
            {
                $("#join").modal('show');
                $("[name = idroom]").val($id);
            }
        })
    

}
function checkcode()
{
   
    $("#checkcode").modal('show');


}

function checkcodeqr($user){
    var ma_lop_hoc = $("[name = ma_dang_nhap1]").val();
    $.ajax({
    type:'POST',

    url:'server/check_ma_lop1.php',  
    data : {
        ma_lop_hoc: ma_lop_hoc,
        ten_dang_nhap : $user
    },    
    dataType:'json'
    }).done(function(ketqua){
        if(ketqua==1){
            alert("Nhập mã thành công, vui long chờ xác nhận")
           

        }else
        {
           alert("Mã không đúng");
        }
    }).catch(function(err){
    })};
function checkidclass($user){
    var ma_phong =  $("[name = idroom]").val();
    var ma_lop_hoc = $("[name = ma_dang_nhap]").val();
    $.ajax({
    type:'POST',

    url:'server/check_ma_lop.php',  
    data : {
        ma_lop_hoc: ma_lop_hoc,
        ma_phong :ma_phong,
        ten_dang_nhap : $user
    },    
    dataType:'json'
    }).done(function(ketqua){
        if(ketqua==1){
            alert("Nhập mã thành công, vui long chờ xác nhận")
           

        }else
        {
           alert("Mã không đúng");
        }
    }).catch(function(err){
    })};

    function agree($id)
    {
        var alert = confirm("Do you want to continue?");
 
    if(alert)  {
        $.ajax({
            type:'POST',
            url:'./../server/update_thanh_vien.php', 
            data : {
               id:$id,            
            },               
            dataType:'json'
            }).done(function(ketqua){
                if(ketqua=='1'){                    
                    window.location.href = "";
                }else
                {
                    alert("khong thanh cong");
                }
            })
        } 
            else {
       
    }
    }

function disagree($id)
{
    var alert = confirm("Do you want to continue?");
 
    if(alert)  {
        $.ajax({
            type:'POST',
            url:'./../server/delete_thanh_vien.php', 
            data : {
                id_thanh_vien:$id, 
            },               
            dataType:'json'
            }).done(function(ketqua){
                if(ketqua=='1'){                    
                    window.location.href = "";
                }else
                {
                    alert("khong thanh cong");
                }
            })
        } 
            else {
       
    }
    }


    function deletecm($id)
    {
        var alert1 = confirm("Do you want to continue?");
 
        if(alert1)  {
            $.ajax({
                type:'POST',
                url:'./../server/delete_comment.php', 
                data : {
                    id_comment :$id, 
                },               
                dataType:'json'
                }).done(function(ketqua){
                    console.log(ketqua);
                    if(ketqua ==1){  
                        window.location.href = "";
                    }else
                    {
                        alert("khong thanh cong");

                    }
                })
            } 
                else {
           
        }
    }