<?php
     $title = 'Sửa';
     $Url = '../';
     require_once ('../layouts/header.php');
     $sql = "select * from Category";
     $categoryItems = executeResult($sql);
?>
<div class="container">
    <h2 style="text-align:center">Sửa thông tin tour</h2>
    <form method="post">
        <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" class="form-control"  id="title" name="title">
        </div>
        <div class="form-group">
            <label>Danh mục:</label>
            <select name="category_id" id="category_id" class="custom-select">
                <?php
                    foreach($categoryItems as $item) {
                        if($item['id'] == $category_id) {
                            echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                        } else {
                            echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
        </div>
        <div class="form-group">
            <label>Giá tiền</label>
            <input type="text" class="form-control"  id="price" name="price">
        </div>
        <div class="form-group">
            <label>Giảm giá</label>
            <input type="text" class="form-control"  id="discount" name="discount">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description" id="description" value="" cols="30" rows="10"></textarea>
        </div>
        <a href="<?=$Url?>tour"><button class="btn btn-success "><i class="fas fa-arrow-left"></i>Quay lại</button></a>
        <button class="btn btn-success ">Lưu</button>
        
        
    </form>
    
</div>
<?php
    if(!empty($_POST)) {
        $id = getGet('id'); // lấy id trên đường dẫn Url
        $title = getPOST('title');
        $price = getPOST('price');
        $discount = getPOST('discount');
        
        $thumbnail = uploadFile('thumbnail');
    
        $description = getPOST('description');
        $category_id = getPOST('category_id');
        $creat_at = $update_at = date('Y-m-d H:s:i');
        if($thumbnail != '') {
			$sql = "update tour set thumbnail = '$thumbnail', title = '$title', price = $price, discount = $discount, description = '$description', update_at = '$updated_at', category_id = '$category_id' where id = $id";
		} else {
			$sql = "update tour set title = '$title', price = $price, discount = $discount, description = '$description', update_at = '$updated_at', category_id = '$category_id' where id = $id";
		}
		
		execute($sql);
        echo"<script>alert('Sửa thành công!')</script>";
		header('Location: ./');
		die();
    }
?>
<?php
     require_once ('../layouts/footer.php');
?>