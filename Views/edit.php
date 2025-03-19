<form method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>Tên</td>
            <td>
                <input type="text" name="name" value="<?=$current['name']?>">
            </td>
        </tr>
        <tr>
            <td>Ảnh <img src="images/<?=$current['thumbnail']?>" width="100"></td>
            <td>
                <input type="file" name="thumbnail">
            </td>
        </tr>
        <tr>
            <td>Giảng viên</td>
            <td>
                <input type="text" name="instructor" value="<?=$current['instructor']?>">
            </td>
        </tr>
            <td>Thời lượng</td>
            <td>
                <input type="number" name="duration" value="<?=$current['duration']?>">
            </td>
        <tr>
            <td>Giá</td>
            <td>
                <input type="number" name="price" value="<?=$current['price']?>">
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td><button type="submit" name="submit">Lưu</button></td>
        </tr>
    </table>
</form>