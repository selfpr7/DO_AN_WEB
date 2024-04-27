<style>
.Left-Manage-Program {
    width: 290px;
    height: auto;
    background-color: white;
    border-radius: 10px;
    margin: 20px 0px 20px 10px;
    float: left;
}

.Menu {
    list-style: none;
    border-radius: 10px;
}

.subMenu {
    height: 50px;
    line-height: 50px;
    width: 100%;
}

.subMenu:hover {
    background-color: rgb(200, 110, 135);
}
</style>
<div class="Left-Manage-Program">
    <ul class="Menu">
        <li class="subMenu" style="border-radius:10px 10px 0px 0px;
        <?php
            if(isset($action)&&$action=="Manage-Product"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>
        ">
            <a href="index.php?controller=ManageProgram&action=Manage-Product"
                style="margin-left: 10px; text-decoration:none;">Sản
                Phẩm</a>
        </li>
        <li class="subMenu" style="
        <?php
            if(isset($action)&&$action=="Manage-Supplier"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>
        ">
            <a href="index.php?controller=ManageProgram&action=Manage-Supplier"
                style="margin-left: 10px; text-decoration:none;">Nhà
                cung cấp</a>
        </li>
        <li class="subMenu" style="
        <?php
            if(isset($action)&&$action=="Manage-Categories"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
            <a href="index.php?controller=ManageProgram&action=Manage-Categories"
                style="margin-left: 10px; text-decoration:none;">Danh mục</a>
        </li>
        <li class="subMenu" style="
        <?php
            if(isset($action)&&$action=="Manage-Config"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
            <a href="index.php?controller=ManageProgram&action=Manage-Config"
                style="margin-left: 10px; text-decoration:none;">Cấu
                hình sản phẩm</a>
        </li>
        <li class="subMenu" style="
        <?php
            if(isset($action)&&$action=="Manage-Color"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
            <a href="index.php?controller=ManageProgram&action=Manage-Color"
                style="margin-left: 10px; text-decoration:none;">Màu
                sắc</a>
        </li>
        <li class="subMenu" style="
        <?php
            if(isset($action)&&$action=="Manage-Comment"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
            <a href="index.php?controller=ManageProgram&action=Manage-Order"
                style="margin-left: 10px; text-decoration:none;">Đơn hàng</a>
        </li>


    </ul>
</div>